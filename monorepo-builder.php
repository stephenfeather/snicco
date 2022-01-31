<?php

declare(strict_types=1);

use Symplify\MonorepoBuilder\ValueObject\Option;
use Symplify\ComposerJsonManipulator\ValueObject\ComposerJsonSection;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;

return static function (ContainerConfigurator $containerConfigurator) :void {
    $parameters = $containerConfigurator->parameters();
    
    $parameters->set(Option::PACKAGE_DIRECTORIES, [
        __DIR__.'/src/Snicco/Component',
        __DIR__.'/src/Snicco/Bridge',
        __DIR__.'/src/Snicco/Middleware',
    ]);
    
    $parameters->set(Option::DATA_TO_APPEND, [
        ComposerJsonSection::REQUIRE => [
            'php' => '^7.4|^8.0',
        ],
        ComposerJsonSection::REQUIRE_DEV => [
            'phpunit/phpunit' => '^9.5',
            'codeception/codeception' => '^4.1',
            'symplify/monorepo-builder' => '^9.4',
            'vlucas/phpdotenv' => '^5.4',
        ],
        ComposerJsonSection::AUTHORS => [
            [
                'name' => 'Calvin Alkan',
                'email' => 'calvin@snicco.de',
            ],
        ],
        ComposerJsonSection::CONFIG => [
            'optimize-autoloader' => true,
            'preferred-install' => 'dist',
            'sort-packages' => true,
        ],
        ComposerJsonSection::SCRIPTS => [
            'merge' => [
                'vendor/bin/monorepo-builder merge',
                'composer dump-autoload',
            ],
        ],
        ComposerJsonSection::MINIMUM_STABILITY => 'dev',
    ]);
    
    $parameters->set(Option::DATA_TO_REMOVE, [
        ComposerJsonSection::REQUIRE => [
            'sniccowp/http-runner' => '*',
            'sniccowp/parameter-bag' => '*',
            'sniccowp/psr7-error-handler' => '*',
        ],
        ComposerJsonSection::REQUIRE_DEV => [
            // temporary until split
            'sniccowp/pimple-bridge' => '*',
        ],
    ]);
};