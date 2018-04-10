<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;


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
     * @Route("/user/manage", name="userManage")
     */
    public function manage(Request $request)
    {
        $user = new User();

        $form = $this->createForm(UserForm::class, $user);
        
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            $task = $form->getData();

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

        /*$paginator = new Pagerfanta(new DoctrineORMAdapter($query));
        $paginator->setMaxPerPage(Post::NUM_ITEMS);
        $paginator->setCurrentPage($page);

        return $this->render('user/index.html.twig', [
            'controller_name' => 'UserController',
            'users' => $paginator
        ]);*/
    }
}
