<?php 

try {
	$bdd = new PDO('mysql:host=localhost;dbname=gunther;charset=utf8', 'root', '', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
} catch (Exception $e) {
	die('Erreur : ' . $e->getMessage());
}

try {
	$bdd2 = new PDO('mysql:host=localhost;dbname=minichat;charset=utf8', 'root', '', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
} catch (Exception $e) {
	die('Erreur : ' . $e->getMessage());
}



$sqlQuery = 'SELECT cli_email from epr_client where CLI_ID = :id';
$req = $bdd->prepare($sqlQuery);
$req->execute([
	'id' => 1,
]);

$client = $req -> fetchAll();
echo '<pre>';
print_r($client) ;
echo'<br';
echo'</pre>';
?>


<h2> Exb</h2>

<?php 
$sqlQueryExo2 = 'SELECT  VEH_ID,  VEH_MARQUE from epr_vehicule
JOIN epr_chauffeur ON CHA_ID = VEH_CHA_ID';
$reqExo2 = $bdd->prepare($sqlQueryExo2);
$reqExo2->execute([]);
$allVehicules = $reqExo2 -> fetchAll();

echo '<pre>';
print_r($allVehicules);
echo '</pre>';
?>

<h2> Exd</h2>

<?php 

$pseudo = $_POST['pseudo'];
$msg = $_POST['message'];

 $sqlQueryExo3 = 'INSERT INTO MESSAGE  (pseudo ,message) VALUES(:pseudo, :msg)';
 $reqExo3 = $bdd2 -> prepare($sqlQueryExo3);
 $reqExo3->execute([
     'pseudo' => $pseudo,
   'msg'=> $msg,
 ]);
 header('Location: exd.php');



?>
