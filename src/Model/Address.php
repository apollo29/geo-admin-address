<?php

declare(strict_types=1);

namespace Atk4\GeoAdminAddress\Model;

use Atk4\Data\Model;
use Atk4\GeoAdminAddress\Form\Control\AddressLookup;
use Atk4\GeoAdminAddress\Utils\Type;

/**
 * Model sample.
 */
class Address extends Model
{
    public $table = 'address';

    protected function init(): void
    {
        parent::init();

        $this->addField('map_search', [
            'never_save' => true,
            'never_persist' => true,
            'ui' => ['editable' => true, 'visible' => false, 'form' => [AddressLookup::class]],
        ]);

        $this->addField(Type::LABEL);
        $this->addField(Type::ORIGIN);
        $this->addField(Type::LAT);
        $this->addField(Type::LNG);
    }
}
