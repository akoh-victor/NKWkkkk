<?php

namespace AppBundle\Controller;
use AppBundle\Entity\Department;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Console\Question\Question;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name = "home")
     */
    public function indexAction(Request $request)
    {

        $Product = $this->getDoctrine()->getRepository('AppBundle:Product');

        //$mostRead=$Product->mostView('20');
       // $newArrivals = $Product->findAllRecentProducts('15');
        $newArrivals = $Product->findAllRecentProducts('15');
        $featuredProducts = $Product->findAllRecentProducts('15');
        $sponsoredProducts = $Product->findAllRecentProducts('15');



        return $this->render('default/index.html.twig', array(
            'newArrivals' => $newArrivals,
            'featuredProducts' => $featuredProducts,
            'sponsoredProducts' => $sponsoredProducts

        ));
    }

    /**
     * @Route("/admin", name = "admin")
     */
    public function adminIndexAction(Request $request)
    {

        $Department = $this->getDoctrine()
            ->getRepository('AppBundle:Department');
        $departments = $Department->findAllOrderedById();



        return $this->render('admin/index.html.twig', array(
        'departments'=>$departments,
        ));
    }


    /**
     * @Route("/brows/{id}", name="brows product")
     */
    public function browsProductAction($id)
    {

        $Product = $this->getDoctrine()->getRepository('AppBundle:Product');
        $product = $Product->find($id);

        $customersChoiceProducts = $Product->mostView('20');
        $sponsoredProducts = $Product->findAllRecentProducts('15');
        $similarProducts = $Product->findAllRecentProducts('15');

        //$rescentNews= $Product->findAllRescentPublish('19');



        if ($product) {

            $curView = $product->getView();
            $upView = $curView + 1;
            $product->setView($upView);

            $em = $this->getDoctrine()->getManager();
            $em->persist($product);
            $em->flush();

        }



        return $this->render('default/brows.html.twig', array(

            'selectedProduct' =>  $product,
            'customersChoiceProducts' => $customersChoiceProducts,
            'sponsoredProducts' => $sponsoredProducts,
            'similarProducts'=>$similarProducts

        ));
    }


    /**
     * @Route("/department/{id}", name = "department")
     */
    public function departmentAction(Request $request,$id)
    {
        $Department = $this->getDoctrine()->getRepository('AppBundle:Department');
        $department = $Department->find($id);

        $Product = $this->getDoctrine()->getRepository('AppBundle:Product');
        $customersChoiceProducts = $Product->mostView('20');


        $query = $query =  $Product->findDepartmentProduct($department);

        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $query, /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            8/*limit per page*/
        );

        return $this->render('default/department.html.twig', array(
            'pagination' => $pagination,
            'department'=>$department,
            'customersChoiceProducts'=>$customersChoiceProducts,
        ));
    }

    /**
     * @Route("/department/category/{categoryId}", name = "category")
     */
    public function categoryAction(Request $request,$categoryId)
    {
        $Department = $this->getDoctrine()->getRepository('AppBundle:Category');
        $category = $Department->find($categoryId);

        $Product = $this->getDoctrine()->getRepository('AppBundle:Product');
        $customersChoiceProducts = $Product->mostView('20');

        $query = $query =  $Product->findCategoryProduct($category);

        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $query, /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            8/*limit per page*/
        );

        return $this->render('default/category.html.twig', array(
            'pagination' => $pagination,
            'category'=>$category,
            'customersChoiceProducts'=>$customersChoiceProducts,
        ));
    }

    /**
     * @Route("/department/category/group/{groupId}", name = "group")
     */
    public function groupAction(Request $request,$groupId)
    {
        $Group = $this->getDoctrine()->getRepository('AppBundle:Group');
        $group = $Group->find($groupId);

        $Product = $this->getDoctrine()->getRepository('AppBundle:Product');
        $customersChoiceProducts = $Product->mostView('20');




        $query =  $Product->findGroupProduct($group);

        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $query, /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            8/*limit per page*/
        );

        return $this->render('default/group.html.twig', array(
            'pagination' => $pagination,
            'group'=>$group,
            'customersChoiceProducts'=>$customersChoiceProducts,
        ));
    }

    /**
     * @Route("/admin/email", name = "email")
     */
    public function checkemailAction(Request $request)
    {

        return $this->render('admin/email.html.twig', array());

    }

}