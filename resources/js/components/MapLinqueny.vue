<template>
<div>
<button @click="showLinqueny = !showLinqueny">
  Chalet de Linqueny
</button>
<l-map
    style="height: 500px"
    :zoom="zoom"
    :center="center"
    @update:center="centerUpdate"
    @update:zoom="zoomUpdate"
>
    <l-tile-layer
      :url="url"
      :attribution="attribution"
    >
    </l-tile-layer>
    <l-marker :lat-lng="departureArrival">
      <l-tooltip :options="{ permanent: true, interactive: false }" >
            <div>
                Départ/Arrivée
            </div>
          </l-tooltip>
    </l-marker>
    <l-marker
      :lat-lng="chaletLinqueny"
      v-if="showLinqueny"
    >
      <l-tooltip :options="{ permanent: true, interactive: false }" >
            <div>
                Chalet de Linqueny
            </div>
          </l-tooltip>
    </l-marker>
    // <l-marker
    //   :key="marker.id"
    //   :lat-lng="marker.coordinates"
    //   v-for="marker in item.markers"
    //   :visible="marker.visible"
    // />

  </l-map>
</div>
</template>

<script>
import { LMap, LTileLayer, LMarker, LTooltip } from 'vue2-leaflet';
import { latLng, icon } from "leaflet";

export default {
  components: {
    LMap,
    LTileLayer,
    LMarker,
    LTooltip
  },
  data () {
    return {
      url: 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
      attribution:
        '&copy; <a target="_blank" href="http://osm.org/copyright">OpenStreetMap</a> contributors',
      zoom: 12,
      center: latLng(47.92666, 6.66326),
      departureArrival: latLng(47.92666, 6.66326),
      chaletLinqueny: latLng(47.88827,6.70045),
      showLinqueny: true
      // markers:[
      //   {id: 1, coordinates: latLng(47.88835,6.70055)},
      // ],
    };
  },
  methods: {
    zoomUpdate(zoom) {
      this.currentZoom = zoom;
    },
    centerUpdate(center) {
      this.currentCenter = center;
    },
    showLongText() {
      this.showParagraph = !this.showParagraph;
    },
    innerClick() {
      alert("Click!");
    }
  }
};
</script>
