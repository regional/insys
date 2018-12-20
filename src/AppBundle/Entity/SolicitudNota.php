<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * solicitud_nota
 *
 * @ORM\Table(name="solicitud_nota")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SolicitudNotaRepository")
 */
class SolicitudNota
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="solicitud_id", type="integer")
     */
    private $solicitudId;

    /**
     * @var string
     *
     * @ORM\Column(name="nota", type="string", length=255)
     */
    private $nota;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="date")
     */
    private $fecha;

    /**
     * @var Solicitud
     *
     *
     * @ORM\ManyToOne(targetEntity="Solicitud", inversedBy="misSolicitudes")
     */

    private $solicitud;

    /**
     * @var Usuario
     *
     *
     * @ORM\ManyToOne(targetEntity="Solicitud", inversedBy="usuarioNota")
     */

    private $Usuario;



    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set solicitudId
     *
     * @param integer $solicitudId
     *
     * @return solicitudNota
     */
    public function setSolicitudId($solicitudId)
    {
        $this->solicitudId = $solicitudId;

        return $this;
    }

    /**
     * Get solicitudId
     *
     * @return int
     */
    public function getSolicitudId()
    {
        return $this->solicitudId;
    }

    /**
     * Set nota
     *
     * @param string $nota
     *
     * @return solicitudNota
     */
    public function setNota($nota)
    {
        $this->nota = $nota;

        return $this;
    }

    /**
     * Get nota
     *
     * @return string
     */
    public function getNota()
    {
        return $this->nota;
    }

    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     *
     * @return solicitudNota
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get fecha
     *
     * @return \DateTime
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set usuarioId
     *
     * @param integer $usuarioId
     *
     * @return solicitudNota
     */
    public function setUsuarioId($usuarioId)
    {
        $this->usuarioId = $usuarioId;

        return $this;
    }

    /**
     * Get usuarioId
     *
     * @return int
     */
    public function getUsuarioId()
    {
        return $this->usuarioId;
    }
}

