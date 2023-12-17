<?php
$servername = "localhost";
$username = "root";
$password = "";
$bdd = "projet";
$recherche = isset($_POST["recherche"])? $_POST["recherche"] : "";

$connexion = mysqli_connect($servername,$username,$password,$bdd);

if (!$connexion){
    die("Connexion échouée". mysqli_connect_error());
    }
    $sql = "SELECT Nom_coach, Prénom_coach,Email_coach, Bureau_coach, Téléphone_coach,Photo_coach,Catégorie, Sport, Salle
            FROM coach JOIN service ON coach.Id_Coach = service.Id_Service
            WHERE Nom_coach LIKE '%$recherche%' OR Prénom_coach LIKE '%$recherche%' OR Catégorie LIKE '%$recherche%' OR Sport LIKE '%$recherche%' OR Salle LIKE '%$recherche%'";
       

    $result = mysqli_query($connexion,$sql); 

    if (isset($_POST["recherche"])) {
        if ($recherche != "") {
            if (mysqli_num_rows($result)>0){

                
                echo "<table border='1'>";
                echo "<tr>";
                echo "<th>" . "Nom" . "</th>";
                echo "<th>" . "Prénom" . "</th>";
                echo "<th>" . "Catégorie" . "</th>";
                echo "<th>" . "Sport" . "</th>";
                echo "<th>" . "Salle" . "</th>";
                echo "<th>" . "Email" . "</th>";
                echo "<th>" . "Bureau du coach" . "</th>";
                echo "<th>" . "Numéro de téléphone" . "</th>";
                echo "<th>"  . "Photo"  . "</th>";
                echo "</tr>";
                while ($row = mysqli_fetch_assoc($result)){
                echo "<tr>";
                echo "<td>" . $row["Nom_coach"] . "</td>";
                echo "<td>" . $row["Prénom_coach"] . "</td>";
                echo "<td>" . $row["Catégorie"] . "</td>";
                echo "<td>" . $row["Sport"] . "</td>";
                echo "<td>" . $row["Salle"] . "</td>";
                echo "<td>" . $row["Email_coach"] . "</td>";
                echo "<td>" . $row["Bureau_coach"] . "</td>";
                echo "<td>" . $row["Téléphone_coach"] . "</td>";
                echo "<td>" . "<img src='" . $row["Photo_coach"] . "' height='120' width='100'>" . "</td>";
                echo "</tr>";
                }
            }

        } else {echo "Aucun résultat";
          }

        
    }else {echo "Erreur";
     }

    mysqli_close($connexion);

?>
    

    <!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Abel&display=swap" rel="stylesheet">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="styles.css">
	<link rel="icon" href="images/logo.png" class="rounded-circle img-circle" type="image/jpg">
	<title>SPORTIFY</title>
</head>
<body class="overlay">

	<!-- NAV -->
	<!-- ... autres balises ... -->
<nav class="navbar">
	 <a href="sportify.html">
                    
                </a>
                <a class="navbar-brand" href="sportify.html">
                    Sportify
                </a>
    <img src="images/logo.png" class="rounded-circle img-circle logo" width="75px" height="75px" alt="Logo">
    <ul>
        <li><a href="index.html">Accueil</a></li>
        <li><a href="Parcourir.html">Tout parcourir</a></li>
        <li><a href="Recherche.html">Recherche</a></li>
        <li><a href="Meeting.html">Rendez-vous</a></li>
        <li><a href="votrecompte.html">Votre compte</a></li>
    </ul>
</nav>
<!-- ... autres balises ... -->

	<!-- Accueil-->
	<main>
		
                       
            <!-- Footer -->
            
	</main>

	<footer>
		<div class="footer">
			<h3>Contactez-nous</h3>
			<p>Email : contact@sportify.com</p>
			<p>Téléphone : 01 23 45 67 89</p>
			<a class="footer-link" href="https://www.google.com/maps/place/37+Quai+de+Grenelle,+75015+Paris/@48.8515004,2.2850437,17z/data=!3m1!4b1!4m6!3m5!1s0x47e6700497ee3ec5:0xdd60f514adcdb346!8m2!3d48.8515004!4d2.2872324!16s%2Fg%2F11bw3y1mf8?entry=ttu">37, quai de Grenelle, 75015 Paris, France</a>
		</div>
	</footer>

</body>

</html>

















