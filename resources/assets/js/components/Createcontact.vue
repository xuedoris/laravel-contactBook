<template>
    <div class="panel-body">
        <div class="alert alert-success fade in" v-if="form.message">
            <a href="#" class="close" data-dismiss="alert" @click="form.message=false">&times;</a>
            <strong v-text="form.message"></strong>
        </div>
        <form class="form-horizontal" role="form" method="POST" action="/contacts" @submit.prevent="form.submit('post', '/contacts')" @keydown="form.errors.clear($event.target.name)">

            <div class="form-group" :class="{'has-error': form.errors.has('contactname')}">
                <label for="contactname" class="col-md-4 control-label">Contact Name</label>

                <div class="col-md-6">
                    <input id="contactname" type="text" class="form-control" name="contactname" v-model="form.contactname">

                    <span class="help-block" v-if="form.errors.has('contactname')">
                        <strong v-text="form.errors.get('contactname')"></strong>
                    </span>
                </div>
            </div>

            <div class="form-group" :class="{'has-error': form.errors.has('phonenumber')}">
                <label for="phonenumber" class="col-md-4 control-label">Phone number:</label>

                <div class="col-md-6">
                    <input id="phonenumber" type="text" class="form-control" name="phonenumber" v-model="form.phonenumber">

                    <span class="help-block" v-if="form.errors.has('phonenumber')">
                        <strong v-text="form.errors.get('phonenumber')"></strong>
                    </span>
                </div>
            </div>
            <div class="form-group" :class="{'has-error': form.errors.has('phonetype_id')}">
                <label for="phonetype" class="col-md-4 control-label">Phone Type:</label>

                <div class="col-md-6">
                    <select id="phonetype" class="form-control" name="phonetype_id" v-model="form.phonetype_id" @change="form.errors.clear('phonetype_id')">
                        <option v-for="option in select" :value="option.id" v-text="option.phonetype"></option>
                    </select>
                    <span class="help-block" v-if="form.errors.has('phonetype_id')">
                        <strong v-text="form.errors.get('phonetype_id')"></strong>
                    </span>
                </div>
            </div>

            <div class="form-group" :class="{'has-error': form.errors.has('email')}">
                <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                <div class="col-md-6">
                    <input id="email" type="email" class="form-control" name="email" v-model="form.email">
                    <span class="help-block" v-if="form.errors.has('email')">
                        <strong v-text="form.errors.get('email')"></strong>
                    </span>
                </div>
            </div>

            <div class="form-group" :class="{'has-error': form.errors.has('bday')}">
                <label for="bday" class="col-md-4 control-label">Birthday</label>

                <div class="col-md-6">
                    <input id="bday" type="date" class="form-control" name="bday" v-model="form.bday">
                    <span class="help-block" v-if="form.errors.has('bday')">
                        <strong v-text="form.errors.get('bday')"></strong>
                    </span>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <input type="submit" class="btn btn-primary pull-right">
                </div>
            </div>
        </form>
    </div>
</template>

<script>
    import Form from '../general/Form';
    export default {
        data: function () {
            return {
                form: new Form({
                    contactname: 'Enter a name',
                    phonenumber: 'Enter a phone number',
                    phonetype_id: null,
                    email:'Enter an email',
                    bday: moment().format('YYYY-MM-DD')
                }),
                select: {}
            }
        },
        created: function(){
            var self = this;
            axios.get('/contacts/create').then(function (response) {
                self.select = response.data;
            });
        },
    }
</script>
