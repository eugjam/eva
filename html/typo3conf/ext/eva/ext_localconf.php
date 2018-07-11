<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function()
    {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'Tight.Eva',
            'Tight',
            [
                'Account' => 'new, create, edit, update, delete, login, logout',
                'Survey' => 'list, show, new, create, edit, update, delete, evaluate',
                'Category' => 'list, new, create, edit, update, delete',
                'Question' => 'list, show, new, create, edit, update, delete',
                'SchoolClass' => 'list, show, new, create, edit, update, delete',
                'Answere' => 'list'
            ],
            // non-cacheable actions
            [
                'Account' => 'create, update, delete, ',
                'Survey' => 'create, update, delete, ',
                'Category' => 'create, update, delete',
                'Question' => 'create, update, delete',
                'SchoolClass' => 'create, update, delete',
                'Answere' => ''
            ]
        );

    // wizards
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
        'mod {
            wizards.newContentElement.wizardItems.plugins {
                elements {
                    tight {
                        iconIdentifier = eva-plugin-tight
                        title = LLL:EXT:eva/Resources/Private/Language/locallang_db.xlf:tx_eva_tight.name
                        description = LLL:EXT:eva/Resources/Private/Language/locallang_db.xlf:tx_eva_tight.description
                        tt_content_defValues {
                            CType = list
                            list_type = eva_tight
                        }
                    }
                }
                show = *
            }
       }'
    );
		$iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);
		
			$iconRegistry->registerIcon(
				'eva-plugin-tight',
				\TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
				['source' => 'EXT:eva/Resources/Public/Icons/user_plugin_tight.svg']
			);
		
    }
);
