<?php
namespace Tight\Eva\Domain\Model;

/***
 *
 * This file is part of the "eva" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2018
 *
 ***/

/**
 * Account
 */
class Account extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    /**
     * name
     *
     * @var string
     * @validate NotEmpty
     */
    protected $name = '';

    /**
     * password
     *
     * @var string
     */
    protected $password = '';

    /**
     * token
     *
     * @var string
     */
    protected $token = '';

    /**
     * type
     *
     * @var int
     * @validate NotEmpty
     */
    protected $type = 0;

    /**
     * class
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Tight\Eva\Domain\Model\SchoolClass>
     */
    protected $class = null;

    /**
     * __construct
     */
    public function __construct()
    {
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
    protected function initStorageObjects()
    {
        $this->class = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
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
     * Returns the password
     *
     * @return string $password
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Sets the password
     *
     * @param string $password
     * @return void
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * Returns the token
     *
     * @return string $token
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * Sets the token
     *
     * @param string $token
     * @return void
     */
    public function setToken($token)
    {
        $this->token = $token;
    }

    /**
     * Returns the type
     *
     * @return int $type
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Sets the type
     *
     * @param int $type
     * @return void
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * Adds a SchoolClass
     *
     * @param \Tight\Eva\Domain\Model\SchoolClass $clas
     * @return void
     */
    public function addClas(\Tight\Eva\Domain\Model\SchoolClass $clas)
    {
        $this->class->attach($clas);
    }

    /**
     * Removes a SchoolClass
     *
     * @param \Tight\Eva\Domain\Model\SchoolClass $clasToRemove The SchoolClass to be removed
     * @return void
     */
    public function removeClas(\Tight\Eva\Domain\Model\SchoolClass $clasToRemove)
    {
        $this->class->detach($clasToRemove);
    }

    /**
     * Returns the class
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Tight\Eva\Domain\Model\SchoolClass> $class
     */
    public function getClass()
    {
        return $this->class;
    }

    /**
     * Sets the class
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Tight\Eva\Domain\Model\SchoolClass> $class
     * @return void
     */
    public function setClass(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $class)
    {
        $this->class = $class;
    }
}
