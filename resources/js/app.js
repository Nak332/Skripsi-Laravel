import './bootstrap';
import { createApp } from 'vue';
import NavigationBar from './components/NavigationBar.vue';
import './../css/app.css'


// import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'
// import 'bootstrap/dist/css/bootstrap.css'
// import 'bootstrap-vue/dist/bootstrap-vue.css'
// import axios from 'axios'
// import home from './components/home.vue';

createApp({
    components: {
        NavigationBar
    }
}).mount('#navbar');



