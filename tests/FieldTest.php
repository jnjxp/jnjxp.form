<?php
// @codingStandardsIgnoreFile

namespace Jnjxp\Form;

class FieldTest extends \PHPUnit_Framework_TestCase
{

    protected $field;

    public function setUp()
    {
        parent::setUp();
        $this->field = new Field('foo');
    }

    public function testLabel()
    {
        $this->assertSame(
            $this->field,
            $this->field->label('Label')
        );

        $this->assertEquals(
            'Label',
            $this->field->label
        );
    }

    public function testErrors()
    {
        $this->assertSame(
            $this->field,
            $this->field->errors(['err'])
        );

        $this->assertEquals(
            ['err'],
            $this->field->errors
        );
    }

    public function testType()
    {
        $this->assertSame(
            $this->field,
            $this->field->type('type')
        );

        $this->assertEquals(
            'type',
            $this->field->type
        );
    }

    public function testFill()
    {
        $this->assertSame(
            $this->field,
            $this->field->fill('val')
        );

        $this->assertEquals(
            'val',
            $this->field->value
        );
    }

    public function testAttribs()
    {
        $this->assertSame(
            $this->field,
            $this->field->attribs(['attr'])
        );

        $this->assertEquals(
            ['attr'],
            $this->field->attribs
        );
    }

    public function testOptions()
    {
        $this->assertSame(
            $this->field,
            $this->field->options(['opt'])
        );

        $this->assertEquals(
            ['opt'],
            $this->field->options
        );
    }

    public function testGetSpec()
    {
        $this->field->label('Label')
            ->type('type')
            ->attribs(['attr'])
            ->options(['opt'])
            ->fill('val');

        $this->assertEquals(
            [
                'type' => 'type',
                'name' => 'foo',
                'value' => 'val',
                'attribs' => ['attr'],
                'options' => ['opt']
            ],
            $this->field->spec
        );
    }

    public function testId()
    {
        $this->field->attribs(['id' => 'fooid']);
        $this->assertEquals(
            'fooid',
            $this->field->id
        );
    }
}
