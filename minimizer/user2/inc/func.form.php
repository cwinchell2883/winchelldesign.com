<?php 
####
## Manufacturing Database
## (c) http://winchelldesign.com
## Developed By: Chris Winchell
##
## 
## File: func.form.php
## Created: 9-17-2010
## Updated: --
####

	// Generates html select tag where options are populated from ($values = array())
	function html_selectbox($name, $values, $selected=NULL, $attributes=array())
	{
	   $attr_html = '';
	   if(is_array($attributes) && !empty($attributes))
	   {
		  foreach ($attributes as $k=>$v)
		  {
			 $attr_html .= ' '.$k.'="'.$v.'"';
		  }
	   }
	   $output = '<select name="'.$name.'" id="'.$name.'"'.$attr_html.'>'."\n";
	   if(is_array($values) && !empty($values))
	   {
		  foreach ($values as $key=>$value)
		  {
			 if(is_array($value))
			 {
				$output .= '<optgroup label="'.$key.'">'."\n";
				foreach ($value as $k=>$v)
				{
				   $sel = $selected == $k ? ' selected="selected"' : '';
				   $output .= '<option value="'.$k.'"'.$sel.'>'.$v.'</option>'."\n";
				}
				$output .= '</optgroup>'."\n";
			 }
			 else
			 {
				$sel = $selected == $key ? ' selected="selected"' : '';
				$output .= '<option value="'.$key.'"'.$sel.'>'.$value.'</option>'."\n";
			 }
		  }
	   }
	   $output .= "</select>\n";
	
	   return $output;
	}
	
	// Generates html select tag where options are numberes populated from ($count + and - $limit)
	function numlist_gen($name, $count, $limit)
	{
	   $output = '<select name="'.$name.'" id="'.$name.'">\n"';
	   if($limit > $count || $limit == NULL)
	   {
		  $limit = $count;
	   }
	   $low = ($count-$limit);
	   while ($low <= ($count+$limit))
	   {
		  $output .= '<option value="'.$low.'">'.$low.'</option>'."\n";
		  ++$low;
	   }
	   $output .= "</select>\n";
	   
	   return $output;
	}
	
	// Generates html textbox
	function html_textbox($name, $size, $value=NULL, $attributes=array())
	{
	   $attr_html = '';
	   if(is_array($attributes) && !empty($attributes))
	   {
		  foreach ($attributes as $k=>$v)
		  {
			 $attr_html .= ' '.$k.'="'.$v.'"';
		  }
	   }
	   if($size == NULL)
	   {
		  $size = 5;
	   }
	   $output = '<input name="'.$name.'" id="'.$name.'" type="text" size="'.$size.'" maxlength="'.$size.'" value="'.$value.'"'.$attr_html." />";
	   
	   return $output;
	}
	
	// Generates html input tag where $type can == (radio || checkbox || submit)
	function html_pickbox($name, $type, $value=NULL, $attributes=array())
	{
	   $attr_html = '';
	   if(is_array($attributes) && !empty($attributes))
	   {
		  foreach ($attributes as $k=>$v)
		  {
			 $attr_html .= ' '.$k.'="'.$v.'"';
		  }
	   }
	   if($type == 'radio' || $type == 'checkbox' || $type == 'submit')
	   {
		  $output = '<input name="'.$name.'" id="'.$name.'" type="'.$type.'" value="'.$value.'"'.$attr_html." />";
		  if($value == NULL)
		  {
			 die('Pickbox Error');
		  }
	   }
	   else
	   {
		  die('Pickbox Type must be either checkbox or radio');
	   }
	   
	   return $output;
	}
?>