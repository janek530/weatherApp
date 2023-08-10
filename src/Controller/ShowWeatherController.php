<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use weatherApp\Weather;

class ShowWeatherController extends AbstractController
{
    #[Route('/show', name: 'app_show_weather')]
    public function index(): Response
    {
        if ($_SERVER['REQUEST_METHOD'] === "GET"){
            if(isset($_GET['strategy']) && isset($_GET['location'])){
                $weather = new Weather();
                $weather->setStrategy($_GET['strategy']);
                $weather->setLocation($_GET['location']);
                $data = $weather->getLocationKey();
            }
        }


        return $this->render('show_weather/index.html.twig', [
            'controller_name' => 'ShowWeatherController',
            'data'=>$data,
        ]);
    }
}
