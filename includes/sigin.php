




<?php   



	


     if(isset($_POST['formsend'])){

			?>
			<script>alert("debut ")</script>
			<?php 
        extract($_POST);


      	if (!empty($password) && !empty($email) && !empty($cpassword)) {
      		
			if($email==$cemail)
			?>
			<script>alert("email identique ")</script>
			<?php
			if($password == $cpassword){

   			$options = [
    			'cost' => 12,
				];
				$hashpass = password_hash("$password", PASSWORD_BCRYPT, $options);
            
            
				global $db;
			
            $c =$db->prepare("SELECT email FROM utilisateurs WHERE email = :email");
            $c->execute(['email' => $email]);
            $result = $c->rowCount();
			?>
			<script>alert("mot de passe identique ")</script>
			<?php 
            	if($result == 0){

            	$q= $db->prepare("INSERT INTO utilisateurs(prenom,nom,email,password) VALUES(:prenom,:nom,:email,:password)");
					$q->execute([
					'nom' =>$nom,
					'prenom' => $prenom,
					'email' => $email, 
					'password' => $hashpass 
	
					]);	
					?>
					<script>alert("reussi" )</script>
					<?php 


            	}else{echo "Un email existe deja!" ;}   


				}else{echo "Mot de passe different!";} 


			}    


    				
	

 					 


    } else echo "Les champs ne sont pas tous remplies";



?>