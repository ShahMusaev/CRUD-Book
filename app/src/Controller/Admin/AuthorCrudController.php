<?php

namespace App\Controller\Admin;

use App\Entity\Author;
use Doctrine\DBAL\Exception\UniqueConstraintViolationException;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;

class AuthorCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Author::class;
    }


    public function persistEntity(EntityManagerInterface $entityManager, $entityInstance): void
    {
        try {
            $entityManager->persist($entityInstance);
            $entityManager->flush();
        }
        catch (UniqueConstraintViolationException $e) {
        }
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            Field::new('id')->hideOnForm(),
            Field::new('name', 'Имя'),
            Field::new('surname', 'Фамилия'),
            Field::new('lastname', 'Отчество'),
        ];
    }
}
