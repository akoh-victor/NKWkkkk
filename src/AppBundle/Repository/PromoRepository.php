<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;
use AppBundle\Entity\News;

/**
 * NewsRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class NewsRepository extends EntityRepository
    {
	     public function findAllOrderedById()
         {
		        return $this->getEntityManager()
		                    ->createQuery( 'SELECT n FROM AppBundle:News n
				                            ORDER BY n.id DESC' ) 
					        ->getResult();
         }
	
	public function findPositionedNews($position,$limit)
       {
		return $this
		 ->createQueryBuilder('n')
            ->select('n')
            ->where('n.position = :position')
            ->andWhere('n.expire = :no')
            ->setParameter('no',0)
            ->setParameter('position', $position)
            ->setMaxResults($limit)
            ->getQuery()
			->getResult();
       }
    public function findAllRescentPublish($limit) {
        return $this
            ->createQueryBuilder('e')
            ->select('e')
            ->where('e.publishDate <= :now')
            ->andWhere('e.expire = :no')
            ->setParameter('no',0)
            ->setParameter('now', new \DateTime())
            ->orderBy('e.publishDate', 'DESC')
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult();
    }

    public function importantNews($limit)
    {
        return $this
            ->createQueryBuilder('n')
            ->select('n')
            ->orderBy('n.priorit', 'DESC')
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult();
    }

    public function moreNews($catId,$limit)
    {
        return $this
            ->createQueryBuilder('n')
            ->select('n')
            ->where('n.category = :catId')
            ->andWhere('n.expire = :no')
            ->setParameter('no',0)
            ->setParameter('catId', $catId)
            ->orderBy('n.id', 'DESC')
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult();

    }

    public function badgeNews($limit)
    {
        return $this
            ->createQueryBuilder('n')
            ->select('n')
            ->Where('n.expire = :no')
            ->setParameter('no',0)
            ->orderBy('n.priority', 'DESC')
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult();

    }
    public function mostView($limit){
        return $this
            ->createQueryBuilder('n')
            ->select('n')
            ->where('n.view >= :view')
            ->andWhere('n.expire = :no')
            ->setParameter('no',0)
            ->setParameter('view', 1)
            ->orderBy('n.view', 'DESC')
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult();
    }

     public function findNext($limit,$id)
     {
         return $this
             ->createQueryBuilder('n')
             ->select('n')
             ->where('n.id' > ':id')
             ->andWhere('n.expire = :no')
             ->setParameter('no',0)
             ->setParameter('id',$id)
             ->orderBy('n.id', 'ASC')
             ->setMaxResults($limit)
             ->getQuery()
             ->getResult();
     }



    public function findSliderNews($limit){
        return $this
            ->createQueryBuilder('n')
            ->select('n')
            ->where('n.slide = :show')
            ->andWhere('n.expire = :no')
            ->setParameter('no',0)
            ->setParameter('show',1)
            ->orderBy('n.id', 'DESC')
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult();
    }

}
