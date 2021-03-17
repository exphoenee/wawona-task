<?php

interface Coordinate_Interface
{
    /** @return float the latitude of the point */
    public function getLatitude();

    /** @return float the longitude of the point */
    public function getLongitude();

    /** @return int unix epoch */
    public function getTimestamp();

}

class Coordinate implements Coordinate_Interface
{
    protected $latitude;
    protected $longitude;
    protected $timestamp;

    public function __construct($latitude, $longitude, $timestamp)
    {
        $this->latitude  = $latitude;
        $this->longitude = $longitude;
        $this->timestamp = $timestamp;
    }

    public function getLatitude()
    {
        return $this->latitude;
    }

    public function getLongitude()
    {
        return $this->longitude;
    }

    public function getTimestamp()
    {
        return $this->timestamp;
    }

}

abstract class Journey_Abstract
{
    protected $coordinates = array();

    /**
     * Removes the potentially erroneous elements from $coordinates array
     *
     * @return $this
     */
    abstract public function clean();

    /**
     * Returns the array of Coordinate objects ($coordinates) which represents the journey
     *
     * @return array
     */
    public function get()
    {
        return $this->coordinates;
    }

    /**
     * Removes all the coorditantes from $coordinates property
     *
     * @return $this
     */
    public function eraseCoordinates()
    {
        $this->coordinates = array();
        return $this;
    }

    /**
     * Add one Coordinate instance to $coordinates property
     *
     * @param Coordinate_Interface $coordinate
     * @return $this
     */
    public function addCoordinate(Coordinate_Interface $coordinate)
    {
        $this->coordinates[] = $coordinate;
        return $this;
    }

}

class Journey extends Journey_Abstract {

    protected $coordinates = array();
    protected $velocityLimit = 250;
    protected $displacementLimit = 250;
    protected $degMeterRate = 0.001/111;

    public function __construct() {
    }

    public function clean() {
      foreach ($this->coordinates as $index => $coordinate) {

        if ($index === 0) {
          // set the initial values
          $prevLatitude = $coordinate->getLatitude();
          $prevLongitude = $coordinate->getLongitude();
          $prevTimeStamp =  $coordinate->getTimestamp();
        } else {
          // set the new current cvalues
          $CurrentLatitude = $coordinate->getLatitude();
          $CurrentLongitude = $coordinate->getLongitude();
          $CurrentTimeStamp =  $coordinate->getTimestamp();

          // calculate displacement
          $displacement = pow(
              pow(($CurrentLatitude-$prevLatitude), 2)+
              pow(($CurrentLongitude-$prevLongitude), 2),
            0.5)
            /$this->degMeterRate; //m

          // calculate sampling time
          $timeInc = $CurrentTimeStamp-$prevTimeStamp; //s
          $velocity = $displacement/$timeInc*3.6; // km/h

          // set the new prev values
          $prevLatitude = $coordinate->getLatitude();
          $prevLongitude = $coordinate->getLongitude();
          $prevTimeStamp =  $coordinate->getTimestamp();

          // remove point is the conditions are true
          if (
            ($displacement > $this->displacementLimit) ||
            ($velocity > $this->velocityLimit)) {
            var_dump($displacement); var_dump($timeInc); echo '<br>';
            $this->removePoint($index);
          }


        }
      }
      var_dump($this->coordinates); echo '<br>';

      return $this;
    }

    public function get()
    {
        return $this->coordinates;
    }

    public function removePoint($index)
    {
        unset($this->coordinates[$index]);
        return $this;
    }

    public function eraseCoordinates()
    {
        $this->coordinates = array();
        return $this;
    }

    public function addCoordinate(Coordinate_Interface $coordinate)
    {
        $this->coordinates[] = $coordinate;
        return $this;
    }

}

?>