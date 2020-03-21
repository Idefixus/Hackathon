<!DOCTYPE html>
<html> 
<style>
.search-container {
	
	position: absolute;
	TOP: 400px;
	left:40%;
	
}

body {
	background-image: url('Hackathonlogo.png');
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
	position: absolute;
	left: 45%;
	top: 300px;
}

</style>
	

<head>
	<meta charset="UTF-8" />
	<title>Eure erster PHP-Script</title> 
</head>
 
<body>
<h1>Fragen gegen Corona</h1>
 
  <div class="search-container">
    <form action="/action_page.php">
      <input type="text" placeholder="Gib deine Frage ein.." name="search">
      <button type = "submit" id="search">Search</button>
    </form>
  </div>
</body>
</html>