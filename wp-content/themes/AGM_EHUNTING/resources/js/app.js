window.$ = require('jquery');
require('slick-carousel');
require('./io');
require('./main');
require('./initialize');
require('materialize-css');

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';