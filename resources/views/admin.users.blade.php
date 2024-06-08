@foreach($users as $user)
    <div>
        <span>Nom: {{ $user->name }}</span>
        <span>Email: {{ $user->email }}</span>
        <span>Rôle: {{ $user->isAdmin() ? 'Admin' : 'User' }}</span>
        <span>Statut: {{ $user->status }}</span>

        @if(!$user->isAdmin())
            <form method="post" action="{{ route('admin.assignRole', $user->id) }}">
                @csrf
                <button type="submit">Promouvoir en Admin</button>
            </form>
        @endif
    </div>
@endforeach
