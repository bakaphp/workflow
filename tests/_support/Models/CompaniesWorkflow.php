<?php
declare(strict_types=1);

namespace Kanvas\Workflow\Test\Support\Models;

use Canvas\Models\Companies as KanvasCompanies;
use Kanvas\Workflow\Contracts\WorkflowsEntityInterfaces;
use Kanvas\Workflow\Traits\CanUseRules;

class CompaniesWorkflow extends KanvasCompanies implements WorkflowsEntityInterfaces
{
    use CanUseRules;
}
