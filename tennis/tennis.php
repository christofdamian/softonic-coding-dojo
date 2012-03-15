<?php

class Tennis {

    private $points = array();

    private $scoring = array( 0, 15, 30, 40 );

    private $winner;

    public $advantaged;

    public function __construct()
    {
        $this->points = array(
            1 => 0,
            2 => 0,
        );
    }

    public function givePoint( $player )
    {
        if( $this->winner ) return false;


        if( 40 == $this->getPoints(1) && 40 == $this->getPoints(2) )
        {

                if ($this->advantaged == $player ) {
                    $this->winner = $player;
                    return;
                } elseif ($this->advantaged ) {
                    $this->advantaged = null;
                }
                else $this->advantaged = $player;
        }
        else {

            $this->points[$player]++;

            if( $this->points[$player] >= count( $this->scoring) )
            {
                $this->winner = $player;
            }
        }

    }

    public function getPoints( $player )
    {
        return $this->scoring[ $this->points[$player] ];
    }

    public function getWinner ()
    {
        return $this->winner;
    }
}