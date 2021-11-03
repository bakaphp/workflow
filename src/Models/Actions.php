<?php
declare(strict_types=1);

namespace Kanvas\Workflow\Models;

class Actions extends BaseModel
{
    public string $name;
    public string $model_name;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        parent::initialize();
        $this->setSource('actions');
    }
}
