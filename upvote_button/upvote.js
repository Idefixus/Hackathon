const scoreHeading = document.querySelector("b");
const upvoteButton = document.querySelector("#upvote");
const downvoteButton = document.querySelector("#downvote");

const vote = type => {
  const buttons = { "1": upvoteButton, "-1": downvoteButton };
  const score = Number(scoreHeading.textContent);

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
  if(scoreHeading.textContent > 5) {
      document.getElementById("button_image").src="PNG/reagenzglas_richtig.png";
    } else if (scoreHeading.textContent > 0) {
        document.getElementById("button_image").src="PNG/reagenzglas_eher_richtig.png";
    } else if (scoreHeading.textContent == 0) {
    document.getElementById("button_image").src="PNG/reagenzglas_teils.png";
    } else if (scoreHeading.textContent > -5) {
    document.getElementById("button_image").src="PNG/reagenzglas_eher_falsch.png";
    } else {
    document.getElementById("button_image").src="PNG/reagenzglas_falsch.png";
  }
};

upvoteButton.addEventListener("click", () => vote(1));
downvoteButton.addEventListener("click", () => vote(-1));