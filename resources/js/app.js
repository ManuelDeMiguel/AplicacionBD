import './bootstrap';

import Alpine from 'alpinejs';
import {createApp} from 'vue/dist/vue.esm-bundler';
// import cabecera from './vue-components/cabecera';
import tabla from './componentes/tabla.vue';

createApp({
    components: {
        // cabecera,
        tabla,
    }
}).mount("#app");
