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
     * @Route("/")
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

        $products = $paginator->paginate($products)->getResult();

        return array(
            'products'  => $products,
            'paginator' => $paginator,
        );
    }

    /**
     * @param integer $productId
     *
     * @Route("/product/show/{id}")
     * @Template()
     *
     * @return Response
     */
    public function productAction($productId)
    {
        $em = $this->get('doctrine')->getEntityManager();
        $repo = $em->getRepository('deSymfonyDemoBundle:Product')->findOneById($productId);

        return array('product' => $product);
    }
}
