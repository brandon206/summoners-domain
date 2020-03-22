import Home from './components/Home';
import VueRouter from 'vue-router';

const routes = [
    {
        path: "/",
        component: Home,
    },
];

const router = new VueRouter({
    routes,
    mode: 'history',
});

export default router;

