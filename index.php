<?php

date_default_timezone_set("Europe/Moscow");

require_once('templates/functions.php');
require_once('templates/data.php');

$page_content = include_template ('main.php', [
    'categorys' => $categorys,
    'offers' => $offers
]);

$layout_content = include_template ('layout.php', [
    'categorys' => $categorys,
    'page_content' => $page_content,
    'user_name' => $user_name,
    'title' => $title
]);

print($layout_content);
//$a = lifetime("2019-11-07");
//print_r ($a);

?>