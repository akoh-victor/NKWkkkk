<?php

namespace AppBundle\Controller\admin;

use AppBundle\Entity\Category;
use AppBundle\Entity\Department;
use AppBundle\Form\Type\CategoryType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;


class CategoryController extends Controller
{
    /**
     * @Route("/admin/category/create/{dept_id}", name="create department category")
     */
    public function departmentCategoryCreateAction(Request $request,$dept_id)
    {

        $Department = $this->getDoctrine()->getRepository('AppBundle:Department');

        $department =  $Department->findOneById($dept_id);

        $category = new Category();

        $form = $this->createForm(new CategoryType(), $category)
            ->add('save', 'submit', array(
                'label' => 'Save',
                'attr'=>array('class'=>'btn btn-md btn-info')
            ));

        $form->handleRequest($request);

        if ($form->isValid()) {

            $category->setPosition(1);
            $category->setDepartment($department);
            $em = $this->getDoctrine()->getManager();
            $em->persist($category);
            $em->flush();
            return $this->redirect($this->generateUrl('create department category',
                array('dept_id' => $dept_id, )));
        }

        return $this->render('admin/category.html.twig', array(
            'form' => $form ->createView(),
        ));
    }


    /**
     * @Route("/admin/category/create", name="create category")
     */
    public function categoryCreateAction(Request $request)
    {



        $category = new Category();

        $form = $this->createForm(new CategoryType(), $category)
            ->add('department','entity', array(
                'class'=>'AppBundle:Department',
                'property'=>'name',
            ))
            ->add('save', 'submit', array(
                'label' => 'Save',
                'attr'=>array('class'=>'btn btn-md btn-info')
            ));

        $form->handleRequest($request);

        if ($form->isValid()) {

            $category->setPosition(1);
            $em = $this->getDoctrine()->getManager();
            $em->persist($category);
            $em->flush();
            return $this->redirect($this->generateUrl('create category'));
        }

        return $this->render('admin/category.html.twig', array(
            'form' => $form ->createView(),
        ));
    }
}