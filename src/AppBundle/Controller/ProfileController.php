<?php

namespace AppBundle\Controller;


/*use AppBundle\Form\Type\PromoType;*/
use FOS\UserBundle\Controller\ProfileController as baseProfiler;
use FOS\UserBundle\FOSUserEvents;
use FOS\UserBundle\Event\FormEvent;
use FOS\UserBundle\Event\FilterUserResponseEvent;
use FOS\UserBundle\Event\GetResponseUserEvent;
use FOS\UserBundle\Model\UserInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;



class ProfileController extends baseProfiler
{
    /**
     * @Route("/profile/show", name="show profile")
     */
    public function showAction()
    {
        $user = $this->getUser();
        if (!is_object($user) || !$user instanceof UserInterface) {
            throw new AccessDeniedException('This user does not have access to this section.');
        }

        return $this->render('default/profile.html.twig', array(
            'user' => $user
        ));
    }
}