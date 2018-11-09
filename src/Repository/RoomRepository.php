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
use Symfony\Component\Validator\Constraints\Date;

class RoomRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Room::class);

    }

    public function getAvailableRoomsForDates($da_arrival, $da_departure)
    {
        $rooms = [];

        $qb = $this->createQueryBuilder('q');

        $qb->from('room', 'r')
            ->join('booking', 'b')
            ->where($da_arrival.date_format('').' < b.date_arrival')
            ->orWhere($da_arrival.' > b.date_departure')
            ->andWhere($da_departure.' < b.date_departure')
            ->orWhere($da_departure.' > b.date_arrival');

        dump($qb);

        return $qb->execute();

        return $rooms;
    }
}