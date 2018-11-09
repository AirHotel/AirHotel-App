<?php
/**
 * Created by PhpStorm.
 * User: Romaric
 * Date: 08/11/2018
 * Time: 11:50
 */

namespace App\DataFixtures;

use App\Entity\TicketsValides;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class TicketsValidesFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        foreach ($this->getData() as [$id]) {
            $ticket = new TicketsValides();
            $ticket->setId($id);

            $manager->persist($ticket);
        }

        $manager->flush();
    }

    private function getData(): array
    {
        return [
            ['zbmzih'],
            ['encfkc'],
            ['bvffwk'],
            ['dilrow'],
            ['yqcvvc'],
            ['lcwjuv'],
            ['phlszy'],
            ['eotvnj'],
            ['aoirol'],
            ['jptqov']
        ];
    }
}