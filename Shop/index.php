<?php

session_start();

require_once ('php/CreateDb.php');
require_once ('./php/component.php');


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
    <title>SAINT ROSÉ Shopping Cart</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php require_once ("php/header.php"); ?>
<div class="ml-auto">
                <h5 class="px-1" style="margin-left: 60px;">
  <i class="fas fa-user"></i>
  <span style="color: blue;">User <?php echo $_SESSION["email"];?> is logged in</span>
</h5>


            </div>
<div class="container">
        <div class="row text-center py-5">
            <?php
                $result = $database->getData();
                while ($row = mysqli_fetch_assoc($result)){
                    component($row['book_name'], $row['price'], $row['picture'], $row['id']);
                }
            ?>
        </div>
</div>

<!-- Sell A Book Modal -->
<div class="modal fade" id="sellbookmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add a Book Information</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  
		   <form action="insertcode.php" method="POST">
		  
		  <div class="form-group">
			<label>Add Title</label>
			<input type="text" class="form-control" name="title" placeholder="Enter Book Name">
		  </div>
		  
		  <div class="form-group">
			<label>Book Author</label>
			<input type="text" class="form-control" name="author" placeholder="Enter Book Name">
		  </div>
		  
		  <div class="form-group">
			<label>Description</label>
			<input type="text" class="form-control" name="description" placeholder="Enter Book Name">
		  </div>
		  
		  <div class="form-group">
			<label>Price</label>
			<input type="text" class="form-control" name="price" placeholder="Enter the Price">
		  </div>
		  
		  <div class="form-group">
			<label>Add the book Picture </label>
			<input type="file" class="form-control" name="picture">
		  </div>
		  <label name="seller" ><?php echo $_SESSION["email"];?></label>
		  
		  <div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			<button type="submit" name="insertdata" class="btn btn-primary">Save Data</button>
		  </div>
		  </form>
    </div>
  </div>
</div>
</div>


<!-- Send a Message User -->
<div class="modal fade" id="sendMsgUsermodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Send a Message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  
		   <form action="insertmsgcode.php" method="POST">
		   
		   
		  
		  <div class="form-group">
			<label>Message</label>
			<input type="text" class="form-control" name="message" placeholder="Enter a Message to the Admin">
		  </div>
		  
		  <div class="modal-footer">
			<label>From :</label>
			<label name="seller" ><?php echo $_SESSION["email"];?></label>
			<button type="submit" name="insertdata" class="btn btn-primary">Send</button>
		  </div>
		  
		  </form>
    </div>
  </div>
</div>
</div>





<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
