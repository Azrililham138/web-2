
<?php
require_once __DIR__ . '/../models/detail_pesanan.php';
use models\Detail_pesanan;

if(isset($_GET['id'])) {
    $data = Detail_pesanan::find($_GET['id']);
    if(!$data) {
        header("Location: list-detail_pesanan.php");
        exit;
    }
} else {
    $data = array_fill_keys(['pesanan_id', 'produk_id', 'jumlah'], '');
}

if(isset($_POST['submit'])) {
    $payload = ['id' => $_GET['id'] ?? null];
    $payload['pesanan_id'] = $_POST['pesanan_id'];
    $payload['produk_id'] = $_POST['produk_id'];
    $payload['jumlah'] = $_POST['jumlah'];
    if(isset($_GET['id'])) {
        Detail_pesanan::update(array_merge($payload));
    } else {
        Detail_pesanan::create(array_merge($payload));
    }
    header("Location: list-detail_pesanan.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head><title>Edit/Create Detail_pesanan</title></head>
<body>
    <h2><?= isset($_GET['id']) ? 'Edit' : 'Create' ?> Detail_pesanan</h2>
    <form method="POST">
<label>Pesanan Id</label><input type="text" name="pesanan_id" value="<?= $data["pesanan_id"] ?>"><br>
<label>Produk Id</label><input type="text" name="produk_id" value="<?= $data["produk_id"] ?>"><br>
<label>Jumlah</label><input type="text" name="jumlah" value="<?= $data["jumlah"] ?>"><br>
        <button type="submit" name="submit">Save</button>
    </form>
    <a href="list-detail_pesanan.php">Back to List</a>
</body>
</html>
