import './bootstrap';
import humanDate from './directives/humanDate.js';

document.addEventListener('alpine:init', () => {
    Alpine.directive('human-date', humanDate)
});

