<?php include 'credentials.php';?>
<!DOCTYPE html>
<html> 
<style>
.search-container {
	
	position: absolute;
	TOP: 400px;
	left:22%;
	
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
	transition: all ease 5s;
	
	
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
	transition: all ease 2s;
}

.search-container button:hover {
	background: darkblue;
	color: white;
}

h1 {
	
	overflow-wrap: break-word;	
	position: absolute;
	left: 18%;
	top: 300px;
	
	width:1000px;
}

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
	<meta charset="UTF-8" />
	<title>Wir gegen Corona -  Erstelle deine eigene Frage!</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">	
</head>
 
<body>

<?php 
if (isset($_GET['frage']) && isset($_GET['keyword'])){
	$frage = $_GET['frage'];
	$keyword = $_GET['keyword'];
	
	// Füge die Frage und das Keyword in der DB hinzu.
	// TODO: Prüfe ob keyword schon existiert

	// Connect to database
	$mysqli = new mysqli($GLOBAL_HOST, $GLOBAL_USER, $GLOBAL_PW, $GLOBAL_DB_NAME);

	/* check connection */
	if ($mysqli->connect_errno) {
		printf("Connect failed: %s\n", $mysqli->connect_error);
		exit();
	}
	// CHeck if the keyword already exists
	$query = "SELECT * FROM keywords WHERE Keyword = '$keyword';";
	if ($result = $mysqli->query($query)) {
		if ($result->num_rows){
			
			$query = "INSERT INTO `fragen` (`ID`, `Fragestellung`) VALUES (NULL, '$frage'); 
			SET @key_frage = (SELECT `ID` FROM `fragen` WHERE `Fragestellung` = '$frage' );
			SET @key_keyword1 = (SELECT `ID` FROM `keywords` WHERE `Keyword` = '$keyword' );
			INSERT INTO `mapping key:frage` (`ID_Frage`, `ID_Keyword`) VALUES (@key_frage, @key_keyword1);
			";
			if ($mysqli->multi_query($query)) {
				do {
					/* store first result set */
					if ($result = $mysqli->store_result()) {
						while ($row = $result->fetch_row()) {
							//printf("%s\n", $row[0]);
						}
						$result->free();
					}
					/* print divider */
					if ($mysqli->more_results()) {
						//printf("-----------------\n");
					}
				} while ($mysqli->next_result());
			}

		}
		else {

			/* execute multi query */

			$query = "INSERT INTO `fragen` (`ID`, `Fragestellung`) VALUES (NULL, '$frage'); 
			SET @key_frage = (SELECT `ID` FROM `fragen` WHERE `Fragestellung` = '$frage' );
			INSERT INTO `keywords` (`ID`, `Keyword`) VALUES (NULL, '$keyword'); 
			SET @key_keyword1 = (SELECT `ID` FROM `keywords` WHERE `Keyword` = '$keyword' );
			INSERT INTO `mapping key:frage` (`ID_Frage`, `ID_Keyword`) VALUES (@key_frage, @key_keyword1);
			";
			if ($mysqli->multi_query($query)) {
				do {
					/* store first result set */
					if ($result = $mysqli->store_result()) {
						while ($row = $result->fetch_row()) {
							//printf("%s\n", $row[0]);
						}
						$result->free();
					}
					/* print divider */
					if ($mysqli->more_results()) {
						//printf("-----------------\n");
					}
				} while ($mysqli->next_result());
			}

		}	
	}

	
	echo "<h1>Deine Frage $frage wurde erfolgreich hinzugefügt, danke dass du einen Beitrag leistest!</h1>";
}
else{
?>


<h1>Leider haben wir keine passende Frage gefunden. Willst du die Frage selbst stellen?</h1>
 
  <div class="search-container">
    <form action="">
      <input type="text" placeholder="Gib bitte eine Frage ein." name="frage">
	  <input type="text" placeholder="Gib bitte dein Keyword ein." name="keyword">
	  <!--<input type="text" placeholder="Gib bitte dein zweites Keyword ein." name="keyword2">-->
	  <!--<input type="text" placeholder="Gib bitte dein drittes Keyword ein." name="keyword3">-->
      <button type = "submit" id="insert">Einfügen</button>
    </form>
  </div>
<?php
}
?>
<div class="homebutton">  
  <form method="get" action="/hackathon/index.php">
	<button type = "btn"><i class="fa fa-home"></i></button>
  </form>
</div>
</body>
</html>

