<?php
require_once "bootstrap.php";

$users = $entityManager->getRepository("User")->findAll();

foreach ($users as $user) {
    $user->isAdult = $user->isAdult() ? 'yes' : 'no';
}

echo $twig->render('user/list-users.twig', compact('users'));