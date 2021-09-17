let partiValgEL = document.querySelector("#partiValg");
let resultatInfoEL = document.querySelector("#resultatInfo");

// legge til muligheter til select inputen i index, fra data hentet i head
for (let i = 0; i < partier.length; i++) {
    let optionEL = document.createElement("option");
    optionEL.setAttribute("value", partier[i]);
    optionEL.innerHTML = partier[i]
    partiValgEL.appendChild(optionEL)
}

// I tilfelle det ikke er noen stemmer, vis informasjon og sjul diagrammet
if (partierUN.length == 0) {
    resultatInfoEL.innerHTML = "<b>Ingen stemmer å vise, men det kan endres!</b>"
    document.querySelector("#resultCharts").style.display = "none";
}


/////////////////////////
// Google Charts Setup //
/////////////////////////
//Setup kode er hentet fra w3-schools med noe modifikasjon.

// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);


// Draw the chart and set the chart values
function drawChart() {
    var data = google.visualization.arrayToDataTable(piechartData);

    // Optional; add a title and set the width and height of the chart
    var options = {"backgroundColor":"transparent", "height":"100%"};

    // Display the chart inside the <div> element with id="piechart"
    var chart = new google.visualization.PieChart(document.getElementById('piechart'));
    chart.draw(data, options);
}