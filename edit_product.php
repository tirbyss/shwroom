<?php
include "koneksi.php";

$id = $_GET['id'];

$query = mysqli_query($koneksi, "SELECT * FROM product WHERE id = $id");

$tampil = mysqli_fetch_assoc($query);

if (mysqli_num_rows($query) < 1) {
    die("Data tidak ditemukan");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        * {
            font-family: "Trebuchet MS";
        }

        h1 {
            text-transform: uppercase;
            color: salmon;

        }

        img {
            height: 20px;
            width: fit-content;
        }

        button {
            background-color: salmon;
            color: #fff;
            padding: 10px;
            text-decoration: none;
            font-size: 12px;
            border: 0px;
            margin-top: 20px;
        }

        label {
            margin-top: 10px;
            float: left;
            text-align: left;
            width: 100%;
        }

        input,
        textarea {
            padding: 6px;
            width: 100%;
            box-sizing: border-box;
            background: #f8f8f8;
            border: 2px solid #ccc;
            outline-color: salmon;
        }

        div {
            width: 100%;
            height: auto;
        }

        .base {
            width: 400px;
            height: auto;
            padding: 20px;
            margin-left: auto;
            margin-right: auto;
            background: #ededed;
        }
    </style>
    <title>Document</title>
</head>

<body>
    <center>
        <h1>Tambah Produk</h1>
        <center>
            <form method="POST" action="" enctype="multipart/form-data">
                <section class="base">
                    <div>
                        <label>Judul</label>
                        <input type="text" name="judul" value="<?= $tampil['judul'] ?>">
                    </div>
                    <div>
                        <label>Logo Image</label>
                        <img src="img/<?= $tampil['lgo_img'] ?>" alt="">
                        <input type="file" name="lgo_img" value="<?= $tampil['lgo_img'] ?>">
                        <i style="float: left;font-size: 11px;color: red">Abaikan jika tidak merubah gambar produk</i>
                    </div>
                    <div>
                        <label>Image</label>
                        <img src="img/<?= $tampil['img'] ?>" alt="">
                        <input type="file" name="img">
                        <i style="float: left;font-size: 11px;color: red">Abaikan jika tidak merubah gambar produk</i>
                    </div>
                    <div>
                        <label>Harga</label>
                        <input type="text" name="harga" value="<?= $tampil['harga'] ?>">
                    </div>
                    <div>
                        <label>Power</label>
                        <input type="text" name="power" value="<?= $tampil['power'] ?>" required="">
                    </div>
                    <div>
                        <label>Top Speed</label>
                        <input type="text" name="top_speed" value="<?= $tampil['top_speed'] ?>" required="">
                    </div>
                    <div>
                        <label>Torque</label>
                        <input type="text" name="torque" value="<?= $tampil['torque'] ?>" required="">
                    </div>
                    <div>
                        <label>Deskripsi</label>
                        <textarea type="text" name="deskripsi" required=""><?= $tampil['deskripsi'] ?></textarea>
                    </div>
                    <div>
                        <button type="submit" name="kirim">Simpan Produk</button>
                    </div>
                </section>
            </form>

            <?php

            if (isset($_POST['kirim'])) {

                $judul = $_POST['judul'];
                $lgo_img = $_FILES['lgo_img']['name'];
                $img = $_FILES['img']['name'];
                $harga = $_POST['harga'];
                $power = $_POST['power'];
                $top_speed = $_POST['top_speed'];
                $torque = $_POST['torque'];
                $deskripsi = $_POST['deskripsi'];

                $tmp_lgo = $_FILES['lgo_img']['tmp_name']; // menampung bentuk dari file
                $tmp_img = $_FILES['img']['tmp_name'];

                move_uploaded_file($tmp_lgo, "img/$lgo_img"); // memindahkan file ke sebuah direktory yang di tentukan

                move_uploaded_file($tmp_img, "img/$img");

                if ($lgo_img != "" && $img != "") {
                    
                    $query = mysqli_query($koneksi, "UPDATE product SET judul = '$judul', lgo_img = '$lgo_img', img = '$img', harga = '$harga', power = '$power', top_speed = '$top_speed', torque = '$torque', deskripsi = '$deskripsi' WHERE id = $id");
                    
                } else if($lgo_img != ""){
                    
                    $query = mysqli_query($koneksi, "UPDATE product SET judul= '$judul', lgo_img = '$lgo_img', harga = '$harga', power = '$power', top_speed = '$top_speed', torque = '$torque', deskripsi = '$deskripsi' WHERE id = $id");

                } else if($img != ""){
                    
                    $query = mysqli_query($koneksi, "UPDATE product SET judul = '$judul', img = '$img', harga = '$harga', power = '$power', top_speed = '$top_speed', torque = '$torque', deskripsi = '$deskripsi' WHERE id = $id");

                }else{
                    
                    $query = mysqli_query($koneksi, "UPDATE product SET judul = '$judul', harga = '$harga', power = '$power', top_speed = '$top_speed', torque = '$torque', deskripsi = '$deskripsi' WHERE id = $id");

                }


                // var_dump($query);
                // die;

                if ($query) {
                    header("Location: our_product.php");
                } else {
                    header("Location: tambah_product.php?status='gagal'");
                }
            }
            ?>
</body>

</html>