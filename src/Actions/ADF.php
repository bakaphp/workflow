<?php

declare(strict_types=1);

namespace Kanvas\Packages\WorkflowsRules\Actions;

use Kanvas\Hengen\Hengen;
use Kanvas\Packages\WorkflowsRules\Actions;
use Kanvas\Packages\WorkflowsRules\Contracts\WorkflowsEntityInterfaces;
use Throwable;

class ADF extends Actions
{
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
            $data = $this->getModelsInArray(...$args);
            $data['entity'] = $entity;
            $transformer = Hengen::getTransformer(
                'ADF',
                $data['leads'],
                $this->params,
                ...array_values($data)
            );
            $communicator = Hengen::getCommunication(
                $transformer,
                $entity->companies
            );

            $this->data = $transformer->getData();
            $this->status = 1;
            $this->message = $transformer->toFormat();
            $communicator->send();

            $this->setResults([
                'html' => $transformer->toFormat(),
                'data' => $transformer->getData()
            ]);

            $this->setStatus(Actions::SUCCESSFUL);
        } catch (Throwable $e) {
            $this->setError($e->getTraceAsString());
            $this->setStatus(Actions::FAIL);
        }
    }
}
