<?php
namespace Faf\FafCompanies\Domain\Model;

use TYPO3\CMS\Extbase\Annotation as Extbase;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;
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
class Company extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * companylogo
     * 
     * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
     * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
     */
    protected $companylogo = null;

    /**
     * hoverlogo
     * 
     * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
     * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
     */
    protected $hoverlogo = null;

    /**
     * name
     * 
     * @var string
     */
    protected $name = '';

    /**
     * subline
     * 
     * @var string
     */
    protected $subline = '';

    /**
     * linktext
     * 
     * @var string
     */
    protected $linktext = '';

    /**
     * modelbannerimages
     * 
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference>
     * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
     */
    protected $modelbannerimages = null;

    /**
     * modelbannertitle
     * 
     * @var string
     */
    protected $modelbannertitle = '';

    /**
     * modelcontent
     * 
     * @var string
     */
    protected $modelcontent = '';

       /**
     * industry
     * 
     * @var string
     */
    protected $industry = '';

    /**
     * year
     * 
     * @var string
     */
    protected $year = '';

        /**
     * address
     * 
     * @var string
     */
    protected $address = '';

     /**
     * cooperating
     *
     * @var string
     */
    protected $cooperating = '';

     /**
     * facebook
     * 
     * @var string
     */
    protected $facebook = '';

      /**
     * youtube
     * 
     * @var string
     */
    protected $youtube = '';

       /**
     * instagram
     * 
     * @var string
     */
    protected $instagram = '';

       /**
     * linkedin
     * 
     * @var string
     */
    protected $linkedin = '';

       /**
     * xing
     * 
     * @var string
     */
    protected $xing = '';
      /**
     * rating
     *
     * @var int
     */
    protected $rating = 1;

      /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Faf\FafCompanies\Domain\Model\Image>
     * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
     */
    protected $images = null;

       /**
     * textcontent
     * 
     * @var string
     */
    protected $textcontent = '';

    /**
     * name
     * 
     * @var string
     */
    protected $media = '';
      /**
     * bottomcontent
     * 
     * @var string
     */
    protected $bottomcontent = '';

    /**
     * name
     * 
     * @var string
     */
    protected $slug = '';

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
        $this->modelbannerimages = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->images = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }

    /**
     * Returns the companylogo
     * 
     * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $companylogo
     */
    public function getCompanylogo()
    {
        return $this->companylogo;
    }

    /**
     * Sets the companylogo
     * 
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $companylogo
     * @return void
     */
    public function setCompanylogo(\TYPO3\CMS\Extbase\Domain\Model\FileReference $companylogo)
    {
        $this->companylogo = $companylogo;
    }

    /**
     * Returns the hoverlogo
     * 
     * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $hoverlogo
     */
    public function getHoverlogo()
    {
        return $this->hoverlogo;
    }

    /**
     * Sets the hoverlogo
     * 
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $hoverlogo
     * @return void
     */
    public function setHoverlogo(\TYPO3\CMS\Extbase\Domain\Model\FileReference $hoverlogo)
    {
        $this->hoverlogo = $hoverlogo;
    }

    /**
     * Returns the name
     * 
     * @return string $name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets the name
     * 
     * @param string $name
     * @return void
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Returns the subline
     * 
     * @return string $subline
     */
    public function getSubline()
    {
        return $this->subline;
    }

    /**
     * Sets the subline
     * 
     * @param string $subline
     * @return void
     */
    public function setSubline($subline)
    {
        $this->subline = $subline;
    }

    /**
     * Returns the linktext
     * 
     * @return string $linktext
     */
    public function getLinktext()
    {
        return $this->linktext;
    }

    /**
     * Sets the linktext
     * 
     * @param string $linktext
     * @return void
     */
    public function setLinktext($linktext)
    {
        $this->linktext = $linktext;
    }

    /**
     * Returns the modelbannerimages
     * 
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference> $modelbannerimages
     */
    public function getModelbannerimages()
    {
        return $this->modelbannerimages;
    }

    /**
     * Adds a modelbannerimages
     *
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $modelbannerimages
     * @return void
     */
    public function addModelbannerimages(\TYPO3\CMS\Extbase\Domain\Model\FileReference $modelbannerimages) {
        $this->modelbannerimages->attach($modelbannerimages);
    }

    /**
     * Removes a modelbannerimages
     *
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $modelbannerimagesToRemove The modelbannerimages to be removed
     * @return void
     */
    public function removeModelbannerimages(\TYPO3\CMS\Extbase\Domain\Model\FileReference $modelbannerimages) {
        $this->modelbannerimages->detach($modelbannerimages);
    }

    /**
     * Sets the modelbannerimages
     * 
    * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference> $modelbannerimages
    * @return void
     */
    public function setModelbannerimages(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $modelbannerimages)
    {
        $this->modelbannerimages = $modelbannerimages;
    }

    /**
     * Returns the modelbannertitle
     * 
     * @return string $modelbannertitle
     */
    public function getModelbannertitle()
    {
        return $this->modelbannertitle;
    }

    /**
     * Sets the modelbannertitle
     * 
     * @param string $modelbannertitle
     * @return void
     */
    public function setModelbannertitle($modelbannertitle)
    {
        $this->modelbannertitle = $modelbannertitle;
    }

    /**
     * Returns the modelcontent
     * 
     * @return string $modelcontent
     */
    public function getModelcontent()
    {
        return $this->modelcontent;
    }

    /**
     * Sets the modelcontent
     * 
     * @param string $modelcontent
     * @return void
     */
    public function setModelcontent($modelcontent)
    {
        $this->modelcontent = $modelcontent;
    }
     /**
     * Returns the year
     * 
     * @return string $year
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * Sets the year
     * 
     * @param string $year
     * @return void
     */
    public function setYear($year)
    {
        $this->year = $year;
    }
     /**
     * Returns the industry
     * 
     * @return string $industry
     */
    public function getIndustry()
    {
        return $this->industry;
    }

    /**
     * Sets the industry
     * 
     * @param string $industry
     * @return void
     */
    public function setIndustry($industry)
    {
        $this->industry = $industry;
    }

     /**
     * Returns the address
     * 
     * @return string $address
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Returns the address
     * 
     * @return string $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    
     /**
     * Returns the cooperating
     * 
     * @return string $cooperating
     */
    public function getCooperating()
    {
        return $this->cooperating;
    }

    /**
     * Returns the cooperating
     * 
     * @return string $cooperating
     */
    public function setCooperating($cooperating)
    {
        $this->cooperating = $cooperating;
    }


     /**
     * Returns the facebook
     * 
     * @return string $facebook
     */
    public function getFacebook()
    {
        return $this->facebook;
    }

    /**
     * Sets the facebook
     * 
     * @param string $facebook
     * @return void
     */
    public function setFacebook($facebook)
    {
        $this->facebook = $facebook;
    }

    /**
     * Returns the youtube
     * 
     * @return string $youtube
     */
    public function getYoutube()
    {
        return $this->youtube;
    }

    /**
     * Sets the youtube
     * 
     * @param string $youtube
     * @return void
     */
    public function setYoutube($youtube)
    {
        $this->youtube = $youtube;
    }

     /**
     * Returns the instagram
     * 
     * @return string $instagram
     */
    public function getInstagram()
    {
        return $this->instagram;
    }

    /**
     * Sets the instagram
     * 
     * @param string $instagram
     * @return void
     */
    public function setInstagram($instagram)
    {
        $this->instagram = $instagram;
    }

      /**
     * Returns the linkedin
     * 
     * @return string $linkedin
     */
    public function getLinkedin()
    {
        return $this->linkedin;
    }

    /**
     * Sets the linkedin
     * 
     * @param string $linkedin
     * @return void
     */
    public function setLinkedin($linkedin)
    {
        $this->linkedin = $linkedin;
    }
     /**
     * Returns the xing
     * 
     * @return string $xing
     */
    public function getXing()
    {
        return $this->xing;
    }

    /**
     * Sets the xing
     * 
     * @param string $xing
     * @return void
     */
    public function setXing($xing)
    {
        $this->xing = $xing;
    }
      /**
     * Returns the rating
     *
     * @return int $rating
     */
    public function getRating()
    {
        return $this->rating;
    }

    /**
     * Sets the rating
     *
     * @param float $rating
     * @return void
     */
    public function setRating($rating)
    {
        $this->rating = $rating;
    }

          /**
     * Get images
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
     */
    public function getImages()
    {
        return $this->images;
    }
   /**
     * Set images
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $images images
     *
     * @return void
     */
    public function setImages($images)
    {
        $this->images = $images;
    }

      /**
     * Adds a images content to the record
     *
     * @param \Faf\FafCompanies\Domain\Model\Image $images
     *
     * @return void
     */
    public function addImages(Image $images): void
    {
        if ($this->getImages() === null) {
            $this->images = new ObjectStorage();
        }
        $this->images->attach($images);
    }
  /**
     * Returns the textcontent
     * 
     * @return string $textcontent
     */
    public function getTextcontent()
    {
        return $this->textcontent;
    }

   /**
     * Sets the textcontent
     * 
     * @param string $textcontent
     * @return void
     */
    public function setTextcontent($textcontent)
    {
        $this->textcontent = $textcontent;
    }
     /**
     * Returns the textcontent
     * 
     * @return string $media
     */
    public function getMedia()
    {
        return $this->media;
    }

   /**
     * Sets the textcontent
     * 
     * @param string $textcontent
     * @return void
     */
    public function setMedia($media)
    {
        $this->media = $media;
       
    }

       /**
     * Returns the bottomcontent
     *
     * @return int $bottomcontent
     */
    public function getBottomcontent()
    {
        return $this->bottomcontent;
    }

    /**
     * Sets the bottomcontent
     *
     * @param int $bottomcontent
     * @return void
     */
    public function setBottomcontent($bottomcontent)
    {
        $this->bottomcontent = $bottomcontent;
    }

    /**
     * Returns the slug
     * 
     * @return string $slug
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Sets the slug
     * 
     * @param string $slug
     * @return void
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
    }
}


