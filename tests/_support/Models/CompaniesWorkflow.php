<?php
declare(strict_types=1);

namespace Kanvas\Packages\Test\Support\Models;

use Canvas\Models\Companies as KanvasCompanies;
use Workflow\Contracts\WorkflowsEntityInterfaces;
use Workflow\Traits\CanUseRules;

class CompaniesWorkflow extends KanvasCompanies implements WorkflowsEntityInterfaces
{
    use CanUseRules;
}
