<?php
	session_start();
	include("includes/vSession.php");
	include("includes/debut.php");
		
	if ( null==$id ) {
		header("Location:login.php");
	}
?>
		<div class="container">
			<hr>
			<div class="row">
				<div class="col-md-12">
					<h1>Membres
						<small>Gestion</small>
					</h1>
				</div>
			</div><!--fin row-->
			<hr>
			<div class="row">
				<br />
				<div class="table-responsive">
					<table class="table table-striped table-hover table-bordered">
						<thead>
							<th>Nom</th>
							<th>Pseudo</th>
						</thead>
						
						<tbody>
							<?php
								$query = $db->prepare("SELECT user_id, user_name, user_login FROM user");
								$query->execute();

								if ($query->rowCount() > 0)
								{
									   //On lance la boucle
									   
									   while ($data = $query->fetch())
									   {
											echo'<tr>';
												echo'<td>'.$data['user_name'].'</td>';
												echo'<td>'.$data['user_login'].'</td>';
												echo'<td>';
													echo '<a class="btn btn-warning" href="updateMembre.php?x='.$data['user_id'].'">Mettre à jour</a>';// un autre td pour le bouton d'update
												echo'</td>';
												echo'<td>';
													echo '<a class="btn btn-danger" href="deleteMembre.php?x='.$data['user_id'].'">Supprimer</a>';// un autre td pour le bouton de suppression
												echo'</td>';
											echo'</tr>';
										}
								}
								$query->CloseCursor();
							?>    
						</tbody>
					</table>
				</div>
			</div><!--fin row-->
			<div class="row">
				<div class="col-md-12">
					<a class="btn btn-primary btn-block" href="index.php">Retour</a>
				</div>
			</div><!--fin row-->
		</div><!--fin container-->
		<br />
		<br />
		<br />
    </body>
</html>