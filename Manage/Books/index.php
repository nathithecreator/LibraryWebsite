<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title> Books Manage </title>
	<nav style="background-color: black; color: white;  display: flex; justify-content: space-between; align-items: center; padding: 10px; ">
  <div>
    <h1 style="margin: 0;"><a href="../../AdminHome.php" style="color: white; text-decoration: none; font-size: 34px; font-family: Arial, sans-serif;">Admin</a></h1>
  </div>
  <ul style="list-style: none; margin: 0; display: flex; align-items: center;">
    <li style="margin-right: 130px;"><a href="../../AdminHome.php" style="color: white; text-decoration: none; font-size: 25px; font-family: Arial, sans-serif;">Home</a></li>
    <li style="margin-right: 100px;"><a href="../Users/index.php" style="color: white; text-decoration: none; font-size: 25px; font-family: Arial, sans-serif;">Users</a></li>
    <li style="margin-right: 100px;"><a href="../Admins/index.php" style="color: white; text-decoration: none; font-size: 25px; font-family: Arial, sans-serif;">Admins</a></li>
    <li style="margin-right: 100px;"><a href="index.php" style="color: white; text-decoration: none; font-size: 25px; font-family: Arial, sans-serif;">Books</a></li>
    <li style="margin-right: 100px;"><a href="../Messages/index.php" style="color: white; text-decoration: none; font-size: 25px; font-family: Arial, sans-serif;">Messages</a></li>
    <li><a href="../../Shop/BookRequests.php" style="color: white; text-decoration: none; font-size: 25px; font-family: Arial, sans-serif;">Requests</a></li>
  </ul>
</nav>

<style>
      body {
        margin: 0;
      }
      nav {
        background-color: black;
        color: white;
        height: 90px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px;
      }
      nav h1 {
        margin: 0;
        font-family: Arial, sans-serif;
      }
      nav ul {
        list-style: none;
        margin: 0;
        display: flex;
        align-items: center;
      }
      nav ul li {
        margin-right: 20px;
      }
      nav ul li:last-child {
        margin-right: 0;
      }
      nav a {
        color: white;
        text-decoration: none;
        font-family: Arial, sans-serif;
        font-size: 16px;
      }
	  div.center {
		margin-top: 50px;
		margin-left: 200px;
	  }
	  
	  h1 {
		margin-left: 200px;
		}
    </style>
	
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	
</head>
<body>



<!-- Modal -->
<div class="modal fade" id="studentaddmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Book Information</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  
		   <form action="insertcode.php" method="POST">
		  <div class="form-group">
			<label>Book ID</label>
			<input type="text" class="form-control" name="id" placeholder="Enter Book ID">
		  </div>
		  
		  <div class="form-group">
			<label>Book Name</label>
			<input type="text" class="form-control" name="book_name" placeholder="Enter Book Name">
		  </div>
		  
		  <div class="form-group">
			<label>Price</label>
			<input type="text" class="form-control" name="price" placeholder="Enter the Price">
		  </div>
		  
		  <div class="form-group">
			<label>Picture of Book</label>
			<input type="file" class="form-control" name="picture">
		  </div>
		  
		  <div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			<button type="submit" name="insertdata" class="btn btn-primary">Save Data</button>
		  </div>
		  </form>
    </div>
  </div>
</div>
</div>

<!-- ########################################################################################### -->
<!-- EDIT POP UP FORM -->
<div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Book Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	  
	  
      <form action="updatecode.php" method="POST">
	  
		<div class="modal-body">
		
		<input type ="hidden" name="update_id" id="update_id">
		
		   <div class="form-group">
			<label>Book ID</label>
			<input type="text" class="form-control" name="id" placeholder="Enter Book ID">
		  </div>
		  
		  <div class="form-group">
			<label>Book Name</label>
			<input type="text" class="form-control" name="book_name" placeholder="Enter Book Name">
		  </div>
		  
		  <div class="form-group">
			<label>Price</label>
			<input type="text" class="form-control" name="price" placeholder="Enter the Price">
		  </div>
		  
		  <div class="form-group">
			<label>Picture of Book</label>
			<input type="file" class="form-control" name="picture">
		  </div>
		  
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			<button type="submit" name="updatedata" class="btn btn-primary">Update Data</button>
		  </div>
		  </form>
    </div>
  </div>
</div>

<!-- ########################################################################################### -->

<!-- ########################################################################################### -->
<!-- DELETE POP UP FORM (Bootstrap MODAL)-->
<div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Book Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	  
	  
      <form action="deletecode.php" method="POST">
	  
		<div class="modal-body">
		
		<input type ="hidden" name="delete_id" id="delete_id">
		
		  <h4> Do you want to Delete this Data?</h4>
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">NO</button>
			<button type="submit" name="deletedata" class="btn btn-primary">Delete Data</button>
		  </div>
		  </form>
    </div>
  </div>
</div>

<!-- ########################################################################################### -->
				



<div class="container">
	<div class="jumbotron bg-white">
		<div class="card">
		<h2 style="font-size:5vw"> Book Management </h2>
		<h3 style="font-size:1vw"> Add the books that will Display</h3>
		</div>
		<div class="card">
			<div class ="card-body">
				<button type="button" class="btn btn-dark" data-toggle="modal" data-target="#studentaddmodal">
				Add Book
				</button>
			</div>
		</div>
		
		<div class="card">
			<div class="card-body">
			
			<?php
			$connection = mysqli_connect("localhost","root","");
			$db = mysqli_select_db($connection,'bookstore');
			
			$query = "SELECT * FROM tblbooks";
			$query_run = mysqli_query($connection,$query);
			?>
			
			<table class="table">
				  <thead>
					<tr>
					  
					  <th scope="col">Book ID</th>
					  <th scope="col">Book Name</th>
					  <th scope="col">Price</th>
					  <th scope="col">Picture</th>
					  <th scope="col">EDIT</th>
					  <th scope="col">DELETE</th>
					</tr>
				  </thead>
				  
				  <?php
					if($query_run)
					{
						foreach($query_run as $row)
						{
					?>
				  
				  <tbody>
					<tr>
						  <td> <?php echo $row['id'];?> </td>
						  <td> <?php echo $row['book_name'];?> </td>
						  <td> <?php echo $row['price'];?> </td>
						  <td><img src="<?php echo $row['picture']; ?>" alt="Product Image" width="100"></td>
						  <td> 
								<button type="button" class="btn btn-dark editbtn"> EDIT </button>
						  </td>
						  <form action="deletecode.php" method ="post">
							<input type ="hidden" name ="id" value ="<?php echo $row['id'] ?>">
							<td> <input type ="submit" name ="delete" class="btn btn-danger" value="DELETE"> </td>
						  </form>
						  
						  
					</tr>
				  </tbody>
				  
				  <?php
				}
			}
			else
			{
				echo "No Record Found";
			}
			
			?>
				  
				</table>
			</div>
		</div>
		
		
	</div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script>

$(document).ready(function (){
	$('.deletebtn').on('click',function(){
		$('#deletemodal').modal('show');
		
			$tr = $(this).closest('tr');
			
			var data = $tr.children("td").map(function(){
				return $(this).text();
			}).get();
			
			console.log(data);
			
			$('#delete_id').val(data[0]);
			
	});	
});

</script>


<script>

$(document).ready(function (){
	$('.editbtn').on('click',function(){
		$('#editmodal').modal('show');
		
			$tr = $(this).closest('tr');
			
			var data = $tr.children("td").map(function(){
				return $(this).text();
			}).get();
			
			console.log(data);
			
			$('#update_id').val(data[0]);
			$('#id').val(data[1]);
			$('#book_name').val(data[2]);
			$('#price').val(data[3]);
			$('#picture').val(data[4]);
	});	
});

</script>
</body>
<footer class = "footer">
  <div class = "inner-footer">
<div class = "outer-footer">
 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
Copyright &copy;2022 SKYYLANE Fleet Management Coding Pro. All Rights Reserved 
</div>
</footer>
</div>
</html>