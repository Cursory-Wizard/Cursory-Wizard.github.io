var $ = function(id) {
    return document.getElementById(id);
}
var getRandomNumber = function(max) {
    var random;
    if (!isNaN(max)) {
        random = Math.random(); //value >= 0.0 and < 1.0
        random = Math.floor(random * max); //value is an integer between 0 and max - 1
        random = random + 1; //value is an integer between 1 and max
    }
    return random;
}
var getDate = function () {
    var current = new Date();
    returnDate = "Today is " + (current.getMonth() + 1) + "/" + current.getDate() + "/" + current.getFullYear() + " at " + current.getHours() + ":";
    if (current.getMinutes() < 10) {
        returnDate = returnDate.concat("0", current.getMinutes(), ".");
    }
    else {
        returnDate = returnDate.concat(current.getMinutes(), ".");
    }
    console.log(returnDate);
    return returnDate;
}

var formatFV = function (total) {
    var priorDecimal = total.substr(0, (total.length - 3));
    console.log(priorDecimal)
    if (priorDecimal.length > 3) {
        var opening = "$";
        var remainder;
        var firstDigits = priorDecimal.length % 3;
        if (firstDigits > 0) {
            opening = opening.concat(priorDecimal.substr(0, firstDigits), ",");
            remainder = priorDecimal.substring(firstDigits)
        }
        else {
            remainder = priorDecimal;
        }
        for (i = 0; i < remainder.length / 3; i++) {
            var subDecimal = remainder.substr(i * 3, (i * 3 + 3));
            if ((i * 3 + 3) < (remainder.length - 1)) {
                opening = opening.concat(subDecimal, ",");
            }
            else {
                opening = opening.concat(subDecimal);
            }
        }
        opening = opening.concat(total.substring(total.length - 3));
        return opening;
    }
}
var calculateFV = function(investment,rate,years) {
	var futureValue = investment;
    for (var i = 1; i <= years; i++ ) {
        futureValue += futureValue * rate / 100;
        if (!isFinite(futureValue)) {
            window.alert("Future value = Infinity\ni = " + i);
            i = years;
        }
        
    }
    window.alert(" " + Number.MAX_VALUE);
    futureValue = futureValue.toFixed(2);
	return futureValue;
}
var processEntries = function() {
    //var investment = parseFloat( $("investment").value );
    //var rate = parseFloat( $("annual_rate").value );
    //var years = parseInt( $("years").value );
	//if (isNaN(investment) || investment <= 0) {
	//	alert("Must be > 0");
	//}
	//else if (isNaN(rate) || rate <= 0) {
	//	alert("Must be > 0");
	//}
	//else if (isNaN(years) || years <= 0) {
	//	alert("Must be > 0");
	//	allValid = false;
	//}
	//else {
    // New code begins here
    var investment = getRandomNumber(50000);
    var rate = getRandomNumber(15);
    var years = getRandomNumber(50);
    $("investment").value = investment
    $("annual_rate").value = rate
    $("years").value = years
    var stepOne = calculateFV(investment, rate, years);
    $("future_value").value = formatFV(stepOne);
	//}
}

window.onload = function() {
    $("calculate").onclick = processEntries;
    $("investment").focus();
    $("date").innerHTML = getDate();
}