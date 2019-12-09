@extends('layouts.app')

<link rel="stylesheet" type="text/css" href="{{asset('app_assets/sweetalert/sweetalert.css')}}">

@section('title','Modulo de Usuarios')

@section('content')

    <div class="card">
     	<div class="card-header">
     		<div class="container">
     			<div class="row">
					<div class="col-md">
						<h3>Usuarios Registrados</h3>
					</div>
					<div class="col-md">
						<input class="float-right" type="image" src="{{asset('app_assets/dist/img/agregar.png')}}" width="50"  data-toggle="modal" data-target="#Modal" >
						
					</div>
				</div>
     		</div>
     	</div>	
     	<div class="card-body">
     		<div class="row d-flex align-items-stretch registros">
				@foreach($usuarios as $usuario)
					<div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch registro-{{$usuario->id}}">
				      <div class="card bg-light">
				        <div class="card-header text-muted border-bottom-0">
				        </div>
				        <div class="card-body pt-0">
				          <div class="row">
				            <div class="col-7">
				              <h2 class="lead"><b>{{$usuario->nombre}} {{$usuario->apellidos}}</b></h2>
				              <ul class="ml-4 mb-0 fa-ul text-muted">
				              	<li class="small"><span class="fa-li"><i class="fas fa-lg fa-birthday-cake"></i></span> Fecha de nacimiento: {{$usuario->fechaNacimiento}}</li>
				                <li class="small"><span class="fa-li"><i class="fas fa-lg fa-at"></i></span> Correo Electronico: {{$usuario->email}}</li>
				                <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Telefono #: {{$usuario->telefono}}</li>
				              </ul>
				            </div>
				            <div class="col-5 text-center">
				              <img src="{{asset('app_assets/dist/img/usuario-registrados.png')}}" alt="" class="img-circle img-fluid">
				            </div>
				          </div>
				        </div>
				        <div class="card-footer">
				          <div class="text-right">
				          	<button href="#" class="btn btn-danger btn-sm" onclick="deleteThis({{$usuario->id}}, this)">
				              <i class="fas fa-trash"></i> Eliminar
				            </button>
				            <a href="#" class="btn btn-info btn-sm" onclick="getDataBack({{$usuario->id}})" data-toggle="modal" data-target="#ModalEdit">
				              <i class="fas fa-pencil-alt"></i> Editar
				            </a>
				            <a href="/usuario_detail/{{$usuario->id}}" class="btn btn-primary btn-sm">
				              <i class="fas fa-folder"></i> Ver
				            </a>
				          </div>
				        </div>
				      </div>
				    </div>
			    @endforeach
		    </div>	
     	</div>
    </div>



    @section('modals')
    	<!--Modal Agregar -->
    	<div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		    <div class="modal-dialog" role="document">
		      <div class="modal-content">
		        <div class="modal-header">
		          <h5 class="modal-title" id="exampleModalLabel">Agregar Usuario</h5>
		          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
		            <span aria-hidden="true">×</span>
		          </button>
		        </div>
		        <div class="modal-body">
		          <form method="POST" action="/usuario">
		            @csrf
		            <div class="form-group">
		              <label for="exampleInputEmail1">Nombre</label>
		              <input type="text" name="nombre" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ingrese su nombre">
		            </div>
		            <div class="form-group">
		              <label for="exampleInputEmail1">Apellidos</label>
		              <input type="text" name="apellidos" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ingrese sus apellidos">
		            </div>
		            <div class="form-group">
		              <label for="exampleInputEmail1">Fecha de Nacimiento</label>
		              <input type="date" name="fechaNacimiento" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ingrese su fecha de nacimiento">
		            </div>
		            <div class="form-group">
		              <label for="exampleInputEmail1">Telefono</label>
		              <input type="text" name="telefono" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ingrese su telefono">
		            </div>
		            <div class="form-group">
		              <label for="exampleInputEmail1">Matricula</label>
		              <input type="text" maxlength="10" name="matricula" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ingrese su matricula">
		            </div>
		            <div class="form-group">
		              <label for="exampleInputEmail1">Email</label>
		              <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ingrese su correo">
		            </div>
		            <div class="form-group">
		              <label for="exampleInputEmail1">Password</label>
		              <input type="password" name="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ingrese sus password">
		              <small id="emailHelp" class="form-text text-muted">Minimo 8 caracteres</small>
		            </div>
		            <div class="modal-footer">
		              <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
		              <input type="submit" name="" class="btn btn-primary" value="Agregar">
		            </div>
		          </form>
		        </div>
		      </div>
		    </div>
		</div>
		<!--Fin Modal Agregar -->

		<!--Modal Editar -->
		<div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		    <div class="modal-dialog" role="document">
		      <div class="modal-content">
		        <div class="modal-header">
		          <h5 class="modal-title" id="exampleModalLabel">Editar Usuario</h5>
		          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
		            <span aria-hidden="true">×</span>
		          </button>
		        </div>
		        <div class="modal-body">
		          <form method="POST" action="/usuario">
		            @method('PUT')
           			@csrf

           			<input type="hidden" id="id" name="id">

		            <div class="form-group">
		              <label for="exampleInputEmail1">Nombre</label>
		              <input type="text" name="nombre" class="form-control" id="nombre_edit" aria-describedby="emailHelp" placeholder="Ingrese su nombre">
		            </div>
		            <div class="form-group">
		              <label for="exampleInputEmail1">Apellidos</label>
		              <input type="text" name="apellidos" class="form-control" id="apellidos_edit" aria-describedby="emailHelp" placeholder="Ingrese sus apellidos">
		            </div>
		            <div class="form-group">
		              <label for="exampleInputEmail1">Fecha de Nacimiento</label>
		              <input type="date" name="fechaNacimiento" class="form-control" id="fechaNacimiento_edit" aria-describedby="emailHelp" placeholder="Ingrese su fecha de nacimiento">
		            </div>
		            <div class="form-group">
		              <label for="exampleInputEmail1">Telefono</label>
		              <input type="text" name="telefono" class="form-control" id="telefono_edit" aria-describedby="emailHelp" placeholder="Ingrese su telefono">
		            </div>
		            <div class="form-group">
		              <label for="exampleInputEmail1">Matricula</label>
		              <input type="text" name="matricula" class="form-control" id="matricula_edit" aria-describedby="emailHelp" placeholder="Ingrese su matricula">
		            </div>
		            <div class="form-group">
		              <label for="exampleInputEmail1">Email</label>
		              <input type="email" name="email" class="form-control" id="email_edit" aria-describedby="emailHelp" placeholder="Ingrese su email">
		            </div>
		            <div class="form-group">
		              <label for="exampleInputEmail1">Password</label>
		              <input type="password" name="password" class="form-control" id="password" aria-describedby="emailHelp" placeholder="Ingrese su password">
		              <small id="emailHelp" class="form-text text-muted">Minimo 8 caracteres</small>
		            </div>
		            <div class="modal-footer">
		              <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
		              <input type="submit" name="" class="btn btn-primary" value="Editar">
		            </div>
		          </form>
		        </div>
		      </div>
		    </div>
		</div>
	    <!--Fin modal editar-->

    @endsection

@endsection


@section('scripts')
	
	<script src="{{asset('app_assets/sweetalert/sweetalert.js')}}"></script>
	<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

	<script type="text/javascript">
		function getDataBack(id){
	      console.log(id)
	      
	      axios.get('{{ route("usuario") }}/'+id)
	      .then(response => {
	        console.log(response)

	        $("#nombre_edit").val(response.data.nombre);
	        $("#apellidos_edit").val(response.data.apellidos);
	        $("#fechaNacimiento_edit").val(response.data.fechaNacimiento);
	        $("#telefono_edit").val(response.data.telefono);
	        $("#email_edit").val(response.data.email);
	        $('#matricula_edit').val(response.data.matricula);

	        $("#id").val(id);
	      })
	      .catch(err => {
	        $('#modalEdit').modal('toggle')
	      })
	    }

	    function deleteThis(id, button){
	        swal({
	        title: "Desea eliminar este usuario?",
	        text: "El usuario se eliminara permanetemente!",
	        type: "warning",
	        showCancelButton: true,
	        confirmButtonClass: "btn-danger",
	        confirmButtonText: "Eliminar!",
	        closeOnConfirm: false
	      },
	      function(){
	        axios.delete('{{ route("usuario") }}/'+id)
	          .then(function (response) {
	            
	            if(response.data.code == 2){
	              swal("Eliminado!", "El usuario ha sido eliminado.", "success");

	              var elemntPadre = document.querySelector('.registros');
	              var elemntHjo = document.querySelector('.registro-'+id);

	              elemntPadre.removeChild(elemntHjo)


	            }else{
	              swal("Error!", "No se pudo eliminar.", "error");
	            }
	            
	            
	          })
	          .catch(function (error) {
	            // handle error
	            console.log(error);
	          })
	          .finally(function () {
	            // always executed
	          });
	      });
	    }		

	</script>
@endsection