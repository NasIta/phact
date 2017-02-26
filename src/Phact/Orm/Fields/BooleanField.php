<?php
/**
 *
 *
 * All rights reserved.
 *
 * @author Okulov Anton
 * @email qantus@mail.ru
 * @version 1.0
 * @company HashStudio
 * @site http://hashstudio.ru
 * @date 13/04/16 08:11
 */

namespace Phact\Orm\Fields;


class BooleanField extends IntField
{
    public $length = 1;
    public $unsigned = true;

    public function setAttribute($value)
    {
        parent::setAttribute($value);
    }

    public function rawAccessValue($value)
    {
        return is_null($value) ? null : (bool) $value;
    }

    public function attributePrepareValue($value)
    {
        return $this->rawAccessValue($value);
    }

    public function dbPrepareValue($value)
    {
        return $value ? 1 : 0;
    }

    public function mainSqlType()
    {
        return "TINYINT({$this->length})";
    }

    public function getFormField()
    {
        return $this->setUpFormField([
            'class' => \Phact\Form\Fields\CheckboxField::class
        ]);
    }
}