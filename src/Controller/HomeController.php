<?php

namespace App\Controller;

use App\Entity\Information;
use App\Form\StepOneType;
use App\Repository\InformationRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    public function __construct(
        private InformationRepository $informationRepository, private ManagerRegistry $managerRegistry
    )
    {
    }

    #[Route('/', name: 'app_home', methods: ['GET', 'POST'])]
    public function index(Request $request): Response
    { //dd($request);
        $information = new Information();
        $form = $this->createForm(StepOneType::class, $information);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){ //dd($information);
            $information->setEtape(1);
            $this->informationRepository->save($information, true);

            return $this->redirectToRoute('app_step_two', ['id' => $information->getId()], Response::HTTP_SEE_OTHER);
        }
        return $this->render('home/index.html.twig',[
            'form' => $form->createView(),
        ]);
    }
}
