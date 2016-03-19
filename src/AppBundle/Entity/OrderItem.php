<?php

namespace AppBundle\Entity;

use Sylius\Component\Cart\Model\CartItem as SyliusCartItem;
use Doctrine\ORM\Mapping as ORM;

use Vich\UploaderBundle\Mapping\Annotation as Vich;


/**
 * @ORM\Entity
 * @ORM\Table(name="app_order_item")
 */
class OrderItem extends SyliusCartItem
{
    /**
     * @var Product
     */
    private $prod;

    /**
     * @return Product
     */
    public function getProduct()
    {
        return $this->prod;
    }

    /**
     * @param Product $prod
     */
    public function setProduct(Product $prod)
    {
        $this->product = $prod;
    }




     //relationship
    /**
     * @ORM\ManyToOne(targetEntity="Product", inversedBy="ordehritem")
     * @ORM\JoinColumn(name="product_id", referencedColumnName="id", nullable = false)
     */
    protected $product;



}