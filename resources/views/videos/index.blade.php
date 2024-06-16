<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h1>Videos</h1>
        <ul>
            @foreach($videos as $video)
                <li>
                    <h2>{{ $video->title }}</h2>
                    <p>{{ $video->description }}</p>
                    <video width="320" height="240" controls>
                        <source src="{{ route('videos.show', $video->id) }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </li>
            @endforeach
        </ul>
    </div>
</body>
</html>
