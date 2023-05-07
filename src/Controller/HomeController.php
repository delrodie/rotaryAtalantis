<?php

namespace App\Controller;

use App\Entity\Information;
use App\Form\StepOneType;
use App\Repository\InformationRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use phpDocumentor\Reflection\Types\False_;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\AsciiSlugger;

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

        if ($form->isSubmitted() && $form->isValid()){
            $this->slug($information);
            $information->setEtape(1);
            if ($this->verification($information)){
                return $this->redirect($this->verification($information));
            }

            $this->informationRepository->save($information, true);

            return $this->redirectToRoute('app_step_two', ['id' => $information->getId()], Response::HTTP_SEE_OTHER);
        }
        return $this->render('home/index.html.twig',[
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}/fin', name:"app_fin", methods: ['GET', 'POST'])]
    public function fin(Information $information)
    {
        return $this->render('home/fin.html.twig',[
            'information' => $information
        ]);
    }

    public function slug(object $information)
    {
        $slugify = new AsciiSlugger();
        $slug = $slugify->slug(strtolower($information->getNom().'-'.$information->getPrenoms().'-'.$information->getContact()));
        return $information->setSlug($slug);
    }

    public function verification(object $information)
    {
        // Si le nom existe déjà
        $valid = $this->informationRepository->findOneBy(['slug' => $information->getSlug()]);
        if ($valid){
            if ($valid->getEtape() === 1)
                return $this->generateUrl('app_step_two',['id' => $valid->getId()]);
            elseif ($valid->getEtape() === 2)
                return $this->generateUrl('app_step_three',['id' => $valid->getId()]);
            elseif ($valid->getEtape() === 3)
                return $this->generateUrl('app_step_four',['id' => $valid->getId()]);
            elseif ($valid->getEtape() === 4)
                return $this->generateUrl('app_fin',['id' => $valid->getId()]);
            else
                return $this->generateUrl('app_home');
        }

        return false;
    }
}
