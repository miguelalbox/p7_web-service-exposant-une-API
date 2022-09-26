<?php

namespace App\Entity;

use App\Repository\CustomerRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: CustomerRepository::class)]
class Customer
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(["getCustomers"])]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Groups(["getCustomers"])]
    #[Assert\NotBlank(message: "Le Prenom est obligatoire")]
    #[Assert\Length(min: 1, max: 255, minMessage: "Le prenom dois faire au moins {{ limit }} caractères", maxMessage: "Le prenom dois avoir au maximum {{ limit }} caractères")]
    private ?string $firstname = null;

    #[ORM\Column(length: 255)]
    #[Groups(["getCustomers"])]
    #[Assert\NotBlank(message: "Le nom est obligatoire")]
    #[Assert\Length(min: 1, max: 255, minMessage: "Le nom dois faire au moins {{ limit }} caractères", maxMessage: "Le nom dois avoir au maximum {{ limit }} caractères")]
    private ?string $lastname = null;

    #[ORM\Column(length: 255)]
    #[Groups(["getCustomers"])]
    #[Assert\NotBlank(message: "Le mail est obligatoire")]
    #[Assert\Length(min: 1, max: 255, minMessage: "Le mail dois faire au moins {{ limit }} caractères", maxMessage: "Le mail dois avoir au maximum {{ limit }} caractères")]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    #[Groups(["getCustomers"])]
    #[Assert\NotBlank(message: "Le numero de telephone est obligatoire")]
    #[Assert\Length(min: 1, max: 255, minMessage: "Le numero de telephone dois faire au moins {{ limit }} caractères", maxMessage: "Le numero de telephone dois avoir au maximum {{ limit }} caractères")]
    private ?string $phone = null;

    #[ORM\ManyToOne(inversedBy: 'customers')]
    #[Groups(["getCustomers"])]
    private ?User $user = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }
}
