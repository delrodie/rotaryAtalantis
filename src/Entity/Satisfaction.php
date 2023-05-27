<?php

namespace App\Entity;

use App\Repository\SatisfactionRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SatisfactionRepository::class)]
class Satisfaction
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $niveauSatisfaction = null;

    #[ORM\Column(nullable: true)]
    private ?int $flag = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNiveauSatisfaction(): ?string
    {
        return $this->niveauSatisfaction;
    }

    public function setNiveauSatisfaction(?string $niveauSatisfaction): self
    {
        $this->niveauSatisfaction = $niveauSatisfaction;

        return $this;
    }

    public function getFlag(): ?int
    {
        return $this->flag;
    }

    public function setFlag(?int $flag): self
    {
        $this->flag = $flag;

        return $this;
    }
}
