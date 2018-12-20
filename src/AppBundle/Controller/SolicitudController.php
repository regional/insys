<?php

namespace AppBundle\Controller;


use AppBundle\Entity\CampoAfin;
use AppBundle\Entity\Solicitud;
use AppBundle\Form\SolicitudType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/")
 */
class SolicitudController extends Controller
{
    /**
     * @Route("/solicitudes", name="solicitudes")
     */
    public function indexAction(Request $request)
    {
        $solicitud = new solicitud();
        $form = $this->createForm(SolicitudType::class, $solicitud);
        $form->handleRequest($request);
#        $solicitud->setusuarioSolicitante();

        $solicitud = $this->getDoctrine()->getRepository(Solicitud::class)->findAll();

        // replace this example code with whatever you need
        return $this->render('@App/Solicitudes/solicitudes.html.twig', [
            "solicitudes" => $solicitud
        ]);
    }

    /**
     * @Route("/misSolicitudes", name="misSolicitudes")
     */
    public function misSolicitudesAction(Request $request)
    {
        $solicitud = new solicitud();
        $form = $this->createForm(SolicitudType::class, $solicitud);
        $form->handleRequest($request);
#        $solicitud->setusuarioSolicitante();

        $solicitud = $this->getDoctrine()->getRepository(Solicitud::class)->findAll();

        // replace this example code with whatever you need
        return $this->render('@App/Solicitudes/solicitudes.html.twig', [
            "solicitudes" => $solicitud
        ]);
    }

    /**
     * @Route("/SolicitudesEnProceso", name="SolicitudesEnProceso")
     */
    public function SolicitudesEnProcesoAction(Request $request)
    {
        $solicitud = new solicitud();
        $form = $this->createForm(SolicitudType::class, $solicitud);
        $form->handleRequest($request);
#        $solicitud->setusuarioSolicitante();

        $solicitud = $this->getDoctrine()->getRepository(Solicitud::class)->findAll();

        // replace this example code with whatever you need
        return $this->render('@App/Solicitudes/solicitudes.html.twig', [
            "solicitudes" => $solicitud
        ]);
    }

    /**
     * @Route("/nueva_solicitud", name="nueva_solicitud")
     */
    public function indexAction2(Request $request)
    {
            $camposafines = $this->getDoctrine()->
            getRepository(CampoAfin::class)
                ->findAll();
//        $solicitud = new solicitud();
//        $form = $this->createForm(SolicitudType::class, $solicitud);
//        $form->handleRequest($request);
//
//
//        if ($form->isSubmitted() && $form->isValid()) {
//
//            $manejadorDb = $this->getDoctrine() ->getManager();
//            $manejadorDb->persist($solicitud);
//            $manejadorDb->flush();
//
//            return $this->redirectToRoute('solicitudes');
//        }

        // replace this example code with whatever you need
        return $this->render('@App/Solicitudes/crear_solicitud.html.twig', ['camposafines' => $camposafines]);
    }

    /**
     * @Route("/nueva_solicitud/{id}/edit", name="edit_nueva_solicitud")
     */
    public function editEstado(Request $request, Solicitud $solicitud)
    {
        $form = $this->createForm(SolicitudType::class, $solicitud);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $manejadorDb = $this->getDoctrine() ->getManager();
            $manejadorDb->flush();

            return $this->redirectToRoute('solicitudes');
        }



        // replace this example code with whatever you need
        return $this->render('@App/Solicitudes/crear_solicitud.html.twig', ['form' => $form->createView()]);
    }

    /**
     * @Route("/solicitudes/{id}", name="delete_solicitudes")
     */
    public function deleteEstado(Request $request, Solicitud $solicitud)
    {
        $manejadorDb=$this->getDoctrine()->getManager();

        if($solicitud && is_object($solicitud)){
            $manejadorDb->remove($solicitud);
            $manejadorDb->flush();

        }
        return $this->redirectToRoute('solicitudes');

        // replace this example code with whatever you need
        return $this->render('@App/Solicitudes/solicitudes.html.twig');
    }

    /**
     * @Route("/rest/solicitudes", name="get_solicitudes", methods={"GET"})
     */
    public function getAllSolicitudes(Request $request)
    {
        $solicitud = $this->getDoctrine()
            ->getRepository(Solicitud::class)
            ->findAll();

        $solicitud = $this->get('serializer')->serialize($solicitud,'json');

        $dataJson = json_decode($solicitud, true);
        return new JsonResponse($dataJson);
    }

    /**
     * @Route("/rest/solicitudes", name="guardar_solicitudes", methods={"POST"})
     */
    public function crearSolicitudes(Request $request)
    {
        $data = $request->getContent();
        $data = json_decode($data, true);
        return new JsonResponse($data,400);
        //dump($data);
        //die;
        $solicitud = new Solicitud();

#        $campoAfin->setNombre($data["nombre"]);

        $form = $this->createForm(EstatusType::class, $solicitud);
        $form->submit($data);

        if($form->isValid()){
            $manejadorDb = $this->getDoctrine() ->getManager();
            $manejadorDb->persist($solicitud);
            $manejadorDb->flush();
        }else{
            return new JsonResponse(null,400);
        }


        $solicitud = $this->get('serializer')->serialize($solicitud,'json');

        $dataJson = json_decode($solicitud, true);
        return new JsonResponse($dataJson);

#        $areaAfines = $this->getDoctrine()
#            ->getRepository(CampoAfin::class)
#            ->findAll();

#        $areaAfines = $this->get('serializer')->serialize($areaAfines,'json');

#        $dataJson = json_decode($areaAfines, true);
#        return new JsonResponse($dataJson);
    }
}
