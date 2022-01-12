<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Persona
 *
 * @ORM\Table(name="Persona")
 * @ORM\Entity
 */
class Persona
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nombre", type="string", length=45, nullable=true)
     */
    private $nombre;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="fecchaNacimiento", type="date", nullable=true)
     */
    private $fecchanacimiento;

    /* Definición de getters y setters */

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(?string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getFecchanacimiento(): ?\DateTimeInterface
    {
        return $this->fecchanacimiento;
    }

    public function setFecchanacimiento(?\DateTimeInterface $fecchanacimiento): self
    {
        $this->fecchanacimiento = $fecchanacimiento;

        return $this;
    }


}
