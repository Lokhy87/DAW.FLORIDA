<?php

namespace AEV2\Controllers;

use AEV2\Core\EntityManager;
use AEV2\Entity\Department;
use AEV2\Views\DepartmentView;

class DepartmentController
{
    public function listDepartments(): void
    {
        $entityManager = new EntityManager();
        $repo = $entityManager->getEntityManager()->getRepository(Department::class);
        $departments = $repo->findAll();

        $view = new DepartmentView();
        $view->render($departments);
    }
}
