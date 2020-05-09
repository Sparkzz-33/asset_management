<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
	  <a class="navbar-brand" href="#">Asset Management System</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>
	  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
	    <div class="navbar-nav">
	      <a class="nav-item nav-link active" href="#"><i class="fa fa-home"></i> Home <span class="sr-only">(current)</span></a>
	      <?php
	      	if(isset($_SESSION["userid"]))
	      	{
	      		?>
	      			<a class="nav-item nav-link active" href="logout.php"><i class="fa fa-user"></i>  Logout <span class="sr-only">(current)</span></a>
	      		<?php
	      	}
	      ?>
	      
	    </div>
	  </div>
	</nav>