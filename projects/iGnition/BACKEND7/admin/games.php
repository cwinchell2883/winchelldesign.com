<?php

/**
*	iGaming CMS
*	Copyright 2004-2005 Josh Kimbrel
**/

error_reporting(E_ALL ^ E_NOTICE);

switch ($_REQUEST['do']) {
	case 'add_quick_confirm':
		$refresh = "games.php";
		break;
	case 'add_game_confirm':
		$refresh = "games.php?";
		break;
	case 'edit_game_confirm':
		$refresh = "games.php?";
		break;
	case 'Delete Game':
		$refresh = "games.php";
		break;
	case 'Delete Section';
		$refresh = "games.php";
		break;
	case 'add_section_confirm':
		$refresh = "games.php";
		break;
	case 'edit_section_confirm':
		$refresh = "games.php";
		break;
	case 'View Matrix':
		$refresh = "rcm_matrix.php?do=viewmatrix&type=games&id=$_REQUEST[id]";
		break;
	}

require_once( 'global.php' );
require_once( '../sources/admin/games.class.php' );
require_once( '../language/default/admin_games.php' );

$cp->header();

/*** GAMES MODULE LINKS ***/
$links = '<a href=games.php?do=add_section>Add Section</a> | '
		.'<a href=games.php?do=manage_sections>Manage Sections</a> | '
		.'<a href=games.php?do=add_game>Add Game</a> | '
		.'<a href=games.php?do=add_quick>Quick Add Game</a> | '
		.'<a href=games.php>Manage Games</a>';

do_module_header('Games Manager',$links,'doc_games','games.php?do=settings','games.php?do=search');
$module = new Module;

switch($_REQUEST['do'])
{
	case 'add_quick':
		$module->add_quick();
		break;
	case 'add_quick_confirm':
		$module->add_quick_confirm();
		break;
	case 'Delete Game':
		$module->delete_game();
		break;
	case 'Delete Section':
		$module->delete_section();
		break;
	case 'View Matrix':
		$module->view_matrix();
		break;
	case 'publish':
		$module->publish();
		break;
	case 'search':
		$module->search_games();
		break;
	case 'settings':
		$module->edit_settings();
		break;
	case 'save_settings':
		$module->save_settings();
		break;
	case 'unpublish':
		$module->unpublish();
		break;
	default:
		manage_games();
		break;
	case 'Edit Game':
		$module->edit_game();
		break;
	case 'edit_game_confirm':
		$module->save_game();
		break;
	case 'add_section':
		$module->add_section();
		break;
	case 'Edit Section':
		$module->edit_section();
		break;
	case 'add_game':
		add_game();
		break;
	case 'add_game_confirm':
		add_game_confirm();
		break;
	case 'edit_section_confirm':
		edit_section_confirm();
		break;
	case 'add_section_confirm':
		add_section_confirm();
		break;
	case 'manage_sections':
		manage_sections();
		break;
}

$cp->footer();

?>