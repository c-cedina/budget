<?php


		if(isset($_POST['formlogin'])){

			extract($_POST);
			?>
			<script>alert("debut")</script>
			<?php
			if(!empty($lemail) && !empty($lpassword)){

				$q= $db->prepare("SELECT * FROM utilisateurs WHERE email = :email");
				$q->execute(['email' =>$lemail]);
				$result = $q->fetch();
				 var_dump($result);
				 ?>
				 <script>alert("email existe")</script>
				 <?php

			    if($result == true){
			    	// le compte existe bien 
			    	if(password_verify($lpassword,$result['password'])){
			    		echo "Connection en cours";
						?>
							<script>alert("reussie")</script>
						<?php
			    		$_SESSION['email'] = $result['email'];
			    	}else{echo "erreur mot de passe";}

			    }else{
			    	echo "Le compte portant " .$lemail. " n'existe pas"; 
			    } 
			}
		}else
?>		