<?php include_once("include/config.php"); ?>
<!DOCTYPE html>

<html>
<?php
include "head.php";
?>
<body class="transparent-header full-transparent-header" data-spy="scroll" data-target="#navbar-example">

    <?php
    include "header.php";
    ?>

    <div id="container" class="slideshow">

        <div style="width: 100%; height: 100%; position: relative;" class="hidden-xs">
            <img src="img/chevron-down.png" style="position:absolute; bottom:60px; left:50%; margin-left:-10px; color:#FFF;">
            <!-- <video src="img/MasterOpenChimi0111.mp4" width="100%"   autoplay preload></video> -->
            <!-- <video loop autoplay controls="true" width='100%' height='100%' src='img/MasterOpenChimi0111.mp4' type='video/mp4'></video> -->
            <?php
            $row_vid = $videos->fetch_assoc();
            echo "<video width='100%' src='img/".$row_vid['vid_ruta']."' type='video/mp4' muted autoplay playsinline></video>";
            ?>
        </div>

        <div style="width: 100%; height: 100%; position: relative;" class="visible-xs">
            <img src="img/chevron-down.png" style="position:absolute; bottom:60px; left:50%; margin-left:-10px; color:#FFF;">
            <?php
            $row_vid = $videos->fetch_assoc();
            echo "<video width='100%' src='img/".$row_vid['vid_ruta']."' type='video/mp4' muted autoplay playsinline></video>";
            ?>
        </div>

        <div class="v-page-wrap no-bottom-spacing no-top-spacing">

            <?php
            include "intro.php";

            include "info.php";

            include "chef.php";

            include "partner.php";

            include "menu.php";            

            include "contacto.php";
            ?>

        </div>

        <?php
        include "footer.php";
        ?>
    </div>

    <?php
    include "scripts.php";
    ?>
</body>
</html>