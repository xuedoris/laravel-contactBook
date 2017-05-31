<template>
    <div class="panel-body">
        <h4>Newly Added Contacts</h4>
        <div class="row">
            <div class="col-md-4"><h5>Contact Name</h5></div>
            <div class="col-md-8"><h5>Phone Number</h5></div>
        </div>
        <div class="row" v-for="contact in contacts">
            <div class="col-md-4">{{contact.contactname}}</div>
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
        }
    }
</script>