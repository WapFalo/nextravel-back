<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Utilisateur;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $utilisateur = new Utilisateur();
        $utilisateur->setName('John Doe');
        $utilisateur->setRoleId(null);
        $utilisateur->setGroupeId(null);
        $utilisateur->setEmail('john.doe@example.com');
        $manager->persist($utilisateur);

        $manager->flush();
    }
}
