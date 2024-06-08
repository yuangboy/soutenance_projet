<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversations</title>
</head>
<body>
    <h1>Conversations</h1>
    <ul>
        @foreach($conversations as $conversation)
            <li>
                <a href="{{ route('conversations.show', $conversation->id) }}">
                    Conversation with {{ $conversation->patient_id == Auth::id() ? $conversation->praticien->prenom : $conversation->patient->prenom }}
                </a>
            </li>
        @endforeach
    </ul>
</body>
</html>
