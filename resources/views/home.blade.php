@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default container-fluid">
                <div class="panel-heading row">
                    <div class="col-xs-11"><h4>Contact Dashboard</h4></div>
                    <div class="col-xs-1">
                    <button type="button" class="btn btn-success" title="Create a new contact" @click="toggleCreateForm" :disabled="showCreate">
                        <span class="glyphicon glyphicon-plus"></span>
                    </button>
                    </div>
                </div>

                <div class="panel-body">
                    @if($flash = session('welcomeMessage'))
                    <h1>{{$flash}}</h1>
                    @endif
                	<h2>Newly Added Contacts</h2>
                	<div id="contacts-wraper">
                	<ul class="list-group">
		                @forelse($contacts as $contact)
							<li class="list-group-item"><a href="{{ url('/contacts/'.$contact->id) }}">{!!$contact->contactname!!}, phone number: {!!$contact->shortphonenumber!!}</a>
								<a href="{{ url('/contacts/'.$contact->id) }}" class="btn btn-xs btn-danger pull-right ajax-delete">{{lang('del_contact')}}</a>
							</li>
						@empty
							<li class="list-group-item">No contacts is available.</li>
						@endforelse
					</ul>
					</div>
                    <!--<a class="btn btn-lg btn-success" @click="toggleCreateForm" :disabled="isDisable">Create a new Contact</a>-->
                </div>
            </div>
        </div>
    </div>
    <div class="row" v-show="showCreate">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Create a new Contact<button type="button" class="close" @click="toggleCreateForm">&times;</button></div>

                <div class="panel-body">
                    @if(isset($result))
                        <p>Contact Added successfully!</p>
                    @else
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/contacts') }}">
                            {{ csrf_field() }}
                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">

                            <div class="form-group{{ $errors->has('contactname') ? ' has-error' : '' }}">
                                <label for="contactname" class="col-md-4 control-label">Contact Name</label>

                                <div class="col-md-6">
                                    <input id="contactname" type="text" class="form-control" name="contactname" value="{{ old('contactname') }}" required autofocus>

                                    @if ($errors->has('contactname'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('contactname') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('phonenumber') ? ' has-error' : '' }}">
                                <label for="phonenumber" class="col-md-4 control-label">Phone number:</label>

                                <div class="col-md-6">
                                    <input id="phonenumber" type="text" class="form-control" name="phonenumber" value="{{ old('phonenumber') }}" required autofocus>
                                    @if ($errors->has('phonenumber'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('phonenumber') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="phonetype" class="col-md-4 control-label">Phone Type:</label>

                                <div class="col-md-6">
                                    <select id="phonetype" class="form-control" name="phonetype_id" autofocus>
                                        @foreach ($types as $id=>$phonetype)
                                            <option value="{{$id}}">{{$phonetype}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" >

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('bday') ? ' has-error' : '' }}">
                                <label for="bday" class="col-md-4 control-label">Birthday</label>

                                <div class="col-md-6">
                                    <input id="bday" type="date" class="form-control" name="bday" value="{{ old('post_on') }}" autofocus>

                                    @if ($errors->has('bday'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('bday') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <input type="submit" class="btn btn-primary pull-right">
                                </div>
                            </div>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('custom_js')
<script>
	$(document).ready(function(){
        // runs when a user first hits a delete link
        $('.ajax-delete').on('click', function(e)
        {
            // Stop anchor tag from trying to execute as a link
            e.preventDefault();

            // Get delete URL
            var deleteUrl = $(this).attr('href');

            // Show delete confirmation modal
            var confirmed = confirm('Are you sure to delete this contact?');

            // If user clicks "Yes" then submit deletion
            if(confirmed){
                // Do delete
                $.post(deleteUrl, {"_method" : "DELETE", "_token" : "{{csrf_token()}}"}, function(response) {
                    // This is a callback. Do stuff here if you want.
                    var newDoc = document.open("text/html", "replace");
					newDoc.write(response.html);
					newDoc.close();
                });
            }
        });
    });

</script>
@endsection
