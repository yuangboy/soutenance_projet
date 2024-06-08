<!-- resources/views/notification_form.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Envoyer une notification</title>
</head>
<body>
    <h1>Envoyer une notification au patient</h1>
    <form action="{{ route('notification.send') }}" method="POST">
        @csrf
        <label for="patient_id">ID du patient :</label>
        <input type="number" id="patient_id" name="patient_id" required>

        <label for="message">Message :</label>
        <textarea id="message" name="message" required></textarea>

        <button type="submit">Envoyer la notification</button>
    </form>
</body>
</html>
