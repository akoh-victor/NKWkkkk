<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sylius\Component\Cart\Model\CartItem as BaseCartItem;
use Symfony\Component\Validator\Constraints as Assert;



/**
 * @ORM\Entity
 * @ORM\Table(name="cart_items")
 */

class CartItem extends BaseCartItem
{
    private $product;

    public function getProduct()
    {
        return $this->product;
    }

    public function setProduct(Product $product)
    {
        $this->product = $product;
    }


    //relationships

    /**
     * @ORM\ManyToOne(targetEntity="Product", inversedBy="cartItem")
     * @ORM\JoinColumn(name="product_id", referencedColumnName="id")
     */
    protected $prod;

}
