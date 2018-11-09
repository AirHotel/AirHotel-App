<?php
/**
 * This file is a part of AirHotel-App
 *
 * RoomRepository.php
 *
 * @author      Vincent CLAVEAU <vinc.claveau@gmail.com>
 * @copyright   2018 Vincent CLAVEAU
 * @date        06/11/2018
 */

namespace App\Repository;

use App\Entity\Room;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\DBAL\DBALException;

class RoomRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Room::class);

    }

    public function getAvailableRoomsForDates($da_arrival, $da_departure)
    {
        $da_arrival = date_create($da_arrival);
        $da_departure = date_create($da_departure);

        $sql = "SELECT room.id
                FROM room,booking
                WHERE room.id = booking.room_id
                AND booking.date_arrival NOT BETWEEN $da_arrival AND $da_departure
                AND booking.date_departure NOT BETWEEN $da_arrival AND $da_departure
                AND $da_arrival NOT BETWEEN booking.date_arrival AND booking.date_departure";

        $em = $this->getEntityManager();
        $stmt = $em->getConnection()->prepare($sql);

        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getAvailableRoomsForDatesByRoomType($da_arrival, $da_departure, $roomType)
    {
        $da_arrival = date_create($da_arrival);
        $da_departure = date_create($da_departure);

        $sql = "SELECT room.id
                FROM room,booking
                WHERE room.id = booking.room_id
                AND room.type = $roomType
                AND booking.date_arrival NOT BETWEEN $da_arrival AND $da_departure
                AND booking.date_departure NOT BETWEEN $da_arrival AND $da_departure
                AND $da_arrival NOT BETWEEN booking.date_arrival AND booking.date_departure";

        $em = $this->getEntityManager();
        $stmt = $em->getConnection()->prepare($sql);

        $stmt->execute();
        return $stmt->fetchAll();
    }
}