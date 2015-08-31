<html>
<body>

<h1> Page Acteurs Index</h1>

<h3>{{$title}}</h3>

<ul>
    @foreach($noms as $nom)
        <li>{{$nom}}</li>
    @endforeach
</ul>

<ul>
    @foreach($ages as $age)
    <li>{{$age}}</li>
    @endforeach
</ul>

<ul>
    @foreach($acteurs as $act)
    <li>{{ $act['nom'].' '.$act['prenom'].' '.$act['age']}}</li>
    @endforeach
</ul>


<ul>
    @foreach($localite as $ville => $acteurs)
    <li>{{$ville}}</li>
    <ul>
        @foreach($acteurs as $acteur)
            {{ $acteur }}
        @endforeach
    </ul>
    @endforeach
</ul>

<ul>
    @foreach($localite as $ville => $acteurs)
    @if ($ville == 'Lyon')
    <li>{{$ville}}</li>
    <ul>

        @foreach($acteurs as $acteur)
        {{ $acteur }}
        @endforeach

    </ul>
    @endif
    @endforeach
</ul>

<p> {{$yolo or 'Gutten tag mein freund'}}</p>



</body>

</html>