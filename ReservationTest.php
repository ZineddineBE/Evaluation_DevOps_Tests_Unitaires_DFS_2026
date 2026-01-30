<?php

namespace SimpleProject\UnitTests;

require_once 'Reservation.php'; 

use PHPUnit\Framework\TestCase;
use EvaluationSampleCode\Reservation;
use EvaluationSampleCode\User;

final class ReservationTest extends TestCase
{
    private Reservation $reservation;
    private User $madeBy;

    protected function setUp(): void
    {   
        $this->madeBy = new User("Zineddine");

        $this->admin = new User("Admin");
        $this->admin->isAdmin = true;
        
        $this->reservation = new Reservation($this->madeBy);
    }

    public function testCanBeCancelledBy_WithAdmin_ShouldReturnTrue(): void
    {
        $result = $this->reservation->canBeCancelledBy($this->admin);

        $this->assertTrue($result);
    }

    public function testCanBeCancelledBy_WithUserWhoReserved_ShouldReturnTrue(): void
    {
        $result = $this->reservation->canBeCancelledBy($this->madeBy);

        $this->assertTrue($result);
    }

    public function testCanBeCancelledBy_WithoutUserWhoReserved_ShouldReturnFalse(): void
    {
        $otherUser = new User("Monsieur X");
        $result = $this->reservation->canBeCancelledBy($otherUser);

        $this->assertFalse($result);
    }
}