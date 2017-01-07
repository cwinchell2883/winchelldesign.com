<?php

class Module
{

    function header()
    {
        global $db;

        $links = '<!-- No Links -->';

        do_module_header('Content Download System',$links,'content');
    }

    function main()
    {
        global $db;
		do_table_header("iGaming CMS Game Library");
		print "<tr><td style=\"background: #fff;\">";
        print '<h3 style="padding-left: 5px;"><span style="color: green;">Beta</span></h3>';

        if (!isset($_REQUEST['platform']))
        {
            $xmlfile = simplexml_load_file('http://content.igamingcms.com/platforms.xml');
            foreach ($xmlfile AS $platform)
            {
                print '<div style="font-size: 10pt; padding: 10px; width: 300px; background-color: #fff; border: 1px solid #f5f5f5;">';
                print '<a href="content.php?platform='.$platform->var.'">'.$platform->title.'</a>';
                print '</div><br />';
            }
        } else {

            $xmlfile = simplexml_load_file('http://content.igamingcms.com/'.$_REQUEST[platform]);
            foreach ($xmlfile AS $game)
            {
                print '<div style="padding: 10px; width: 300px; background-color: #fff; border: 1px solid #f5f5f5;">';
                print '<div style="font-size: 10pt;">'.$game->title.'</div>';
                print '<a href="content.php?do=import_game&game='.$game->url.'">Import Game</a>';
                print '</div><br />';
            }
        }
        print "</td></tr>";
        do_table_footer();
    }

    function import_game()
    {
        global $db;

        print '<h2><b>iGaming CMS Game Library</b></h2>';
        print '<h3><span style="color: green;">Beta</span></h3>';

        $xmlfile = simplexml_load_file('http://content.igamingcms.com/'.$_REQUEST['game']);
        foreach ($xmlfile AS $game)
        {
            $result = $db->Execute("SELECT * FROM sp_games_sections WHERE `title` = '$game->platform' LIMIT 1");
				if ($result->RecordCount() == 0)
				{
					$db->Execute("INSERT INTO sp_games_sections (title) VALUES ('$game->platform')") or die($db->ErrorMsg());
					$platform = $db->Insert_ID() or die($db->ErrorMsg());
				}
            while ($row = $result->FetchNextObject())
            {
					$platform = $row->ID;
            }
			$rs = $db->Execute("SELECT * FROM `sp_games` WHERE `id` = '-1';");
            $record['title'] = $game->title;
            $record['section'] = $platform;
            $record['published'] = '1';
            print $game->title . "<br />";
            $sql = $db->GetInsertSQL($rs,$record);
            $result = $db->Execute($sql) or die ($db->ErrorMsg());
        }
    }


}

?>