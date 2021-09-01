<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<?php
$this->load->view('templates/head');
?>

<body>
	<!-- begin #page-container -->
	<div id="page-container" class="fade page-sidebar-fixed page-header-fixed">
		<?php
		$this->load->view('templates/header');
		$this->load->view('templates/menu');
		?>
		
		<!-- begin #content -->
		<div id="content" class="content">
			<?php
            $this->load->view('templates/title_grocery');
            ?>

			<!-- begin row -->
			<div class="row">
				<!-- begin col-8 -->
				<div class="col-md-12">
					<div class="panel panel-inverse">
						<div class="panel-heading">
							<h4 class="panel-title">Menu</h4>
						</div>
						<div class="panel-body">
							<?php echo $output; ?>
						</div>
					</div>
				</div>
				<!-- end col-8 -->
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

</body>
</html>
