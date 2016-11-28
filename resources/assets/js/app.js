
/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
const Masonry = require('masonry-layout');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example', require('./components/Example.vue'));

const app = new Vue({
    el: '#app'
});

const grid = document.querySelector('.grid');
if (grid) {
  const msnry = new Masonry(grid, {
    itemSelector: '.grid-item',
    percentPosition: true
  });
}

let DisplayMode = {
  mode: localStorage.getItem('mode') || 'Day Mode'
};


DisplayMode.listenToggle = function() {

  var dayNight = document.querySelector('.day-night');

  dayNight.addEventListener('click', function(e) {
    e.preventDefault();
    if (this.mode === 'Day Mode') {
      this.mode = 'Night Mode';
    } else {
      this.mode = 'Day Mode';
    }
    localStorage.setItem('mode', this.mode);
    this.updateDisplay();
  }.bind(this));
}
DisplayMode.listenToggle();

DisplayMode.updateDisplay = function() {

  var dayNight = document.querySelector('.day-night');
  dayNight.innerHTML = this.mode;

  var body = document.querySelector('body');
  if (this.mode === 'Day Mode') {
    body.classList.remove('night');
    body.classList.add('day');
  } else {
    body.classList.remove('day');
    body.classList.add('night');
  }
}
DisplayMode.updateDisplay();
