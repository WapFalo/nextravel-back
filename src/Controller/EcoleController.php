<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Ecole;

#[Route('/api', name: 'api_')]
class EcoleController extends AbstractController
{
    #[Route('/ecole', name: 'ecole_create', methods:['post'])]
    public function index(ManagerRegistry $doctrine, Request $request): JsonResponse
    {
        $ecoles = $doctrine
            ->getRepository(Ecole::class)
            ->findAll();
   
        $data = [];
   
        foreach ($ecoles as $ecole) {
           $data[] = [
               'id' => $ecole->getId(),
               'name' => $ecole->getName(),
           ];
        }
   
        return $this->json($data);
    }
 
 
    #[Route('/ecole', name: 'ecole_create', methods:['post'] )]
    public function create(ManagerRegistry $doctrine, Request $request): JsonResponse
    {
        $entityManager = $doctrine->getManager();
   
        $ecole = new Ecole();
        $ecole->setName($request->request->get('name'));
   
        $entityManager->persist($ecole);
        $entityManager->flush();
   
        $data =  [
            'id' => $ecole->getId(),
            'name' => $ecole->getName(),
        ];
           
        return $this->json($data);
    }
 
 
    #[Route('/ecole/{id}', name: 'ecole_show', methods:['get'] )]
    public function show(ManagerRegistry $doctrine, int $id): JsonResponse
    {
        $ecole = $doctrine->getRepository(Ecole::class)->find($id);
   
        if (!$ecole) {
   
            return $this->json('No ecole found for id ' . $id, 404);
        }
   
        $data =  [
            'id' => $ecole->getId(),
            'name' => $ecole->getName(),
        ];
           
        return $this->json($data);
    }
 
    #[Route('/ecole/{id}', name: 'ecole_update', methods:['put', 'patch'] )]
    public function update(ManagerRegistry $doctrine, Request $request, int $id): JsonResponse
    {
        $entityManager = $doctrine->getManager();
        $ecole = $entityManager->getRepository(Ecole::class)->find($id);
   
        if (!$ecole) {
            return $this->json('No ecole$ecole found for id' . $id, 404);
        }
   
        $ecole->setName($request->request->get('name'));
        $entityManager->flush();
   
        $data =  [
            'id' => $ecole->getId(),
            'name' => $ecole->getName(),
        ];
           
        return $this->json($data);
    }
 
    #[Route('/ecole/{id}', name: 'ecole_delete', methods:['delete'] )]
    public function delete(ManagerRegistry $doctrine, int $id): JsonResponse
    {
        $entityManager = $doctrine->getManager();
        $ecole = $entityManager->getRepository(Ecole::class)->find($id);
   
        if (!$ecole) {
            return $this->json('No ecole$ecole found for id' . $id, 404);
        }
   
        $entityManager->remove($ecole);
        $entityManager->flush();
   
        return $this->json('Deleted a ecole$ecole successfully with id ' . $id);
    }
}
