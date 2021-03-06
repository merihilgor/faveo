<?php

namespace App\Plugins\Ldap\Adldap2\Configuration\Validators;

/**
 * Class Validator
 *
 * Validates configuration values.
 *
 * @package App\Plugins\Ldap\Adldap2\Configuration\Validators
 */
abstract class Validator
{
    /**
     * The configuration key under validation.
     *
     * @var string
     */
    protected $key;

    /**
     * The configuration value under validation.
     *
     * @var mixed
     */
    protected $value;

    /**
     * Constructor.
     *
     * @param string $key
     * @param mixed  $value
     */
    public function __construct($key, $value)
    {
        $this->key = $key;
        $this->value = $value;
    }

    /**
     * Validates the configuration value.
     *
     * @return bool
     *
     * @throws \Adldap\Configuration\ConfigurationException When the value given fails validation.
     */
    abstract public function validate();
}
