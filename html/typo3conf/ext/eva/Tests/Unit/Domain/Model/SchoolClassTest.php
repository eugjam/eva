<?php
namespace Tight\Eva\Tests\Unit\Domain\Model;

/**
 * Test case.
 */
class SchoolClassTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \Tight\Eva\Domain\Model\SchoolClass
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \Tight\Eva\Domain\Model\SchoolClass();
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
}
