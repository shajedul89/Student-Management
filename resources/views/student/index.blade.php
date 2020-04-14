<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Development Area</title>
	<!-- ALL CSS FILES  -->
	<link rel="stylesheet" href="public/assets/css/datatables.min.css">
	<link rel="stylesheet" href="public/assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/responsive.css">
</head>
<body>
	
	<div class="col-md-10 p-5 shadow m-5">

		<button id="st-add" class="btn btn-info">Add Student</button><br><br>


		<div class="modal fade" id="student_modal">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h1>ADD STUDENT PAGE</h1>
					</div>
					<div class="modal-body">

					<div class="notification"></div>
					
					<form action="" method="POST" id="student_form">
						@csrf
						
						<div class="form-group">
							<lable for="">STUDENT NAME</lable>
							<input type="text" name="sname" class="form-control">
						</div>

						<div class="form-group">
							<lable for=""> BATCH</lable>
							<input type="text" name="sbatch" class="form-control">
						</div>

						<div class="form-group">
							<lable for=""> ROLL</lable>
							<input type="text" name="sroll" class="form-control">
						</div>

						<div class="form-group">
							<lable for="">EMAIL</lable>
							<input type="text" name="semail" class="form-control">
						</div>

						<div class="form-group">
							<lable for="">CELL</lable>
							<input type="text" name="scell" class="form-control">
						</div>

						<div class="form-group">
							
						<input type="submit"  class="btn btn-success btn-sm" value="ADD STUDENT">

						</div>
						






					</form>	
					
					</div>
					<div class="modal-footer">
						
					</div>
				</div>
			</div>
		</div>

		<table class="table" id="std_table" >
	<thead>
		<th>Name</th>
		<th>Batch</th>
		<th>Roll</th>
		<th>Email</th>
		<th>Cell</th>
		<th>Action</th>
	</thead>


	
</table>
		

	</div>




	







	<!-- JS FILES  -->
	<script src="public/assets/js/jquery-3.4.1.min.js"></script>
	<script src="public/assets/js/datatables.min.js"></script>
	<script src="public/assets/js/popper.min.js"></script>
	<script src="public/assets/js/bootstrap.min.js"></script>
	<script src="public/assets/js/custom.js"></script>


	<script>
		(function($){

			$(document).ready(function(){

				$('button#st-add').click(function(){


					$('#student_modal').modal('show');



				});


				// Data Table

			$('table#std_table').DataTable({

				serverSide:true,

				ajax:{
						url:'{{route('student.index')}}'

				},

				columns :[

				{
					data:'sname',
					name:'sname'
				},

				{
					data:'sbatch',
					name:'sbatch'
				},
				{
					data:'sroll',
					name:'sroll'
				},
				{
					data:'semail',
					name:'semail'
				},
				{
					data:'scell',
					name:'scell'
				},

				{
					data:'action',
					name:'action'
				}


				]
			});



			//add student



				$('form#student_form').submit(function(e){

				e.preventDefault();

				let name = $('input[name="sname"]').val();

				let batch = $('input[name="sbatch"]').val();
				let roll = $('input[name="sroll"]').val();
				let email = $('input[name="semail"]').val();
				let cell = $('input[name="scell"]').val();


			if( name == ""||batch == ""||roll == ""||email==""||cell==""){

				$('.notification').html('<p class="alert alert-warning">Field can not be empty <button class="close" data-dismiss="alert">&times;</button></p> ');
			}



			else{


				$.ajax({

					url : '{{route('student.store')}}',
					method :'POST',
					data : new FormData(this),
					contentType:false,
					processData:false,
					success:function(data){

						$('form#student_form')[0].reset();
						$('table#std_table').DataTable().ajax.reload();
 
					}

				});

				

					$('.notification').html('<p class="alert alert-success">Data Added Successfully <button class="close" data-dismiss="alert">&times;</button></p> ');
				}

			});


             //view









			});

		})(jQuery)


	</script>
</body>
</html>