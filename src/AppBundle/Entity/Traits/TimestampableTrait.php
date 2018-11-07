<?php
/**
 * Created by PhpStorm.
 * User: dalius
 * Date: 18.11.7
 * Time: 10.27
 */

namespace AppBundle\Entity\Traits;

use Doctrine\ORM\Mapping as ORM;

trait TimestampableTrait{

    /**
     * @var
     * @ORM\Column(type="datetime")
     */
    protected $createdAt;

    /**
     * @var
     * @ORM\Column(type="datetime")
     */
    protected $updatedAt;

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @return mixed
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @param mixed $updatedAt
     * @ORM\PreUpdate()
     */
    public function setUpdatedAt()
    {
        $this->updatedAt = new \DateTime();
    }





}


