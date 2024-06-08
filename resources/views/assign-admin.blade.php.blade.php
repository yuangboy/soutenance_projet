<!-- admin_user.blade.php -->
<form action="{{ route('assign.admin.role') }}" method="post">
    @csrf
    <label for="user_id">Sélectionner l'utilisateur :</label>
    <select name="user_id" id="user_id">
        @foreach($users as $user)
            <option value="{{ $user->id }}">{{ $user->name }}</option>
        @endforeach
    </select>
    <button type="submit">Attribuer le rôle d'administrateur</button>
</form>
