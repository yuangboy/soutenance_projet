<!-- resources/views/list-videos.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of Videos</title>
</head>
<body>
    <h1>List of Videos</h1>
    <ul>
        @foreach($videos as $video)
            <li>
                <a href="{{ url('/videos/' . $video->id) }}">Video {{ $video->id }}</a>
            </li>
        @endforeach
    </ul>
</body>
</html>
