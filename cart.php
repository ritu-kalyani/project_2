<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>Cart</title>
<link href="styles/style.css" rel="stylesheet" type="text/css" media="all">
<script src="js/jquery-3.5.1.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
</head>
<body id="top">

<?php 
        require_once "submodules/navbar.php";
        require_once "submodules/_dbconnect.php";
?>



<br>
<div class="wrapper bgded overlay" style="background-image:url('imgs/about2.jpg');">
    <article class="hoc container clear cta"> 
      
      <div class="first" style="text-align: center;">
        <h6 class="nospace">Cart</h6>
        <p class="nospace">Frances takes a look at the brand new 40 Year Old from the world's most-awarded single malt.</p>
      </div><br><br><br>

      
    </article>
  </div>
<br>

    

      <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center border rounded bg-light my-3">
                <h1>My Cart</h1>
            </div>
    
            <div class="col-lg-8">
                
                <div class="card wish-list mb-3">
                    <table class="table text-center">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">Item Name</th>
                                <th scope="col">Item Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Total Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <?php
                                if (isset($_SESSION['cart'])) {
                                    foreach ($_SESSION['cart'] as $row) {
                                        echo "<tr class='row". $row["pid"] ."'>";
                                        echo "<td>" . $row["pid"] . "</td>";
                                        echo "<td>" . $row["pname"] . "</td>";
                                        echo "<td id='price" . $row["pid"]. "'>" . $row["price"] . "</td>";
                                        echo "<td><input id='" . $row["pid"] . "' class='quantity' type='number' min=0 value=" . $row["quantity"] . " </input></td>";
                                        echo "<td id='total" . $row["pid"] . "' class='total'>" . $row["total"] . "</td>";
                                        echo "</tr>";
                                    } 
                                }   
                                
                                else {
                                    echo "Nothing to show";
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-lg-4">
                    <div class="card wish-list mb-3">
                        <div class="pt-4 border bg-light rounded p-3">
                            <h5 class="mb-3 text-uppercase font-weight-bold text-center">Order summary</h5>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0 bg-light">Total Price<span>£ <span class='finalTotal'>0</span></span></li>
                                
                            </ul>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" checked>
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Cash On Delivery 
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault1" id="flexRadioDefault1" disabled>
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Online Payment 
                                </label>
                            </div><br>
                            <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#checkoutModal">Checkout</button>
                        </div>
                    </div>
                    
                </div>
        </div>
    </div>

      


  <div class="modal fade" id="checkoutModal" tabindex="-1" role="dialog" aria-labelledby="checkoutModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="checkoutModal">Enter Your Details:</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form method="post">
                <div class="form-group">
                    <b><label for="address">Address:</label></b>
                    <input class="form-control" id="address" name="address" placeholder="Address line 1" type="text" required minlength="3" maxlength="500">
                </div>
                <div class="form-group">
                    <b><label for="address1">Address Line 2:</label></b>
                    <input class="form-control" id="address1" name="address1" placeholder="Address line 2" type="text">
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6 mb-0">
                        <b><label for="phone">Phone No:</label></b>
                        <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon">+44</span>
                        </div>
                        <input type="tel" class="form-control" id="phone" name="phone" placeholder="xxxxxxxxxx" required pattern="[0-9]{10}" maxlength="10">
                        </div>
                    </div>
                    <div class="form-group col-md-6 mb-0">
                        <b><label for="zipcode">Zip Code:</label></b>
                        <input type="text" class="form-control" id="zipcode" name="zipcode" placeholder="xxxxxx" required pattern="[0-9]{6}" maxlength="6">                    
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <input type="hidden" name="amount" value=""> <!-- Total Price -->
                    <button type="submit" name="checkout" class="btn btn-success" id="checkout">Order</button>
                </div>
            </form>
        </div>
        </div>
    </div>
</div>


<?php 
        require_once "submodules/footer.php";
    ?>

<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>         
    <script src="https://unpkg.com/bootstrap-show-password@1.2.1/dist/bootstrap-show-password.min.js"></script>
    
    <script>
    calculateCart();

    function calculateCart() {
        ID = $("*").map(function() {
            if (this.id) {
                return this.id;
            }
        }).get()

        var value = 0;
        for (ids in ID) {
            if (ID[ids].indexOf("total") != -1) {
                value +=  parseInt(document.getElementById(ID[ids]).innerText);
            }

            
        }

        $(".finalTotal").html(value);
    }
    $(".quantity").on("change", function() {
        var value = parseInt($("#"+this.id).val())

        if (value == 0) {
            $(".row"+ this.id).hide();
            $.ajax({
                url: "ajax/removeFromCart.php?id=" + this.id,
                method: "GET",
                success: function(data) {
                    console.log("success");
                },
                error: function(error) {
                    console.log("error");
                }
            })
        }

        else {
            $.ajax({
                url: "ajax/updateCart.php?id=" + this.id + "&quantity=" + value,
                method: "GET",
                success: function(data) {
                    console.log("Update success")
                }
            })
        }
        var price = parseInt($("#price" + this.id).html());
        var ID = []

        var total = price * value;
        $("#total" + this.id).html(total);

        calculateCart();
    })

    $("#checkout").on("click", function() {
        var address = $("#address").val() + " " + $("#address1").val();
        var phoneNo = $("#phone").val();
        var zipCode = $("#zipcode").val();
        var total = parseInt($(".finalTotal").html());

        $.ajax({
            url: "ajax/placeOrder.php?address=" + address + "&phoneNo=" + phoneNo + "&zipcode=" + zipCode + "&total=" + total,
            type: "GET",
            success: function(data) {
                swal({
                        title: "Order placed",
                        text: "The order has been successfully placed",
                        icon: "success",
                    });
            },
            error: function(error) {
                console.log(error);
                swal({
                        title: "Order not placed",
                        text: "We have encountered an error while placing your order",
                        icon: "error",
                    });
            }

        })
    })
    
</script>






<a id="backtotop" href="#top"><i class="fa fa-chevron-up"></i></a>
<!-- JAVASCRIPTS -->

</body>
</html>