<?php

namespace App\Controller;

use App\Entity\Booking;
use App\Repository\BookingRepository;
use App\Repository\RoomRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Twig\Environment;

/**
 * @Route("/booking", name="booking_")
 */
class BookingController extends AbstractController
{
    private $bookingRepository;

    public function __construct(BookingRepository $bookingRepository)
    {
        $this->bookingRepository = $bookingRepository;
    }


    /**
     * @Route("/show", name="show")
     */
    public function show(Environment $twig, SessionInterface $session)
    {
        $booking = $this->bookingRepository->find($session->get('ticket'));

        return new Response($twig->render('Booking/show.html.twig', [
            'booking' => $booking
        ]));
    }

    /**
     * @Route("/{room_id}", name="add")
     */
    public  function add($room_id, RoomRepository $roomRepository, SessionInterface $session, EntityManagerInterface $entityManager)
    {
        $ticket = $session->get('ticket');
        $da = $session->get('arrivalDate');
        $dp = $session->get('departDate');

        if($ticket === null || $da === null || $dp === null)
        {
            return;
        }

        $booking = new Booking();

        $booking->setTicketNumber($ticket);
        $booking->setDateArrival(date_create_from_format('d/m/Y', $da));
        $booking->setDateDeparture(date_create_from_format('d/m/Y', $dp));
        $booking->setRoom($roomRepository->find($room_id));

        $entityManager->persist($booking);
        $entityManager->flush();

        return $this->redirectToRoute('booking_show');
    }
}