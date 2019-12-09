<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>UABCS DASC | Checador</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('app_assets/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('app_assets/dist/css/adminlte.min.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="margin-left: 0px">

      

    <!-- Content Header (Page header) -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            @if(!empty($checkEntrada))
              <div class="callout callout-info" style="margin-top: 1.5%; background:#2B4B68; color: white;">
                <h5><i class="far fa-check-circle"></i> Entrada Registrada</h5>
                Esta pagina solo estara disponible durante unos segundos.

                <h4 class="segundos float-right" style="font-size: 50px; margin-top: -3%; font-weight: bold;"></h4>
              </div>
            @endif  

            @if($check->status == "concluida")
              <div class="callout callout-info" style="margin-top: 1.5%; background: #901b26; color: white;">
                <h5><i class="far fa-check-circle"></i> Salida Registrada</h5>
                Esta pagina solo estara disponible durante unos segundos.

                <h4 class="segundos float-right" style="font-size: 50px; margin-top: -3%; font-weight: bold;"></h4>
              </div>
            @endif

            @if($check->status == "noAceptado")
              <div class="callout callout-info" style="margin-top: 1.5%; background: #f74341; color: white;">
                <h5><i class="fas fa-ban"></i> Check no Registrado</h5>
                La entrada y la salida no fueron registradas el mismo dia.

                <h4 class="segundos float-right" style="font-size: 50px; margin-top: -3%; font-weight: bold;"></h4>
              </div>
            @endif

            <!-- Main content -->
            <div class="invoice p-3 mb-3" style="background: #dfefef;">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <div class="container-fluid">
                      <div class="row">
                        <div class="col-md-9">
                          <div class="card">
                            <div class="card-header p-2">
                              <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Actividad</a></li>
                              </ul>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                              <div class="tab-content">
                                <div class="active tab-pane" id="activity">
                                  <!-- Post -->
                                  <div class="card-body">
                                    @if(!empty($checkEntrada))
                                      <div class="form-group">
                                        <label for="inputName">Información de Entrada</label>
                                        <div class="text-muted">
                                          <label class="ml-4"><a href="#">Hora de entrada :</a> {{$check->horaEntrada}}</label>
                                        </div>
                                      </div>
                                    @endif
                                    @if($check->status == "concluida")
                                      <div class="form-group">
                                        <label for="inputName">Informacion de salida</label>
                                        <div class="text-muted">
                                          <label class="ml-4"><a href="#">Hora de entrada :</a> {{$check->horaEntrada}}</label><br>
                                          <label class="ml-4"><a href="#">Hora de salida :</a> {{$check->horaSalida}}</label><br>
                                          <label class="ml-4"><a href="#">Duración :</a> {{$check->duracion}}</label>
                                        </div>
                                      </div>
                                    @endif
                                    <div class="form-group">
                                      <label for="inputName">Total de entradas</label>
                                      <div class="text-muted">
                                        <label class="ml-4"><a href="#">Total checks :</a> {{$checks}}</label>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label for="inputDescription">Proyectos</label>
                                      <div class="text-muted">
                                        <label class="ml-4"><a href="#">Total proyectos :</a>{{$numProyectosUsuario}}</label>
                                      </div>
                                    </div>
                                  </div>
                                  <!-- /.post -->
                                </div>
                              </div>
                              <!-- /.tab-content -->
                            </div><!-- /.card-body -->
                          </div>
                          <!-- /.nav-tabs-custom -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-3">

                          <!-- Profile Image -->
                          <div class="card card-primary card-outline" style="border-top:#11d64d">
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
                                  <b>F. Nacimiento:</b> <a class="float-right">{{$usuario->fechaNacimiento}}</a>
                                </li>
                                <li class="list-group-item">
                                  <b>Telefono:</b> <a class="float-right">{{$usuario->telefono}}</a>
                                </li>
                                <li class="list-group-item">
                                  <b>Email:</b> <a class="float-right">{{$usuario->email}}</a>
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
                    </div>
                    

                  </h4>
                </div>
                <!-- /.col -->
              </div>
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('app_assets/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('app_assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('app_assets/dist/js/adminlte.min.js')}}"></script>

<script src="{{asset('js/tiempoChecador.js')}}"></script>

<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
</body>
</html>
