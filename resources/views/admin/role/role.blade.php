<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <style>
        form{
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            width: 100%;
$
        }
    </style>

    <h1 style="text-align: center">Registre de creation Role</h1>


    <form action="{{route('attribution.role')}}" method="POST">
        @csrf
       <div>
        <label for="">Name</label>
        <input type="text" name="name">
       </div>

       <div>
        <label for="">Email</label>
        <input type="email" name="email">
       </div>

       {{-- <div>
        <label for="">Password</label>
        <input type="text" name="password">
       </div> --}}

       <div>
        <label for="">Status</label>
        <select name="status" id="">
            <option value="1">Active</option>
            <option value="0">Inacive</option>
        </select>
       </div>

       <div>
        <label for="">Role</label>
        <select name="role" id="">
            <option value="user">Patient</option>
            <option value="praticien">Praticien</option>
        </select>
       </div>

       <div>
        <label for="">Password</label>
        <input type="password" name="password" id="">
       </div>

       <button type="submit">Valider</button>

    </form>



</body>
</html>
