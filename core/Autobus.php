<?php

class Autobus {

  public $max_passangers = 40;

  public function getAutobus() {
    $count_passengers = $this->getPassengers();

    // Get buss direction.
    require_once 'BusTraffic.php';
    $bus_trafic = new BusTraffic;
    $direction = $bus_trafic->move();

    return array($count_passengers, $direction);
  }

  // Get count of passengers.
  public function getPassengers() {
    if (empty($_SESSION['passengers'])) {
      $_SESSION['passengers'] = 0;
    }

    $passengers = $_SESSION['passengers'];
    $in_passengers = $this->randomGeneratePass();
    $out_passengers = !empty($passengers) ? $this->randomGeneratePass() : 0;
    $count_passengers = $passengers + $in_passengers - $out_passengers;

    if ($count_passengers > $this->max_passangers) {
      $count_passengers = $this->max_passangers;
    }
    elseif ($count_passengers < 0) {
      $count_passengers = 0;
    }

    return $count_passengers;
  }

  public function randomGeneratePass() {
    return rand(0, 10);
  }

}
