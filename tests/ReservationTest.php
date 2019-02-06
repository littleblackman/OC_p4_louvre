<?php

use App\Entity\Reservation;
use PHPUnit\Framework\TestCase;

class ReservationTest extends TestCase
{
    /**
     * verify that a correct mail will be accepted
     */
    public function testCorrectMailAccepted()
    {
        $mail = "fred.malard@wanadoo.fr";
        $reservation = new Reservation();
        $reservation->setMail($mail);
        $this->assertEquals($mail, $reservation->getMail());
    }

    /**
     * verify that an incorrect mail will be refused
     *
     * @return void
     */
    public function testIncorrectMailRefused()
    {
        $mail = "fred.fr";
        $reservation = new Reservation();
        $reservation->setMail($mail);
        $this->assertNotEquals($mail, $reservation->getMail());
    }
}