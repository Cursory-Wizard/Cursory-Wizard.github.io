function calcAve() {
    var test1 = parseInt(document.getElementById("scoreOne").value);
    var correctOne = testVal(test1, 1)
    var test2 = parseInt(document.getElementById("scoreTwo").value);
    var correctTwo = testVal(test2, 2)
    var test3 = parseInt(document.getElementById("scoreThree").value);
    var correctThree = testVal(test3, 3)

    if (correctOne && correctTwo && correctThree) {
        testSum = test1 + test2 + test3;
        testAverage = testSum / 3;
        document.getElementById("sumResult").innerHTML = "The total score is:" + testSum;
        document.getElementById("averageResult").innerHTML = "The average score is:" + testAverage;

    }
}
function testVal(testNum, lineID) {
    var lineString;
    switch (lineID) {
        case 1:
            lineString = "validOne";
            break;
        case 2:
            lineString = "validTwo";
            break;
        case 3:
            lineString = "validThree";
            break;
        default:
    }
    if ((testNum > 100) || (testNum < 1) || isNaN(testNum)) {    
        document.getElementById(lineString).innerHTML = "Enter a number between 1 and 100."
        return false;
    }
    document.getElementById(lineString).innerHTML = null;
    return true;
        }