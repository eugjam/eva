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
 * SchoolClassController
 */
class SchoolClassController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    /**
     * schoolClassRepository
     *
     * @var \Tight\Eva\Domain\Repository\SchoolClassRepository
     * @inject
     */
    protected $schoolClassRepository = null;

    /**
     * action list
     *
     * @return void
     */
    public function listAction()
    {
        $schoolClasses = $this->schoolClassRepository->findAll();
        $this->view->assign('schoolClasses', $schoolClasses);
    }

    /**
     * action show
     *
     * @param \Tight\Eva\Domain\Model\SchoolClass $schoolClass
     * @return void
     */
    public function showAction(\Tight\Eva\Domain\Model\SchoolClass $schoolClass)
    {
        $this->view->assign('schoolClass', $schoolClass);
    }

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
     * @param \Tight\Eva\Domain\Model\SchoolClass $newSchoolClass
     * @return void
     */
    public function createAction(\Tight\Eva\Domain\Model\SchoolClass $newSchoolClass)
    {
        $this->addFlashMessage('The object was created. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->schoolClassRepository->add($newSchoolClass);
        $this->redirect('list');
    }

    /**
     * action edit
     *
     * @param \Tight\Eva\Domain\Model\SchoolClass $schoolClass
     * @ignorevalidation $schoolClass
     * @return void
     */
    public function editAction(\Tight\Eva\Domain\Model\SchoolClass $schoolClass)
    {
        $this->view->assign('schoolClass', $schoolClass);
    }

    /**
     * action update
     *
     * @param \Tight\Eva\Domain\Model\SchoolClass $schoolClass
     * @return void
     */
    public function updateAction(\Tight\Eva\Domain\Model\SchoolClass $schoolClass)
    {
        $this->addFlashMessage('The object was updated. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->schoolClassRepository->update($schoolClass);
        $this->redirect('list');
    }

    /**
     * action delete
     *
     * @param \Tight\Eva\Domain\Model\SchoolClass $schoolClass
     * @return void
     */
    public function deleteAction(\Tight\Eva\Domain\Model\SchoolClass $schoolClass)
    {
        $this->addFlashMessage('The object was deleted. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->schoolClassRepository->remove($schoolClass);
        $this->redirect('list');
    }
}
