<?php
	session_start();
	include("includes/vSession.php");
	include("includes/debut.php");
		
	if ( null==$id ) {
		header("Location:index.php");
	}
?>
		<div class="container">
			<hr>
			<div class="row">
				<div class="col-sm-8">
					<h2>Mon Compte</h2>
					<p>Introduce the visitor to the business using clear, informative text. Use well-targeted keywords within your sentences to make sure search engines can find the business.</p>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et molestiae similique eligendi reiciendis sunt distinctio odit? Quia, neque, ipsa, adipisci quisquam ullam deserunt accusantium illo iste exercitationem nemo voluptates asperiores.</p>
				</div>
				<div class="col-sm-4">
					<h2>Un problème ?</h2>
					<h4>Contactez nous :</h4>
					<address>
						<strong>CoursPHP</strong>
						<br>3481 Melrose Place
						<br>Beverly Hills, CA 90210
						<br>
					</address>
					<address>
						<abbr title="Phone"><span class="glyphicon glyphicon-earphone" aria-hidden="true"></abbr> <a href="tel:#">06.16.71.38.00</a>
						<br>
						<abbr title="Email"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></abbr> <a href="mailto:#">profphp@gmail.com</a>
					</address>
				</div>
			</div><!--fin row-->

			<hr>

			<div class="row">
				<div class="col-sm-3">
					<a href="listeMembre.php"><img class="img-circle img-responsive img-center" src="./includes/images/compte.jpg" alt="Information"></a>
					<h2>Liste des Membres</h2>
				</div>
			</div><!--fin row-->
			<br />
			<br />
			<br />
			<div class="row">
					<div class="col-sm-12">
						<a href="logout.php" class="btn btn-warning btn-lg btn-block" role="button">Déconnexion</a>
				</div>
		</div><!--fin container-->
		<br />
		<br />
		<br />
		<br />
		<br />
		<br />
	</body>
</html>
