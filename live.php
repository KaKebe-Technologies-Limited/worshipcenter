<!DOCTYPE html>
<html>
<head>
  <title>Stream Player</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
  <div class="container">
    <h1>Stream Player</h1>
    <audio id="stream" controls></audio>
  </div>

  <h1>Audio Stream Example</h1>
  <audio controls>
    <source src="https://stream.zeno.fm/4m9texrfa1jvv.m3u" type="audio/mpegurl">
  </audio>

  <!-- Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script>
    // Create a new audio context
    const audioCtx = new AudioContext();

    // Create a new audio element and set its source to the stream link
    const audioElement = document.getElementById('stream');
    audioElement.src = 'https://stream.zeno.fm/4m9texrfa1jvv.m3u';

    // Create a new media source node and connect it to the audio context
    const mediaSource = audioCtx.createMediaElementSource(audioElement);
    mediaSource.connect(audioCtx.destination);
  </script>
</body>
</html>
