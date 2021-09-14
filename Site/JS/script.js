let body = document.body;

let Width;
let Height;

window.onresize = setup;
setup()

function setup() {
    Width = window.innerWidth;
    Height = window.innerHeight;

    easyReading((Width > Height? true:false));
}


function easyReading(turnOn){

    body.style.width = (turnOn? "":"100%");
}