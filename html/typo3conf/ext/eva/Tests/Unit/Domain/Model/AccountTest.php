<?php
namespace Tight\Eva\Tests\Unit\Domain\Model;

/**
 * Test case.
 */
class AccountTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \Tight\Eva\Domain\Model\Account
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \Tight\Eva\Domain\Model\Account();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getNameReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getName()
        );
    }

    /**
     * @test
     */
    public function setNameForStringSetsName()
    {
        $this->subject->setName('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'name',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getPasswordReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getPassword()
        );
    }

    /**
     * @test
     */
    public function setPasswordForStringSetsPassword()
    {
        $this->subject->setPassword('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'password',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getTokenReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getToken()
        );
    }

    /**
     * @test
     */
    public function setTokenForStringSetsToken()
    {
        $this->subject->setToken('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'token',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getTypeReturnsInitialValueForInt()
    {
        self::assertSame(
            0,
            $this->subject->getType()
        );
    }

    /**
     * @test
     */
    public function setTypeForIntSetsType()
    {
        $this->subject->setType(12);

        self::assertAttributeEquals(
            12,
            'type',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getClassReturnsInitialValueForSchoolClass()
    {
        $newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        self::assertEquals(
            $newObjectStorage,
            $this->subject->getClass()
        );
    }

    /**
     * @test
     */
    public function setClassForObjectStorageContainingSchoolClassSetsClass()
    {
        $clas = new \Tight\Eva\Domain\Model\SchoolClass();
        $objectStorageHoldingExactlyOneClass = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $objectStorageHoldingExactlyOneClass->attach($clas);
        $this->subject->setClass($objectStorageHoldingExactlyOneClass);

        self::assertAttributeEquals(
            $objectStorageHoldingExactlyOneClass,
            'class',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function addClasToObjectStorageHoldingClass()
    {
        $clas = new \Tight\Eva\Domain\Model\SchoolClass();
        $classObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['attach'])
            ->disableOriginalConstructor()
            ->getMock();

        $classObjectStorageMock->expects(self::once())->method('attach')->with(self::equalTo($clas));
        $this->inject($this->subject, 'class', $classObjectStorageMock);

        $this->subject->addClas($clas);
    }

    /**
     * @test
     */
    public function removeClasFromObjectStorageHoldingClass()
    {
        $clas = new \Tight\Eva\Domain\Model\SchoolClass();
        $classObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['detach'])
            ->disableOriginalConstructor()
            ->getMock();

        $classObjectStorageMock->expects(self::once())->method('detach')->with(self::equalTo($clas));
        $this->inject($this->subject, 'class', $classObjectStorageMock);

        $this->subject->removeClas($clas);
    }
}
