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
    <style>
			
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
    <img src="images/logo.png" class="rounded-circle img-circle logo" width="75px" height="75px" alt="Logo">
    <ul>
        <li><a href="index.html">Accueil</a></li>
        <li><a href="Parcourir.html">Tout parcourir</a></li>
        <li><a href="Recherche.html">Recherche</a></li>
        <li><a href="Meeting.html">Rendez-vous</a></li>
        <li><a href="votrecompte.html">Votre compte</a></li>
    </ul>
</nav>
            <main>
                <div id="creationcompte">
                    <div style="font-family: Georgia, 'Times New Roman', Times, serif; color: #fff; text-align: center; margin-top: 25px;">
                        <h1>Création de compte</h1>
                    </div>
                    <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
                        <label for="nom">Nom :</label>
                        <input type="text" name="nom" id="nom" placeholder="Nom" required><br>

                        <label for="prenom">Prénom :</label>
                        <input type="text" name="prenom" id="prenom" placeholder="Prénom" required><br>

                        <label for="adresse_ligne_1">Adresse (ligne 1) :</label>
                        <input type="text" name="adresse_ligne_1" id="adresse_ligne_1" placeholder="Adresse" required><br>

                        <label for="adresse_ligne_2">Adresse (ligne 2) :</label>
                        <input type="text" name="adresse_ligne_2" id="adresse_ligne_2" placeholder="Adresse"><br>

                        <label for="ville">Ville :</label>
                        <input type="text" name="ville" id="ville" placeholder="Ville" required><br>

                        <label for="code_postal">Code postal :</label>
                        <input type="number" name="code_postal" id="code_postal" placeholder="Code Postal" required><br>

                        <label for="pays">Pays :</label>
                        <input type="text" name="pays" id="pays" placeholder="Pays" required><br>

                        <label for="num_carte_etudiante">Numéro de carte étudiante :</label>
                        <input type="number" name="num_carte_etudiante" id="num_carte_etudiante" placeholder="Numéro de Carte étudiante" required><br>

                        <label for="email">Courriel :</label>
                        <input type="email" name="email" id="email" placeholder="Courriel" required><br>

                        <label for="telephone">Téléphone :</label>
                        <input type="text" name="telephone" id="telephone" placeholder="Téléphone" required><br>

                        <label for="mdp">Mot de passe :</label>
                        <input type="password" name="mdp" id="mdp" placeholder="Mot de passe" required><br>

                        <label for="type_carte_paiement">Type de carte de paiement :</label>
                        <select name="type_carte_paiement" id="type_carte_paiement" style="padding: 8px; border-radius: 6px;" required>
                            <option value="Visa">Visa</option>
                            <option value="MasterCard">MasterCard</option>
                            <option value="American Express">American Express</option>
                        </select><br>

                        <label for="num_carte">Numéro de carte :</label>
                        <input type="number" name="num_carte" id="num_carte" placeholder="Numéro de carte" required><br>

                        <label for="nom_carte">Nom sur la carte :</label>
                        <input type="text" name="nom_carte" id="nom_carte" placeholder="Nom" required><br>

                        <label for="date_expiration">Date d'expiration :</label>
                        <input type="text" name="date_expiration" id="date_expiration" placeholder="AAAA-MM-JJ" required><br>

                        <label for="code_securite">Code de sécurité :</label>
                        <input type="number" name="code_securite" id="code_securite" placeholder="Code de sécurité" required><br>

                        <input type="submit" value="Créer un compte" style="margin-bottom: 15px;">
                    </form>
                </div>

                <div class="info-container">
                <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "projet";
                    $table = "client";

                    // Créer une connexion à la base de données
                    $conn = new mysqli($servername, $username, $password, $dbname);

                    // Vérifier la connexion
                    if ($conn->connect_error) {

                     die("Échec de la connexion à la base de données : " . $conn->connect_error);
                    }

                    if ($_SERVER["REQUEST_METHOD"] == "POST") {

                        if (
                         isset($_POST["nom"]) && isset($_POST["prenom"]) && isset($_POST["adresse_ligne_1"]) &&
                         isset($_POST["ville"]) && isset($_POST["code_postal"]) && isset($_POST["pays"]) &&
                         isset($_POST["num_carte_etudiante"]) && isset($_POST["email"]) && isset($_POST["telephone"]) &&
                         isset($_POST["mdp"]) && isset($_POST["type_carte_paiement"]) && isset($_POST["num_carte"]) &&
                         isset($_POST["nom_carte"]) && isset($_POST["date_expiration"]) && isset($_POST["code_securite"])
                        ) {

                            $nom = $_POST["nom"];
                            $prenom = $_POST["prenom"];
                            $adresseLigne1 = $_POST["adresse_ligne_1"];
                            $adresseLigne2 = $_POST["adresse_ligne_2"];
                            $ville = $_POST["ville"];
                            $codePostal = $_POST["code_postal"];
                            $pays = $_POST["pays"];
                            $numCarteEtudiante = $_POST["num_carte_etudiante"];
                            $email = $_POST["email"];
                            $telephone = $_POST["telephone"];
                            $mdp = $_POST["mdp"];
                            $typeCartePaiement = $_POST["type_carte_paiement"];
                            $numCarte = $_POST["num_carte"];
                            $nomCarte = $_POST["nom_carte"];
                            $dateExpiration = $_POST["date_expiration"];
                            $codeSecurite = $_POST["code_securite"];

                             // Vérifier si le client existe déjà
                            $requete = "SELECT * FROM $table WHERE Nom_client = '$nom' AND Prénom_client = '$prenom' AND Email_client = '$email'";
                            $resultat = $conn->query($requete);

                            if ($resultat->num_rows > 0) {
                                echo "Votre compte existe déjà.";
                            } else {

                            // Préparer la requête d'insertion des données
                                $sql = "INSERT INTO $table (Nom_client, Prénom_client, Adresse_ligne_1, Adresse_ligne_2, Ville, CodePostale, Pays, N_carte_etudiante, Email_client,NumTéléphone, Mdp_client, Type_carte, Num_Carte, Nom_carte, Date_expiration, Code_sécurité) VALUES ('$nom', '$prenom', '$adresseLigne1', '$adresseLigne2', '$ville', '$codePostal', '$pays', '$numCarteEtudiante', '$email', '$telephone', '$mdp', '$typeCartePaiement', '$numCarte', '$nomCarte', '$dateExpiration', '$codeSecurite')";

                                 if ($conn->query($sql) === TRUE) {
                                echo "Le nouveau client a été ajouté avec succès.";
                                 } else {
                                echo "Erreur lors de l'ajout du client : " . $conn->error;
                                 }
                            }

                        } else {
                            echo "Veuillez remplir tous les champs du formulaire.";
                            }
                            
                    }

                 // Fermer la connexion à la base de données
                $conn->close();
                ?>



            </main>
            <footer style="background-color: black; color: white; padding: 10px; text-align: center;">
                <p>&copy; 2023 SPORTIFY. Tous droits réservés.
                    
                        <a class="footer-text">Contact</a><br>
                        
                       
                      
                        <a class="footer-link" href="mailto:sportify.sportify.com">sportify.ssjm@gmail.com</a><br>
                        <a class="footer-link" href="tel:+33123456789">+33 1 23 45 67 89</a><br>
                        <a class="footer-link" href="https://www.google.com/maps/place/37+Quai+de+Grenelle,+75015+Paris/@48.8515004,2.2850437,17z/data=!3m1!4b1!4m6!3m5!1s0x47e6700497ee3ec5:0xdd60f514adcdb346!8m2!3d48.8515004!4d2.2872324!16s%2Fg%2F11bw3y1mf8?entry=ttu">37, quai de Grenelle, 75015 Paris, France</a>
                    </div>
                </footer>
                </p>
            </footer>
            
</body>
</html>