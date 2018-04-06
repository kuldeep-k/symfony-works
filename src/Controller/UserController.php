<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Document\User;

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
}
