<?php
namespace NITSAN\ns_theme_hohenlohe\ViewHelpers;

/*
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Utility\MathUtility;
use TYPO3\CMS\Extbase\Utility\LocalizationUtility;
use TYPO3Fluid\Fluid\Core\Rendering\RenderingContextInterface;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;
use TYPO3Fluid\Fluid\Core\ViewHelper\Traits\CompileWithRenderStatic;

/**
 * Page browser for indexed search, and only useful here, as the
 * regular pagebrowser
 * so this is a cleaner "pi_browsebox" but not a real page browser
 * functionality
 * @internal
 */
class PageBrowsingViewHelper extends AbstractViewHelper
{
    use CompileWithRenderStatic;

    /**
     * As this ViewHelper renders HTML, the output must not be escaped.
     *
     * @var bool
     */
    protected $escapeOutput = false;

    /**
     * @var string
     */
    protected static $prefixId = 'tx_indexedsearch';

    /**
     * Initialize arguments
     */
    public function initializeArguments()
    {
        $this->registerArgument('maximumNumberOfResultPages', 'int', '', true);
        $this->registerArgument('numberOfResults', 'int', '', true);
        $this->registerArgument('resultsPerPage', 'int', '', true);
        $this->registerArgument('currentPage', 'int', '', false, 0);
        $this->registerArgument('freeIndexUid', 'int', '');
    }

    /**
     * @param array $arguments
     * @param \Closure $renderChildrenClosure
     * @param RenderingContextInterface $renderingContext
     *
     * @return string
     */
    public static function renderStatic(array $arguments, \Closure $renderChildrenClosure, RenderingContextInterface $renderingContext)
    {
        $maximumNumberOfResultPages = $arguments['maximumNumberOfResultPages'];
        $numberOfResults = $arguments['numberOfResults'];
        $resultsPerPage = $arguments['resultsPerPage'];
        $currentPage = $arguments['currentPage'];
        $freeIndexUid = $arguments['freeIndexUid'];

        if ($resultsPerPage <= 0) {
            $resultsPerPage = 10;
        }
        $pageCount = (int) ceil($numberOfResults / $resultsPerPage);
        // only show the result browser if more than one page is needed
        if ($pageCount === 1) {
            return '';
        }

        // Check if $currentPage is in range
        $currentPage = MathUtility::forceIntegerInRange($currentPage, 0, $pageCount - 1);

        $content = '';
        // prev page
        // show on all pages after the 1st one
        if ($currentPage > 0) {
            //$label = LocalizationUtility::translate('displayResults.previous', 'IndexedSearch');
            $label = LocalizationUtility::translate('displayResults.previous', 'IndexedSearch');
            $content .= '<li class="nav-prev">' . self::makecurrentPageSelector_link('', $currentPage - 1, $freeIndexUid,'prev') . '</li>';
        }
        // Check if $maximumNumberOfResultPages is in range
        $maximumNumberOfResultPages = MathUtility::forceIntegerInRange($maximumNumberOfResultPages, 1, $pageCount, 10);
        // Assume $currentPage is in the middle and calculate the index limits of the result page listing
        $minPage = $currentPage - (int) floor($maximumNumberOfResultPages / 2);
        $maxPage = $minPage + $maximumNumberOfResultPages - 1;
        // Check if the indexes are within the page limits
        if ($minPage < 0) {
            $maxPage -= $minPage;
            $minPage = 0;
        } elseif ($maxPage >= $pageCount) {
            $minPage -= $maxPage - $pageCount + 1;
            $maxPage = $pageCount - 1;
        }
        $pageLabel = LocalizationUtility::translate('displayResults.page', 'IndexedSearch');
        for ($a = $minPage; $a <= $maxPage; $a++) {
            $label = ($a + 1);
            $label = self::makecurrentPageSelector_link($label, $a, $freeIndexUid);
            if ($a === $currentPage) {
                $content .= '<li class="tx-indexedsearch-browselist-currentPage">' . $label . '</li>';
            } else {
                $content .= '<li>' . $label . '</li>';
            }
        }
        // next link
        if ($currentPage < $pageCount - 1) {
            $label = LocalizationUtility::translate('displayResults.next', 'IndexedSearch');
            $content .= '<li class="nav-next">' . self::makecurrentPageSelector_link('', $currentPage + 1, $freeIndexUid,'next') . '</li>';
        }
        return '<ul class="tx-indexedsearch-browsebox 123">' . $content . '</ul>';
    }

    /**
     * Used to make the link for the result-browser.
     * Notice how the links must resubmit the form after setting the new currentPage-value in a hidden formfield.
     *
     * @param string $str String to wrap in <a> tag
     * @param int $p currentPage value
     * @param string $freeIndexUid List of integers pointing to free indexing configurations to search. -1 represents no filtering, 0 represents TYPO3 pages only, any number above zero is a uid of an indexing configuration!
     * @return string Input string wrapped in <a> tag with onclick event attribute set.
     */
    protected static function makecurrentPageSelector_link($str, $p, $freeIndexUid, $class='')
    {
        $onclick = 'document.getElementById(' . GeneralUtility::quoteJSvalue(self::$prefixId . '_pointer') . ').value=' . GeneralUtility::quoteJSvalue($p) . ';';
        if ($freeIndexUid !== null) {
            $onclick .= 'document.getElementById(' . GeneralUtility::quoteJSvalue(self::$prefixId . '_freeIndexUid') . ').value=' . GeneralUtility::quoteJSvalue($freeIndexUid) . ';';
        }
        $onclick .= 'document.getElementById(' . GeneralUtility::quoteJSvalue(self::$prefixId) . ').submit();return false;';
        $arrowText = '';
        if ($class != '') {
            if ($class == 'next') {
                $arrowText = ' <svg xmlns="http://www.w3.org/2000/svg" width="20" height="14.271"><path d="M12.146 1.749a1.019 1.019 0 010-1.454 1.044 1.044 0 011.454 0l6.095 6.094a1.054 1.054 0 010 1.484L13.6 13.966a1.028 1.028 0 01-1.454-1.454l4.364-4.35H1.018A1.023 1.023 0 010 7.131a1.012 1.012 0 011.018-1.018h15.49z" fill="#ffb936"/></svg>';
            }
            if ($class == 'prev') {
                $arrowText = '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="14.271"><path d="M7.854 12.522a1.019 1.019 0 010 1.454 1.044 1.044 0 01-1.454 0L.305 7.882a1.054 1.054 0 010-1.484L6.4.305a1.028 1.028 0 011.454 1.454L3.49 6.109h15.492A1.023 1.023 0 0120 7.14a1.012 1.012 0 01-1.018 1.018H3.492z" fill="#ffb936"/></svg>';
            }
        }
        return '<a href="#" onclick="' . htmlspecialchars($onclick) . '">' . htmlspecialchars($str) .''.$arrowText.'</a>';
    }
}
