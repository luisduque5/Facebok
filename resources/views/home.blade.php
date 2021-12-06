@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <!--Cambio de texto al encabezado, para indicar que es un area de publicaciones-->
                <b><div style="color: blue; font-size: 20px;" class="card-header">{{ __('Publicaciones') }}</div></b>

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
    <publicaciones/>
</div>
@endsection
