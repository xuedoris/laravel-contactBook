import imageslider from './components/Imageslider.vue';
new Vue({
    el: '#app',
    data: {
        showNav: false
    },
    components: {
        'imageslider': imageslider
    }
})
