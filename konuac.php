<?php
    session_start();
    include "ayar.php";
    include "ukas.php";
    include "func.php";

    if (!@$_SESSION["uye_id"]) {
        
        echo '<center><h1>Üye olmayanlar konu paylaşamaz. <a herf="üyelik.php">Üyelik</a><h1><center>';    
        exit;
    }

?>
<center>
    <?php include "header.php"; ?>
    <br><br>
    <h2>Konu Paylaşma</h2>
    <?php
        if ($_POST) {
            $ad    = $_POST["ad"];
            $mesaj = $_POST["mesaj"];
            $link = permalink($ad) ."-". time();
            $dataAdd = $db -> prepare("INSERT INTO konular SET
                konu_ad=?,
                konu_link=?,
                konu_mesaj=?,
                konu_uye_id=?
            ");
            $dataAdd -> execute([
                $ad,
                $link,
                $mesaj,
                @$_SESSION["uye_id"]
            ]);

            if ( $dataAdd ) {
                $data = $db -> prepare("SELECT * FROM konular WHERE
                    konu_uye_id=? 
                    && 
                    konu_link=?
                ");
                $data -> execute([
                    @$_SESSION["uye_id"]
                    $link
                ]);
                $_data = $data -> fetch(PDO::FETCH_ASSOC);
                echo '<p class="alert alert-success">Successfully added. :)</p>';
                
                header("REFRESH:1;URL=konu.php?link" .$_data["konu_link"] );
            } else {
                echo '<p class="alert alert-danger">Oops, you encountered an error while adding it. Please try again. :/</p>';
                
                header("REFRESH:1;URL=konuac.php");
            }

        }
    ?>
    <form action="" method="post">
        <strong>Konu Adı:</strong>
        <input type="text" name="ad"><br>
        <strong>Konu Mesajı:</strong><br>
        <textarea name="mesaj" cols="30" rows="10"></textarea>
        <br>
        <input type="submit" value="Konuyu Aç">
    </form>
    // Konu Paylaşabilmek için <a href="uyelik.php"> Giriş Yap </a> yada <a href="uyelik.php?q=kayıt"> Üye Ol </a>
</center>