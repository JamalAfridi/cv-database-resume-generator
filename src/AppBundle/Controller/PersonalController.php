<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Interest;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use AppBundle\Form\Type;
use Symfony\Component\HttpFoundation\Request;


/**
 * Class PersonalController
 * @package AppBundle\Controller
 */
class PersonalController extends Controller
{

    /**
     * @Route("/personal/edit/user/{id}", name="personal_edit")
     * @param $id
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function editUser($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('AppBundle:User')->find($id);

        if (!$user) {
            throw $this->createNotFoundException(
                'No user found for id '.$id
            );
        }

        $form = $this->createForm(Type\UserType::class, $user);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em->persist($user);
            $em->flush();
            return $this->redirectToRoute('personal');
        }

        return $this->render('AppBundle:Personal:personal_edit.html.twig', [
            'personalForm' => $form->createView()
        ]);
    }

    /**
     * @Route("/personal/edit/interest/{id}", name="personal_edit_interest")
     */
    public function editInterest($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $interest = $em->getRepository('AppBundle:Interest')->find($id);

        if (!$interest) {
            throw $this->createNotFoundException(
                'No interest found for id '.$id
            );
        }

        $form = $this->createForm(Type\InterestType::class, $interest);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em->persist($interest);
            $em->flush();
            return $this->redirectToRoute('personal');
        }

        return $this->render('AppBundle:Personal:personal_edit_interest.html.twig', [
            'personalForm' => $form->createView()
        ]);
    }

    /**
     * @Route("/personal/delete/interest/{id}", name="personal_delete_interest")
     */
    public function deleteAction($id)
    {
        $interest = $this->getDoctrine()->getRepository('AppBundle:Interest')->find($id);

        if (!$interest) {
            throw $this->createNotFoundException(
                'No interest found'
            );
        }

        $em = $this->getDoctrine()->getManager();
        $em->remove($interest);
        $em->flush();

        return $this->redirectToRoute('personal');
    }

    /**
     * @Route("/personal/new/interest", name="personal_new_interest")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function newInterest(Request $request)
    {
        $interest = new Interest();

        $form = $this->createForm(Type\InterestType::class, $interest);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){

            $interest->setUser($this->getUser());

            $em = $this->getDoctrine()->getManager();
            $em->persist($interest);
            $em->flush();

            return $this->redirectToRoute('personal');
        }

        return $this->render('AppBundle:Personal:personal_new_interest.html.twig', [
            'personalForm' => $form->createView()
        ]);
    }


    /**
     * @Route("/personal", name="personal")
     * @Template("AppBundle:Personal:personal.html.twig")
     */
    public function viewUser()
    {
        $this->getUser();

        return [];
    }


}
