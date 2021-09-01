    <!--Header-->
    <div class="header-container hidden-xs">

        <header class="header fixed clearfix" style="display:none;">
            <div class="container">

                <!--Site Logo-->
                <div class="logo" data-sticky-logo="img/logo-white.png" data-normal-logo="img/logo_01x2.png">
                    <a href="#">
                        <img alt="Chasing Talent" src="img/logo_01x2.png" data-logo-height="35">
                    </a>
                </div>
                <!--End Site Logo-->

                <div class="navbar-collapse nav-main-collapse collapse">

                    <!--Main Menu-->
                    <nav class="nav-main mega-menu" id="navbar-example">
                        <ul class="nav nav-pills nav-main" id="mainMenu" role="tablist">
                            <li>
                                <a data-hash href="#intro">HOME</a>
                            </li>
                            <li class="">
                                <a data-hash href="#chef">ABOUT</a>
                            </li>
                            <li class="">
                                <a data-hash href="#menu">MENU</a>
                            </li>
                            <li class="">
                                <a data-hash href="#formulario">CONTACT US</a>
                            </li>
                            <li class="">
                                <a data-hash href="#mapa">FIND US</a>
                            </li>
                        </ul>
                    </nav>
                    <!--End Main Menu-->
                    
                </div>
            </div>
        </header>

    </div>
    <!--End Header-->


    <!--Header-->
    <div class="header-container visible-xs">

        <header class="header fixed clearfix" style="display:none;">
            <div class="container" style="background:#231f20;">

                <!--Site Logo-->
                <div class="logo" data-sticky-logo="img/logo_01x2.png" data-normal-logo="img/logo_01x2.png" style="height:58px;">
                    <a href="#">
                        <img alt="Chasing Talent" src="img/logo_01x2.png" style="height:38px;">
                    </a>
                </div>
                <!--End Site Logo-->

                <div class="navbar-collapse nav-main-collapse collapse" style="background:#5E5E5E; text-align:center; padding:0px;">

                    <!--Main Menu-->
                    <nav class="nav-main mega-menu" style="color:#fff; padding:0px;">
                        <ul class="nav nav-pills nav-main" id="mainMenu" style="margin:0px;">
                            <li class="menu_cel">
                                <a data-hash href="#intro" onclick="cerrar_menu_cel()">HOME</a>
                            </li>
                            <li class="menu_cel">
                                <a data-hash href="#chef" onclick="cerrar_menu_cel()">ABOUT</a>
                            </li>
                            <li class="menu_cel">
                                <a data-hash href="#menu" onclick="cerrar_menu_cel()">MENU</a>
                            </li>
                            <li class="menu_cel">
                                <a data-hash href="#formulario" onclick="cerrar_menu_cel()">CONTACT US</a>
                            </li>
                            <li class="menu_cel">
                                <a data-hash href="#mapa" onclick="cerrar_menu_cel()">FIND US</a>
                            </li>
                        </ul>
                    </nav>
                    <!--End Main Menu-->
                    
                </div>
                <button id="btn_menu" class="btn btn-responsive-nav btn-inverse" data-toggle="collapse" data-target=".nav-main-collapse" style="top:10px;" onclick="cambiar_boton_menu()">
                    <i class="fa fa-bars fa-lg"></i>
                </button>
                <button id="btn_menu2" class="btn btn-responsive-nav btn-inverse" data-toggle="collapse" data-target=".nav-main-collapse" style="top:10px; display:none;" onclick="cambiar_boton_menu2()">
                    <i class="fa fa-times fa-lg" style="padding:0px 2px 0px 1px;"></i>
                </button>
            </div>
        </header>

    </div>
    <!--End Header-->