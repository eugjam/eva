<?php
namespace Tight\Eva\Tests\Unit\Domain\Model;

/**
 * Test case.
 */
class AnswereTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \Tight\Eva\Domain\Model\Answere
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \Tight\Eva\Domain\Model\Answere();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getQuestionReturnsInitialValueForQuestion()
    {
        self::assertEquals(
            null,
            $this->subject->getQuestion()
        );
    }

    /**
     * @test
     */
    public function setQuestionForQuestionSetsQuestion()
    {
        $questionFixture = new \Tight\Eva\Domain\Model\Question();
        $this->subject->setQuestion($questionFixture);

        self::assertAttributeEquals(
            $questionFixture,
            'question',
            $this->subject
        );
    }
}
