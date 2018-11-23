<?php
// api/src/Entity/Conference.php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * A Conference.
 *
 * @ORM\Entity
 * @ApiResource
 */
class Conference
{
    /**
     * @var int The id of this conference.
     *
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string The title of this conference.
     *
     * @ORM\Column
     * @Assert\NotBlank
     */
    public $title;

    /**
     * @var string The speaker of this conference.
     *
     * @ORM\Column
     * @Assert\NotBlank
     */
    public $speaker;

    /**
     * @var \DateTimeInterface The date of this conference.
     *
     * @ORM\Column(type="datetime")
     * @Assert\NotNull
     */
    public $conferenceDate;

    /**
     * @var Attendees[] Available attendees for this conference.
     *
     * @ORM\OneToMany(targetEntity="Attendee", mappedBy="conference")
     */
    public $attendees;

    public function __construct()
    {
        $this->attendees = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }
}
