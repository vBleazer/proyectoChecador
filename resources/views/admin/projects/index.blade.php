@extends('layouts.app')

<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<!-- DataTables -->
<link rel="stylesheet" href="{{asset('app_assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app_assets/sweetalert/sweetalert.css')}}">

@section('title','Proyectos')

@section('content')

<!--<ol class="float-sm-right">
  <button class="btn btn-primary" data-toggle="modal" data-target="#Modal">Agregar</button>
</ol>-->

<div class="card">
    <div class="card-header">
      <div class="container">
 			<div class="row">
				<div class="col-md">
					<h3 class="card-title">Proyectos Activos</h3>
				</div>
				<div class="col-md">
					<button class="btn btn-primary float-right" data-toggle="modal" data-target="#Modal">Agregar</button>
				</div>
			</div>
 		</div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>Nombre Proyecto</th>
          <th>Fecha Inicio</th>
          <th>Fecha Cierre</th>
          <th>Acciones</th>
        </tr>
        </thead>
        <tbody class="tbody">
        @foreach($projects as $project)
	        <tr class="project-{{$project->id}}">
	          <td>{{$project->nombre}}</td>
	          <td>{{$project->fechaInicio}}</td>
	          <td>{{$project->fechaCierre}}</td>
	          <td class="project-actions">
	              <a class="btn btn-primary btn-sm" href="/proyecto_detail/{{$project->id}}">
	                  <i class="fas fa-folder">
	                  </i>
	                  Ver
	              </a>
	              <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#ModalEdit" onclick="getDataBack({{$project->id}})">
	                  <i class="fas fa-pencil-alt">
	                  </i>
	                  Editar
	              </button>
	              <button class="btn btn-danger btn-sm" href="#" onclick="deleteThis({{$project->id}})">
	                  <i class="fas fa-trash">
	                  </i>
	                  Eliminar
	              </button>
	          </td>
	        </tr>
        @endforeach
        </tbody>
        <tfoot>
        <tr>
          <th>Nombre Proyecto</th>
          <th>Fecha Inicio</th>
          <th>Fecha Cierre</th>
          <th>Acciones</th>
        </tr>
        </tfoot>
      </table>
    </div>
    <!-- /.card-body -->
  </div>


  @section('modals')
  	<!--Modal Agregar -->
	<div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	    <div class="modal-dialog" role="document">
	      <div class="modal-content">
	        <div class="modal-header">
	          <h5 class="modal-title" id="exampleModalLabel">Agregar Proyecto</h5>
	          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
	            <span aria-hidden="true">×</span>
	          </button>
	        </div>
	        <div class="modal-body">
	          <form method="POST" action="{{ route("proyecto") }}">
	            @csrf
	            <div class="form-group">
	              <label for="exampleInputEmail1">Nombre</label>
	              <input type="text" name="nombre" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ingrese el nombre del proyecto">
	            </div>
	            <div class="form-group">
	              <label for="exampleInputEmail1">Descripción</label>
	              <textarea class="form-control" name="descripcion" rows="3" placeholder="Ingrese una descripción"></textarea>
	            </div>
	            <div class="form-group">
	              <label for="exampleInputEmail1">Fecha de Inicio</label>
	              <input type="date" name="fechaInicio" class="form-control">
	            </div>
	            <div class="form-group">
	              <label for="exampleInputEmail1">Fecha de Cierre</label>
	              <input type="date" name="fechaCierre" class="form-control">
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
	      <div class="modal-dialog" role="document">
	      <div class="modal-content">
	        <div class="modal-header">
	          <h5 class="modal-title" id="exampleModalLabel">Editar Proyecto</h5>
	          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
	            <span aria-hidden="true">×</span>
	          </button>
	        </div>
	        <div class="modal-body">
	          <form method="POST" action="{{ route("proyecto") }}">
	          	@method('PUT')
	            @csrf
	            <input type="hidden" id="id" name="id">

	            <div class="form-group">
	              <label for="exampleInputEmail1">Nombre</label>
	              <input type="text" name="nombre" class="form-control" id="nombre_edit" aria-describedby="emailHelp" placeholder="Ingrese el nombre del proyecto">
	            </div>
	            <div class="form-group">
	              <label for="exampleInputEmail1">Descripción</label>
	              <textarea class="form-control" name="descripcion" id="descripcion_edit" rows="3" placeholder="Ingrese una descripción"></textarea>
	            </div>
	            <div class="form-group">
	              <label for="exampleInputEmail1">Fecha de Inicio</label>
	              <input type="date" name="fechaInicio" id="fechaInicio_edit" class="form-control">
	            </div>
	            <div class="form-group">
	              <label for="exampleInputEmail1">Fecha de Cierre</label>
	              <input type="date" name="fechaCierre" id="fechaCierre_edit" class="form-control">
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
	</div>
    <!--Fin modal editar-->
  @endsection

@endsection

@section('scripts')

<!-- DataTables -->
<script src="{{asset('app_assets/plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('app_assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
<script src="{{asset('app_assets/sweetalert/sweetalert.js')}}"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>


<script type="text/javascript">
	$(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });



	function getDataBack(id){
		//console.log(id)
		axios.get('{{ route("proyecto") }}/'+id)
		.then(res =>{
			//console.log(res)
			$('#nombre_edit').val(res.data.nombre)
			$('#descripcion_edit').val(res.data.descripcion)
			$('#fechaInicio_edit').val(res.data.fechaInicio)
			$('#fechaCierre_edit').val(res.data.fechaCierre)

			$('#id').val(res.data.id)
		})
		.catch(err => {
			console.log(err)
		})

	}

	function deleteThis(id){
		swal({
	        title: "Desea eliminar este proyecto?",
	        text: "El proyecto se eliminara permanetemente!",
	        type: "warning",
	        showCancelButton: true,
	        confirmButtonClass: "btn-danger",
	        confirmButtonText: "Eliminar!",
	        closeOnConfirm: false
	      },
	      function(){
	        axios.delete('{{ route("proyecto") }}/'+id)
	          .then(function (response) {
	            
	            if(response.data.code == 2){
	              swal("Eliminado!", "El proyecto ha sido eliminado.", "success");

	              var elemntPadre = document.querySelector('.tbody');
	              var elemntHjo = document.querySelector('.project-'+id);

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