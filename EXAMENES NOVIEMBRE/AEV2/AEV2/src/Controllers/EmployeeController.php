<?php

namespace AEV2\Controllers;

use AEV2\Core\EntityManager;
use AEV2\Entity\Employee;
use AEV2\Views\EmployeeView;

class EmployeeController
{
    public function listEmployees(): void
    {
        $entityManager = new EntityManager();
        $repo = $entityManager->getEntityManager()->getRepository(Employee::class);
        $employees = $repo->findAll();

        $view = new EmployeeView();
        $view->render($employees);
    }
}
