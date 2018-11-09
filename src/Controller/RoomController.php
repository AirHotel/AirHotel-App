<?php
/**
 * This file is a part of AirHotel-App
 *
 * RoomController.php
 *
 * @author      Vincent CLAVEAU <vinc.claveau@gmail.com>
 * @copyright   2018 Vincent CLAVEAU
 * @date        06/11/2018
 */

namespace App\Controller;

use App\Repository\RoomRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

/**
 * @Route("/room", name="room_")
 */
class RoomController
{
    private $roomRepository;

    public function __construct(RoomRepository $roomRepository)
    {
        $this->roomRepository = $roomRepository;
    }

    /**
     * @Route("/{id}", requirements={"id": "\d+"}, name="show")
     */
    public function show($id, Environment $twig)
    {
        $room = $this->roomRepository->find($id);

        if (null === $room)
        {
            throw new NotFoundHttpException("This room doesn't exist!");
        }

        return new Response($twig->render('room/show.html.twig', [
            'room' => $room
        ]));
    }

    /**
     * @Route("/search", name = "search")
     */
    public function search(Request $request, SessionInterface $session, Environment $twig)
    {
        $form = $request->request->all();

        $rooms = $this->roomRepository->findBy(['roomType' => $form['type']]);
//        $rooms = $this->roomRepository->getAvailableRoomsForDatesByRoomType($form['arrivalDate'], $form['departDate'], $form['type']);
//        var_dump($rooms);

        $session->set('arrivalDate', $form['arrivalDate']);
        $session->set('departDate', $form['departDate']);

        return new Response($twig->render('room/list.html.twig', [
            'rooms' => $rooms
        ]));
    }

}