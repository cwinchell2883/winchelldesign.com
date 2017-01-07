<!--<div style="height:100%;">&nbsp;</div>-->
<script type="text/javascript">
var s=document.getElementById('scr');
document.write('<'+'div style=\"height:'+s.offsetHeight+'px\">&nbsp;<'+'/div>');
</script>
<?php
update_option('cli_welcome', "Microsoft Windows" . cli_os_detect() ."<br />Copyright (c) 2009 Microsoft Corporation. All rights reserved.");
$qv = $wp_query->query_vars;
if(get_option('cli_no_post_list')){
	$skip=true;
}else{
$skip = (
	$qv['error'] || 
	!$qv['m'] || 
	!$qv['p'] || 
	!$qv['subpost'] || 
	!$qv['subpost_id'] || 
	!$qv['attachment'] || 
	!$qv['attachment_id'] || 
	!$qv['name'] || 
	!$qv['hour'] || 
	!$qv['static'] || 
	!$qv['pagename'] || 
	!$qv['page_id'] || 
	!$qv['second'] || 
	!$qv['minute'] || 
	!$qv['day'] || 
	!$qv['monthnum'] || 
	!$qv['year'] || 
	!$qv['w'] || 
	!$qv['category_name'] || 
	!$qv['author_name'] || 
	!$qv['feed']
	);
}	 
if($wp_query->post_count == 1){
	if (have_posts()){
		include(get_template_directory().'/lib/cat.inc.php');
		while (have_posts()){
			the_post();
			cat($post->ID,$post);
		}
	}
}else if(count($posts) > 0 && !$skip){
	$posts=array_reverse($posts);		
	if (have_posts()){
		echo('<table>');
		while (have_posts()){
			the_post();
			e("<tr onclick=\"showpost('".$post->ID."')\"><td>"
				.$post->ID."</td><td class=\"linky\">"
				.$post->post_title."</td><td>"
				.$post->post_date."</td><td>"
				.'<a href="'.get_permalink($post->ID).'" title="Permalink">&raquo;</a>'
				."</td></tr>");
		}
		echo('</table>');
	}
	
}

if(isset($_GET['yoohoo'])){ // You get here by clicking on the cursor
	// Will put some javascript here to alert.
}

?>

<div id="welcome" style=""><?php echo get_option('cli_welcome'); ?></div>
<noscript>
<p>Sorry, the CLI requires JavaScript to work. Please turn on JavaScript.</p>
</noscript>
