import './bootstrap';

import * as bootstrap from 'bootstrap';
window.bootstrap = bootstrap;

import CovidMap from './CovidMap';

document.addEventListener('DOMContentLoaded', function() {
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    })

    const covidMap = new CovidMap('sigma-container', 'map-data');
    covidMap.init();
});
