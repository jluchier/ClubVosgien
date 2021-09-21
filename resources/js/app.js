import Swup from 'swup';
import SwupScrollPlugin from '@swup/scroll-plugin';
import Vue from 'vue';
import { LMap, LTileLayer, LMarker, LTooltip } from 'vue2-leaflet';
import 'leaflet/dist/leaflet.css';
import { latLng, icon } from "leaflet";

import CKEditor from '@ckeditor/ckeditor5-vue2';
import ImageUpload from "./components/ImageUploadManager";
import SingleImage from "./components/SingleImageUpload";
import TimeRestCounter from "./components/TimeRestCounter";
import CvEditor from "./components/CvEditor";
import Map from "./components/Map.vue";

import axios from "axios";

const swup = new Swup({
  containers: ['#nav', '#swup'],
  cache: false,
  plugins: [
    new SwupScrollPlugin({
      animateScroll: true
    }),
  ],
});

Vue.prototype.$axios = axios;
Vue.use( CKEditor );

let app;
let editor;
let map;
let leaflet;

function mount() {
    app = new Vue({
        el: '#vuejs',
        components: {ImageUpload, SingleImage, TimeRestCounter}
    });

    editor = new Vue({
        el: '#vueditor',
        components: {CvEditor}
    });
    map = new Vue({
      el: '#map',
      template: '<Map/>',
      components: { Map },
    });

    leaflet = new Vue({
        el: '#leaflet',
        components: {LMap, LTileLayer, LMarker, LTooltip}
    });

}

function unmount(){
    app.$destroy();
    editor.$destroy();
    leaflet.$destroy();
}

mount();

swup.on("contentReplaced", mount);
swup.on("willReplaceContent", unmount);
