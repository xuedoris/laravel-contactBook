<template>
    <div class="panel-body">
        <div class="form-group has-feedback">
            <label for="search" class="sr-only">Search</label>
            <input type="text" class="form-control" name="search" placeholder="search" @keyup="">
            <span class="glyphicon glyphicon-search form-control-feedback"></span>
        </div>
        <div class="row" v-for="contact in contacts">
            <div class="col-md-4">{{contact.contactname}}</div>
            <div class="col-md-8">phone number: {{contact.phonenumber}}</div>
        </div>
    </div>
</template>

<script>
    export default {
        data: function () {
            return {
                contacts: {}
            }
        },
        created: function(){
            var self = this;
            axios.get('/contacts').then(function (response) {
                self.contacts = response.data;
            });
        }
    }
</script>
