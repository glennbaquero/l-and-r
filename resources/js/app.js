/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import Vue from 'vue';
import Vselect from 'vue-select';

// Set the components prop default to return our fresh components 
Vselect.props.components.default = () => ({
  OpenIndicator: {
    render: createElement => createElement('span', ''),
  },
});


import './bootstrap';

/**
 * Next, we'll setup some of Vue components that need to be global so that
 * they are always available. Then, we will be ready to create the
 * actual Vue instance and start up this JavaScript application.
 */

import './components';

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
  el: '#app',
});
