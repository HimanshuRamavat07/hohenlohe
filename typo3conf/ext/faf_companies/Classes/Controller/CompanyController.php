<?php
namespace Faf\FafCompanies\Controller;

use Psr\Http\Message\ResponseInterface;
use Faf\FafCompanies\Domain\Model\Company;
use TYPO3\CMS\Extbase\Utility\DebuggerUtility as Debug;
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
 * CompanyController
 */
class CompanyController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * companyRepository
     * 
     * @var \Faf\FafCompanies\Domain\Repository\CompanyRepository
     */
    protected $companyRepository = null;

    /**
     * @param \Faf\FafCompanies\Domain\Repository\CompanyRepository $companyRepository
     */
    public function injectCompanyRepository(\Faf\FafCompanies\Domain\Repository\CompanyRepository $companyRepository)
    {
        $this->companyRepository = $companyRepository;
    }

    /**
     * action list
     * 
     * @return void
     */
    public function listAction()
    {        
        $makeArray = explode(",",$this->settings['records']);
        $companies = [];
        foreach ($makeArray as $key => $value) {
            $companies[] = $this->companyRepository->findByUid($value);            
        }
        $this->view->assign('companies', $companies);
    }
       /**
     * action show
     *
     *  
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function showAction()
    {     
        $company  = $this->request->getArgument('company');            
        $uid = is_object($company) ? $company->getUid() : $company;
        $company = $this->companyRepository->findByUid($uid);
        $this->view->assign('company', $company);
    }
}
