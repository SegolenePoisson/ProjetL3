<?php
session_start();
$_SESSION["current_page"] = "poll";
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
<body>

  <?php
  include 'navbar.php';
  include 'db_connect.php';
  ?>

  <div class="container">
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
                echo '<input type="checkbox" name = "selected[]" value = "'.$donnees['id'].'"/>'. $donnees['answer'] .'<br>';
                $nb++;
              }
              echo "<input type='submit' name = 'submit' value='Submit'/>";
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

</body>
</html>
