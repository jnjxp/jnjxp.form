<?php
// @codingStandardsIgnoreFile

namespace Jnjxp\Form;

class FieldFactoryTest extends \PHPUnit_Framework_TestCase
{

    protected $factory;

    public function setUp()
    {
        parent::setUp();
        $this->factory = new FieldFactory();
    }


    public function testField()
    {
        $field = $this->factory->newField('foo');

        $this->assertInstanceOf(
            'Jnjxp\Form\Field',
            $field
        );

        $field = $this->factory->newField('foo', 'StdClass');

        $this->assertInstanceOf(
            'StdClass',
            $field
        );
    }

    public function testCollection()
    {
        $collection = $this->factory->newFieldCollection();

        $this->assertInstanceOf(
            'Jnjxp\Form\FieldCollection',
            $collection
        );

        $collection = $this->factory->newFieldCollection('StdClass');

        $this->assertInstanceOf(
            'StdClass',
            $collection
        );
    }

}
