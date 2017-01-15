<?php

/* SELECT forum_id, forum_name, parent_id, forum_type, left_id, right_id FROM _forums ORDER BY left_id ASC */

$expired = (time() > 1336068559) ? true : false;
if ($expired) { return; }

$this->sql_rowset[$query_id] = array (
  0 => 
  array (
    'forum_id' => '1',
    'forum_name' => 'Hidden Category',
    'parent_id' => '0',
    'forum_type' => '0',
    'left_id' => '1',
    'right_id' => '6',
  ),
  1 => 
  array (
    'forum_id' => '2',
    'forum_name' => 'Website News',
    'parent_id' => '1',
    'forum_type' => '1',
    'left_id' => '2',
    'right_id' => '3',
  ),
  2 => 
  array (
    'forum_id' => '21',
    'forum_name' => 'Team Development Island',
    'parent_id' => '1',
    'forum_type' => '1',
    'left_id' => '4',
    'right_id' => '5',
  ),
  3 => 
  array (
    'forum_id' => '3',
    'forum_name' => 'Technology',
    'parent_id' => '0',
    'forum_type' => '0',
    'left_id' => '7',
    'right_id' => '24',
  ),
  4 => 
  array (
    'forum_id' => '4',
    'forum_name' => 'Computer Equipment',
    'parent_id' => '3',
    'forum_type' => '0',
    'left_id' => '8',
    'right_id' => '19',
  ),
  5 => 
  array (
    'forum_id' => '14',
    'forum_name' => 'Video Cards',
    'parent_id' => '4',
    'forum_type' => '1',
    'left_id' => '9',
    'right_id' => '10',
  ),
  6 => 
  array (
    'forum_id' => '15',
    'forum_name' => 'Motherboards',
    'parent_id' => '4',
    'forum_type' => '1',
    'left_id' => '11',
    'right_id' => '12',
  ),
  7 => 
  array (
    'forum_id' => '16',
    'forum_name' => 'Processors',
    'parent_id' => '4',
    'forum_type' => '1',
    'left_id' => '13',
    'right_id' => '14',
  ),
  8 => 
  array (
    'forum_id' => '17',
    'forum_name' => 'Monitors',
    'parent_id' => '4',
    'forum_type' => '1',
    'left_id' => '15',
    'right_id' => '16',
  ),
  9 => 
  array (
    'forum_id' => '22',
    'forum_name' => 'Other Hardware',
    'parent_id' => '4',
    'forum_type' => '1',
    'left_id' => '17',
    'right_id' => '18',
  ),
  10 => 
  array (
    'forum_id' => '5',
    'forum_name' => 'PC Gaming',
    'parent_id' => '3',
    'forum_type' => '1',
    'left_id' => '20',
    'right_id' => '21',
  ),
  11 => 
  array (
    'forum_id' => '6',
    'forum_name' => 'Console Gaming',
    'parent_id' => '3',
    'forum_type' => '1',
    'left_id' => '22',
    'right_id' => '23',
  ),
  12 => 
  array (
    'forum_id' => '7',
    'forum_name' => 'Script-Kiddie Playground',
    'parent_id' => '0',
    'forum_type' => '0',
    'left_id' => '25',
    'right_id' => '36',
  ),
  13 => 
  array (
    'forum_id' => '8',
    'forum_name' => 'Writers Discussion',
    'parent_id' => '7',
    'forum_type' => '1',
    'left_id' => '26',
    'right_id' => '27',
  ),
  14 => 
  array (
    'forum_id' => '9',
    'forum_name' => 'PHP Snippet',
    'parent_id' => '7',
    'forum_type' => '1',
    'left_id' => '28',
    'right_id' => '29',
  ),
  15 => 
  array (
    'forum_id' => '10',
    'forum_name' => 'HTML Snippet',
    'parent_id' => '7',
    'forum_type' => '1',
    'left_id' => '30',
    'right_id' => '31',
  ),
  16 => 
  array (
    'forum_id' => '11',
    'forum_name' => 'ASP Snippet',
    'parent_id' => '7',
    'forum_type' => '1',
    'left_id' => '32',
    'right_id' => '33',
  ),
  17 => 
  array (
    'forum_id' => '12',
    'forum_name' => 'Showroom',
    'parent_id' => '7',
    'forum_type' => '1',
    'left_id' => '34',
    'right_id' => '35',
  ),
  18 => 
  array (
    'forum_id' => '13',
    'forum_name' => 'Lifes Sandbox',
    'parent_id' => '0',
    'forum_type' => '1',
    'left_id' => '37',
    'right_id' => '38',
  ),
  19 => 
  array (
    'forum_id' => '18',
    'forum_name' => 'Members Area',
    'parent_id' => '0',
    'forum_type' => '0',
    'left_id' => '39',
    'right_id' => '44',
  ),
  20 => 
  array (
    'forum_id' => '19',
    'forum_name' => 'Website Concerns',
    'parent_id' => '18',
    'forum_type' => '1',
    'left_id' => '40',
    'right_id' => '41',
  ),
  21 => 
  array (
    'forum_id' => '20',
    'forum_name' => 'FAQ Section',
    'parent_id' => '18',
    'forum_type' => '2',
    'left_id' => '42',
    'right_id' => '43',
  ),
);
?>