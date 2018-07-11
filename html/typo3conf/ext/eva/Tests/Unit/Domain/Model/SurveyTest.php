<?php
namespace Tight\Eva\Tests\Unit\Domain\Model;

/**
 * Test case.
 */
class SurveyTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \Tight\Eva\Domain\Model\Survey
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \Tight\Eva\Domain\Model\Survey();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getTitleReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getTitle()
        );
    }

    /**
     * @test
     */
    public function setTitleForStringSetsTitle()
    {
        $this->subject->setTitle('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'title',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getQuestionsReturnsInitialValueForQuestion()
    {
        $newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        self::assertEquals(
            $newObjectStorage,
            $this->subject->getQuestions()
        );
    }

    /**
     * @test
     */
    public function setQuestionsForObjectStorageContainingQuestionSetsQuestions()
    {
        $question = new \Tight\Eva\Domain\Model\Question();
        $objectStorageHoldingExactlyOneQuestions = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $objectStorageHoldingExactlyOneQuestions->attach($question);
        $this->subject->setQuestions($objectStorageHoldingExactlyOneQuestions);

        self::assertAttributeEquals(
            $objectStorageHoldingExactlyOneQuestions,
            'questions',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function addQuestionToObjectStorageHoldingQuestions()
    {
        $question = new \Tight\Eva\Domain\Model\Question();
        $questionsObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['attach'])
            ->disableOriginalConstructor()
            ->getMock();

        $questionsObjectStorageMock->expects(self::once())->method('attach')->with(self::equalTo($question));
        $this->inject($this->subject, 'questions', $questionsObjectStorageMock);

        $this->subject->addQuestion($question);
    }

    /**
     * @test
     */
    public function removeQuestionFromObjectStorageHoldingQuestions()
    {
        $question = new \Tight\Eva\Domain\Model\Question();
        $questionsObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['detach'])
            ->disableOriginalConstructor()
            ->getMock();

        $questionsObjectStorageMock->expects(self::once())->method('detach')->with(self::equalTo($question));
        $this->inject($this->subject, 'questions', $questionsObjectStorageMock);

        $this->subject->removeQuestion($question);
    }
}
