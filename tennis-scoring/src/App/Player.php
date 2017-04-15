<?php


namespace App;


class Player {

    private $name;
    private $points;


    function __construct($name, $points)
    {
        $this->name = $name;
        $this->points = $points;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getPoints()
    {
        return $this->points;
    }

    public function earnPoints($points)
    {
        $this->points = $points;
    }


}