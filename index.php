<?php

date_default_timezone_set("Europe/Moscow");

require_once('templates/functions.php');
require_once('templates/data.php');
$db_connect = db_connect ($db_access, $db_name);







//Отправьте SQL-запрос для получения списка новых лотов;

$new_lots = "
    SELECT l.`name`,
         `cost_start`,
         `picture`,
         r.`price` AS r_price,
         c.`name` AS c_name
    FROM lot l
    INNER JOIN rate r ON l.id = r.lot_id
    INNER JOIN category c ON l.`category_id` = c.`id`
    WHERE `data_end` > current_timestamp
    ORDER BY `data_start` DESC 
    LIMIT 9
;";

$new_lots = db_sel($db_connect,$new_lots);

//Отправьте SQL-запрос для получения списка категорий;

$category_list = " SELECT * FROM `category`;";

$category_list = db_sel($db_connect,$category_list);


//print_r ($category_list);





// Вывод шаблонов:

$page_content = include_template ('main.php', [
    'categorys' => $category_list,
    'new_lots' => $new_lots
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
