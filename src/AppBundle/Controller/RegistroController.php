<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Usuario;
use AppBundle\Form\UsuarioType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class RegistroController extends Controller
{
    /**
     * @Route("/registro", name="registro")
     */
    public function registroAction(Request $request, UserPasswordEncoderInterface $encoder)
    {
        $usuario = new usuario();
        $form = $this->createForm(UsuarioType::class, $usuario);

#        $usuario->setNombre($form->get("nombre")->getData());
#        $usuario->setApellido($form->get("apellido")->getData());
#        $usuario->setEmail($form->get("email")->getData());
        $usuario->setHabilitado(true);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $encoder = $encoder->encodePassword($usuario, $usuario->getPassword());
            $usuario ->setPassword($encoder);

            $manejadorDb = $this->getDoctrine() ->getManager();
            $manejadorDb->persist($usuario);
            $manejadorDb->flush();

            return $this->redirectToRoute('login');
        }
        // replace this example code with whatever you need
        return $this->render('@App/Usuario/registro.html.twig',
            array("form"=>$form->createView()));
    }


}
