@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Caterer List</div>

                    <div class="card-body">
                        <ol>
                        @foreach($caterers as $caters)
                            <li>
                            <form method = 'Post' action = '/caterer/vote'>
                                @csrf
                                @method('PATCH')
                                <a href="/caterer/show/{{$caters->id}}">{{$caters->name}}</a>
                                @if($checks->caterId==0)
                                <button type="submit" name="Cid" value="{{$caters->id}}" >Vote</button>
                                @else
                                    <div>Already Given</div>
                                @endif
                                {{$caters->vote}}
                            </form>
                                Rating: {{$caters->rating}}
                            </li>
                        @endforeach
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

