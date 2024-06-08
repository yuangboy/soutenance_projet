
 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
 </head>
 <body>
   @foreach($users as $user)
    <div>
        <p>{{ $user->name }}</p>
        <form action="{{ route('admin.users.assignRole') }}" method="POST">
            @csrf
            <input type="hidden" name="user_id" value="{{ $user->id }}">
            <select name="role">
                <option value="user">Utilisateur</option>
                <option value="admin">Admin</option>
            </select>
            <button type="submit">Attribuer Rôle</button>
        </form>
    </div>
    @endforeach


 </body>
 </html>
