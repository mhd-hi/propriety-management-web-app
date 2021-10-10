<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Characteristics Model
 *
 * @property \App\Model\Table\ProprietesTable&\Cake\ORM\Association\BelongsToMany $Proprietes
 *
 * @method \App\Model\Entity\Characteristic newEmptyEntity()
 * @method \App\Model\Entity\Characteristic newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Characteristic[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Characteristic get($primaryKey, $options = [])
 * @method \App\Model\Entity\Characteristic findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Characteristic patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Characteristic[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Characteristic|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Characteristic saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Characteristic[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Characteristic[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Characteristic[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Characteristic[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class CharacteristicsTable extends Table
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

        $this->setTable('characteristics');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsToMany('Proprietes', [
            'foreignKey' => 'characteristic_id',
            'targetForeignKey' => 'propriete_id',
            'joinTable' => 'characteristics_proprietes',
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
            ->integer('rooms')
            ->requirePresence('rooms', 'create')
            ->notEmptyString('rooms');

        $validator
            ->scalar('description')
            ->requirePresence('description', 'create')
            ->notEmptyString('description');

        return $validator;
    }
}
