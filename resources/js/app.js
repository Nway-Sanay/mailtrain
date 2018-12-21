import './bootstrap';

import router from './routes';
import App from './App';

const app = new Vue({
    el: '#app',
    router,
    components:{App},
});
