<?php
/**
 * @access protected
 * @author Judzhin Miles <judzhin[at]gns-it.com>
 */

namespace MSBios\Authentication\Hybrid\Resource\Doctrine\Entity;

use Doctrine\ORM\Mapping as ORM;
use MSBios\Authentication\Hybrid\Resource\Doctrine\Entity;
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
     * @ORM\Column(name="access_token", type="string", length=500, nullable=true)
     */
    private $accessToken = null;

    /**
     * @var string
     *
     * @ORM\Column(name="access_token_secret", type="string", length=500, nullable=true)
     */
    private $accessTokenSecret = null;

    /**
     * @var string
     *
     * @ORM\Column(name="refresh_token", type="string", length=500, nullable=true)
     */
    private $refreshToken = null;

    /**
     * @var string
     *
     * @ORM\Column(name="expiresin", type="string", length=500, nullable=true)
     */
    private $expiresIn = null;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="expiresat", type="datetime", nullable=true)
     */
    private $expiresAt;

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        $this->expiresAt = new \DateTime;
    }

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
    public function getAccessToken()
    {
        return $this->accessToken;
    }

    /**
     * @param $accessToken
     * @return $this
     */
    public function setAccessToken($accessToken)
    {
        $this->accessToken = $accessToken;
        return $this;
    }

    /**
     * @return string
     */
    public function getAccessTokenSecret()
    {
        return $this->accessTokenSecret;
    }

    /**
     * @param $accessTokenSecret
     * @return $this
     */
    public function setAccessTokenSecret($accessTokenSecret)
    {
        $this->accessTokenSecret = $accessTokenSecret;
        return $this;
    }

    /**
     * @return string
     */
    public function getRefreshToken()
    {
        return $this->refreshToken;
    }

    /**
     * @param $refreshToken
     * @return $this
     */
    public function setRefreshToken($refreshToken)
    {
        $this->refreshToken = $refreshToken;
        return $this;
    }

    /**
     * @return string
     */
    public function getExpiresIn()
    {
        return $this->expiresIn;
    }

    /**
     * @param $expiresIn
     * @return $this
     */
    public function setExpiresIn($expiresIn)
    {
        $this->expiresIn = $expiresIn;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getExpiresAt()
    {
        return $this->expiresAt;
    }

    /**
     * @param \DateTime $expiresAt
     */
    public function setExpiresAt($expiresAt)
    {
        $this->expiresAt = $expiresAt;
    }
}
