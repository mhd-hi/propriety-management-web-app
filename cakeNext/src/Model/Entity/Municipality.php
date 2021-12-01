<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Municipality Entity
 *
 * @property int $id
 * @property int $province_id
 * @property int $region_id
 * @property string $code
 * @property string $name
 *
 * @property \App\Model\Entity\Province $province
 * @property \App\Model\Entity\Region $region
 * @property \App\Model\Entity\Propriete[] $proprietes
 */
class Municipality extends Entity
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
        'province_id' => true,
        'region_id' => true,
        'code' => true,
        'name' => true,
        'province' => true,
        'region' => true,
        'proprietes' => true, 
    ];
    
}
