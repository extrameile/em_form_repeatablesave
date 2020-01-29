<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'EXT:form save to database finisher',
    'description' => 'The extension allows to save repeatable data to database tables',
    'category' => 'plugin',
    'author' => 'Alexander Opitz',
    'author_email' => 'opitz@extrameile-gehen.de',
    'state' => 'beta',
    'author_company' => 'Extrameile GmbH',
    'version' => '1.0.0',
    'constraints' => [
        'depends' => [
            'typo3' => '8.7.0-9.6.99',
            'form' => '8.7.0-9.6.99',
        ],
    ],
    'autoload' => [
        'psr-4' => [
            'Extrameile\\EmFormRepeatablesave\\' => 'Classes/',
        ],
    ],
];
