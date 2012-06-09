<?php

namespace deSymfony\DemoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Comment Model
 *
 * @ORM\Entity()
 * @ORM\Table(name="ds_comment")
 */
class Comment
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="deSymfony\DemoBundle\Entity\User", cascade={"remove"})
     */
    protected $author;

    /**
     * @ORM\Column(type="string", name="comment")
     */
    protected $comment;

    /**
     * @ORM\Column(type="datetime", name="created_at")
     */
    protected $createdAt;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set comment
     *
     * @param string $comment
     */
    public function setComment($comment)
    {
        $this->comment = $comment;
    }

    /**
     * Get comment
     *
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Set createdAt
     *
     * @param datetime $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * Get createdAt
     *
     * @return datetime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set author
     *
     * @param deSymfony\DemoBundle\Entity\User $author
     */
    public function setAuthor(\deSymfony\DemoBundle\Entity\User $author)
    {
        $this->author = $author;
    }

    /**
     * Get author
     *
     * @return deSymfony\DemoBundle\Entity\User
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Convenient method to set properties
     *
     * @param array $data
     */
    public function fromArray(array $data)
    {
        foreach ($data as $key => $value) {
            $this->{'set'.ucfirst($key)}($value);
        }
    }
}
