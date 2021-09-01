		<!-- begin #header -->
		<div id="header" class="header navbar navbar-inverse navbar-fixed-top">
			<!-- begin container-fluid -->
			<div class="container-fluid">
				<!-- begin mobile sidebar expand / collapse button -->
				<div class="navbar-header">
					<a href="<?=site_url()?>" class="navbar-brand" style="background:transparent;"><span class="navbar-logo"><img src="<?=base_url('assets/img/logo.png')?>" class="img-responsive" style="max-height:50px;"></span></a>
					<button type="button" class="navbar-toggle" data-click="sidebar-toggled">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
				<!-- end mobile sidebar expand / collapse button -->
				
				<!-- begin header navigation right -->
				<ul class="nav navbar-nav navbar-right">

					<li class="dropdown navbar-user">
						<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
							<img src="<?=base_url()?>assets/img/user-13.jpg" alt="" /> 
							<span class="hidden-xs"><?=$this->session->userdata('usr_nombre')?> <?=$this->session->userdata('usr_apellido')?></span> <b class="caret"></b>
						</a>
						<ul class="dropdown-menu animated fadeInLeft">
							<!--
							<li class="arrow"></li>
							<li><a href="<?=site_url('usuarios/perfil')?>">Perfil</a></li>
							<li class="divider"></li>
							-->
							<li><a href="<?=site_url('login/logout')?>">Cerrar sesión</a></li>
						</ul>
					</li>
				</ul>
				<!-- end header navigation right -->
			</div>
			<!-- end container-fluid -->
		</div>
		<!-- end #header -->
		