require('./bootstrap');

import { createApp } from 'vue';
import router from './routes';
import Navbar from './component/bars/Navbar';
import Sidebar from './component/bars/Sidebar';

const app = createApp({});

app.component('navbar', Navbar)
app.component('Sidebar', Sidebar)

app.use(router);
app.mount('#app');