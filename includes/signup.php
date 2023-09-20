<?php






if (isset($_POST['formsend'])) {

	?>
	<script>alert("debut ")</script>
	<?php
	extract($_POST);


	if (!empty($password) && !empty($email) && !empty($cpassword)) {

		if ($email == $cemail)

			if ($password == $cpassword) {

				$options = [
					'cost' => 12,
				];
				$hashpass = password_hash("$password", PASSWORD_BCRYPT, $options);


				global $db;

				$c = $db->prepare("SELECT email FROM utilisateurs WHERE email = :email");
				$c->execute(['email' => $email]);
				$result = $c->rowCount();

				if ($result == 0) {

					$q = $db->prepare("INSERT INTO utilisateurs(prenom,nom,email,password) VALUES(:prenom,:nom,:email,:password)");
					$q->execute([
						'nom' => $nom,
						'prenom' => $prenom,
						'email' => $email,
						'password' => $hashpass

					]);
					?>
					<script>alert("compte créer")</script>
					<?php


				} else {
					?>
					<script>alert("email deja utiliser")</script>
					<?php
				}


			} else {
				?>
				<script>alert("mot de passe different")</script>
				<?php
			}


	}








}



?>


<div id="signup" class="form-container">
	<h2>Inscription</h2>
	<form method="post">

		<input type="text" id="nom" name="nom" placeholder="Nom" required>


		<input type="text" id="prenom" name="prenom" placeholder="Prenom" required>


		<input type="email" id="email" name="email" placeholder="Email" required>


		<input type="email" id="cemail" name="cemail" placeholder="Confirmation Email" required>


		<input type="password" id="password" name="password" placeholder="Mot de passe" required>


		<input type="password" id="cpassword" name="cpassword" placeholder="Confirmation Mot de passe" required><br><br>

		<input type="submit" name="formsend" id="formsend" value="S'inscrire">
	</form>
	<p> Vous avez de compte deja un compte? <br> cliquez sur connexion si desssous </p>
</div>