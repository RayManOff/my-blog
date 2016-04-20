<?php

//preg_match('~dog.\.~', 'It rain cats and dogs.', $m);
//preg_match('~ca{1,2}t~', 'It rain cats, caats and dogs.', $m);
//preg_match_all('~ca+t~', 'It rain cats, caaats and dogs.', $m);
//var_dump($m);


/*
 * It rain cats, caats and dogs
 *
 * По умалчанию жадный поиск
 * ~c.+s~  => cats and dogs
 * ~c.+?~  => cats  //Отключен жп
 * ~c.+s~U => cats  //Откл жп
 *
 */


//$a = 'В лесу родилась ёлочка
//В лесу она росла
//Зимой и летом стройная 
//Зеленая была';
//
//preg_match('~^В\sлесу~m', $a, $m);
//var_dump($m);
$params = '~^It\s(?P<verb>\w+)\s(?P<noun>\w+)~';

preg_match($params, 'It rain cats, caats and dogs.', $m);
var_dump($m);die;