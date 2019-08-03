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
                                @if($checks->breakfastRateId==0)
                                <div class="txt-center">
                                    <form action="/breakfast/rate" method="Post">
                                        @csrf
                                        @method('PATCH')
                                        <div class="rating">
                                            <input id="Bstar5" name="breakfast" type="radio" value="5" class="radio-btn hide" onclick="form.submit('PATCH')" >
                                            <label for="Bstar5">☆</label>
                                            <input id="Bstar4" name="breakfast" type="radio" value="4" class="radio-btn hide" onclick="form.submit('PATCH')">
                                            <label for="Bstar4">☆</label>
                                            <input id="Bstar3" name="breakfast" type="radio" value="3" class="radio-btn hide" onclick="form.submit('PATCH')">
                                            <label for="Bstar3">☆</label>
                                            <input id="Bstar2" name="breakfast" type="radio" value="2" class="radio-btn hide" onclick="form.submit('PATCH')">
                                            <label for="Bstar2">☆</label>
                                            <input id="Bstar1" name="breakfast" type="radio" value="1" class="radio-btn hide" onclick="form.submit('PATCH')">
                                            <label for="Bstar1">☆</label>
                                            <div class="clear"></div>
                                        </div>
                                    </form>
                                </div>
                                @else
                                    <div>Review given</div>
                                @endif
                            @endforeach
                            <h3>Lunch</h3>
                            @foreach($today_lunch as $lunch)
                            {{$lunch->description}}
                                @if($checks->lunchRateId==0)
                                <div class="txt-center">
                                    <form action="/lunch/rate" method="Post">
                                        @csrf
                                        @method('PATCH')
                                        <div class="rating">
                                            <input id="Lstar5" name="lunch" type="radio" value="5" class="radio-btn hide" onclick="form.submit('PATCH')" >
                                            <label for="Lstar5">☆</label>
                                            <input id="Lstar4" name="lunch" type="radio" value="4" class="radio-btn hide" onclick="form.submit('PATCH')">
                                            <label for="Lstar4">☆</label>
                                            <input id="Lstar3" name="lunch" type="radio" value="3" class="radio-btn hide" onclick="form.submit('PATCH')">
                                            <label for="Lstar3">☆</label>
                                            <input id="Lstar2" name="lunch" type="radio" value="2" class="radio-btn hide" onclick="form.submit('PATCH')">
                                            <label for="Lstar2">☆</label>
                                            <input id="Lstar1" name="lunch" type="radio" value="1" class="radio-btn hide" onclick="form.submit('PATCH')">
                                            <label for="Lstar1">☆</label>
                                            <div class="clear"></div>
                                        </div>
                                    </form>
                                </div>
                                @else
                                    <div>Review given</div>
                                @endif
                            @endforeach
                            <h3>Dinner</h3>
                            @foreach($today_dinner as $dinner)
                            {{$dinner->description}}
                                @if($checks->dinnerRateId==0)
                                <div class="txt-center">
                                    <form action="/dinner/rate" method="Post">
                                        @csrf
                                        @method('PATCH')
                                        <div class="rating">
                                            <input id="Dstar5" name="dinner" type="radio" value="5" class="radio-btn hide" onclick="form.submit('PATCH')" >
                                            <label for="Dstar5">☆</label>
                                            <input id="Dstar4" name="dinner" type="radio" value="4" class="radio-btn hide" onclick="form.submit('PATCH')">
                                            <label for="Dstar4">☆</label>
                                            <input id="Dstar3" name="dinner" type="radio" value="3" class="radio-btn hide" onclick="form.submit('PATCH')">
                                            <label for="Dstar3">☆</label>
                                            <input id="Dstar2" name="dinner" type="radio" value="2" class="radio-btn hide" onclick="form.submit('PATCH')">
                                            <label for="Dstar2">☆</label>
                                            <input id="Dstar1" name="dinner" type="radio" value="1" class="radio-btn hide" onclick="form.submit('PATCH')">
                                            <label for="Dstar1">☆</label>
                                            <div class="clear"></div>
                                        </div>
                                    </form>
                                </div>
                                @else
                                    <div>Review given</div>
                                @endif
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

                        <form action="/menuvote" method="post">
                            @csrf
                            @method('PATCH')
                        <ol>
                        @foreach($breakfast_menu as $breakfast)
                                <li>
                                    <input type="radio" name="Bid" value="{{$breakfast->id}}">
                                    {{$breakfast->description}}
                                    {{$breakfast->voting}}
                                    <div>Rating:{{$breakfast->rating}}</div>
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
                                    <div>Rating:{{$lunch->rating}}</div>
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
                                    <div>Rating:{{$dinner->rating}}</div>
                                </li>
                            <br>
                        @endforeach
                            @if($checks->voteMenuId==0)
                            <input type="submit">
                                @else
                            <div>Already Given</div>
                                @endif
                        </ol>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
