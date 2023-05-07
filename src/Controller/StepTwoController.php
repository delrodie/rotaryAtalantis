<?php

namespace App\Controller;

use App\Entity\Information;
use App\Form\StepTwoType;
use App\Repository\InformationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/etape-2')]
class StepTwoController extends AbstractController
{
    #[Route('/{id}', name: 'app_step_two', methods: ['GET', 'POST'])]
    public function index(Request $request, Information $information, InformationRepository $informationRepository): Response
    {
        $form = $this->createForm(StepTwoType::class, $information);
        $form->handleRequest($request); //dd($form);

        if ($form->isSubmitted() && $form->isValid()){
            $data = $form->getData(); //dd($data);
            $information->setEtape(2);
            $informationRepository->save($information, true);

            return $this->redirectToRoute('app_step_three', ['id' => $information->getId()], Response::HTTP_SEE_OTHER);
        }

        return $this->render('home/step_two.html.twig', [
            'form' => $form,
            'information' => $information
        ]);
    }
}
