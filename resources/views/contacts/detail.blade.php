@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h4>{{$contact->contactname}}</h4> Contact detail</div>

                <div class="panel-body">
                    <ul class="list-group">
                        <li class="list-group-item">Phone number: {{$contact->phonenumber}}</li>
                        <li class="list-group-item">Email: {{$contact->email}}</li>
                        <li class="list-group-item">Added {!!$contact->created_at->diffForHumans()!!}</li>
                    </ul>
                    <a class="btn btn-lg btn-success" href="{{ url('/contacts/'.$contact->id.'/edit') }}">Edit this contact</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection