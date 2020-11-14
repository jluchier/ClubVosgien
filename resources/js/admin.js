import Swup from 'swup';
import SwupScrollPlugin from '@swup/scroll-plugin';

const swup = new Swup({
    containers: ['#nav', '#swup'],
    plugins: [
        new SwupScrollPlugin({
            animateScroll: true
        }),
    ],
});

import Vue from 'vue';
import ImageUpload from "./components/ImageUploadManager";
import SingleImage from "./components/SingleImageUpload";

import axios from "axios";

Vue.prototype.$axios = axios;

let app;

function mount() {
	app = new Vue({
		el: '#vuejs',
		components: {ImageUpload, SingleImage}
	});
}

function unmount(){
	app.$destroy();
}

mount();

swup.on("contentReplaced", mount);
swup.on("willReplaceContent", unmount);