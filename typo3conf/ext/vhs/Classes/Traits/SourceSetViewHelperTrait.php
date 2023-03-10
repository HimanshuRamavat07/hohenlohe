<?php
namespace FluidTYPO3\Vhs\Traits;

use FluidTYPO3\Vhs\Utility\FrontendSimulationUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Utility\MathUtility;
use TYPO3Fluid\Fluid\Core\ViewHelper\TagBuilder;

/*
 * This file is part of the FluidTYPO3/Vhs project under GPLv2 or later.
 *
 * For the full copyright and license information, please read the
 * LICENSE.md file that was distributed with this source code.
 */

/**
 * This trait can be used by viewhelpers that generate image tags
 * to add srcsets based to the imagetag for better responsiveness
 */
trait SourceSetViewHelperTrait
{
    /**
     * used to attach srcset variants of a given image to the specified tag
     *
     * @param TagBuilder $tag the tag to add the srcset as argument
     * @param string $src image path to render srcsets for
     * @return array
     */
    public function addSourceSet($tag, $src)
    {
        $srcsets = $this->getSourceSetWidths();

        $tsfeBackup = null;
        if ('BE' === TYPO3_MODE) {
            $tsfeBackup = FrontendSimulationUtility::simulateFrontendEnvironment();
        }

        $format = $this->arguments['format'];
        $quality = $this->arguments['quality'];
        $crop = $this->arguments['crop'];
        $treatIdAsReference = (boolean) $this->arguments['treatIdAsReference'];
        if (true === $treatIdAsReference) {
            $src = $this->arguments['src'];
        }

        $imageSources = [];
        $srcsetVariants = [];

        foreach ($srcsets as $key => $width) {
            $srcsetVariant = $this->getImgResource($src, $width, $format, $quality, $treatIdAsReference, null, $crop);

            $srcsetVariantSrc = rawurldecode($srcsetVariant[3]);
            $srcsetVariantSrc = static::preprocessSourceUri(
                str_replace('%2F', '/', rawurlencode($srcsetVariantSrc)),
                $this->arguments
            );

            $imageSources[$srcsetVariant[0]] = [
                'src' => $srcsetVariantSrc,
                'width' => $srcsetVariant[0],
                'height' => $srcsetVariant[1],
            ];
            $srcsetVariants[$srcsetVariant[0]] = $srcsetVariantSrc . ' ' . $srcsetVariant[0] . 'w';
        }

        $tag->addAttribute('srcset', implode(',', $srcsetVariants));

        if ('BE' === TYPO3_MODE) {
            FrontendSimulationUtility::resetFrontendEnvironment($tsfeBackup);
        }

        return $imageSources;
    }

    /**
     * generates a copy of a give image with a specific width
     *
     * @param string $src path of the image to convert
     * @param integer $width width to convert the image to
     * @param string $format format of the resulting copy
     * @param integer $quality quality of the resulting copy
     * @param bool $treatIdAsReference given src argument is a sys_file_reference record
     * @param array $params additional params for the image rendering
     * @param string $crop image editor cropping configuration
     * @return array
     */
    public function getImgResource($src, $width, $format, $quality, $treatIdAsReference, $params = null, $crop = null)
    {
        $setup = [
            'width' => $width,
            'treatIdAsReference' => $treatIdAsReference,
            'crop' => $crop,
            'params' => '',
        ];
        if (false === empty($format)) {
            $setup['ext'] = $format;
        }
        if (0 < intval($quality)) {
            $quality = MathUtility::forceIntegerInRange($quality, 10, 100, 75);
            $setup['params'] .= ' -quality ' . $quality;
        }

        if ('BE' === TYPO3_MODE && '../' === substr($src, 0, 3)) {
            $src = substr($src, 3);
        }
        return (array) $this->contentObject->getImgResource($src, $setup);
    }

    /**
     * returns an array of srcsets based on the mixed ViewHelper
     * input (list, csv, array, iterator)
     *
     * @return array
     */
    public function getSourceSetWidths()
    {
        $srcsets = $this->arguments['srcset'];
        if (true === $srcsets instanceof \Traversable) {
            $srcsets = iterator_to_array($srcsets);
        } elseif (true === is_string($srcsets)) {
            $srcsets = GeneralUtility::trimExplode(',', $srcsets, true);
        } else {
            $srcsets = (array) $srcsets;
        }
        return $srcsets;
    }
}
