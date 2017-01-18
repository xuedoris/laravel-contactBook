<div class="panel-body container-fluid">
    
    @forelse($contacts as $contact)
    <div class="row">
        <div class="col-md-4">{!!$contact->contactname!!}</div>
        <div class="col-md-8">phone number: {!!$contact->phonenumber!!}</div>
    </div>
    @empty
        <p>No contacts is available.</p>
    @endforelse
    
    <div class="row">
       {{$contacts->links()}} 
    </div>
</div>
            