    <!-- Libs -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.flexslider-min.js"></script>
    <script src="js/jquery.easing.js"></script>
    <script src="js/jquery.fitvids.js"></script>
    <script src="js/jquery.carouFredSel.min.js"></script>
    <script src="js/jquery.validate.js"></script>
    <script src="js/theme-plugins.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/imagesloaded.js"></script>
    <script src="js/view.min-auto.js"></script>

    <script src="plugins/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
    <script src="plugins/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>

    <script src="js/theme-core.js"></script>

    <!-- <script async defer src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDZdoVz0AopEIJGb1oHzmNT50zcaxEdSWY&callback=initMap"></script> -->

    <script type="text/javascript">
    /* -------------------
    Google map
    https://www.google.com.ar/maps/place/Per%C3%BA+345,+C1067AAH+CABA/@-34.6119682,-58.376997,17z/data=!3m1!4b1!4m5!3m4!1s0x95bccad45ec785c3:0xc6e21c530f08a616!8m2!3d-34.6119726!4d-58.3748083?hl=es-419
    ---------------------*/
    /*function initMap() {
        var uluru = {lat: -34.6119726, lng: -58.3748083};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 13,
          center: uluru,
          styles: [ {
          stylers: [ { "saturation":-90 }, { "lightness": 0 }, { "gamma": 0.0 }]},
          ],
          scrollwheel:false,
          draggable: true
        });
        var marker = new google.maps.Marker({
          position: uluru,
          map: map,
          icon: "img/marker.png"
        });
    }*/

    $( "#form_contacto" ).submit(function( event ) {
      event.preventDefault();
      $('#area-mensaje').html("");
      $.ajax({
           type: 'POST',
            data: $(event.target).serialize(),
            cache: false,
            dataType: 'json',
            processData: false, // Don't process the files
            //contentType: false, // Set content type to false as jQuery will tell the server its a query string request
           url: "contacto_ajax.php",
           success: function(data){
              if(data.error == false)
              {
                var htmlData = '<div class="alert with-icon alert-success" role="alert"><i class="icon fa fa-check"></i> ';
                htmlData += data.data;
                htmlData += '</div>';
                $('#area-mensaje').html(htmlData);

                $('#nombre').val("");
                $('#mail').val("");
                $('#telefono').val("");
                $('#mensaje').val("");
              }
              else
              {
                var htmlData = '<div class="alert with-icon alert-danger" role="alert"><i class="icon fa fa-exclamation-triangle"></i> ';
                htmlData += data.data;
                htmlData += '</div>';
                $('#area-mensaje').html(htmlData);
              }
           },
           error: function(x, status, error){
                var htmlData = '<div class="alert with-icon alert-danger" role="alert"><i class="icon fa fa-exclamation-triangle"></i> ';
                htmlData += "An error occurred: " + status + " nError: " + error;
                htmlData += '</div>';
                $('#area-mensaje').html(htmlData);
           }
        });
    });

    $('body').scrollspy({ target: '#navbar-example', offset:100 });

    $('#navbar-example li a').click(function(event) {
        event.preventDefault();
        $($(this).attr('href'))[0].scrollIntoView();
        scrollBy(0, -90);
    });

    function cambiar_boton_menu()
    {
      $('#btn_menu').hide();
      $('#btn_menu2').show();
    }

    function cambiar_boton_menu2()
    {
      $('#btn_menu').show();
      $('#btn_menu2').hide();
    }

    function cerrar_menu_cel()
    {
      $('.navbar-collapse').collapse('hide');
      cambiar_boton_menu2();
    }
    </script>