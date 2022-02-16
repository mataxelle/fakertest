<?php

namespace App\Tests;

use App\Entity\Category;
use App\Entity\Peinture;
use PHPUnit\Framework\TestCase;

class CategoryUnitTest extends TestCase
{
    public function testIsTrue(): void
    {
        $categories = new Category();

        $categories->setNom('nom')
                   ->setDescription('description')
                   ->setSlug('slug');

        $this->assertTrue($categories->getNom() === 'nom');
        $this->assertTrue($categories->getDescription() === 'description');
        $this->assertTrue($categories->getSlug() === 'slug');
    }

    public function testIsFalse(): void
    {
        $categories = new Category();

        $categories->setNom('nom')
                   ->setDescription('description')
                   ->setSlug('slug');

        $this->assertFalse($categories->getNom() === 'false');
        $this->assertFalse($categories->getDescription() === 'false');
        $this->assertFalse($categories->getSlug() === 'false');
    }

    public function testIsEmpty(): void
    {
        $categories = new Category();

        $this->assertEmpty($categories->getNom());
        $this->assertEmpty($categories->getDescription());
        $this->assertEmpty($categories->getSlug());
        $this->assertEmpty($categories->getId());
    }

    public function testGetAddRemovePeinture() {
        $categorie = new Category();
        $peinture = new Peinture();

        $this->assertEmpty($categorie->getPeintures());

        $categorie->addPeinture(($peinture));
        $this->assertContains($peinture, $categorie->getPeintures());

        $categorie->removePeinture(($peinture));
        $this->assertEmpty($categorie->getPeintures());
    }
}
