<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/satisfaction')]
class SatisfactionController extends AbstractController
{
    #[Route('/', name: 'app_satisfaction', methods: (['GET','POST']))]
    public function index(): JsonResponse
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/SatisfactionController.php',
        ]);
    }
}
