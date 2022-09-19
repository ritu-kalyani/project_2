<?php
 session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>Contact</title>
<link href="styles/style.css" rel="stylesheet" type="text/css" media="all">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.0.js"></script>
</head>
<body id="top">
<?php 
        require_once "submodules/navbar.php";
        require_once "submodules/_dbconnect.php";

        if (isset($_POST['submit_contact'])) {
          $name = $_POST['name'];
          $message = $_POST['message'];
          $email = $_POST['email'];
          
          $sql = "INSERT INTO contact VALUES ('" . $name . "',  '" . $email . "', '" . $message . "')";
          if ($conn->query($sql) == TRUE) {
              echo '
              <script>
                  swal({
                      title: "Query Successful",
                      text: "Your query has been registered successfully",
                      icon: "success",
                  });
              </script>
              ';
          }

          else {
              echo '
              <script>
                  swal({
                      title: "Query not Successful",
                      text: "We have encountered an error with your query",
                      icon: "warning",
                  });
              </script>
              ';
          }
      }
?>



<div class="wrapper bgded overlay" style="background-image:url('imgs/about2.jpg');">
    <article class="hoc container clear cta"> 
      
      <div class="first" style="text-align: center;">
        <h6 class="nospace">Contact Us</h6>
        <p class="nospace">Frances takes a look at the brand new 40 Year Old from the world's most-awarded single malt.</p>
      </div><br>
      <footer class="" style="text-align: center;"><a class="btn medium" href="#">See more &raquo;</a></footer>
      <br>
    </article>
  </div>





      
<div id="comments" class="about">
    <h2 style="text-align: center;"> Write Your query</h2><br>
    <form action="#" method="POST">
      <div class="one_third first">
        <label for="name">Name <span>*</span></label>
        <input type="text" name="name" id="name" value="" size="22" required>
      </div>
      <div class="one_third">
        <label for="email">Mail <span>*</span></label>
        <input type="email" name="email" id="email" value="" size="22" required>
      </div>
      <div class="one_third">
        <label for="url">Website</label>
        <input type="url" name="url" id="url" value="" size="22">
      </div>
      <div class="block clear">
        <label for="message">Your Comment</label>
        <textarea name="message" id="comment" cols="25" rows="10"></textarea>
      </div>
      <div style="text-align: center;">
        <input type="submit" name="submit_contact" value="Submit Form">
        &nbsp;
        <input type="reset" name="reset" value="Reset Form">
      </div>
    </form>
  </div>

  <?php 
        require_once "submodules/footer.php";
    ?>







<a id="backtotop" href="#top"><i class="fa fa-chevron-up"></i></a>
<!-- JAVASCRIPTS -->

</body>
</html>