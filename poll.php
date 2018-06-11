
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
<div id="readroot" style="display: none">

  <input type="button" value="Remove review"
  onclick="this.parentNode.parentNode.removeChild(this.parentNode);" /><br /><br />

  <input name="cd" value="title" />

  <select name="rankingsel">
    <option>Rating</option>
    <option value="excellent">Excellent</option>
    <option value="good">Good</option>
    <option value="ok">OK</option>
    <option value="poor">Poor</option>
    <option value="bad">Bad</option>
  </select><br /><br />

  <textarea rows="5" cols="20" name="review">Short review</textarea>
  <br />Radio buttons included to test them in Explorer:<br />
  <input type="radio" name="something" value="test1" />Test 1<br />
  <input type="radio" name="something" value="test2" />Test 2

</div>

<form method="post" action="/cgi-bin/show_params.cgi">

  <span id="writeroot"></span>

  <input type="button" id="moreFields" value="Give me more fields!" />
  <input type="submit" value="Send form" />

</form>



<div class="container">
  <div class = "customcont">
    <div class="row justify-content-center">
      <div class="poll">
        <?php
        if(isset($_GET['id'])) {
          if(isset($_GET['r'])) {
            $sql = 'SELECT * FROM polls WHERE id=?';
            $result = $bdd->prepare($sql);
            $result->execute([$_GET['id']]);
            $donnees = $result->fetch();
            echo  '<div class="question">'.$donnees["question"].'</div>';
            $sql = 'SELECT answers.answer,answers.id FROM answers WHERE  pollid = ?';
            $res = $bdd->prepare($sql);
            $res->execute([$donnees["id"]]);

            $sql = "SELECT count(*) as nbtotal FROM votes,answers WHERE answerId = answers.id and pollid = ?";
            $result = $bdd->prepare($sql);
            $result->execute([$_GET['id']]);
            $totalcount = $result->fetch();
            $nbtotal = $totalcount["nbtotal"];
            echo "<ul>";
            while ($answers = $res->fetch()) {
              echo "<li>".$answers["answer"];
              $sql = 'SELECT count(*) as nb FROM votes WHERE answerId = ?';
              $count = $bdd->prepare($sql);
              $count->execute([$answers["id"]]);
              $cpt = $count->fetch();
              $datapoints[] = ['label'=>$answers['answer'], 'y'=>$cpt["nb"]*100/$nbtotal];
              echo " (".$cpt["nb"].")";
              echo "</li>";
            }
            echo "</ul>";
            ?>
            <script>
            window.onload = function () {

              var chart = new CanvasJS.Chart("chartContainer", {
                animationEnabled: true,
                exportEnabled: false,
                title:{
                  text: "<?php echo $donnees["question"]; ?>"
                },
                backgroundColor: "#95c2e5",
                subtitles: [{
                  text: ""
                }],
                data: [{
                  type: "pie",
                  showInLegend: "true",
                  legendText: "{label}",
                  indexLabelFontSize: 16,
                  indexLabel: "{label} - #percent%",
                  yValueFormatString: "#,##%",
                  dataPoints: <?php echo json_encode($datapoints, JSON_NUMERIC_CHECK); ?>
                }]
              });
              chart.render();

            }
            </script>

            <div id="chartContainer" style="height: 370px; width: 100%;"></div>
            <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

            <?php
            echo "</div><br/>";
          }else{
            echo '<form action="add_vote.php" method = "post">';
            $sql = 'SELECT * FROM polls WHERE polls.id =?';
            $reponse = $bdd->prepare($sql);
            $reponse->execute([$_GET['id']]);
            $donnees = $reponse->fetch();
            if ( $reponse->rowCount()>0){
              echo '<div class="question">'. $donnees['question'] .'</div><br>';
              $sql ='SELECT * FROM answers WHERE answers.pollId =?';
              $reponse = $bdd->prepare($sql);
              $reponse->execute([$_GET['id']]);
              $nb = 1;
              //on passe l'id du poll en premier argument
              echo '<input id="selected[]" name="selected[]" type="hidden" value="'.$_GET["id"].'">';
              while ($donnees = $reponse->fetch()) {
                echo "<label>";
                echo '<input type="checkbox" class="filled-in" name = "selected[]" value = "'.$donnees['id'].'"/>';
                echo "<span>".$donnees['answer']."</span><br>";
                  echo "</label>";
                $nb++;
              }
              echo "<input type='submit' class='waves-effect waves-light btn' name = 'submit' value='Submit'/>";
              echo "</form>";
            }else{
              echo "This poll doesn't exist, please check the provided Id.";
            }
          }
        }
        ?>
      </div>
    </div>
  </div>

</div>
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="js/materialize.js"></script>
<script src="js/init.js"></script>
</body>
</html>
