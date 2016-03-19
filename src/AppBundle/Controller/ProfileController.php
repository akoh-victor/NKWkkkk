<?php

namespace AppBundle\Controller;



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
     * @Route("/profile", name="showProfile")
     */
    public function showProfileAction()
    {
        $user = $this->getUser();
        if (!is_object($user) || !$user instanceof UserInterface) {
            throw new AccessDeniedException('This user does not have access to this section.');
        }

        /*get settings and check for the default profile
         if default profile page is account
           set url to account page
         else if default profile page is activities
           set url to activities
          */
        //default hardcoded url == account
        $url="/profile/account.html.twig";

        return $this->render('default/profile.html.twig', array(
            'user' => $user,
            'default'=>$url

        ));
    }




    /**
     * @Route("/profile/account", name="showProfileAccount")
     */
    public function showAccountAction()
    {
        $user = $this->getUser();
        if (!is_object($user) || !$user instanceof UserInterface) {
            throw new AccessDeniedException('This user does not have access to this section.');
        }

        $url="1";

        return $this->render('default/profile.html.twig', array(
            'user' => $user,
            'account'=>$url

        ));
    }
    /**
     * @Route("/profile/activities", name="showProfileActivities")
     */
    public function showActivityAction()
    {
        $user = $this->getUser();
        if (!is_object($user) || !$user instanceof UserInterface) {
            throw new AccessDeniedException('This user does not have access to this section.');
        }
        $url="1";
        return $this->render('default/profile.html.twig', array(
            'user' => $user,
            'activities'=>$url
        ));
    }
}