<div id="chef" >

        <img class="sello" src="img/sellox2.png" width="230px">

        <div class="container" >                 

            <div class="row center">

                <div class="col-xs-10 col-xs-push-1 col-sm-5 col-sm-push-7 area-2" style="max-width: 410px;">
                    <div class="v-animation noframe" data-animation="fade-in" data-delay="0">  

                        <?php
                        $row = $result->fetch_assoc();
                        echo '<h3>'.nl2br($row['tex_descripcion']).'</h3>';
                        echo '<div class="subtitulo_linea" style="width: 173px;"></div>';

                        $row = $result->fetch_assoc();
                        echo '<p>'.nl2br($row['tex_descripcion']).'</p>';
                        ?>

                    </div>
                </div>

                 <div class="col-sm-7 col-sm-pull-5 area-1">
                    <div class="v-animation noframe" data-animation="fade-in" data-delay="0">
                        
                        <img class="chef_img" src="img/chef_01.png">

                    </div>
                </div>

            </div>
        </div>

       <div class="bg"></div>

</div>