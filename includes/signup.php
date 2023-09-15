<?php






if (isset($_POST['formsend'])) {

	?>
	<script>alert("debut ")</script>
	<?php
	extract($_POST);


	if (!empty($password) && !empty($email) && !empty($cpassword)) {

		if ($email == $cemail)
		?>
		<script>alert("email identique ")</script>
		<?php
		if ($password == $cpassword) {

			$options = [
				'cost' => 12,
			];
			$hashpass = password_hash("$password", PASSWORD_BCRYPT, $options);


			global $db;

			$c = $db->prepare("SELECT email FROM utilisateurs WHERE email = :email");
			$c->execute(['email' => $email]);
			$result = $c->rowCount();
			?>
			<script>alert("mot de passe identique ")</script>
			<?php
			if ($result == 0) {

				$q = $db->prepare("INSERT INTO utilisateurs(prenom,nom,email,password) VALUES(:prenom,:nom,:email,:password)");
				$q->execute([
					'nom' => $nom,
					'prenom' => $prenom,
					'email' => $email,
					'password' => $hashpass

				]);
				?>
				<script>alert("reussi")</script>
				<?php


			} else {
				echo "Un email existe deja!";
			}


		} else {
			echo "Mot de passe different!";
		}


	} else
		echo "Les champs ne sont pas tous remplies";








}



?>


<div id="signup" class="form-container">
	<h2>Inscription</h2>
	<form method="post">
		<label for="nom">Nom :</label>
		<input type="text" id="nom" name="nom" required><br><br>

		<label for="prenom">Prénom :</label>
		<input type="text" id="prenom" name="prenom" required><br><br>

		<label for="email">Email :</label>
		<input type="email" id="email" name="email" required><br><br>

		<label for="cemail">Confirmation Email :</label>
		<input type="email" id="cemail" name="cemail" required><br><br>

		<label for="password">Mot de passe :</label>
		<input type="password" id="password" name="password" required><br><br>

		<label for="cpassword">Confirmation Mot de passe :</label>
		<input type="password" id="cpassword" name="cpassword" required><br><br>

		<input type="submit" name="formsend" id="formsend" value="S'inscrire">
	</form>
	<p> Vous avez de compte deja un compte? <br> cliquez sur connexion si desssous </p>
</div>