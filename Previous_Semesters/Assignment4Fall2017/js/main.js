
var oldClasses = [];
var oldDefinitions = [];
var lineString = ["validOne", "validTwo", "validThree"];

function calcAve() {
    var test1 = parseInt(document.getElementById("scoreOne").value);
    var correctOne = testVal(test1, 0);
    if (correctOne) {
        oldClasses.push("firstGrade");
        oldDefinitions.push(document.getElementById("firstGrade").innerHTML);
        document.getElementById("firstGrade").innerHTML = assignLetter(test1);
    }

    var test2 = parseInt(document.getElementById("scoreTwo").value);
    var correctTwo = testVal(test2, 1);
    if (correctTwo) {
        oldClasses.push("secondGrade");
        oldDefinitions.push(document.getElementById("secondGrade").innerHTML);
        document.getElementById("secondGrade").innerHTML = assignLetter(test2);
    }

    var test3 = parseInt(document.getElementById("scoreThree").value);
    var correctThree = testVal(test3, 2);
    if (correctThree) {
        oldClasses.push("thirdGrade");
        oldDefinitions.push(document.getElementById("thirdGrade").innerHTML);
        document.getElementById("thirdGrade").innerHTML = assignLetter(test3);
    }

    if (correctOne && correctTwo && correctThree) {
        testSum = test1 + test2 + test3;
        testAverage = testSum / 3;
        oldClasses.push("sumResult");
        oldDefinitions.push(document.getElementById("sumResult").innerHTML);
        oldClasses.push("averageResult");
        oldDefinitions.push(document.getElementById("averageResult").innerHTML);
        oldClasses.push("classGrade");
        oldDefinitions.push(document.getElementById("classGrade").innerHTML);
        document.getElementById("sumResult").innerHTML = "The total score is: " + testSum;
        document.getElementById("averageResult").innerHTML = "The average score is: " + testAverage.toFixed(2);
        document.getElementById("classGrade").innerHTML = assignLetter(testAverage);
    }
}

function resetForm() {
    var replaceLimit = oldClasses.length;
    for (var i = 0; i < replaceLimit; i++) {
        document.getElementById(oldClasses.pop()).innerHTML = oldDefinitions.pop();
    }
    for (var j = 0; j < lineString.length; j++) {
        document.getElementById(lineString[j]).innerHTML = null;
    }
    document.getElementById("formOne").reset();
}

function testVal(testNum, lineID) {
    if ((testNum > 100) || (testNum < 1) || isNaN(testNum)) {
        console.log(lineString[lineID]);
        document.getElementById(lineString[lineID]).innerHTML = "Enter a number between 1 and 100."
        return false;
    }
    document.getElementById(lineString[lineID]).innerHTML = null;
    
    return true;
}

function assignLetter(scoreNum) {
    var letterString
    if (scoreNum >= 90) {
        letterString = "A";
    }
    else if (scoreNum >= 80) {
        letterString = "B";
    }
    else if (scoreNum >= 70) {
        letterString = "C";
    }
    else if (scoreNum >= 60) {
        letterString = "D";
    }
    else {
        letterString = "F";
    }

    return letterString;
}
    
