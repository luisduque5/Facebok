@extends('layouts.app')

@section('content')
<body style="background-color: gray">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <!--Cambio de texto al encabezado, para indicar que es un area de publicaciones-->
                    <b><div style="color: blue; font-size: 20px;" class="card-header">{{ __('Inicio') }}</div></b>
    
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <!--Se indica el nombre de la persona que ha iniciado sesión-->
                        <b style="font-size: 18px">{{ __(Auth::user()->name)}}</b><br>
                        <label style="color: blue; font-size: 17px;">¿En que estas pensando?: </label><br>
                        <input type="text" style="width: 700px;"><br><hr>
                        <label for="img" style="color: blue; width: 353px">Añadir foto/img</label>
                        <input type="file" style="visibility: hidden" id = "img" name = "img" required>                    
                        <input type="submit" style="background-color: blue; color: white;" value="Publicar">
                    </div>
                </div>
            </div>
        </div>     
    </div>
    <br>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <b><div style="color: blue; font-size: 20px;" class="card-header">Pulicaciones</div></b>
                    <div class="card-body">
                        <publicaciones/>
                    </div>
                </div>            
            </div>
        </div>        
    </div>           
</body>
@endsection
