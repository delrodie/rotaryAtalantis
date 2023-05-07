<?php

namespace App\Controller;

use App\Entity\Information;
use App\Form\StepThreeType;
use App\Repository\InformationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/etape-3')]
class StepThreeController extends AbstractController
{
    #[Route('/{id}', name: 'app_step_three', methods: ['GET', 'POST'])]
    public function index(Request $request, Information $information, InformationRepository $informationRepository): Response
    {
        $form = $this->createForm(StepThreeType::class, $information);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $information->setEtape(3);
            $informationRepository->save($information, true);

            return $this->redirectToRoute('');
        }

        return $this->render('home/step_three.html.twig', [
            'information' => $information,
            'form' => $form
        ]);
    }
}
