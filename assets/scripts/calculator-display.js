import {createApp} from 'vue';
import LimitCalculator from './components/calculator.vue';

document.addEventListener('DOMContentLoaded', () => {
  console.log('hi');
  const element = document.querySelector('limit-calculator');

  if (element) {
    createApp(LimitCalculator, {}).mount(element);
  }
});
