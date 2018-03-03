<?php
/**
 * @access protected
 * @author Judzhin Miles <judzhin[at]gns-it.com>
 */

namespace MSBios\Authentication\Hybrid\Resource\Doctrine\Entity;

use Doctrine\ORM\Mapping as ORM;
use MSBios\Authentication\Hybrid\Resource\Doctrine\Entity;
use MSBios\Authentication\Hybrid\Resource\Record\ProviderInterface;
use MSBios\Guard\Resource\Doctrine\UserInterface;
use MSBios\Resource\Doctrine\RowStatusableAwareInterface;
use MSBios\Resource\Doctrine\RowStatusableAwareTrait;
use MSBios\Resource\Doctrine\TimestampableAwareInterface;
use MSBios\Resource\Doctrine\TimestampableAwareTrait;

/**
 * Class Provider
 * @package MSBios\Authentication\Hybrid\Resource\Doctrine\Entity
 * @ORM\Entity(repositoryClass="MSBios\Authentication\Hybrid\Resource\Doctrine\Repository\ProviderRepository")
 * @ORM\Table(name="acl_t_user_providers",
 *     indexes={
 *          @ORM\Index(name="rowstatus", columns={"rowstatus"})}
 *     )
 */
class Provider extends Entity implements
    ProviderInterface,
    TimestampableAwareInterface,
    RowStatusableAwareInterface
{
    use TimestampableAwareTrait;
    use RowStatusableAwareTrait;

    /**
     * @var UserInterface
     *
     * @ORM\ManyToOne(targetEntity="MSBios\Guard\Resource\Doctrine\UserInterface")
     * @ORM\JoinColumn(name="userid", referencedColumnName="id")
     */
    private $user;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=500, nullable=false)
     */
    private $identifier;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=500, nullable=false)
     */
    private $name = null;

    /**
     * @return UserInterface
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param UserInterface $user
     * @return $this
     */
    public function setUser(UserInterface $user)
    {
        $this->user = $user;
        return $this;
    }

    /**
     * @return string
     */
    public function getIdentifier()
    {
        return $this->identifier;
    }

    /**
     * @param string $identifier
     */
    public function setIdentifier($identifier)
    {
        $this->identifier = $identifier;
        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }
}
