<?php
session_start();
error_reporting(E_ERROR | E_PARSE);
?>

<!DOCTYPE html>
<html>
<head>
<title>Login</title>
<link href="styles/style.css" rel="stylesheet" type="text/css" media="all">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
</head>
<body id="top">
<!-- Top Background Image Wrapper -->
<?php 
        require_once "submodules/navbar.php";
        require_once "submodules/_dbconnect.php";

        if(isset($_POST['login'])){
          $username = $_POST['loginUsername'];
          $pass = $_POST['loginPassword'];

          $true_username = "select * from user where uname ='$username'";
          $sql = mysqli_query($conn,$true_username);

          $username_count = mysqli_num_rows($sql);

          if($username_count >0){

          while($row = mysqli_fetch_array($sql)){
                  if(password_verify($pass ,$row['password'])){
                    $_SESSION['uname'] = $username;
                    ?>
                    <script>
                        swal({
                            title: "Login Successful",
                            text: "Welcome to our Beverage website",
                            icon: "success",
                        });
                        location.replace("index.php?uid=<?php echo $row['uid'];?>");
                    </script>
                    <?php
                    }
                    else{
                        ?>
                    <script>
                        swal({
                            title: "Incorrect Password",
                            text: "Try again with correct password",
                            icon: "warning",
                        });
                    </script>
                    <?php
                    }
                }
            }
            else {
                ?>
                <script>
                        swal({
                            title: "Incorrect Username",
                            text: "Try Again to login with correct Username",
                            icon: "warning",
                        });
                </script>
                 <?php
            }


        }


?>

<div class="wrapper bgded overlay" style="background-image:url('imgs/about2.jpg');">
    <article class="hoc container clear cta" > 
      
      <div style="text-align: center;">
        <h6 class="nospace">login here</h6>
        <p class="nospace">Frances takes a look at the brand new 40 Year Old from the world's most-awarded single malt.</p></div><br>
      <div style="text-align: center;"><a class="btn" href="about.php">See more &raquo;</a></div><br>
      
    </article>
  </div>
<br>




<!-- login -->
<h2 style="text-align: center;">Login Form</h2>
  
  <form class="modal-content" method="post">
    <div class="container">
      <label for="uname"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="loginUsername" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="loginPassword" required>
        
      <button type="submit" name="login">Login</button>
      <label>
        <input type="checkbox" checked="checked" name="remember"> Remember me</label>
    </div>
    <button type="button"class="cancelbtn"><a href="./index.php" style="color: white;">Cancel</a></button>
    
  </form>
</div>

<?php 
        require_once "submodules/footer.php";
    ?>

</body>
</html>

