<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Usuario;
use AppBundle\Entity\CampoAfin;
use AppBundle\Form\UsuarioType;
use AppBundle\Repository\campoAfinRepository;
use Doctrine\DBAL\Types\BooleanType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Config\Definition\IntegerNode;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormTypeInterface;

/**
 * @Route("/campoafin")
 */
class CampoAfinController extends Controller
{
    /**
     * @Route("/", name="campoafin_crear")
     */
    public function campoafinAction(Request $request)
    {

        $afin = new CampoAfin();
        $afin->getNombre("Profesion");


        $form = $this->createFormBuilder($afin)
            ->add('Nombre', TextType::class)
            ->add('Guardar', SubmitType::class, array('label' => 'Guardar'))
            ->getForm();
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $afin = $form->getData();
            $pasa = $this->getDoctrine()->getManager();
            $pasa->persist($afin);
            $pasa->flush();

            return $this->redirectToRoute('campoafin');
        }
            return $this->render('security/registro.html.twig', array('form' => $form->createView(),));




    }

    /**
     * @Route("/todos", name="homepagefin")
     *
     * @param Request $request
     */
    public function verCampoAction(Request $request)
    {

        $campoAfines = $this->getDoctrine()->getRepository(CampoAfin::class)->findAll();
        // replace this example code with whatever you need
        return $this->render('@App/Usuario/ver_campo.html.twig', ["campoAfines" => $campoAfines]);


    }



}
