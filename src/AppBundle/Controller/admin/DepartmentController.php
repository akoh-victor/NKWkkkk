<?php

namespace AppBundle\Controller\admin;

use AppBundle\Entity\Department;

use AppBundle\Form\Type\DepartmentType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;


class DepartmentController extends Controller
{
    /**
     * @Route("/admin/department/create", name="create department")
     */
    public function departmentCreateAction(Request $request)
    {

        $department = new Department();
        $form = $this->createForm(new DepartmentType(), $department)
        ->add('save', 'submit', array(
        'label' => 'Save',
        'attr'=>array('class'=>'btn btn-md btn-info')

          ));

        $form->handleRequest($request);

        if ($form->isValid()) {
            // am using the id as position until i upgrade to generating new position
            $curPosition = $department->getId();
            $department->setPosition( $curPosition);
            $em = $this->getDoctrine()->getManager();
            $em->persist($department);
            $em->flush();
            return $this->redirect($this->generateUrl('create department'));
        }


        return $this->render('admin/department.html.twig', array(
            'form' => $form ->createView(),

        ));
    }


}