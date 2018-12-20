<?php

namespace AppBundle\Controller;


use AppBundle\Entity\Estatus;
use AppBundle\Form\EstatusType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


class EstatusContoller extends Controller
{
    /**
     * @Route("/estados", name="estados")
     */
    public function indexAction(Request $request)
    {
        $estado = new Estatus();
        $form = $this->createForm(EstatusType::class, $estado);
        $form->handleRequest($request);

        $estado = $this->getDoctrine()->getRepository(Estatus::class)->findAll();

        // replace this example code with whatever you need
        return $this->render('@App/Estados/estados.html.twig', [
            "estados" => $estado
        ]);
    }

    /**
     * @Route("/nuevo_estado", name="nuevo_estado")
     */
    public function indexAction2(Request $request)
    {
        $estado = new Estatus();
        $form = $this->createForm(EstatusType::class, $estado);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $manejadorDb = $this->getDoctrine() ->getManager();
            $manejadorDb->persist($estado);
            $manejadorDb->flush();

            return $this->redirectToRoute('estados');
        }

        // replace this example code with whatever you need
        return $this->render('@App/Estados/crear_estado.html.twig', ['form' => $form->createView()]);
    }

    /**
     * @Route("/nuevo_estado/{id}/edit", name="edit_nuevo_estado")
     */
    public function editEstado(Request $request, Estatus $estado)
    {
        $form = $this->createForm(EstatusType::class, $estado);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $manejadorDb = $this->getDoctrine() ->getManager();
            $manejadorDb->flush();

            return $this->redirectToRoute('estados');
        }



        // replace this example code with whatever you need
        return $this->render('@App/Estados/crear_estado.html.twig', ['form' => $form->createView()]);
    }

    /**
     * @Route("/estados/{id}", name="delete_estados")
     */
    public function deleteEstado(Request $request, Estatus $estado)
    {
        $manejadorDb=$this->getDoctrine()->getManager();

        if($estado && is_object($estado)){
            $manejadorDb->remove($estado);
            $manejadorDb->flush();

        }
        return $this->redirectToRoute('estados');

        // replace this example code with whatever you need
        return $this->render('@App/Estados/estados.html.twig');
    }

    /**
     * @Route("/rest/estados", name="get_estados", methods={"GET"})
     */
    public function getAllEstados(Request $request)
    {
        $estados = $this->getDoctrine()
            ->getRepository(CampoAfin::class)
            ->findAll();

        $estados = $this->get('serializer')->serialize($estados,'json');

        $dataJson = json_decode($estados, true);
        return new JsonResponse($dataJson);
    }

    /**
     * @Route("/rest/estados", name="guardar_estados", methods={"POST"})
     */
    public function crearEstados(Request $request)
    {
        $data = $request->getContent();
        $data = json_decode($data, true);

        $estado = new Estatus();

#        $campoAfin->setNombre($data["nombre"]);

        $form = $this->createForm(EstatusType::class, $estado);
        $form->submit($data);

        if($form->isValid()){
            $manejadorDb = $this->getDoctrine() ->getManager();
            $manejadorDb->persist($estado);
            $manejadorDb->flush();
        }else{
            return new JsonResponse(null,400);
        }


        $estado = $this->get('serializer')->serialize($estado,'json');

        $dataJson = json_decode($estado, true);
        return new JsonResponse($dataJson);

#        $areaAfines = $this->getDoctrine()
#            ->getRepository(CampoAfin::class)
#            ->findAll();

#        $areaAfines = $this->get('serializer')->serialize($areaAfines,'json');

#        $dataJson = json_decode($areaAfines, true);
#        return new JsonResponse($dataJson);
    }
}