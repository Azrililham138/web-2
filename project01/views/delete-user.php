<?php
require_once __DIR__ . '/../models/user.php';
use models\User;

$id = $_GET['id'] ?? null;
if ($id) {
    User::delete($id);
}
header("Location: list-user.php");
exit;
?>
