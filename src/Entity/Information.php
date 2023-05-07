<?php

namespace App\Entity;

use App\Repository\InformationRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: InformationRepository::class)]
class Information
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $civilite = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $nom = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $prenoms = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $contact = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $classification = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $qualite = null;

    #[ORM\Column(nullable: true)]
    private ?int $anciennete = null;

    #[ORM\Column(type: Types::ARRAY, nullable: true)]
    private array $besoinFormationDevPro = [];

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $autresPreciserFormation = null;

    #[ORM\Column(type: Types::ARRAY, nullable: true)]
    private array $besoinConnaissanceActivitePro = [];

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $autresPreciserActivite = null;

    #[ORM\Column(type: Types::ARRAY, nullable: true)]
    private array $besoinFormationRotary = [];

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $articlesStatutsReglements = null;

    #[ORM\Column(nullable: true)]
    private ?bool $voulezCommuniquerActivitePro = null;

    #[ORM\Column(nullable: true)]
    private ?int $etape = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCivilite(): ?string
    {
        return $this->civilite;
    }

    public function setCivilite(?string $civilite): self
    {
        $this->civilite = $civilite;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenoms(): ?string
    {
        return $this->prenoms;
    }

    public function setPrenoms(?string $prenoms): self
    {
        $this->prenoms = $prenoms;

        return $this;
    }

    public function getContact(): ?string
    {
        return $this->contact;
    }

    public function setContact(?string $contact): self
    {
        $this->contact = $contact;

        return $this;
    }

    public function getClassification(): ?string
    {
        return $this->classification;
    }

    public function setClassification(?string $classification): self
    {
        $this->classification = $classification;

        return $this;
    }

    public function getQualite(): ?string
    {
        return $this->qualite;
    }

    public function setQualite(?string $qualite): self
    {
        $this->qualite = $qualite;

        return $this;
    }

    public function getAnciennete(): ?int
    {
        return $this->anciennete;
    }

    public function setAnciennete(?int $anciennete): self
    {
        $this->anciennete = $anciennete;

        return $this;
    }

    public function getBesoinFormationDevPro(): array
    {
        return $this->besoinFormationDevPro;
    }

    public function setBesoinFormationDevPro(?array $besoinFormationDevPro): self
    {
        $this->besoinFormationDevPro = $besoinFormationDevPro;

        return $this;
    }

    public function getAutresPreciserFormation(): ?string
    {
        return $this->autresPreciserFormation;
    }

    public function setAutresPreciserFormation(?string $autresPreciserFormation): self
    {
        $this->autresPreciserFormation = $autresPreciserFormation;

        return $this;
    }

    public function getBesoinConnaissanceActivitePro(): array
    {
        return $this->besoinConnaissanceActivitePro;
    }

    public function setBesoinConnaissanceActivitePro(?array $besoinConnaissanceActivitePro): self
    {
        $this->besoinConnaissanceActivitePro = $besoinConnaissanceActivitePro;

        return $this;
    }

    public function getAutresPreciserActivite(): ?string
    {
        return $this->autresPreciserActivite;
    }

    public function setAutresPreciserActivite(?string $autresPreciserActivite): self
    {
        $this->autresPreciserActivite = $autresPreciserActivite;

        return $this;
    }

    public function getBesoinFormationRotary(): array
    {
        return $this->besoinFormationRotary;
    }

    public function setBesoinFormationRotary(?array $besoinFormationRotary): self
    {
        $this->besoinFormationRotary = $besoinFormationRotary;

        return $this;
    }

    public function getArticlesStatutsReglements(): ?string
    {
        return $this->articlesStatutsReglements;
    }

    public function setArticlesStatutsReglements(?string $articlesStatutsReglements): self
    {
        $this->articlesStatutsReglements = $articlesStatutsReglements;

        return $this;
    }

    public function isVoulezCommuniquerActivitePro(): ?bool
    {
        return $this->voulezCommuniquerActivitePro;
    }

    public function setVoulezCommuniquerActivitePro(?bool $voulezCommuniquerActivitePro): self
    {
        $this->voulezCommuniquerActivitePro = $voulezCommuniquerActivitePro;

        return $this;
    }

    public function getEtape(): ?int
    {
        return $this->etape;
    }

    public function setEtape(?int $etape): self
    {
        $this->etape = $etape;

        return $this;
    }
}
