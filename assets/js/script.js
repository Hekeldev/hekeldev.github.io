const video = document.getElementById("video");
const canvas = document.getElementById("canvas");
const ctx = canvas.getContext("2d");

const captureBtn = document.getElementById("captureBtn");
const downloadBtn = document.getElementById("downloadBtn");
const photo = document.getElementById("photo");
const info = document.getElementById("info");

let stream = null;

// START BACK CAMERA ONLY
async function startCamera() {
  try {
    stream = await navigator.mediaDevices.getUserMedia({
      video: {
        facingMode: { exact: "environment" },
        width: { ideal: 1920 },
        height: { ideal: 1080 }
      }
    });
    video.srcObject = stream;
    await video.play();
  } catch (e) {
    alert("Kamera belakang tidak tersedia / izin ditolak");
    console.error(e);
  }
}

// CAPTURE + AUTO 4K
function capture() {
  if (!stream) return;

  const vw = video.videoWidth;
  const vh = video.videoHeight;
  if (!vw || !vh) return;

  const scale = Math.max(3840 / vw, 2160 / vh);
  canvas.width = Math.round(vw * scale);
  canvas.height = Math.round(vh * scale);

  ctx.imageSmoothingEnabled = true;
  ctx.imageSmoothingQuality = "high";

  ctx.drawImage(video, 0, 0, canvas.width, canvas.height);

  stream.getTracks().forEach(t => t.stop());
  stream = null;

  const data = canvas.toDataURL("image/jpeg", 0.92);
  photo.src = data;

  info.innerText =
    `Original: ${vw}×${vh} → Output: ${canvas.width}×${canvas.height} (Auto 4K)`;

  document.getElementById("result").style.display = "block";
}

// DOWNLOAD
function download() {
  const a = document.createElement("a");
  a.href = canvas.toDataURL("image/jpeg", 0.92);
  a.download = "PAP_SUSU_MANTAN_LO.jpg";
  a.click();
}

// EVENTS
captureBtn.addEventListener("click", capture);
captureBtn.addEventListener("touchstart", capture);
downloadBtn.addEventListener("click", download);
downloadBtn.addEventListener("touchstart", download);

// INIT
startCamera();
