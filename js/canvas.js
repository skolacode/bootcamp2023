var canvas
var ctx

function drawme() {
  canvas = document.getElementById("canvas");
  ctx = canvas.getContext("2d");
  ctx.moveTo(0, 0);
  ctx.lineTo(200, 100);
  ctx.stroke();
}
