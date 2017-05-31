<template>
    <div class="panel-body">
        <h4>Newly Added Contacts</h4>
        <div class="row">
            <div class="col-md-3"><h5>Contact Name</h5></div>
            <div class="col-md-3"><h5>Phone Number</h5></div>
            <div class="col-md-2"><h5>Phone Type</h5></div>
            <div class="col-md-4"><h5>Email</h5></div>
        </div>
        <div class="row" v-for="contact in newelyAdded">
            <div class="col-md-3">{{contact.contactname}}</div>
            <div class="col-md-3">{{contact.phonenumber}}</div>
            <div class="col-md-2">{{contact.phonetype.phonetype}}</div>
            <div class="col-md-4">{{contact.email}}</div>
        </div>
        <hr/>
        <h4>Recently updated Contacts</h4>
        <div class="row">
            <div class="col-md-3"><h5>Contact Name</h5></div>
            <div class="col-md-3"><h5>Phone Number</h5></div>
            <div class="col-md-2"><h5>Phone Type</h5></div>
            <div class="col-md-4"><h5>Email</h5></div>
        </div>
        <div class="row" v-for="contact in recentUpdated">
            <div class="col-md-3">{{contact.contactname}}</div>
            <div class="col-md-3">{{contact.phonenumber}}</div>
            <div class="col-md-2">{{contact.phonetype.phonetype}}</div>
            <div class="col-md-4">{{contact.email}}</div>
        </div>
    </div>
</template>

<script>
    import Contact from '../models/Contact';
    export default {
        data: function () {
            return {
                newelyAdded: {},
                recentUpdated: {}
            }
        },
        created: function(){
            let self = this;
            Contact.topContacts('newly-added').then(function (response) {
                self.newelyAdded = response.data;
            });
            Contact.topContacts('default').then(function (response) {
                self.recentUpdated = response.data;
            });
        }
    }
</script>