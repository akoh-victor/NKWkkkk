<?php

namespace AppBundle\Controller\admin;

use AppBundle\Entity\Advert;

use AppBundle\Form\Type\AdvertType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;

class AdvertController extends Controller
{
    /**
     * @Route("/admin/advert", name="")
     */
    public function indexAction(Request $request)
    {
        $Advert = $this->getDoctrine()
            ->getRepository('AppBundle:Advert');
        $rescentAdvert = $Advert->findAllRescentPublish('20');

        if (!$Advert)
        { throw
        $this->createNotFoundException( 'No Advert found' );
        }

        $advert = new Advert();
        $form = $this->createForm(new AdvertType(), $advert);
        $form->handleRequest($request);

        if ($form->isValid()) {

            $advert->setPublishDate(new \DateTime());
            $advert->setExpire(0);
            $advert->setView(1);

            $em = $this->getDoctrine()->getManager();
            $em->persist($advert);
            $em->flush();
            return $this->redirect($this->generateUrl('create news'));
        }
        return $this->render('admin/news.html.twig', array(
            'form' => $form ->createView(),
            'rescentAdvert'=>$rescentAdvert,
            'news'=>$advert,
        ));
    }




    /**
     * @Route("admin/news/edit/{id}", name="manage news")
     */

    public function editAction($id){
        $em = $this->getDoctrine()->getEntityManager();
        $Advert  = $em->getRepository('AppBundle:Advert')->find($id);
        $rescentAdvert = $em->getRepository('AppBundle:Advert')->findAllRescentPublish('20');

        $request = $this->get('request');

        if (is_null($id)) {
            $postData = $request->get('news');
            $id = $postData['id'];
        }
        $form = $this->createForm(new AdvertType(), $Advert);

        if ($request->getMethod() == 'POST') {
            $form->bind($request);

            if ($form->isValid()) {

                $em = $this->getDoctrine()->getManager();
                $em->persist($Advert);
                $em->flush();

                return $this->redirect($this->generateUrl('create news'));
            }
        }

        return $this->render('admin/news.html.twig', array( 'form' => $form ->createView(), 'rescentAdvert'=>$rescentAdvert, ));
    }



}
