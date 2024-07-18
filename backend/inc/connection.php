<?php
require_once dirname(__DIR__) . '/vendor/autoload.php';
date_default_timezone_set('Asia/Jakarta');
$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

$dbHost = $_ENV['DB_HOST'];
$dbDatabase = $_ENV['DB_DATABASE'];
$dbUsername = $_ENV['DB_USERNAME'];
$dbPassword = $_ENV['DB_PASSWORD'];

$koneksi = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbDatabase);
$koneksi ? header("HTTP/1.1 200 OK") :
    die("Koneksi gagal: " . mysqli_connect_error());
