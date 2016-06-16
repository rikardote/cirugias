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
                    <li class="dropdown {{ Request::segment(1) === 'programar_cirugia' || Request::segment(1) === 'citas' ? 'active' : null  }}">
                            <a href="{{route('programar_cirugia.index')}}"> Programar Cirugias   </a>
                    </li>
                   
                     
                    <li class="{{ Request::segment(1) === 'medicos' ? 'active' : null  }}">
                            <a href="{{route('medicos.index')}}">Medicos </a>
                            
                    </li>

                    <li class="{{ Request::segment(1) === 'pacientes' ? 'active' : null  }}">
                            <a href="{{route('pacientes.index')}}">Pacientes </a>
                            
                    </li>
                     <li class="{{ Request::segment(1) === 'anestesiologos' ? 'active' : null  }}">
                            <a href="{{route('anestesiologos.index')}}">Anestesiologos </a>
                            
                    </li>
                     <li class="{{ Request::segment(1) === 'cirugias' ? 'active' : null  }}">
                            <a href="{{route('cirugias.index')}}">Cirugias </a>
                            
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
                    @if (Auth::guest())
                       
                            <li><a href="{{ url('/login') }}">Login</a></li>
       
                        <li><a href="{{ url('/register') }}">Registrar</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                
                                    <li>
                                        <a href="{{ url('/themes') }}"><i class="fa fa-btn fa fa-cog"></i>Cambiar Tema</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/registrar') }}"><i class="fa fa-btn fa fa-cog"></i>Administrar Usuarios</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/registrar_medicos') }}"><i class="fa fa-btn fa fa-cog"></i>Administrar Medicos</a>
                                    </li>
                             
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Salir</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>