<?php

namespace AppBundle\Repository;

/**
 * formationsRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class formationsRepository extends \Doctrine\ORM\EntityRepository
{
    public function testQuery(){
            return $query = $this->createQueryBuilder('formationAlias')
                ->select('formationAlias.name')
                ->where('formationAlias.name = :nameParam')
                ->andWhere('formationAlias.name LIKE :likeParam')
                ->setParameters([
                    'nameParam' => 'développeur back',
                    'likeParam' => '%back%'
                ])
                ->getQuery()
                ->getResult();
    }
}