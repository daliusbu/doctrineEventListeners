<?php
/**
 * Created by PhpStorm.
 * User: dalius
 * Date: 18.11.7
 * Time: 09.01
 */

namespace AppBundle\Controller;


use AppBundle\Entity\Other;
use AppBundle\Entity\Some;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\Events;


class LifeController extends AbstractController
{

    /**
     * @Route("/create", name="create")
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function create(EntityManagerInterface $em, Request $request)
    {
        $entity = new Some();
        $data= mt_rand(1,100);
        $entity->setData($data);
        $em->persist($entity);
        $em->flush();

       return $this->render('lifecycle/index.html.twig', [
           'message'=>'Entity with data ' . $data .' persisted in database'
       ]);
    }


    /**
     * @Route("/update/{id}", defaults={"id":1})
     */
    public function update(Some $some, EntityManagerInterface $em)
    {
        $data = mt_rand(1,1000);
        $some-> setData($data);
        $em->flush();

        return $this->render('lifecycle/index.html.twig', [
            'message'=>'Entity updated with data ' . $data,
        ]);

    }



    /**
     * @Route("/create/sonata", name="create.sonata")
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function createSonata(EntityManagerInterface $em, Request $request)
    {
        $entity = new Other();
        $data= mt_rand(1,100);
        $entity->setSonata($data);
        $em->persist($entity);
        $em->flush();

        return $this->render('lifecycle/index.html.twig', [
            'message'=>'Entity with data ' . $data .' persisted in database'
        ]);
    }


    /**
     * @Route("/sonata/update/{id}", defaults={"id":1})
     */
    public function updateSonata(int $id ) //EntityManagerInterface $em
    {
       $em = $this->getDoctrine()->getManager();
       $other = $em->getRepository(Other::class)->find($id);


        $data = mt_rand(1,1000);
        $other-> setSonata($data);
        $em->flush();

        return $this->render('lifecycle/index.html.twig', [
            'message'=>'Entity id: ' . $other->getId() . ' updated with data ' . $data,
        ]);

    }
}