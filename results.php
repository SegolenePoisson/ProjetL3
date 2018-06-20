
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


            $sql = "SELECT title from polls,user WHERE polls.id = ? AND creatorId=user.id AND username=?";
            $result = $bdd->prepare($sql);
            $result->execute([$_GET["id"],$_SESSION["username"]]);
            $donnees = $result->fetch();

            if($result->rowCount()>0){
              echo  '<h5 class="header center teal-text text-lighten-2">'.$donnees["title"].'</h5>';

              //boucle sur les modules de ce polls
              $sql = "SELECT * FROM modules WHERE pollId = ?";
              $result = $bdd->prepare($sql);
              $result->execute([$_GET["id"]]);
              while ($donnees = $result->fetch()){
                echo  ' <h6 class="center" >'.  $donnees["question"].'</h6>';
                //boucle sur les réponses de ce modules
                //TODO présentation en fonction du type
                $modId = $donnees["id"];
                $sql = "SELECT * FROM answers WHERE moduleId = ?";
                $res = $bdd->prepare($sql);
                $res->execute([$modId]);

                while($vote = $res->fetch()){
                echo $vote["data"]."<br>";
                //boucle sur les votes ?
                }
              }




            }else{
              echo "Vous n'avez pas la permission d'acceder à cette page.";
            }
          }else{
            echo "ce sondage n'existe pas, merci de réessayer.";
          }
        }else{
          echo "Merci de vous connecter pour acceder à cette page.";
        }
        ?>
      </div>
    </div>
  </div>

</body>
</html>
