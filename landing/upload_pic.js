var xhttp = new XMLHttpRequest()

var capture = document.querySelector('#save');
var img;

capture.onclick = ()=>
{
    if (document.querySelector('canvas').getContext('2d'))
    {
        img = document.querySelector('canvas').toDataURL('image/png');
        xhttp.open("POST", "camera.PHP");
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send('image=' + img);
    }
}