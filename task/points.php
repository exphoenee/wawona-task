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


?>