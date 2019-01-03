import './bootstrap';

import router from './routes';
import App from './App';

export const bus = new Vue();

const app = new Vue({
    el: '#app',
    router,
    components:{App},
});
