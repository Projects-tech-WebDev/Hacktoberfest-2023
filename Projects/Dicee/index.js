var randomNumber1, randomNumber2;

const roll = document.querySelector(".btn");

roll.addEventListener("click", function () {
  randomNumber1 = Math.floor(Math.random() * 6) + 1;
  randomNumber2 = Math.floor(Math.random() * 6) + 1;

  var randomDiceImagePath1 = "images/dice" + randomNumber1 + ".png";

  document.querySelector(".img1").setAttribute("src", randomDiceImagePath1);

  var randomDiceImagePath2 = "images/dice" + randomNumber2 + ".png";

  document.querySelector(".img2").setAttribute("src", randomDiceImagePath2);

  if (randomNumber1 > randomNumber2) {
    document.querySelector("h1").innerHTML = "🚩 Player 1 Wins!!!";
  } else if (randomNumber2 > randomNumber1) {
    document.querySelector("h1").innerHTML = "Player 2 Wins!!! 🚩";
  } else {
    document.querySelector("h1").innerHTML = "DRAW";
  }
});
