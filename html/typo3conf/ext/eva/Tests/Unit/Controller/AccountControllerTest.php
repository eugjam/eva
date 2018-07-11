<?php
namespace Tight\Eva\Tests\Unit\Controller;

/**
 * Test case.
 */
class AccountControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \Tight\Eva\Controller\AccountController
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder(\Tight\Eva\Controller\AccountController::class)
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
    public function createActionAddsTheGivenAccountToAccountRepository()
    {
        $account = new \Tight\Eva\Domain\Model\Account();

        $accountRepository = $this->getMockBuilder(\Tight\Eva\Domain\Repository\AccountRepository::class)
            ->setMethods(['add'])
            ->disableOriginalConstructor()
            ->getMock();

        $accountRepository->expects(self::once())->method('add')->with($account);
        $this->inject($this->subject, 'accountRepository', $accountRepository);

        $this->subject->createAction($account);
    }

    /**
     * @test
     */
    public function editActionAssignsTheGivenAccountToView()
    {
        $account = new \Tight\Eva\Domain\Model\Account();

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $this->inject($this->subject, 'view', $view);
        $view->expects(self::once())->method('assign')->with('account', $account);

        $this->subject->editAction($account);
    }

    /**
     * @test
     */
    public function updateActionUpdatesTheGivenAccountInAccountRepository()
    {
        $account = new \Tight\Eva\Domain\Model\Account();

        $accountRepository = $this->getMockBuilder(\Tight\Eva\Domain\Repository\AccountRepository::class)
            ->setMethods(['update'])
            ->disableOriginalConstructor()
            ->getMock();

        $accountRepository->expects(self::once())->method('update')->with($account);
        $this->inject($this->subject, 'accountRepository', $accountRepository);

        $this->subject->updateAction($account);
    }

    /**
     * @test
     */
    public function deleteActionRemovesTheGivenAccountFromAccountRepository()
    {
        $account = new \Tight\Eva\Domain\Model\Account();

        $accountRepository = $this->getMockBuilder(\Tight\Eva\Domain\Repository\AccountRepository::class)
            ->setMethods(['remove'])
            ->disableOriginalConstructor()
            ->getMock();

        $accountRepository->expects(self::once())->method('remove')->with($account);
        $this->inject($this->subject, 'accountRepository', $accountRepository);

        $this->subject->deleteAction($account);
    }
}
