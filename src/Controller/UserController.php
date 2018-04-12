<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;


use App\Document\User;
use App\Form\User as UserForm;

class UserController extends Controller
{
    /**
     * @Route("/user", name="user")
     */
    public function index()
    {
        $repository = $this->get('doctrine_mongodb')
        ->getManager()
        ->getRepository(User::class);
        $users = $repository->findAll();
        // print_r ($users);die;
        
        return $this->render('user/index.html.twig', [
            'controller_name' => 'UserController',
            'users' => $users
        ]);

        /*$paginator = new Pagerfanta(new DoctrineORMAdapter($query));
        $paginator->setMaxPerPage(Post::NUM_ITEMS);
        $paginator->setCurrentPage($page);

        return $this->render('user/index.html.twig', [
            'controller_name' => 'UserController',
            'users' => $paginator
        ]);*/
    }

    /**
     * @Route("/user/manage/{id}", name="userManage", defaults={"id" = null})
     */
    public function manage($id, Request $request, UserPasswordEncoderInterface $passwordEncoder)
    {
        $documentManager = $this->get('doctrine_mongodb')
        ->getManager();

        if($id === null) {
            $user = new User();
        } else {
            $repository = $documentManager->getRepository(User::class);
            $user = $repository->find($id);
        }   

        $form = $this->createForm(UserForm::class, $user);
        
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            $user = $form->getData();
            $user->setPassword($passwordEncoder->encodePassword($user, $user->getPassword()));
            
            $documentManager->persist($user);
            $documentManager->flush();
            // ... perform some action, such as saving the task to the database
            // for example, if Task is a Doctrine entity, save it!
            // $entityManager = $this->getDoctrine()->getManager();
            // $entityManager->persist($task);
            // $entityManager->flush();

            return $this->redirectToRoute('user');
        }
        
        return $this->render('user/manage.html.twig', [
            'form' => $form->createView()
        ]);

    }
}
