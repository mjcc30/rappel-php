<?php

namespace App\Controller;

use App\DAO\AnimalManager;
use Twig\Environment;

class AppController extends Controller
{
    private AnimalManager $animalManager;

    public function __construct(Environment $twig)
    {
        $this->animalManager = new AnimalManager();
        parent::__construct($twig);
    }

    public function index(): string
    {
        return $this->render('App/index.html.twig', ['animals' => $this->animalManager->findLast()]);
    }

    public function contact(): string
    {
        return $this->render('App/contact.html.twig');
    }
}