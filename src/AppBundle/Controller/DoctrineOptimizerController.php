<?php
/**
 * Created by PhpStorm.
 * User: dalius
 * Date: 18.11.7
 * Time: 12.42
 */

namespace AppBundle\Controller;


use AppBundle\Entity\Topic;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DoctrineOptimizerController extends AbstractController
{

    /**
     * @Route("/index")
     */
    public function index(EntityManagerInterface $em)
    {

//        $topics = $em->getRepository(Topic::class)->findAll();

        $qb = $em->createQueryBuilder();

        $topics = $qb->select('t', 'r')
            ->from('AppBundle:Topic', 't' )
            ->leftJoin('t.replies', 'r')
            ->getQuery()
            ->getResult();



        return $this->render('doctrine/index.html.twig', [
            'topics'=>$topics,
        ]);
    }
}