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
                                {{$caters->name}}
                                <button type="submit" name="Cid" value="{{$caters->id}}" >Vote</button>
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

