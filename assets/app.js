/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.css';

// start the Stimulus application
import './bootstrap';

import Vue from 'vue';

import App from './vue/App';
import moment from 'moment';
import router from './vue/router';
import vuetify from './vue/plugins/vuetify';

Vue.filter('formatDate', function(value) {
  if (value) {
      return moment(String(value)).format('MM/DD/YYYY')
  }
});

new Vue({
  components: { App },
  template: "<App/>",
  router,
  vuetify
}).$mount("#app");
