<?php
namespace NITSAN\ns_theme_hohenlohe\ViewHelpers;

use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

/**
 * LinkTypeViewHelper
 *
 */
class SearchListViewHelper extends AbstractViewHelper
{
    /**
    * initializes the arguments
    *
    */
    public function initializeArguments()
    {
        // $this->registerArgument('link','string','The link to resolve the link type', TRUE);
    }

    /**
     * Get general statistic
     *
     * @param int $max
     * @return array|null
     */
    public function render($max = 5)
    {
        $queryBuilder = GeneralUtility::makeInstance(ConnectionPool::class)
            ->getQueryBuilderForTable('index_stat_word');
        $queryBuilder
            ->select('word')
            ->from('index_stat_word')
            ->addSelectLiteral($queryBuilder->expr()->count('*', 'c'))

            ->groupBy('word')
            ->orderBy('c', 'desc')
            ->setMaxResults((int)$max);

        $result = $queryBuilder->execute();
        $countQueryBuilder = clone $queryBuilder;
        $countQueryBuilder->resetQueryPart('orderBy');
        $count = (int)$countQueryBuilder
            ->count('uid')
            ->execute()
            ->fetchColumn(0);
        $result->closeCursor();

        return $queryBuilder->execute()->fetchAll();
    }
}
