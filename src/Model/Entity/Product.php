<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Product Entity
 *
 * @property int $id
 * @property string $title
 * @property string $price
 * @property string $description
 * @property string $info
 * @property string $weight
 * @property string $guide_use
 * @property string $guid_preservation
 * @property string $expiried
 * @property string $distribution
 * @property int $category_id
 *
 * @property \App\Model\Entity\Category $category
 */
class Product extends Entity
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
        '*' => true,
        'id' => false
    ];
}
