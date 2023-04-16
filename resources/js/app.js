import './bootstrap';

import Alpine from 'alpinejs';

import { createApp } from 'vue/dist/vue.esm-bundler.js'
import App from './app/App.vue'

window.Alpine = Alpine;
Alpine.start();

createApp(App).mount('#app')
