<?php namespace App\Api\Controller;

use App\Repository\ClickRepository;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ClickController extends AbstractController
{
    public function __construct(ClickRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @Route("/click", name="app_click", methods="GET")
     */
    public function click(Request $request): Response
    {

    }
    /**
     * @Route("/clicks", name="app_clicks", methods="GET")
     */
    public function clicks(Request $request): Response
    {

    }
}