# jnjxp.form
Describe collections of HTML form inputs

[![Latest version][ico-version]][link-packagist]
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]

## Installation
```
composer require jnjxp/form
```

## Usage
```php
$form = (new Jnjxp\Form\FieldFactory)->newFieldCollection();

$form->add('username')
    ->type('text')
    ->label('Username')
    ->attribs(['required' => true]);

$form->add('password')
    ->type('password')
    ->label('Password')
    ->attribs(['required' => true]);

$data = $filter->apply($input);
$form->fill($data);
$form->errors($filter->getFailures()->getMessages());


foreach ($form as $field) {

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

```


[ico-version]: https://img.shields.io/packagist/v/jnjxp/form.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/jnjxp/jnjxp.form/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/jnjxp/jnjxp.form.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/jnjxp/jnjxp.form.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/jnjxp/form
[link-travis]: https://travis-ci.org/jnjxp/jnjxp.form
[link-scrutinizer]: https://scrutinizer-ci.com/g/jnjxp/jnjxp.form
[link-code-quality]: https://scrutinizer-ci.com/g/jnjxp/jnjxp.form
