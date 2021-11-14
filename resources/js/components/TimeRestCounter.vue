<template>
  <p ref="time"></p>
</template>

<script>
export default {

  data () {
    return {
      countDownDate: new Date("Jan 5, 2022 15:37:25").getTime(),
      countdownfunction: null,
    }
  },

  methods: {
    DisplayTime(distance) {
      var now = new Date().getTime();

      // Find the distance between now an the count down date
      distance = this.countDownDate - now;

      // Time calculations for days, hours, minutes and seconds
      var days = Math.floor(distance / (1000 * 60 * 60 * 24));
      var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));

      // Output the result in an element with id="demo"
      //this.$refs.time.innerHTML = days + " jours " + hours + " heures " + minutes + " minutes ";
      this.$refs.time.innerHTML = "Sortie prévue dans " + days + " jours ";      
    },
  },

  mounted() {
    this.DisplayTime(0);

    this.countdownfunction = setInterval(() => {
      var distance = 0;
      this.DisplayTime(distance);

      // If the count down is over, write some text
      if (distance < 0) {
        clearInterval(this.countdownfunction);
        this.$refs.time.innerHTML = "EXPIRED";
      }
    }, 10000);
  },

  destroyed() {
    clearInterval(this.countdownfunction);
  }
}
</script>
