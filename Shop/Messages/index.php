<?php

session_start();
require_once ('../php/CreateDb.php');
require_once ('../php/component.php');


// create instance of Createdb class
$database = new CreateDb("bookstore", "tblbooks");

if (isset($_POST['add'])){
    /// print_r($_POST['product_id']);
    if(isset($_SESSION['cart'])){

        $item_array_id = array_column($_SESSION['cart'], "id");

        if(in_array($_POST['id'], $item_array_id)){
            echo "<script>alert('Product is already added in the cart..!')</script>";
            echo "<script>window.location = 'index.php'</script>";
        }else{

            $count = count($_SESSION['cart']);
            $item_array = array(
                'id' => $_POST['id']
            );

            $_SESSION['cart'][$count] = $item_array;
        }

    }else{

        $item_array = array(
                'id' => $_POST['id']
        );

        // Create new session variable
        $_SESSION['cart'][0] = $item_array;
        print_r($_SESSION['cart']);
    }
}

?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Messages</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">
</head>
<body>


<?php require_once ("../php/header.php"); ?>
<div class="ml-auto">
                <h5 class="px-1" style="margin-left: 60px;">
  <i class="fas fa-user"></i>
  <span style="color: blue;">User <?php echo $_SESSION["email"];?> is logged in</span>
</h5>

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