const video = document.getElementById("video");
const canvas = document.getElementById("canvas");
const ctx = canvas.getContext("2d");
const photo = document.getElementById("photo");
const info = document.getElementById("info");

let stream = null;
let facing = "user";

async function startCamera() {
  if (stream) stream.getTracks().forEach(t => t.stop());

  stream = await navigator.mediaDevices.getUserMedia({
    video: {
      facingMode: facing,
      width: { ideal: 1920 },
      height: { ideal: 1080 }
    }
  });

  video.srcObject = stream;
}

startCamera();

// Switch front/back camera
function switchCamera() {
  facing = facing === "user" ? "environment" : "user";
  startCamera();
}

// Capture + auto upscale to 4K
function capture() {
  // STOP CAMERA (PENTING)
  stream.getTracks().forEach(t => t.stop());

  const vw = video.videoWidth;
  const vh = video.videoHeight;

  const scale = Math.max(3840 / vw, 2160 / vh);

  canvas.width = Math.round(vw * scale);
  canvas.height = Math.round(vh * scale);

  ctx.imageSmoothingEnabled = true;
  ctx.imageSmoothingQuality = "high";

  ctx.drawImage(video, 0, 0, canvas.width, canvas.height);

  photo.src = canvas.toDataURL("image/jpeg", 0.92);

  info.innerText =
    `Original: ${vw}x${vh} → Output: ${canvas.width}x${canvas.height} (Auto 4K)`;

  document.getElementById("result").style.display = "block";
}

// Download
function download() {
  const a = document.createElement("a");
  a.href = canvas.toDataURL("image/jpeg", 0.92);
  a.download = "photo-4k.jpg";
  a.click();
}