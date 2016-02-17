<?php

namespace AppBundle\Controller\admin;

use AppBundle\Entity\Product;

use AppBundle\Form\Type\ProductType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;


class ProductController extends Controller
{
    /**
     * @Route("/admin/product/create/{group_id}", name="create group product")
     */
    public function groupProductCreateAction(Request $request,$group_id)
    {

        $Group = $this->getDoctrine()->getRepository('AppBundle:Group');

        $group =  $Group->findOneById($group_id);

        $product = new Product();

        $form = $this->createForm(new ProductType(), $product)
            ->add('save', 'submit', array(
                'label' => 'Save',
                'attr'=>array('class'=>'btn btn-md btn-info')
            ));

        $form->handleRequest($request);

        if ($form->isValid()) {
            $openingStock = $product->getOpeningQuantity();
            $openingPrice = $product->getPrice();
            $product->setOrder(0);
            $product->setStock($openingStock);
            $product->setEntry(new \DateTime());
            $product->setCreated(new \DateTime());
            $product->setOpeningPrice($openingPrice);
            $product->setDiscontinue(0);
            $product->setView(0);
            $product->setGroup($group);


            $em = $this->getDoctrine()->getManager();
            $em->persist($product);
            $em->flush();
            return $this->redirect($this->generateUrl('create group product',
                array('group_id' => $group_id, )));
        }

        return $this->render('admin/product.html.twig', array(
            'form' => $form ->createView(),
        ));
    }

}