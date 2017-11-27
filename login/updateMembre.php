<?php
	session_start();
	include("includes/vSession.php");
	include("includes/debut.php");
	
	if ( null==$id ) {
		header("Location:login.php");
	}
	
	if (!empty($_GET['x'])) {
		$x = $_REQUEST['x'];
	}
	if ( null==$x ){ 
		header("Location:listeMembre.php");
	}
	
    if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST)) {

            // on initialise nos erreurs
			$login = '';
            $nameError = '';
			

            // On assigne nos valeurs
            $login = htmlentities(trim($_POST['login']));
            $name = htmlentities(trim($_POST['name']));

            // on vérifie nos champs
        $valid = true;
        if (empty($name)) {
            $nameError = 'Merci d\'entrer un Nom';
            $valid = false;
        }else if (!preg_match("/^[\p{L}-]*$/",$name)) {
            $nameError = "Only letters and white space allowed"; 
			$valid = false;
          }
		  
            // mise à jour des donnés
        if ($valid) {
			$query=$db->prepare ("UPDATE user 
									SET user_login = :login, user_name = :name
									WHERE user_id = ".$x."");
			$query->bindValue(':login',$login,PDO::PARAM_STR);
			$query->bindValue(':name',$name,PDO::PARAM_STR);
			$query->execute();
			$query->CloseCursor();
			header("Location: listeMembre.php");
        }
    }else {

		$query = $db->prepare ("SELECT * FROM user WHERE user_id = ".$x."");
        $query->execute();
		
		while ($data = $query->fetch()){
			
			$login = $data['user_login'];
			$name = $data['user_name'];
		}
    }  
?>
    	<div class="container">
			<hr>
			<div class="row">
				<div class="col-sm-8">
					<h2>Informations des membres<br />
						<small>Ici vous pouvez mettre à jour les données des membres.</small>
					</h2>
				</div>
			</div>
			<hr>
			<br />
			<form class="form-horizontal" method="post" action="updateMembre.php?x=<?php echo $x ;?>">
				<fieldset>
						<div class="form-group <?php echo !empty($loginError)?'error':'';?>">
							<label class="col-md-4 control-label" for="login">Login</label>  
							<div class="col-md-4">
								<input type="text" name="login" value="<?php echo !empty($login)?$login:'';?>" placeholder="Login" class="form-control input-md" requierd/>
									<?php if (!empty($loginError)): ?>
										<div class="alert alert-danger" role="alert"><span class="help-inline"><?php echo $loginError;?></span></div>
									<?php endif; ?>
							</div>
						</div>
						<div class="form-group <?php echo !empty($nameError)?'error':'';?>">
							<label class="col-md-4 control-label" for="name">Nom</label>  
							<div class="col-md-4">
								<input type="text" name="name" value="<?php echo !empty($name)?$name:'';?>" placeholder="Nom" class="form-control input-md" requierd/>
									<?php if (!empty($nameError)): ?>
										<div class="alert alert-danger" role="alert"><span class="help-inline"><?php echo $nameError;?></span></div>
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
								<input type="submit" name="submit" value="Valider" class="btn btn-success"/>
								<a class="btn btn-danger" href="listeMembre.php">Retour</a>
							</div>
						</div>
					</fieldset>
			</form>
		</div>
		<br />
		<br />
		<br />
    </body>
</html>