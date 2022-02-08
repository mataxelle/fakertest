<?php

namespace App\Controller;

use App\Repository\PeintureRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PeintureController extends AbstractController
{
    #[Route('/peintures', name: 'peintures')]
    public function peintures(PeintureRepository $peintureRepository)
    {
        return $this->json($peintureRepository->findBy([], ['createdAt' => 'DESC']), 200, [], ['groups'=> 'peinture:read']);
    }

    /*#[Route('/peintures', name: 'peintures')]
    public function peintures(Request $request, PeintureRepository $peintureRepository)
    {
        // Récupèration de la valeur du décalage/commencement (offset) depuis les paramètres de l'URL ($request->query) sous forme d'entier (getInt()).
        // Par défaut, sa valeur sera 0 si le paramètre n'est pas défini.
        $offset = max(0, $request->query->getInt('offset', 0));

        return $this->json(
            $paginator = $peintureRepository->getPeinturePaginator($offset), 
            200,
            [],
            ['groups'=> 'peinture:read',
            'precedent' => $offset - PeintureRepository::PAGINATOR_PER_PAGE,
            'suivant' => min(count($paginator), $offset + PeintureRepository::PAGINATOR_PER_PAGE),
            // Les décalages précédent et suivant sont calculés sur la base de toutes les informations que nous avons reçues du paginateur.
        ]);
    }*/
}
