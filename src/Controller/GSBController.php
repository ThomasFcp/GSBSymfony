<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GSBController extends AbstractController
{
    /**
     * @Route("/gsb", name="gsb")
     */
    public function index(): Response
    {
        return $this->render('gsb/index.html.twig', [
            'controller_name' => 'GSBController',
        ]);
    }
/**
     * @Route("/gsb/lesCadurciens", name="lesCadurciens")
     */
    public function voirUtilisateurCadurcien():Response
    {
     $repo = $this->getDoctrine()->getRepository(\App\Entity\Utilisateur::class);
     $users = $repo->fonctionCadurcien();
     return $this->render('gsb/lesCadurciens.html.twig' ,['listeUtilisateursCadurciens' => $users]);

    }
    /**
     * @Route("/gsb/UtilisateursAyantFrais", name="UtilisateursAyantFrais")
     */
    public function voirUtilisateurAyantFrais():Response
    {
        $repo = $this->getDoctrine()->getRepository(\App\Entity\Fichefrais::class);
        $liste = $repo->UtilisateurAyantFrais();
        return $this->render('gsb/ayantFrais.html.twig',['listeUserAyantFrais' => $liste]);
    }
        /**
     * @Route("/gsb/UtilisateursAyantPasFrais", name="UtilisateursAyantPasFrais")
     */
        public function UtilisateursAyantPasFrais():Response
    {
        $repo = $this->getDoctrine()->getRepository(\App\Entity\Fichefrais::class);
        $liste = $repo->UtilisateurAyantPasFrais();
        return $this->render('gsb/ayantPasFrais.html.twig',['listeUserAyantPasFrais' => $liste]);
    }
            /**
     * @Route("/gsb/NombreDeFrais", name="NombreDeFrais")
     */
        public function NombreDeFrais():Response
    {
        $repo = $this->getDoctrine()->getRepository(\App\Entity\Fichefrais::class);
        $liste = $repo->NombreDeFrais();
        return $this->render('gsb/NombreDeFrais.html.twig',['listeNombreDeFrais' => $liste]);
    }
} 