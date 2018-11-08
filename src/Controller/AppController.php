<?php
/**
 * This file is a part of AirHotel-App
 *
 * AppController.php
 *
 * @author      Vincent CLAVEAU <vinc.claveau@gmail.com>
 * @copyright   2018 Vincent CLAVEAU
 * @date        06/11/2018
 */

namespace App\Controller;

use App\Repository\RoomTypeRepository;
use App\Repository\RoomRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

/**
 * @Route("/", name="app_")
 */
class AppController
{
    /**
     * @Route("/", name="index")
     */
    public function index(Environment $twig, RoomTypeRepository $roomTypeRepository)
    {
        $roomTypes = $roomTypeRepository->findAll();

        return new Response($twig->render('App/index.html.twig', [
            'roomTypes' => $roomTypes
        ]));
    }

    /**
     * @Route("/test", name="test")
     */
    public function test(Environment $twig, RoomRepository $roomRepository)
    {
        $datesBDD = [
            [date_create("2013-03-15"),date_create("2013-03-20")],
            [date_create("2013-03-16"),date_create("2013-03-17")],
            [date_create("2013-03-17"),date_create("2013-03-18")],
            [date_create("2013-03-18"),date_create("2013-03-20")],
            [date_create("2013-03-19"),date_create("2013-03-21")],
            [date_create("2013-03-19"),date_create("2013-03-21")],
        ];

        $da = date_create("2013-03-18");
        $dp = date_create("2013-03-19");

        foreach ($datesBDD as $i => [$date_arrival,$date_departure])
        {
            if(($da > $date_departure || $da < $date_arrival) && ($dp > $date_departure || $dp < $date_arrival))
            {
                echo "Date est validé<br>";
            } else {
                echo "Date est pas OK<br>";
            }
        }

        $roomRepository->getAvailableRoomsForDates($da, $dp);

        return new Response($twig->render('App/index.html.twig'));
    }
}