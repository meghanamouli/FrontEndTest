<?php
	$servername = "localhost";
	$username = "meghana";
	$password = "";
	$dbname = "test";
	$conn = mysqli_connect($servername, $username, $password, $dbname) or die(mysqli_connect_error());
	if(isset($_POST["submit"])) {
		$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
		$tags = $_POST['tags'];
		$description = $_POST['description'];
		$auther = $_POST['auther'];
		$title = $_POST['title'];
		$query = "INSERT into images(title, imageName, imageDesc, imageTags) values ('$title', $image', '$description', '$tags')";
		$auth_query = "INSERT into auther(auther_name) values ('$auther')";
		$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
		if ($result) {
			
		}
		else {
			?> <script>alert('Image Not uploaded');</script> <?
		}
	}

	if(isset($_POST['search_btn'])){
		$search_val = $_POST['search_btn'];
		$search_query = "SELECT * FROM images WHERE 'title' LIKE '$title%";
		$result = mysqli_query($conn, $search_query);
		while ($row = mysqli_fetch_array($result)) {
			include	'structure.php';
		}
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Flicker Task</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script type="text/javascript" src="javascript.js"></script>
	
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="content">		
		<div class="main_content">
			<div class="navbar navbar-dark bg-dark shadow-sm">
			    <div class="container d-flex justify-content-between">
			      <h3 class="navbar-brand d-flex align-items-center">
			        <i class="fas fa-camera-retro"></i> &nbsp
			        Flicker Photostream
			      </h3>			      
			    </div>
		    </div>
			<main role="main">
				<section class="jumbotron text-center">
			    <div class="container">
			      <h4 class="jumbotron-heading">Co-Operative Web</h4>
			      <p class="lead text-muted">Here is a task to build Flicker Photostream for Co-Operative Web</p>
			      <p>
			      	<form method="post" enctype="multipart/form-data" >
					    <input type="file" name="image" id="image">	
					    <input type="text" name="title" id="title" placeholder="Photo Title">
					    <input type="text" name="description" id="desc" placeholder="Description">
					    <input type="text" name="tags" id="tags" placeholder="Tags">
					    <input type="text" name="auther" id="auther" placeholder="You Name Please">    
					    <input class="btn btn-primary my-2" type="submit" name="submit" id="submit" value="Upload">
					</form>			        
			      </p>
			    </div>
			  </section>
			</main>
			<div class="album container">
				<div class="row">
					<div class="col-md-12 search_form">
						<form method="post" enctype="multipart/form-data">
							<input type="text" name="search">
							<input type="submit" name="search_btn" id="search_btn" class="btn btn-primary my-2">
						</form>
					</div>
					<?php
						$image_query = "SELECT * From images join auther on images.AutherID = auther.autherID Order BY imageID desc";
						$result = mysqli_query($conn, $image_query);
						while ($row = mysqli_fetch_array($result)) {
							include	'structure.php';
						}
					?>					
				</div>
			</div>
		</div>
	</div>
</body>
</html>

