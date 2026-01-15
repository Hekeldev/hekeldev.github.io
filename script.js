const video = document.getElementById("video");
const canvas = document.getElementById("canvas");
const ctx = canvas.getContext("2d");
const photo = document.getElementById("photo");
const info = document.getElementById("info");

const switchBtn = document.getElementById("switchBtn");
const captureBtn = document.getElementById("captureBtn");

let stream = null;
let facing = "user";

// Start camera
async function startCamera() {
  try {
    if (stream) {
      stream.getTracks().forEach(t => t.stop());
    }

    stream = await navigator.mediaDevices.getUserMedia({
      video: {
        facingMode: facing,
        width: { ideal: 1920 },
        height: { ideal: 1080 }
      }
    });

    video.srcObject = stream;
    await video.play();
  } catch (e) {
    alert("Kamera gagal diakses");
    console.error(e);
  }
}

// Switch camera
function switchCamera() {
  facing = facing === "user" ? "environment" : "user";
  startCamera();
}

// Capture + auto 4K
function capture() {
  if (!stream) {
    alert("Kamera belum siap");
    return;
  }

  const vw = video.videoWidth;
  const vh = video.videoHeight;

  if (!vw || !vh) {
    alert("Resolusi kamera belum siap");
    return;
  }

  // Stop camera biar HP ga ngelag
  stream.getTracks().forEach(t => t.stop());
  stream = null;

  const scale = Math.max(3840 / vw, 2160 / vh);
  canvas.width = Math.round(vw * scale);
  canvas.height = Math.round(vh * scale);

  ctx.imageSmoothingEnabled = true;
  ctx.imageSmoothingQuality = "high";
  ctx.drawImage(video, 0, 0, canvas.width, canvas.height);

  photo.src = canvas.toDataURL("image/jpeg", 0.92);

  info.innerText =
    `Original: ${vw}x${vh} → Output: ${canvas.width}x${canvas.height}`;

  document.getElementById("result").style.display = "block";
}

// 🔥 EVENT LISTENER (INI KUNCI)
switchBtn.addEventListener("click", switchCamera);
switchBtn.addEventListener("touchstart", switchCamera);

captureBtn.addEventListener("click", capture);
captureBtn.addEventListener("touchstart", capture);

// Init
startCamera();