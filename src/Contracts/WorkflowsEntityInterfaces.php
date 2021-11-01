<?php

declare(strict_types=1);

namespace Workflow\Contracts;

interface WorkflowsEntityInterfaces
{
    /**
     * Set related entities.
     *
     * @param mixed ...$rulesRelatedEntities
     *
     * @return void
     */
    public function setRulesRelatedEntities(...$rulesRelatedEntities) : void;
    public function getRulesRelatedEntities() : array;
}
