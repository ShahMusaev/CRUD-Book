<?php

namespace App\Controller\Admin;

use App\Entity\Author;
use App\Entity\Book;
use Doctrine\DBAL\Exception\UniqueConstraintViolationException;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;

class BookCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Book::class;
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
            Field::new('name', 'Название'),
            Field::new('year', 'Год выпуска'),
            Field::new('pages', 'Кол-во страниц'),
            Field::new('isbn', 'ISBN'),
            AssociationField::new('authors', 'Автор')
                ->formatValue(function ($value, $entity) {
                    $authorsArray = $entity->getAuthors()->toArray();
                    return implode(",\n", $authorsArray);
                })

        ];
    }
}
