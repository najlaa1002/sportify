<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Abel&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link rel="icon" href="images/logo.png" class="rounded-circle img-circle" type="image/jpg">
    <title>SPORTIFY</title>
    <style>
    main {
    margin-top: 20px;
}

form {
    margin-bottom: 20px;
}

h1 {
    color: #007bff;
}

.info-container {
    border: 1px solid #dee2e6;
    padding: 20px;
    margin-top: 20px;
    background-color: white;
    border-radius: 5px;
}

img {
    max-width: 100%;
    height: auto;
}
body {
    font-family: 'Abel', sans-serif;
    background-color: #f8f9fa;
    margin: 0;
    padding: 0;
}



			
		.navbar {
			display: flex;
			justify-content: space-between;
			align-items: center; /* Ajouté pour aligner verticalement le contenu de la navbar */
			background-color:black;
			padding: 10px;
		}
		
		.navbar ul {
			list-style-type: none;
			display: flex;
			margin: 0;
		}
		
		.navbar li {
			margin: 0 25px;
			font-size: 15px;
		}
		
		.navbar li a {
			color: white;
			text-decoration: none;
			text-transform: uppercase;
			font-weight: 300;
			font-family: Georgia, 'Times New Roman', Times, serif;
		}
		
		
			</style>
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

<main class="container">
    <div class="title">
        <h1>Connexion</h1>
    </div>
    <form method="POST" action="connexion_client.php" class="d-flex flex-column align-items-center">
        <input style="width: 25%;" type="email" name="username" placeholder="Courriel" required>
        <input style="width: 25%;" type="password" id="motdepasse" name="motdepasse" placeholder="Mot de passe" required>
        <div class="radio-container">
            <input type="checkbox" onclick="afficher()" label="afficher">
            <label class="title">Afficher</label>
        </div>
        <input style="width: 25%;" type="submit" name="valider" value="Se connecter">
        <a href="creationcompte.html">Création de Compte</a>
    </form>

    <div class="info-container">
    <?php

$servername = 'localhost';
$username1 = 'root';
$password = '';
$database = 'projet';

$db_handle = mysqli_connect($servername,$username1,$password,$database);
$db_found = mysqli_select_db($db_handle, $database);


$connexioncompte_client = isset($_POST["valider"])? $_POST["valider"] : "";
$username2 = isset($_POST["username"])? $_POST["username"] : "";
$motdepasse = isset($_POST["motdepasse"])? $_POST["motdepasse"] : "";


if (!$db_handle){
    die("Connexion échouée". mysqli_connect_error());
    }

  

    if (isset($_POST["valider"])) {
        if ($db_found) { 
         $sql = "SELECT Nom_client,Prénom_client,Email_client,NumTéléphone,N_Carte_Etudiante,Adresse_Ligne_1, Adresse_Ligne_2,Ville,CodePostale,Pays
                 FROM client
                 WHERE Email_client LIKE '%$username2%' AND Mdp_client LIKE '%$motdepasse%' ";

            if (($username2 != "")|| ($motdepasse != "")) {
                 
                        $result = mysqli_query($db_handle, $sql);

                        if (!$result) {
                            die("Query failed: " . mysqli_error($db_handle));
                            }
                            while ($data = mysqli_fetch_assoc($result)) {

                            echo "<h1> Mes informations: </h1>";
            
                            echo " Nom : " . $data["Nom_client"] . "<br>";
                            echo "<br>";
                            
                            echo " Prénom : " . $data["Prénom_client"]."<br>" ;
                            echo "<br>";
                            
                            echo "Email : " . $data["Email_client"] ."<br>";
                            echo "<br>";
                            
                            echo "Numéro de Téléphone : " . $data["NumTéléphone"] . "<br>";
                            echo "<br>";

                            echo "Numero Carte Etudiante : " . $data["N_Carte_Etudiante"]."<br>" ;
                            echo "<br>";

                            echo "Adresse Ligne 1 : " . $data["Adresse_Ligne_1"]."<br>" ;
                            echo "<br>";

                            echo "Adresse Ligne 2 : " . $data["Adresse_Ligne_2"]."<br>" ;
                            echo "<br>";

                            echo "Ville : " . $data["Ville"]."<br>" ;
                            echo "<br>";

                            echo "Code Postale: " . $data["CodePostale"]."<br>" ;
                            echo "<br>";

                            echo "Pays : " . $data["Pays"]."<br>" ;
                            echo "<br>";



                    
                        }
            
            } else {echo "Aucun résultat"; }

        } else {
            echo "Database not found";
             }

        

    }

    mysqli_close($db_handle);


    ?>
    </div>
</main>



</body>


</html>
