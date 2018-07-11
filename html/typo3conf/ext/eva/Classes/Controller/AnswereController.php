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
 * AnswereController
 */
class AnswereController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    /**
     * answereRepository
     *
     * @var \Tight\Eva\Domain\Repository\AnswereRepository
     * @inject
     */
    protected $answereRepository = null;

    /**
     * action list
     *
     * @return void
     */
    public function listAction()
    {
        $answeres = $this->answereRepository->findAll();
        $this->view->assign('answeres', $answeres);
    }
}
