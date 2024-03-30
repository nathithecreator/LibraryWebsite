<?php

function component($bookname, $bookprice, $bookimg, $id){
    $element = "
        <div class=\"col-md-3 col-sm-6 my-3 my-md-0\">
            <form action=\"index.php\" method=\"post\">
                <div class=\"card shadow\">
                    <div>
                        <img src=\"$bookimg\" alt=\"Image1\" class=\"img-fluid card-img-top\">
                    </div>
                    <div class=\"card-body\">
                        <h5 class=\"card-title\">$bookname</h5>
                        <h5>
                            <span class=\"price\" style=\"color: blue;\">$bookprice</span>
                        </h5>
                        <button type=\"submit\" class=\"btn btn-dark btn-block my-10\" name=\"add\">Add to Cart</button>
                        <input type='hidden' name='id' value='$id'>
                    </div>
                </div>
            </form>
        </div>
    ";
    echo $element;
}

function cartElement($bookimg, $bookname, $bookprice, $bookid){
    $element = "
        <form action=\"cart.php?action=remove&id=$bookid\" method=\"post\" class=\"cart-items\">
            <div class=\"border rounded\">
                <div class=\"row bg-white\">
                    <div class=\"col-md-3 pl-0\">
                        <img src=\"$bookimg\" alt=\"Image1\" class=\"img-fluid\">
                    </div>
                    <div class=\"col-md-6\">
                        <h5 class=\"pt-2\">$bookname</h5>
                        <small class=\"text-secondary\">Seller: SAINT ROSÉ</small>
                        <h5 class=\"pt-2\">$bookprice</h5>
                        <button type=\"submit\" class=\"btn btn-danger mx-2\" name=\"remove\">Remove</button>
                    </div>
                    <div class=\"col-md-3 py-5\">
                        <div class=\"quantity\">
                            <button type=\"button\" class=\"btn btn-danger border rounded-circle minus-btn\"><i class=\"fas fa-minus\"></i></button>
                            <input type=\"text\" value=\"1\" class=\"form-control w-25 d-inline quantity-input\" name=\"quantity\" id=\"quantity-$bookid\">
                            <button type=\"button\" class=\"btn btn-success border rounded-circle plus-btn\"><i class=\"fas fa-plus\"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <script>
    // JavaScript code to handle quantity updates
    document.addEventListener('DOMContentLoaded', () => {
        const minusBtns = document.querySelectorAll('.minus-btn');
        const plusBtns = document.querySelectorAll('.plus-btn');

        minusBtns.forEach(minusBtn => {
            minusBtn.addEventListener('click', () => {
                const quantityInput = minusBtn.nextElementSibling;
                const currentValue = parseInt(quantityInput.value);
                if (currentValue > 1) {
                    quantityInput.value = currentValue - 1;
                }
            });
        });

        plusBtns.forEach(plusBtn => {
            plusBtn.addEventListener('click', () => {
                const quantityInput = plusBtn.previousElementSibling;
                const currentValue = parseInt(quantityInput.value);
                quantityInput.value = currentValue + 1;
            });
        });
    });
</script>

    ";
    echo  $element;
}


?>
