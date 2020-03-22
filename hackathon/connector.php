 <!DOCTYPE html>
<html>

<style>
.homebutton button {
	padding-left: 9px;
	padding-right: 8px;
	width:45px;
	padding-top:1px;
	padding-bottom: 5px;
	height: 36px;
	background: transparent;
	color: black;
	border: 1px solid black;
	border-radius: 3px;
	cursor: pointer;
	transition: all ease 2s;
	font-size: 120%;
	position: absolute;
	top: 10px;
	left: 10px;
	font-size: 28px;
	
}

.homebutton button:hover {
	box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
	background-color: Yellow;
}
</style>
<head>

<?php

if (isset($_GET['question'])){
	echo "Question isset";
	// Connect to database
	$mysqli = new mysqli("localhost", "root", "", "wissensdatenbank2");

	/* check connection */
	if ($mysqli->connect_errno) {
		printf("Connect failed: %s\n", $mysqli->connect_error);
		exit();
	}
	
	/* Select queries return a resultset */
	$query = "SELECT * FROM `keywords` WHERE Keyword = 'Ibuprofen' ";
	if ($result = $mysqli->query($query)) {
		printf("Select returned %d rows.\n", $result->num_rows);

		/* free result set */
		$result->close();
	}

$mysqli->close();	

	// DB aufruf
	
	// Weiterleiten zu neuer Seite
	if (exists){
		// Weiterleiten auf Fragen Übersichtsseite
		// Reroute keyword.php
	}
	else {
		// Weiterleiten auf Frage erstellen Seite
		// Reroute index.php
	}
	
}

?>

<title>Wir gegen Corona - Gib deine eigene Frage an!</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<h1>Choose a question</h1>
<p>Here you can type your question!</p>

 <form action="">
  <label for="question">Question</label>
  <input type="text" id="question" name="question"><br><br>
  <input type="submit" value="Submit">
</form> 
<div class="homebutton">  
  <form method="get" action="/hackathon/index.php">
	<button type = "btn"><i class="fa fa-home"></i></button>
  </form>
</div>

</body>
</html>