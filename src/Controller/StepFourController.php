<?php

namespace App\Controller;

use App\Entity\Information;
use App\Form\StepFourType;
use App\Repository\InformationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/etape-4')]
class StepFourController extends AbstractController
{
    #[Route('/{id}', name: 'app_step_four', methods: ['GET', 'POST'])]
    public function index(Request $request, Information $information, InformationRepository $informationRepository): Response
    {
        $form = $this->createForm(StepFourType::class, $information);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $information->setEtape(4);
            $informationRepository->save($information, true);

            return $this->redirectToRoute('app_fin', ['id' => $information->getId()], Response::HTTP_SEE_OTHER);
        }

        return $this->render('home/step_four.html.twig',[
            'form' => $form,
            'information' => $information
        ]);
    }
}
