<?php

namespace AppBundle\Controller;


use AppBundle\Entity\CampoAfin;
use AppBundle\Form\CampoAfinType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


class CampoAfinController extends Controller
{
    /**
     * @Route("/campos_afines", name="campos_afines")
     */
    public function indexAction(Request $request)
    {
        $campoAfin = new campoAfin();
        $form = $this->createForm(CampoAfinType::class, $campoAfin);
        $form->handleRequest($request);

        $campoAfin = $this->getDoctrine()->getRepository(CampoAfin::class)->findAll();



        // replace this example code with whatever you need
        return $this->render('@App/CamposAfines/campos_afines.html.twig', [
            "camposafines" => $campoAfin
        ]);
    }

    /**
     * @Route("/nuevo_campos_afines", name="nuevo_campos_afines")
     */
    public function indexAction2(Request $request)
    {
        $campoAfin = new campoAfin();
        $form = $this->createForm(CampoAfinType::class, $campoAfin);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $manejadorDb = $this->getDoctrine() ->getManager();
            $manejadorDb->persist($campoAfin);
            $manejadorDb->flush();

            return $this->redirectToRoute('campos_afines');
        }



        // replace this example code with whatever you need
        return $this->render('@App/CamposAfines/crear_campo_afin.html.twig', ['form' => $form->createView()]);
    }

    /**
     * @Route("/nuevo_campos_afines/{id}/edit", name="edit_campos_afines")
     */
    public function editCampo(Request $request, CampoAfin $campoAfin)
    {
        $form = $this->createForm(CampoAfinType::class, $campoAfin);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $manejadorDb = $this->getDoctrine() ->getManager();
            $manejadorDb->flush();

            return $this->redirectToRoute('campos_afines');
        }



        // replace this example code with whatever you need
        return $this->render('@App/CamposAfines/crear_campo_afin.html.twig', ['form' => $form->createView()]);
    }

    /**
     * @Route("/campos_afines/{id}", name="delete_campos_afines")
     */
    public function deleteCampo(Request $request, CampoAfin $campoAfin)
    {
        $manejadorDb=$this->getDoctrine()->getManager();

        if($campoAfin && is_object($campoAfin)){
        $manejadorDb->remove($campoAfin);
        $manejadorDb->flush();

        }
        return $this->redirectToRoute('campos_afines');

        // replace this example code with whatever you need
        return $this->render('@App/CamposAfines/campos_afines.html.twig');
    }

    /**
     * @Route("/rest/campos_afines", name="get_campos_afines", methods={"GET"})
     */
    public function getAllCamposAfines(Request $request)
    {
        $areaAfines = $this->getDoctrine()
            ->getRepository(CampoAfin::class)
            ->findAll();

        $areaAfines = $this->get('serializer')->serialize($areaAfines,'json');

        $dataJson = json_decode($areaAfines, true);
        return new JsonResponse($dataJson);
    }

    /**
     * @Route("/rest/campos_afines", name="guardar_campos_afines", methods={"POST"})
     */
    public function crearCamposAfines(Request $request)
    {
        $data = $request->getContent();
        $data = json_decode($data, true);

        $campoAfin = new campoAfin();

#        $campoAfin->setNombre($data["nombre"]);

        $form = $this->createForm(CampoAfinType::class, $campoAfin);
        $form->submit($data);

        if($form->isValid()){
            $manejadorDb = $this->getDoctrine() ->getManager();
            $manejadorDb->persist($campoAfin);
            $manejadorDb->flush();
        }else{
            return new JsonResponse(null,400);
        }


        $campoAfin = $this->get('serializer')->serialize($campoAfin,'json');

        $dataJson = json_decode($campoAfin, true);
        return new JsonResponse($dataJson);

#        $areaAfines = $this->getDoctrine()
#            ->getRepository(CampoAfin::class)
#            ->findAll();

#        $areaAfines = $this->get('serializer')->serialize($areaAfines,'json');

#        $dataJson = json_decode($areaAfines, true);
#        return new JsonResponse($dataJson);
    }
}