<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use DateTime;

class Ejercicio1Controller extends AbstractController
{
    /**
     * @Route("/ejercicio1", name="ejercicio1")
     */
    public function index(): Response
    {
        // DateTime vars
        $date_init = new DateTime('2022/01/15T18:00:00.012345Z');
        $date_end = new DateTime('2022/01/15T19:00:00.012345Z');

        $cadena = 'El próximo día '. $date_init->format('d/m/y') .' se celebrará desde las '. $date_init->format('H:i') .' a las '. $date_end->format('H:i')  .' horas el congreso de …';

        return new response ($cadena);

    }
}
