<?php
/**
 * Created by PhpStorm.
 * User: Romaric
 * Date: 07/11/2018
 * Time: 14:14
 */

namespace App\DataFixtures;


use App\Entity\CreditCard;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class CreditCardFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {

        foreach ($this->getData() as $i => [$numero_card,$nom_prenom,$expiration_date,$cipher])
        {
            $creditCard = new CreditCard();
            $creditCard->setNumeroCard($numero_card);
            $creditCard->setNomPrenom($nom_prenom);
            $creditCard->setExpirationDate($expiration_date);
            $creditCard->setCipher($cipher);

            $manager->persist($creditCard);
        }
        $manager->flush();
    }

    private function getData(): array
    {
        return [
            ['Allegrini Romaric','1234567812345678',date_create("01/2020"),'123'],
            ['Claveau Vincent','8765432187654321',date_create("06/2019"),'234'],
            ['Dardant Aurelien','4321876543218765',date_create("12/2020"),'345']
        ];
    }
}