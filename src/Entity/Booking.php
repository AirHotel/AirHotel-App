<?php
/**
 * Created by PhpStorm.
 * User: Romaric
 * Date: 07/11/2018
 * Time: 12:36
 */

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 * @ORM\Table(name="booking")
 */
class Booking
{
    /**
     * @var string
     *
     * @ORM\Id()
     * @ORM\Column(type="string")
     */
    private $ticket_number;

    /**
     * @var room
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Room")
     * @ORM\JoinColumn(nullable=false)
     */
    private $room;

    /**
     * @ORM\Column(type="date")
     */
    private $date_arrival;

    /**
     * @ORM\Column(type="date")
     */
    private $date_departure;

    /**
     * @return string
     */
    public function getTicketNumber(): string
    {
        return $this->ticket_number;
    }

    /**
     * @param string $ticket_number
     */
    public function setTicketNumber(string $ticket_number): void
    {
        $this->ticket_number = $ticket_number;
    }

    /**
     * @return room
     */
    public function getRoom(): room
    {
        return $this->room;
    }

    /**
     * @param room $room
     */
    public function setRoom(room $room): void
    {
        $this->room = $room;
    }


    /**
     * @return mixed
     */
    public function getDateArrival()
    {
        return $this->date_arrival;
    }

    /**
     * @param mixed $date_arrival
     */
    public function setDateArrival($date_arrival): void
    {
        $this->date_arrival = $date_arrival;
    }

    /**
     * @return mixed
     */
    public function getDateDeparture()
    {
        return $this->date_departure;
    }

    /**
     * @param mixed $date_departure
     */
    public function setDateDeparture($date_departure): void
    {
        $this->date_departure = $date_departure;
    }


}