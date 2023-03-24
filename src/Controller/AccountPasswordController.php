<?php

namespace App\Controller;

use App\Form\ChangePasswordType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

class AccountPasswordController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/account/edit-password", name="account_password")
     */
    public function index( Request $request,  UserPasswordHasherInterface $passwordHasher)
    {
        $notification = null;

        $user = $this->getUser();
        $form = $this->createForm(ChangePasswordType::class, $user);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $old_psw = $form->get('old_password')->getData();
            if($passwordHasher->isPasswordValid($user, $old_psw)){
                $new_pwd = $form->get('new_password')->getData();
                $hashedPassword = $passwordHasher->hashPassword($user, $new_pwd);

                $user->setPassword($hashedPassword);

                $this->entityManager->persist($user);
                $this->entityManager->flush();

                $notification = 'Su contraseña se ha actualizado';
            }else{
                $notification = 'Su contraseña actual no es correcta';
            }
        }

        return $this->render('account/password.html.twig',[
            'form'=> $form->createView(),
            'notification' => $notification
        ]);
    }
}
