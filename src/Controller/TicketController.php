<?php
/**
 * This file is a part of AirHotel
 *
 * TicketController.php
 *
 * @author      Vincent CLAVEAU <vinc.claveau@gmail.com>
 * @copyright   2018 Vincent CLAVEAU
 * @date        08/11/2018
 */

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

/**
 * @Route("/ticket", name = "ticket_")
 */
class TicketController extends AbstractController
{
    /**
     * @Route("/login", name = "login")
     */
    public function login(Request $request, SessionInterface $session, Environment $twig)
    {
        $ticket = $request->request->get('ticket');

        if($ticket !== null)
        {
            $session->set('ticket', $ticket);
            return $this->redirectToRoute('app_index');
        }

        return new Response($twig->render('ticket/login.html.twig'));
    }

    /**
     * @Route("/show", name = "show")
     */
    public function show(SessionInterface $session, Environment $twig)
    {
        if($session->get('ticket') === null)
        {
            throw new NotFoundHttpException("No ticket for your session");
        }

        return new Response($twig->render('ticket/show.html.twig'));
    }
}