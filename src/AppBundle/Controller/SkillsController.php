<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Skill;
use AppBundle\Form\Type\SkillsType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class SkillsController
 * @package AppBundle\Controller
 */
class SkillsController extends Controller
{

    /**
     * @Route("/skills/edit/{id}", name="skills_edit")
     */
    public function editAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $skill = $em->getRepository('AppBundle:Skill')->find($id);

        if (!$skill) {
            throw $this->createNotFoundException(
                'No skill found for id '.$id
            );
        }

        $form = $this->createForm(SkillsType::class, $skill);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em->persist($skill);
            $em->flush();
            return $this->redirectToRoute('skills');
        }

        return $this->render('AppBundle:Skills:skills_edit.html.twig', [
            'skillsForm' => $form->createView()
        ]);
    }

    /**
     * @Route("/skills/delete/{id}", name="skills_delete")
     */
    public function deleteAction($id)
    {
        $skill = $this->getDoctrine()->getRepository('AppBundle:Skill')->find($id);

        if (!$skill) {
            throw $this->createNotFoundException(
                'No skill found'
            );
        }

        $em = $this->getDoctrine()->getManager();
        $em->remove($skill);
        $em->flush();

        return $this->redirectToRoute('skills');
    }

    /**
     * @Route("/skills/new", name="skills_new")
     */
    public function newAction(Request $request)
    {
        $skill = new Skill();

        $form = $this->createForm(SkillsType::class, $skill);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){

            $skill->setUser($this->getUser());

            $em = $this->getDoctrine()->getManager();
            $em->persist($skill);
            $em->flush();

            return $this->redirectToRoute('skills');
        }

        return $this->render('AppBundle:Skills:skills_new.html.twig', [
            'skillsForm' => $form->createView()
        ]);
    }

    /**
     * @Route("/skills", name="skills")
     * @Template("AppBundle:Skills:skills.html.twig")
     */
    public function viewSkill()
    {
        $this->getUser();

        return [];
    }
}
