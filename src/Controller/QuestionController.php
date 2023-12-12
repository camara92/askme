<?php

namespace App\Controller;

use App\Entity\Question;
use App\Form\QuestionType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class QuestionController extends AbstractController
{
    #[Route('/question/ask', name: 'app_question_form')]
    public function index(Request $request, EntityManagerInterface $em): Response
    {
        $question = new Question();

        $formQuestion = $this->createForm(QuestionType::class, $question);
        $formQuestion->handleRequest($request);
        if ($formQuestion->isSubmitted() && $formQuestion->isValid()) {
            $question->setNbrOfResponse(0);
            $question->setRating(0);
            $question->setCreatedAt(new \DateTimeImmutable());
            $em->persist($question);
            $em->flush();
            // dd($formQuestion->getData()); 
            $this->addFlash('success', 'Votre question a bien été ajouté'); 
            return $this->redirectToRoute('home');
        }
        return $this->render('question/index.html.twig', [
            'form' => $formQuestion->createView()
        ]);
    }
    #[Route('/question/{id}', name: 'question_show')]
    // public function show(Request $request, string $id): Response
    public function show(Question $question ): Response
    {
        // $questionShow = [
        //     'id' => '1',
        //     'title' => 'Je suis un titre',
        //     'content' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Pariatur laboriosam asperiores libero quia tempora voluptas fuga, provident id quasi. Voluptas repellat quasi exercitationem eligendi quae aut aliquam recusandae libero a?',
        //     'rating' => -10,
        //     'author' => [
        //         'name' => 'CAMARA Daouda',
        //         'avatar' => 'https://randomuser.me/api/portraits/men/64.jpg'
        //     ],
        //     'nbrOfResponse' => 25
        // ];

        
        return $this->render('question/show.html.twig', [
            'question' => $question
        ]);
    }
}
