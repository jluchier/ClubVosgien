<?php

namespace App\Traits;

use Carbon\Carbon;


trait dateManager {

  private function dateFormat($date){
    $date = new Carbon($date);
    $date->locale();
    $date = $date->isoFormat("dddd Do MMMM YYYY");
    return $date;
  }
}
