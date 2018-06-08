<?php
session_start();
$_SESSION["current_page"] = "friend";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <!-- For proper scaling on mobile -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- JQuery form google -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <!-- BOOTSTRAP -->
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<!-- Classe css -->
	<link rel="stylesheet" href="class1.css" />
	<title>WOUI</title>
</head>


<?php
	if(isset($_SESSION["username"])){

  echo "<body>";
  include 'navbar.php';
  ?>
  			<div class="container">
  	      <div class="col-md">
        <section class="login-form">
          <form method="post" action="add_friend.php" role="login">
            <input type="text" name="username" required class="form-control input-lg" name="username" placeholder="Username" 
  required="" />
            <br>
          
            <button type="submit" class="btn btn-lg btn-primary btn-block">Add Friend</button>
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

<?php
}else{
  echo "<body>";
  include 'navbar.php';
  ?>

	 <h1>Add Friends</h1>
  <p>To add friends, please <a href="logIn.php">log in</a>. If you don't have an account, you can <a href="SignUp.php">create one</a> !<br/></p>
}
?>

</body>
</html>
<?php
}
?>