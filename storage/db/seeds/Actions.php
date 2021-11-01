<?php

use Phinx\Seed\AbstractSeed;

class Actions extends AbstractSeed
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
        $this->table('actions')
            ->insert([
                [
                    'name' => 'SendToZoho',
                    'model_name' => 'Workflow\Actions\SendToZoho'
                ],
                [
                    'name' => 'SendMail',
                    'model_name' => 'Workflow\Actions\SendMail'
                ],
                [
                    'name' => 'ADF',
                    'model_name' => 'Workflow\Actions\ADF'
                ],
                [
                    'name' => 'PDF',
                    'model_name' => 'Workflow\Actions\PDF'
                ]
            ])
            ->saveData();

        $this->table('rules_types')
            ->insert([
                [
                    'name' => 'created'
                ],
                [
                    'name' => 'updated'
                ],
                [
                    'name' => 'deleted'
                ]
            ])
            ->saveData();
    }
}
