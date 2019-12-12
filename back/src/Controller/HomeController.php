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
            [
                new ObjectNormalizer()
            ], 
            [
                new XmlEncoder(), 
                new JsonEncoder()
            ]
        );
        $this->options=
            [
                'content-type' => 'application/json',
                'Access-Control-Allow-Origin'=>'*'
            ];
    }
    /**
     * @Route("/", name="home", methods={"GET"})
     */
    public function index(SerializerInterface $serializer)
    {
        $user = 
            $this->serializer->serialize(
                $this->getDoctrine()->getRepository(Product::class)->findAll(),
                'json'
            );
        $response = new Response(
            $user,
            Response::HTTP_OK,
            $this->options
        );
        return $response;
    }
}
