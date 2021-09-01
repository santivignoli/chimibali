<div  id="menu">

    <div class="container">

       <!-- <img class="hidden-xs" src="img/menu_bg.jpg" style="position: absolute; top: 0px; left: 0px; width: 100% ">
       <img class="visible-xs" src="img/menu_bg2.jpg" style="position: absolute; top: 0px; left: 0px; width: 100% "> -->

        <div class="row center">
            <div class="col-sm-8 col-sm-offset-2">
                <div class="v-animation noframe" data-animation="fade-in" data-delay="200">

                    <div class="img">

                      <?php
                      $row_menu = $menu->fetch_assoc();
                      echo '<img class="menu" src="img/'.$row_menu['menu_ruta'].'" >';
                      ?>
                      
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>