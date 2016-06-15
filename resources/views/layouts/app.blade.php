<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Sistema de Programacion de Cirugias</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="{{ asset('plugins/font-awesome/css/font-awesome.min.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/jquery-bootstrap-datepicker.css') }}">
    
   
    
    <link rel="stylesheet" href="{{ asset('css/bootswatch/journal.css') }}">

    <link rel="stylesheet" href="{{ asset('plugins/chosen/chosen.css') }}">
    <link rel="stylesheet" href="{{ asset('css/themesolar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/w3.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datetextentry/datetextentry.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/timepicker/jquery.timepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('css/chosen-bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/toastr/css/toastr.min.css') }}">
    @yield('css')
    
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

</head>
<body id="app-layout">
    @include('layouts.nav')
    <section>
        <div class="container spark-screen">
             <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="panel panel-primary">
                        <div class="panel-heading">@yield('title')</div>
                        <div class="panel-body">

                           
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
   
<footer class="footer">
    <p class="text-muted text-white"> &copy;  {{date('Y')}} ISSSTE BAJA CALIFORNIA Por: Hector Ricardo Fuentes Armenta Ext. 10650</p>
</footer>
    <!-- JavaScripts -->
    <script src="{{ asset('plugins/jquery/js/jquery.js') }}"></script>
    
    <script src="{{ asset('plugins/datepicker/js/jquery-ui.js') }}"></script>
    <script src="{{ asset('plugins/datepicker/js/ui.datepicker-es-MX.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.js') }}"></script>
    <script src="{{ asset('plugins/chosen/chosen.jquery.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    <script src="{{ asset('plugins/datetextentry/datetextentry.js') }}"></script>
    <script src="{{ asset('plugins/timepicker/jquery.timepicker.min.js') }}"></script>
    <script src="{{ asset('plugins/toastr/js/toastr.min.js') }}"></script>
    <script type="text/javascript" src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.11/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.1.2/js/dataTables.buttons.min.js"></script>    
<script type="text/javascript" src="//cdn.datatables.net/buttons/1.1.2/js/buttons.flash.min.js"></script>    
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>    
<script type="text/javascript" src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>    
<script type="text/javascript" src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>    
<script type="text/javascript" src="//cdn.datatables.net/buttons/1.1.2/js/buttons.html5.min.js"></script> 
<script type="text/javascript" src="//cdn.datatables.net/buttons/1.1.2/js/buttons.print.min.js"></script>    
    
    @yield('js')
   
</body>
</html>
