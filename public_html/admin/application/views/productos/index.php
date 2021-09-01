<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<?php
$this->load->view('templates/head');
?>

<!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
<link href="<?=base_url()?>assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css" rel="stylesheet" />
<!-- ================== END PAGE LEVEL STYLE ================== -->

<body>
	<!-- begin #page-container -->
	<div id="page-container" class="page-sidebar-fixed page-header-fixed">
		<?php
		$this->load->view('templates/header');
		$this->load->view('templates/menu');
		?>
		
		<!-- begin #content -->
        <div id="content" class="content">
            <?php
            $this->load->view('templates/title');
            ?>
            
            <!-- begin row -->
            <div class="row">
                <!-- begin col-12 -->
                <div class="col-md-12">
                    <!-- begin panel -->
                    <div class="panel panel-inverse">
                        <div class="panel-heading">
                            <h4 class="panel-title">Listado</h4>
                        </div>
                        <div class="panel-body">
                            <?php echo $output; ?>
                        </div>
                    </div>
                    <!-- end panel -->
                </div>
                <!-- end col-12 -->
            </div>
            <!-- end row -->
        </div>
        <!-- end #content -->
		
		<?php
		$this->load->view('templates/footer');
		?>
	</div>
	<!-- end page container -->
	
	<?php
	$this->load->view('templates/scripts');
	?>
	
    <!-- ================== BEGIN PAGE LEVEL JS ================== -->
    <script src="<?=base_url()?>assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
    <!-- ================== END PAGE LEVEL JS ================== -->
    
    <script>
    $(document).ready(function() {
        $('#colorpicker').colorpicker({format: 'hex'});
    });

    function confirm_eliminar(id)
    {
        new PNotify({
               title: "Confirmaci&oacute;n!",
               text: "Esta seguro de que quiere eliminar el item?",
               addclass: "alert-info",
               hide: false,
               confirm: {
                  confirm: true
               },
               buttons: {
                  closer: false,
                  sticker: false
               }
            }).get().on('pnotify.confirm', function() {
               eliminar(id);
               this.remove();
            });
    }

    function eliminar(id)
    {
        var data = {id:id};
        $.ajax({
          url: SITE_URL+'/empresas/eliminar_ajax',
          type: 'POST',
          data: jQuery.param( data ),
          cache: false,
          dataType: 'json',
          processData: false, // Don't process the files
          //contentType: false, // Set content type to false as jQuery will tell the server its a query string request
          success: function(data, textStatus, jqXHR)
          {
            if(data.error == false)
            {
              new PNotify({
                  title: "Perfecto!",
                  text: data.data,
                  addclass: "alert-success"
              });
              $('#item_'+id).remove();
            }
            else
            {
              new PNotify({
                  title: "Error!",
                  text: data.data,
                  addclass: "alert-danger"
              });
            }
          },
          error: function(x, status, error)
          {
            new PNotify({
                title: "Error!",
                text: "An error occurred: " + status + " nError: " + error,
                addclass: "alert-danger"
            });
          }
        });
    }
    </script>

</body>
</html>
