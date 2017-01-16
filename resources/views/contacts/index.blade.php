@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Your Contacts</div>

                <div class="panel-body">
                    <div class="row">
                    @forelse($contacts as $contact)
                        <p>{{$contact->contactname}}</p>
                        <span class="clearfix">post at {!!$contact->created_at->diffForHumans()!!}</span>
                    @empty
                        <p>No articles is available.</p>
                    @endforelse
                    </div>
                    <div class="row">
                       {{$contacts->links()}} 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection