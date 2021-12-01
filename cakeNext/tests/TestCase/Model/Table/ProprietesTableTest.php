<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProprietesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProprietesTable Test Case
 */
class ProprietesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ProprietesTable
     */
    protected $Proprietes;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Proprietes',
        'app.Users',
        'app.Photos',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Proprietes') ? [] : ['className' => ProprietesTable::class];
        $this->Proprietes = $this->getTableLocator()->get('Proprietes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Proprietes);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
