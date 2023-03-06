import Swup from "swup";
import SwupScrollPlugin from "@swup/scroll-plugin";
import Vue from "vue";
import { LMap, LTileLayer, LMarker, LTooltip } from "vue2-leaflet";
import LGpx from "vue2-leaflet-gpx";

import CKEditor from "@ckeditor/ckeditor5-vue2";
import ImageUpload from "./components/ImageUploadManager";
import SingleImage from "./components/SingleImageUpload";
import TimeRestCounter from "./components/TimeRestCounter";
import CvEditor from "./components/CvEditor";
import MapLinqueny from "./components/MapLinqueny.vue";

import axios from "axios";

const swup = new Swup({
    containers: ["#nav", "#swup"],
    cache: false,
    plugins: [
        new SwupScrollPlugin({
            animateScroll: true,
        }),
    ],
});

Vue.prototype.$axios = axios;
Vue.use(CKEditor);

let app;
let editor;
let mapLinqueny;
let leaflet;

function mount() {
    app = new Vue({
        el: "#vuejs",
        components: { ImageUpload, SingleImage, TimeRestCounter },
    });

    editor = new Vue({
        el: "#vueditor",
        components: { CvEditor },
    });
    mapLinqueny = new Vue({
        el: "#mapLinqueny",
        template: "<mapLinqueny/>",
        components: { MapLinqueny },
    });

    leaflet = new Vue({
        el: "#leaflet",
        components: { LMap, LTileLayer, LMarker, LTooltip, LGpx },
    });
    var pdfObjectDiv = document.getElementById("example1");
    if (pdfObjectDiv != null) {
        var path = pdfObjectDiv.getAttribute("data-path");
        PDFObject.embed(path, "#example1", {
            height: "50em",
        });
    }
}

function unmount() {
    app.$destroy();
    editor.$destroy();
    leaflet.$destroy();
}

mount();

swup.on("contentReplaced", mount);
swup.on("willReplaceContent", unmount);
