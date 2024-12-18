<?php

/** @noinspection PhpUndefinedVariableInspection */
$EM_CONF[$_EXTKEY] = [
    'title' => 'Apache Tika for TYPO3',
    'description' => 'Provides Tika services for TYPO3 to detect a document\'s language, extract meta data, and extract content from files. Can either use a stand alone Tika executable or Tika integrated in a Solr server with an activated extracting request handler.',
    'version' => '13.0.0',
    'state' => 'stable',
    'category' => 'services',
    'author' => 'Ingo Renner, Timo Hund, Markus Friedrich, Rafael Kähm',
    'author_email' => 'solr-eb-support@dkd.de',
    'author_company' => 'dkd Internet Service GmbH',
    'constraints' => [
        'depends' => [
            'typo3' => '13.4.2-13.4.99',
            'filemetadata' => '',
        ],
        'conflicts' => [],
        'suggests' => [
            'solr' => '13.0.0-',
        ],
    ],
    'autoload' => [
        'psr-4' => [
            'ApacheSolrForTypo3\\Tika\\' => 'Classes/',
        ],
    ],
];
