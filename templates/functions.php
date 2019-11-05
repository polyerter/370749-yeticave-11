<?php

/**
 * Форматирование числа (цены)
 */
function format_numb($number){
    $number = ceil($number);
    if ($number < 1000) {
        return $number .₽;  
    }elseif($number >= 1000){
        $number = number_format ( $number , 0 ,"."," " );
        return $number . ₽;
    }
}

/**
 * Подключение шаблонов
 */
function include_template($name,$data){
	$name = 'templates/' . $name;
	$result = '';

	if (!file_exists($name)) {
		return $result;
	}

	ob_start();
	extract($data);
	require $name;

	$result = ob_get_clean();

	return $result;
}

/**
 * Время до закрытия лота ЧЧ:ММ
 */
function lifetime($endtime){
	$now = time();
	$endtime = strtotime($endtime);
	//$lifetime = date("H:i", $lifetime);
	$lifetime_hours = floor(($endtime - $now) / 3600);
	$lifetime_minutes = floor((($endtime - $now) % 3600)/60);
	if ($lifetime_hours < 10) {
		$lifetime_hours = str_pad($lifetime_hours, 2, "0", STR_PAD_LEFT);
	}
	if ($lifetime_minutes < 10) {
		$lifetime_minutes = str_pad($lifetime_minutes, 2, "0", STR_PAD_LEFT);
	}
	$lifetime = [$lifetime_hours, $lifetime_minutes];
	return $lifetime;
}	

?>