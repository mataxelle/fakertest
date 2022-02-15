<?php

namespace App\Command;

use App\Repository\ContactRepository;
use App\Repository\UserRepository;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Address;
use Symfony\Component\Mime\Email;

class SendContactCommand extends Command
{
    private $contactRepository;
    private $mailer;
    private $userRepository;
    protected static $defaultName = 'app:send-contact';

    public function __construct(
        ContactRepository $contactRepository,
        MailerInterface $mailer,
        UserRepository $userRepository
    ) {
        $this->contactRepository = $contactRepository;
        $this->mailer = $mailer;
        $this->userRepository = $userRepository;
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $toSend = $this->contactRepository->findBy(['isSend' => false]);

        $adressMail = new Address($this->userRepository->getPeintre()->getEmail(), $this->userRepository->getPeintre()->getNom() . ' ' . $this->userRepository->getPeintre()->getPrenom());

        foreach ($toSend as $mail) {
            $email = (new Email())
                   ->from($mail->getEmail())
                   ->to($adressMail)
                   ->subject('Nouveau message de ' . $mail->getNom())
                   ->text($mail->getMessage());

            $this->mailer->send($email);

            $this->contactService->isSend($mail);
        }

        return Command::SUCCESS;
    }
}