//approveJava connect to layout.blade.php

function Page_Load()
{
    var black = parseInt(document.getElementById('black').value);
    var blue = parseInt(document.getElementById('blue').value);
    var red = parseInt(document.getElementById('red').value);
    var paper = parseInt(document.getElementById('paper').value);
    var pencil = parseInt(document.getElementById('pencil').value);
	
    var total = parseInt(black + blue + red + paper + pencil);
    document.getElementById("total").innerHTML = total;
  
}

function updateValue() {

    var black = parseInt(document.getElementById('black').value);
    var blue = parseInt(document.getElementById('blue').value);
    var red = parseInt(document.getElementById('red').value);
    var paper = parseInt(document.getElementById('paper').value);
    var pencil = parseInt(document.getElementById('pencil').value);

    var total = parseInt(black + blue + red + paper + pencil);
    document.getElementById("total").innerHTML = total;

}
