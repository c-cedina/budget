<?php


if (isset($_POST['formlogin'])) {

	extract($_POST);
	?>
	<script>alert("debut")</script>
	<?php
	if (!empty($lemail) && !empty($lpassword)) {

		$q = $db->prepare("SELECT * FROM utilisateurs WHERE email = :email");
		$q->execute(['email' => $lemail]);
		$result = $q->fetch();
		// var_dump($result);
		?>
		<script>alert("email existe")</script>
		<?php

		if ($result == true) {
			// le compte existe bien 
			if (password_verify($lpassword, $result['password'])) {
				echo "Connection en cours";
				?>
				<script>alert("reussie")</script>
				<?php
				$_SESSION['email'] = $result['email'];
				$_SESSION['prenom'] = $result['prenom'];
				$_SESSION['nom'] = $result['nom'];
				$year_c = substr($result['date_creation'], 0, 4);
				$month_c = substr($result['date_creation'], 5, 2);
				$day_c = substr($result['date_creation'], 8, 2);
				$_SESSION['date_creation'] = $day_c . '-' . $month_c . '-' . $year_c;

			} else {
				echo "erreur mot de passe";
			}

		} else {
			echo "Le compte portant " . $lemail . " n'existe pas";
		}
	}
} else
?>

<div id="login" class="form-container">
	<h2>Connexion</h2>
	<form method="post">
		<label for="email">Email :</label>
		<input type="email" id="lemail" name="lemail" required><br><br>

		<label for="password">Mot de passe :</label>
		<input type="password" id="lpassword" name="lpassword" required><br><br>

		<input type="submit" id="formlogin" name="formlogin" value="Se Connecter">
	</form>
	<p> vous n'avez pas de compte? <br>cliquez sur inscription si desssous </p>
</div>