 <!DOCTYPE html>
<html>
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

<title>Hackathon Corona</title>
</head>
<body>

<h1>Choose a question</h1>
<p>Here you can type your question!</p>

 <form action="">
  <label for="question">Question</label>
  <input type="text" id="question" name="question"><br><br>
  <input type="submit" value="Submit">
</form> 

</body>
</html>