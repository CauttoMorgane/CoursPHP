<?php
	include("debut.php");
?>
		
		<section id="connexion">
			<div>
				<h2>Inscription</h2>
				<form method="POST" action="">
					<hr>
					
					<label><b>Civilité : </b></label>
					
					<input type="radio" name="civilite" value="Mme">
					<label>Mme.</label>
						
					<input type="radio" name="civilite" value="M">
					<label>M.</label>
					
					<div class="flex label-top">
						<div>
							<label><b>Nom : </b></label>
							<input type="text" name="firstname" placeholder="Nom" required>
							
							<label><b>Date de naissance : </b></label>
							<input type="date" name="date" required>
						</div>
						
						<div>
							<label><b>Prénom : </b></label>
							<input type="text" name="name" placeholder="Prénom" required>
							
							<label><b>Adresse e-mail : </b></label>
							<input type="email" name="mail" placeholder="newsletter@exemple.com" required>
							
						</div>
					</div>
					<hr>
					<div class="center label-top">
						<label><b>Login : </b></label>
						<input type="text" name="login" placeholder="Login" required>
								
						<label><b>Mot de passe : </b></label>
						<input type="password" name="password" placeholder="**********************************"required>
								
						<label><b>Confirmer mot de passe : </b></label>
						<input type="password" name="confirmepassword" required>
					</div>
					<hr>
					<div class="center">
						<input type="submit" value="Valider" class="bouton">
					</div>
					
				</form>
			</div>
		</section>

<?php
	include("fin.php");
?>