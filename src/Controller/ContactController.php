<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use App\Service\ContactService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class ContactController extends AbstractController
{
    public function contact(
        Request $request, 
        SerializerInterface $serializer,
        ValidatorInterface $validator,
        ContactService $contactService
        )
    {
        $jsonRecu = $request->getContent();

        try {
            $contact = $serializer->deserialize($jsonRecu, Contact::class, 'json');

            $errors = $validator->validate($contact);

            if (count($errors) > 0) {
                return $this->json($errors, 400);
            }

            $contactService->persistContact($contact);

            return $this->json($contact, 201, []);

        } catch (\Throwable $th) {
            return $this->json([
                'status' => 400,
                'message' => $th->getMessage()
            ], 400);
        }
    }
}
