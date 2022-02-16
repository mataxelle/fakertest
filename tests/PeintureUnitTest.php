<?php

namespace App\Tests;

use App\Entity\Category;
use App\Entity\Commentaire;
use App\Entity\Peinture;
use App\Entity\User;
use DateTime;
use PHPUnit\Framework\TestCase;

class PeintureUnitTest extends TestCase
{
    public function testIsTrue(): void
    {
        $peinture = new Peinture();
        $datetime =  new DateTime();
        $categorie = new Category();
        $user = new User();

        $peinture->setNom('nom')
                 ->setLargeur(20.20)
                 ->setHauteur(20.20)
                 ->setEnVente(true)
                 ->setPrix(20.20)
                 ->setDateRealisation($datetime)
                 ->setCreatedAt($datetime)
                 ->setDescription('description')
                 ->setPortfolio(true)
                 ->setSlug('slug')
                 ->setFile('file')
                 ->setUser($user)
                 ->addCategorie($categorie);

        $this->assertTrue($peinture->getNom() === 'nom');
        $this->assertTrue($peinture->getLargeur() == 20.20);
        $this->assertTrue($peinture->getHauteur() == 20.20);
        $this->assertTrue($peinture->getEnVente() === true);
        $this->assertTrue($peinture->getPrix() == 20.20);
        $this->assertTrue($peinture->getDateRealisation() === $datetime);
        $this->assertTrue($peinture->getCreatedAt() === $datetime);
        $this->assertTrue($peinture->getDescription() === 'description');
        $this->assertTrue($peinture->getPortfolio() === true);
        $this->assertTrue($peinture->getSlug() === 'slug');
        $this->assertTrue($peinture->getFile() === 'file');
        $this->assertTrue($peinture->getUser() === $user);
        $this->assertContains($categorie, $peinture->getCategorie());
    }

    public function testIsFale(): void
    {
        $peinture = new Peinture();
        $datetime =  new DateTime();
        $categorie = new Category();
        $user = new User();

        $peinture->setNom('nom')
                 ->setLargeur(20.20)
                 ->setHauteur(20.20)
                 ->setEnVente(true)
                 ->setPrix(20.20)
                 ->setDateRealisation($datetime)
                 ->setCreatedAt($datetime)
                 ->setDescription('description')
                 ->setPortfolio(true)
                 ->setSlug('slug')
                 ->setFile('file')
                 ->setUser($user)
                 ->addCategorie($categorie);

        $this->assertFalse($peinture->getNom() === 'false');
        $this->assertFalse($peinture->getLargeur() === 30.20);
        $this->assertFalse($peinture->getHauteur() === 30.20);
        $this->assertFalse($peinture->getEnVente() === false);
        $this->assertFalse($peinture->getPrix() === 30.20);
        $this->assertFalse($peinture->getDateRealisation() === new DateTime());
        $this->assertFalse($peinture->getCreatedAt() === new DateTime());
        $this->assertFalse($peinture->getDescription() === 'false');
        $this->assertFalse($peinture->getPortfolio() === false);
        $this->assertFalse($peinture->getSlug() === 'flase');
        $this->assertFalse($peinture->getFile() === 'false');
        $this->assertFalse($peinture->getUser() === new User());
        $this->assertNotContains(new Category(), $peinture->getCategorie());
    }

    public function testIsEmpty(): void
    {
        $peinture = new Peinture();

        $this->assertEmpty($peinture->getNom());
        $this->assertEmpty($peinture->getLargeur());
        $this->assertEmpty($peinture->getHauteur());
        $this->assertEmpty($peinture->getEnVente());
        $this->assertEmpty($peinture->getPrix());
        $this->assertEmpty($peinture->getDateRealisation());
        $this->assertEmpty($peinture->getCreatedAt());
        $this->assertEmpty($peinture->getDescription());
        $this->assertEmpty($peinture->getPortfolio());
        $this->assertEmpty($peinture->getSlug());
        $this->assertEmpty($peinture->getFile());
        $this->assertEmpty($peinture->getUser());
        $this->assertEmpty($peinture->getCategorie());
        $this->assertEmpty($peinture->getId());
    }

    public function testGetAddRemoveCommentaire() {
        $peinture = new Peinture();
        $commentaire = new Commentaire();

        $this->assertEmpty($peinture->getCommentaires());

        $peinture->addCommentaire(($commentaire));
        $this->assertContains($commentaire, $peinture->getCommentaires());

        $peinture->removeCommentaire(($commentaire));
        $this->assertEmpty($peinture->getCommentaires());
    }

    public function testremoveCategorie() {
        $peinture = new Peinture();
        $categorie = new Category();

        $peinture->removeCategorie(($categorie));
        $this->assertEmpty($peinture->getCategorie());
    }
}
