<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * solicitud
 *
 * @ORM\Table(name="solicitud")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SolicitudRepository")
 */
class Solicitud
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
     * @var string
     *
     * @ORM\Column(name="titulo", type="string", length=255)
     */
    private $titulo;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=255)
     */
    private $descripcion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="date")
     */

    private $fecha;

    /**
     * @var Usuario
     *
     *
     * @ORM\ManyToOne(targetEntity="Usuario", inversedBy="misSolicitudes")
     */

    private $usuarioSolicitante;

    /**
     * @var Usuario
     *
     *
     * @ORM\ManyToOne(targetEntity="Usuario", inversedBy="misAsignaciones")
     */

    private $usuarioAsignado;

    /**
     * @var Estatus
     *
     *
     * @ORM\ManyToOne(targetEntity="Estatus", inversedBy="Estado")
     */

    private $estadoSolicitud;

    /**
     * @var CampoAfin
     *
     *
     * @ORM\ManyToOne(targetEntity="CampoAfin", inversedBy="camposAfines")
     */

    private $campoAfine;

    /*
     * @var
     * @ORM\OneToMany(targetEntity="Solicitud", mappedBy="solicitud")
     */

    private $misSolicitudes;

    /*
     * @var
     */

    private $solicitud;





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
     * Set titulo
     *
     * @param string $titulo
     *
     * @return solicitud
     */
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;

        return $this;
    }

    /**
     * Get titulo
     *
     * @return string
     */
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     *
     * @return solicitud
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     *
     * @return solicitud
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
     * Set usuarioSolicitante
     *
     * @param string $usuarioSolicitante
     *
     * @return usuarioSolicitante
     */
    public function setusuarioSolicitante($usuarioSolicitante)
    {
        $this->usuarioSolicitante = $usuarioSolicitante;

        return $this;
    }

    /**
     * Get usuarioSolicitante
     *
     * @return \string
     */
    public function getusuarioSolicitante()
    {
        return $this->usuarioSolicitante;
    }

    /**
     * Set usuarioAsignado
     *
     * @param string $usuarioAsignado
     *
     * @return usuarioAsignado
     */
    public function setusuarioAsignado($usuarioAsignado)
    {
        $this->usuarioAsignado = $usuarioAsignado;

        return $this;
    }

    /**
     * Get usuarioAsignado
     *
     * @return \string
     */
    public function getusuarioAsignado()
    {
        return $this->usuarioAsignado;
    }

    /**
     * Set estadoSolicitud
     *
     * @param string $estadoSolicitud
     *
     * @return estadoSolicitud
     */
    public function setestadoSolicitud($estadoSolicitud)
    {
        $this->estadoSolicitud = $estadoSolicitud;

        return $this;
    }

    /**
     * Get estadoSolicitud
     *
     * @return \string
     */
    public function getestadoSolicitud()
    {
        return $this->estadoSolicitud;
    }

    /**
     * Set campoAfine
     *
     * @param string $campoAfine
     *
     * @return campoAfine
     */
    public function setcampoAfine($campoAfine)
    {
        $this->campoAfine = $campoAfine;

        return $this;
    }

    /**
     * Get campoAfine
     *
     * @return \string
     */
    public function getcampoAfine()
    {
        return $this->campoAfine;
    }
}

