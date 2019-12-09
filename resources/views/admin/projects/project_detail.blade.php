@extends('layouts.app')


@section('title','Detalles del proyecto')

@section('content')

<!-- Main content -->
<section class="content" >
  <div class="row">
    <!--Miembros del Proyecto-->
    <div class="col-md-6" >

      <div class="card card-info">
        <div class="card-header" style="background-color: #2B4B68;">
          <h3 class="card-title">Miembros del Proyecto</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
          </div>
        </div>
        <div class="card-body p-0" >
          <table class="table">
            <thead>
              <tr>
                <th>Nombre</th>
                @if(Auth::user()->role == 1)
                <th>Ver</th>
                @endif
              </tr>
            </thead>
            <tbody>
              @foreach($users as $user)
              <tr>
                <td>{{$user->nombre}} {{$user->apellidos}}</td>
                @if(Auth::user()->role == 1)
                  <td class="py-0 align-middle">
                    <div class="btn-group btn-group-sm">
                      <a href="/usuario_detail/{{$user->id}}" class="btn btn-info"><i class="fas fa-eye"></i></a>
                    </div>
                  </td>
                @endif
               </tr>
               @endforeach
              
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>

    <!--proyecto-->
    <div class="col-md-6">
      <div class="card card-primary">
        <div class="card-header" style="background-color: #2B4B68;">
          <h3 class="card-title">Proyecto</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
          </div>
        </div>
        <div class="card-body">
          <div class="form-group">
            <label for="inputName">Nombre del Proyecto</label>
            <div class="text-muted">
            	<label>{{$project->nombre}}</label>
            </div>
          </div>
          <div class="form-group">
            <label for="inputDescription">Descripcion</label>
            <div class="text-muted">
            	<label>{{$project->descripcion}}</label>
            </div>
          </div>
          <div class="form-group">
            <label for="inputStatus">Feha de Inicio</label>
            <div class="text-muted">
            	<label>{{$project->fechaInicio}}</label>
            </div>
          </div>
          <div class="form-group">
            <label for="inputClientCompany">Fecha de Cierre</label>
            <div class="text-muted">
            	<label>{{$project->fechaCierre}}</label>
            </div>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>

  </div>
</section>
<!-- /.content -->

@endsection