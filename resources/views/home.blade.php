@extends('layouts.app')

<link rel="stylesheet" type="text/css" href="{{asset('css/reloj.css')}}">

@section('title', 'Checar')

@section('content')
<div class="hold-transition lockscreen">
    <div class="lockscreen-wrapper" style="margin-top: 0px">
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
      <div class="lockscreen-name">{{ Auth::user()->nombre }}</div>

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
      <div class="help-block text-center">
        Ingresa tu matricula para checar tu entrada
      </div>
      
    </div>
    
</div>
@endsection
