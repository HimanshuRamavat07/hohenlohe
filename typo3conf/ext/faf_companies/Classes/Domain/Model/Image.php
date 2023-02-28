<?php
namespace Faf\FafCompanies\Domain\Model;


/***
 *
 * This file is part of the "Companies" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2020 
 *
 ***/
/**
 * Company
 */
class Image extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
 /**
     * image
     * 
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference>
     * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
     */
    protected $image = null;

 
    /**
     * rte
     * 
     * @var string
     */
    protected $rte = '';

 

    /**
     * __construct
     */
    public function __construct() {
        //Do not remove the next line: It would break the functionality
        $this->initStorageObjects();
    }

    /**
     * Initializes all ObjectStorage properties
     * Do not modify this method!
     * It will be rewritten on each save in the extension builder
     * You may modify the constructor of this class instead
     *
     * @return void
     */
    protected function initStorageObjects() {
        $this->image = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }

    /**
     * Returns the image
     * 
     * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $image
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Sets the image
     * 
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $companylogo
     * @return void
     */
    public function setImage(\TYPO3\CMS\Extbase\Domain\Model\FileReference $Image)
    {
        $this->image = $image;
    }

  

    /**
     * Returns the rte
     * 
     * @return string $rte
     */
    public function getRte()
    {
        return $this->rte;
    }

    /**
     * Sets the rte
     * 
     * @param string $rte
     * @return void
     */
    public function setRte($rte)
    {
        $this->rte = $rte;
    }

   
}


