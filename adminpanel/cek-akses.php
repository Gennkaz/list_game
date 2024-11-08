<?php

$fileAkses = __DIR__.DIRECTORY_SEPARATOR.'akses'.DIRECTORY_SEPARATOR.$_SESSION['users']['role'].'.php';
if(!file_exists($fileAkses)){
    echo"Terjadi kesalahan";
    exit;
}

$akses = include $fileAkses;
$url = $_SERVER['REQUEST_URI'];
$filename = pathinfo($url, PATHINFO_FILENAME);
if (!in_array($filename, $akses)){
    header('location: akses.php');
    exit;
}