<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Product;

class HomeController extends AbstractController
{
    public function __construct(){
        $this->serializer = new Serializer(
            [new ObjectNormalizer()], 
            [
                new XmlEncoder(), 
                new JsonEncoder()
            ]
        );
    }
    /**
     * @Route("/", name="home", methods={"GET"})
     */
    public function index(SerializerInterface $serializer)
    {
        $user = $this->getDoctrine()->getRepository(Product::class)->findAll();
        $userS = $this->serializer->serialize($user,'json');
        $response = new Response(
            $userS,
            Response::HTTP_OK,
            [
                'content-type' => 'application/json',
                'Access-Control-Allow-Origin'=>'*'
            ]
        );
        return $response;
    }
}
