@extends('default')

@section('otherCss')
<style type="text/css" media="screen">
#swup {
    /* Background image */
    background-image: url('images/common/CV_Construction12.jpg');
    /* Center the background image */
    background-position: center;
    /* Scale and zoom in the image */
    background-size: cover;
    /* Add position: relative to enable absolutely positioned elements inside the image (place text) */
    position: relative;
    /* Add a white text color to all elements inside the .bgimg container */
    color: white;
    /* Add a font */
    // font-family: "Courier New", Courier, monospace;
    /* Set the font-size to 25 pixels */
    font-size: 25px;
  }
</style>
@endsection

@section('content')

<div class="middle">
  <h1>*** (°-°) *** C'est pour bientôt *** \°~°/ ***</h1>
  <hr>
  <div id="vuejs">
    <time-rest-counter></time-rest-counter>
  </div>
</div>
<div class="bottomleft">
  <p>Cette page est en construction pour le moment</p>
</div>

@endsection
