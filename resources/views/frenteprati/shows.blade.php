@foreach ($praticien->rendezvous as $rendezvous)
    <p>{{ $rendezvous->appointment_time }} - {{ $rendezvous->status }}</p>
    @if ($rendezvous->status == 'en attente')
        <form action="{{ route('rendezvous.confirm', $rendezvous->id) }}" method="POST">
            @csrf
            <button type="submit">Confirmer</button>
        </form>
    @endif
@endforeach

<form action="{{ route('rendezvous.request', $praticien->id) }}" method="POST">
    @csrf
    <input type="datetime-local" name="appointment_time" required>
    <button type="submit">Programmer un rendez-vous</button>
</form>
