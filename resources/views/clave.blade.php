@extends('layouts.app')

@section('content')<br><br>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading">Cambiar la clave de ingreso al sistema</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('usuario.cambiar') }}">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Nueva Clave</label>
                            <div class="col-md-6">
                                <input id="clave" type="text" class="form-control" name="clave" value="" required autofocus>
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Cambiar Contraseña
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
