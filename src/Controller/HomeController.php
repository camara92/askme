<?php

namespace App\Controller;

use App\Entity\Question;
use App\Repository\QuestionRepository;
use Container0UEOsho\getQuestionService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    private $entityManager; 
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager= $entityManager;
    }

     
    #[Route("/listes", name:"listes")]
 
    public function listesQuestions(): Response
    { 
        $listesQuestions = $this->entityManager->getRepository(Question::class)->findAll();

        return $this->render('home/listsquestion.html.twig', [
            'listesQuestions'=>$listesQuestions
        ]); 
    }
    #[Route('/', name: 'home')]
    public function index(QuestionRepository $questionRepository): Response
    {
    $questionlists = new Question();
    $questionlists = $questionRepository->findAll();
    // dd($questionlists); 
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
                'id'=> '5', 
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
                'id'=> '6', 
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
                'id'=> '7', 
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
                'id'=> '8', 
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
