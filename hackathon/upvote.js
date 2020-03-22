function vote(type, passedID) {
  // What a great way to access all these objects
  var uv_ID = "upvote_" + passedID.split("_")[1];
  var dv_ID = "downvote_" + passedID.split("_")[1];
  var image_ID = "button_image_" + passedID.split("_")[1];
  var score_ID = "score_" + passedID.split("_")[1];


  var upvoteButton = document.getElementById(uv_ID);
  var downvoteButton = document.getElementById(dv_ID);
  var scoreHeading = document.getElementById(score_ID);
  var buttons = { "1": upvoteButton, "-1": downvoteButton };
  var score = Number(scoreHeading.textContent);

  if (buttons[type].classList.contains("active")) {
    scoreHeading.textContent = score - type;
    buttons[type].classList.remove("active");
  } 
     else if (buttons[-type].classList.contains("active")) {
     scoreHeading.textContent = score + 2 * type;
     buttons[-type].classList.remove("active");
     buttons[type].classList.add("active");
   } 
    else {
    scoreHeading.textContent = score + type;
    buttons[type].classList.add("active");
  }
  if(scoreHeading.textContent >= 5) {
      document.getElementById(image_ID).src="PNG/reagenzglas_richtig.png";
    } else if (scoreHeading.textContent > 0) {
        document.getElementById(image_ID).src="PNG/reagenzglas_eher_richtig.png";
    } else if (scoreHeading.textContent == 0) {
    document.getElementById(image_ID).src="PNG/reagenzglas_teils.png";
    } else if (scoreHeading.textContent > -5) {
    document.getElementById(image_ID).src="PNG/reagenzglas_eher_falsch.png";
    } else {
    document.getElementById(image_ID).src="PNG/reagenzglas_falsch.png";
  }

  //send it to Server
  var request = new XMLHttpRequest();
  var query = "antwort_id=" + passedID.split("_")[1] + "&type=" + type;
  request.open('POST', 'api.php', true);
  request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  request.send(query);
};
