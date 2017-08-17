<?php

namespace AppBundle\Controller;

use AppBundle\Entity\WorkHistory;
use AppBundle\Form\Type\WorkHistoryType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class WorkHistoryController
 * @package AppBundle\Controller
 */
class WorkHistoryController extends Controller
{

    /**
     * @Route("/workhistory/edit/{id}", name="workhistory_edit")
     */
    public function editAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $workhistory = $em->getRepository('AppBundle:WorkHistory')->find($id);

        if (!$workhistory) {
            throw $this->createNotFoundException(
                'No work history found for id '.$id
            );
        }

        $form = $this->createForm(WorkHistoryType::class, $workhistory);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em->persist($workhistory);
            $em->flush();
            return $this->redirectToRoute('workhistory');
        }

        return $this->render('AppBundle:WorkHistory:workhistory_edit.html.twig', [
            'workhistoryForm' => $form->createView()
        ]);
    }

    /**
     * @Route("/workhistory/delete/{id}", name="workhistory_delete")
     */
    public function deleteAction($id)
    {
        $workhistory = $this->getDoctrine()->getRepository('AppBundle:WorkHistory')->find($id);

        if (!$workhistory) {
            throw $this->createNotFoundException(
                'No work history found'
            );
        }

        $em = $this->getDoctrine()->getManager();
        $em->remove($workhistory);
        $em->flush();

        return $this->redirectToRoute('workhistory');
    }

    /**
     * @Route("/workhistory/new", name="workhistory_new")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function newAction(Request $request)
    {
        $workhistory = new WorkHistory();

        $form = $this->createForm(WorkHistoryType::class, $workhistory);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){

            $workhistory->setUser($this->getUser());

            $em = $this->getDoctrine()->getManager();
            $em->persist($workhistory);
            $em->flush();

            return $this->redirectToRoute('workhistory');
        }

        return $this->render('AppBundle:WorkHistory:workhistory_new.html.twig', [
            'workhistoryForm' => $form->createView()
        ]);
    }

    /**
     * @Route("/workhistory", name="workhistory")
     * @Template("AppBundle:WorkHistory:workhistory.html.twig")
     */
    public function viewWorkHistory()
    {
        $this->getUser();

        return [];
    }

}
