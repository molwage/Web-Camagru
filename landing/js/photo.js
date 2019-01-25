document.getElementById('capture').addEventListener('click',function()
{
    context.drawImage(video, 0, 0, 400, 300);
    //EDIT IMAGE HERE
    photo.setAttribute('src', canvas.toDataURL('image/png'));
});

var video = document.getElementById('video');
var canvas = document.getElementById('canvas');
var context = canvas.getContext('2d');

navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia ||
navigator.mozGetUserMedia || navigator.oGetUserMedia || navigator.msGetUserMedia;
if (navigator.getUserMedia){
    navigator.getUserMedia({video:true}, streamWebCam, throwError);
}
function streamWebCam(stream){
    video.srcObject = stream;
    video.play();
}
function throwError(e){
    alert(e.name);
}
// document.getElementById("save").addEventListener("click", function(){
//     var img = new Image();
//     img.src = canvas.toDataURL();
//     if (canvas.width == video.clientWidth){
//         var json = {
//                 pic: img.src
//             }
//             var xhr = new XMLHttpRequest();
//             xhr.open('POST', 'save.php', true);
//             xhr.setRequestHeader('Content-type', 'application/json');
//             // xhr.onreadystatechange = function (data) {
//             //     if (xhr.readyState == 4 && xhr.status == 200)
//             //         console.log(xhr.responseText);
//             // }
//             xhr.send(JSON.stringify(json));
//     }
//     console.log(json.pic);
//     });


