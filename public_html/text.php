<?php
require '../bootloader.php';
$fileDB = new FileDB(DB_FILE);
$fileDB->createTable('test');
var_dump($fileDB->insertRow('test',['namas' => 'kvadratas'], 'lapas'));
$fileDB->insertRow('test',['namas' => 'kvadratas'], 'lapas');
$fileDB->insertRow('test',['namas' => 'kvadratas']);
$fileDB->insertRow('test',['namas' => 'kvadratas']);
$fileDB->insertRow('test',['namas' => 'kvadratas'], 'papas');
var_dump($fileDB->insertRow('test',['namas' => 'kvadratas'], 'papas'));
var_dump($fileDB);