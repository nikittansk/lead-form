import HomePage from '@/pages/HomePage.vue';
import LeadsPage from '@/pages/LeadsPage.vue';

const routes = [
    {
        path: '/',
        component: HomePage
    },
    {
        path: '/leads',
        component: LeadsPage
    }
];

export default routes;