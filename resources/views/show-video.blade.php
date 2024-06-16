<!-- resources/views/show-video.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Video</title>
</head>
<body>
    <h1>View Video</h1>
    <video width="640" height="480" controls>
        <source src="data:video/webm;base64,{{ $videoData }}" type="video/webm">
        Your browser does not support the video tag.
    </video>
    <a href="{{ url('/videos') }}">Back to list</a>
</body>
</html>
