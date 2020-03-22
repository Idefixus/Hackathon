<?php include 'credentials.php';?>
<!DOCTYPE html>
<html> 
<style>

body {
	background-image: url('Pics/Hackathonlogo.png');
	background-repeat: no-repeat;
	background-size: cover;
}

h1 {
	position: absolute;
	left: 15%;
	top: 10%;
}


.answertable #answertable{

	display: block;
	max-height: 425px;
	overflow-y: scroll;
	border-collapse: collapse;
	table-layout: fixed;
	width: 1200px;
	position:absolute;
	left: 5%;
	top: 22%
}
.answertable #answertable td{
	padding: 7px;
}

.votetable #votetable {
	table-layout: fixed;
	width:30px;
}
main {
  font-family: sans-serif;
  text-align: center;
}




button {
  border: solid black;
  border-width: 0px 5px 5px 0px;
  display: inline-block;
}

.number #number{
	font-size = 5;
}

.right {
	  padding: 3px;
  transform: rotate(-45deg);
  -webkit-transform: rotate(-45deg);
}

.left {
	  padding: 3px;
  transform: rotate(135deg);
  -webkit-transform: rotate(135deg);
}

.up {
	  padding: 3px;
  transform: rotate(-135deg);
  -webkit-transform: rotate(-135deg);
	margin-up: 120%;
  }

.down {

	  padding: 3px;
  transform: rotate(45deg);
  -webkit-transform: rotate(45deg);
  	margin-bottom: 60%;

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

.answer-container {
		
	overflow-wrap: break-word;	
	position: absolute;
	TOP: 77%;
	left:10%;
	
}

.answer-container input {
	height: 40px;
	width: 400px;
	border: 1px solid black;
	border-radius: 3px;
	transition: all ease 5s;
		
}
.answer-container #quelle {
	position: absolute;
	top: 100%;
	left: 0%;
}

.answer-container button {
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

.answer-container button:hover {
	background: darkblue;
	color: white;
}

h2 {
	position: absolute;
	top: 70%;
	left: 10%;
}



</style>
	

<head>
	<meta charset="UTF-8" />
	<title>Wir gegen Corona - Deine Antworten!</title> 
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
 
<body>

<?php
// Get the question

// Connect to database
	$mysqli = new mysqli($GLOBAL_HOST, $GLOBAL_USER, $GLOBAL_PW, $GLOBAL_DB_NAME);

	/* check connection */
	if ($mysqli->connect_errno) {
		printf("Connect failed: %s\n", $mysqli->connect_error);
		exit();
	}
	function printf_array($format, $arr) 
{ 
    return call_user_func_array('printf', array_merge((array)$format, $arr)); 
}

	// Get the question:
	if (isset($_GET['fragen_id'])){
	$fragen_id = $_GET['fragen_id'];
	}
	else $fragen_id = "Es muss eine Fragenid vergeben werden";

	$query = "SELECT * From fragen where ID = $fragen_id";

	// Print the answers
	if ($result = $mysqli->query($query)) {
		$row = $result->fetch_assoc();
		// Create a div with the question
		$fragestellung = $row['Fragestellung'];
		echo "<div id='question'><h1><b>$fragestellung</b></h1></div>";

		$result->close();
	}

	?>

<div class="answertable"> 
	<table id="answertable">

<?php


$query = "SELECT antworten.ID as antwort_id, Antworttext, Quelle From fragen join antworten where fragen.id = antworten.Frage_ID and fragen.ID = $fragen_id ";

	// Print the answers
	if ($result = $mysqli->query($query)) {

		/* fetch associative array */
		while ($row = $result->fetch_assoc()) {
			$id = $row['antwort_id'];
			$answer = $row['Antworttext'];
			$quelle = $row['Quelle'];
			
	echo "<tr>
		<td>
			<div class='votetable'>
			<table id ='votetable'>
			<tr>
			<td><button id='upvote_$id' class='arrow up' onclick='vote(1, this.id)'></button></td>
			</tr>
			<tr> 
			<td align='center'><div class='number'><text id='number'><b id='score_$id' style='font-size:20px'>0</b></text></div></td>
			</tr>
			<tr>
			<td><button id='downvote_$id' class='arrow down' onclick='vote(-1, this.id)'></button></td>
			</tr>
			</table>
			</div>
		</td>";
		echo "<td><img id='button_image_$id' width='40' height='80' src='PNG/reagenzglas_teils.png'></td>";
		echo "<td>$answer</td>";
		echo "<td><a target='_blank' href='$quelle'>$quelle</a></td>";
		echo "</tr>";
}
/* free result set */
$result->close();
}

$mysqli->close();	
 
 ?>
 
</table>

</div>
<div class="homebutton">  
  <form method="get" action="/hackathon/index.php">
	<button type = "btn"><i class="fa fa-home"></i></button>
  </form>
</div>



<?php


if (isset($_POST['antwort']) && isset($_POST['quelle']))
{
	$antwort = $_POST['antwort'];
	$quelle = $_POST['quelle'];


	// Füge die Frage und das Keyword in der DB hinzu.
	// TODO: Prüfe ob keyword schon existiert
	// Connect to database
	$mysqli = new mysqli($GLOBAL_HOST, $GLOBAL_USER, $GLOBAL_PW, $GLOBAL_DB_NAME);
		/* check connection */
	if ($mysqli->connect_errno) {
		printf("Connect failed: %s\n", $mysqli->connect_error);
		exit();
	}
	
	$query = "SELECT * FROM antworten WHERE Antworttext = '$antwort';";

	
	if ($result = $mysqli->query($query)) {	
	if ($result -> num_rows){
			echo "<h2>Du hast diese Frage schon beantwortet. Für neue Fragen kehre zur Homepage zurück</h2>";	
	}
	else{

			/* execute multi query */

			$query = "SET @key_frage = (SELECT `ID` FROM `fragen` WHERE `Fragestellung` = '$fragestellung' );
					INSERT INTO `antworten` (`ID`, `Antworttext`, `Quelle`, `Upvote`, `Downvote`, `Serioes`, `Frage_ID`) 
					VALUES (NULL, '$antwort', '$quelle ', NULL, NULL, NULL, @key_frage);";
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

			
	

	
	echo "<h2>Deine Antwort wurde erfolgreich hinzugefügt, danke dass du einen Beitrag leistest!</h2>";
	}
	}

}



else{
?>

<h2>Gefällt dir keine der Antworten? Gib uns deine Meinung, aber bitte mit Quelle!</h2>
 
<div class="answer-container">
   <form action="" method="post">
      <input type="text" id="answer" placeholder="Gib bitte deine Antwort ein" name="antwort">
	  <input type="text" id="quelle" placeholder="Gib bitte deine Quelle an" name="quelle">
	  <!--<input type="text" placeholder="Gib bitte dein zweites Keyword ein." name="keyword2">-->
	  <!--<input type="text" placeholder="Gib bitte dein drittes Keyword ein." name="keyword3">-->
      <button type = "submit" name="insert" value="insert" id="insert">Einfügen</button>
    </form>
</div>
<?php
}
?>

	<script src="upvote.js"></script>
  
  
</body>
</html>