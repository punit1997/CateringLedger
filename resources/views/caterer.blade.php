@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row col-md-12">
        <div class="card col-md-3">
        <div class="card-header">Caterer Rating</div>
            <div class="card-body">{{$cater->rating}}</div>
        </div>
        <div class="card col-md-4 col-md-offset-3">
            <div class="card-header">Companies</div>
            <div class="card-body">
                <ol>
                    @foreach($companies as $com)
                        <li>{{$com->name}}</li>
                    @endforeach
                </ol>
            </div>
        </div>
        </div>
        <br>
        <div class="row col-md-12">
        <div class="card col-md-4">
            <div class="card-header">BreakFast Rating</div>
            <div class="card-body">{{$breakfastR}}</div>
        </div>
            <div class="card col-md-4">
                <div class="card-header">Lunch Rating</div>
                <div class="card-body">{{$lunchR}}</div>
            </div>
            <div class="card col-md-4">
                <div class="card-header">Dinner Rating</div>
                <div class="card-body">{{$dinnerR}}</div>
            </div>
        </div>
        <br>
        <div class="card col-md-12">
            <div class="card-header">BreakFast Menu</div>
            <div class="card-body">
                <ol>
                    @foreach($breakfast as $breakF)
                        <li>{{$breakF->description}}</li>
                        Rating : {{$breakF->rating}}
                        @endforeach
                </ol>
            </div>
        </div>
        <br>
        <div class="card col-md-12">
            <div class="card-header">Lunch Menu</div>
            <div class="card-body">
                <ol>
                    @foreach($lunch as $lun)
                        <li>{{$lun->description}}</li>
                        Rating : {{$lun->rating}}
                    @endforeach
                </ol>
            </div>
        </div>
        <br>
        <div class="card col-md-12">
            <div class="card-header">Dinner Menu</div>
            <div class="card-body">
                <ol>
                    @foreach($dinner as $din)
                        <li>{{$din->description}}</li>
                        Rating : {{$din->rating}}
                    @endforeach
                </ol>
            </div>
        </div>
        <br>

    </div>
    @endsection