<?php
namespace Tight\Eva\Tests\Unit\Controller;

/**
 * Test case.
 */
class SurveyControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \Tight\Eva\Controller\SurveyController
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder(\Tight\Eva\Controller\SurveyController::class)
            ->setMethods(['redirect', 'forward', 'addFlashMessage'])
            ->disableOriginalConstructor()
            ->getMock();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function listActionFetchesAllSurveysFromRepositoryAndAssignsThemToView()
    {

        $allSurveys = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $surveyRepository = $this->getMockBuilder(\Tight\Eva\Domain\Repository\SurveyRepository::class)
            ->setMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $surveyRepository->expects(self::once())->method('findAll')->will(self::returnValue($allSurveys));
        $this->inject($this->subject, 'surveyRepository', $surveyRepository);

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('surveys', $allSurveys);
        $this->inject($this->subject, 'view', $view);

        $this->subject->listAction();
    }

    /**
     * @test
     */
    public function showActionAssignsTheGivenSurveyToView()
    {
        $survey = new \Tight\Eva\Domain\Model\Survey();

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $this->inject($this->subject, 'view', $view);
        $view->expects(self::once())->method('assign')->with('survey', $survey);

        $this->subject->showAction($survey);
    }

    /**
     * @test
     */
    public function createActionAddsTheGivenSurveyToSurveyRepository()
    {
        $survey = new \Tight\Eva\Domain\Model\Survey();

        $surveyRepository = $this->getMockBuilder(\Tight\Eva\Domain\Repository\SurveyRepository::class)
            ->setMethods(['add'])
            ->disableOriginalConstructor()
            ->getMock();

        $surveyRepository->expects(self::once())->method('add')->with($survey);
        $this->inject($this->subject, 'surveyRepository', $surveyRepository);

        $this->subject->createAction($survey);
    }

    /**
     * @test
     */
    public function editActionAssignsTheGivenSurveyToView()
    {
        $survey = new \Tight\Eva\Domain\Model\Survey();

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $this->inject($this->subject, 'view', $view);
        $view->expects(self::once())->method('assign')->with('survey', $survey);

        $this->subject->editAction($survey);
    }

    /**
     * @test
     */
    public function updateActionUpdatesTheGivenSurveyInSurveyRepository()
    {
        $survey = new \Tight\Eva\Domain\Model\Survey();

        $surveyRepository = $this->getMockBuilder(\Tight\Eva\Domain\Repository\SurveyRepository::class)
            ->setMethods(['update'])
            ->disableOriginalConstructor()
            ->getMock();

        $surveyRepository->expects(self::once())->method('update')->with($survey);
        $this->inject($this->subject, 'surveyRepository', $surveyRepository);

        $this->subject->updateAction($survey);
    }

    /**
     * @test
     */
    public function deleteActionRemovesTheGivenSurveyFromSurveyRepository()
    {
        $survey = new \Tight\Eva\Domain\Model\Survey();

        $surveyRepository = $this->getMockBuilder(\Tight\Eva\Domain\Repository\SurveyRepository::class)
            ->setMethods(['remove'])
            ->disableOriginalConstructor()
            ->getMock();

        $surveyRepository->expects(self::once())->method('remove')->with($survey);
        $this->inject($this->subject, 'surveyRepository', $surveyRepository);

        $this->subject->deleteAction($survey);
    }
}
