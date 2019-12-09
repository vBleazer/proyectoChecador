@extends('layouts.app')


@section('title','Usuario')

@section('content')

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
       <!-- /.col -->
       
       <div class="col-md-9">
        <div class="card">
          <div class="card-header p-2">
            <ul class="nav nav-pills">
              <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Actividad</a></li>
              <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Ultimos Checks</a></li>
              @if(Auth::user()->role == 1 )
                <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Inscribir a Proyecto</a></li>
              @endif
              @if(Auth::user()->role == 2 )
                <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Mis Proyectos</a></li>
              @endif
            </ul>
          </div><!-- /.card-header -->
          <div class="card-body">
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <!-- Post -->
                <div class="card-body">
		          <div class="form-group">
		            <label for="inputName">Checks</label>
		            <div class="text-muted">
		            	<label>{{$checks}}</label>
		            </div>
		          </div>
		          <div class="form-group">
		            <label for="inputDescription">Proyectos</label>
		            <div class="text-muted">
		            	<label>{{$numProyectosUsuario}}</label>
		            </div>
		          </div>
		        </div>
                <!-- /.post -->
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="timeline">
                <!-- The timeline -->
                
                <div class="timeline timeline-inverse">
                  <!-- timeline time label -->
                  
                  <!-- /.timeline-label -->
                  <!-- timeline item -->
                  <div>
                    <i class="far fa-clock bg-primary"></i>
                    @foreach($infoChecks as $infoCheck)
                    <div class="timeline-item mb-4">
                      <span class="time"><i class="fas fa-calendar-alt"></i> {{$infoCheck->fecha}}</span>
                      <h3 class="timeline-header">Actividad Completada</h3>

                      <div class="timeline-body">
                        <span class="time"><i class="far fa-clock"></i> Hora de Entrada  {{$infoCheck->horaEntrada}}</span><br>
                        <span class="time"><i class="far fa-clock"></i> Hora de Salida  {{$infoCheck->horaSalida}}</span><br>
                        <span class="time"><i class="fas fa-hourglass-end"></i> Duracion  {{$infoCheck->duracion}}</span>
                      </div>
                      <div class="timeline-footer">
                        
                      </div>
                    </div>
                    @endforeach
                  </div>
                  <!-- END timeline item -->
                </div>
              </div>
              <!-- /.tab-pane -->
              @if(Auth::user()->role == 1 )
                <div class="tab-pane" id="settings">
                  <form class="form-horizontal" method="POST" action="/inscribeToProject/{{$usuario->id}}">
                    @csrf
                    <div class="form-group row">
                      <label for="inputName" class="col-sm-2 col-form-label">Proyecto</label>
                      <div class="col-sm-10">
                        <select class="form-control" name="proyecto">
                          @foreach($proyectos as $proyecto)
                          <option value="{{$proyecto->id}}">{{$proyecto->nombre}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="offset-sm-2 col-sm-10">
                        <button type="submit" class="btn btn-primary">Inscribir</button>
                      </div>
                    </div>
                  </form>
                </div>
              @endif

              @if(Auth::user()->role == 2 )
                <div class="tab-pane" id="settings">
                  <div class="timeline timeline-inverse">
                      <div>
                        @foreach($misProyectos as $proyecto)
                          <i class="fas fa-project-diagram bg-info"></i>
                          <div class="timeline-item mb-2">
                            <span class="time"><i class="far fa-clock"></i> {{$proyecto->created_at}}</span>

                            <h3 class="timeline-header border-0"><a href="proyecto_detail/{{$proyecto->id}}">{{$proyecto->nombre}}</a>
                            </h3>
                          </div>
                        @endforeach
                      </div>
                      <!-- END timeline item -->
                      <!-- timeline item -->
                    </div>
                      
                    
                </div>
              @endif
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div><!-- /.card-body -->
        </div>
        <!-- /.nav-tabs-custom -->
      </div>


      <div class="col-md-3">

        <!-- Profile Image -->
        <div class="card card-primary card-outline">
          <div class="card-body box-profile">
            <div class="text-center">
              <img class="profile-user-img img-fluid img-circle"
                   src="{{asset('app_assets/dist/img/usuario.png')}}"
                   alt="User profile picture">
            </div>

            <h3 class="profile-username text-center">{{$usuario->nombre}}</h3>

            <p class="text-muted text-center">{{$usuario->apellidos}}</p>

            <ul class="list-group list-group-unbordered mb-3">
              <li class="list-group-item">
                <b>F. Nacimiento</b> <a class="float-right">{{$usuario->fechaNacimiento}}</a>
              </li>
              <li class="list-group-item">
                <b>Telefono</b> <a class="float-right">{{$usuario->telefono}}</a>
              </li>
              <li class="list-group-item">
                <b>Email</b> <a class="float-right">{{$usuario->email}}</a>
              </li>
              <li class="list-group-item">
                <b>Matricula</b> <a class="float-right">{{$usuario->matricula}}</a>
              </li>
            </ul>

          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>


     
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->

@endsection