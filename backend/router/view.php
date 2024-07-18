<?php
include __DIR__ . '/router.php';

$r = new Router();
/** @var \Router $r */
$URL = $_GET['URL'];
$i = $r->_HandleURL($URL);

