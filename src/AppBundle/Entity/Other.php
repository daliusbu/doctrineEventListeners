<?php
/**
 * Created by PhpStorm.
 * User: dalius
 * Date: 18.11.7
 * Time: 09.04
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use AppBundle\Entity\Traits\TimestampableTrait;

/**
 * Class Other
 *
 * @ORM\Entity()
 * @ORM\Table(name="other")
 * @ORM\HasLifecycleCallbacks()
 *
 * @package AppBundle\Entity
 */
class Other
{
    use TimestampableTrait;

    /**
     * @var
     * @ORM\Column(type="integer")
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var
     * @ORM\Column(type="integer")
     */
    protected $sonata;

    public function __construct()
    {
        $this->createdAt = new \DateTime();
        $this->updatedAt = new \DateTime();
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getSonata()
    {
        return $this->sonata;
    }

    /**
     * @param mixed $data
     */
    public function setSonata($data)
    {
        $this->sonata = $data;
    }







}