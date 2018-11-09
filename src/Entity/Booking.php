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
    private $ticketNumber;

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
    private $dateArrival;

    /**
     * @ORM\Column(type="date")
     */
    private $dateDeparture;

    /**
     * @return string
     */
    public function getTicketNumber(): string
    {
        return $this->ticketNumber;
    }

    /**
     * @param string $ticket_number
     */
    public function setTicketNumber(string $ticketNumber): void
    {
        $this->ticketNumber = $ticketNumber;
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
        return $this->dateArrival;
    }

    /**
     * @param mixed $date_arrival
     */
    public function setDateArrival($dateArrival): void
    {
        $this->dateArrival = $dateArrival;
    }

    /**
     * @return mixed
     */
    public function getDateDeparture()
    {
        return $this->dateDeparture;
    }

    /**
     * @param mixed $date_departure
     */
    public function setDateDeparture($dateDeparture): void
    {
        $this->dateDeparture = $dateDeparture;
    }


}