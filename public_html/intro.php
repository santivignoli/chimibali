<div id="intro" >

      <img class="intro_img_02" src="img/intro_02x2.png" width="280px">

        <div class="container" >                 

            <div class="row center">

                <div class="col-sm-5 area-2 hidden-xs">
                    <div class="v-animation noframe" data-animation="fade-in" data-delay="0">  
                    
                        <img class="intro_img_01" src="img/intro_01x2.png" width="377px">

                    </div>
                </div>


                 <div class="col-xs-10 col-xs-offset-1 col-sm-7 col-sm-offset-0 area-1" style="position: relative; max-width: 580px;" >
                    <div class="v-animation noframe" data-animation="fade-in" data-delay="0"> 

                        <?php
                        $row = $result->fetch_assoc();
                        echo '<h3>'.nl2br($row['tex_descripcion']).'</h3>';

                        $row = $result->fetch_assoc();
                        echo '<p>'.nl2br($row['tex_descripcion']).'</p>';
                        ?>

                        <div class="subtitulo_linea hidden-xs" style="width: 35px; background: #545454 ; margin-top: 27px;"> </div>

                        <img class="intro_img_01b visible-xs" src="img/intro_01x2.png" style="max-width: 100%;">

                    </div>
                </div>

            </div>
        </div>
       
       <div class="bg"></div>

</div>