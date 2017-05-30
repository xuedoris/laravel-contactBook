@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                    @if($flash = session('welcomeMessage'))
                        <h1>{{$flash}}</h1>
                    @endif
                    <ul class="nav nav-tabs">
                        <router-link tag="li" to="/" exact><a>Contact Dashboard</a></router-link>
                        <router-link tag="li" to="/contacts" exact><a>All Contacts</a></router-link>
                        <router-link tag="li" to="/contacts/create">
                                <a>Create a new contact</a>
                        </router-link>
                    </ul>
                        <router-view>
                            @forelse($contacts as $contact)
                                <li class="list-group-item"><a href="{{ url('/contacts/'.$contact->id) }}">{!!$contact->contactname!!}, phone number: {!!$contact->shortphonenumber!!}</a>
                                    <a href="{{ url('/contacts/'.$contact->id) }}" class="btn btn-xs btn-danger pull-right ajax-delete">{{lang('del_contact')}}</a>
                                </li>
                            @empty
                                <li class="list-group-item">No contacts is available.</li>
                            @endforelse
                        </router-view>

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
