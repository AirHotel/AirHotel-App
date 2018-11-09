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
        foreach ($this->getData() as [$id])
        {
            $ticket = new TicketsValides();
            $ticket->setId($id);

            $manager->persist($ticket);
        }

        $manager->flush();
    }

    private function getData(): array
    {
        return [
            ['71b7b09d-f94c-498a-9eb8-e300f89c9c48'],
            ['77e05085-a706-40e4-9b90-705210ce1f2e'],
            ['dbfe789e-3fe6-4b3d-8b88-d4f7744927a8'],
            ['8b6038cd-f321-488d-8862-ce53487d976c'],
            ['1c9d7e56-5bac-4e65-8911-f8b4cc9d8e9f'],
            ['4aff41a3-3efb-4410-bab1-91c045c6cb29'],
            ['a9b82693-46d9-4487-874a-aa34a2ad462f'],
            ['7d2b796b-205f-4a26-a51b-6ffc85941d43'],
            ['77487568-fec4-4c41-9c1c-9dd2372d9608'],
            ['d8c68a8d-4276-4a6d-bb80-c98aa1623412'],
        ];
    }
}