<?php
namespace AppBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SecurityController extends AbstractController
{
//    /**
//     * @Route("/login", name="login")
//     * @param AuthenticationUtils $authenticationUtils
//     * @return \Symfony\Component\HttpFoundation\Response
//     */
    public function login(AuthenticationUtils $authenticationUtils)
    {

        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();
        return $this->render('@App/Security/login.html.twig', array(
            'last_username' => $lastUsername,
            'error' => $error,
        ));
    }
    /**
     * @Route("/logout", name="logout")
     */
    public function logoutAction(Request $request)
    {
        // return $this->redirectToRoute('login');
    }
}