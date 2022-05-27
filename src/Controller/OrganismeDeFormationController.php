<?php

namespace App\Controller;

use App\Entity\OrganismeDeFormation;
use App\Form\OrganismeDeFormationType;
use App\Repository\OrganismeDeFormationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/organisme/de/formation')]
class OrganismeDeFormationController extends AbstractController
{
    #[Route('/', name: 'app_organisme_de_formation_index', methods: ['GET'])]
    public function index(OrganismeDeFormationRepository $organismeDeFormationRepository): Response
    {
        return $this->render('organisme_de_formation/index.html.twig', [
            'organisme_de_formations' => $organismeDeFormationRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_organisme_de_formation_new', methods: ['GET', 'POST'])]
    public function new(Request $request, OrganismeDeFormationRepository $organismeDeFormationRepository): Response
    {
        $organismeDeFormation = new OrganismeDeFormation();
        $form = $this->createForm(OrganismeDeFormationType::class, $organismeDeFormation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $organismeDeFormationRepository->add($organismeDeFormation, true);

            return $this->redirectToRoute('app_organisme_de_formation_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('organisme_de_formation/new.html.twig', [
            'organisme_de_formation' => $organismeDeFormation,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_organisme_de_formation_show', methods: ['GET'])]
    public function show(OrganismeDeFormation $organismeDeFormation): Response
    {
        return $this->render('organisme_de_formation/show.html.twig', [
            'organisme_de_formation' => $organismeDeFormation,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_organisme_de_formation_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, OrganismeDeFormation $organismeDeFormation, OrganismeDeFormationRepository $organismeDeFormationRepository): Response
    {
        $form = $this->createForm(OrganismeDeFormationType::class, $organismeDeFormation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $organismeDeFormationRepository->add($organismeDeFormation, true);

            return $this->redirectToRoute('app_organisme_de_formation_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('organisme_de_formation/edit.html.twig', [
            'organisme_de_formation' => $organismeDeFormation,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_organisme_de_formation_delete', methods: ['POST'])]
    public function delete(Request $request, OrganismeDeFormation $organismeDeFormation, OrganismeDeFormationRepository $organismeDeFormationRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$organismeDeFormation->getId(), $request->request->get('_token'))) {
            $organismeDeFormationRepository->remove($organismeDeFormation, true);
        }

        return $this->redirectToRoute('app_organisme_de_formation_index', [], Response::HTTP_SEE_OTHER);
    }
}
