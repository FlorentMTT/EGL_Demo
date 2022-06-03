<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8" />
	<title>Mini-chat</title>
</head>

<body>

	<form action="exo.php" method="post">
		<p>
			<label for="pseudo">Pseudo</label> : <input type="text" name="pseudo" id="pseudo" /><br />
			<label for="message">Message</label> : <input type="text" name="message" id="message" /><br />
			<input type="submit" value="Envoyer" />
		</p>
	</form>

	<?php
	try {
		$bdd2 = new PDO('mysql:host=localhost;dbname=minichat;charset=utf8', 'root', '', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
	} catch (Exception $e) {
		die('Erreur : ' . $e->getMessage());
	}

	$sqlRqt = 'SELECT * FROM message';
	$req = $bdd2->prepare($sqlRqt);
	$req->execute([]);
	$mess = $req ->fetchAll();
	echo'<pre>';
	print_r($mess);
	echo'</pre>';

	foreach ( $mess as $i){
		echo $i['MESSAGE'] . " " .  $i['PSEUDO'];
		echo'<br>';
	}
	?>


</body>
</html>