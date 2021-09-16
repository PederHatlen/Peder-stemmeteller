let partiValgEL = document.querySelector("#partiValg");
let resultatInfoEL = document.querySelector("#resultatInfo");

for (let i = 0; i < partier.length; i++) {
    let optionEL = document.createElement("option");
    optionEL.setAttribute("value", partier[i]);
    optionEL.innerHTML = partier[i]
    partiValgEL.appendChild(optionEL)
}

if (partierUN.length == 0) {
    resultatInfoEL.innerHTML += "<b>Ingen stemmer å vise, men det kan endres!</b>"
}


//Diagram oppsett ting.
const PC_data = {
    labels: partierUN,
    datasets: [{
        label: 'My First Dataset',
        data: stemmerUN,
        backgroundColor: [
        'rgb(255, 99, 132)',
        'rgb(54, 162, 235)',
        'rgb(255, 205, 255)'
        ],
        hoverOffset: 0
    }]
};
const PC_config = {
    type: 'pie',
    data: PC_data,
    options: {
        color: '#FFF'
    }
};

var pieChart = new Chart(
    document.querySelector("#pieChart_Canvas"),
    PC_config
);