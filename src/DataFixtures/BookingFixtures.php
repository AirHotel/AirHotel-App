<?php
/**
 * Created by PhpStorm.
 * User: Romaric
 * Date: 07/11/2018
 * Time: 14:14
 */

namespace App\DataFixtures;


use App\Entity\Booking;
use App\Entity\Room;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class BookingFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $roomRepository = $manager->getRepository(Room::class);
        $rooms = $roomRepository->findAll();

        foreach ($this->getData() as $i => [$ticket_number,$date_arrival,$date_departure])
        {
            $booking = new Booking();
            $booking->setTicketNumber($ticket_number);
            $booking->setDateArrival($date_arrival);
            $booking->setDateDeparture($date_departure);
            $booking->setRoom($rooms[$i % sizeof($rooms)]);

            $manager->persist($booking);
        }
        $manager->flush();
    }

    private function getData(): array
    {
        return [
            ['aoirol',date_create("2013-03-15"),date_create("2013-03-20")],
            ['bvffwk',date_create("2013-03-16"),date_create("2013-03-17")],
            ['dilrow',date_create("2013-03-17"),date_create("2013-03-18")],
            ['encfkc',date_create("2013-03-18"),date_create("2013-03-20")],
            ['eotvnj',date_create("2013-03-19"),date_create("2013-03-21")],
            ['jptqov',date_create("2013-03-19"),date_create("2013-03-21")],
        ];
    }

    public function getDependencies()
    {
        return array(
            RoomFixtures::class,
        );
    }
}