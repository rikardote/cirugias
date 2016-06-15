<nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#spark-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
               
                <a class="navbar-brand" href="/">
                    <img style="display: inline-block; height: 55px; margin-top: -15px"
             src="/fotos/issste_simple.png">
             </a>
                
            </div>
        
            <div class="collapse navbar-collapse" id="spark-navbar-collapse">
                <!-- Left Side Of Navbar -->
               
                <ul class="nav navbar-nav">
                    <li class="dropdown {{ Request::segment(1) === 'agenda' || Request::segment(1) === 'citas' ? 'active' : null  }}">
                            <a href="/"> Cirugias   </a>
                    </li>
                   
                     <li class="dropdown 
                        {{ Request::segment(1) === 'medicos' || Request::segment(2) === 'permisos' || 
                            Request::segment(1) === 'especialidades' || Request::segment(1) === 'horarios' ? 'active' : null  }}">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                Medicos <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li class="{{ Request::segment(1) === 'medicos' ? 'active' : null  }}"><a href="{{route('medicos.index')}}">Consultar Medicos</a></li>
                                
                            </ul>
                        </li>

                    <li class="{{ Request::segment(1) === 'pacientes' ? 'active' : null  }}">
                            <a href="{{route('pacientes.index')}}">Pacientes </a>
                            
                    </li>
                    <li class="dropdown {{ Request::segment(1) === 'reportes' ? 'active' : null }}">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            Reportes <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#">Reporte Diario de Citas</a></li>
                        </ul>
                    </li>
                    
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    
                </ul>
            </div>
        </div>
    </nav>