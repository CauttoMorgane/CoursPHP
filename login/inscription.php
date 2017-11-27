<?php 
        include("includes/debut.php");
		
    if($_SERVER["REQUEST_METHOD"]== "POST" && !empty($_POST)){
    
       //on initialise nos messages d'erreurs;
		$nameError = '';
		$loginError ='';
		$mdpError ='';
		$mdpConfError ='';
		$validError ='';
		
        
        // on recupère nos valeurs 
        $name = htmlentities(trim($_POST['name']));
		$login = htmlentities(trim($_POST['login']));
        $mdp = htmlentities(trim($_POST['mdp']));
        $mdpConf = htmlentities(trim($_POST['mdpConf']));
        
		//on vérifie nos champs
		$valid = true;
		if (empty($name)) {
            $nameError = 'Merci d\'entrer un Nom';
            $valid = false;
        }else if (!preg_match("/^[\p{L}-]*$/",$name)) {
            $nameError = "Only letters and white space allowed"; 
			$valid = false;
        }
		
		if (empty($login)) {
            $loginError = 'Merci d\'entrer un Identifiant';
            $valid = false;
        }
		$query=$db->prepare('SELECT COUNT(*) AS nbr FROM user WHERE user_login =:login');
		$query->bindValue(':login',$login, PDO::PARAM_STR);
		$query->execute();
		$login_free=($query->fetchColumn()==0)?1:0;
		$query->CloseCursor();
		if(!$login_free)
		{
			$loginError = "Ce login est déjà utilisé par un autre membre";
			$valid = false;
		}
		if (empty($mdp)) {
            $mdpError = 'Merci d\'entrer un Mot de passe';
            $valid = false;
        }
		if (empty($mdpConf)) {
            $mdpConfError = 'Merci de Confirmer le mot de passe';
            $valid = false;
        }else if($mdp != $mdpConf) {
			$mdpConfError = "Le Mot de passe et la Confirmation sont diffèrent";
			$valid = false;
		}
        
        // si les données sont présentes et bonnes, on se connecte à la base
        if ($valid==true) {
			$query=$db->prepare("INSERT INTO user (user_name, user_login, user_mdp) 
								values(?, ?, ?)");
            $query->execute(array($name, $login, md5($mdp)));
            header("Location: membre.php");
        }
    }
?>
		<section>
			<div class="container">
				<hr>
				<div class="row">
					<div class="col-lg-12">
						<h1 class="section-heading">Inscription CoursPHP </h1>
						<p class="lead section-lead">CoursPHP est un site qui vous accompagne dans l'apprentissage de PHP.</p>
						<p class="section-paragraph">Vous inscrire sur CoursPHP vous permettra de suivre la formation.</p>
					</div>
				</div>
			</div>	
			
			<div class="container">
				<br />
				<form class="form-horizontal" method="post" action="inscription.php">
					<fieldset>
						<legend></legend>
						<div class="form-group <?php echo !empty($nameError)?'error':'';?>">
							<label class="col-md-4 control-label" for="name">Nom</label>  
							<div class="col-md-4">
								<input type="text" name="name" value="<?php echo !empty($name)?$name:'';?>" placeholder="Nom" class="form-control input-md" requierd/>
									<?php if (!empty($nameError)): ?>
										<div class="alert alert-danger" role="alert"><span class="help-inline"><?php echo $nameError;?></span></div>
									<?php endif; ?>
							</div>
						</div>
						<div class="form-group <?php echo !empty($loginError)?'error':'';?>">
							<label class="col-md-4 control-label" for="login">Identifiant</label>  
							<div class="col-md-4">
								<input type="text" name="login" value="<?php echo !empty($login)?$login:'';?>" placeholder="Identifiant" class="form-control input-md" requierd/>
									<?php if (!empty($loginError)): ?>
										<div class="alert alert-danger" role="alert"><span class="help-inline"><?php echo $loginError;?></span></div>
									<?php endif; ?>
							</div>
						</div>
						<div class="form-group <?php echo !empty($mdpError)?'error':'';?>">
							<label class="col-md-4 control-label" for="mdp">Mot de passe</label>  
							<div class="col-md-4">
								<input type="password" name="mdp" value="" placeholder="Mot de passe" class="form-control input-md" requierd/>
									<?php if (!empty($mdpError)): ?>
										<div class="alert alert-danger" role="alert"><span class="help-inline"><?php echo $mdpError;?></span></div>
									<?php endif; ?>
							</div>
						</div>
						<div class="form-group <?php echo !empty($mdpConfError)?'error':'';?>">
							<label class="col-md-4 control-label" for="mdpConf">Confirmer Mot de passe</label>  
							<div class="col-md-4">
								<input type="password" name="mdpConf" value="" placeholder="Confirmer mot de passe" class="form-control input-md" requierd/>
									<?php if (!empty($mdpConfError)): ?>
										<div class="alert alert-danger" role="alert"><span class="help-inline"><?php echo $mdpConfError;?></span></div>
									<?php endif; ?>
							</div>
						</div>
					</fieldset>
					<fieldset>
						<legend></legend>
						<!-- Button (Double) -->
						<div class="form-group">
							<label class="col-md-4 control-label" for="submit"></label>
							<div class="col-md-8">
								<input type="submit" name="submit" value="Valider" class="btn btn-primary"/>
								<a class="btn btn-danger" href="index.php">Retour</a>
							</div>
						</div>
					</fieldset>
				</form>
			</div>
		</section>
		<br />
		<br />
		<br />
	</body>
</html>
