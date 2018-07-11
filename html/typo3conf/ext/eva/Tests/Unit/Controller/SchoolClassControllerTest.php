<?php
namespace Tight\Eva\Tests\Unit\Controller;

/**
 * Test case.
 */
class SchoolClassControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \Tight\Eva\Controller\SchoolClassController
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder(\Tight\Eva\Controller\SchoolClassController::class)
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
    public function listActionFetchesAllSchoolClassesFromRepositoryAndAssignsThemToView()
    {

        $allSchoolClasses = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $schoolClassRepository = $this->getMockBuilder(\Tight\Eva\Domain\Repository\SchoolClassRepository::class)
            ->setMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $schoolClassRepository->expects(self::once())->method('findAll')->will(self::returnValue($allSchoolClasses));
        $this->inject($this->subject, 'schoolClassRepository', $schoolClassRepository);

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('schoolClasses', $allSchoolClasses);
        $this->inject($this->subject, 'view', $view);

        $this->subject->listAction();
    }

    /**
     * @test
     */
    public function showActionAssignsTheGivenSchoolClassToView()
    {
        $schoolClass = new \Tight\Eva\Domain\Model\SchoolClass();

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $this->inject($this->subject, 'view', $view);
        $view->expects(self::once())->method('assign')->with('schoolClass', $schoolClass);

        $this->subject->showAction($schoolClass);
    }

    /**
     * @test
     */
    public function createActionAddsTheGivenSchoolClassToSchoolClassRepository()
    {
        $schoolClass = new \Tight\Eva\Domain\Model\SchoolClass();

        $schoolClassRepository = $this->getMockBuilder(\Tight\Eva\Domain\Repository\SchoolClassRepository::class)
            ->setMethods(['add'])
            ->disableOriginalConstructor()
            ->getMock();

        $schoolClassRepository->expects(self::once())->method('add')->with($schoolClass);
        $this->inject($this->subject, 'schoolClassRepository', $schoolClassRepository);

        $this->subject->createAction($schoolClass);
    }

    /**
     * @test
     */
    public function editActionAssignsTheGivenSchoolClassToView()
    {
        $schoolClass = new \Tight\Eva\Domain\Model\SchoolClass();

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $this->inject($this->subject, 'view', $view);
        $view->expects(self::once())->method('assign')->with('schoolClass', $schoolClass);

        $this->subject->editAction($schoolClass);
    }

    /**
     * @test
     */
    public function updateActionUpdatesTheGivenSchoolClassInSchoolClassRepository()
    {
        $schoolClass = new \Tight\Eva\Domain\Model\SchoolClass();

        $schoolClassRepository = $this->getMockBuilder(\Tight\Eva\Domain\Repository\SchoolClassRepository::class)
            ->setMethods(['update'])
            ->disableOriginalConstructor()
            ->getMock();

        $schoolClassRepository->expects(self::once())->method('update')->with($schoolClass);
        $this->inject($this->subject, 'schoolClassRepository', $schoolClassRepository);

        $this->subject->updateAction($schoolClass);
    }

    /**
     * @test
     */
    public function deleteActionRemovesTheGivenSchoolClassFromSchoolClassRepository()
    {
        $schoolClass = new \Tight\Eva\Domain\Model\SchoolClass();

        $schoolClassRepository = $this->getMockBuilder(\Tight\Eva\Domain\Repository\SchoolClassRepository::class)
            ->setMethods(['remove'])
            ->disableOriginalConstructor()
            ->getMock();

        $schoolClassRepository->expects(self::once())->method('remove')->with($schoolClass);
        $this->inject($this->subject, 'schoolClassRepository', $schoolClassRepository);

        $this->subject->deleteAction($schoolClass);
    }
}
