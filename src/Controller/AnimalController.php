<?php

namespace App\Controller;

use App\DAO\AnimalManager;
use Twig\Environment;

class AnimalController extends Controller
{
    private AnimalManager $animalManager;

    public function __construct(Environment $twig)
    {
        $this->animalManager = new AnimalManager();
        parent::__construct($twig);
    }

    public function index()
    {
        $animals = $this->animalManager->findAll();

        return $this->render('Animal/index.html.twig', ['animals' => $animals]);
    }
}