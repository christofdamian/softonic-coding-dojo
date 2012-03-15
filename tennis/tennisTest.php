<?php

require_once 'tennis.php';

class TennisTest extends PHPUnit_Framework_TestCase {

    public function setUp() {

        $this->obj = new Tennis();
    }

    public function testPoint() {
        $this->assertNull($this->obj->givePoint(1));
    }

    public function testGetPoints() {

        $this->obj->givePoint(1);
        $this->assertEquals( 15, $this->obj->getPoints(1));
        $this->assertEquals( 0, $this->obj->getPoints(2));
    }

    public function testGet3Points() {

        $this->obj->givePoint(1);
        $this->obj->givePoint(1);
        $this->obj->givePoint(1);

        $this->assertEquals( 40, $this->obj->getPoints(1));
    }

    public function testGetWinner1() {

        $this->obj->givePoint(1);
        $this->obj->givePoint(1);
        $this->obj->givePoint(1);
        $this->obj->givePoint(1);

        $this->assertEquals( 1, $this->obj->getWinner());
    }

    public function testGetWinner2() {

        $this->obj->givePoint(2);
        $this->obj->givePoint(2);
        $this->obj->givePoint(2);
        $this->obj->givePoint(2);

        $this->assertEquals( 2, $this->obj->getWinner());
    }

    public function testGetNoWinner() {

        $this->obj->givePoint(1);
        $this->obj->givePoint(1);
        $this->obj->givePoint(1);

        $this->assertNull( $this->obj->getWinner() );
    }

    public function testGetNoWinnerBecauseAdvantage() {

        $this->obj->givePoint(1);
        $this->obj->givePoint(1);
        $this->obj->givePoint(1);
        $this->obj->givePoint(2);
        $this->obj->givePoint(2);
        $this->obj->givePoint(2);
        $this->obj->givePoint(2);

        $this->assertNull( $this->obj->getWinner() );
    }

    public function testGetNoWinnerAfter5hoursMatch() {

        $this->obj->givePoint(1);
        $this->obj->givePoint(1);
        $this->obj->givePoint(1);
        $this->obj->givePoint(2);
        $this->obj->givePoint(2);
        $this->obj->givePoint(2);

        $this->obj->givePoint(2);
        $this->obj->givePoint(1);
        $this->obj->givePoint(2);
        $this->obj->givePoint(1);

        $this->assertNull( $this->obj->getWinner() );
    }

    public function testGetWinner1After5hoursMatch() {

        $this->obj->givePoint(1);
        $this->obj->givePoint(1);
        $this->obj->givePoint(1);
        $this->obj->givePoint(2);
        $this->obj->givePoint(2);
        $this->obj->givePoint(2);

        $this->obj->givePoint(2);
        $this->obj->givePoint(1);
        $this->obj->givePoint(2);
        $this->obj->givePoint(1);

        $this->obj->givePoint(1);
        $this->obj->givePoint(1);

        $this->assertEquals( 1, $this->obj->getWinner() );
    }
}