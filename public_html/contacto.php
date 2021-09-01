<style type="text/css">
iframe
{
  display: block;
}
</style>

<div id="contacto" >

         <div class="contacto1" >                 
            <div class="container" >                 

                    <div class="row center" style="overflow: hidden;">
                        <div class="col-xs-10 col-xs-offset-1 col-sm-4 col-sm-offset-0 area-1">
                            <div>
                                
                                <img class="img_03 visible-xs" src="img/contacto_img_02bx2.png" width="480px" >

                                <?php
                                $row = $result->fetch_assoc();
                                echo '<h3>'.nl2br($row['tex_descripcion']).'</h3>';
                                echo '<div class="subtitulo_linea" style="width: 225px;"></div>';

                                $row = $result->fetch_assoc();
                                echo '<p>'.nl2br($row['tex_descripcion']).'</p>';
                                ?>

                                <a href="#formulario">CONTACT US</a>

                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-8 area-2">
                            <div class="v-animation noframe" data-animation="fade-in" data-delay="0">
                                                           
                              <img class="img_01" src="img/contacto_img_01x2.png" width="422px">
                              <img class="img_02" src="img/contacto_img_02bx2.png" width="480px">                                         

                            </div>
                        </div>
                    </div>
             </div>
        </div>


    <div id="formulario" class="contacto2">     

        <div class="container">                 

            <div class="row center">
                <div class="col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-0 area-1">
                    <div>
                        
                        <img class="visible-xs" src="img/salchichasx2.png" style="max-width: 230px; margin: auto; margin-bottom: 30px;">

                        <?php
                        $row = $result->fetch_assoc();
                        echo '<h3>'.nl2br($row['tex_descripcion']).'</h3>';
                        echo '<div class="subtitulo_linea" style="width: 138px; background: #545454;"></div>';

                        $row = $result->fetch_assoc();
                        echo '<p style="max-width: 360px;"">'.nl2br($row['tex_descripcion']).'</p>';
                        ?>

                        <img class="hidden-xs" src="img/salchichasx2.png" style="max-width: 200px;">

                    </div>
                </div>

                <div class="col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-0 area-2">
                    <div>
                       
                        <form action="#" method="POST" id="form_contacto">
                            <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Name">
                            <input type="text" class="form-control" name="mail" id="mail" placeholder="E-mail">                                   
                            <textarea class="form-control" rows="8" name="mensaje" id="mensaje" placeholder="Message" style="height: 392px;"></textarea>
                            <div id="area-mensaje"></div>
                            <input class="btn_send" type="submit" value="SEND">
                        </form>

                    </div>
                </div>
            </div>
        </div>
       

    </div>

    <div id="mapa">
        <iframe class="hidden-xs" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3942.5693777098204!2d115.16386911478514!3d-8.826461693661502!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd25bf2269e5dfb%3A0x9e9812dd6acdad06!2sChimichurri!5e0!3m2!1sen!2sqa!4v1574785468615!5m2!1sen!2sqa" width="100%" height="345" frameborder="0" style="border:0;" allowfullscreen="" style="margin-bottom: 0px; padding-bottom: 0px;"></iframe>
       	<iframe class="visible-xs" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3942.5693777098204!2d115.16386911478514!3d-8.826461693661502!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd25bf2269e5dfb%3A0x9e9812dd6acdad06!2sChimichurri!5e0!3m2!1sen!2sqa!4v1574785468615!5m2!1sen!2sqa" width="100%" height="245" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
   </div>
</div>