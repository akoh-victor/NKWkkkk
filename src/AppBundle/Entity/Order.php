<?php
namespace AppBundle\Entity;

use Sylius\Component\Cart\Model\Cart as SyliusCart;
use Doctrine\ORM\Mapping as ORM;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity
 * @ORM\Table(name="app_order")
 */
class Order extends SyliusCart
{
    /**
     * @ORM\Column(type="string",nullable = true)
     */
    private $email;


    //relationship
    /**
     *  @ORM\OneToMany(targetEntity="Sylius\Component\Order\Model\OrderItemInterface", mappedBy="order")
     */
    protected $items;

    /**
     *  @ORM\OneToMany(targetEntity="Sylius\Component\Order\Model\AdjustmentInterface", mappedBy="order")
     */
    protected $adjustments;











    /**
    * @return string
    */
    public function getEmail()
    {
    return $this->email;
    }

    /**
    * @param string $email
    */
    public function setEmail($email)
    {
    $this->email = $email;
    }
}