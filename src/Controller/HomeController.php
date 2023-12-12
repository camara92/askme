<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(): Response
    {
       
        $questions = [
            [
                'id'=> '1', 
                'title' => 'Je suis un titre',
                'content' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Pariatur laboriosam asperiores libero quia tempora voluptas fuga, provident id quasi. Voluptas repellat quasi exercitationem eligendi quae aut aliquam recusandae libero a?',
                'rating' => 10,
                'author' => [
                    'name' => 'CAMARA Daouda',
                    'avatar' => 'https://randomuser.me/api/portraits/men/64.jpg'
                ],
                'nbrOfResponse' => 25
            ],
            [
                'id'=> '2', 
                'title' => 'Je suis un titre',
                'content' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Pariatur laboriosam asperiores libero quia tempora voluptas fuga, provident id quasi. Voluptas repellat quasi exercitationem eligendi quae aut aliquam recusandae libero a?',
                'rating' => 40,
                'author' => [
                    'name' => 'John',
                    'avatar' => 'https://randomuser.me/api/portraits/men/61.jpg'
                ],
                'nbrOfResponse' => 145
            ],
            [
                'id'=> '3', 
                'title' => 'Je suis un titre',
                'content' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Pariatur laboriosam asperiores libero quia tempora voluptas fuga, provident id quasi. Voluptas repellat quasi exercitationem eligendi quae aut aliquam recusandae libero a?',
                'rating' => -20,
                'author' => [
                    'name' => 'CAMARA Daouda',
                    'avatar' => 'https://randomuser.me/api/portraits/men/11.jpg'
                ],
                'nbrOfResponse' => 5
            ],
            [
                'id'=> '4', 
                'title' => 'Je suis un titre',
                'content' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Pariatur laboriosam asperiores libero quia tempora voluptas fuga, provident id quasi. Voluptas repellat quasi exercitationem eligendi quae aut aliquam recusandae libero a?',
                'rating' => 40,
                'author' => [
                    'name' => 'CAMARA Daouda',
                    'avatar' => 'https://randomuser.me/api/portraits/men/10.jpg'
                ],
                'nbrOfResponse' => 150
            ],
            [
                'id'=> '1', 
                'title' => 'Je suis un titre',
                'content' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Pariatur laboriosam asperiores libero quia tempora voluptas fuga, provident id quasi. Voluptas repellat quasi exercitationem eligendi quae aut aliquam recusandae libero a?',
                'rating' => 10,
                'author' => [
                    'name' => 'CAMARA Daouda',
                    'avatar' => 'https://randomuser.me/api/portraits/men/64.jpg'
                ],
                'nbrOfResponse' => 25
            ],
            [
                'id'=> '2', 
                'title' => 'Je suis un titre',
                'content' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Pariatur laboriosam asperiores libero quia tempora voluptas fuga, provident id quasi. Voluptas repellat quasi exercitationem eligendi quae aut aliquam recusandae libero a?',
                'rating' => 40,
                'author' => [
                    'name' => 'John',
                    'avatar' => 'https://randomuser.me/api/portraits/men/61.jpg'
                ],
                'nbrOfResponse' => 145
            ],
            [
                'id'=> '3', 
                'title' => 'Je suis un titre',
                'content' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Pariatur laboriosam asperiores libero quia tempora voluptas fuga, provident id quasi. Voluptas repellat quasi exercitationem eligendi quae aut aliquam recusandae libero a?',
                'rating' => -20,
                'author' => [
                    'name' => 'CAMARA Daouda',
                    'avatar' => 'https://randomuser.me/api/portraits/men/11.jpg'
                ],
                'nbrOfResponse' => 5
            ],
            [
                'id'=> '4', 
                'title' => 'Je suis un titre',
                'content' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Pariatur laboriosam asperiores libero quia tempora voluptas fuga, provident id quasi. Voluptas repellat quasi exercitationem eligendi quae aut aliquam recusandae libero a?',
                'rating' => 40,
                'author' => [
                    'name' => 'CAMARA Daouda',
                    'avatar' => 'https://randomuser.me/api/portraits/men/10.jpg'
                ],
                'nbrOfResponse' => 150
            ],
           
        ];
        return $this->render('home/index.html.twig', [
            'questions' => $questions,
        ]);
    }
}
