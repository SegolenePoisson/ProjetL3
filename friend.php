
<!DOCTYPE html>
<html lang="en">
<?php
session_start();
$_SESSION["current_page"] = "friend";
include 'header.php';
echo "<body>";
include 'navbar.php';
?>

<div id="index-banner" class="parallax-container">
  <div class="section no-pad-bot">
    <div class="container">
      <br><br>
      <h1 class="header center teal-text text-lighten-2">Woui</h1>
    </div>
  </div>
  <div class="parallax"><img src="img/background1.jpg"></div>
</div>


<div class="container">
<div class= "customcont">
<?php
if(isset($_SESSION["username"])){
  ?>





  <div class="col-md">
  <section class="login-form">
  <form method="post" action="add_friend.php" role="login">
  <input type="text" name="username" required class="form-control input-lg" name="username" placeholder="Username"
  required="" />
  <br>

  <button type="submit" class="btn btn-primary btn-lg btn-block login-button">Add Friend</button>
</form>
</section>
</div>

<div class="top">
<h2>Friends List</h2>
</div>



<div class="row">
<div class="shadow">
<div class="col-sm-12">
<div class="col-sm-2">
<img src="https://www.infrascan.net/demo/assets/img/avatar5.png" class="img-circle" width="60px">
</div>
<div class="col-sm-8">
<h4>Rahul Jain</h4>
</div>
</div>



<div class="clearfix"></div>
<hr />
<div class="col-sm-12">
<div class="col-sm-2">
<img src="https://www.infrascan.net/demo/assets/img/avatar5.png" class="img-circle" width="60px">
</div>
<div class="col-sm-8">
<h4>Ram Ranga Swami</h4>
</div>
</div>
</div>
</div>
</div>
</div>

<?php
}else{
?>
<br><br>
<h5 class="header center teal-text text-lighten-2">Add Friends</h5>
<p>To add friends, please <a href="logIn.php">log in</a>. If you don't have an account, you can <a href="SignUp.php" class = "waves-effect waves-light btn">create one</a> <br></p>
<br>
<br>
<br>

<?php
}
?>
</div>
</div>


<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="js/materialize.js"></script>
<script src="js/init.js"></script>
</body>
</html>
