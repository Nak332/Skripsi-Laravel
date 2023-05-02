import './bootstrap';
import { createApp } from 'vue';
import HelloVue from './components/HelloVue.vue';
import home from './components/home.vue';
import axios from 'axios'

createApp({
    components: {
        HelloVue,
    }
}).mount('#app');


createApp({
    components: {
        home,
    }
}).mount('#home');

