<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Peinture;
use App\Entity\Post;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

/**
 * @codeCoverageIgnore
 */
class AppFixtures extends Fixture
{
    private $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    public function load(ObjectManager $manager): void
    {
        // Utilsation de Faker
        $faker = Factory::create('fr_FR');

        // Création utilisateur
        $user = new User();

        $user->setNom($faker->lastName())
            ->setPrenom($faker->firstName())
            ->setEmail('user@test.com')
            ->setTelephone($faker->phoneNumber())
            ->setAPropos($faker->text())
            ->setRoles(['ROLE_PEINTRE']);

        // Criptage du mot de passe
        $password = $this->passwordHasher->hashPassword($user, 'password');
        $user->setPassword($password);

        $manager->persist($user);

        // Creation Posts
        for ($i = 0; $i < 10; $i++) {
            $post = new Post();

            $post->setTitre($faker->words(3, true))
                ->setContenu($faker->text(350))
                ->setSlug($faker->slug(3))
                ->setCreatedAt($faker->dateTimeBetween('-6 month', 'now'))
                ->setUser($user);

            $manager->persist($post);
        }

        // Creation Post pour Test
        $post = new Post();

        $post->setTitre('Post test')
             ->setContenu($faker->text(350))
             ->setSlug('Post-test')
             ->setCreatedAt($faker->dateTimeBetween('-6 month', 'now'))
             ->setUser($user);

        $manager->persist($post);

        // Creation Categories
        for ($k = 0; $k < 10; $k++) {
            $categorie = new Category();

            $categorie->setNom($faker->word())
                ->setDescription($faker->words(10, true))
                ->setSlug($faker->slug());

            $manager->persist($categorie);


            // Boucle peinture dans boucle categorie, pour avoir 2 peintures par categorie
            // Creation Peintures
            for ($j = 0; $j < 2; $j++) {
                $peinture = new Peinture();

                $peinture->setNom($faker->words(3, true))
                    ->setLargeur($faker->randomFloat(2, 20, 60))
                    ->setHauteur($faker->randomFloat(2, 20, 60))
                    ->setEnVente($faker->randomElement([true, false]))
                    ->setPrix($faker->randomFloat(2, 20, 60))
                    ->setDateRealisation($faker->dateTimeBetween('-6 month', 'now'))
                    ->setCreatedAt($faker->dateTimeBetween('-6 month', 'now'))
                    ->setDescription($faker->text())
                    ->setPortfolio($faker->randomElement([true, false]))
                    ->setSlug($faker->slug())
                    ->setFile('/img/image.jpg')
                    ->setUser($user)
                    ->addCategorie($categorie);

                $manager->persist($peinture);
            }
        }

        // Creation Categorie pour Test
        $categorie = new Category();

        $categorie->setNom('Categorie test')
                  ->setDescription($faker->words(10, true))
                  ->setSlug('categorie-test');

        $manager->persist($categorie);

        // Creation Peinture pour Test
        $peinture = new Peinture();

        $peinture->setNom('Peinture test')
                 ->setLargeur($faker->randomFloat(2, 20, 60))
                 ->setHauteur($faker->randomFloat(2, 20, 60))
                 ->setEnVente($faker->randomElement([true, false]))
                 ->setPrix($faker->randomFloat(2, 20, 60))
                 ->setDateRealisation($faker->dateTimeBetween('-6 month', 'now'))
                 ->setCreatedAt($faker->dateTimeBetween('-6 month', 'now'))
                 ->setDescription($faker->text())
                 ->setPortfolio($faker->randomElement([true, false]))
                 ->setSlug('peinture-test')
                 ->setFile('/img/image.jpg')
                 ->setUser($user)
                 ->addCategorie($categorie);

        $manager->persist($peinture);

        $manager->flush();
    }
}
