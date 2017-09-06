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
 * @category  Factory
 * @package   Jnjxp\Form
 * @author    Jake Johns <jake@jakejohns.net>
 * @copyright 2016 Jake Johns
 * @license   http://jnj.mit-license.org/2016 MIT License
 * @link      http://github.com/jnjxp/jnjxp.form
 */

namespace Jnjxp\Form;

/**
 * Factory
 *
 * @category Factory
 * @package  Jnjxp\Form
 * @author   Jake Johns <jake@jakejohns.net>
 * @license  http://jnj.mit-license.org/ MIT License
 * @link     http://github.com/jnjxp/jnjxp.form
 */
class FieldFactory
{

    /**
     * Create a new field
     *
     * @param string $name  name of field
     * @param string $class Field class
     *
     * @return Field
     *
     * @access public
     */
    public function newField($name, $class = Field::class)
    {
        return new $class($name);
    }

    /**
     * Create a new FieldCollection
     *
     * @param string $class FieldCollection class
     *
     * @return FieldCollection
     *
     * @access public
     */
    public function newFieldCollection($class = FieldCollection::class)
    {
        return new $class($this);
    }
}
