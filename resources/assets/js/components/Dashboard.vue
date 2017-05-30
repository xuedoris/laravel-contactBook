<template>
    <div class="panel-body">
        <h2>Newly Added Contacts</h2>
        <div id="contacts-wraper">
            <ul class="list-group">
                <slot></slot>
            </ul>
        </div>
    </div>
</template>

<script>
    export default {
        created: function(){
            var self = this;
            axios.get('/home').then(function (response) {

            });
        }
    }
</script>