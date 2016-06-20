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
 * @category  View
 * @package   Jnjxp\Form
 * @author    Jake Johns <jake@jakejohns.net>
 * @copyright 2016 Jake Johns
 * @license   http://jnj.mit-license.org/2016 MIT License
 * @link      http://github.com/jnjxp/jnjxp.form
 */


foreach ($fields as $field) {

    $group = ['form-group'];
    $label = ['class' => 'control-label'];

    if ($field->id) {
        $group[] = 'form-group_' . $field->id;
        $label['for'] = $field->id;
    }

    if ($field->errors) {
        $group[] = 'has-errors';
    }

    echo $helper->tag('div', ['class' => $group]);

    if ($input->label) {
        echo PHP_EOL;
        echo $helper->label($input->label, $label);
    }

    echo PHP_EOL;
    echo $helper->input($input->spec);

    if ($input->errors) {
        $errors = $helper->ul(['class' => 'errors']);
        $errors->items($input->errors);
        echo PHP_EOL;
        echo $errors;
        echo PHP_EOL;
    }

    echo $helper->tag('/div') . PHP_EOL;
    echo PHP_EOL;
}

