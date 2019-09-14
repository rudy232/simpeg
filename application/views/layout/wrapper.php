<?php 
//Proteksi halaman
$this->simple_admin->cek_login();
//Gabungin semua
require_once('head.php');
require_once('header.php');
require_once('navmenu.php');
require_once('content.php');
require_once('footer.php');