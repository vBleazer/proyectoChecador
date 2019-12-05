@extends('layouts.app')

@section('head')
<link href="{{ asset('app_assets/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{ asset('app_assets/vendor/sweetalert/sweetalert.css') }}">
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

        	<div class="card shadow mb-4">
	            <div class="card-header py-3">
	              <div class="row">
	              	<div class="col">
	              		<h6 class="m-0 font-weight-bold text-primary">
			              	List of users registered
			            </h6>
	              	</div>
	              	<div class="col">
	              		<button data-toggle="modal" data-target="#mymodal" class="btn btn-info btn-icon-split float-right">
		                    <span class="icon text-white-50">
		                      <i class="fas fa-user-plus"></i>
		                    </span>
		                    <span class="text">Add new user</span>
		                  </button>
	              	</div>
	              </div> 
	            </div>
	            <div class="card-body">
	              <div class="table-responsive">
	                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
	                  <thead>
	                    <tr>
	                      <th>Name</th>
	                      <th>Lastname</th>
	                      <th>Date of birth</th>
	                      <th>Phone</th>
	                      <th>Registred date</th>
	                      <th>Actions</th>
	                    </tr>
	                  </thead>
	                  <tfoot>
	                    <tr>
	                      <th>Name</th>
	                      <th>Lastname</th>
	                      <th>Date of birth</th>
	                      <th>Phone</th>
	                      <th>Registred date</th>
	                      <th>Actions</th>
	                    </tr>
	                  </tfoot>
	                  <tbody>
	                  	@if(isset($users) && count($users)>0)
	                  	@foreach($users as $user)
	                    <tr>
	                      <td>{{ $user->name }}</td>
	                      <td>{{ $user->lastname }}</td>
	                      <td>{{ $user->date_of_birth }}</td>
	                      <td>{{ $user->phone_number }}</td>
	                      <td>{{ $user->created_at }}</td>
	                      <td>
	                      	<button onclick="getDataBack({{$user->id}})" class="btn btn-warning btn-circle"
	                      	data-toggle="tooltip" data-placement="top" title="Edit row">
	                      		<i class="fas fa-pencil-alt"></i>
	                      	</button>

	                      	<button onclick="deleteThis({{$user->id}},this)" class="btn btn-danger btn-circle"
	                      	data-toggle="tooltip" data-placement="top" title="Delete row">
	                      		<i class="fas fa-trash"></i>
	                      	</button> 
	                      </td>
	                    </tr>
	                    @endforeach
	                    @endif
	                  </tbody>
	                </table>
	              </div>
	            </div>
	          </div>

        </div>
    </div>
</div>
@endsection

@section('modals')
<!-- Logout Modal-->
  <div class="modal fade" id="mymodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">
          	Add new user
          </h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>

        <form action="{{ route('user') }}" method="POST">
        	@csrf
	        <div class="modal-body">
	        	
	        	<div class="form-group">
				    <label for="name">Name</label>
				    <input type="text" name="name" class="form-control" id="name" placeholder="Juanito" required=""> 
				</div>

				<div class="form-group">
				    <label for="lastname">Lastname</label>
				    <input type="text" name="lastname" class="form-control" id="lastname" placeholder="León" required=""> 
				</div>

				<div class="form-group">
				    <label for="date_of_birth">Date of birth</label>
				    <input type="date" name="date_of_birth" class="form-control" id="date_of_birth" required=""> 
				</div>

				<div class="form-group">
				    <label for="phone_number">Phone number</label>
				    <input type="text" name="phone_number" class="form-control" id="phone_number" placeholder="61200000" required=""> 
				</div>

				<div class="form-group">
				    <label for="email">Email</label>
				    <input type="text" name="email" class="form-control" id="email" placeholder="mail@example.com" required=""> 
				</div>

				<div class="form-group">
				    <label for="password">Password</label>
				    <input type="password" name="password" class="form-control" id="password" placeholder="********" required=""> 
				    <small id="emailHelp" class="form-text text-muted">8 character min.</small>
				</div>

	        </div>
	        <div class="modal-footer">
	          <button class="btn btn-secondary" type="button" data-dismiss="modal">
	          	Cancel
	          </button>
	          <button class="btn btn-primary" type="submit">
	          	Save
	          </button>
	        </div>
        </form>

      </div>
    </div>
  </div>

  <!-- Logout Modal-->
  <div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">
          	Add new user
          </h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>

        <form action="{{ route('user') }}" method="POST">
        	@csrf
        	<input name="_method" type="hidden" value="PUT">
        	<input type="hidden" value="" id="id" name="id">

	        <div class="modal-body">
	        	
	        	<div class="form-group">
				    <label for="name">Name</label>
				    <input type="text" name="name" class="form-control" id="name_edit" placeholder="Juanito" required=""> 
				</div>

				<div class="form-group">
				    <label for="lastname">Lastname</label>
				    <input type="text" name="lastname" class="form-control" id="lastname_edit" placeholder="León" required=""> 
				</div>

				<div class="form-group">
				    <label for="date_of_birth">Date of birth</label>
				    <input type="date" name="date_of_birth" class="form-control" id="date_of_birth_edit" required=""> 
				</div>

				<div class="form-group">
				    <label for="phone_number">Phone number</label>
				    <input type="text" name="phone_number" class="form-control" id="phone_number_edit" placeholder="61200000" required=""> 
				</div>

				<div class="form-group">
				    <label for="email">Email</label>
				    <input type="text" name="email" class="form-control" id="email_edit" placeholder="mail@example.com" required=""> 
				</div>

				<div class="form-group">
				    <label for="password">Password</label>
				    <input type="password" name="password" class="form-control" id="password_edit" placeholder="********" > 
				    <small id="emailHelp" class="form-text text-muted">8 character min.</small>
				</div>

	        </div>
	        <div class="modal-footer">
	          <button class="btn btn-secondary" type="button" data-dismiss="modal">
	          	Cancel
	          </button>
	          <button class="btn btn-primary" type="submit">
	          	Save
	          </button>
	        </div>
        </form>

      </div>
    </div>
  </div>
@endsection

@section('scripts')
<script src="{{ asset('app_assets/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('app_assets/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

<!-- Page level custom scripts -->
<script src="{{ asset('app_assets/js/demo/datatables-demo.js') }}"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script type="text/javascript" src="{{ asset('app_assets/vendor/sweetalert/sweetalert.min.js') }}"></script>
<script type="text/javascript">
	$(function () {
	  $('[data-toggle="tooltip"]').tooltip()
	})
	function getDataBack(id){
		console.log(id)

		axios.get('{{ route("user") }}/'+id)
		  .then(function (response) {
		    	console.log(response.data)
		    if (response.data) {
		    	$('#modalEdit').modal('toggle');

		    	$("#name_edit").val(response.data.name)
		    	$("#lastname_edit").val(response.data.lastname)
		    	$("#date_of_birth_edit").val(response.data.date_of_birth)
		    	$("#phone_number_edit").val(response.data.phone_number)
		    	$("#email_edit").val(response.data.email) 

		    	$("#id").val(id) 

		    }else{
		    	$('#modalEdit').modal('toggle');
		    	alert("error")
		    }
		  });
	}

	function deleteThis(id,button){
		console.log(id)

		swal({
		  title: "¿Esta seguro?",
		  text: "El registro no podrá recuperarse!",
		  type: "warning",
		  showCancelButton: true,
		  confirmButtonClass: "btn-danger",
		  confirmButtonText: "Si, dale cuello!",
		  cancelButtonText:'Cancelar',
		  closeOnConfirm: false
		},
		function(){

			axios.delete('{{ URL::to("userdestroy") }}/'+id)
			  .then(function (response) {
			    	console.log(response)
			     	if (response.data.code == 2) {
			     		swal("Deleted!", "El registro se ha eliminado.", "success");

			     		var row = $(button).parent().parent();
			     		$(row).remove();

			     	}else{
			     		swal("Error!", "El registro no pudo ser eliminado.", "error");
			     	}
			  }); 


		  
		});
	}
</script>
@endsection