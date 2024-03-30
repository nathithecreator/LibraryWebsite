<header id="header">
    <nav class="navbar navbar-expand-lg text-white" style="background-color: #000000;" >
        <a href="index.php" class="navbar-brand">
            <h3 class="px-5" style="color: white;">
                 SAINT ROSÉ
            </h3>
        </a>			
        <button class="navbar-toggler"
            type="button"
            data-toggle="collapse"
            data-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup"
            aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
		
		<ul style="list-style: none; margin: 0; display: flex; align-items: center;">
			<li style="margin-left: 270px;"><a data-toggle="modal" data-target="#sellbookmodal" style="color: white; text-decoration: none; font-size: 15px; font-family: Arial, sans-serif; font-weight: bold;">Sell a Book</a></li>
			<li style="margin-left: 50px;"><a href="messagesindex.php" style="color: white; text-decoration: none; font-size: 15px; font-family: Arial, sans-serif; font-weight: bold;">Messages</a></li>
			<li style="margin-left: 50px;"><a data-toggle="modal" data-target="#sendMsgUsermodal" style="color: white; text-decoration: none; font-size: 15px; font-family: Arial, sans-serif; font-weight: bold;">Send a Message</a></li>
			<li style="margin-left: 50px;"><a href="../Home.php" style="color: white; text-decoration: none; font-size: 15px; font-family: Arial, sans-serif; font-weight: bold;">Log Out</a></li>
		</ul>

        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="mr-auto"></div>
			
            <div class="navbar-nav">
                <a href="cart.php" class="nav-item nav-link active">
                    <h5 class="px-5 cart">
                        <i class="fas fa-shopping-cart"></i> Cart
                        <?php
                        if (isset($_SESSION['cart'])){
                            $count = count($_SESSION['cart']);
                            echo "<span id=\"cart_count\" class=\"text-primary bg-light\">$count</span>";
                        }else{
                            echo "<span id=\"cart_count\" class=\"text-primary bg-light\">0</span>";
                        }
                        ?>
                    </h5>
                </a>
            </div>
            
        </div>
    </nav>
</header>






