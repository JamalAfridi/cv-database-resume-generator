<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class TemplateController
 * @package AppBundle\Controller
 */
class TemplateController extends Controller
{


    /**
     * @Route("/template/view1", name="template1")
     * @Template("AppBundle:Template:template1.html.twig")
     */
    public function viewTemplate1()
    {

        return [];
    }

    /**
     * @Route("/template/view2", name="template2")
     * @Template("AppBundle:Template:template2.html.twig")
     */
    public function viewTemplate2()
    {

        return [];
    }

    /**
     * @Route("/template/view3", name="template3")
     * @Template("AppBundle:Template:template3.html.twig")
     */
    public function viewTemplate3()
    {

        return [];
    }

    /**
     * @Route("/template/pdf1", name="template_pdf1")
     */
    public function PDFAction1()
    {
        $html = $this->renderView('AppBundle:Template:template1.html.twig');

        return new Response(
            $this->get('knp_snappy.pdf')->getOutputFromHtml($html),
            200,
            array(
                'Content-Type'          => 'application/pdf',
                'Content-Disposition'   => 'attachment; filename="file.pdf"'
            )
        );

    }

    /**
     * @Route("/template/pdf2", name="template_pdf2")
     */
    public function PDFAction2()
    {
        $html = $this->renderView('AppBundle:Template:template2.html.twig');

        return new Response(
            $this->get('knp_snappy.pdf')->getOutputFromHtml($html),
            200,
            array(
                'Content-Type'          => 'application/pdf',
                'Content-Disposition'   => 'attachment; filename="file.pdf"'
            )
        );

    }

    /**
     * @Route("/template/pdf3", name="template_pdf3")
     */
    public function PDFAction3()
    {
        $html = $this->renderView('AppBundle:Template:template3.html.twig');

        return new Response(
            $this->get('knp_snappy.pdf')->getOutputFromHtml($html),
            200,
            array(
                'Content-Type'          => 'application/pdf',
                'Content-Disposition'   => 'attachment; filename="file.pdf"'
            )
        );

    }

    /**
     * @Route("/template", name="template")
     * @Template("AppBundle:Template:template_page.html.twig")
     */
    public function indexAction()
    {
        return [];
    }
}
