<?php

namespace ChaosCompany\BlogBundle\Repository;

use Doctrine\ORM\EntityRepository;

class PostRepository extends EntityRepository
{
    public function findAllPosts()
    {
        return $this->createQueryBuilder('post')
            ->addOrderBy('post.createdAt', 'DESC')
            ->getQuery()
            ->execute();
    }

    public function findOneBySlug($slug)
    {
        return $this->createQueryBuilder('post')
            ->andWhere('post.slug = :slug')
            ->setParameter('slug', $slug)
            ->getQuery()
            ->getOneOrNullResult();
    }
}