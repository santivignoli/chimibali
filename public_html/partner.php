<div id="partner" >
      
        <div class="container" >                 

            <div class="row center">
                <div class="col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-0 area-1" style="max-width: 480px;">
                    <div class="v-animation noframe" data-animation="fade-in" data-delay="0">
                        
                        <img class="visible-xs" src="img/chancho_02x2.png" style="max-width: 250px;  margin: auto;">

                        <?php
                        $row = $result->fetch_assoc();
                        echo '<h3>'.nl2br($row['tex_descripcion']).'</h3>';
                        echo '<div class="subtitulo_linea" style="width: 120px; background: #545454;"></div>';

                        $row = $result->fetch_assoc();
                        echo '<p>'.nl2br($row['tex_descripcion']).'</p>';
                        ?>

                        <img class="hidden-xs" src="img/chancho_01x2.png" style="max-width: 250px; margin-top: 120px;">

                    </div>
                </div>

                <div class="col-sm-6 area-2">
                    <div class="v-animation noframe" data-animation="fade-in" data-delay="0">

                        <img class="hidden-xs" src="img/chancho_02x2.png" style="max-width: 400px; margin-top: -70px;">

                        <img class="chorizo_img" src="img/chorizo_01x2.jpg">

                        <img class="visible-xs" src="img/chancho_01x2.png" style="max-width: 170px; margin: auto; margin-top: 40px;">

                    </div>
                </div>
            </div>
        </div>

</div>