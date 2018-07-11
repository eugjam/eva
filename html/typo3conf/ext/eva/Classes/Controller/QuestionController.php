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
 * QuestionController
 */
class QuestionController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    /**
     * questionRepository
     *
     * @var \Tight\Eva\Domain\Repository\QuestionRepository
     * @inject
     */
    protected $questionRepository = null;

    /**
     * action list
     *
     * @return void
     */
    public function listAction()
    {
        $questions = $this->questionRepository->findAll();
        $this->view->assign('questions', $questions);
    }

    /**
     * action show
     *
     * @param \Tight\Eva\Domain\Model\Question $question
     * @return void
     */
    public function showAction(\Tight\Eva\Domain\Model\Question $question)
    {
        $this->view->assign('question', $question);
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
     * @param \Tight\Eva\Domain\Model\Question $newQuestion
     * @return void
     */
    public function createAction(\Tight\Eva\Domain\Model\Question $newQuestion)
    {
        $this->addFlashMessage('The object was created. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->questionRepository->add($newQuestion);
        $this->redirect('list');
    }

    /**
     * action edit
     *
     * @param \Tight\Eva\Domain\Model\Question $question
     * @ignorevalidation $question
     * @return void
     */
    public function editAction(\Tight\Eva\Domain\Model\Question $question)
    {
        $this->view->assign('question', $question);
    }

    /**
     * action update
     *
     * @param \Tight\Eva\Domain\Model\Question $question
     * @return void
     */
    public function updateAction(\Tight\Eva\Domain\Model\Question $question)
    {
        $this->addFlashMessage('The object was updated. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->questionRepository->update($question);
        $this->redirect('list');
    }

    /**
     * action delete
     *
     * @param \Tight\Eva\Domain\Model\Question $question
     * @return void
     */
    public function deleteAction(\Tight\Eva\Domain\Model\Question $question)
    {
        $this->addFlashMessage('The object was deleted. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->questionRepository->remove($question);
        $this->redirect('list');
    }
}
