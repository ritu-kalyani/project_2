<?php
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
<title>Alcoholic</title>
<link href="styles/style.css" rel="stylesheet" type="text/css" media="all">
<script src="js/jquery-3.5.1.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body id="top">


<?php
require_once "submodules/navbar.php";
require_once "submodules/_dbconnect.php";
?>

<div class="wrapper row3">
  <?php

  echo "<section id='latest' class='hoc container clear'>"; 
    
  echo "<div class='sectiontitle menuu'>";
  echo "<h2 class='heading'>Alcoholic drink</h2><br>";
  echo "<p>Discover our most popular spirits for the perfect gift whatever the occasion!</p>";
  echo "</div>";          
  echo "</section>";
  echo "<main class='hoc container clear'>"; 

  echo "<main class='hoc container clear'>"; 

    echo "<article class='one_quarter first Fst_manu'>";
    echo "<h5 class='heading font-x3'>Alcoholic drink</h5>";
    echo "<p class='btmspace-30'>This is our signature and authentic Alcoholic Drinks from our menu .</p>";
    echo "</article>";



  $products = $conn->query("SELECT * from Products_menu where category = 'Alcoholic' ");

  if ($products== True) {
    while ($row = $products->fetch_assoc()) {
      echo "<article class='one_quarter'>";
      echo "<h6 class='heading'>". $row["pname"] ." </h6>";
      echo "<img src='imgs/btl/" . $row["image_name"] . "' class ='btmspace-15'";
      echo "<p class='btmspace-30'>" . $row["description"] .  "</p>";
      echo "<p class='price'> £"  . $row["price"] . "</p>";
      echo  "<footer class='Add to Cart_btn'><a class='btn' id='" . $row["pid"] . "'>Add to Cart</a></footer>";
      echo "<br><br><br>";
      echo "</article>";


    }
  }


?>
</div>


<?php 
        require_once "submodules/footer.php";
?>

<script>
        $(".btn").on("click", function() {
            
            $.ajax({
                url : "ajax/addToCart.php?id=" + this.id,
                type: "GET",
                success: function (data) {
                    console.log("success");
                    swal({
                        title: "Item Added to Cart",
                        text: "The item you selected has been added to the Cart",
                        icon: "success",
                    });
                },

                error: function (err) {
                    console.log("error");
                }
            })
        })
    </script>



<a id="backtotop" href="#top"><i class="fa fa-chevron-up"></i></a>
<!-- JAVASCRIPTS -->

</body>
</html>