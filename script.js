const video = document.getElementById("video");
const canvas = document.getElementById("canvas");
const ctx = canvas.getContext("2d");
const photo = document.getElementById("photo");
const info = document.getElementById("info");

let originalImage = null;

// Start camera
navigator.mediaDevices.getUserMedia({
  video: {
    width: { ideal: 1920 },
    height: { ideal: 1080 }
  }
}).then(stream => {
  video.srcObject = stream;
}).catch(err => {
  alert("Kamera tidak bisa diakses");
});

// Capture photo
function takePhoto() {
  canvas.width = video.videoWidth;
  canvas.height = video.videoHeight;
  ctx.drawImage(video, 0, 0);

  const data = canvas.toDataURL("image/png");
  photo.src = data;
  originalImage = new Image();
  originalImage.src = data;

  document.getElementById("result").style.display = "block";
  info.innerText = `Original: ${canvas.width} x ${canvas.height}`;
}

// Upscale image
function upscale() {
  if (!originalImage) return;

  const scale = parseInt(document.getElementById("scale").value);
  canvas.width = originalImage.width * scale;
  canvas.height = originalImage.height * scale;

  ctx.imageSmoothingEnabled = true;
  ctx.imageSmoothingQuality = "high";

  ctx.drawImage(originalImage, 0, 0, canvas.width, canvas.height);
  photo.src = canvas.toDataURL("image/png");

  info.innerText =
    `Original: ${originalImage.width}x${originalImage.height} → Output: ${canvas.width}x${canvas.height} (Upscaled)`;
}

// Download
function download() {
  const a = document.createElement("a");
  a.href = canvas.toDataURL("image/png");
  a.download = "upscaled-photo.png";
  a.click();
}