<?php

namespace App\Controller;

use App\Form\FormulaireAjoutType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FormulaireAjoutCarController extends AbstractController
{
    /**
     * @return Response
     * @Route("/admin/formulaire/create", name="formulaire_create")]
     */
    public function index(): Response
    {
        $form  = $this->createForm(FormulaireAjoutType::class);

        return $this->render('formulaire_ajout_car/index.html.twig', [
            'formView' => $form->createView()
        ]);
    }
}
