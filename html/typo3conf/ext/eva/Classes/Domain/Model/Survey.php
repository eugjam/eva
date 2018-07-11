<?php
namespace Tight\Eva\Domain\Model;

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
 * Survey
 */
class Survey extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    /**
     * title
     *
     * @var string
     */
    protected $title = '';

    /**
     * questions
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Tight\Eva\Domain\Model\Question>
     * @cascade remove
     */
    protected $questions = null;

    /**
     * __construct
     */
    public function __construct()
    {
        //Do not remove the next line: It would break the functionality
        $this->initStorageObjects();
    }

    /**
     * Initializes all ObjectStorage properties
     * Do not modify this method!
     * It will be rewritten on each save in the extension builder
     * You may modify the constructor of this class instead
     *
     * @return void
     */
    protected function initStorageObjects()
    {
        $this->questions = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }

    /**
     * Returns the title
     *
     * @return string $title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Sets the title
     *
     * @param string $title
     * @return void
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * Adds a Question
     *
     * @param \Tight\Eva\Domain\Model\Question $question
     * @return void
     */
    public function addQuestion(\Tight\Eva\Domain\Model\Question $question)
    {
        $this->questions->attach($question);
    }

    /**
     * Removes a Question
     *
     * @param \Tight\Eva\Domain\Model\Question $questionToRemove The Question to be removed
     * @return void
     */
    public function removeQuestion(\Tight\Eva\Domain\Model\Question $questionToRemove)
    {
        $this->questions->detach($questionToRemove);
    }

    /**
     * Returns the questions
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Tight\Eva\Domain\Model\Question> $questions
     */
    public function getQuestions()
    {
        return $this->questions;
    }

    /**
     * Sets the questions
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Tight\Eva\Domain\Model\Question> $questions
     * @return void
     */
    public function setQuestions(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $questions)
    {
        $this->questions = $questions;
    }
}
