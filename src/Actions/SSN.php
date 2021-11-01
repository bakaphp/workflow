<?php

declare(strict_types=1);

namespace Workflow\Actions;

use Kanvas\Packages\Social\Contracts\Messages\MessagesInterface;
use Workflow\Actions;
use Workflow\Contracts\WorkflowsEntityInterfaces;
use Throwable;

class SSN extends Actions
{
    public const NAME = 'SSN';

    /**
     * handle.
     *
     * @param WorkflowsEntityInterfaces $entity
     * @param array $params
     * @param mixed ...$args
     *
     * @return void
     */
    public function handle(WorkflowsEntityInterfaces $entity) : void
    {
        $args = $entity->getRulesRelatedEntities();

        try {
            foreach ($args as $feed) {
                if ($feed instanceof MessagesInterface) {
                    $message = json_decode($feed->message, true);
                    unset($message['data']['form']['ssn']);
                    $feed->message = json_encode($message);
                    $feed->saveOrFail();
                }
            }
            $this->setResults($message);
            $this->setStatus(Actions::SUCCESSFUL);
        } catch (Throwable $e) {
            $this->setError($e->getTraceAsString());
            $this->setStatus(Actions::FAIL);
        }
    }
}
