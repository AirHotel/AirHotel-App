<?php
/**
 * This file is a part of AirHotel-App
 *
 * RoomFixtures.php
 *
 * @author      Vincent CLAVEAU <vinc.claveau@gmail.com>
 * @copyright   2018 Vincent CLAVEAU
 * @date        06/11/2018
 */

namespace App\DataFixtures;

use App\Entity\Room;
use App\Entity\RoomType;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class RoomFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $rtRepository = $manager->getRepository(RoomType::class);

        foreach ($this->getData() as [$rt, $state, $smokingAllowed, $animalAllowed, $handicappedAccess])
        {
            $room = new Room();
            $room->setRoomType($rtRepository->find($rt));
            $room->setState($state);
            $room->setSmokingAllowed($smokingAllowed);
            $room->setAnimalAllowed($animalAllowed);
            $room->setHandicappedAccess($handicappedAccess);

            $manager->persist($room);
        }

        $manager->flush();
    }

    private function getData(): array
    {
        return [
            ['Single', true, true, true, false],
            ['Single', false, false, false, false],
            ['Single', false, true, true, false],
            ['Single', false, true, false, true],
            ['Single', true, true, false, false],
            ['Single', true, true, true, true],
            ['Single', true, false, true, false],
            ['Single', true, true, false, true],
            ['Single', true, true, false, false],
            ['Single', true, true, true, false],
            ['Single', true, true, true, true],
            ['Single', true, false, true, false],
            ['Single', true, true, false, true],
            ['Single', true, true, false, false],
            ['Single', true, true, true, false],
            ['Single', true, true, true, false],
            ['Single', false, false, false, false],
            ['Single', false, true, true, false],
            ['Single', false, true, false, true],
            ['Single', true, true, false, false],
            ['Single', true, true, true, true],
            ['Single', true, false, true, false],
            ['Double', false, false, false, false],
            ['Double', false, true, true, true],
            ['Double', false, false, false, false],
            ['Double', false, true, true, true],
            ['Double', true, false, false, false],
            ['Double', true, true, true, true],
            ['Double', true, false, false, false],
            ['Double', true, true, true, true],
            ['Double', true, false, false, false],
            ['Double', true, true, true, true],
            ['Double', true, false, false, false],
            ['Double', false, true, true, true],
            ['Double', true, true, false, false],
            ['Double', false, false, false, false],
            ['Double', false, true, true, true],
            ['Double', false, false, false, false],
            ['Double', false, true, true, true],
            ['Double', true, false, false, false],
            ['Double', true, true, true, true],
            ['Double', true, false, false, false],
            ['Double', true, true, true, true],
            ['Double', true, false, false, false],
            ['Double', true, true, true, true],
            ['Double', true, false, false, false],
            ['Double', false, true, true, true],
            ['Double', true, true, false, false],
            ['Family', true, true, true, false],
            ['Family', true, false, false, false],
            ['Family', true, true, true, true],
            ['Family', false, false, true, true],
            ['Family', true, true, true, true],
            ['Family', true, true, true, false],
            ['Family', true, true, true, true],
            ['Family', true, false, true, true],
            ['Family', true, true, true, true],
            ['Family', false, true, true, true],
            ['Family', true, true, true, false],
            ['Family', true, true, true, false],
            ['Family', true, true, false, false],
            ['Family', true, true, false, true],
            ['Family', false, true, true, true],
            ['Family', true, true, true, false],
            ['Family', true, false, false, false],
            ['Family', true, true, true, true],
            ['Family', false, false, true, true],
            ['Family', true, true, true, true],
            ['Family', true, true, true, false],
            ['Family', true, true, true, true],
            ['Family', true, false, true, true],
            ['Family', true, true, true, true],
            ['Family', false, true, true, true],
            ['Family', true, true, true, false],
            ['Family', true, true, true, false],
            ['Family', true, true, false, false],
            ['Family', true, true, false, true],
            ['Family', false, true, true, true],
        ];
    }

    public function getDependencies()
    {
        return array(
            RoomTypeFixtures::class,
        );
    }
}