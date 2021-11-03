<?php
declare(strict_types=1);

namespace Kanvas\Workflow\Jobs;

use Baka\Jobs\Job;
use Kanvas\Workflow\Contracts\WorkflowsEntityInterfaces;
use Kanvas\Workflow\Models\Rules;
use Kanvas\Workflow\Rules as RulesServices;

class RulesJob extends Job
{
    public Rules $rule;
    public string $event;
    public WorkflowsEntityInterfaces $entity;
    public array $args;

    /**
     * Constructor the job.
     *
     * @param Rules $rules
     * @param string $event
     * @param WorkflowsEntityInterfaces $entity
     * @param mixed ...$args
     */
    public function __construct(Rules $rules, string $event, WorkflowsEntityInterfaces $entity)
    {
        //set queue
        $this->onQueue('workflows');

        $this->rule = $rules;
        $this->entity = $entity;
        $this->event = $event;
    }

    /**
     * handle.
     *
     * @return void
     */
    public function handle()
    {
        $rule = new RulesServices($this->rule);

        //execute the rule
        $rule->execute(
            $this->entity,
        );
    }
}
