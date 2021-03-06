<header class="app-header navbar">
        <button class="navbar-toggler mobile-sidebar-toggler d-lg-none mr-auto" type="button">
          <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="frmGrafico.php"></a>
        <button class="navbar-toggler sidebar-toggler d-md-down-none" type="button">
          <span class="navbar-toggler-icon"></span>
        </button>
        <ul class="nav navbar-nav d-md-down-none">
            <li class="nav-item px-3">
                <a class="nav-link" href="http://localhost/mvcRestaurante/Vista/grafico.php">Escritorio</a>
            </li>
            <li class="nav-item px-3">
                <a class="nav-link" href="frmGrafico.php">Configuraciones</a>
            </li>
        </ul>
        <ul class="nav navbar-nav ml-auto">
           

            <li class="nav-item d-md-down-none">
                <a class="nav-link" href="#" data-toggle="dropdown">
                    <i class="icon-bell"></i>
                    <span class="badge badge-pill badge-danger" id="notificacion"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <div class="dropdown-header text-center">
                        <strong>Notificaciones</strong>
                    </div>
                    <a class="dropdown-item" href="#" >
                        <i class="fa fa-envelope-o"></i> Confirmar
                        <span class="badge badge-success" id="confirmar"></span>
                    </a>
                    <a class="dropdown-item" href="#">
                        <i class="fa fa-tasks"></i> Salida
                        <span class="badge badge-danger">0</span>
                    </a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                    
                    <span class="d-md-down-none"><?php echo $_SESSION["usuario"]?> </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <div class="dropdown-header text-center">
                        <strong>Cuenta</strong>
                    </div>
                    <a class="dropdown-item" href="#"><i class="fa fa-user"></i> Perfil</a>
                    <a class="dropdown-item" href="salir"><i class="fa fa-lock"></i> Cerrar sesión</a>
                </div>
            </li>
        </ul>
    </header>