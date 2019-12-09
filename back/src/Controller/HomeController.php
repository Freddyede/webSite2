<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home", methods={"GET"})
     */
    public function index(SerializerInterface $serializer)
    {
        $response = new Response(
            json_encode(['message'=>'Content']),
            Response::HTTP_OK,
            [
                'content-type' => 'application/json',
                'Access-Control-Allow-Origin'=>'*'
            ]
        );
        return $response;
    }
}
