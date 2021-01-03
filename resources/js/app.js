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
