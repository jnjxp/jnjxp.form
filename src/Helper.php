<?php
// @codingStandardsIgnoreFile


namespace Jnjxp\Form;

class Helper
{

    protected $factory;

    public function __construct(FieldFactory $factory = null)
    {
        $this->factory = $factory ?: new FieldFactory;
    }

    public function __invoke($class)
    {
        return $this->factory->newFieldCollection($class);
    }
}
