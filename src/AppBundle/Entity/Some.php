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
 * Class Some
 *
 * @ORM\Entity()
 * @ORM\Table(name="some")
 * @ORM\HasLifecycleCallbacks()
 *
 * @package AppBundle\Entity
 */
class Some
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
    protected $data;

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
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param mixed $data
     */
    public function setData($data)
    {
        $this->data = $data;
    }







}