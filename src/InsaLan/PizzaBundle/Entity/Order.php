<?php
namespace InsaLan\PizzaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

use Gedmo\Mapping\Annotation as Gedmo;
use Gedmo\Timestampable\Traits\TimestampableEntity;

/**
 * @ORM\Entity(repositoryClass="InsaLan\PizzaBundle\Entity\OrderRepository")
 * @ORM\Table(name="`Order`")
 */
class Order
{
    use TimestampableEntity;

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\OneToMany(targetEntity="UserOrder", mappedBy="order")
     */
    protected $orders;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $expiration;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $delivery;

    /**
     * @ORM\Column(type="integer")
     */
    protected $capacity;

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
     * Set name
     *
     * @param string $name
     * @return Order
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set expiration
     *
     * @param \DateTime $expiration
     * @return Order
     */
    public function setExpiration($expiration)
    {
        $this->expiration = $expiration;

        return $this;
    }

    /**
     * Get expiration
     *
     * @return \DateTime
     */
    public function getExpiration()
    {
        return $this->expiration;
    }

    /**
     * Set delivery
     *
     * @param \DateTime $delivery
     * @return Order
     */
    public function setDelivery($delivery)
    {
        $this->delivery = $delivery;

        return $this;
    }

    /**
     * Get delivery
     *
     * @return \DateTime
     */
    public function getDelivery()
    {
        return $this->delivery;
    }

    /**
     * Set capacity
     *
     * @param integer $capacity
     * @return Order
     */
    public function setCapacity($capacity)
    {
        $this->capacity = $capacity;

        return $this;
    }

    /**
     * Get capacity
     *
     * @return integer
     */
    public function getCapacity()
    {
        return $this->capacity;
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->orders = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add orders
     *
     * @param \InsaLan\PizzaBundle\Entity\UserOrder $orders
     * @return Order
     */
    public function addOrder(\InsaLan\PizzaBundle\Entity\UserOrder $orders)
    {
        $this->orders[] = $orders;

        return $this;
    }

    /**
     * Remove orders
     *
     * @param \InsaLan\PizzaBundle\Entity\UserOrder $orders
     */
    public function removeOrder(\InsaLan\PizzaBundle\Entity\UserOrder $orders)
    {
        $this->orders->removeElement($orders);
    }

    /**
     * Get orders
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getOrders()
    {
        return $this->orders;
    }
}
