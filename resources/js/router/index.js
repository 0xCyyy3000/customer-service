import { createRouter, createWebHistory } from "vue-router";
import Dashboard from '../components/Dashboard.vue'
import Orders from '../components/Orders.vue'

const routes = [
    {
        path: '/dashboard',
        name: 'home',
        component: Dashboard
    },
    {
        path: '/orders',
        name: 'orders',
        component: Orders
    }
];

const router = createRouter({
    history: createWebHistory(import.meta.env.base_URL),
    routes
});

export default router;