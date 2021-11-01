<?php

use Phinx\Seed\AbstractSeed;

class RulesActions extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     */
    public function run()
    {
        $this->table('rules_workflow_actions')
        ->insert([
            [
                'system_modules_id' => '1',
                'actions_id' => '1',
            ],
            [
                'system_modules_id' => '1',
                'actions_id' => '2',
            ],
            [
                'system_modules_id' => '1',
                'actions_id' => '3',
            ]
        ])
        ->saveData();

        $this->table('rules_actions')
             ->insert([
                 [
                     'rules_id' => '1',
                     'rules_workflow_actions_id' => '1',
                     'created_at' => date('Y-m-d H:i:s'),
                 ],
                 [
                     'rules_id' => '1',
                     'rules_workflow_actions_id' => '2',
                     'created_at' => date('Y-m-d H:i:s'),
                 ],
                 [
                     'rules_id' => '1',
                     'rules_workflow_actions_id' => '2',
                     'created_at' => date('Y-m-d H:i:s'),
                 ]
             ])
             ->saveData();
    }
}
