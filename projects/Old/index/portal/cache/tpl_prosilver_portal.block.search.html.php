<!-- $Id: search.html,v 1.1 2008/02/09 08:18:16 angelside Exp $ //-->
<script language="JavaScript" type="text/javascript">
<!--
function qsearch_onSubmit()
{
	qs_enginename = document.qsearch_form.qsearch_select.value;
	qs_keywords = document.qsearch_form.keywords.value;
	switch( qs_enginename )
	{
	case 'site':
		break;
	case 'author':
		window.open('search.php?author=' + qs_keywords, '_self', '');
		return false;
	case 'google':
		window.open('http://www.google.com.tr/search?q=' + qs_keywords, '_google', '');
		return false;
	case 'yahoo':
		window.open('http://search.yahoo.com/search?p=' + qs_keywords, '_yahoo', '');
		return false;	
	case 'msnlive':
		window.open('http://search.live.com/results.aspx?q=' + qs_keywords, '_msnlive', '');
		return false;
	case 'altavista':
		window.open('http://www.altavista.com/web/results?itag=ody&q=' + qs_keywords + '&kgs=0&kls=0', '_altavista', '');
		return false;
	case 'lycos':
		window.open('http://search.lycos.com/?query=' + qs_keywords, '_lycos', '');
		return false;
	case 'odp':
		window.open('http://search.dmoz.org/cgi-bin/search?search=' + qs_keywords, '_odp', '');
		return false;
	default:
		if( (i = qsearch_findEngine(qs_enginename)) >= 0 )
		{
			window.open(qsearch_engines[i].url + qs_keywords, '_blank', '');
			return false;
		}
		break;
	}
	return true;
}
//-->
</script>

<div class="panel">
	<div class="inner">
		<span class="corners-top"><span></span></span>
			<h3><?php echo ((isset($this->_rootref['L_SEARCH'])) ? $this->_rootref['L_SEARCH'] : ((isset($user->lang['SEARCH'])) ? $user->lang['SEARCH'] : '{ SEARCH }')); ?></h3>
			<form name="qsearch_form" id="searchform" method="post" action="<?php echo (isset($this->_rootref['U_SEARCH'])) ? $this->_rootref['U_SEARCH'] : ''; ?>" onSubmit="return qsearch_onSubmit();">
			<input type="text" tabindex="1" name="keywords" id="searchfield" size="22" maxlength="40" value="" class="inputbox autowidth" /><br /> <br />
			<select name="qsearch_select">
				<optgroup label="<?php echo ((isset($this->_rootref['L_SH_SITE'])) ? $this->_rootref['L_SH_SITE'] : ((isset($user->lang['SH_SITE'])) ? $user->lang['SH_SITE'] : '{ SH_SITE }')); ?>">
					<option value="site" style="background-color: #EEEEEE;"><?php echo ((isset($this->_rootref['L_SH_POSTS'])) ? $this->_rootref['L_SH_POSTS'] : ((isset($user->lang['SH_POSTS'])) ? $user->lang['SH_POSTS'] : '{ SH_POSTS }')); ?></option>
					<option value="author" style="background-color: #EEEEEE;"><?php echo ((isset($this->_rootref['L_SH_AUTHOR'])) ? $this->_rootref['L_SH_AUTHOR'] : ((isset($user->lang['SH_AUTHOR'])) ? $user->lang['SH_AUTHOR'] : '{ SH_AUTHOR }')); ?></option>
				</optgroup>
				<optgroup label="<?php echo ((isset($this->_rootref['L_SH_ENGINE'])) ? $this->_rootref['L_SH_ENGINE'] : ((isset($user->lang['SH_ENGINE'])) ? $user->lang['SH_ENGINE'] : '{ SH_ENGINE }')); ?>">
					<option value="google" style="background-color: #FEF2D6;">google</option>
					<option value="yahoo" style="background-color: #FEF2D6;">yahoo</option>
					<option value="msnlive" style="background-color: #FEF2D6;">msnlive</option>
					<option value="altavista" style="background-color: #FEF2D6;">altavista</option>
					<option value="lycos" style="background-color: #FEF2D6;">lycos</option>
					<option value="odp" style="background-color: #FEF2D6;">open directory</option>
				</optgroup>
			</select>
			<!-- &nbsp; -->
			<input type="hidden" name="search_fields" value="all" />
			<input type="hidden" name="show_results" value="topics" />
			<input type="submit" value="<?php echo ((isset($this->_rootref['L_SH'])) ? $this->_rootref['L_SH'] : ((isset($user->lang['SH'])) ? $user->lang['SH'] : '{ SH }')); ?>" class="button2" />
			</form>
			<hr />
			<a href="<?php echo (isset($this->_rootref['U_SEARCH'])) ? $this->_rootref['U_SEARCH'] : ''; ?>"><?php echo ((isset($this->_rootref['L_SH_ADV'])) ? $this->_rootref['L_SH_ADV'] : ((isset($user->lang['SH_ADV'])) ? $user->lang['SH_ADV'] : '{ SH_ADV }')); ?></a>
		<span class="corners-bottom"><span></span></span>
	</div>
</div>
<br style="clear:both" />