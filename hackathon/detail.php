<?php include 'credentials.php';?>
<?php
// Get the question

// Connect to database
	$mysqli = new mysqli($GLOBAL_HOST, $GLOBAL_USER, $GLOBAL_PW, $GLOBAL_DB_NAME);

	/* check connection */
	if ($mysqli->connect_errno) {
		printf("Connect failed: %s\n", $mysqli->connect_error);
		exit();
	}
	

	// Get the question:
	$fragen_id = $_GET['fragen_id'];

	$query = "SELECT * From fragen where ID = $fragen_id";
	
	// Print the answers
	if ($result = $mysqli->query($query)) {
		printf("Select returned %d rows.\n", $result->num_rows);
		$row = $result->fetch_array(MYSQLI_NUM);
		// Create a div with the question
		echo "<div id='question'>$row['Fragestellung']</div>";

		$result->close();
	}

	// The query for the answers to the question
	$query = "SELECT antworten.ID as antwort_id, Antworttext From fragen join antworten where fragen.id = antworten.Frage_ID and fragen.ID = $fragen_id ";
?>
<div>
<table style="width:100%">
			<tr>
			  <th>ID</th>
			  <th>Answer</th>
			</tr>

<?php
	// Print the answers
	if ($result = $mysqli->query($query)) {
		printf("Select returned %d rows.\n", $result->num_rows);

		/* fetch associative array */
		while ($row = $result->fetch_assoc()) {
			$id = $row['antwort_id'];
			$answer = $row['Antworttext'];
			printf ("%s (%s)\n", $id, $row["Antworttext"]);
			
			echo "<tr>";
			echo "<td>$id</td>";
			echo "<td>$answer</td>";
			echo "</tr>";
		}
		/* free result set */
		$result->close();
	}

$mysqli->close();	

?>
</table> 
</div>