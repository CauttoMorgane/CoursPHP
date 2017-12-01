<?php
	include("debut.php");
?>
		
		<section id="connexion">
			<div class="center">
				<h2>Connexion</h2>
				<form method="POST" action="" class="label-top">
					<label><b>Login / Adresse e-mail: </b></label>
					<input type="text" name="login" placeholder="newsletter@exemple.com" required>
					<label><b>Mot de passe : </b></label>
					<input type="password" name="password" placeholder="**********************************" required>
					<div class="center">
						<input type="submit" value="Valider" class="bouton">
					</div>
				</form>
			</div>
		</section>
		
<?php
	include("fin.php");
?>