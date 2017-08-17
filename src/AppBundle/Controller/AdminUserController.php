<?php
/**
 * Created by PhpStorm.
 * User: jamalafridi
 * Date: 07/02/2017
 * Time: 15:12
 */

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;


/**
 * Class AdminUserController
 * @package AppBundle\Controller
 */
class AdminUserController extends Controller
{

    /**
     * @Route("/admin/users/delete/{id}", name="admin_users_delete")
     */
    public function deleteAction($id)
    {
        $user = $this->getDoctrine()->getRepository('AppBundle:User')->find($id);


        if (!$user) {
            throw $this->createNotFoundException(
                'No user found'
            );
        }

        $em = $this->getDoctrine()->getManager();
        $em->remove($user);
        $em->flush();

        return $this->redirectToRoute('admin_users');
    }

    /**
     * User Controller
     *
     * @Route("/admin/users", name="admin_users")
     * @Template("AppBundle:AdminUser:list.html.twig")
     */
    public function indexAction()
    {
        $users = $this->getDoctrine()
            ->getRepository('AppBundle:User')
            ->findAll();

        return ["users" => $users ];
    }

}