<?php
namespace Faf\FafCompanies\Hooks;

use TYPO3\CMS\Backend\View\PageLayoutViewDrawItemHookInterface;
use TYPO3\CMS\Core\Service\FlexFormService;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Fluid\View\StandaloneView;
use TYPO3\CMS\Extbase\Object\ObjectFactory;

class PageLayoutView implements PageLayoutViewDrawItemHookInterface
{

    /**
     *
     * @var JobsType Repository object
     */
    protected $htmlformdata;

    public function preProcess(
        \TYPO3\CMS\Backend\View\PageLayoutView &$parentObject,
        &$drawItem,
        &$headerContent,
        &$itemContent,
        array &$row
    ) {
        $extKey = 'faf_companies';

        if ($row['CType'] == 'list' && $row['list_type'] == 'fafcompanies_company') {
            $drawItem = false;
            $headerContent = '';

            $objectManager = GeneralUtility::makeInstance('TYPO3\CMS\Extbase\Object\ObjectManager');
            // $objectFactory = GeneralUtility::makeInstance(ObjectFactory::class);


            // template
            $view = $this->getFluidTemplate($extKey, 'Company');

            if (!empty($row['pi_flexform'])) {
                /** @var FlexFormService $flexFormService */               
                $flexFormService = GeneralUtility::makeInstance(\TYPO3\CMS\Core\Service\FlexFormService::class);
            }

            // assign all to view
            $view->assignMultiple([
                'data' => $row,
                'flexformData' => $flexFormService->convertFlexFormContentToArray($row['pi_flexform']),
            ]);

            // return the preview
            $itemContent = $parentObject->linkEditContent($view->render(), $row);
        }
    }

    /**
     * @param string $extKey
     * @param string $templateName
     * @return string the fluid template
     */
    protected function getFluidTemplate($extKey, $templateName)
    {
        // prepare own template
        $fluidTemplateFile = GeneralUtility::getFileAbsFileName('EXT:' . $extKey . '/Resources/Private/Backend/Backendpreview/' . $templateName . '.html');
        $view = GeneralUtility::makeInstance(StandaloneView::class);
        $view->setTemplatePathAndFilename($fluidTemplateFile);
        return $view;
    }
}
