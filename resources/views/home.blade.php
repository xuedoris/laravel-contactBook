@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                	<h2>Newly Added Contacts</h2>
                	<ul class="list-group">
		                @forelse($contacts as $contact)
							<li class="list-group-item"><a href="{{ url('/contacts/'.$contact->id) }}">{!!$contact->contactname!!}, phone number: {!!$contact->phonenumber!!}</a>
								<form action="{{ url('/contacts/'.$contact->id) }}" method="POST">
								    <input type="hidden" name="_method" value="DELETE">
								    <input type="hidden" name="_token" value="{{ csrf_token() }}">
								    <input type="submit" value="Delete Contact" class="btn-xs btn-danger clearfix">
								</form>
							</li>
						@empty
							<li class="list-group-item">No contacts is available.</li>
						@endforelse
					</ul>
                    <a class="btn btn-lg btn-success" href="{{ url('/contacts/create') }}">Create a new Contact</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
