<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
// the Text class
use Cake\Utility\Text;
// the EventInterface class
use Cake\Event\EventInterface;

/**
 * Proprietes Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\CharacteristicsTable&\Cake\ORM\Association\BelongsToMany $Characteristics
 *
 * @method \App\Model\Entity\Propriete newEmptyEntity()
 * @method \App\Model\Entity\Propriete newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Propriete[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Propriete get($primaryKey, $options = [])
 * @method \App\Model\Entity\Propriete findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Propriete patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Propriete[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Propriete|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Propriete saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Propriete[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Propriete[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Propriete[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Propriete[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ProprietesTable extends Table
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

        //traduction
        $this->addBehavior('Translate', ['fields' => ['address', 'type']]);

        $this->setTable('proprietes');
        $this->setDisplayField('address');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsToMany('Characteristics', [
            'foreignKey' => 'propriete_id',
            'targetForeignKey' => 'characteristic_id',
            'joinTable' => 'characteristics_proprietes',
        ]);

       /* $this->belongsToMany('Characteristics', [
            'foreignKey' => 'propriete_id',
            'targetForeignKey' => 'characteristic_id',
            'joinTable'=>'characteristics_proprietes'
        ]);jsp si fo add ici*/
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
            ->scalar('address')
            ->maxLength('address', 255)
            ->requirePresence('address', 'create')
            ->notEmptyString('address');

        $validator
            ->scalar('type')
            ->maxLength('type', 255)
            ->allowEmptyString('type');
/*
        $validator
            ->scalar('slug')
            ->maxLength('slug', 255)
            ->requirePresence('slug', 'create')
            ->notEmptyString('slug');
*/
        $validator
            ->boolean('sold')
            ->allowEmptyString('sold');

        $validator
        ->allowEmptyFile('image_file')
        ->add('image_file', [
            'mimeType' => [
                'rule' => ['mimeType', ['image/jpg', 'image/png', 'image/jpeg']],
                'message' => 'Please upload only jpg and png.',
            ],
            'fileSize' => [
                'rule' => ['fileSize', '<=', '1MB'],
                'message' => 'Image file size must be less than 1MB.',
            ],
        ]);
        
        $validator
            ->integer('price')
            ->allowEmptyString('price');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->isUnique(['slug']), ['errorField' => 'slug']);
        $rules->add($rules->existsIn(['user_id'], 'Users'), ['errorField' => 'user_id']);

        return $rules;
    }

    public function beforeSave(EventInterface $event, $entity, $options)
    {
        if ($entity->isNew() && !$entity->slug) {
            $sluggedAddress = Text::slug($entity->address);
            // trim slug to maximum length defined in schema
            $entity->slug = substr($sluggedAddress, 0, 191);
        }
    }
}
