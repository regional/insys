<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class SolicitudType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titulo', TextType::class,array("label"=>"Titulo: ","required"=>"required","attr"=>array("class"=>"form-control")))
            ->add('descripcion',TextareaType::class,array("label"=>"Descripción: ","required"=>"required","attr"=>array("class"=>"form-control")))
            #->add('fecha',DateType::class,array("label"=>"Titulo: ","required"=>"required","attr"=>array("class"=>"form-control")))
            #->add('usuarioSolicitante')
            #->add('usuarioAsignado')
            #->add('estadoSolicitud')
            #->add('campoAfine')
            ->add('guardar', SubmitType::class,array("attr"=>array("class"=>"btn btn-primary")))
        ;
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Solicitud'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_solicitud';
    }


}
