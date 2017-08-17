<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Qualification;
use AppBundle\Form\Type\QualificationType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class EducationController
 * @package AppBundle\Controller
 */
class EducationController extends Controller
{

    /**
     * @Route("/education/edit/{id}", name="education_edit")
     */
    public function editAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $qualification = $em->getRepository('AppBundle:Qualification')->find($id);

        if (!$qualification) {
            throw $this->createNotFoundException(
                'No qualification found for id '.$id
            );
        }

        $form = $this->createForm(QualificationType::class, $qualification);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em->persist($qualification);
            $em->flush();
            return $this->redirectToRoute('education');
        }

        return $this->render('AppBundle:Education:education_edit.html.twig', [
            'qualificationForm' => $form->createView()
        ]);

    }

    /**
     * @Route("/education/delete/{id}", name="education_delete")
     */
    public function deleteAction($id)
    {
        $qualification = $this->getDoctrine()->getRepository('AppBundle:Qualification')->find($id);

        if (!$qualification) {
            throw $this->createNotFoundException(
                'No qualification found'
            );
        }

        $em = $this->getDoctrine()->getManager();
        $em->remove($qualification);
        $em->flush();

        return $this->redirectToRoute('education');
    }

    /**
     * @Route("/education/new", name="education_new")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function newAction(Request $request)
    {
        $qualification = new Qualification();

        $form = $this->createForm(QualificationType::class, $qualification);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){

            $qualification->setUser($this->getUser());

            $em = $this->getDoctrine()->getManager();
            $em->persist($qualification);
            $em->flush();

            return $this->redirectToRoute('education');
        }

        return $this->render('AppBundle:Education:education_new.html.twig', [
            'qualificationForm' => $form->createView()
        ]);
    }

    /**
     * @Route("/education", name="education")
     * @Template("AppBundle:Education:education.html.twig")
     */
    public function viewUser()
    {
        $this->getUser();

        return [];
    }

}
