<?php

// Template Information
// ======================================================================
// This template is used to lay out your front page in any way you want.
// By including different files (index_newsbit, index_gamebit, etc) the
// system loads the contents of those files in that order. As such, if
// you dont want a certain entity to appear on your front page, remove it
// from this file.
// ======================================================================

?>

		 <br />
		 <?php include("templates/index_newsbit.inc.php"); ?>
         <br />
         <?php include("templates/index_mostviewedgame.inc.php"); ?>
		 <br />
         <?php include("templates/index_gamebit.inc.php"); ?>
         <br />
         <?php include("templates/index_reviewbit.inc.php"); ?>
         <br />
         <?php include("templates/index_previewbit.inc.php"); ?>