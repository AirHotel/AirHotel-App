<?php

namespace App\Controller;

use App\Repository\BookingRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Twig\Environment;

/**
 * @Route("/booking", name="booking_")
 */
class BookingController
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
}