<!DOCTYPE html>
<html lang="en">
<?php
session_start();
$_SESSION["current_page"] = "friend";
include 'header.php';
echo "<body>";
include 'navbar.php';
include 'db_connect.php';
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
      $username = $_SESSION["username"];
    echo ' <div class="container">
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
       </div>';
    $id_user = $bdd->prepare('SELECT  id
              FROM    user
              WHERE   username = ?');
    $id_user->execute([$username]);
    $id_user = $id_user->fetch();



    $friend_list = $bdd->prepare('SELECT  friend2
              FROM    friends
              WHERE   friend1 = ?
              AND status = "accepted"');
    $friend_list->execute([$id_user['id']]);

    $pending_friend_list = $bdd->prepare('SELECT  friend2
              FROM    friends
              WHERE   friend1 = ?
              AND status = "pending"');
    $pending_friend_list->execute([$id_user['id']]);

    $pending_friend_requests = $bdd->prepare('SELECT  id, friend1
              FROM    friends
              WHERE   friend2 = ?
              AND status = "pending"');
    $pending_friend_requests->execute([$id_user['id']]);

    if($friend_list ->rowCount() > 0){
      echo '<div class="row">
      <div class="shadow">';
      while($friend = $friend_list->fetch()){
        $tmp = $bdd->prepare('SELECT  username
              FROM    user
              WHERE   id = ?');
        $tmp->execute([$friend['friend2']]);
        $tmp = $tmp->fetch();
        echo '<div class="col-sm-12">
              <div class="col-sm-2">
                <img src="https://www.infrascan.net/demo/assets/img/avatar5.png" class="img-circle" width="60px">
              </div>
              <div class="col-sm-8">
                <h4>';
                 echo $tmp['username'];
                 echo'</h4>
           </div>
            </div>
          <div class="clearfix"></div>
            <hr />';
      }
    }
    else {
      echo ' <p>you have no friends... Try adding some ! </p>';
    }


        if($pending_friend_list ->rowCount() > 0){
      echo'<h2>Pending Friend Requests</h2>';
      echo '<div class="row">
      <div class="shadow">';
      while($friend = $pending_friend_list->fetch()){
        $tmp = $bdd->prepare('SELECT  username
              FROM    user
              WHERE   id = ?');
        $tmp->execute([$friend['friend2']]);
        $tmp = $tmp->fetch();
        echo '<div class="col-sm-12">
              <div class="col-sm-2">
                <img src="https://www.infrascan.net/demo/assets/img/avatar5.png" class="img-circle" width="60px">
              </div>
              <div class="col-sm-8">
                <h4>';
                 echo $tmp['username'];
                 echo'</h4>
           </div>
            </div>
          <div class="clearfix"></div>
            <hr />';
      }
      echo '</div>
        </div>';
    }




        if($pending_friend_requests ->rowCount() > 0){
      echo'<h2>People are waiting for your awnser !</h2>';
      echo '<div class="row">
      <div class="shadow">';
      while($friend = $pending_friend_requests->fetch()){
        $tmp = $bdd->prepare('SELECT  username
              FROM    user
              WHERE   id = ?');
        $tmp->execute([$friend['friend1']]);
        $tmp = $tmp->fetch();
        echo '<div class="col-sm-12">
              <div class="col-sm-2">

                <img src="https://www.infrascan.net/demo/assets/img/avatar5.png" class="img-circle" width="60px" align="left">';

                 echo '<br>'. $tmp['username'] .'

          <br> 
          <br> 
          <form method="post" action="accept_friend.php">
              <br>
              <button type="submit" class="btn btn-lg btn-primary btn-block" name="accept" value="'.$friend["id"].'">Accept</button>
            </form>

            <form method="post" action="deny_friend.php">
              <br>
              <button type="submit" class="btn btn-lg btn-primary btn-block" name="deny" value="'.$friend["id"].'">Deny</button>
            </form>
            </div>

              </div>
              <div class="col-sm-8">
                <h4>';
                 

                 echo'</h4>
           </div>
            </div>
          <div class="clearfix"></div>
            <hr />';
      }
      echo '</div>
        </div>';
    }
    ?>




  <?php
  }else{
    ?>

     <h1>Add Friends</h1>
    <p>To add friends, please <a href="logIn.php">log in</a>. If you don't have an account, you can <a href="SignUp.php">create one</a> !<br/></p>
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