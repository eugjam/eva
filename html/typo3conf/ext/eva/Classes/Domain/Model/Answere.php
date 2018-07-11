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
 * Answere
 */
class Answere extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    /**
     * question
     *
     * @var \Tight\Eva\Domain\Model\Question
     */
    protected $question = null;

    /**
     * Returns the question
     *
     * @return \Tight\Eva\Domain\Model\Question $question
     */
    public function getQuestion()
    {
        return $this->question;
    }

    /**
     * Sets the question
     *
     * @param \Tight\Eva\Domain\Model\Question $question
     * @return void
     */
    public function setQuestion(\Tight\Eva\Domain\Model\Question $question)
    {
        $this->question = $question;
    }
}
