<?php

namespace App\Controller;

use App\Entity\Click;
use App\Form\ClickType;
use App\Repository\ClickRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/click")
 */
class ClickController extends AbstractController
{
    /**
     * @Route("/", name="click_index", methods="GET")
     */
    public function index(ClickRepository $clickRepository): Response
    {
        return $this->render('click/index.html.twig', ['clicks' => $clickRepository->findAll()]);
    }

    /**
     * @Route("/new", name="click_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $click = new Click();
        $form = $this->createForm(ClickType::class, $click);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($click);
            $em->flush();

            return $this->redirectToRoute('click_index');
        }

        return $this->render('click/new.html.twig', [
            'click' => $click,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="click_show", methods="GET")
     */
    public function show(Click $click): Response
    {
        return $this->render('click/show.html.twig', ['click' => $click]);
    }

    /**
     * @Route("/{id}/edit", name="click_edit", methods="GET|POST")
     */
    public function edit(Request $request, Click $click): Response
    {
        $form = $this->createForm(ClickType::class, $click);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('click_edit', ['id' => $click->getId()]);
        }

        return $this->render('click/edit.html.twig', [
            'click' => $click,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="click_delete", methods="DELETE")
     */
    public function delete(Request $request, Click $click): Response
    {
        if ($this->isCsrfTokenValid('delete'.$click->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($click);
            $em->flush();
        }

        return $this->redirectToRoute('click_index');
    }
}
