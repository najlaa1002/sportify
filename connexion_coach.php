<?php

$servername = 'localhost';
$username = 'root';
$password = '';
$database = 'projet';

$db_handle = mysqli_connect('localhost', 'root', '' );
$db_found = mysqli_select_db($db_handle, $database);


 $connexioncompte_coach = isset($_POST["Se connecter"])? $_POST["Se connecter"] : "";

$username2 = isset($_POST["username"])? $_POST["username"] : "";
$motdepasse = isset($_POST["motdepasse"])? $_POST["motdepasse"] : "";


if (!$db_handle){
die("Connexion échouée". mysqli_connect_error());
}

$sql = "SELECT Nom_coach, Prénom_coach,Email_coach, Bureau_coach, Téléphone_coach,Photo_coach,CV_coach
        FROM coach
        WHERE Email_coach LIKE '%$username2%' AND Mdp_coach LIKE '%$motdepasse%'";


if (isset($_POST["Se connecter"])) {
	if ($db_found) {
		if ($username2 !="" || $motdepasse != "") { 
            
            $result = mysqli_query($db_handle, $sql);
            if (!$result) {
                        die("Query failed: " . mysqli_error($db_handle));
                        }

            while ($data = mysqli_fetch_assoc($result)) {
            echo "<h1> Mes informations : </h1>";

            echo " Nom : " . $data["Nom_coach"] . "<br>";
            echo "<br>";
            
            echo " Prénom : " . $data["Prénom_coach"]."<br>" ;
            echo "<br>";
            
            echo "Email : " . $data["Email_coach"] ."<br>";
            echo "<br>";
            
            echo "Bureau : " . $data["Bureau_coach"] . "<br>";
            echo "<br>";

            echo "Numéro de Téléphone : " . $data["Téléphone_coach"] . "<br>";
            echo "<br>";

            echo "<br>";
            echo "Photo :" . "<br>" . "&nbsp". "&nbsp". "&nbsp". "&nbsp". "&nbsp". "&nbsp". "<img src='" .$data["Photo_coach"] . "' height='120' width='100'>" . "<br>";
          

            echo "CV : " . $data["CV_coach"] . "<br>";
            echo "<br>";


            }

        }else {echo "Aucun résultat"; }

    }else {
        echo "Database not found";
         }

}

 mysqli_close($db_handle);



?>

