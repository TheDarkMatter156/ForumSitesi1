<?php
        session_start();
        include "ayar.php";
        include "ukas.php";
        include "func.php";
        $link = @$_GET["link"];
        $data = $db -> prepare("SELECT * FROM konular WHERE
                konu_link=?
        ");
        $data -> execute([
                $link
        ]);
        $_data = $data -> fetch(PDO::FETCH_ASSOC);

?>
<center>
        <?php include "header.php"; ?>
        <h2><?=$_data["konu_ad"]?></h2>
        <strong>Konu Sahibi:</strong> <?=$_data["konu_uye_id"]?> <a href="profil.php?kadi=admin">Admin</a>
        <p>
                <?=$_data["konu_mesaj"]?>
        </p>
                <small><?=$_data["konu_tarih"]?><small>
        <hr>
        <h3>Yorumlar</h3>
        <a href="profil.php?kadi=ali"><strong>Ali</strong></a>
        <p>
                Lorem ipsum dolor sit amet.
        </p>
        <small>Tarih</small>
        <hr>
        
        <a href="profil.php?kadi=ali"><strong>Ali</strong></a>
        <p>
                Lorem ipsum dolor sit amet.
        </p>
        <small>Tarih</small>
        <hr>

        <a href="profil.php?kadi=ali"><strong>Ali</strong></a>
        <p>
                Lorem ipsum dolor sit amet.
        </p>
        <small>Tarih</small>
        <hr>

        <a href="profil.php?kadi=ali"><strong>Ali</strong></a>
        <p>
                Lorem ipsum dolor sit amet.
        </p>
        <small>Tarih</small>
        <hr>

        <h4>Yorum Yap</h4>
        <form action="" method="post">
            <textarea name="yorum" cols="30" rows="10"></textarea>
            <br>
            <input type="submit" value="Yorum Yap">
        </form>
        // Yorum yapabilmek için <a href="uyelik.php"> Giriş Yap </a> yada <a href="uyelik.php?q=kayıt"> Üye Ol </a>
</center>