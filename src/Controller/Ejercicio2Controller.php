<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Persona;
use Doctrine\Persistence\ManagerRegistry;

class Ejercicio2Controller extends AbstractController
{

    /**
     * @Route("/API/persona/{id}", name="ejercicio2")
     */
    public function index(int $id, ManagerRegistry $doctrine): Response
    {
        // Función modificar donde se realizan todas las comprobaciones
        $message = $this->modificar($id, $doctrine);

        return $this->json([
            'message' => $message
        ]);
    }

    /**
     * @param $id
     * @param ManagerRegistry $doctrine
     * @return String
     */
    private function modificar($id, ManagerRegistry $doctrine): String
    {
        $entityManager = $doctrine->getManager();
        $persona  = $doctrine->getRepository(Persona::class)->find($id);
        // Comprobamos si el id pasado por url se corresponde a un registro en nuestra BD
        if (!$persona) {
            $message = 'Persona no encontrada';
        } else {
            // hacemos las modificaciones necesarias setteando datos
            $persona->setNombre('Lucía');
            $entityManager->flush();
            $message = 'Registro editado';
        }
        return $message;

    }
}
