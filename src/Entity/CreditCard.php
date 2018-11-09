<?php
/**
 * Created by PhpStorm.
 * User: Romaric
 * Date: 09/11/2018
 * Time: 12:31
 */

namespace App\Entity;



/**
 * @ORM\Entity()
 * @ORM\Table(name="creditCard")
 */
class CreditCard
{
    /**
     * @var int
     *
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $numero_card;

    /**
     * @var string
     *
     * @ORM\Column(type="String")
     */
    private $nom_prenom;

    /**
     *
     * @ORM\Column(type="Date")
     */
    private $expiration_date;

    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     */
    private $cipher;

    /**
     * @return int
     */
    public function getNumeroCard(): int
    {
        return $this->numero_card;
    }

    /**
     * @param int $numero_card
     */
    public function setNumeroCard(int $numero_card): void
    {
        $this->numero_card = $numero_card;
    }

    /**
     * @return string
     */
    public function getNomPrenom(): string
    {
        return $this->nom_prenom;
    }

    /**
     * @param string $nom_prenom
     */
    public function setNomPrenom(string $nom_prenom): void
    {
        $this->nom_prenom = $nom_prenom;
    }

    /**
     * @return mixed
     */
    public function getExpirationDate()
    {
        return $this->expiration_date;
    }

    /**
     * @param mixed $expiration_date
     */
    public function setExpirationDate($expiration_date): void
    {
        $this->expiration_date = $expiration_date;
    }

    /**
     * @return int
     */
    public function getCipher(): int
    {
        return $this->cipher;
    }

    /**
     * @param int $cipher
     */
    public function setCipher(int $cipher): void
    {
        $this->cipher = $cipher;
    }

}