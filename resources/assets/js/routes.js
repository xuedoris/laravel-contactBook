import VueRouter from 'vue-router';
let routes = [
    {
        path: '/',
        component: require('./components/Dashboard.vue')
    },
    {
        path: '/contacts/create',
        component: require('./components/Createcontact.vue'),
    },
    {
        path: '/contacts/:id',
        component: require('./components/Createcontact.vue'),
    },
    {
        path: '/contacts',
        component: require('./components/Allcontacts.vue')
    }
]
export default new VueRouter({
    routes,
    linkActiveClass: 'active'
});