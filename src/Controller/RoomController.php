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
     * @Route("/list/{roomType}",
     *     defaults = { "roomType" = null },
     *     name = "list"
     * )
     */
    public function list($roomType, Environment $twig)
    {

        switch ($roomType)
        {
            case "single":
            case "Single":
                $rooms = $this->roomRepository->findBy(['roomType' => "Single"]);
                break;
            case "double":
            case "Double":
                $rooms = $this->roomRepository->findBy(['roomType' => "Double"]);
                break;
            case "family":
            case "Family":
                $rooms = $this->roomRepository->findBy(['roomType' => "Family"]);
                break;
            default:
                $rooms = $this->roomRepository->findAll();
        }

        return new Response($twig->render('room/list.html.twig', [
            'rooms' => $rooms
        ]));
    }

    /**
     * @Route("/search", name = "search")
     */
    public function search(Request $request, SessionInterface $session, Environment $twig)
    {
        $form = $request->request->all();
        $rooms = $this->roomRepository->findBy(['roomType' => $form['type']]);

        $session->set('arrivalDate', $form['arrivalDate']);
        $session->set('departDate', $form['departDate']);

        return new Response($twig->render('room/list.html.twig', [
            'rooms' => $rooms
        ]));
    }

}