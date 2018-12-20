<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * usuario_campos_afines
 *
 * @ORM\Table(name="usuario_campos_afines")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UsuarioCamposAfinesRepository")
 */
class UsuarioCamposAfines
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
     * @var Usuario
     * @ORM\ManyToOne(targetEntity="Usuario", inversedBy="campoAfin")
     */
    private $usuarioId;


    /**
     * @var Usuario
     *
     *
     * @ORM\ManyToOne(targetEntity="Usuario", inversedBy="camposAfines")
     */

    private $campoAfin;


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
     * Set usuarioId
     *
     * @param string $usuarioId
     *
     * @return usuarioCamposAfines
     */
    public function setUsuarioId($usuarioId)
    {
        $this->usuarioId = $usuarioId;

        return $this;
    }

    /**
     * Get usuarioId
     *
     * @return string
     */
    public function getUsuarioId()
    {
        return $this->usuarioId;
    }

    /**
     * Set campoAfinId
     *
     * @param string $campoAfinId
     *
     * @return usuarioCamposAfines
     */
    public function setCampoAfinId($campoAfinId)
    {
        $this->campoAfinId = $campoAfinId;

        return $this;
    }

    /**
     * Get campoAfinId
     *
     * @return string
     */
    public function getCampoAfinId()
    {
        return $this->campoAfinId;
    }
}

