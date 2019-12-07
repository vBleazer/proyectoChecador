@extends('layouts.app')

@section('title','Panel de Configuracion')

@section('content')

	<!-- left column -->
  <div class="col-md-6">
    <!-- general form elements -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Editar Cronometro</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <form role="form" action="/config_segundos" method="POST">
        @csrf
        <div class="card-body">
          <div class="form-group">
            <label for="exampleInputEmail1">Numero de Segundos</label>
            <input type="number" class="form-control" placeholder="Ingrese los segundos" name="segundos">
          </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
          <button type="submit" class="btn btn-primary float-right">Guardar</button>
        </div>
      </form>
    </div>
    <!-- /.card -->

  </div>
@endsection
