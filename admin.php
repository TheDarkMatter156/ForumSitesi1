<?php
    session_start();
    include "ayar.php";
    include "ukas.php";
    include "func.php";
    if (@$_SESSION["uye_onay"] !== 1) {
        echo'<center><h1>Sadece Yöneticiler Girebilir</h1><center>';
        exit;
    }

?>
<center>
    <?php include "header.php"; ?>
    <br><br>
    <h2>Admin Paneli</h2>
    <hr>
    <h3>Kategori Ekle</h3>
    <?php
        if ($_POST) {
            $kategori = $_POST["kategori"];
            $kategorilink = permalink($kategori);
            
            $dataAdd = $db -> prepare("INSERT INTO kategoriler SET
                k_kategori=?,
                k_kategori_link=?
            ");
            $dataAdd -> execute([
                $kategori,
                $kategorilink
            ]);

            if ( $dataAdd ) {
                echo '<p class="alert alert-success">Kategori başarıyla eklendi. :)</p>';
                
                header("REFRESH:1;URL=admin.php");
            } else {
                echo '<p class="alert alert-danger">Bir hata oluştu. Lütfen tekrar deneyin. :/</p>';
                
                header("REFRESH:1;URL=admin.php");
            }
                    }
    ?>
    <form action="" method="post">
        <strong>Kategori:</strong>
        <input type="text" name="kategori">
        <br>
        <input type="submit" value="Kategori Oluştur">
    </form>
    <hr>
    <ol>
        <?php
            $dataList = $db -> prepare("SELECT * FROM kategoriler");
            $dataList -> execute();
            $dataList = $dataList -> fetchALL(PDO::FETCH_ASSOC);
            
            foreach($dataList as $row){
                echo '<li><a href="kategori.php?q='.$row["k_kategori_link"].'">'.$row["k_kategori"].'</a></li>';
            }            
        ?>
    </ol>
    
</center>