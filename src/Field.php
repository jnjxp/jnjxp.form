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
 * @category  Field
 * @package   Jnjxp\Field
 * @author    Jake Johns <jake@jakejohns.net>
 * @copyright 2016 Jake Johns
 * @license   http://jnj.mit-license.org/2016 MIT License
 * @link      http://github.com/jnjxp/jnjxp.form
 */

namespace Jnjxp\Form;

/**
 * Field
 *
 * @category Field
 * @package  Jnjxp\Form
 * @author   Jake Johns <jake@jakejohns.net>
 * @license  http://jnj.mit-license.org/ MIT License
 * @link     http://github.com/jnjxp/jnjxp.form
 *
 * @SuppressWarnings(PHPMD.ShortVariable)
 */
class Field
{
    protected $name;

    protected $id;

    protected $label;

    protected $errors = [];

    protected $type = 'text';

    protected $value;

    protected $attribs = [];

    protected $options = [];

    /**
     * Create a new form field
     *
     * @param string $name name of field
     *
     * @access public
     */
    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * Set label
     *
     * @param string $label Label for field
     *
     * @return $this
     *
     * @access public
     */
    public function label($label)
    {
        $this->label = $label;
        return $this;
    }

    /**
     * Set error mesages
     *
     * @param array $errors array of error messages
     *
     * @return $this
     *
     * @access public
     */
    public function errors(array $errors)
    {
        $this->errors = $errors;
        return $this;
    }

    /**
     * Set type
     *
     * @param string $type field type
     *
     * @return $this
     *
     * @access public
     */
    public function type($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * Fill value
     *
     * @param mixed $value value of field
     *
     * @return $this
     *
     * @access public
     */
    public function fill($value)
    {
        $this->value = $value;
        return $this;
    }

    /**
     * Set attributes
     *
     * @param array $attribs attributes for field
     *
     * @return $this
     *
     * @access public
     */
    public function attribs(array $attribs)
    {
        if (isset($attribs['id'])) {
            $this->id = $attribs['id'];
        }

        $this->attribs = $attribs;
        return $this;
    }

    /**
     * Set options
     *
     * @param array $options options for field
     *
     * @return $this
     *
     * @access public
     */
    public function options(array $options)
    {
        $this->options = $options;
        return $this;
    }

    /**
     * Get field spec as array
     *
     * @return array
     *
     * @access public
     */
    public function getSpec()
    {
        return [
            'type' => $this->type,
            'name' => $this->name,
            'value' => $this->value,
            'attribs' => $this->attribs,
            'options' => $this->options
        ];
    }

    /**
     * Magic getter
     *
     * @param string $name name of property
     *
     * @return mixed
     *
     * @access public
     */
    public function __get($name)
    {
        $method = 'get' . ucfirst($name);
        if (method_exists($this, $method)) {
            return $this->$method();
        }
        return $this->$name;
    }

}
