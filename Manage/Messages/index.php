<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title> Users Messages </title>
	<nav style="background-color: black; color: white;  display: flex; justify-content: space-between; align-items: center; padding: 10px; ">
  <div>
    <h1 style="margin: 0;"><a href="../../AdminHome.php" style="color: white; text-decoration: none; font-size: 34px; font-family: Arial, sans-serif;">Admin</a></h1>
  </div>
  <ul style="list-style: none; margin: 0; display: flex; align-items: center;">
    <li style="margin-right: 130px;"><a href="../../AdminHome.php" style="color: white; text-decoration: none; font-size: 25px; font-family: Arial, sans-serif;">Home</a></li>
    <li style="margin-right: 100px;"><a href="index.php" style="color: white; text-decoration: none; font-size: 25px; font-family: Arial, sans-serif;">Users</a></li>
    <li style="margin-right: 100px;"><a href="../Admins/index.php" style="color: white; text-decoration: none; font-size: 25px; font-family: Arial, sans-serif;">Admins</a></li>
    <li style="margin-right: 100px;"><a href="../Books/index.php" style="color: white; text-decoration: none; font-size: 25px; font-family: Arial, sans-serif;">Books</a></li>
    <li style="margin-right: 100px;"><a href="../Messages/index.php" style="color: white; text-decoration: none; font-size: 25px; font-family: Arial, sans-serif;">Messages</a></li>
    <li><a href="../../Shop/BookRequests.php" style="color: white; text-decoration: none; font-size: 25px; font-family: Arial, sans-serif;">Requests</a></li>
  </ul>
</nav>

<style>
      body {
        margin: 0;
		background-color: white;
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
        <h5 class="modal-title" id="exampleModalLabel">Add a User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  
		   <form action="insertcode.php" method="POST">
	  
		<div class="modal-body">
		
		
		   <div class="form-group">
			<label>Send To</label>
			<input type="text" class="form-control" name="username" placeholder="Enter Username">

		  </div>
		  
		  <div class="form-group">
			<label>Message</label>
			<input type="text" class="form-control" name="message" placeholder="Enter a Message">
		  </div>
		  
		  
		  </div>
		  <div class="modal-footer">
			
			<button type="submit" name="insertdata" class="btn btn-primary">SEND</button>
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
        <h5 class="modal-title" id="exampleModalLabel">Reply Message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	  
	  
      <form action="insertcode.php" method="POST">
	  
	  
		<div class="modal-body">
		
		<input type ="hidden" name="update_id" id="update_id">
		
		   <div class="form-group">
			<label>Send To</label>
			<input type="text" class="form-control" name="username" id="eUsername" placeholder="Enter Username"> 
		  </div>
		  
		  <div class="form-group">
			<label>Message</label>
			<input type="text" class="form-control" name="message" placeholder="Enter a Message">
		  </div>
		  
		  
		  </div>
		  <div class="modal-footer">
			
			<button type="submit" name="insertdata" class="btn btn-primary">SEND</button>
		  </div>
		  </form>
    </div>
  </div>
</div>

<!-- ########################################################################################### -->

			




	<div class="jumbotron bg-white">
		<div class="card">
		<h2 style="font-size:5vw"> User Messages </h2>
		<h3 style="font-size:1vw"> Reply to the Users Message for the Website</h3>
		</div>
		<div class="card">
			<div class ="card-body">
				<button type="button" class="btn btn-dark" data-toggle="modal" data-target="#studentaddmodal">
				Send Message
				</button>
			</div>
		</div>
		
		<div class="card">
			<div class="card-body">
			
			<?php
			$connection = mysqli_connect("localhost","root","");
			$db = mysqli_select_db($connection,'bookstore');
			
			$query = "SELECT * FROM messagesusers ORDER BY id DESC";

			$query_run = mysqli_query($connection,$query);
			?>
			
			<table class="table table-sm">
				  <thead>
					<tr>
					  <th scope="col">Date/Time</th>
					  <th scope="col">From</th>
					  <th scope="col">Message</th>
					  <th scope="col">REPLY</th>
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
						  <td> <?php echo $row['date'];?> </td>
						  <td><span id="username"><?php echo $row['username'];?> </span></td>
						  <td> <?php echo $row['message'];?> </td>
					
						  <td> 
								<button type="button" class="btn btn-dark editbtn"> REPLY </button>
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


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


<script>
$(document).ready(function (){
  $('.editbtn').on('click', function(){
    $('#editmodal').modal('show');

    var $tr = $(this).closest('tr');
    var data = $tr.find('td').map(function(){
      return $(this).text();
    }).get();

    $('#update_id').val(data[0]);
    $('#eUsername').val(data[1]);
   
  });
});


</script>

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



</body>
<footer class = "footer">
  <div class = "inner-footer">
<div class = "outer-footer">
 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
Copyright &copy;2023 ST.ROSE Library Management Coding Pro. All Rights Reserved 
</div>
</footer>
</div>
</html>