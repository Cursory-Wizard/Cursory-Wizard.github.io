//js file
"use strict";
var $ = function (id) { return document.getElementById(id); }
var availableCards = ["url('dog.png')", "url('giraffe.png')", "url('hare.png')", "url('hippo.png')", "url('lion.png')", "url('monkey.png')", "url('owl.png')", "url('turtle.png')", "url('whale.png')"]
var playArray = [];
var pairChoice = [];
var flipCounter = 0;
var playing = false;
var pairs = 0;
var completedPairs = 0;

function assignCards(count) {
    var preCard = [];
    var cardCount = 0;
    var imageAccess = 0;
    for (var i = 0; i < (count*2); i++) {
        preCard.push(availableCards[imageAccess]);
        cardCount++;
        if (cardCount > 1) {
            cardCount = 0;
            imageAccess++;
        }
    }
    shuffleArray(preCard);
    var lister = 0;
    if (count < 6) {
        for (var i = 0; i < 2; i++) {
            for (var j = 0; j < count; j++) {
                var stringer = "";
                stringer = "br_" + (i + 1) + "_" + (j + 1);
                $(stringer).style.display = "inline";
                console.log(stringer);
                playArray[stringer] = preCard[lister];
                lister++;
            }

        }
    }
    if (count === 6) {
        for (var i = 0; i < 3; i++) {
            for (var j = 0; j < 4; j++) {
                var stringer = "";
                stringer = "br_" + (i + 1) + "_" + (j + 1);
                $(stringer).style.display = "inline";
                console.log(stringer);
                playArray[stringer] = preCard[lister];
                lister++;
            }
        }
    }
    if (count === 7) {
        for (var i = 0; i < 3; i++) {
            if (i === 1) { var j = 1; }
            else { j = 0; }
            for (j; j < 5; j++) {
                var stringer = "";
                stringer = "br_" + (i + 1) + "_" + (j + 1);
                $(stringer).style.display = "inline";
                console.log(stringer);
                playArray[stringer] = preCard[lister];
                lister++;
            }
        }
    }
    if (count === 8) {
        console.log("branched");
        for (var i = 0; i < 4; i++) {
            console.log("in i loop");
            for (var j = 0; j < 4; j++) {
                console.log("in j loop");
                var stringer = "";
                stringer = "br_" + (i + 1) + "_" + (j + 1);
                $(stringer).style.display = "inline";
                console.log(stringer);
                playArray[stringer] = preCard[lister];
                lister++;
            }
        }
    }
    for (var elementIndex in playArray) {
        console.log(playArray[elementIndex]);
    }
};

function disableCards() {
    for (var k = 1; k < 5; k++) {
        for (var l = 1; l < 6; l++) {
            var cardStringer = "";
            cardStringer = "br_" + (k) + "_" + (l);
            console.log(cardStringer);
            $(cardStringer).disabled = true;
        }
    }
};

function enableCards() {
    for (var k = 1; k < 5; k++) {
        for (var l = 1; l < 6; l++) {
            var cardStringer = "";
            cardStringer = "br_" + (k) + "_" + (l);
            $(cardStringer).disabled = false;
        }
    }
};

function finishGame() {
    $("winText").innerHTML = "You're a winner!";
    $("playAgain").disabled = false;
    $("playAgain").style.display = "inline";
}
var flipPause = function () {
    //Just here to provide a pause.
    setTimeout(unflipper, 1000);
};

var flipper = function (picture) {
    var selector = $(picture).className;
    console.log(selector);
    if (selector === "unflipped") {
        $(picture).className = "flipped";
        $(picture).style.backgroundImage = playArray[picture];
        flipCounter++;
        pairChoice.push(picture);
        if (flipCounter > 1) {
            disableCards();
            var cardOne = playArray[pairChoice[0]];
            var cardTwo = playArray[pairChoice[1]];
            if (cardOne === cardTwo) {
                enableCards();
                $(pairChoice[0]).disabled = true;
                $(pairChoice[1]).disabled = true;
                $(pairChoice[0]).className = "complete";
                $(pairChoice[1]).className = "complete";
                pairChoice.length = 0;
                flipCounter = 0;
                completedPairs++;
                if (completedPairs === pairs) {
                    finishGame();
                }
            }
            else {
                flipPause();
            }
        }
    }
};

function shuffleArray(array) {
    for (var i = array.length - 1; i > 0; i--) {
        var j = Math.floor(Math.random() * (i + 1));
        var temp = array[i];
        array[i] = array[j];
        array[j] = temp;
    }
};

var startGame = function () {
    playing = true;
    $("play").disabled = true;
    $("quit").disabled = false;
    $("quit").style.display = "inline";
    var radios = document.getElementsByName('numberOfPairs');
    console.log(radios.length);
    for (var i = 0, length = radios.length; i < length; i++) {
        if (radios[i].checked) {
            pairs = i + 3;
            assignCards(pairs);
            break;
        }
    }
};

var unflipper = function () {
    $(pairChoice[0]).className = "unflipped";
    $(pairChoice[1]).className = "unflipped";
    $(pairChoice[0]).style.backgroundImage = "url('cover.png')";
    $(pairChoice[1]).style.backgroundImage = "url('cover.png')";
    pairChoice.length = 0;
    flipCounter = 0;
    enableCards();
};

function quitGame() {
    for (var k = 1; k < 5; k++) {
        for (var l = 1; l < 6; l++) {
            var cardStringer = "";
            cardStringer = "br_" + (k) + "_" + (l);
            $(cardStringer).style.display = "none";
            $(cardStringer).className = "unflipped";
            $(cardStringer).style.backgroundImage = "url('cover.png')";
            $(cardStringer).disabled = false;
        }
    }
    playArray.length = 0;
    pairChoice.length = 0;
    flipCounter = 0;
    playing = false;
    pairs = 0;
    completedPairs = 0;
    $("play").disabled = false;
    $("quit").disabled = true;
    $("playAgain").disabled = true;
    $("playAgain").style.display = "none";
    $("winText").innerHTML = "&nbsp";
    
};

window.onload = function () {
    $("play").onclick = startGame;
    $("quit").onclick = quitGame;
    $("playAgain").onclick = quitGame;
};