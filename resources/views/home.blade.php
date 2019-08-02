@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Today's Meals</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                        <div>
                            <h3>BreakFast</h3>
                            @foreach($today_breakfast as $breakfast)
                            {{$breakfast->description}}
                            @endforeach
                            <h3>Lunch</h3>
                            @foreach($today_lunch as $lunch)
                            {{$lunch->description}}
                            @endforeach
                            <h3>Dinner</h3>
                            @foreach($today_dinner as $dinner)
                            {{$dinner->description}}
                                @endforeach
                        </div>
                </div>

            </div>
            <br>
            <br>
            <div class="card">
                <div class="card-header">Vole for tomorrow Meal</div>

                <div class="card-body">
                    <div>
                        <h3>BreakFast</h3>
                        <form action="/vote" method="post">
                            @csrf
                            @method('PATCH')
                        <ol>
                        @foreach($breakfast_menu as $breakfast)
                                <li>
                                    <input type="radio" name="Bid" value="{{$breakfast->id}}">
                                    {{$breakfast->description}}
                                    {{$breakfast->voting}}
                                </li>
                            <br>
                        @endforeach

                        </ol>

                        <h3>Lunch</h3>

                            @csrf
                            @method('PATCH')
                        <ol>
                        @foreach($lunch_menu as $lunch)
                                <li>
                                    <input type="radio" name="Lid" value="{{$lunch->id}}">
                                    {{$lunch->description}}
                                    {{$lunch->voting}}
                                </li>
                            <br>
                        @endforeach

                        </ol>

                        <h3>Dinner</h3>

                            @csrf
                            @method("PATCH")
                        <ol>
                        @foreach($dinner_menu as $dinner)
                                <li>
                                    <input type="radio" name="Did" value="{{$dinner->id}}">
                                    {{$dinner->description}}
                                    {{$dinner->voting}}
                                </li>
                            <br>
                        @endforeach
                            <input type="submit">
                        </ol>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
