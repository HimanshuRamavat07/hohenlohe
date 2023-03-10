<?php
namespace FluidTYPO3\Vhs\ViewHelpers\Iterator;

/*
 * This file is part of the FluidTYPO3/Vhs project under GPLv2 or later.
 *
 * For the full copyright and license information, please read the
 * LICENSE.md file that was distributed with this source code.
 */

use FluidTYPO3\Vhs\ViewHelpers\Condition\Iterator\ContainsViewHelper;
use TYPO3Fluid\Fluid\Core\Rendering\RenderingContextInterface;

/**
 * Returns previous element in array $haystack from position of $needle.
 */
class PreviousViewHelper extends ContainsViewHelper
{
    /**
     * @return mixed
     */
    public function render()
    {
        return static::renderStatic($this->arguments, $this->buildRenderChildrenClosure(), $this->renderingContext);
    }

    /**
     * Default implementation for use in compiled templates
     *
     * @param array $arguments
     * @param \Closure $renderChildrenClosure
     * @param RenderingContextInterface $renderingContext
     * @return mixed
     */
    public static function renderStatic(
        array $arguments,
        \Closure $renderChildrenClosure,
        RenderingContextInterface $renderingContext
    ) {
        $evaluation = static::assertHaystackHasNeedle($arguments['haystack'], $arguments['needle'], $arguments);
        return static::getNeedleAtIndex($evaluation !== false ? $evaluation - 1 : -1, $arguments);
    }
}
