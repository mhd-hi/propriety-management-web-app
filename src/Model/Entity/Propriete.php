<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Propriete Entity
 *
 * @property int $id
 * @property string $address
 * @property int $user_id
 * @property string|null $type
 * @property string $slug
 * @property bool|null $state
 * @property int|null $price
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Photo[] $photos
 */
class Propriete extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'address' => true,
    //    'user_id' => true,
        'type' => true,
    //    'slug' => true,
        'state' => true,
        'price' => true,
    //    'created' => true,
    //    'modified' => true,
    //    'user' => true,
        'photos' => true,
    ];
}
