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
 * CategoryController
 */
class CategoryController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    /**
     * categoryRepository
     *
     * @var \Tight\Eva\Domain\Repository\CategoryRepository
     * @inject
     */
    protected $categoryRepository = null;

    /**
     * action list
     *
     * @return void
     */
    public function listAction()
    {
        $categories = $this->categoryRepository->findAll();
        $this->view->assign('categories', $categories);
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
     * @param \Tight\Eva\Domain\Model\Category $newCategory
     * @return void
     */
    public function createAction(\Tight\Eva\Domain\Model\Category $newCategory)
    {
        $this->addFlashMessage('The object was created. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->categoryRepository->add($newCategory);
        $this->redirect('list');
    }

    /**
     * action edit
     *
     * @param \Tight\Eva\Domain\Model\Category $category
     * @ignorevalidation $category
     * @return void
     */
    public function editAction(\Tight\Eva\Domain\Model\Category $category)
    {
        $this->view->assign('category', $category);
    }

    /**
     * action update
     *
     * @param \Tight\Eva\Domain\Model\Category $category
     * @return void
     */
    public function updateAction(\Tight\Eva\Domain\Model\Category $category)
    {
        $this->addFlashMessage('The object was updated. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->categoryRepository->update($category);
        $this->redirect('list');
    }

    /**
     * action delete
     *
     * @param \Tight\Eva\Domain\Model\Category $category
     * @return void
     */
    public function deleteAction(\Tight\Eva\Domain\Model\Category $category)
    {
        $this->addFlashMessage('The object was deleted. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->categoryRepository->remove($category);
        $this->redirect('list');
    }
}
