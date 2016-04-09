<?php
/**
 * Jnjxp\Form
 *
 * PHP version 5
 *
 * Copyright (C) 2016 Jake Johns
 *
 * This software may be modified and distributed under the terms
 * of the MIT license.  See the LICENSE file for details.
 *
 * @category  Collection
 * @package   Jnjxp\Form
 * @author    Jake Johns <jake@jakejohns.net>
 * @copyright 2016 Jake Johns
 * @license   http://jnj.mit-license.org/2016 MIT License
 * @link      http://github.com/jnjxp/jnjxp.form
 */

namespace Jnjxp\Form;

use ArrayIterator;
use IteratorAggregate;
use JsonSerializable;

/**
 * FieldCollection
 *
 * @category Collection
 * @package  Jnjxp\Form
 * @author   Jake Johns <jake@jakejohns.net>
 * @license  http://jnj.mit-license.org/ MIT License
 * @link     http://github.com/jnjxp/jnjxp.form
 *
 * @see IteratorAggregate
 */
class FieldCollection implements IteratorAggregate, JsonSerializable
{
    /**
     * Fields
     *
     * @var array
     *
     * @access protected
     */
    protected $fields = [];

    /**
     * Factory
     *
     * @var FieldFactory
     *
     * @access protected
     */
    protected $factory;

    /**
     * Create a collection of fields
     *
     * @param FieldFactory $factory Field Factory
     *
     * @access public
     */
    public function __construct(FieldFactory $factory = null)
    {
        $this->factory = $factory ?: new FieldFactory;
        $this->init();
    }

    /**
     * Initialize turn-key
     *
     * @return void
     *
     * @access protected
     */
    protected function init()
    {
    }

    /**
     * Get Iterator of fields
     *
     * @return ArrayIterator
     *
     * @access public
     */
    public function getIterator()
    {
        return new ArrayIterator($this->fields);
    }

    /**
     * Add a field
     *
     * @param string $name  name of field
     * @param string $class Field class
     *
     * @return Field
     *
     * @throws Exception if field already exists
     *
     * @access public
     */
    public function add($name, $class = 'Jnjxp\Form\Field')
    {
        if ($this->has($name)) {
            throw new \Exception("Field '$name' already exists");
        }
        $this->fields[$name] = $this->factory->newField($name, $class);
        return $this->fields[$name];
    }

    /**
     * Remove a field
     *
     * @param string $name name of field
     *
     * @return $this
     *
     * @access public
     */
    public function remove($name)
    {
        if ($this->has($name)) {
            unset($this->fields[$name]);
        }
        return $this;
    }

    /**
     * Does the collection have a field?
     *
     * @param string $name name of the field for which to check
     *
     * @return bool
     *
     * @access public
     */
    public function has($name)
    {
        return isset($this->fields[$name]);
    }

    /**
     * Get a field
     *
     * @param string $name name of field to get
     *
     * @return Field
     *
     * @throws Exception if field does not exist
     *
     * @access public
     */
    public function get($name)
    {
        if (! $this->has($name)) {
            throw new \Exception("Field '$name' not found");
        }
        return $this->fields[$name];
    }

    /**
     * Fill fields with values
     *
     * @param array $values values to fill
     *
     * @return $this
     *
     * @access public
     */
    public function fill(array $values)
    {
        foreach ($values as $name => $value) {
            if ($this->has($name)) {
                $this->get($name)->fill($value);
            }
        }
        return $this;
    }

    /**
     * Set error messages
     *
     * @param array $errors error messages
     *
     * @return $this
     *
     * @access public
     */
    public function errors(array $errors)
    {
        foreach ($errors as $name => $error) {
            if ($this->has($name)) {
                $this->get($name)->errors($error);
            }
        }
        return $this;
    }

    /**
     * JsonSerialize
     *
     * @return array
     *
     * @access public
     */
    public function jsonSerialize()
    {
        return $this->fields;
    }
}
