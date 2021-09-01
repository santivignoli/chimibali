    <div class="rojo-bg frace2">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <img class="img_01" src="img/footer_img_01x2.png" style="max-width: 600px;">
                </div>
            </div>
        </div>
    </div>


        <!--Footer-Wrap-->
        <div class="footer-wrap">
            <footer>
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 direccion">
                            <section class="widget">
                                <div class="widget-heading">
                                    <img class="logo" src="img/logo_03x2.png" width="200px">
                                </div>
                                <?php
                                $row = $result->fetch_assoc();
                                echo '<p>'.nl2br($row['tex_descripcion']).'</p>';
                                ?>
                            </section>
                        </div>
                       
                        <div class="col-sm-6">
                            <section class="widget redes">
                                <a href="https://www.gojek.com/gofood/" target="_blank" class="btn-gojek"></a>
                                <a href="https://www.facebook.com/ChimiBali-110910480278260/" target="_blank" class="btn-icono-header"><i class="fab fa-facebook-f"></i></a>
                                <a href="https://www.instagram.com/chimibali/" target="_blank" class="btn-icono-header" ><i class="fab fa-instagram"></i></a>
                            </section>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="row copy-suturba">
                        <div class="col-sm-6 copy">
                            <?php
                            $row = $result->fetch_assoc();
                            echo '<p>Chimichurri &copy; '.date('Y').'. '.nl2br($row['tex_descripcion']).'</p>';
                            ?>
                        </div>
                        <div class="col-sm-6 suturba">
                            <a href="http://www.suturbadesign.com.ar" target="_blank"><img src="img/suturba2.png" width="205px"></a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        <!--End Footer-Wrap-->