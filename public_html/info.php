<div id="info" >

        <div class="container" >                 

            <div class="row center">

                <div class="col-xs-12 visible-xs area-2" style="margin-bottom:0px;">
                    <div class="v-animation noframe" data-animation="fade-in" data-delay="0">  

                        <?php
                        $row = $result->fetch_assoc();
                        echo '<h3>'.nl2br($row['tex_descripcion']).'</h3>';
                        echo '<div class="subtitulo_linea" style="width: 287px; background: #545454;"></div>';
                        ?>

                    </div>
                </div>

                <div class="col-xs-10 col-xs-offset-1 col-sm-5 col-sm-offset-0 area-2" >
                    <div class="v-animation noframe" data-animation="fade-in" data-delay="0">  

                        <?php
                        echo '<h3 class="hidden-xs">'.nl2br($row['tex_descripcion']).'</h3>';
                        echo '<div class="subtitulo_linea hidden-xs" style="width: 287px; background: #545454;"></div>';

                        $row = $result->fetch_assoc();
                        echo '<p>'.nl2br($row['tex_descripcion']).'</p>';
                        ?>

                    </div>
                </div>


                 <div class="col-xs-12 col-sm-7 area-1" style=" position: relative;" >
                    <div class="v-animation noframe" data-animation="fade-in" data-delay="0">

                        <img class="info_img" src="img/info_01x2.png" width="586px">
                        
                        <?php
                        $row = $result->fetch_assoc();
                        echo '<p class="frace"><b class="black rojo-f">'.nl2br($row['tex_descripcion']).'</b></p>';
                        ?>

                    </div>
                </div>


            </div>
        </div>

       
       <div class="bg"></div>
  
</div>