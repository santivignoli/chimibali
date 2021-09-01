		<!-- begin #sidebar -->
		<div id="sidebar" class="sidebar">
			<!-- begin sidebar scrollbar -->
			<div data-scrollbar="true" data-height="100%">
				<!-- begin sidebar nav -->
				<ul class="nav">
					<li class="nav-header">MENU</li>
					<?php
					$paginas = $this->paginas_model->get_items();
					foreach ($paginas as $key_pag => $pagina)
					{
						if($this->usuarios_model->check_permisos($this->session->userdata('ut_id'), $pagina['pag_class'], $pagina['pag_method']))
						{
							$active = "";
							if($this->router->fetch_class() == $pagina['pag_class'])
							{
								$active = "active";
							}

							$subpaginas = $this->paginas_model->get_subitems($pagina['pag_id']);
							if(!$subpaginas)
							{
								echo '<li class="'.$active.'">
									<a href="'.site_url($pagina['pag_class'].'/'.$pagina['pag_method']).'">
									    <i class="'.$pagina['pag_icono'].'"></i>
									    <span>'.$pagina['pag_nombre'].'</span>
								    </a>
								</li>';
							}
							else
							{
								echo '<li class="has-sub '.$active.'">
									<a href="javascript:;">
									    <b class="caret pull-right"></b>
									    <i class="'.$pagina['pag_icono'].'"></i> 
									    <span>'.$pagina['pag_nombre'].'</span>
									</a>
									<ul class="sub-menu">';
									foreach ($subpaginas as $key_subpag => $subpagina)
									{
										$subactive = "";
										if($this->router->fetch_class() == $subpagina['pag_class'] && $this->router->fetch_method() == $subpagina['pag_method'])
										{
											$subactive = "active";
										}
										echo '<li class="'.$subactive.'"><a href="'.site_url($subpagina['pag_class'].'/'.$subpagina['pag_method']).'">'.$subpagina['pag_nombre'].'</a></li>';
									}
								echo '</ul>
								</li>';
							}
						}
						else
						{
							//echo "no tiene permiso<br>";
						}
					}
					?>
			        <!-- begin sidebar minify button -->
					<li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="fa fa-angle-double-left"></i></a></li>
			        <!-- end sidebar minify button -->
				</ul>
				<!-- end sidebar nav -->
			</div>
			<!-- end sidebar scrollbar -->
		</div>
		<div class="sidebar-bg"></div>
		<!-- end #sidebar -->