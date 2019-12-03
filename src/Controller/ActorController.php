<?php

namespace App\Controller;

use App\Entity\Actor;
use App\Repository\ActorRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ActorController extends AbstractController
{
    /**
     * @Route("/actor", name="actor")
     */
    public function index(ActorRepository $actorRepository)
    {
        return $this->render('actor/index.html.twig', [
            'actors' => $actorRepository->findAll()
        ]);
    }

    /**
     * @Route("/actor/{id}", name="show_actor")
     */
    public function show(Actor $actor)
    {
        return $this->render('actor/show.html.twig', [
            'actor' => $actor
        ]);
    }
}
