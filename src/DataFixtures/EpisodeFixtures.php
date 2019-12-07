<?php

namespace App\DataFixtures;


use App\Entity\Episode;
use App\Entity\Season;
use App\Service\Slugify;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Faker;

class EpisodeFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create();
        $slugify = new Slugify();

        for ($i = 0; $i < 500; $i++) {
            $episode = new Episode();
            $episodeTitle = $faker->realText(32);
            $episode->setTitle($episodeTitle);
            $episode->setNumber(random_int(1, 10));
            $episode->setSynopsis($faker->realText(200));
            $episode->setSeason($this->getReference('season_' . random_int(0, 59)));
            $episode->setSlug($slugify->generate($episodeTitle));
            $manager->persist($episode);
        }
        $manager->flush();
    }

    public function getDependencies()

    {
        return [SeasonFixtures::class];
    }
}
