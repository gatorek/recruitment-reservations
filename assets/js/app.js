// any CSS you import will output into a single css file (app.css in this case)
import '../css/app.css';
import '../css/global.scss';

// Bootstrap
const $ = require('jquery');
global.$ = global.jQuery = $;
require('bootstrap');

// VueJS
import Vue from 'vue';
import moment from 'moment'
import Reservations from './components/Reservations'

Vue.filter('time', function(value) {
    if (value) {
        return moment(String(value)).format('YYYY-MM-DD HH:mm')
    }
});

$root = new Vue({
    el: '#content-main',
    components: {Reservations}
});

export default { $root };