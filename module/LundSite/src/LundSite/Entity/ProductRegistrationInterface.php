<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 */
/**
 * LundSite
 *
 * PHP version 5.5
 *
 * @category   Zend
 * @package    LundSite\Entity
 * @subpackage Interface
 * @author     Jason Guthery <jason@rocketred.com>
 * @copyright  2013 Rocket Red (http://www.rocketred.com)
 * @license    http://opensource.org/licenses/BSD-3-Clause BSD 3-Clause
 * @version    GIT: $Id$
 * @link       https://github.com/rocketred/www-lunddigitalplatform for the canonical source repository
 * @since      File available since Release 0.1.0
 */

namespace LundSite\Entity;

/**
 * ProductRegistration Interface
 */
interface ProductRegistrationInterface
{
    /**
     * @param  \DateTime           $createdAt
     * @return ProductRegistration
     */
    public function setCreatedAt($createdAt);

    /**
     * @return \DateTime
     */
    public function getCreatedAt();

    /**
     * @param  string              $createdBy
     * @return ProductRegistration
     */
    public function setCreatedBy($createdBy);

    /**
     * @return string
     */
    public function getCreatedBy();

    /**
     * @param  \DateTime           $modifiedAt
     * @return ProductRegistration
     */
    public function setModifiedAt($modifiedAt);

    /**
     * @return \DateTime
     */
    public function getModifiedAt();

    /**
     * @param  string              $modifiedBy
     * @return ProductRegistration
     */
    public function setModifiedBy($modifiedBy);

    /**
     * @return string
     */
    public function getModifiedBy();

    /**
     * @param  boolean             $deleted
     * @return ProductRegistration
     */
    public function setDeleted($deleted);

    /**
     * @return boolean
     */
    public function getDeleted();

    /**
     * @param  boolean             $disabled
     * @return ProductRegistration
     */
    public function setDisabled($disabled);

    /**
     * @return boolean
     */
    public function getDisabled();

    /**
     * @param  string              $title
     * @return ProductRegistration
     */
    public function setTitle($title);

    /**
     * @return string
     */
    public function getTitle();

    /**
     * @param  string              $firstName
     * @return ProductRegistration
     */
    public function setFirstName($firstName);

    /**
     * @return string
     */
    public function getFirstName();

    /**
     * @param  string              $middleInitial
     * @return ProductRegistration
     */
    public function setMiddleInitial($middleInitial);

    /**
     * @return string
     */
    public function getMiddleInitial();

    /**
     * @param  string              $lastName
     * @return ProductRegistration
     */
    public function setLastName($lastName);

    /**
     * @return string
     */
    public function getLastName();

    /**
     * @param  string              $emailAddress
     * @return ProductRegistration
     */
    public function setEmailAddress($emailAddress);

    /**
     * @return string
     */
    public function getEmailAddress();

    /**
     * @param  string              $streetAddress
     * @return ProductRegistration
     */
    public function setStreetAddress($streetAddress);

    /**
     * @return string
     */
    public function getStreetAddress();

    /**
     * @param  string              $extStreetAddress
     * @return ProductRegistration
     */
    public function setExtStreetAddress($extStreetAddress);

    /**
     * @return string
     */
    public function getExtStreetAddress();

    /**
     * @param  string              $locality
     * @return ProductRegistration
     */
    public function setLocality($locality);

    /**
     * @return string
     */
    public function getLocality();

    /**
     * @param  string              $postCode
     * @return ProductRegistration
     */
    public function setPostCode($postCode);

    /**
     * @return string
     */
    public function getPostCode();

    /**
     * @param  string              $phoneNumber
     * @return ProductRegistration
     */
    public function setPhoneNumber($phoneNumber);

    /**
     * @return string
     */
    public function getPhoneNumber();

    /**
     * @param  string              $birthDate
     * @return ProductRegistration
     */
    public function setBirthDate($birthDate);

    /**
     * @return string
     */
    public function getBirthDate();

    /**
     * @param  string              $maritalStatus
     * @return ProductRegistration
     */
    public function setMaritalStatus($maritalStatus);

    /**
     * @return string
     */
    public function getMaritalStatus();

    /**
     * @param  string              $upcCode
     * @return ProductRegistration
     */
    public function setUpcCode($upcCode);

    /**
     * @return string
     */
    public function getUpcCode();

    /**
     * @param  string              $ownedLength
     * @return ProductRegistration
     */
    public function setOwnedLength($ownedLength);

    /**
     * @return string
     */
    public function getOwnedLength();

    /**
     * @param  string              $pricePaid
     * @return ProductRegistration
     */
    public function setPricePaid($pricePaid);

    /**
     * @return string
     */
    public function getPricePaid();

    /**
     * @param  string              $wherePurchased
     * @return ProductRegistration
     */
    public function setWherePurchased($wherePurchased);

    /**
     * @return string
     */
    public function getWherePurchased();

    /**
     * @param  string              $installer
     * @return ProductRegistration
     */
    public function setInstaller($installer);

    /**
     * @return string
     */
    public function getInstaller();

    /**
     * @param  boolean             $shopStore
     * @return ProductRegistration
     */
    public function setShopStore($shopStore);

    /**
     * @return boolean
     */
    public function getShopStore();

    /**
     * @param  boolean             $shopOnline
     * @return ProductRegistration
     */
    public function setShopOnline($shopOnline);

    /**
     * @return boolean
     */
    public function getShopOnline();

    /**
     * @param  boolean             $shopCatalog
     * @return ProductRegistration
     */
    public function setShopCatalog($shopCatalog);

    /**
     * @return boolean
     */
    public function getShopCatalog();

    /**
     * @param  boolean             $brandInMind
     * @return ProductRegistration
     */
    public function setBrandInMind($brandInMind);

    /**
     * @return boolean
     */
    public function getBrandInMind();

    /**
     * @param  boolean             $brandPurchased
     * @return ProductRegistration
     */
    public function setBrandPurchased($brandPurchased);

    /**
     * @return boolean
     */
    public function getBrandPurchased();

    /**
     * @param  string              $easeOfInstallation
     * @return ProductRegistration
     */
    public function setEaseOfInstallation($easeOfInstallation);

    /**
     * @return string
     */
    public function getEaseOfInstallation();

    /**
     * @param  string              $quality
     * @return ProductRegistration
     */
    public function setQuality($quality);

    /**
     * @return string
     */
    public function getQuality();

    /**
     * @param  string              $valueOfMoney
     * @return ProductRegistration
     */
    public function setValueOfMoney($valueOfMoney);

    /**
     * @return string
     */
    public function getValueOfMoney();

    /**
     * @param  string              $overall
     * @return ProductRegistration
     */
    public function setOverall($overall);

    /**
     * @return string
     */
    public function getOverall();

    /**
     * @param  boolean             $infReputation
     * @return ProductRegistration
     */
    public function setInfReputation($infReputation);

    /**
     * @return boolean
     */
    public function getInfReputation();

    /**
     * @param  boolean             $infEase
     * @return ProductRegistration
     */
    public function setInfEase($infEase);

    /**
     * @return boolean
     */
    public function getInfEase();

    /**
     * @param  boolean             $infDealer
     * @return ProductRegistration
     */
    public function setInfDealer($infDealer);

    /**
     * @return boolean
     */
    public function getInfDealer();

    /**
     * @param  boolean             $infRecommendation
     * @return ProductRegistration
     */
    public function setInfRecommendation($infRecommendation);

    /**
     * @return boolean
     */
    public function getInfRecommendation();

    /**
     * @param  boolean             $infFunctionality
     * @return ProductRegistration
     */
    public function setInfFunctionality($infFunctionality);

    /**
     * @return boolean
     */
    public function getInfFunctionality();

    /**
     * @param  boolean             $infAvailability
     * @return ProductRegistration
     */
    public function setInfAvailability($infAvailability);

    /**
     * @return boolean
     */
    public function getInfAvailability();

    /**
     * @param  boolean             $infPrice
     * @return ProductRegistration
     */
    public function setInfPrice($infPrice);

    /**
     * @return boolean
     */
    public function getInfPrice();

    /**
     * @param  boolean             $infStyle
     * @return ProductRegistration
     */
    public function setInfStyle($infStyle);

    /**
     * @return boolean
     */
    public function getInfStyle();

    /**
     * @param  boolean             $infQuality
     * @return ProductRegistration
     */
    public function setInfQuality($infQuality);

    /**
     * @return boolean
     */
    public function getInfQuality();

    /**
     * @param  boolean             $infWarranty
     * @return ProductRegistration
     */
    public function setInfWarranty($infWarranty);

    /**
     * @return boolean
     */
    public function getInfWarranty();

    /**
     * @param  boolean             $infOther
     * @return ProductRegistration
     */
    public function setInfOther($infOther);

    /**
     * @return boolean
     */
    public function getInfOther();

    /**
     * @param  string              $personOneGender
     * @return ProductRegistration
     */
    public function setPersonOneGender($personOneGender);

    /**
     * @return string
     */
    public function getPersonOneGender();

    /**
     * @param  string              $personOneAge
     * @return ProductRegistration
     */
    public function setPersonOneAge($personOneAge);

    /**
     * @return string
     */
    public function getPersonOneAge();

    /**
     * @param  string              $personTwoGender
     * @return ProductRegistration
     */
    public function setPersonTwoGender($personTwoGender);

    /**
     * @return string
     */
    public function getPersonTwoGender();

    /**
     * @param  string              $personTwoAge
     * @return ProductRegistration
     */
    public function setPersonTwoAge($personTwoAge);

    /**
     * @return string
     */
    public function getPersonTwoAge();

    /**
     * @param  string              $personThreeGender
     * @return ProductRegistration
     */
    public function setPersonThreeGender($personThreeGender);

    /**
     * @return string
     */
    public function getPersonThreeGender();

    /**
     * @param  string              $personThreeAge
     * @return ProductRegistration
     */
    public function setPersonThreeAge($personThreeAge);

    /**
     * @return string
     */
    public function getPersonThreeAge();

    /**
     * @param  string              $personFourGender
     * @return ProductRegistration
     */
    public function setPersonFourGender($personFourGender);

    /**
     * @return string
     */
    public function getPersonFourGender();

    /**
     * @param  string              $personFourAge
     * @return ProductRegistration
     */
    public function setPersonFourAge($personFourAge);

    /**
     * @return string
     */
    public function getPersonFourAge();

    /**
     * @param  boolean             $noneHousehold
     * @return ProductRegistration
     */
    public function setNoneHousehold($noneHousehold);

    /**
     * @return boolean
     */
    public function getNoneHousehold();

    /**
     * @param  boolean             $childUnderOne
     * @return ProductRegistration
     */
    public function setChildUnderOne($childUnderOne);

    /**
     * @return boolean
     */
    public function getChildUnderOne();

    /**
     * @param  string              $youOccupation
     * @return ProductRegistration
     */
    public function setYouOccupation($youOccupation);

    /**
     * @return string
     */
    public function getYouOccupation();

    /**
     * @param  string              $spouseOccupation
     * @return ProductRegistration
     */
    public function setSpouseOccupation($spouseOccupation);

    /**
     * @return string
     */
    public function getSpouseOccupation();

    /**
     * @param  boolean             $youHomemaker
     * @return ProductRegistration
     */
    public function setYouHomemaker($youHomemaker);

    /**
     * @return boolean
     */
    public function getYouHomemaker();

    /**
     * @param  boolean             $spouseHomemaker
     * @return ProductRegistration
     */
    public function setSpouseHomemaker($spouseHomemaker);

    /**
     * @return boolean
     */
    public function getSpouseHomemaker();

    /**
     * @param  boolean             $youRetired
     * @return ProductRegistration
     */
    public function setYouRetired($youRetired);

    /**
     * @return boolean
     */
    public function getYouRetired();

    /**
     * @param  boolean             $spouseRetired
     * @return ProductRegistration
     */
    public function setSpouseRetired($spouseRetired);

    /**
     * @return boolean
     */
    public function getSpouseRetired();

    /**
     * @param  boolean             $youStudent
     * @return ProductRegistration
     */
    public function setYouStudent($youStudent);

    /**
     * @return boolean
     */
    public function getYouStudent();

    /**
     * @param  boolean             $spouseStudent
     * @return ProductRegistration
     */
    public function setSpouseStudent($spouseStudent);

    /**
     * @return boolean
     */
    public function getSpouseStudent();

    /**
     * @param  boolean             $youOwner
     * @return ProductRegistration
     */
    public function setYouOwner($youOwner);

    /**
     * @return boolean
     */
    public function getYouOwner();

    /**
     * @param  boolean             $spouseOwner
     * @return ProductRegistration
     */
    public function setSpouseOwner($spouseOwner);

    /**
     * @return boolean
     */
    public function getSpouseOwner();

    /**
     * @param  boolean             $youHome
     * @return ProductRegistration
     */
    public function setYouHome($youHome);

    /**
     * @return boolean
     */
    public function getYouHome();

    /**
     * @param  boolean             $spouseHome
     * @return ProductRegistration
     */
    public function setSpouseHome($spouseHome);

    /**
     * @return boolean
     */
    public function getSpouseHome();

    /**
     * @param  boolean             $youMilitary
     * @return ProductRegistration
     */
    public function setYouMilitary($youMilitary);

    /**
     * @return boolean
     */
    public function getYouMilitary();

    /**
     * @param  boolean             $spouseMilitary
     * @return ProductRegistration
     */
    public function setSpouseMilitary($spouseMilitary);

    /**
     * @return boolean
     */
    public function getSpouseMilitary();

    /**
     * @param  boolean             $youVeteran
     * @return ProductRegistration
     */
    public function setYouVeteran($youVeteran);

    /**
     * @return boolean
     */
    public function getYouVeteran();

    /**
     * @param  boolean             $spouseVeteran
     * @return ProductRegistration
     */
    public function setSpouseVeteran($spouseVeteran);

    /**
     * @return boolean
     */
    public function getSpouseVeteran();

    /**
     * @param  string              $income
     * @return ProductRegistration
     */
    public function setIncome($income);

    /**
     * @return string
     */
    public function getIncome();

    /**
     * @param  string              $education
     * @return ProductRegistration
     */
    public function setEducation($education);

    /**
     * @return string
     */
    public function getEducation();

    /**
     * @param  string              $creditCards
     * @return ProductRegistration
     */
    public function setCreditCards($creditCards);

    /**
     * @return string
     */
    public function getCreditCards();

    /**
     * @param  string              $residence
     * @return ProductRegistration
     */
    public function setResidence($residence);

    /**
     * @return string
     */
    public function getResidence();

    /**
     * @param  string              $magazineSubscribed
     * @return ProductRegistration
     */
    public function setMagazineSubscribed($magazineSubscribed);

    /**
     * @return string
     */
    public function getMagazineSubscribed();

    /**
     * @param  string              $magazinePurchased
     * @return ProductRegistration
     */
    public function setMagazinePurchased($magazinePurchased);

    /**
     * @return string
     */
    public function getMagazinePurchased();

    /**
     * @param  string              $newWithin
     * @return ProductRegistration
     */
    public function setNewWithin($newWithin);

    /**
     * @return string
     */
    public function getNewWithin();

    /**
     * @param  string              $usedWithin
     * @return ProductRegistration
     */
    public function setUsedWithin($usedWithin);

    /**
     * @return string
     */
    public function getUsedWithin();

    /**
     * @param  string              $purchaseType
     * @return ProductRegistration
     */
    public function setPurchaseType($purchaseType);

    /**
     * @return string
     */
    public function getPurchaseType();

    /**
     * @param  boolean             $optout
     * @return ProductRegistration
     */
    public function setOptout($optout);

    /**
     * @return boolean
     */
    public function getOptout();

    /**
     * @return integer
     */
    public function getProductRegistrationId();

    /**
     * @param  \RocketCms\Entity\Site $site
     * @return ProductRegistration
     */
    public function setSite(\RocketCms\Entity\Site $site = null);

    /**
     * @return \RocketCms\Entity\Site
     */
    public function getSite();

    /**
     * @param  \RocketBase\Entity\State $region
     * @return ProductRegistration
     */
    public function setRegion(\RocketBase\Entity\State $region = null);

    /**
     * @return \RocketBase\Entity\State
     */
    public function getRegion();

    /**
     * @param  \RocketBase\Entity\Country $country
     * @return ProductRegistration
     */
    public function setCountry(\RocketBase\Entity\Country $country = null);

    /**
     * @return \RocketBase\Entity\Country
     */
    public function getCountry();

    /**
     * @param  \LundProducts\Entity\ProductCategories $productCategory
     * @return ProductRegistration
     */
    public function setProductCategory(\LundProducts\Entity\ProductCategories $productCategory = null);

    /**
     * @return \LundProducts\Entity\ProductCategories
     */
    public function getProductCategory();

    /**
     * @param  \LundProducts\Entity\VehYear $vehYear
     * @return ProductRegistration
     */
    public function setVehYear(\LundProducts\Entity\VehYear $vehYear = null);

    /**
     * @return \LundProducts\Entity\VehYear
     */
    public function getVehYear();

    /**
     * @param  \LundProducts\Entity\VehMake $vehMake
     * @return ProductRegistration
     */
    public function setVehMake(\LundProducts\Entity\VehMake $vehMake = null);

    /**
     * @return \LundProducts\Entity\VehMake
     */
    public function getVehMake();

    /**
     * @param  \LundProducts\Entity\VehModel $vehModel
     * @return ProductRegistration
     */
    public function setVehModel(\LundProducts\Entity\VehModel $vehModel = null);

    /**
     * @return \LundProducts\Entity\VehModel
     */
    public function getVehModel();

    /**
     * @param  \LundProducts\Entity\VehSubmodel $vehSubmodel
     * @return ProductRegistration
     */
    public function setVehSubmodel(\LundProducts\Entity\VehSubmodel $vehSubmodel = null);

    /**
     * @return \LundProducts\Entity\VehSubmodel
     */
    public function getVehSubmodel();

    /**
     * @param  \LundProducts\Entity\VehYear $recVehYear
     * @return ProductRegistration
     */
    public function setRecVehYear(\LundProducts\Entity\VehYear $recVehYear = null);

    /**
     * @return \LundProducts\Entity\VehYear
     */
    public function getRecVehYear();

    /**
     * @param  \LundProducts\Entity\VehMake $recVehMake
     * @return ProductRegistration
     */
    public function setRecVehMake(\LundProducts\Entity\VehMake $recVehMake = null);

    /**
     * @return \LundProducts\Entity\VehMake
     */
    public function getRecVehMake();

    /**
     * @param  \LundProducts\Entity\VehModel $recVehModel
     * @return ProductRegistration
     */
    public function setRecVehModel(\LundProducts\Entity\VehModel $recVehModel = null);

    /**
     * @return \LundProducts\Entity\VehModel
     */
    public function getRecVehModel();

    /**
     * @param  \LundProducts\Entity\VehSubmodel $recVehSubmodel
     * @return ProductRegistration
     */
    public function setRecVehSubmodel(\LundProducts\Entity\VehSubmodel $recVehSubmodel = null);

    /**
     * @return \LundProducts\Entity\VehSubmodel
     */
    public function getRecVehSubmodel();

    /**
     * @param  \LundSite\Entity\AboutHousehold $aboutHousehold
     * @return ProductRegistration
     */
    //public function addAboutHousehold(\LundSite\Entity\AboutHousehold $aboutHousehold);
    public function addAboutHousehold(\Doctrine\Common\Collections\ArrayCollection $aboutHousehold);

    /**
     * @param \LundSite\Entity\AboutHousehold $aboutHousehold
     */
    //public function removeAboutHousehold(\LundSite\Entity\AboutHousehold $aboutHousehold);
    public function removeAboutHousehold(\Doctrine\Common\Collections\ArrayCollection $aboutHousehold);

    /**
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAboutHousehold();

    /**
     * @param  \LundSite\Entity\LifestyleHousehold $lifestyleHousehold
     * @return ProductRegistration
     */
    //public function addLifestyleHousehold(\LundSite\Entity\LifestyleHousehold $lifestyleHousehold);
    public function addLifestyleHousehold(\Doctrine\Common\Collections\ArrayCollection $lifestyleHousehold);

    /**
     * @param \LundSite\Entity\LifestyleHousehold $lifestyleHousehold
     */
    //public function removeLifestyleHousehold(\LundSite\Entity\LifestyleHousehold $lifestyleHousehold);
    public function removeLifestyleHousehold(\Doctrine\Common\Collections\ArrayCollection $lifestyleHousehold);

    /**
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getLifestyleHousehold();
}
