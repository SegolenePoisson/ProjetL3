
<!DOCTYPE html>
<html lang="en">
<?php
session_start();
$_SESSION["current_page"] = "poll";
include 'header.php';
echo "<body>";


include 'navbar.php';
include 'db_connect.php';
?>


<div class="container">
  <div class = "customcont">
    <div class="row justify-content-center">

      <?php
      if(isset($_SESSION["username"])){
        if(isset($_GET['id'])) {
          // echo $_GET['id'];
          //getting ids
          $sql = 'SELECT title,name FROM polls,user WHERE polls.id=? and creatorId= user.id';
          $result = $bdd->prepare($sql);
          $result->execute([$_GET['id']]);
          $donnees = $result->fetch();
          if ( $result->rowCount()>0){
            echo  '<h5 class="header center teal-text text-lighten-2">'.$donnees["title"].'</h5>';
            echo '<p class="center">Sondage par '.$donnees["name"].'</p>';

            //<!--> Modules <-->
            $nbmod = 0;
            $sql ='SELECT * FROM modules WHERE pollId =?';
            $mod = $bdd->prepare($sql);
            $mod->execute([$_GET['id']]);
            echo "<form  action='add_vote_v2.php' method='post' >";
            while ($donnees = $mod->fetch()) {
              $nbmod++;
              echo  '<div id = "option_area" class="col s8 offset-s2 ">';
              echo  ' <h6 class="center" >'.  $donnees["question"].'</h6>';

              //options :
              $sql ='SELECT * FROM options WHERE moduleId =? ';
              $opt = $bdd->prepare($sql);
              $opt->execute([$donnees["id"]]);
              $options = $opt->fetch();

              //traitement différent en fonction du type de question
              switch($options["type"]) {
                case "text":
                ?>
                <div class="row">
                  <div class="input-field col s12">
                    <textarea id= <?php echo "module".$nbmod; ?> class="materialize-textarea"></textarea>
                    <label for="module">Réponse</label>
                  </div>
                </div>
                <?php
                break;
                case "check":

                $sql ='SELECT * FROM answers WHERE moduleId =?';
                $ans = $bdd->prepare($sql);
                $ans->execute([$donnees["id"]]);


                while($answers = $ans->fetch()){
                  ?>

                <label>
                  <input name = <?php echo "module".$nbmod; ?> type="checkbox" />
                  <span><?php echo $answers["data"];?></span>
                </label>
                <br>

                <?php
                }

                break;
                case "radio":
                $sql ='SELECT * FROM answers WHERE moduleId =?';
                $ans = $bdd->prepare($sql);
                $ans->execute([$donnees["id"]]);


                while($answers = $ans->fetch()){
                  ?>

                <label>
                  <input name = <?php echo "module".$nbmod; ?> type="radio" />
                  <span><?php echo $answers["data"];?></span>
                </label>
                <br>

                <?php
                }
                break;
                case "doodle":
                echo "todo";
                break;
                default:
                echo "default";
              }
              echo "</div>";
            }
            echo '<button type="submit" class="btn btn-primary btn-lg btn-block login-button">Valider</button>';
            echo "</form>";
            echo "</div>";

        }
        else{
          echo "Ce sondage n'existe pas, veuillez réessayer.";
        }
      }
    }else{
      echo "Veuillez vous connecter pour afficher cette page.";
    }
    ?>
  </div>
</div>
</div>


<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="js/materialize.js"></script>
<script src="js/init.js"></script>
</body>
</html>
