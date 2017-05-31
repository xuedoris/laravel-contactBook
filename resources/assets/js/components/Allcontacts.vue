
<template>
    <div class="panel-body">
        <div class="form-group has-feedback">
            <label for="search" class="sr-only">Search</label>
            <input type="text" class="form-control" name="search" placeholder="search" @keyup="search($event.target.value)">
            <span class="glyphicon glyphicon-search form-control-feedback"></span>
        </div>
        <div class="row">
            <div class="col-md-4"><h5>Contact Name</h5></div>
            <div class="col-md-8"><h5>Phone Number</h5></div>
        </div>
        <div class="row" v-for="contact in contacts">
            <div class="col-md-4"><router-link :to="{ path: 'contacts/'+contact.id }">{{contact.contactname}}</router-link></div>
            <div class="col-md-8">{{contact.phonenumber}}</div>
        </div>
    </div>
</template>

<script>
    import Contact from '../models/Contact';
    export default {
        data: function () {
            return {
                contacts: {}
            }
        },
        created: function(){
            let self = this;
            Contact.searchContacts().then(function (response) {
                self.contacts = response.data;
            });
        },
        methods: {
            search: function(keyword){
                let self = this;
                Contact.searchContacts(keyword).then(function (response) {
                    self.contacts = response.data;
                });
            }
        }
    }
</script>
