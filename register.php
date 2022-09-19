<!DOCTYPE html>
<html>
<head>
<title>Register</title>
<link href="styles/style.css" rel="stylesheet" type="text/css" media="all">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body id="top">

<?php 
        require_once "submodules/navbar.php";
        require_once "submodules/_dbconnect.php";

        if(isset($_POST['signup'])){
          $email = mysqli_real_escape_string($conn,$_POST['registerEmail']);
          $uname = mysqli_real_escape_string($conn,$_POST['registerUsername']);
          $pass = mysqli_real_escape_string($conn,$_POST['registerPassword']);
          $cpass = mysqli_real_escape_string($conn,$_POST['registerCPassword']);
      
          $pass_hash = password_hash($pass,PASSWORD_BCRYPT);
          $cpass_hash = password_hash($cpass,PASSWORD_BCRYPT);

          $namequery = "select * from user WHERE uname = '$uname'";
          $query = mysqli_query($conn,$namequery);
          $namecount = mysqli_num_rows($query);

          if($namecount > 0){
            ?>
            <script>
                    swal({
                        title: "Username already exists",
                        text: "Try another unique username",
                        icon: "warning",
                    });
    
            </script>
          <?php
        
          }else{
          if($pass == $cpass){
              $insert = "Insert into user( uname, password, email) VALUES ('$uname', '$pass_hash','$email')";
              $finalquery = mysqli_query($conn,$insert);
  
              if($finalquery){
                  $sql = "select uid from user where uname='". $uname. "'";
                  $result = mysqli_query($conn, $sql);

                  $row = mysqli_fetch_assoc($result);
                  ?>
                  <script>
                    swal({
                    title: "Your Registration has been successfully Done",
                    text: "Now you can login to our services..",
                    icon: "success",
                });
                location.replace("login.php?uid=<?php echo $row['uid'];?>");
                </script>
                <?php
                }else{
                ?>
                <script>
                    swal({
                    title: "Registration Unsuccessful",
                    text: "please Try again",
                    icon: "error",
                });
                </script>
                <?php
                
                }  
            }
            else{
                ?>
                <script>
                    swal({
                    title: "passwords are not matching",
                    text: "please Type correctly",
                    icon: "error",
                });
                </script>
                <?php
            }
        }
    }

?>

<div class="wrapper bgded overlay" style="background-image:url('imgs/about2.jpg');">
    <article class="hoc container clear cta"> 
      
      <div class="first" style="text-align: center;">
        <h6 class="nospace">Register here</h6>
        <p class="nospace">Frances takes a look at the brand new 40 Year Old from the world's most-awarded single malt.</p>
      </div><br><br><br>
      <footer  style="text-align: center;"><a class="btn medium" href="about.php">See more &raquo;</a></footer>
      <br>
    </article>
  </div>
<br>




<!-- Register -->
<h2 style="text-align: center;">Register Form</h2>
  
  <form class="modal-content" action="" method="post">
    <div class="container">
      <label for="uname"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="registerUsername" required>
      <label for="email"><b>Email ID</b></label>
      <input type="text" placeholder="Enter Email id" name="registerEmail" required>
      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password"  minlength="6" name="registerPassword" autocomplete="on" required>
      <label for="psw"><b>Confirm Password</b></label>
      <input type="password" placeholder="Enter Confirm Password"  name="registerCPassword" autocomplete="on" required>
        
      <button type="submit"  name="signup">Register</button>
      <label>
        <input type="checkbox" checked="checked" name="remember"> Remember me
      </label>
    </div>
    <button type="button" class="cancelbtn"><a href="index.php" style="color: white;">Cancel</a></button>
  </form>
</div>



<?php 
        require_once "submodules/footer.php";
    ?>



<!-- JAVASCRIPTS -->

</body>
</html>

