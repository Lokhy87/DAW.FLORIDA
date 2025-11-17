<?php

namespace AEV2\Controllers;

use AEV2\Core\EntityManager;
use AEV2\Entity\Client;
use AEV2\Views\ClientView;

class ClientController
{
    public function listClients(): void
    {
        $entityManager = new EntityManager();
        $repo = $entityManager->getEntityManager()->getRepository(Client::class);
        $clients = $repo->findAll();

        $view = new ClientView();
        $view->render($clients);
    }
}
