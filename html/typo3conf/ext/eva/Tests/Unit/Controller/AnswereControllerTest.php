<?php
namespace Tight\Eva\Tests\Unit\Controller;

/**
 * Test case.
 */
class AnswereControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \Tight\Eva\Controller\AnswereController
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder(\Tight\Eva\Controller\AnswereController::class)
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
    public function listActionFetchesAllAnsweresFromRepositoryAndAssignsThemToView()
    {

        $allAnsweres = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $answereRepository = $this->getMockBuilder(\Tight\Eva\Domain\Repository\AnswereRepository::class)
            ->setMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $answereRepository->expects(self::once())->method('findAll')->will(self::returnValue($allAnsweres));
        $this->inject($this->subject, 'answereRepository', $answereRepository);

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('answeres', $allAnsweres);
        $this->inject($this->subject, 'view', $view);

        $this->subject->listAction();
    }
}
