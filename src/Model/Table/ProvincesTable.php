<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Provinces Model
 *
 * @property \App\Model\Table\MunicipalitiesTable&\Cake\ORM\Association\HasMany $Municipalities
 * @property \App\Model\Table\RegionsTable&\Cake\ORM\Association\HasMany $Regions
 *
 * @method \App\Model\Entity\Province newEmptyEntity()
 * @method \App\Model\Entity\Province newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Province[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Province get($primaryKey, $options = [])
 * @method \App\Model\Entity\Province findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Province patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Province[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Province|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Province saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Province[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Province[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Province[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Province[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class ProvincesTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('provinces');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('Municipalities', [
            'foreignKey' => 'province_id',
        ]);
        $this->hasMany('Regions', [
            'foreignKey' => 'province_id',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('code')
            ->maxLength('code', 10)
            ->requirePresence('code', 'create')
            ->notEmptyString('code');

        $validator
            ->scalar('name')
            ->maxLength('name', 50)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        return $validator;
    }
}
