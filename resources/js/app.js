import './bootstrap';
import './../css/app.css'
import Alpine from 'alpinejs'
import focus from '@alpinejs/focus'
import flatpickr from "flatpickr";
import 'flatpickr/dist/flatpickr.min.css'
import collapse from '@alpinejs/collapse'



window.Alpine = Alpine
import './../../vendor/power-components/livewire-powergrid/dist/powergrid'
import './../../vendor/power-components/livewire-powergrid/dist/powergrid.css'

Alpine.plugin(collapse)  
Alpine.plugin(focus)
Alpine.start()




// import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'
// import 'bootstrap/dist/css/bootstrap.css'
// import 'bootstrap-vue/dist/bootstrap-vue.css'
// import axios from 'axios'
// import home from './components/home.vue';
