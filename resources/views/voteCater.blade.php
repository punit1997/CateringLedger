<!DOCTYPE html>
<head>
    <title>
        Choose Cater
    </title>
</head>
<body>

<b>Choose Cater</b>
    <br>

    @foreach($cater as $caters)
        {{$caters->name}}
        {{$caters->rating}}
        <form method = 'PUT' action = '/vote/{{$caters->id}}' >
            {{ csrf_field() }}
            <button type="submit" name="submit" >Vote</button>
        </form>
        @endforeach

</body>

</html>
