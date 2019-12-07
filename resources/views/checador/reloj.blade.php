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

  <link rel="stylesheet" type="text/css" href="{{asset('css/reloj.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition lockscreen">
<!-- Automatic element centering -->
<div class="lockscreen-wrapper" style="margin-top: 5%">

      @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Error!</strong> No existe un usuario con esa matricula.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      @endif

      <div class="lockscreen-logo">
        <a href="../../index2.html"><b>UABCS</b>Dasc</a>
      </div>

      <div class="wrap">
          <div class="widget">
              <div class="fecha">
                  <p id="diaSemana" class="diaSemana"></p>
              </div>
              <div class="reloj">
                  <p id="hora" class="hora"></p>
              </div>
          </div>
      </div>

      <!-- User name -->

      <!-- START LOCK SCREEN ITEM -->
      <div class="lockscreen-item">
        <!-- lockscreen image -->
        <div class="lockscreen-image">
          <img src="{{asset('app_assets/dist/img/userIcon.jpg')}}" alt="User Image">
        </div>
        <!-- /.lockscreen-image -->

        <!-- lockscreen credentials (contains the form) -->
        <form class="lockscreen-credentials" method="POST" action="/checador">
          @csrf
          <div class="input-group">
            <input type="text" name="matricula" class="form-control" placeholder="matricula">

            <div class="input-group-append">
              <button type="submit" class="btn"><i class="fas fa-arrow-right text-muted"></i></button>
            </div>
          </div>
        </form>
        <!-- /.lockscreen credentials -->

      </div>
      <!-- /.lockscreen-item -->
      <div class="help-block text-center" style="font-weight: bold;">
        Ingresa tu matricula para checar tu entrada
      </div>
      
    </div>
<!-- /.center -->

<!-- jQuery -->
<script src="{{asset('app_assets/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('app_assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<script src="{{asset('js/reloj.js')}}"></script>
</body>
</html>
