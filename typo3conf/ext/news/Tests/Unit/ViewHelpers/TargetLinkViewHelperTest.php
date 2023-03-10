<?php

namespace GeorgRinger\News\Tests\Unit\ViewHelpers;

/**
 * This file is part of the "news" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 */
use GeorgRinger\News\ViewHelpers\TargetLinkViewHelper;
use TYPO3\TestingFramework\Core\BaseTestCase;
use TYPO3Fluid\Fluid\Core\Rendering\RenderingContextInterface;

/**
 * Test for TargetLinkViewHelper
 */
class TargetLinkViewHelperTest extends BaseTestCase
{
    /**
     * @return \GeorgRinger\News\ViewHelpers\TargetLinkViewHelper
     * @support
     */
    protected function getPreparedInstance()
    {
        $instance = $this->getMockBuilder(TargetLinkViewHelper::class)->setMethods(['dummy'])->getMock();
        return $instance;
    }

    /**
     * @test
     *
     * @return void
     */
    public function canCreateViewHelperClassInstance(): void
    {
        $instance = $this->getPreparedInstance();
        $this->assertInstanceOf(TargetLinkViewHelper::class, $instance);
    }

    /**
     * Test if correct target is returned
     *
     * @test
     *
     * @dataProvider correctTargetIsReturnedDataProvider
     *
     * @return void
     */
    public function correctTargetIsReturned($link, $expectedResult): void
    {
        $viewHelper = $this->getMockBuilder(TargetLinkViewHelper::class)->setMethods(['dummy'])->getMock();
        $viewHelper->setRenderingContext($this->getMockBuilder(RenderingContextInterface::class)->getMock());
        $viewHelper->setArguments([
            'link' => $link,
        ]);

        $this->assertEquals($viewHelper->render(), $expectedResult);
    }

    /**
     * Data provider
     *
     * @return array
     */
    public function correctTargetIsReturnedDataProvider()
    {
        return [
            'noTargetSetAndUrlDefined' => [
                'www.typo3.org', ''
            ],
            'noTargetSetAndIdDefined' => [
                '123', ''
            ],
            'IdAndTargetDefined' => [
                '123 _blank', '_blank'
            ],
            'UrlAndPopupDefined' => [
                'www.typo3.org 300x400', ''
            ],
            'ComplexExample' => [
                'www.typo3.org _fo my-class', '_fo'
            ],

        ];
    }
}
