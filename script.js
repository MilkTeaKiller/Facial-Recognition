const video = document.getElementById("video");

Promise.all([
  faceapi.nets.faceRecognitionNet.loadFromUri("../facescanner/models"),
  faceapi.nets.faceLandmark68Net.loadFromUri("../facescanner/models"),
  faceapi.nets.ssdMobilenetv1.loadFromUri("../facescanner/models")
]).then(start);

function start() {
  // document.body.append("Models Loaded");

  navigator.mediaDevices.getUserMedia({ video:{} })
  .then(function(stream) {
    video.srcObject = stream;
    video.onloadedmetadata = function(e) {
      video.play();
    };
  })
  .catch(function(err) {
    console.log(err.name + ": " + err.message);
  });

  // video.src = "../videos/speech2.mp4";

  recognitionFaces();
}

async function recognitionFaces() {
  const labeledDescriptors = await loadLabeledImages();
  const faceMatcher = new faceapi.FaceMatcher(labeledDescriptors, 0.6);

  // video.addEventListener("play", () => {
    console.log("playing");
    document.getElementById("status").innerHTML = "Online";
    document.getElementById("status").style.color = "green";

    const canvas = faceapi.createCanvasFromMedia(video);
    document.body.append(canvas);

    const displaySize = { width: video.width, height: video.height };
    faceapi.matchDimensions(canvas, displaySize);

    setInterval(async () => {
      const detections = await faceapi.detectAllFaces(video).withFaceLandmarks().withFaceDescriptors();

      const resizedDetections = faceapi.resizeResults(detections, displaySize);
      canvas.getContext("2d").clearRect(0, 0, canvas.width, canvas.height);

      const results = resizedDetections.map((d) => {
        return faceMatcher.findBestMatch(d.descriptor);
      })
      results.forEach((result, i) => {
        const box = resizedDetections[i].detection.box;
        const drawBox = new faceapi.draw.DrawBox(box, {label: result.toString()})
        drawBox.draw(canvas);
      })
    }, 100);
  // })
}

function loadLabeledImages() {
  const labels = ["Wu Fuyun", "He Jiong", "Wang Jiaer"];

  return Promise.all(
    labels.map(async (label) => {
      const descriptions = [];
      for (let i = 1; i <= 3; i++) {
        const img = await faceapi.fetchImage(`../facescanner/labeled_images/${label}/${i}.jpg`);
        const detections = await faceapi.detectSingleFace(img).withFaceLandmarks().withFaceDescriptor();
        descriptions.push(detections.descriptor);
      }
      // document.body.append(label + " Face Loaded | ");
      return new faceapi.LabeledFaceDescriptors(label, descriptions);
    })
  )
}