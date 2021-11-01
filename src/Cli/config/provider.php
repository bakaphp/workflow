<?php

/**
 * Enabled providers. Order does matter.
 */

use Kanvas\Packages\Social\Providers\QueueProvider;
use Kanvas\Packages\Social\Providers\RedisProvider;
use  Workflow\Providers\DatabaseProvider as WorkflowDatabaseProvider;
use  Workflow\Providers\LoggerProvider as WorkflowLoggerProvider;
use  Workflow\Providers\MailProvider as WorkflowMailProvider;
use  Workflow\Providers\TemplateProvider as WorkflowTemplateProvider;

return [
    QueueProvider::class,
    RedisProvider::class,
    WorkflowDatabaseProvider::class,
    WorkflowLoggerProvider::class,
    WorkflowMailProvider::class,
    WorkflowTemplateProvider::class
];
