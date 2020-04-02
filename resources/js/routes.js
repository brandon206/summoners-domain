import Home from './components/Home';
import Champions from './components/Champions';
import SoloChampion from './components/SoloChampion';
import Items from './components/Items';

import VueRouter from 'vue-router';

const routes = [
    {
        path: '/',
        component: Home,
        name: 'home',
    },
    {
        path: '/champions',
        component: Champions,
        name: 'champions',
    },
    {
        path: '/champions/:id',
        component: SoloChampion,
        name: 'champions.id',
    },
    {
        path: '/items',
        component: Items,
        name: 'items',
    },
];

const router = new VueRouter({
    routes,
    mode: 'history',
});

export default router;

