<?php

namespace AppBundle\Form;

use AppBundle\Entity\Usuario;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;


class UsuarioType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre',TextType::class,array("label"=>"Nombre: ","required"=>"required","attr"=>array("class"=>"form-control")))
            ->add('email',EmailType::class,array("label"=>"Email: ","required"=>"required","attr"=>array("class"=>"form-control")))
            ->add('apellido',TextType::class,array("label"=>"Apellido: ","required"=>"required","attr"=>array("class"=>"form-control")))
            ->add('password',PasswordType::class,array("label"=>"Contraseña: ","required"=>"required","attr"=>array("class"=>"form-control")))
            ->add('registrarse', SubmitType::class,array("attr"=>array("class"=>"btn btn-primary")))
        ;
        //           ->add('habilitado');
    }/**
 * {@inheritdoc}
 */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Usuario'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_usuario';
    }


}
