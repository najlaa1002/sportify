<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Formulaire</title>
  <script type="text/javascript" src="myScript.js"></script>
  <style type="text/css">
    nav {
        width: 100%;
        height: 70;
        background: black;
        color: white;
        padding: 10px;
    }

    nav a {
        color: white;
        font-size: 20px;
        text-decoration: none;
        text-transform: uppercase;
        font-weight: 600;
    }

    nav ul {
        display: flex;
        justify-content: center;
        align-items: center;
        background: ;
        width: 100%;
        height: 100%;
        list-style-type: none;
    }

    nav li {
        margin: 0 15px;
    }


  </style>
</head>
<body>
    <nav>
        <ul>
            <li><a href="index.html">Accueil</a></li>
            <li><a href="Parcourir.html">Tout parcourir</a></li>
            <li><a href="Recherche.html">Recherche</a></li>
            <li><a href="Meeting.html">Rendez-vous</a></li>
            <li><a href="votrecompte.html">Votre compte</a></li>
        </ul>
    </nav>
    <main>
                <div class="container-fluid">
                    <div class="title">
                        <h1 style="margin-top: 20px;">Connexion</h1>
                    </div>
                    <form method="POST" action="rdv_coach.php" class="container d-flex flex-column align-items-center">
                        <input style="width: 25%;" type="email" name="username" placeholder="Courriel" required>
                        <input style="width: 25%;" type="password" id="motdepasse" name="motdepasse" placeholder="Mot de passe" required>
                        <div class="radio-container">
                            <input type="checkbox" onclick="afficher()" label= "afficher">
                            <label class="title">Afficher</label>
                        </div>
                        <input style="width: 25%;" type="submit" name="valider" value="Se connecter">
                        </form>
                    




<?php

$servername = 'localhost';
$username = 'root';
$password = '';
$database = 'projet';

$db_handle = mysqli_connect($servername,$username,$password, $database);
$db_found = mysqli_select_db($db_handle, $database);


$connexioncompte_coach = isset($_POST["valider"])? $_POST["valider"] : "";
$username2 = isset($_POST["username"])? $_POST["username"] : "";
$motdepasse = isset($_POST["motdepasse"])? $_POST["motdepasse"] : "";


 if (!$db_handle){
 	die("Connexion échouée". mysqli_connect_error());
                        }

                        $sql = "SELECT  Nom_coach, Prénom_coach, Id_Rdv, Date, Heure,Lieu,Digicode
                                FROM coach JOIN rdv ON coach.Id_coach= rdv.Id_rdv
                                WHERE Email_coach LIKE '%$username2%' AND Mdp_coach LIKE '%$motdepasse%'";

                                if (isset($_POST["valider"])) {
                                	if ($db_found) {
                                		if (($username2 !="") || ($motdepasse != "")) { 
                                		 $result = mysqli_query($db_handle, $sql);

                                		  if (!$result) {
                                                die("Query failed: " . mysqli_error($db_handle));
                                                }


                                           while ($data = mysqli_fetch_assoc($result)){

                                           echo "<h1> Informations du RDV : </h1>";
                
                                           echo " Nom : " . $data["Nom_coach"] . "<br>";

                                           echo "<br>";
                                    
                                           echo "Prénom : " . $data["Prénom_coach"]."<br>" ;
                                           echo "<br>";



                                           echo " Identifiant du rendez-vous: " . $data["Id_Rdv"]."<br>" ;
                                           echo "<br>";

                                           echo " Date: " . $data["Date"] . "<br>";
                                           echo "<br>";
                                    
                                           echo "Heure : " . $data["Heure"]."<br>" ;
                                           echo "<br>";

                                           echo " Lieu: " . $data["Lieu"] . "<br>";
                                           echo "<br>";

                                           echo " Document demandé: Badge coach"  . "<br>";
                                           echo "<br>";
                                    
                                         
                                            }

                                        }else {echo "Aucun résultat"; 
                                    }

                                   }else {
                                   	echo "Database not found";
                                    }

                                }

                         mysqli_close($db_handle);

                     

?>                                                           




                      </div>
                        </main>
                        <footer>
                            <div class="footer">
                                <h3>Contactez-nous</h3>
                                <p>Email : contact@sportify.com</p>
                                <p>Téléphone : 01 23 45 67 89</p>
                                <p>Adresse : 123 rue du Sport, 75000 Paris</p>
                            </div>
                        </footer>
                        </body>
                        </html>