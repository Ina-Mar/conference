import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
const jQuery = require('jquery');
const owlCarousel = require('owl.carousel');


