<!DOCTYPE html>
<html> 
<style>

body {
	background-image: url('Hackathonlogo.png');
	background-repeat: no-repeat;
	background-size: cover;
}

#questiontable td, #questiontable th {

	padding: 20px;
	border-bottom: 1px solid black;
}

#questiontable tr:hover {
	background-color: #ddd;
}

#questiontable th {
	padding-top: 12px;
	padding-bottom: 12px;
	text-align: left;
}
#questiontable {
	table-layout:auto;
	border-collapse: collapse;
	width: 80%;
	position: absolute;
	top: 22%;
	
}
	
h1 {
	position: absolute;
	top: 13%;
	left: 25%;
}

button {
	position: absolute;
	top: 70%;
	left: 20%;
	margin: 2em;
	padding: .5em 1em;
	width: 20em;
	background: transparent;
	color: black;
	border: 1px solid black;
	border-radius: 3px;
	cursor: pointer;
	transition: all ease 2s;
	font-size: 120%;
}

button:hover {
	background: darkblue;
	color: white;
}

p1 {
	position:absolute;
	top: 70%;
	left: 20%;
	font-size: 120%;
}

</style>

	

<head>
	<meta charset="UTF-8" />
	<title>Eure erster PHP-Script</title> 
</head>
 
<body>
<h1>Fragen zu deinen Stichwörtern</h1>
 
 <table id="questiontable">
  <tr>
    <th>Question</th>
    <th>Upvotes/Downvotes</th>
	<th>Reagenzglass</th>
  </tr>
  <tr>
    <td>...</td>
    <td>...</td>
	<td>...</td>	
  </tr>
 </form> 
  <tr>
    <td>...</td>
    <td>...</td>
	<td>...</td>
  </tr>
    <tr>
    <td>...</td>
    <td>...</td>
	<td>...</td>
  </tr>
    <tr>
    <td>...</td>
    <td>...</td>
	<td>...</td>
  </tr>
</table>
<p1> 
Hast du keine passende Frage gefunden? Stelle deine eigene!
</p1>
<form method="get" action="http://localhost/index.php">
	<button type = "submit" id="search">Stelle deine eigene Frage</button>
</form>
	
</body>
</html>