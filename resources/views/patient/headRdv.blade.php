
<ul>


    @foreach ($praticiens as $praticien)

    <li>{{$praticien->mattricule}}</li>
    <li>{{$praticien->specialite}}</li>
    <li>{{$praticien->service_id}}</li>
    <li>{{$praticien->personnes_id}}</li>

    @endforeach


</ul>
