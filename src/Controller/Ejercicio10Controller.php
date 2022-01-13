<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class Ejercicio10Controller extends AbstractController
{
    /**
     * @Route("/ejercicio10", name="ejercicio10")
     */
    public function index(): Response
    {
        $datos = $this->getData();
        $datos == false ? $message = 'Nada que actualizar' : $message = $this->updateContent($datos);

        return $this->json([
            'message' => $message,
        ]);
    }

    /**
     * @return array[] | boolean
     */
    private function getData()
    {
        // Ultima ejecución
        $last_run =  strtotime("04/01/2022");
        /* En este caso hipotético obtendríamos los datos de las dos tablas
        los guardamos en dos arrays distintos para cotejarlos
        */
        $tabla_1 = [
            "id"=>2,
            "nombre"=>"pepe",
            "DNI"=>"7777777x",
            "saldo"=>25,
            "fecha"=>"05/01/2022"
        ];

        $tabla_2 = [
            "id"=>2,
            "nombre"=>"pepe",
            "DNI"=>"7777777x",
            "saldo"=>30,
            "fecha"=>"05/01/2022"
        ];

        // Fecha de modificación
        $last_change = strtotime($tabla_1["fecha"]);

        if($last_change < $last_run)
            return false;

        return [
            "tabla_1" => $tabla_1,
            "tabla_2" => $tabla_2
        ];
    }

    /**
     * @param $datos
     * @return array
     */
    private function updateContent($datos)
    {
        // Comparamos los saldos
        if ($datos['tabla_1']['saldo'] != $datos['tabla_2']['saldo']) {
            // Todo Actualizamos el saldo en ambas tablas con el saldo de la primera

            $result = [
                'result'    => 'Saldo actualizado',
                'saldo'     => $datos['tabla_1']['saldo']
            ];
        } else {
            $result = [
                'result'    => 'No es necesario actualizar el saldo',
                'saldo'     => $datos['tabla_1']['saldo']
            ];
        }

        return $result;
    }
}
