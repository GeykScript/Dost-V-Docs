// resources/js/app.js

import './bootstrap';
import './datetime';
import 'flowbite';

import Cropper from 'cropperjs';
import 'cropperjs/dist/cropper.css';

import ApexCharts from 'apexcharts';


import './components/line-graph.js';
import './components/sidebar.js';
import './components/cropping.js';


window.Cropper = Cropper;
window.ApexCharts = ApexCharts;



