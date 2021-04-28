import Swup from 'swup';
import SwupScrollPlugin from '@swup/scroll-plugin';


const swup = new Swup({
    containers: ['#nav', '#swup'],
    cache: false,
    plugins: [
        new SwupScrollPlugin({
            animateScroll: true
        }),
    ],
});

import Vue from 'vue';
import CKEditor from '@ckeditor/ckeditor5-vue2';
import ImageUpload from "./components/ImageUploadManager";
import SingleImage from "./components/SingleImageUpload";
import TimeRestCounter from "./components/TimeRestCounter";
import CvEditor from "./components/CvEditor";

import axios from "axios";

Vue.prototype.$axios = axios;
Vue.use( CKEditor );

let app;
let editor;

function mount() {
    app = new Vue({
        el: '#vuejs',
        components: {ImageUpload, SingleImage, TimeRestCounter}
    });

    editor = new Vue({
        el: '#vueditor',
        components: {CvEditor}
    });
}

function unmount(){
    app.$destroy();
    editor.$destroy();
}

mount();

swup.on("contentReplaced", mount);
swup.on("willReplaceContent", unmount);

let mapVrille = L.map('mapVrilleId').setView([51.505, -0.09], 13);

L.tileLayer('//{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png', {
    attribution: 'donn&eacute;es &copy; <a href="//osm.org/copyright">OpenStreetMap</a>/ODbL - rendu <a href="//openstreetmap.fr">OSM France</a>',
    minZoom: 1,
    maxZoom: 20
}).addTo(mapVrille);
