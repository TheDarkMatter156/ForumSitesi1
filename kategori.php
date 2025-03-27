<?php
    session_start();
    include "ayar.php";
    include "ukas.php";
    include "func.php";
    $q = @$_GET["q"];
    $data = $db -> prepare("SELECT * FROM kategoriler WHERE
        k_kategori_link=?
    ");
    $data -> execute([
        $q
    ]);
    $_data = $data -> fetch(PDO::FETCH_ASSOC);


?>
<center>
     <?php include "header.php"; ?>
     <h2><?=$_data["k_kategori"]?></h2>
     <ul>
        <li><a href="">Kategori içindeki başlıklar</a></li>
        <li><a href="">Kategori içindeki başlıklar</a></li>
        <li><a href="">Kategori içindeki başlıklar</a></li>
        <li><a href="">Kategori içindeki başlıklar</a></li>
        <li><a href="">Kategori içindeki başlıklar</a></li>
        <li><a href="">Kategori içindeki başlıklar</a></li>
        <li><a href="">Kategori içindeki başlıklar</a></li>
        <li><a href="">Kategori içindeki başlıklar</a></li>
        <li><a href="">Kategori içindeki başlıklar</a></li>
        <li><a href="">Kategori içindeki başlıklar</a></li>
     </ul>
</center>