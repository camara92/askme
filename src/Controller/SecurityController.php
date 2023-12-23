<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Event\AuthenticationEvent;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    #[Route('/signup', name: 'signup')]
    public function signup(Request $request, EntityManagerInterface $em, UserPasswordHasherInterface $userPasswordHasher): Response
    {
        $user = new User(); 
        $userForm = $this->createForm(UserType::class, $user); 
        $userForm->handleRequest($request); 
        if($userForm->isSubmitted() && $userForm->isValid()){
            $user->setPassword($userPasswordHasher->hashPassword($user, $user->getPassword()));
            $em->persist($user); 
            $em->flush(); 
            $this->addFlash('success', 'Bienvenue dans Ask me '); 

            return $this->redirectToRoute('login'); 

        }
        return $this->render('security/signup.html.twig', [
            'form' => $userForm->createView(),
        ]);
    }
    #[Route('/login', name: 'login')]
    public function login(AuthenticationUtils $authenticationUtils, ): Response
    {
        if($this->getUser()){
            return $this->redirectToRoute('home'); 
            
        }
        $error = $authenticationUtils->getLastAuthenticationError(); 
        $username = $authenticationUtils->getLastUsername(); 

        return $this->render('security/login.html.twig', [
            'error' => $error,
            'username'=>$username
        ]);
    }
    #[Route('/logout', name: 'logout')]
    public function logout()
    {
        
    }
}
