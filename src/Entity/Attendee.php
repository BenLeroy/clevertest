<?php
// api/src/Entity/Attendee.php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * A attendee of a book.
 *
 * @ORM\Entity
 * @ApiResource
 */
class Attendee
{
    /**
     * @var int The id of this attendee.
     *
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string the informations of the attendee.
     *
     * @ORM\Column(type="text")
     * @Assert\NotBlank
     */
    public $informations;

    /**
     * @var int the presence time of the attendee.
     *
     * @ORM\Column(type="integer")
     * @Assert\NotBlank
     */
    public $presence;

     /**
     * @var int the speaking time of the attendee.
     *
     * @ORM\Column(type="integer")
     * @Assert\NotBlank
     */
    public $parole;

    /**
     * @var Conference The conference this attendee is listening.
     *
     * @ORM\ManyToOne(targetEntity="Conference", inversedBy="attendees")
     * @Assert\NotNull
     */
    public $conference;

    public function getId(): ?int
    {
        return $this->id;
    }
}
