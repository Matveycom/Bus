<?php

class BusTraffic {

  public function move() {
    $stations = ['Kiev', 'Paris', 'London', 'Berlin', 'Praha'];
    $directions = ['forward', 'back'];
    $direction = !empty($_SESSION['direction']) ? $_SESSION['direction'] : $directions[0];
    $current_station = !empty($_SESSION['station']) ? $_SESSION['station'] : $stations[0];
    $current_station_key = array_search($current_station, $stations);
    $count_stations = count($stations) - 1;

    if ($current_station_key != $count_stations && $direction == $directions[0]) {
      $_SESSION['station'] = $stations[$current_station_key + 1];
    }
    elseif ($current_station_key == $count_stations) {
      $_SESSION['station'] = $stations[$current_station_key - 1];
      $direction = $_SESSION['direction'] = $directions[1];
    }
    elseif ($current_station != $stations[0] && $direction == $directions[1]) {
      $_SESSION['station'] = $stations[$current_station_key - 1];
    }
    elseif ($current_station == $stations[0]) {
      $_SESSION['station'] = $stations[$current_station_key + 1];
      $direction = $_SESSION['direction'] = $directions[0];
    }

    return $direction;
  }

}
