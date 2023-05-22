<?php

namespace App\Controller;

use App\Entity\Information;
use App\Form\StepFiveType;
use App\Repository\InformationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/etape-5')]
class StepFiveController extends AbstractController
{
    #[Route('/{id}', name: 'app_step_five', methods: ['GET', 'POST'])]
    public function index(Request $request, Information $information, InformationRepository $informationRepository): Response
    {
        $form = $this->createForm(StepFiveType::class, $information);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $information->setEtape(5);
            $informationRepository->save($information, true);

            return $this->redirectToRoute('app_fin', ['id' => $information->getId()], Response::HTTP_SEE_OTHER);
        }

        return $this->render('home/step_five.html.twig',[
            'form' => $form,
            'information' => $information
        ]);
    }
}
