<?php

namespace App\Controller;

use App\Form\ContactFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    /**
     * @Route("/contact", name="contact_index")
     */
    public function index(): Response
    {
        $form = $this->createForm(ContactFormType::class);

        return $this->render('contact/index.html.twig', [
            'formView' => $form->createView()
        ]);
    }

    /**
     * @Route("/contact/validation", name="contactForm_validation")
     */
    public function getDatas() {



set_time_limit(5);


        $this->addFlash("success", "Votre formulaire de contact a bien été envoyé");

        return $this->redirectToRoute("home");
    }
}
