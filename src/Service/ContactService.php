<?php

namespace App\Service;

use App\Entity\Contact;
use Doctrine\ORM\EntityManagerInterface;

class ContactService
{
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function persistContact(Contact $contact)
    {
        $contact->setCreatedAt(new \DateTime())
                ->setIsSend(false);

            /*$errors = $this->validator->validate($contact);

            if (count($errors) > 0) {
                return $this->json($errors, 400);
            }*/

            $this->em->persist($contact);
            $this->em->flush();
    }

    public function isSend(Contact $contact)
    {
        $contact->setIsSend(true);
        
        $this->em->persist($contact);
        $this->em->flush();
    }
}