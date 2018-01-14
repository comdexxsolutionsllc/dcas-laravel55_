<?php

namespace DCAS\Traits;

use App\Exceptions\InvalidEnumException;
use Illuminate\Support\Str;

trait Enums
{
    /**
     * Check for the presence of a property that starts
     *     with enum for the provided attribute.
     *
     * @param string $field
     * @param mixed $value
     *
     * @return $this
     *
     * @throws InvalidEnumException
     */
    public function setAttribute($field, $value)
    {
        if ($this->hasEnumProperty($field)) {
            if (!$this->isValidEnum($field, $value)) {
                throw new InvalidEnumException('Invalid value for ' . static::class . "::$field ($value)");
            }

            if ($this->isKeyedEnum($field, $value)) {
                $value = $this->getKeyedEnum($field, $value);
            }
        }

        return parent::setAttribute($field, $value);
    }

    /**
     * Is an enum property defined for the provided field.
     *
     * @param string $field
     *
     * @return bool
     */
    protected function hasEnumProperty(string $field)
    {
        $property = $this->getEnumProperty($field);

        return isset($this->$property) && is_array($this->$property);
    }

    /**
     * Gets the expected enum property.
     *
     * @param string $field
     *
     * @return string
     */
    protected function getEnumProperty(string $field)
    {
        return 'enum' . Str::plural(Str::studly($field));
    }

    /**
     * Is the value a valid enum in any way.
     *
     * @param string $field
     * @param mixed $value
     *
     * @return bool
     */
    protected function isValidEnum(string $field, $value)
    {
        return $this->isValueEnum($field, $value) ||
            $this->isKeyedEnum($field, $value);
    }

    /**
     * Is the provided value in the enum.
     *
     * @param string $field
     * @param mixed $value
     *
     * @return bool
     */
    protected function isValueEnum(string $field, $value)
    {
        return in_array($value, static::getEnum($field));
    }

    /**
     * Enum property getter.
     *
     * @param string $field
     *
     * @return mixed|false
     */
    public static function getEnum(string $field)
    {
        $instance = new static();

        if ($instance->hasEnumProperty($field)) {
            $property = $instance->getEnumProperty($field);

            return $instance->$property;
        }

        return false;
    }

    /**
     * Is the provided value a key in the enum.
     *
     * @param string $field
     * @param mixed $key
     *
     * @return bool
     */
    protected function isKeyedEnum(string $field, $key)
    {
        return in_array($key, array_keys(static::getEnum($field)), true);
    }

    /**
     * Gets the enum value by key.
     *
     * @param string $field
     * @param mixed $key
     *
     * @return mixed
     */
    protected function getKeyedEnum(string $field, $key)
    {
        return static::getEnum($field)[$key];
    }
}
