<?php
	session_start();
	include("includes/vSession.php");
	include("includes/debut.php");
	
	if ( null==$id ) {
		header("Location:index.php");
	}
	
	if (!empty($_GET['x'])) {
		$x = $_REQUEST['x'];
	}
	if ( null==$x ) {
		header("Location:listeMembre.php");
	}
	
	if(!empty($_POST)){
		$x= $_POST['x'];
		$query = $db->prepare ("DELETE FROM user 
								WHERE user_id = ".$x."");
		$query->execute();
		$query->closeCursor();
		header("Location:listeMembre.php");
	}
?>
		<div class="container">
			<hr>
			<div class="row">
				<div class="col-md-12">
					<h1>M2LOccasion
						<small>Supprimer</small>
					</h1>
				</div>
			</div><!--fin row-->
			<hr>
			<div class="row">
				<h3>Etes-vous sur de vouloir supprimer ce membre ? <small> Toute suppression est definitive</small></h3>
				<div class="container-fluid">
				<br />
<?php
					$query = $db->prepare ("SELECT user_name, user_login 
											FROM user 
											WHERE user_id = ".$x."");
					$query->execute();
							
					while ($data = $query->fetch()){
						
						echo'
						<div class="row">
						  <div class="col-sm-offset-4 col-sm-4">
							<div class="thumbnail">
							<img id="img2" class="img-responsive" class="media-object" src="./includes/images/qsup.jpg" alt="Image non disponible"/>
							  <div class="caption">
								<h3>'.stripslashes(htmlspecialchars($data['user_name'])).'</h3>
								<p>'.stripslashes(htmlspecialchars($data['user_login'])).'</p>
							  </div>
							</div>
						  </div>
						</div>
						';
					}
					$query->closeCursor();
?>					
					<form class="form-horizontal" method="post" action="deleteMembre.php">
						<input type="hidden" name="x" value="<?php echo $x;?>"/>
						<legend></legend>
						<div class="form-group">
							<label class="col-md-5 control-label"></label>
							<div class="col-md-6">
								<button type="submit" class="btn btn-lg btn-success">Oui</button>
								<a class="btn btn-lg btn-danger" href="listeMembre.php">Non</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<br />
		<br />
		<br />
	</body>
</html>