<?php
/**
 * @link      http://github.com/zetta-repo/tss-skeleton for the canonical source repository
 * @copyright Copyright (c) 2016 Zetta Code
 */

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zetta\DoctrineUtil\Entity\AbstractEntity;
use Zetta\ZendAuthentication\Entity\CredentialInterface;
use Zetta\ZendAuthentication\Entity\UserInterface;

/**
 * Credential
 *
 * @ORM\Entity
 * @ORM\Table(name="credentials")
 */
class Credential extends AbstractEntity implements CredentialInterface
{
    const TYPE_PASSWORD = 1;
    const TYPE_FACEBOOK = 2;
    const TYPE_API_TOKEN = 3;

    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="User", inversedBy="credentials")
     * @ORM\JoinColumn(nullable=false)
     **/
    protected $user;

    /**
     * @var integer
     *
     * @ORM\Column(type="smallint")
     */
    protected $type;

    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    protected $value;

    /**
     * @var bool
     *
     * @ORM\Column(type="boolean")
     */
    protected $active;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->active = true;
    }

    /**
     * Get the Credential id
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the Credential id
     * @param int $id
     * @return Credential
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Get the Credential user
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set the Credential user
     * @param User $user
     * @return Credential
     */
    public function setUser($user)
    {
        $this->user = $user;
        return $this;
    }

    /**
     * Get the Credential type
     * @return int
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set the Credential type
     * @param int $type
     * @return Credential
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * Get the Credential value
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set the Credential value
     * @param string $value
     * @return Credential
     */
    public function setValue($value)
    {
        $this->value = $value;
        return $this;
    }

    /**
     * Get the Credential active
     * @return bool
     */
    public function isActive()
    {
        return $this->active;
    }

    /**
     * Set the Credential active
     * @param bool $active
     * @return Credential
     */
    public function setActive($active)
    {
        $this->active = $active;
        return $this;
    }

    /**
     * Check a credential
     * @param UserInterface $user
     * @param CredentialInterface $credential
     * @return bool
     */
    public static function check(UserInterface $user, CredentialInterface $credential)
    {
        if ($user->getId() == $credential->getUser()->getId() && $user->isSignAllowed()) {
            return true;
        }

        return false;
    }
}
