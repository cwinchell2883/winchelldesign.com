<?php
$output = '
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="nl" xml:lang="nl">
<head>

    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <meta http-equiv="content-language" content="nl" />
    <meta http-equiv="content-style-type" content="text/css" />
    <meta http-equiv="imagetoolbar" content="no" />
    <meta name="resource-type" content="document" />
    <meta name="distribution" content="global" />

    <meta name="copyright" content="Erik Fr&egrave;rejean" />

    <title>Example</title>
</head>

<body>

<div id="inhoud">

    <h1>News from forum</h1>
';
//-- Start the phpBB session AND include the nessacary files
define( 'IN_PHPBB', true );
$phpbb_root_path = './index/forum/'; // change in your own root path.
$phpEx = substr(strrchr(__FILE__, '.'), 1);
include($phpbb_root_path . 'common.' . $phpEx);
include($phpbb_root_path . 'includes/functions_display.' . $phpEx);
include($phpbb_root_path . 'includes/bbcode.' . $phpEx);

$user->session_begin();
$auth->acl( $user->data );
$user->setup();

//-- Fetch the data from the specified fora
$bbcode = new bbcode();
$news_fora_id = array( '2' ); // Change in the fora id's you need
$query = "
    SELECT p.topic_id, p.forum_id, p.post_time, p.post_subject, p.post_text, p.bbcode_bitfield, p.bbcode_uid,
        u.user_id, u.user_email, u.username, u.user_posts, u.user_rank, u.user_colour, u.user_allow_viewonline, u.user_allow_viewemail,
            (
                SELECT COUNT( post_id )
                FROM " . POSTS_TABLE . "
                    WHERE topic_id = p.topic_id
            ) AS aantal_posts
    FROM " . POSTS_TABLE . " AS p, " . USERS_TABLE . " AS u
        WHERE " . $db->sql_in_set( 'p.forum_id', $news_fora_id ) . "
            AND u.user_id = p.poster_id
    GROUP BY topic_id
    ORDER BY topic_id DESC
";
//die('<pre>' . $query );
$result = $db->sql_query( $query );
while( $row = $db->sql_fetchrow($result) )
{
    // Parse the message and subject
    $message = censor_text($row['post_text']);

    // Second parse bbcode here
    if ($row['bbcode_bitfield'])
    {
        $bbcode->bbcode_second_pass($message, $row['bbcode_uid'], $row['bbcode_bitfield']);
    }

    $message = bbcode_nl2br($message);
    $message = smiley_text($message);
    
    // Send data to output var
    $output .= "<h2><a href=\"" . $phpbb_root_path . "viewtopic.php?f={$row['forum_id']}&amp;t={$row['topic_id']}\" title=\""  . censor_text($row['post_subject']) . "\">".censor_text($row['post_subject'])."</a></h2>\n";
    $output .= "<p style=\" padding-bottom: 3em; \">\n\t";
    $output .= $message;
    $output .= "\n\t<span style=\"widht: 50%; float: left; border-top: 1px solid #00008b;\">Posted by:  <span style=\" color: #" . $row['user_colour'] . ";\">" . $row['username'] . "</span></span>";
    $output .= "\n\t<span style=\"widht: 50%; float: right; border-top: 1px solid #00008b;\">On: " . date( $user->data['user_dateformat'], $row['post_time'] ) . "</span>\n";
    $output .= "</p>\n\n";
}

$output .= '
</div>

</body>
</html>';

// print the output
print( $output );
?>