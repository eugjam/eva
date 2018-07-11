<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function()
    {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
            'Tight.Eva',
            'Tight',
            'eva'
        );

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile('eva', 'Configuration/TypoScript', 'eva');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_eva_domain_model_account', 'EXT:eva/Resources/Private/Language/locallang_csh_tx_eva_domain_model_account.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_eva_domain_model_account');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_eva_domain_model_survey', 'EXT:eva/Resources/Private/Language/locallang_csh_tx_eva_domain_model_survey.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_eva_domain_model_survey');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_eva_domain_model_category', 'EXT:eva/Resources/Private/Language/locallang_csh_tx_eva_domain_model_category.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_eva_domain_model_category');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_eva_domain_model_question', 'EXT:eva/Resources/Private/Language/locallang_csh_tx_eva_domain_model_question.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_eva_domain_model_question');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_eva_domain_model_schoolclass', 'EXT:eva/Resources/Private/Language/locallang_csh_tx_eva_domain_model_schoolclass.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_eva_domain_model_schoolclass');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_eva_domain_model_answere', 'EXT:eva/Resources/Private/Language/locallang_csh_tx_eva_domain_model_answere.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_eva_domain_model_answere');

    }
);
