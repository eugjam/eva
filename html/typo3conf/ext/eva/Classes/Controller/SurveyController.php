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
 * SurveyController
 */
class SurveyController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    /**
     * surveyRepository
     *
     * @var \Tight\Eva\Domain\Repository\SurveyRepository
     * @inject
     */
    protected $surveyRepository = null;

    /**
     * action list
     *
     * @return void
     */
    public function listAction()
    {
        $surveys = $this->surveyRepository->findAll();
        $this->view->assign('surveys', $surveys);
    }

    /**
     * action show
     *
     * @param \Tight\Eva\Domain\Model\Survey $survey
     * @return void
     */
    public function showAction(\Tight\Eva\Domain\Model\Survey $survey)
    {
        $this->view->assign('survey', $survey);
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
     * @param \Tight\Eva\Domain\Model\Survey $newSurvey
     * @return void
     */
    public function createAction(\Tight\Eva\Domain\Model\Survey $newSurvey)
    {
        $this->addFlashMessage('The object was created. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->surveyRepository->add($newSurvey);
        $this->redirect('list');
    }

    /**
     * action edit
     *
     * @param \Tight\Eva\Domain\Model\Survey $survey
     * @ignorevalidation $survey
     * @return void
     */
    public function editAction(\Tight\Eva\Domain\Model\Survey $survey)
    {
        $this->view->assign('survey', $survey);
    }

    /**
     * action update
     *
     * @param \Tight\Eva\Domain\Model\Survey $survey
     * @return void
     */
    public function updateAction(\Tight\Eva\Domain\Model\Survey $survey)
    {
        $this->addFlashMessage('The object was updated. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->surveyRepository->update($survey);
        $this->redirect('list');
    }

    /**
     * action delete
     *
     * @param \Tight\Eva\Domain\Model\Survey $survey
     * @return void
     */
    public function deleteAction(\Tight\Eva\Domain\Model\Survey $survey)
    {
        $this->addFlashMessage('The object was deleted. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->surveyRepository->remove($survey);
        $this->redirect('list');
    }

    /**
     * action evaluate
     *
     * @return void
     */
    public function evaluateAction()
    {

    }
}
