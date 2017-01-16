<?php

namespace test\GaddourBundle\Controller;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ResetType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use test\GaddourBundle\Entity\Etudiant;
use test\GaddourBundle\Entity\Mailer;







class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('testGaddourBundle:Default:index.html.twig');
    }





    public function tryQuizAction($id,$idEtudiant)
    {


        $actualQuiz= $this->getDoctrine()->getRepository('testGaddourBundle:Quiz')->find($id);

        $listQuestion=$this->getDoctrine()->getRepository('testGaddourBundle:Question')->findBy(array('idQuiz'=>$id));
        $listReponse=array();
        foreach ($listQuestion as $question)
        {
            $listReponseQuestion= $this->getDoctrine()->getRepository('testGaddourBundle:reponse')->findBy(array('idQuestion'=>$question->getId()));
            array_push($listReponse,$listReponseQuestion);
        }


        return $this->render('testGaddourBundle:Default:viewStartQuiz.html.twig', array(
            'nameQuiz' => $actualQuiz->getContenuQuiz(),
            'listQuestion'=>$listQuestion,
            'listReponse'=>$listReponse
 ));










    }







    public function startQuizAction($id,$idProf)
    {

        $em = $this->getDoctrine()->getManager();

        $actualQuiz = $em->getRepository('testGaddourBundle:Quiz')->findBy(array(
            'idProf' => $idProf
        ));

        return $this->render('testGaddourBundle:Default:startQuiz.html.twig',array(
            'idEtudiant'=> $id,
            'quizzes'=>$actualQuiz
        ));
    }


    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function etudiantAction(Request $request)
    {

         $etudiant =new Etudiant();
        $tab = array();


        $form= $this->createFormBuilder($tab)
            ->add('nom',TextType::class,array( 'label'=>'Your Name','attr'=>array('class'=>'form-control','style'=>'margin-bottom:10px')))
            ->add('IdProf',NumberType::class,array( 'label'=>'Room Number','attr'=>array('class'=>'form-control','style'=>'margin-bottom:10px')))
            ->add('save',SubmitType::class ,array('label'=>'Submit','attr'=>array('class'=>'btn btn-primary','style'=>'margin-bottom:10px')))
        ->getForm();


        $form->handleRequest($request);


        if($form->isSubmitted() && $form->isValid()) {


            $em = $this->getDoctrine()->getManager();

            $actualQuiz = $em->getRepository('testGaddourBundle:Quiz')->findBy(array(
                'idProf' => $form['IdProf']->getData()
            ));


            if ($actualQuiz) {

                $name = $form['nom']->getData();
                $etudiant = new Etudiant();

                $em = $this->getDoctrine()->getManager();
                $etudiant->setNom($name);
                $em->persist($etudiant);
                $em->flush();

                $response = $this->forward('testGaddourBundle:Default:startQuiz', array(
                    'id'  => $etudiant->getId(),
                    'idProf'  => $form['IdProf']->getData()
                ));
                return $response;



            } else {
                return $this->render('testGaddourBundle:Default:etudiant.html.twig',
                    array(
                        'form'=>$form->createView(),
                        'msg' =>'No Room Found with this number'
                    ));

            }


        }
    return $this->render('testGaddourBundle:Default:etudiant.html.twig',
                array(
                    'form'=>$form->createView(),
                    'msg' =>null
                ));



    }



    public function contactAction(Request $request)
    {

         $email =new Mailer();

        $form = $this->createFormBuilder($email)
            //->setAction($this->generateUrl('test_gaddour_mail'))
            //->setMethod('GET')
            ->add('name',TextType::class,array( 'label'=>'Object','attr'=>array('class'=>'form-control','style'=>'margin-bottom:10px')))
            ->add('mail',EmailType::class,array('label'=>'Your E-mail','attr'=>array('class'=>'form-control form-control-lg','id'=>'lgFormGroupInput','placeholder'=>'you@example.com','style'=>'margin-bottom:10px')))
            ->add('msg',TextareaType::class,array('label'=>'Message','attr'=>array('class'=>'form-control','style'=>'margin-bottom:10px')))
            ->add('save',SubmitType::class ,array('label'=>'Send','attr'=>array('class'=>'btn btn-default','style'=>'margin-bottom:10px')))
            ->add('Reset',ResetType::class ,array('label'=>'Reset','attr'=>array('class'=>'btn btn-default','style'=>'margin-bottom:10px')))->getForm();



        $form->handleRequest($request);


       if($form->isSubmitted() && $form->isValid())
        {
            $name = $form['name']->getData() ;
            $mail = $form['mail']->getData() ;
            $msg = $form['msg']->getData() ;

            $email -> setName($name) ;
            $email -> setMail($mail) ;
            $email -> setMsg($msg) ;

            $em = $this -> getDoctrine() -> getManager() ;

            $em -> persist($email) ;
            $em -> flush() ;






            $response = $this->forward('testGaddourBundle:Default:mail', array(
                'name'  => $form['name']->getData(),
                'mail'  => $form['mail']->getData(),
                'msg'  => $form['msg']->getData(),
            ));
            return $response;
        }


        return $this->render('testGaddourBundle:Default:contact.html.twig', array(
            'form' => $form->createView()
        ));




    }

    public function mailAction($name,$mail,$msg)
    {


        $message = \Swift_Message::newInstance()
            ->setSubject($name)
            ->setFrom('gaddour.becha@gmail.com')
            ->setTo('gaddour.becha@gmail.com')
            ->setBody(
                $this->renderView(
                // app/Resources/views/Emails/registration.html.twig
                    'testGaddourBundle:Default:mail.html.twig',
                    array(
                        'msg' => $msg,
                        'mail'=>$mail
                    )
                ),
                'text/html'
            )

        ;
        $this->get('mailer')->send($message);

        return $this->render('testGaddourBundle:Default:index.html.twig');
    }
































}


