<?php

namespace deSymfony\DemoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * DefaultController
 *
 * @author Moisés Maciá <mmacia@gmail.com>
 */
class DefaultController extends Controller
{
    /**
     * @Route("/", name="index")
     * @Template()
     *
     * @return Response
     */
    public function indexAction()
    {
        $em = $this->get('doctrine')->getEntityManager();
        $paginator = $this->get('ideup.simple_paginator');

        $repo = $em->getRepository('deSymfonyDemoBundle:Product');
        $products = $repo->findAll();

        $paginator->setItemsPerPage(12);
        $products = $paginator->paginate($products)->getResult();

        return array(
            'products'  => $products,
            'paginator' => $paginator,
        );
    }

    /**
     * @param integer $id
     *
     * @Route("/product/show/{id}", name="product")
     * @Template()
     *
     * @return Response
     */
    public function productAction($id)
    {
        $em = $this->get('doctrine')->getEntityManager();
        $product = $em->getRepository('deSymfonyDemoBundle:Product')->findOneById($id);

        return array('product' => $product);
    }
}
