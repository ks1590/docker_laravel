import './bootstrap'
import { createApp } from 'vue'
import Sample from './components/Sample'

Vue.component('sample-component',require('./components/Sample.vue').default);

const app = createApp({
    el: '#app',
    components: {
        Sample
    }
});
