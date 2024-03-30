<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title> Books Manage </title>
	<nav style="background-color: black; color: white;  display: flex; justify-content: space-between; align-items: center; padding: 10px; ">
  <div>
    <h1 style="margin: 0;"><a href="index.php" style="color: white; text-decoration: none; font-size: 34px; font-family: Arial, sans-serif;">Admin</a></h1>
  </div>
  <ul style="list-style: none; margin: 0; display: flex; align-items: center;">
    <li style="margin-right: 130px;"><a href="home.php" style="color: white; text-decoration: none; font-size: 25px; font-family: Arial, sans-serif;">Home</a></li>
    <li style="margin-right: 100px;"><a href="users.php" style="color: white; text-decoration: none; font-size: 25px; font-family: Arial, sans-serif;">Users</a></li>
    <li style="margin-right: 100px;"><a href="admins.php" style="color: white; text-decoration: none; font-size: 25px; font-family: Arial, sans-serif;">Admins</a></li>
    <li style="margin-right: 100px;"><a href="books.php" style="color: white; text-decoration: none; font-size: 25px; font-family: Arial, sans-serif;">Books</a></li>
    <li style="margin-right: 100px;"><a href="messages.php" style="color: white; text-decoration: none; font-size: 25px; font-family: Arial, sans-serif;">Messages</a></li>
    <li><a href="requests.php" style="color: white; text-decoration: none; font-size: 25px; font-family: Arial, sans-serif;">Requests</a></li>
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

				
<div class="container">
	<div class="jumbotron">
		<div class="card">
		<h2 style="font-size:5vw"> Book Management </h2>
		
		</div>
		<div class="card">
			<div class ="card-body">
				<button type="button" class="btn btn-dark" data-toggle="modal" data-target="#studentaddmodal">
				Add Data
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
Copyright &copy;2023 ST.ROSE ONLINE LIBRARY Coding Pro. All Rights Reserved 
</div>
</footer>
</div>
</html>