<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;        
use weatherApp\Weather;

class WeatherController extends AbstractController
{
    public $data;

    #[Route('/weather', name: 'app_weather')]
    public function index(): Response
    {
      
        return $this->render('weather/index.html.twig', [
            'controller_name' => 'WeatherController',
        ]);
    }
}