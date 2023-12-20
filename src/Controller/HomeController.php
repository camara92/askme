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
        // $questionRepo = $this->getDoctrine()->getRepository(Question::class); 
        // $question = $questionRepo->findAll(); 
        $questions = $this->entityManager->getRepository(Question::class)->findAll();
           
        
        return $this->render('home/index.html.twig', [
            'questions' => $questions,
        ]);
    }
}
