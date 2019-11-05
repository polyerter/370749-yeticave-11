<?php

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

?>