<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>Home Page</title>
<script src="js/jquery-3.5.1.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<link href="styles/style.css" rel="stylesheet" type="text/css" media="all">
</head>
<body id="top">

<?php 
        require_once "submodules/navbar.php";
        require_once "submodules/_dbconnect.php"
?>


<div class="wrapper row3">
<?php
  echo "<main class='hoc container clear'>"; 

    echo "<article class='one_quarter first Fst_manu'>";
    echo "<h5 class='heading font-x3'>Alcoholic drink</h5>";
    echo "<p class='btmspace-30'>Discover the first core release from the Ayrshire distillery.</p>";
    // echo "<footer><a class='btn' href='alcoholic.php'>See More &raquo;</a></footer>";
    echo "</article>";

  $products = $conn->query("SELECT * from Products_menu where category = 'Alcoholic' limit 3");

  if ($products== True) {
    while ($row = $products->fetch_assoc()) {
      echo "<article class='one_quarter'>";
      echo "<h6 class='heading'>". $row["pname"] ." </h6>";
      echo "<img src='imgs/btl/" . $row["image_name"] . "' class ='btmspace-15'";
      echo "<p class='btmspace-30'>" . $row["description"] .  "</p>";
      echo "<p class='price'> £"  . $row["price"] . "</p>";
      echo  "<footer class='Add to Cart_btn'><a class='btn' id='" . $row["pid"] . "'>Add to Cart</a></footer>";
      echo "</article>";

    }
  }

?>  
    
    <!-- / main body -->
    <div class="clear"></div>
  </main>
</div>




<br>

<div class="wrapper bgded overlay" style="background-image:url('imgs/about2.jpg');">
  <article class="hoc container clear cta"style="text-align: center;"> 
    
    <div class="first">
      <h6 class="nospace">Unique and interesting gifts for every occasion.</h6>
      <p class="nospace">Frances takes a look at the brand new 40 Year Old from the world's most-awarded single malt.</p>
    </div><br>
    <footer ><a class="btn medium" href="#">See more &raquo;</a></footer>
    <br>
  </article>
</div>



<div class="wrapper row3">
  <?php

    echo "<main class='hoc container clear'>";

    echo "<article class='one_quarter first Fst_manu'>";
    echo "<h5 class='heading font-x3'>Non-alcoholic drink</h5>";
    echo "<p class='btmspace-30'>Discover the first core release from the Ayrshire distillery.</p>";
    // echo "<footer><a class='btn' href='non-alcoholic.php'>See More &raquo;</a></footer>";
    echo "</article>";

    $products = $conn->query("SELECT * from Products_menu where category = 'Non-alcoholic' limit 3");

  if ($products== True) {
    while ($row = $products->fetch_assoc()) {
      echo "<article class='one_quarter'>";
      echo "<h6 class='heading'>". $row["pname"] ." </h6>";
      echo "<img src='imgs/btl/" . $row["image_name"] . "' class ='btmspace-15'";
      echo "<p class='btmspace-30'>" . $row["description"] .  "</p>";
      echo "<p class='price'> £"  . $row["price"] . "</p>";
      echo  "<footer class='Add to Cart_btn'><a class='btn' id='" . $row["pid"] . "'>Add to Cart</a></footer>";
      echo "</article>";

    }
  }
    
    ?>  
    
    <!-- / main body -->
    <div class="clear"></div>
  </main>
</div>

<br>


<div class="wrapper row3">
  <?php
  echo "<section id='latest' class='hoc container clear'>";
    
  echo "<div class='sectiontitle' style='text-align:center;'>";
  echo "<h2 class='heading'>Bestsellers</h2>";
  echo "<p>Discover our most popular spirits for the perfect gift whatever the occasion!</p>";
  echo "</div>";

  echo "<article class='one_quarter first Fst_manu'>";
  echo "<h5 class='heading font-x3'>Bestseller drink</h5>";
  echo "<p class='btmspace-30'>This is our bestselling drinks across the globe.</p>";
  echo "</article>";

  $products = $conn->query("SELECT * from Products_menu limit 3 ");

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
  echo "</section>";

?>
    
</div><br>

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