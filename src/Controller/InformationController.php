<?php

namespace App\Controller;

use App\Entity\Information;
use App\Form\InformationType;
use App\Repository\InformationRepository;
use phpDocumentor\Reflection\Types\This;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/backend')]
class InformationController extends AbstractController
{
    #[Route('/', name: 'app_information_index', methods: ['GET'])]
    public function index(InformationRepository $informationRepository): Response
    {
//        dd($informationRepository->findAll());
        return $this->render('information/index.html.twig', [
            'information' => $informationRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_information_statistique', methods: ['GET'])]
    public function new(InformationRepository $informationRepository): Response
    {
        $datas = $informationRepository->findAll();

        return $this->render('information/new.html.twig',[
            'developpements' => $this->developpement($datas),
            'connaissances' => $this->connaissance($datas),
            'rotary' => $this->rotary($datas)
        ]);
    }

    private function developpement($datas): array
    {
        $developpements=[];
        foreach ($datas as $data){
            $developpements[] = $data->getBesoinFormationDevPro();
        }

        $occurences = []; $nb=0;
        foreach ($developpements as $developpement){
            foreach ($developpement as $item){
                if (isset($occurences[$item])) $occurences[$item]++;
                else $occurences[$item] = 1;

                $nb++;
            }
        }

        $FormDev=[]; if (!$nb) $nb=1;
        foreach ($occurences as $element => $nombre){
            $pourcentage = round($nombre * 100 / $nb, 1);
            $FormDev[] = [
                'element' => $element,
                'nombre' => "$nombre",
                'pourcentage' => $pourcentage
            ];
        }

        return $FormDev;
    }

    private function connaissance($datas)
    {
        $connaissances = [];
        foreach ($datas as $data){
            $connaissances[] = $data->getBesoinConnaissanceActivitePro();
        }

        $occurences=[]; $nb=0;
        foreach ($connaissances as $connaissance){
            foreach ($connaissance as $item){
                if (isset($occurences[$item])) $occurences[$item]++;
                else $occurences[$item] = 1;

                $nb++;
            }
        }

        $formConnaissance=[]; if (!$nb) $nb=1;
        foreach ($occurences as $element => $nombre){
            $pourcentage = round($nombre * 100 / $nb, 1);
            $formConnaissance[] = [
                'element' => $element,
                'nombre' => "$nombre",
                'pourcentage' => $pourcentage
            ];
        }

//        dd($formConnaissance);

        return $formConnaissance;
    }

    private function rotary($datas)
    {
        $connaissances = [];
        foreach ($datas as $data){
            $connaissances[] = $data->getBesoinFormationRotary();
        }

        $occurences=[]; $nb=0;
        foreach ($connaissances as $connaissance){
            foreach ($connaissance as $item){
                if (isset($occurences[$item])) $occurences[$item]++;
                else $occurences[$item] = 1;

                $nb++;
            }
        }

        $formConnaissance=[]; if (!$nb) $nb=1;
        foreach ($occurences as $element => $nombre){
            $pourcentage = round($nombre * 100 / $nb, 1);
            $formConnaissance[] = [
                'element' => $element,
                'nombre' => "$nombre",
                'pourcentage' => $pourcentage
            ];
        }

        return $formConnaissance;
    }
}
