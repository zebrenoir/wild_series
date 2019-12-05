<?php

namespace App\DataFixtures;


use App\Entity\Actor;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Faker;

class ActorFixtures extends Fixture implements DependentFixtureInterface
{
    const ACTORS = [
        'Mouloud',
        'Jean-Franck Begodon',
        'Astay Risque',
        'Obey Leaks',
        'Mahmoud Abbas',
        'DiabloX9',
    ];

    public function load(ObjectManager $manager)
    {
        foreach (self::ACTORS as $key => $name) {
            $actor = new Actor();
            $actor->setName($name);
            $actor->addProgram($this->getReference('program_' . random_int(0, 5)));
            $manager->persist($actor);
        }
        $manager->flush();

        $faker = Faker\Factory::create();

        for ($i = 0; $i < 50; $i++) {
            $actor = new Actor();
            $actor->setName($faker->name);
            $actor->addProgram($this->getReference('program_' . random_int(0, 5)));
            $manager->persist($actor);
        }
        $manager->flush();
    }

    public function getDependencies()

    {
        return [ProgramFixtures::class];
    }
}
