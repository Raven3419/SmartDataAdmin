<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 */
/**
 * LundSite
 *
 * PHP version 5.5
 *
 * @category   Zend
 * @package    LundSite
 * @subpackage Entity
 * @author     Jason Guthery <jason@rocketred.com>
 * @copyright  2013 Rocket Red (http://www.rocketred.com)
 * @license    http://opensource.org/licenses/BSD-3-Clause BSD 3-Clause
 * @version    GIT: $Id$
 * @link       https://github.com/rocketred/www-lunddigitalplatform for the canonical source repository
 * @since      File available since Release 0.1.0
 */

namespace LundSite\Entity;

/**
 * ProductRegistration
 *
 * @see ProductRegistrationInterface
 */
class ProductRegistration implements ProductRegistrationInterface
{
    /**
     * @var \DateTime
     */
    protected $createdAt;

    /**
     * @var string
     */
    protected $createdBy;

    /**
     * @var \DateTime
     */
    protected $modifiedAt;

    /**
     * @var string
     */
    protected $modifiedBy;

    /**
     * @var boolean
     */
    protected $deleted;

    /**
     * @var boolean
     */
    protected $disabled;

    /**
     * @var string
     */
    protected $title;

    /**
     * @var string
     */
    protected $firstName;

    /**
     * @var string
     */
    protected $middleInitial;

    /**
     * @var string
     */
    protected $lastName;

    /**
     * @var string
     */
    protected $emailAddress;

    /**
     * @var string
     */
    protected $streetAddress;

    /**
     * @var string
     */
    protected $extStreetAddress;

    /**
     * @var string
     */
    protected $locality;

    /**
     * @var string
     */
    protected $postCode;

    /**
     * @var string
     */
    protected $phoneNumber;

    /**
     * @var date
     */
    protected $birthDate;

    /**
     * @var string
     */
    protected $maritalStatus;

    /**
     * @var string
     */
    protected $upcCode;

    /**
     * @var string
     */
    protected $ownedLength;

    /**
     * @var string
     */
    protected $pricePaid;

    /**
     * @var string
     */
    protected $wherePurchased;

    /**
     * @var string
     */
    protected $installer;

    /**
     * @var boolean
     */
    protected $shopStore;

    /**
     * @var boolean
     */
    protected $shopOnline;

    /**
     * @var boolean
     */
    protected $shopCatalog;

    /**
     * @var boolean
     */
    protected $brandInMind;

    /**
     * @var boolean
     */
    protected $brandPurchased;

    /**
     * @var string
     */
    protected $easeOfInstallation;

    /**
     * @var string
     */
    protected $quality;

    /**
     * @var string
     */
    protected $valueOfMoney;

    /**
     * @var string
     */
    protected $overall;

    /**
     * @var boolean
     */
    protected $infReputation;

    /**
     * @var boolean
     */
    protected $infEase;

    /**
     * @var boolean
     */
    protected $infDealer;

    /**
     * @var boolean
     */
    protected $infRecommendation;

    /**
     * @var boolean
     */
    protected $infFunctionality;

    /**
     * @var boolean
     */
    protected $infAvailability;

    /**
     * @var boolean
     */
    protected $infPrice;

    /**
     * @var boolean
     */
    protected $infStyle;

    /**
     * @var boolean
     */
    protected $infQuality;

    /**
     * @var boolean
     */
    protected $infWarranty;

    /**
     * @var boolean
     */
    protected $infOther;

    /**
     * @var string
     */
    protected $personOneGender;

    /**
     * @var string
     */
    protected $personOneAge;

    /**
     * @var string
     */
    protected $personTwoGender;

    /**
     * @var string
     */
    protected $personTwoAge;

    /**
     * @var string
     */
    protected $personThreeGender;

    /**
     * @var string
     */
    protected $personThreeAge;

    /**
     * @var string
     */
    protected $personFourGender;

    /**
     * @var string
     */
    protected $personFourAge;

    /**
     * @var boolean
     */
    protected $noneHousehold;

    /**
     * @var boolean
     */
    protected $childUnderOne;

    /**
     * @var string
     */
    protected $youOccupation;

    /**
     * @var string
     */
    protected $spouseOccupation;

    /**
     * @var boolean
     */
    protected $youHomemaker;

    /**
     * @var boolean
     */
    protected $spouseHomemaker;

    /**
     * @var boolean
     */
    protected $youRetired;

    /**
     * @var boolean
     */
    protected $spouseRetired;

    /**
     * @var boolean
     */
    protected $youStudent;

    /**
     * @var boolean
     */
    protected $spouseStudent;

    /**
     * @var boolean
     */
    protected $youOwner;

    /**
     * @var boolean
     */
    protected $spouseOwner;

    /**
     * @var boolean
     */
    protected $youHome;

    /**
     * @var boolean
     */
    protected $spouseHome;

    /**
     * @var boolean
     */
    protected $youMilitary;

    /**
     * @var boolean
     */
    protected $spouseMilitary;

    /**
     * @var boolean
     */
    protected $youVeteran;

    /**
     * @var boolean
     */
    protected $spouseVeteran;

    /**
     * @var string
     */
    protected $income;

    /**
     * @var string
     */
    protected $education;

    /**
     * @var string
     */
    protected $creditCards;

    /**
     * @var string
     */
    protected $residence;

    /**
     * @var string
     */
    protected $magazineSubscribed;

    /**
     * @var string
     */
    protected $magazinePurchased;

    /**
     * @var string
     */
    protected $newWithin;

    /**
     * @var string
     */
    protected $usedWithin;

    /**
     * @var string
     */
    protected $purchaseType;

    /**
     * @var boolean
     */
    protected $optout;

    /**
     * @var integer
     */
    protected $productRegistrationId;

    /**
     * @var \RocketCms\Entity\Site
     */
    protected $site;

    /**
     * @var \RocketBase\Entity\State
     */
    protected $region;

    /**
     * @var \RocketBase\Entity\Country
     */
    protected $country;

    /**
     * @var \LundProducts\Entity\ProductCategories
     */
    protected $productCategory;

    /**
     * @var \LundProducts\Entity\VehYear
     */
    protected $vehYear;

    /**
     * @var \LundProducts\Entity\VehMake
     */
    protected $vehMake;

    /**
     * @var \LundProducts\Entity\VehModel
     */
    protected $vehModel;

    /**
     * @var \LundProducts\Entity\VehSubmodel
     */
    protected $vehSubmodel;

    /**
     * @var \LundProducts\Entity\VehYear
     */
    protected $recVehYear;

    /**
     * @var \LundProducts\Entity\VehMake
     */
    protected $recVehMake;

    /**
     * @var \LundProducts\Entity\VehModel
     */
    protected $recVehModel;

    /**
     * @var \LundProducts\Entity\VehSubmodel
     */
    protected $recVehSubmodel;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    protected $aboutHousehold;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    protected $lifestyleHousehold;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->aboutHousehold = new \Doctrine\Common\Collections\ArrayCollection();
        $this->lifestyleHousehold = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set createdAt
     *
     * @param  \DateTime           $createdAt
     * @return ProductRegistration
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set createdBy
     *
     * @param  string              $createdBy
     * @return ProductRegistration
     */
    public function setCreatedBy($createdBy)
    {
        $this->createdBy = $createdBy;

        return $this;
    }

    /**
     * Get createdBy
     *
     * @return string
     */
    public function getCreatedBy()
    {
        return $this->createdBy;
    }

    /**
     * Set modifiedAt
     *
     * @param  \DateTime           $modifiedAt
     * @return ProductRegistration
     */
    public function setModifiedAt($modifiedAt)
    {
        $this->modifiedAt = $modifiedAt;

        return $this;
    }

    /**
     * Get modifiedAt
     *
     * @return \DateTime
     */
    public function getModifiedAt()
    {
        return $this->modifiedAt;
    }

    /**
     * Set modifiedBy
     *
     * @param  string              $modifiedBy
     * @return ProductRegistration
     */
    public function setModifiedBy($modifiedBy)
    {
        $this->modifiedBy = $modifiedBy;

        return $this;
    }

    /**
     * Get modifiedBy
     *
     * @return string
     */
    public function getModifiedBy()
    {
        return $this->modifiedBy;
    }

    /**
     * Set deleted
     *
     * @param  boolean             $deleted
     * @return ProductRegistration
     */
    public function setDeleted($deleted)
    {
        $this->deleted = $deleted;

        return $this;
    }

    /**
     * Get deleted
     *
     * @return boolean
     */
    public function getDeleted()
    {
        return $this->deleted;
    }

    /**
     * Set disabled
     *
     * @param  boolean             $disabled
     * @return ProductRegistration
     */
    public function setDisabled($disabled)
    {
        $this->disabled = $disabled;

        return $this;
    }

    /**
     * Get disabled
     *
     * @return boolean
     */
    public function getDisabled()
    {
        return $this->disabled;
    }

    /**
     * Set title
     *
     * @param  string              $title
     * @return ProductRegistration
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set firstName
     *
     * @param  string              $firstName
     * @return ProductRegistration
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set middleInitial
     *
     * @param  string              $middleInitial
     * @return ProductRegistration
     */
    public function setMiddleInitial($middleInitial)
    {
        $this->middleInitial = $middleInitial;

        return $this;
    }

    /**
     * Get middleInitial
     *
     * @return string
     */
    public function getMiddleInitial()
    {
        return $this->middleInitial;
    }

    /**
     * Set lastName
     *
     * @param  string              $lastName
     * @return ProductRegistration
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set emailAddress
     *
     * @param  string              $emailAddress
     * @return ProductRegistration
     */
    public function setEmailAddress($emailAddress)
    {
        $this->emailAddress = $emailAddress;

        return $this;
    }

    /**
     * Get emailAddress
     *
     * @return string
     */
    public function getEmailAddress()
    {
        return $this->emailAddress;
    }

    /**
     * Set streetAddress
     *
     * @param  string              $streetAddress
     * @return ProductRegistration
     */
    public function setStreetAddress($streetAddress)
    {
        $this->streetAddress = $streetAddress;

        return $this;
    }

    /**
     * Get streetAddress
     *
     * @return string
     */
    public function getStreetAddress()
    {
        return $this->streetAddress;
    }

    /**
     * Set extStreetAddress
     *
     * @param  string              $extStreetAddress
     * @return ProductRegistration
     */
    public function setExtStreetAddress($extStreetAddress)
    {
        $this->extStreetAddress = $extStreetAddress;

        return $this;
    }

    /**
     * Get extStreetAddress
     *
     * @return string
     */
    public function getExtStreetAddress()
    {
        return $this->extStreetAddress;
    }

    /**
     * Set locality
     *
     * @param  string              $locality
     * @return ProductRegistration
     */
    public function setLocality($locality)
    {
        $this->locality = $locality;

        return $this;
    }

    /**
     * Get locality
     *
     * @return string
     */
    public function getLocality()
    {
        return $this->locality;
    }

    /**
     * Set postCode
     *
     * @param  string              $postCode
     * @return ProductRegistration
     */
    public function setPostCode($postCode)
    {
        $this->postCode = $postCode;

        return $this;
    }

    /**
     * Get postCode
     *
     * @return string
     */
    public function getPostCode()
    {
        return $this->postCode;
    }

    /**
     * Set phoneNumber
     *
     * @param  string              $phoneNumber
     * @return ProductRegistration
     */
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    /**
     * Get phoneNumber
     *
     * @return string
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * Set birthDate
     *
     * @param  string              $birthDate
     * @return ProductRegistration
     */
    public function setBirthDate($birthDate)
    {
        $this->birthDate = $birthDate;

        return $this;
    }

    /**
     * Get birthDate
     *
     * @return string
     */
    public function getBirthDate()
    {
        return $this->birthDate;
    }

    /**
     * Set maritalStatus
     *
     * @param  string              $maritalStatus
     * @return ProductRegistration
     */
    public function setMaritalStatus($maritalStatus)
    {
        $this->maritalStatus = $maritalStatus;

        return $this;
    }

    /**
     * Get maritalStatus
     *
     * @return string
     */
    public function getMaritalStatus()
    {
        return $this->maritalStatus;
    }

    /**
     * Set upcCode
     *
     * @param  string              $upcCode
     * @return ProductRegistration
     */
    public function setUpcCode($upcCode)
    {
        $this->upcCode = $upcCode;

        return $this;
    }

    /**
     * Get upcCode
     *
     * @return string
     */
    public function getUpcCode()
    {
        return $this->upcCode;
    }

    /**
     * Set ownedLength
     *
     * @param  string              $ownedLength
     * @return ProductRegistration
     */
    public function setOwnedLength($ownedLength)
    {
        $this->ownedLength = $ownedLength;

        return $this;
    }

    /**
     * Get ownedLength
     *
     * @return string
     */
    public function getOwnedLength()
    {
        return $this->ownedLength;
    }

    /**
     * Set pricePaid
     *
     * @param  string              $pricePaid
     * @return ProductRegistration
     */
    public function setPricePaid($pricePaid)
    {
        $this->pricePaid = $pricePaid;

        return $this;
    }

    /**
     * Get pricePaid
     *
     * @return string
     */
    public function getPricePaid()
    {
        return $this->pricePaid;
    }

    /**
     * Set wherePurchased
     *
     * @param  string              $wherePurchased
     * @return ProductRegistration
     */
    public function setWherePurchased($wherePurchased)
    {
        $this->wherePurchased = $wherePurchased;

        return $this;
    }

    /**
     * Get wherePurchased
     *
     * @return string
     */
    public function getWherePurchased()
    {
        return $this->wherePurchased;
    }

    /**
     * Set installer
     *
     * @param  string              $installer
     * @return ProductRegistration
     */
    public function setInstaller($installer)
    {
        $this->installer = $installer;

        return $this;
    }

    /**
     * Get installer
     *
     * @return string
     */
    public function getInstaller()
    {
        return $this->installer;
    }

    /**
     * Set shopStore
     *
     * @param  boolean             $shopStore
     * @return ProductRegistration
     */
    public function setShopStore($shopStore)
    {
        $this->shopStore = $shopStore;

        return $this;
    }

    /**
     * Get shopStore
     *
     * @return boolean
     */
    public function getShopStore()
    {
        return $this->shopStore;
    }

    /**
     * Set shopOnline
     *
     * @param  boolean             $shopOnline
     * @return ProductRegistration
     */
    public function setShopOnline($shopOnline)
    {
        $this->shopOnline = $shopOnline;

        return $this;
    }

    /**
     * Get shopOnline
     *
     * @return boolean
     */
    public function getShopOnline()
    {
        return $this->shopOnline;
    }

    /**
     * Set shopCatalog
     *
     * @param  boolean             $shopCatalog
     * @return ProductRegistration
     */
    public function setShopCatalog($shopCatalog)
    {
        $this->shopCatalog = $shopCatalog;

        return $this;
    }

    /**
     * Get shopCatalog
     *
     * @return boolean
     */
    public function getShopCatalog()
    {
        return $this->shopCatalog;
    }

    /**
     * Set brandInMind
     *
     * @param  boolean             $brandInMind
     * @return ProductRegistration
     */
    public function setBrandInMind($brandInMind)
    {
        $this->brandInMind = $brandInMind;

        return $this;
    }

    /**
     * Get brandInMind
     *
     * @return boolean
     */
    public function getBrandInMind()
    {
        return $this->brandInMind;
    }

    /**
     * Set brandPurchased
     *
     * @param  boolean             $brandPurchased
     * @return ProductRegistration
     */
    public function setBrandPurchased($brandPurchased)
    {
        $this->brandPurchased = $brandPurchased;

        return $this;
    }

    /**
     * Get brandPurchased
     *
     * @return boolean
     */
    public function getBrandPurchased()
    {
        return $this->brandPurchased;
    }

    /**
     * Set easeOfInstallation
     *
     * @param  string              $easeOfInstallation
     * @return ProductRegistration
     */
    public function setEaseOfInstallation($easeOfInstallation)
    {
        $this->easeOfInstallation = $easeOfInstallation;

        return $this;
    }

    /**
     * Get easeOfInstallation
     *
     * @return string
     */
    public function getEaseOfInstallation()
    {
        return $this->easeOfInstallation;
    }

    /**
     * Set quality
     *
     * @param  string              $quality
     * @return ProductRegistration
     */
    public function setQuality($quality)
    {
        $this->quality = $quality;

        return $this;
    }

    /**
     * Get quality
     *
     * @return string
     */
    public function getQuality()
    {
        return $this->quality;
    }

    /**
     * Set valueOfMoney
     *
     * @param  string              $valueOfMoney
     * @return ProductRegistration
     */
    public function setValueOfMoney($valueOfMoney)
    {
        $this->valueOfMoney = $valueOfMoney;

        return $this;
    }

    /**
     * Get valueOfMoney
     *
     * @return string
     */
    public function getValueOfMoney()
    {
        return $this->valueOfMoney;
    }

    /**
     * Set overall
     *
     * @param  string              $overall
     * @return ProductRegistration
     */
    public function setOverall($overall)
    {
        $this->overall = $overall;

        return $this;
    }

    /**
     * Get overall
     *
     * @return string
     */
    public function getOverall()
    {
        return $this->overall;
    }

    /**
     * Set infReputation
     *
     * @param  boolean             $infReputation
     * @return ProductRegistration
     */
    public function setInfReputation($infReputation)
    {
        $this->infReputation = $infReputation;

        return $this;
    }

    /**
     * Get infReputation
     *
     * @return boolean
     */
    public function getInfReputation()
    {
        return $this->infReputation;
    }

    /**
     * Set infEase
     *
     * @param  boolean             $infEase
     * @return ProductRegistration
     */
    public function setInfEase($infEase)
    {
        $this->infEase = $infEase;

        return $this;
    }

    /**
     * Get infEase
     *
     * @return boolean
     */
    public function getInfEase()
    {
        return $this->infEase;
    }

    /**
     * Set infDealer
     *
     * @param  boolean             $infDealer
     * @return ProductRegistration
     */
    public function setInfDealer($infDealer)
    {
        $this->infDealer = $infDealer;

        return $this;
    }

    /**
     * Get infDealer
     *
     * @return boolean
     */
    public function getInfDealer()
    {
        return $this->infDealer;
    }

    /**
     * Set infRecommendation
     *
     * @param  boolean             $infRecommendation
     * @return ProductRegistration
     */
    public function setInfRecommendation($infRecommendation)
    {
        $this->infRecommendation = $infRecommendation;

        return $this;
    }

    /**
     * Get infRecommendation
     *
     * @return boolean
     */
    public function getInfRecommendation()
    {
        return $this->infRecommendation;
    }

    /**
     * Set infFunctionality
     *
     * @param  boolean             $infFunctionality
     * @return ProductRegistration
     */
    public function setInfFunctionality($infFunctionality)
    {
        $this->infFunctionality = $infFunctionality;

        return $this;
    }

    /**
     * Get infFunctionality
     *
     * @return boolean
     */
    public function getInfFunctionality()
    {
        return $this->infFunctionality;
    }

    /**
     * Set infAvailability
     *
     * @param  boolean             $infAvailability
     * @return ProductRegistration
     */
    public function setInfAvailability($infAvailability)
    {
        $this->infAvailability = $infAvailability;

        return $this;
    }

    /**
     * Get infAvailability
     *
     * @return boolean
     */
    public function getInfAvailability()
    {
        return $this->infAvailability;
    }

    /**
     * Set infPrice
     *
     * @param  boolean             $infPrice
     * @return ProductRegistration
     */
    public function setInfPrice($infPrice)
    {
        $this->infPrice = $infPrice;

        return $this;
    }

    /**
     * Get infPrice
     *
     * @return boolean
     */
    public function getInfPrice()
    {
        return $this->infPrice;
    }

    /**
     * Set infStyle
     *
     * @param  boolean             $infStyle
     * @return ProductRegistration
     */
    public function setInfStyle($infStyle)
    {
        $this->infStyle = $infStyle;

        return $this;
    }

    /**
     * Get infStyle
     *
     * @return boolean
     */
    public function getInfStyle()
    {
        return $this->infStyle;
    }

    /**
     * Set infQuality
     *
     * @param  boolean             $infQuality
     * @return ProductRegistration
     */
    public function setInfQuality($infQuality)
    {
        $this->infQuality = $infQuality;

        return $this;
    }

    /**
     * Get infQuality
     *
     * @return boolean
     */
    public function getInfQuality()
    {
        return $this->infQuality;
    }

    /**
     * Set infWarranty
     *
     * @param  boolean             $infWarranty
     * @return ProductRegistration
     */
    public function setInfWarranty($infWarranty)
    {
        $this->infWarranty = $infWarranty;

        return $this;
    }

    /**
     * Get infWarranty
     *
     * @return boolean
     */
    public function getInfWarranty()
    {
        return $this->infWarranty;
    }

    /**
     * Set infOther
     *
     * @param  boolean             $infOther
     * @return ProductRegistration
     */
    public function setInfOther($infOther)
    {
        $this->infOther = $infOther;

        return $this;
    }

    /**
     * Get infOther
     *
     * @return boolean
     */
    public function getInfOther()
    {
        return $this->infOther;
    }

    /**
     * Set personOneGender
     *
     * @param  string              $personOneGender
     * @return ProductRegistration
     */
    public function setPersonOneGender($personOneGender)
    {
        $this->personOneGender = $personOneGender;

        return $this;
    }

    /**
     * Get personOneGender
     *
     * @return string
     */
    public function getPersonOneGender()
    {
        return $this->personOneGender;
    }

    /**
     * Set personOneAge
     *
     * @param  string              $personOneAge
     * @return ProductRegistration
     */
    public function setPersonOneAge($personOneAge)
    {
        $this->personOneAge = $personOneAge;

        return $this;
    }

    /**
     * Get personOneAge
     *
     * @return string
     */
    public function getPersonOneAge()
    {
        return $this->personOneAge;
    }

    /**
     * Set personTwoGender
     *
     * @param  string              $personTwoGender
     * @return ProductRegistration
     */
    public function setPersonTwoGender($personTwoGender)
    {
        $this->personTwoGender = $personTwoGender;

        return $this;
    }

    /**
     * Get personTwoGender
     *
     * @return string
     */
    public function getPersonTwoGender()
    {
        return $this->personTwoGender;
    }

    /**
     * Set personTwoAge
     *
     * @param  string              $personTwoAge
     * @return ProductRegistration
     */
    public function setPersonTwoAge($personTwoAge)
    {
        $this->personTwoAge = $personTwoAge;

        return $this;
    }

    /**
     * Get personTwoAge
     *
     * @return string
     */
    public function getPersonTwoAge()
    {
        return $this->personTwoAge;
    }

    /**
     * Set personThreeGender
     *
     * @param  string              $personThreeGender
     * @return ProductRegistration
     */
    public function setPersonThreeGender($personThreeGender)
    {
        $this->personThreeGender = $personThreeGender;

        return $this;
    }

    /**
     * Get personThreeGender
     *
     * @return string
     */
    public function getPersonThreeGender()
    {
        return $this->personThreeGender;
    }

    /**
     * Set personThreeAge
     *
     * @param  string              $personThreeAge
     * @return ProductRegistration
     */
    public function setPersonThreeAge($personThreeAge)
    {
        $this->personThreeAge = $personThreeAge;

        return $this;
    }

    /**
     * Get personThreeAge
     *
     * @return string
     */
    public function getPersonThreeAge()
    {
        return $this->personThreeAge;
    }

    /**
     * Set personFourGender
     *
     * @param  string              $personFourGender
     * @return ProductRegistration
     */
    public function setPersonFourGender($personFourGender)
    {
        $this->personFourGender = $personFourGender;

        return $this;
    }

    /**
     * Get personFourGender
     *
     * @return string
     */
    public function getPersonFourGender()
    {
        return $this->personFourGender;
    }

    /**
     * Set personFourAge
     *
     * @param  string              $personFourAge
     * @return ProductRegistration
     */
    public function setPersonFourAge($personFourAge)
    {
        $this->personFourAge = $personFourAge;

        return $this;
    }

    /**
     * Get personFourAge
     *
     * @return string
     */
    public function getPersonFourAge()
    {
        return $this->personFourAge;
    }

    /**
     * Set noneHousehold
     *
     * @param  boolean             $noneHousehold
     * @return ProductRegistration
     */
    public function setNoneHousehold($noneHousehold)
    {
        $this->noneHousehold = $noneHousehold;

        return $this;
    }

    /**
     * Get noneHousehold
     *
     * @return boolean
     */
    public function getNoneHousehold()
    {
        return $this->noneHousehold;
    }

    /**
     * Set childUnderOne
     *
     * @param  boolean             $childUnderOne
     * @return ProductRegistration
     */
    public function setChildUnderOne($childUnderOne)
    {
        $this->childUnderOne = $childUnderOne;

        return $this;
    }

    /**
     * Get childUnderOne
     *
     * @return boolean
     */
    public function getChildUnderOne()
    {
        return $this->childUnderOne;
    }

    /**
     * Set youOccupation
     *
     * @param  string              $youOccupation
     * @return ProductRegistration
     */
    public function setYouOccupation($youOccupation)
    {
        $this->youOccupation = $youOccupation;

        return $this;
    }

    /**
     * Get youOccupation
     *
     * @return string
     */
    public function getYouOccupation()
    {
        return $this->youOccupation;
    }

    /**
     * Set spouseOccupation
     *
     * @param  string              $spouseOccupation
     * @return ProductRegistration
     */
    public function setSpouseOccupation($spouseOccupation)
    {
        $this->spouseOccupation = $spouseOccupation;

        return $this;
    }

    /**
     * Get spouseOccupation
     *
     * @return string
     */
    public function getSpouseOccupation()
    {
        return $this->spouseOccupation;
    }

    /**
     * Set youHomemaker
     *
     * @param  boolean             $youHomemaker
     * @return ProductRegistration
     */
    public function setYouHomemaker($youHomemaker)
    {
        $this->youHomemaker = $youHomemaker;

        return $this;
    }

    /**
     * Get youHomemaker
     *
     * @return boolean
     */
    public function getYouHomemaker()
    {
        return $this->youHomemaker;
    }

    /**
     * Set spouseHomemaker
     *
     * @param  boolean             $spouseHomemaker
     * @return ProductRegistration
     */
    public function setSpouseHomemaker($spouseHomemaker)
    {
        $this->spouseHomemaker = $spouseHomemaker;

        return $this;
    }

    /**
     * Get spouseHomemaker
     *
     * @return boolean
     */
    public function getSpouseHomemaker()
    {
        return $this->spouseHomemaker;
    }

    /**
     * Set youRetired
     *
     * @param  boolean             $youRetired
     * @return ProductRegistration
     */
    public function setYouRetired($youRetired)
    {
        $this->youRetired = $youRetired;

        return $this;
    }

    /**
     * Get youRetired
     *
     * @return boolean
     */
    public function getYouRetired()
    {
        return $this->youRetired;
    }

    /**
     * Set spouseRetired
     *
     * @param  boolean             $spouseRetired
     * @return ProductRegistration
     */
    public function setSpouseRetired($spouseRetired)
    {
        $this->spouseRetired = $spouseRetired;

        return $this;
    }

    /**
     * Get spouseRetired
     *
     * @return boolean
     */
    public function getSpouseRetired()
    {
        return $this->spouseRetired;
    }

    /**
     * Set youStudent
     *
     * @param  boolean             $youStudent
     * @return ProductRegistration
     */
    public function setYouStudent($youStudent)
    {
        $this->youStudent = $youStudent;

        return $this;
    }

    /**
     * Get youStudent
     *
     * @return boolean
     */
    public function getYouStudent()
    {
        return $this->youStudent;
    }

    /**
     * Set spouseStudent
     *
     * @param  boolean             $spouseStudent
     * @return ProductRegistration
     */
    public function setSpouseStudent($spouseStudent)
    {
        $this->spouseStudent = $spouseStudent;

        return $this;
    }

    /**
     * Get spouseStudent
     *
     * @return boolean
     */
    public function getSpouseStudent()
    {
        return $this->spouseStudent;
    }

    /**
     * Set youOwner
     *
     * @param  boolean             $youOwner
     * @return ProductRegistration
     */
    public function setYouOwner($youOwner)
    {
        $this->youOwner = $youOwner;

        return $this;
    }

    /**
     * Get youOwner
     *
     * @return boolean
     */
    public function getYouOwner()
    {
        return $this->youOwner;
    }

    /**
     * Set spouseOwner
     *
     * @param  boolean             $spouseOwner
     * @return ProductRegistration
     */
    public function setSpouseOwner($spouseOwner)
    {
        $this->spouseOwner = $spouseOwner;

        return $this;
    }

    /**
     * Get spouseOwner
     *
     * @return boolean
     */
    public function getSpouseOwner()
    {
        return $this->spouseOwner;
    }

    /**
     * Set youHome
     *
     * @param  boolean             $youHome
     * @return ProductRegistration
     */
    public function setYouHome($youHome)
    {
        $this->youHome = $youHome;

        return $this;
    }

    /**
     * Get youHome
     *
     * @return boolean
     */
    public function getYouHome()
    {
        return $this->youHome;
    }

    /**
     * Set spouseHome
     *
     * @param  boolean             $spouseHome
     * @return ProductRegistration
     */
    public function setSpouseHome($spouseHome)
    {
        $this->spouseHome = $spouseHome;

        return $this;
    }

    /**
     * Get spouseHome
     *
     * @return boolean
     */
    public function getSpouseHome()
    {
        return $this->spouseHome;
    }

    /**
     * Set youMilitary
     *
     * @param  boolean             $youMilitary
     * @return ProductRegistration
     */
    public function setYouMilitary($youMilitary)
    {
        $this->youMilitary = $youMilitary;

        return $this;
    }

    /**
     * Get youMilitary
     *
     * @return boolean
     */
    public function getYouMilitary()
    {
        return $this->youMilitary;
    }

    /**
     * Set spouseMilitary
     *
     * @param  boolean             $spouseMilitary
     * @return ProductRegistration
     */
    public function setSpouseMilitary($spouseMilitary)
    {
        $this->spouseMilitary = $spouseMilitary;

        return $this;
    }

    /**
     * Get spouseMilitary
     *
     * @return boolean
     */
    public function getSpouseMilitary()
    {
        return $this->spouseMilitary;
    }

    /**
     * Set youVeteran
     *
     * @param  boolean             $youVeteran
     * @return ProductRegistration
     */
    public function setYouVeteran($youVeteran)
    {
        $this->youVeteran = $youVeteran;

        return $this;
    }

    /**
     * Get youVeteran
     *
     * @return boolean
     */
    public function getYouVeteran()
    {
        return $this->youVeteran;
    }

    /**
     * Set spouseVeteran
     *
     * @param  boolean             $spouseVeteran
     * @return ProductRegistration
     */
    public function setSpouseVeteran($spouseVeteran)
    {
        $this->spouseVeteran = $spouseVeteran;

        return $this;
    }

    /**
     * Get spouseVeteran
     *
     * @return boolean
     */
    public function getSpouseVeteran()
    {
        return $this->spouseVeteran;
    }

    /**
     * Set income
     *
     * @param  string              $income
     * @return ProductRegistration
     */
    public function setIncome($income)
    {
        $this->income = $income;

        return $this;
    }

    /**
     * Get income
     *
     * @return string
     */
    public function getIncome()
    {
        return $this->income;
    }

    /**
     * Set education
     *
     * @param  string              $education
     * @return ProductRegistration
     */
    public function setEducation($education)
    {
        $this->education = $education;

        return $this;
    }

    /**
     * Get education
     *
     * @return string
     */
    public function getEducation()
    {
        return $this->education;
    }

    /**
     * Set creditCards
     *
     * @param  string              $creditCards
     * @return ProductRegistration
     */
    public function setCreditCards($creditCards)
    {
        $this->creditCards = $creditCards;

        return $this;
    }

    /**
     * Get creditCards
     *
     * @return string
     */
    public function getCreditCards()
    {
        return $this->creditCards;
    }

    /**
     * Set residence
     *
     * @param  string              $residence
     * @return ProductRegistration
     */
    public function setResidence($residence)
    {
        $this->residence = $residence;

        return $this;
    }

    /**
     * Get residence
     *
     * @return string
     */
    public function getResidence()
    {
        return $this->residence;
    }

    /**
     * Set magazineSubscribed
     *
     * @param  string              $magazineSubscribed
     * @return ProductRegistration
     */
    public function setMagazineSubscribed($magazineSubscribed)
    {
        $this->magazineSubscribed = $magazineSubscribed;

        return $this;
    }

    /**
     * Get magazineSubscribed
     *
     * @return string
     */
    public function getMagazineSubscribed()
    {
        return $this->magazineSubscribed;
    }

    /**
     * Set magazinePurchased
     *
     * @param  string              $magazinePurchased
     * @return ProductRegistration
     */
    public function setMagazinePurchased($magazinePurchased)
    {
        $this->magazinePurchased = $magazinePurchased;

        return $this;
    }

    /**
     * Get magazinePurchased
     *
     * @return string
     */
    public function getMagazinePurchased()
    {
        return $this->magazinePurchased;
    }

    /**
     * Set newWithin
     *
     * @param  string              $newWithin
     * @return ProductRegistration
     */
    public function setNewWithin($newWithin)
    {
        $this->newWithin = $newWithin;

        return $this;
    }

    /**
     * Get newWithin
     *
     * @return string
     */
    public function getNewWithin()
    {
        return $this->newWithin;
    }

    /**
     * Set usedWithin
     *
     * @param  string              $usedWithin
     * @return ProductRegistration
     */
    public function setUsedWithin($usedWithin)
    {
        $this->usedWithin = $usedWithin;

        return $this;
    }

    /**
     * Get usedWithin
     *
     * @return string
     */
    public function getUsedWithin()
    {
        return $this->usedWithin;
    }

    /**
     * Set purchaseType
     *
     * @param  string              $purchaseType
     * @return ProductRegistration
     */
    public function setPurchaseType($purchaseType)
    {
        $this->purchaseType = $purchaseType;

        return $this;
    }

    /**
     * Get purchaseType
     *
     * @return string
     */
    public function getPurchaseType()
    {
        return $this->purchaseType;
    }

    /**
     * Set optout
     *
     * @param  boolean             $optout
     * @return ProductRegistration
     */
    public function setOptout($optout)
    {
        $this->optout = $optout;

        return $this;
    }

    /**
     * Get optout
     *
     * @return boolean
     */
    public function getOptout()
    {
        return $this->optout;
    }

    /**
     * Get productRegistrationId
     *
     * @return integer
     */
    public function getProductRegistrationId()
    {
        return $this->productRegistrationId;
    }

    /**
     * Set site
     *
     * @param  \RocketCms\Entity\Site $site
     * @return ProductRegistration
     */
    public function setSite(\RocketCms\Entity\Site $site = null)
    {
        $this->site = $site;

        return $this;
    }

    /**
     * Get site
     *
     * @return \RocketCms\Entity\Site
     */
    public function getSite()
    {
        return $this->site;
    }

    /**
     * Set region
     *
     * @param  \RocketBase\Entity\State $region
     * @return ProductRegistration
     */
    public function setRegion(\RocketBase\Entity\State $region = null)
    {
        $this->region = $region;

        return $this;
    }

    /**
     * Get region
     *
     * @return \RocketBase\Entity\State
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * Set country
     *
     * @param  \RocketBase\Entity\Country $country
     * @return ProductRegistration
     */
    public function setCountry(\RocketBase\Entity\Country $country = null)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return \RocketBase\Entity\Country
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set productCategory
     *
     * @param  \LundProducts\Entity\ProductCategories $productCategory
     * @return ProductRegistration
     */
    public function setProductCategory(\LundProducts\Entity\ProductCategories $productCategory = null)
    {
        $this->productCategory = $productCategory;

        return $this;
    }

    /**
     * Get productCategory
     *
     * @return \LundProducts\Entity\ProductCategories
     */
    public function getProductCategory()
    {
        return $this->productCategory;
    }

    /**
     * Set vehYear
     *
     * @param  \LundProducts\Entity\VehYear $vehYear
     * @return ProductRegistration
     */
    public function setVehYear(\LundProducts\Entity\VehYear $vehYear = null)
    {
        $this->vehYear = $vehYear;

        return $this;
    }

    /**
     * Get vehYear
     *
     * @return \LundProducts\Entity\VehYear
     */
    public function getVehYear()
    {
        return $this->vehYear;
    }

    /**
     * Set vehMake
     *
     * @param  \LundProducts\Entity\VehMake $vehMake
     * @return ProductRegistration
     */
    public function setVehMake(\LundProducts\Entity\VehMake $vehMake = null)
    {
        $this->vehMake = $vehMake;

        return $this;
    }

    /**
     * Get vehMake
     *
     * @return \LundProducts\Entity\VehMake
     */
    public function getVehMake()
    {
        return $this->vehMake;
    }

    /**
     * Set vehModel
     *
     * @param  \LundProducts\Entity\VehModel $vehModel
     * @return ProductRegistration
     */
    public function setVehModel(\LundProducts\Entity\VehModel $vehModel = null)
    {
        $this->vehModel = $vehModel;

        return $this;
    }

    /**
     * Get vehModel
     *
     * @return \LundProducts\Entity\VehModel
     */
    public function getVehModel()
    {
        return $this->vehModel;
    }

    /**
     * Set vehSubmodel
     *
     * @param  \LundProducts\Entity\VehSubmodel $vehSubmodel
     * @return ProductRegistration
     */
    public function setVehSubmodel(\LundProducts\Entity\VehSubmodel $vehSubmodel = null)
    {
        $this->vehSubmodel = $vehSubmodel;

        return $this;
    }

    /**
     * Get vehSubmodel
     *
     * @return \LundProducts\Entity\VehSubmodel
     */
    public function getVehSubmodel()
    {
        return $this->vehSubmodel;
    }

    /**
     * Set recVehYear
     *
     * @param  \LundProducts\Entity\VehYear $recVehYear
     * @return ProductRegistration
     */
    public function setRecVehYear(\LundProducts\Entity\VehYear $recVehYear = null)
    {
        $this->recVehYear = $recVehYear;

        return $this;
    }

    /**
     * Get recVehYear
     *
     * @return \LundProducts\Entity\VehYear
     */
    public function getRecVehYear()
    {
        return $this->recVehYear;
    }

    /**
     * Set recVehMake
     *
     * @param  \LundProducts\Entity\VehMake $recVehMake
     * @return ProductRegistration
     */
    public function setRecVehMake(\LundProducts\Entity\VehMake $recVehMake = null)
    {
        $this->recVehMake = $recVehMake;

        return $this;
    }

    /**
     * Get recVehMake
     *
     * @return \LundProducts\Entity\VehMake
     */
    public function getRecVehMake()
    {
        return $this->recVehMake;
    }

    /**
     * Set recVehModel
     *
     * @param  \LundProducts\Entity\VehModel $recVehModel
     * @return ProductRegistration
     */
    public function setRecVehModel(\LundProducts\Entity\VehModel $recVehModel = null)
    {
        $this->recVehModel = $recVehModel;

        return $this;
    }

    /**
     * Get recVehModel
     *
     * @return \LundProducts\Entity\VehModel
     */
    public function getRecVehModel()
    {
        return $this->recVehModel;
    }

    /**
     * Set recVehSubmodel
     *
     * @param  \LundProducts\Entity\VehSubmodel $recVehSubmodel
     * @return ProductRegistration
     */
    public function setRecVehSubmodel(\LundProducts\Entity\VehSubmodel $recVehSubmodel = null)
    {
        $this->recVehSubmodel = $recVehSubmodel;

        return $this;
    }

    /**
     * Get recVehSubmodel
     *
     * @return \LundProducts\Entity\VehSubmodel
     */
    public function getRecVehSubmodel()
    {
        return $this->recVehSubmodel;
    }

    /**
     * Add aboutHousehold
     *
     * @param  \LundSite\Entity\AboutHousehold $aboutHousehold
     * @return ProductRegistration
     */
    //public function addAboutHousehold(\LundSite\Entity\AboutHousehold $aboutHousehold)
    public function addAboutHousehold(\Doctrine\Common\Collections\ArrayCollection $aboutHousehold)
    {
        //var_dump($aboutHousehold);exit();
        foreach ($aboutHousehold as $record) {
            $this->aboutHousehold->add($record);
        }
        //$this->aboutHousehold[] = $aboutHousehold;

        return $this;
    }

    /**
     * Remove aboutHousehold
     *
     * @param \LundSite\Entity\AboutHousehold $aboutHousehold
     */
    //public function removeAboutHousehold(\LundSite\Entity\AboutHousehold $aboutHousehold)
    public function removeAboutHousehold(\Doctrine\Common\Collections\ArrayCollection $aboutHousehold)
    {
        $this->aboutHousehold->removeElement($aboutHousehold);
    }

    /**
     * Get aboutHousehold
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAboutHousehold()
    {
        return $this->aboutHousehold;
    }

    /**
     * Add lifestyleHousehold
     *
     * @param  \LundSite\Entity\LifestyleHousehold $lifestyleHousehold
     * @return ProductRegistration
     */
    //public function addLifestyleHousehold(\LundSite\Entity\LifestyleHousehold $lifestyleHousehold)
    public function addLifestyleHousehold(\Doctrine\Common\Collections\ArrayCollection $lifestyleHousehold)
    {
        foreach ($lifestyleHousehold as $record) {
            $this->lifestyleHousehold->add($record);
        }
        //$this->lifestyleHousehold[] = $lifestyleHousehold;

        return $this;
    }

    /**
     * Remove lifestyleHousehold
     *
     * @param \LundSite\Entity\LifestyleHousehold $lifestyleHousehold
     */
    //public function removeLifestyleHousehold(\LundSite\Entity\LifestyleHousehold $lifestyleHousehold)
    public function removeLifestyleHousehold(\Doctrine\Common\Collections\ArrayCollection $lifestyleHousehold)
    {
        $this->lifestyleHousehold->removeElement($lifestyleHousehold);
    }

    /**
     * Get lifestyleHousehold
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getLifestyleHousehold()
    {
        return $this->lifestyleHousehold;
    }
}
