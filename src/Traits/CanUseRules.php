<?php

declare(strict_types=1);

namespace Kanvas\Workflow\Traits;

use function Baka\isCLI;
use Canvas\Models\Companies;
use Kanvas\Workflow\Jobs\RulesJob;
use Kanvas\Workflow\Models\Rules;
use Kanvas\Workflow\Models\RulesTypes;
use Phalcon\Di;

trait CanUseRules
{
    protected array $rulesRelatedEntities = [];

    /**
     * fireRules.
     *
     * search rules for companies and systems_modules
     *
     * @param  mixed $event
     *
     * @return void
     */
    public function fireRules(string $event) : void
    {
        $rulesTypes = RulesTypes::findFirstByName($event);
        if (!$rulesTypes) {
            return;
        }

        $rules = Rules::getByModelAndRuleType(
            $this,
            $rulesTypes,
            Di::getDefault()->get('app')
        );

        if ($rules->count() && !isCLI()) {
            foreach ($rules as $rule) {
                RulesJob::dispatch($rule, $event, $this);
            }
        }
    }

    /**
     * Set the rules related entities.
     *
     * @param array $rulesRelatedEntities
     *
     * @return void
     */
    public function setRulesRelatedEntities(...$rulesRelatedEntities) : void
    {
        $this->rulesRelatedEntities = $rulesRelatedEntities;
    }

    /**
     * Set needed related entities to execute in each action.
     *
     * @return array<string, ModelInterface>
     */
    public function getRulesRelatedEntities() : array
    {
        return $this->rulesRelatedEntities;
    }

    /**
     * Add rulesRelatedEntities to toArray allowing us to pass values to the queue
     * why? when serializing the object only db properties are unserialize based on toArray.
     *
     * @param [type] $columns
     *
     * @return array
     */
    public function toArray($columns = null) : array
    {
        $array = parent::toArray($columns);
        $array['rulesRelatedEntities'] = $this->getRulesRelatedEntities();

        return $array;
    }
}
