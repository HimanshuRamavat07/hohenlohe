<?php
namespace NITSAN\NsBasetheme\Domain\Repository;

use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\Utility\GeneralUtility;

/***
 *
 * This file is part of the "NS Basetheme" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2019
 *
 ***/
/**
 * The repository for NsBasetheme
 */
class NsBasethemeRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{
    /**
     * Find Constants via sys_template Database Table
     *
     * @return array|NULL  Result is array('constants' => queryResult) or NULL
     */
    public function fetchConstants($pid)
    {   //
        // Query Builder for Table: sys_template
        $queryBuilder = GeneralUtility::makeInstance(ConnectionPool::class)->getQueryBuilderForTable('sys_template');

        // Get Constants of Row, where RM Registration is included
        $query = $queryBuilder
            ->select('constants')
            ->from('sys_template')
            ->where(
                $queryBuilder->expr()->like(
                    'pid',
                    $queryBuilder->createNamedParameter($pid)
                )
            );

        // Execute Query and Return the Query-Fetch
        $query = $queryBuilder->execute();
        return $query->fetch();
    }
}
