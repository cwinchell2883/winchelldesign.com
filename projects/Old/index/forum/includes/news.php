<?php
/**
*
* @package phpBB3
* @version $Id: news.php,v 0.007 2007/11/08 15:26:45 Erik Frèrejean Exp $
* @copyright (c) 2007 Erik Frèrejean
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

/**
* @ignore
*/
if (!defined('IN_PHPBB'))
{
	exit;
}

/**
* News class
* @package phpBB3
*/
class news
{
	/**
	* Set the variables
	*
	* @access private
	*/
	// GLOBAL
	var $news_data	= array();
	var $db			= false;
	var $user			= false;
	var $board_uri	= "";
	
	// RSS
	var $rss_header_created	= false;
	var $rss_output	= "";
	
	/**
	* The constructor
	*
	* @access public
	*/
	public function news()
	{
		global $config;
		
		// Make sure that we can use necessary phpBB objects
		global $db, $user, $phpbb_root_path, $phpEx, $bbcode;
		$this->db		= $db;
		$this->user	= $user;
		
		// Set the path to the board.
		$server_name = trim ($config['server_name']);
		$server_protocol = ($config['cookie_secure']) ? 'https://' : 'http://';
		$server_port = ($config['server_port'] <> 80) ? ':' . trim ($config['server_port']) . '' : '';
		$script_path = trim ($config['script_path']);
		$this->board_uri = $server_protocol . $server_name . $server_port;
		$this->board_uri .= ( $script_path != '' ) ? $script_path . '/' : '';
	}
	
	/**
	* Get the post from the fora marked as news forum
	*
	* @param boolean $return, return the data or only store it in the local var
	* @access public
	*
	* @return String[] $this->news_data, an array containing the post data of the news messages
	*/
	function get_news( $return = false )
	{
		$number_of_topics=3; //probably it is a good idea to make this variable configurable
      $sql = "
         SELECT f.forum_id, f.forum_name
            , news.post_id, news.post_subject, news.post_text, news.bbcode_bitfield, news.bbcode_uid, news.post_time
               , news_topic.topic_id, news_topic.topic_replies_real
                  , creator.username, creator.user_colour
         
         FROM " . POSTS_TABLE . " AS news, " . TOPICS_TABLE . " AS news_topic, " . USERS_TABLE . " AS creator, " . FORUMS_TABLE . " AS f
            WHERE 
               f.enable_news_forum = 1
               AND news.post_approved = 1
               AND news_topic.forum_id = f.forum_id
               AND news.post_id=news_topic.topic_first_post_id
               AND creator.user_id = news.poster_id
         ORDER BY news_topic.topic_first_post_id DESC LIMIT $number_of_topics
      ";
		// Fetch the result and return is as an array
		$result = $this->db->sql_query ($sql, 0);
		while ($row = $this->db->sql_fetchrow ($result))
		{
			$this->news_data[] = array(
				'subject'				=> $row['post_subject'],
				'text'					=> $row['post_text'],
				'time'					=> $row['post_time'],
				'bitfield'				=> $row['bbcode_bitfield'],
				'bbc_uid'				=> $row['bbcode_uid'],
				'reply_count'			=> $row['topic_replies_real'],
				'news_poster'			=> $row['username'],
				'news_poster_colour'	=> $row['user_colour'],
				'forum_id'				=> $row['forum_id'],
				'topic_id'				=> $row['topic_id'],
				'post_id'				=> $row['post_id'],
				'forum_name'			=> $row['forum_name']
			);
		}

		if ($return)
		{
			return $this->news_data;
		}
	}
	
	/**
	* Create the rss feed
	*
	* @access public
	*/
	function build_rss()
	{
		global $config, $phpbb_root_path, $phpEx, $bbcode;
		// Collect the news
		$this->get_news (false);

		// Parse the header
		$this->rss_output .= $this->rss_header();

		// Fill the body.
		foreach ($this->news_data as $key => $val)
		{
			$this->rss_output .= $this->rss_body ($this->news_data[$key]);
		}
		// Parse the header
		$this->rss_output .= $this->rss_footer();
		
		// Send the right header
		$agent = strtolower(empty($_SERVER['HTTP_USER_AGENT']) ? $_ENV['HTTP_USER_AGENT'] : $_SERVER['HTTP_USER_AGENT']);
		if ( strpos(' ' . $agent, 'firefox') || strpos(' ' . $agent, 'mozilla') )
		{
			header('Content-type: text/xml; charset=utf-8');
		}
		else
		{
			header ('Content-type: application/rss+xml; charset=utf-8');
		}
		
		// Print the output
		print ($this->rss_output);
	}
	
	/**
	* Create the header of the rss feed
	*
	* @access private
	*
	* @return $rss_header
	*/
	function rss_header()
	{
		global $config;
		$rss_header_template	= "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n<rss version=\"2.0\">\n\t<channel>\n\t\t<title>%s</title>\n\t\t<link>%s</link>\n\t\t<description>%s</description>";
		$rss_header			= "";
		
		if (!$this->rss_header_created)
		{
			$rss_header = sprintf ($rss_header_template, $config['sitename'], ($config['server_protocol'] . $config['server_name'] . $config['script_path']), $config['site_desc']);
			$this->rss_header_created = true;
		}
		
		return $rss_header;
	}
	
	/**
	* Create the body for the rss feed
	*
	* @param String[] $post_data
	* @access private
	*
	* @return String $rss_body
	*/
	function rss_body($post_data = array())
	{
		global $phpEx;
		$rss_body_template	= "\n\t\t<item>\n\t\t\t<author>%s</author>\n\t\t\t<pubDate>%s</pubDate>\n\t\t\t<link>%s</link>\n\t\t\t<title>%s</title>\n\t\t\t<description>%s</description>\n\t\t</item>";
		$rss_body				= "";
		
		extract ($post_data);
		
		// Prepare the data
		$u_post_link	= append_sid ($this->board_uri . 'viewtopic.' . $phpEx, 'f='.$forum_id.'&amp;t='.$topic_id.'#p'.$post_id);
		
		$news_text = censor_text($text);
		$news_text = $this->strip_bbcode ($news_text, $bbc_uid);
		$news_text = str_replace("\n","&lt;br /&gt;", $news_text);

		$post_date = date ('Y-m-d', $time);
		
		$rss_body = sprintf ($rss_body_template, $news_poster, $post_date, $u_post_link, censor_text($subject), $news_text);
		
		return $rss_body;
	}
	
	/**
	* Create the footer of the rss feed
	*
	* @access private
	*
	* @return $rss_footer
	*/
	function rss_footer()
	{
		global $config;
		$rss_footer_template	= "\n\t</channel>\n</rss>";

		return $rss_footer_template;
	}
	
	/**
	* Get rid of the bbcode and smilies.
	*
	* @param String $text, the post content
	* @param String $uid, the bbcode uid value
	* @access private
	*
	* @return String $text, the text without the bbcode and smilies
	*/
	function strip_bbcode($text, $uid)
	{
		$text = preg_replace("#\[\/?[a-z0-9\*\+\-]+(?:=.*?)?(?::[a-z])?(\:?$uid)\]#", '', $text);
		$text = preg_replace('#<!\-\- s(.*?) \-\-><img src="\{SMILIES_PATH\}\/.*? \/><!\-\- s(.*?) \-\->#', '', $text);
		$text = str_replace('&amp;#', '&#', htmlspecialchars($text, ENT_QUOTES, "UTF-8"));
		
		return $text;
	}

	/*
	 * SQL INSTALL QUERY'S
	   ;
	 */
}
?>