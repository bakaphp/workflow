<?php

declare(strict_types=1);

namespace Kanvas\Workflow\Providers;

use Kanvas\Workflow\Contracts\Template;
use Phalcon\Di\DiInterface;
use Phalcon\Di\ServiceProviderInterface;

class TemplateProvider implements ServiceProviderInterface
{
    /**
     * @param DiInterface $container
     */
    public function register(DiInterface $container) : void
    {
        $container->setShared(
            'templates',
            function () {
                return new Template();
            }
        );
    }
}
