<!DOCTYPE html>
<html> 
<style>

body {
	background-image: url('Hackathonlogo.png');
	background-repeat: no-repeat;
	background-size: cover;
}


.downvote button {
	background:url(Downvote.png) no-repeat;
	cursor: pointer;
	width:135px;
	height:145px;
	border: none;
	position: absolute;
	top: 60%;
	left: 50%;

}

.downvote button:hover {
	box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
}

.upvote button {
	background:url(Upvote.png) no-repeat;
	cursor: pointer;
	width:135px;
	height:145px;
	border: none;
	position: absolute;
	top: 60%;
	left: 30%;

}

.upvote button:hover {
	box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
}


h1 {
	position: absolute;
	left: 15%;
	top: 10%;
}

.answertable #answertable{

	
	border-collapse: collapse;
	width: 60%;
	position:absolute;
	left: 5%;
	top: 20%
}
.answertable #answertable td{
	padding: 7px;
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
	


</style>
	

<head>
	<meta charset="UTF-8" />
	<title>Eure erster PHP-Script</title> 
</head>
 
<body>
<h1>Ist Ibuprofen gefährlich bei Corona?</h1>

<div class="answertable" style="overflow-y:auto;"> 
	<table id="answertable">
  <tr>
  	<td>
	<div class="votetable">
	<table id ="votetable">
	<tr>
    <td><button id="upvote_0" class="arrow up" onclick="vote(1, this.id)"></button></td>
    </tr>
	<tr> 
	<td align="center"><div class="number"><text id="number"><b id="score_0" style="font-size:20px">0</b></text></div></td>
	</tr>
	<tr>
    <td><button id="downvote_0" class="arrow down" onclick="vote(-1, this.id)"></button></td>
	</tr>
	</table>
	</div>
	</td>
	<td><img id="button_image_0" width="40" height="80" src="PNG/reagenzglas_teils.png"></td>	
    <td>Ibuprofen wurde vom Robert-Koch-Institut als gefährlich eingestuft während man unter Covid-19 leidet.</td>
    <td><a href=“https//www.rki.de“>www.rki.de</a></td>
  </tr>
  <tr>
    	<td>
	<div class="votetable">
	<table id ="votetable">
	<tr>
    <td><button id="upvote_1" class="arrow up" onclick="vote(1, this.id)"></button></td>
    </tr>
	<tr> 
	<td align="center"><div class="number"><text id="number"><b id="score_1" style="font-size:20px">0</b></text></div></td>
	</tr>
	<tr>
    <td><button id="downvote_1" class="arrow down" onclick="vote(-1), this.id"></button></td>
	</tr>
	</table>
	</div>
	</td>
	<td><img id="button_image_1" width="40" height="80" src="PNG/reagenzglas_teils.png"></td>
    <td>...</td>
    <td>...</td>
	<td>...</td>
  </tr>
    <tr>
	  	<td>
	<div class="votetable">
	<table id ="votetable">
	<tr>
    <td><button id="upvote" class="arrow up"></button></td>
    </tr>
	<tr> 
	<td align="center"><div class="number"><text id="number"><b style="font-size:20px">0</b></text></div></td>
	</tr>
	<tr>
    <td><button id="downvote" class="arrow down"></button></td>
	</tr>
	</table>
	</div>
	</td>
    <td>...</td>
    <td>...</td>
	<td>...</td>
  </tr>
    <tr>
	  	<td>
	<div class="votetable">
	<table id ="votetable">
	<tr>
    <td><button id="upvote" class="arrow up"></button></td>
    </tr>
	<tr> 
	<td align="center"><div class="number"><text id="number"><b style="font-size:20px">0</b></text></div></td>
	</tr>
	<tr>
    <td><button id="downvote" class="arrow down"></button></td>
	</tr>
	</table>
	</div>
	</td>
    <td>...</td>
    <td>...</td>
	<td>...</td>
  </tr>
    <tr>
	  	<td>
	<div class="votetable">
	<table id ="votetable">
	<tr>
    <td><button id="upvote" class="arrow up"></button></td>
    </tr>
	<tr> 
	<td align="center"><div class="number"><text id="number"><b style="font-size:20px">0</b></text></div></td>
	</tr>
	<tr>
    <td><button id="downvote" class="arrow down"></button></td>
	</tr>
	</table>
	</div>
	</td>
    <td>...</td>
    <td>...</td>
	<td>...</td>
  </tr>  <tr>
    	<td>
	<div class="votetable">
	<table id ="votetable">
	<tr>
    <td><button id="upvote" class="arrow up"></button></td>
    </tr>
	<tr> 
	<td align="center"><div class="number"><text id="number"><b style="font-size:20px">0</b></text></div></td>
	</tr>
	<tr>
    <td><button id="downvote" class="arrow down"></button></td>
	</tr>
	</table>
	</div>
	</td>
    <td>...</td>
    <td>...</td>
	<td>...</td>
  </tr>  <tr>
    	<td>
	<div class="votetable">
	<table id ="votetable">
	<tr>
    <td><button id="upvote" class="arrow up"></button></td>
    </tr>
	<tr> 
	<td align="center"><div class="number"><text id="number"><b style="font-size:20px">0</b></text></div></td>
	</tr>
	<tr>
    <td><button id="downvote" class="arrow down"></button></td>
	</tr>
	</table>
	</div>
	</td>
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
    <tr>
    <td>...</td>
    <td>...</td>
	<td>...</td>
  </tr>
  </table>

</div>


	
	
	


 
	<script src="upvote.js"></script>
  
  
</body>
</html>