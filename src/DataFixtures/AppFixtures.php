<?php

namespace App\DataFixtures;

use App\Domain\Entity\Gear;
use App\Domain\Entity\User;
use App\Domain\Entity\Workplace;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setName('Stefan');
        $user->setSurname('Burczymucha');
        $user->setPhone('666666666');
        $user->setEmail('stefan@burczymucha.pl');
        $user->setDescription('Ja niczego się nie boję, choćby niedźwiedź, to dostoję!');
        $manager->persist($user);

        $user2 = new User();
        $user2->setName('Alojzy');
        $user2->setSurname('Bąbel');
        $user2->setPhone('777777777');
        $user2->setEmail('alozjy@babel.pl');
        $user2->setDescription('Alojzy nie jest żywym człowiekiem, tylko lalką');
        $manager->persist($user2);

        $workplace = new Workplace();
        $workplace->setName('Biurko przy oknie');
        $workplace->setDescription('');
        $manager->persist($workplace);

        $workplace2 = new Workplace();
        $workplace2->setName('Biurko przy drzwiach');
        $workplace2->setDescription('Trochę mniej wygodne');
        $manager->persist($workplace2);

        $gears = [];
        $gears[0] = new Gear();
        $gears[0]->setType('komputer');
        $gears[0]->setModel('Dell XPS');
        $gears[0]->setName('K01');
        $gears[0]->setYear('2018');
        $gears[0]->setPrice(100 * 5000);
        $gears[0]->setDescription('');
        $gears[0]->setWorkplace($workplace);

        $gears[1] = new Gear();
        $gears[1]->setType('komputer');
        $gears[1]->setModel('Lenovo XXX');
        $gears[1]->setName('K02');
        $gears[1]->setYear('2019');
        $gears[1]->setPrice(100 * 5700);
        $gears[1]->setDescription('');
        $gears[1]->setWorkplace($workplace2);

        $gears[2] = new Gear();
        $gears[2]->setType('monitor');
        $gears[2]->setModel('Dell 22');
        $gears[2]->setName('M01');
        $gears[2]->setYear('2018');
        $gears[2]->setPrice(100 * 1000);
        $gears[2]->setDescription('');
        $gears[2]->setWorkplace($workplace);

        $gears[3] = new Gear();
        $gears[3]->setType('monitor');
        $gears[3]->setModel('Lenovo 24');
        $gears[3]->setName('M02');
        $gears[3]->setYear('2019');
        $gears[3]->setPrice(100 * 1200);
        $gears[3]->setDescription('czarny, bezramkowy');
        $gears[3]->setWorkplace($workplace2);

        $gears[4] = new Gear();
        $gears[4]->setType('drukarka');
        $gears[4]->setModel('HP LJ 6');
        $gears[4]->setName('P01');
        $gears[4]->setYear('2001');
        $gears[4]->setPrice(100 * 100);
        $gears[4]->setDescription('stara drukara');
        $gears[4]->setWorkplace($workplace);

        foreach($gears as $gear) {
            $manager->persist($gear);
        }

        $manager->flush();
    }
}
