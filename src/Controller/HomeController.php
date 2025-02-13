<?php

namespace App\Controller;

use App\Entity\InfoSup;
use App\Form\AnnonceType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function index(): Response
    {
        return $this->render('home.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    /**
     * Permet d'afficher une seule annonce
     * @Route("/Ventes/{id}", name="vente_info")
     *
     * @param [string] $slug
     * @return Response
     */
    public function show(InfoSup $infoSup)
    {
        //$repo = $this->getDoctrine()->getRepository(infoSup::class);
        //$infoSup = $repo->findOneById($id);
        //dump($infoSup);

        return $this->render('vente/info.html.twig',[
            'infoSup' => $infoSup
        ]);

    }

    /**
     * Permet de créer une annonce
     * @Route("/ventes/new", name="vente_new")
     *
     * @return Response
     */
    public function create(EntityManagerInterface $manager, Request $request)
    {
        $infoSup = new infoSup();     

        $form = $this->createForm(AnnonceType::class, $infoSup);

        $form->handleRequest($request);

        //dump($Infosup);

        if($form->isSubmitted() && $form->isValid()){

            foreach($infoSup->getImages() as $image){
                $image->setInfoSupId($infoSup);
                $manager->persist($image);
            }

            $manager->persist($infoSup);
            $manager->flush();

            $this->addFlash(
                'success',
                "L'annonce <strong>{$infoSup->getmarque()}</strong> a bien été enregistrée"
            );

            return $this->redirectToRoute('vente_info',[
                'id' => $infoSup->getId()
            ]);

        }


        return $this->render('vente/new.html.twig',[
            'myForm' => $form->createView()
        ]);
    }
}

