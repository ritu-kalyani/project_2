<div class="topspacer bgded overlay" style="background-image:url('./imgs/john-hernandez-0-4zzoh3JXU-unsplash.jpg"> 
  
  <div class="wrapper row0">
    <div id="topbar" class="hoc clear"> 
      
      <div class="fl_left">
        <ul class="nospace">
          <li><i class="fa fa-phone"></i> +44 45637890</li>
          <li><i class="fa fa-envelope-o"></i> info@Daru.com</li>
        </ul>
      </div>
      <div class="fl_right">
        <ul class="nospace">
          <li><a href="index.php"><i class="fa fa-lg fa-home"></i></a></li>
          <?php
                    if (isset($_SESSION["username"])) {
                        echo "<li>";
                        echo "<a class='nitem' href='logout.php'>Logout</a>";
                        echo "</li>";
                    }

                    else {
                        echo "<li>";
                        echo "<a class='nitem' href='login.php'>Login</a>";
                        echo "</li>";
                    }
                ?>
          <li><a href="register.php">Register</a></li>
        </ul>
      </div>
      
    </div>
  </div>
  
  
  
  <div class="wrapper row1">
    <header id="header" class="hoc clear"> 
      
      <div id="logo" class="fl_left">
        <h1><a href="index.php">BAR</a></h1>
      </div>

      <nav id="mainav" class="fl_right">
        <ul class="clear">
          <li><a href="index.php">Home</a></li>
          <li><a href="about.php">About </a></li>
          <li><a href="alcoholic.php">Alcoholic </a></li>
          <li><a href="non-alcoholic.php">Non-Alcoholic </a></li>
          <li><a  href="cart.php">Cart </a></li>
          <li><a href="contact.php">Contact</a></li>

        </ul>
      </nav>
    </header>
  </div>
</div>