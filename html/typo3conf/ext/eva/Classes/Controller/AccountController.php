<?php
namespace Tight\Eva\Controller;

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
 * AccountController
 */
class AccountController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    /**
     * accountRepository
     *
     * @var \Tight\Eva\Domain\Repository\AccountRepository
     * @inject
     */
    protected $accountRepository = null;

    /**
     * action new
     *
     * @return void
     */
    public function newAction()
    {

    }

    /**
     * action create
     *
     * @param \Tight\Eva\Domain\Model\Account $newAccount
     * @return void
     */
    public function createAction(\Tight\Eva\Domain\Model\Account $newAccount)
    {
        $this->addFlashMessage('The object was created. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->accountRepository->add($newAccount);
        $this->redirect('list');
    }

    /**
     * action edit
     *
     * @param \Tight\Eva\Domain\Model\Account $account
     * @ignorevalidation $account
     * @return void
     */
    public function editAction(\Tight\Eva\Domain\Model\Account $account)
    {
        $this->view->assign('account', $account);
    }

    /**
     * action update
     *
     * @param \Tight\Eva\Domain\Model\Account $account
     * @return void
     */
    public function updateAction(\Tight\Eva\Domain\Model\Account $account)
    {
        $this->addFlashMessage('The object was updated. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->accountRepository->update($account);
        $this->redirect('list');
    }

    /**
     * action delete
     *
     * @param \Tight\Eva\Domain\Model\Account $account
     * @return void
     */
    public function deleteAction(\Tight\Eva\Domain\Model\Account $account)
    {
        $this->addFlashMessage('The object was deleted. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->accountRepository->remove($account);
        $this->redirect('list');
    }

    /**
     * action login
     *
     * @return void
     */
    public function loginAction()
    {

    }

    /**
     * action logout
     *
     * @return void
     */
    public function logoutAction()
    {

    }
}
