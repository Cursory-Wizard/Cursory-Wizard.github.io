"use strict";
var $ = function(id) { return document.getElementById(id); };
var playing = false;
var winner = "";

var getRandomNumber = function(max) {
    var random;
    if (!isNaN(max)) {
        random = Math.random(); 
        random = Math.floor(random * max);
        random = random + 1; 
    }
    return random;
};

var getPlayerInput = function () {
    var playerInput = parseInt($("playerPick").value);
    if ((isNaN(playerInput)) || (playerInput < 1) || (playerInput > 5)) {
    $("message").firstChild.nodeValue = "Enter a number from 1 to 5.";
    playerInput = 0;
    }
    else {        
    $("message").firstChild.nodeValue = "";
    }
    return playerInput
};


var playGame = function () {
    if (!playing) {
        $("play").value = "Next";
        $("quit").style.display = "inline";
        resetFields();
        $("message").firstChild.nodeValue = "";
        playing = true;

    }
    if (playing) {
        var playerChoice = getPlayerInput();
        if (playerChoice > 0) {

            var computerChoice = getRandomNumber(5);
            $("player").value = playerChoice.toString();
            $("computer").value = computerChoice.toString();
            var roundTotal = computerChoice + playerChoice;
            if ((roundTotal) % 2 === 0) {
                var currentTotal = parseInt($("even").value);
                var newScore = currentTotal + roundTotal;
                if (newScore < 50) {
                    $("even").value = newScore.toString();
                }
                else {
                    $("even").value = newScore.toString();
                    playing = false;
                    winner = "Computer";
                }
            }
            else {
                var currentTotal = parseInt($("odd").value);
                var newScore = currentTotal + roundTotal;
                if (newScore < 50) {
                    $("odd").value = newScore.toString();
                }
                else {
                    $("odd").value = newScore.toString();
                    playing = false;
                    winner = "Player";
                }
            }
            if (!playing) {
                $("message").firstChild.nodeValue = winner + " wins!";
                $("play").value = "Play";
                $("quit").style.display = "none";
                playing = false;
            }
        }
        $("playerPick").value = "";
        $("playerPick").focus();
    }
};

var endGame = function () {
    $("play").value = "Play";
    $("quit").style.display = "none";
    $("message").firstChild.nodeValue = "You quit! Press play to go again.";
    resetFields();
    playing = false;
};

var resetFields = function() {
    $("player").value = "0";
    $("computer").value = "0";
    $("odd").value = "0";
    $("even").value = "0";
};

window.onload = function() {
    $("play").onclick = playGame;
    $("playerPick").focus();
    $("quit").onclick = endGame;
};