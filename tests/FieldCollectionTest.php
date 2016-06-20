<?php
// @codingStandardsIgnoreFile

namespace Jnjxp\Form;

class FieldCollectionTest extends \PHPUnit_Framework_TestCase
{

    protected $collection;

    public function setUp()
    {
        parent::setUp();
        $this->collection = new FieldCollection();
    }

    public function testGetIterator()
    {
        $this->assertInstanceOf(
            'Iterator',
            $this->collection->getIterator()
        );
    }

    public function testAdd()
    {
        $this->assertInstanceOf(
            'Jnjxp\Form\Field',
            $this->collection->add('foo')
        );

        $this->assertTrue($this->collection->has('foo'));
    }

    public function testAddException()
    {
        $this->setExpectedException('Exception');

        $this->assertInstanceOf(
            'Jnjxp\Form\Field',
            $this->collection->add('foo')
        );

        $this->collection->add('foo');
    }

    public function testRemove()
    {
        $this->collection->add('foo');

        $this->assertTrue($this->collection->has('foo'));

        $this->assertSame(
            $this->collection,
            $this->collection->remove('foo')
        );

        $this->assertFalse($this->collection->has('foo'));
    }

    public function testGet()
    {
        $this->collection->add('foo');
        $foo = $this->collection->get('foo');
        $this->AssertInstanceOf('Jnjxp\Form\Field', $foo);

        $this->assertEquals('foo', $foo->name);
    }

    public function testGetException()
    {
        $this->setExpectedException('Exception');
        $this->collection->get('foo');
    }

    public function testFill()
    {
        $this->collection->add('foo');
        $this->assertSame(
            $this->collection,
            $this->collection->fill(['foo' => 'bar'])
        );
        $foo = $this->collection->get('foo');
        $this->assertEquals('bar', $foo->value);
    }

    public function testErrors()
    {
        $this->collection->add('foo');
        $this->assertSame(
            $this->collection,
            $this->collection->errors(['foo' => ['bar']])
        );
        $foo = $this->collection->get('foo');
        $this->assertEquals(['bar'], $foo->errors);
    }
}
