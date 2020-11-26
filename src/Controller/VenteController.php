<?php

namespace App\Controller;

use App\Repository\InfoSupRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class VenteController extends AbstractController
{
    /**
     * @Route("/ventes", name="ventes_index")
     */
    public function index(InfoSupRepository $repo): Response
    {
        $ventes = $repo->findAll();
        
        return $this->render('vente/index.html.twig', [
            'ventes' => $ventes,
        ]);
    }
}
