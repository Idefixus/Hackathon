<?php

if (isset($_GET['search'])){
	$search_param = $_GET['search'];
	echo "Question isset";
	// Connect to database
	$mysqli = new mysqli("localhost", "root", "", "wissensdatenbank2");

	/* check connection */
	if ($mysqli->connect_errno) {
		printf("Connect failed: %s\n", $mysqli->connect_error);
		exit();
	}
	
	/* Select queries return a resultset */
	$query = "SELECT * FROM `keywords` WHERE Keyword LIKE '%$search_param%';";
	if ($result = $mysqli->query($query)) {
		printf("Select returned %d rows.\n", $result->num_rows);
		$row_count = $result->num_rows;
		/* free result set */
		$result->close();
	}

$mysqli->close();	

	// DB aufruf
	
	// Weiterleiten zu neuer Seite
	if ($row_count){
		// Weiterleiten auf Fragen Übersichtsseite
		// Reroute keyword.php
		header("Location: /hackathon/ubersicht.php?frage=$search_param");
		exit;
	}
	else {
		// Weiterleiten auf Frage erstellen Seite
		// Reroute index.php
		header("Location: /hackathon/erstellen.php?frage=$search_param");
		exit;
	}
	
}
?>

<!DOCTYPE html>
<html> 
<style>
.search-container {
	
	position: absolute;
	TOP: 40%;
	left:35%;
	
}

body {
	background-image: url('Pics/Hackathonlogo.png');
	background-repeat: no-repeat;
	background-size: cover;
}

.search-container input {
	height: 40px;
	width: 400px;
	border: 1px solid black;
	border-radius: 3px;
	transition: all ease 0.5s;
	
	
}

.search-container button {
	position: relative;
	margin: 2em;
	padding: .5em 1em;
	width: 8em;
	background: transparent;
	color: black;
	border: 1px solid black;
	border-radius: 3px;
	cursor: pointer;
	transition: all ease 0.5s;
}

.search-container button:hover {
	background: darkblue;
	color: white;
}

h1 {
	text-align: center;
	position: absolute;
	left: 22%;
	top: 300px;
}

img {
	position: absolute;
	top: 475px;
	left: -118%;
}

.hoverblock {
	background-color=blue;
	padding: 20px;
	display: none;
}


img:hover + .hoverblock {
	display: block;
	
}

</style>
	
<head>
	<meta charset="UTF-8" />	
	<title>Eure erster PHP-Script</title> 
</head>
 
<body>
<h1>Du möchtest dich über Fakenews informieren: <br> Versuch es mit einem Stichwort zu einem Thema welches dich interessiert</h1>
 
  <div class="search-container">
    <form action="">
      <input type="text" id="search" placeholder="Gib bitte dein Stichwort ein.." name="search">
      <button type = "submit" id="search">Search</button>
    </form>
	<img src="pics/Effekt.png" id = "germandot" height = "100">
  </div>
  <div class="hoverblock">I will show on hover</div>
  
</body>
</html>