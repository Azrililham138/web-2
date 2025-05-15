<?php
require_once __DIR__ . '/../models/jenisproduk.php';
use models\Jenisproduk;

$id = $_GET['id'] ?? null;
if ($id) {
    Jenisproduk::delete($id);
}
header("Location: list-jenisproduk.php");
exit;
?>
