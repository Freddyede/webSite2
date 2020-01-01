<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Menu;

class NavbarController extends AbstractController
{
    public function __construct(){
        $this->defaultContext = [
            AbstractNormalizer::CIRCULAR_REFERENCE_HANDLER => function ($object, $format, $context) {
                return $object;
            },
        ];
        $this->serializer = new Serializer(
            [
                new ObjectNormalizer(null, null, null, null, null, null, $this->defaultContext)
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
     * @Route("/navbar", name="navbar", methods={"GET"})
     */
    public function index(SerializerInterface $serializer)
    {
        $user = 
            $this->serializer->serialize(
                $this->getDoctrine()->getRepository(Menu::class)->findAll(),
                'json',
                ['groups' => ['default']]
            );
        $response = new Response(
            $user,
            Response::HTTP_OK,
            $this->options
        );
        return $response;
    }
}
