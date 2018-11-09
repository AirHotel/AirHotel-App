<?php
/**
 * This file is a part of AirHotel-App
 *
 * TicketsValidesRepository.php
 *
 * @author      Vincent CLAVEAU <vinc.claveau@gmail.com>
 * @copyright   2018 Vincent CLAVEAU
 * @date        06/11/2018
 */

namespace App\Repository;

use App\Entity\TicketsValides;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

class TicketsValidesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TicketsValides::class);
    }

    public function isValid(string $ticket)
    {
        return ($this->find($ticket)) ? true : false;
    }
}