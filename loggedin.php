
<!DOCTYPE html> 
<html lang="en">
<meta charset="utf-8"> 
<head> 
<link rel="stylesheet" type="text/css" href="style.css">
<meta charset="utf-8"> 
<!-- For proper scaling on mobile --> 
<meta name="viewport" content="width=device-width, initial-scale=1"> 
<!-- JQuery form google --> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js%22%3E"></script> 
<!-- BOOTSTRAP --> 
<!-- Latest compiled and minified CSS --> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<!-- Optional theme --> 
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
<!-- Latest compiled and minified JavaScript --> 
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
<style type="text/css">
    body {
        font-size: 20px;
    }
</style>
</head>
    <body>
    
        <?php

        $bdd = new PDO('mysql:host=localhost;dbname=poll;charset=utf8', 'root', '');

    if(isset($_POST["name"], $_POST["password"])) 
    {     
        $name = $_POST["name"]; 
        $password = $_POST["password"]; 

        $result = $bdd->query('SELECT username, password FROM user WHERE username = "'.$name.'" AND  password = "'.$password.'"');

        if($result->rowCount() > 0 )
        { 

           // $_SESSION["logged_in"] = true; 
           // $_SESSION["naam"] = $name; 
           echo '<p>Ca fontionne je suis tellement content et le plus grand genie php que le monde ai jamais connus.</p>';
        }
        else
        {
            echo '<p>Mot de passe incorrect</p>';
        }
        $result->closeCursor();
}
    ?> 
    
        
    </body>
</html>