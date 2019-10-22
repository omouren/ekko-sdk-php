<?php

namespace Ekko\Tests\Units\Request;

use mageekguy\atoum;

class PutUserDefinition extends atoum\test
{
    public function testConstructWithParams()
    {
        $this
            ->given(
                $options = array(
                    'user_id' => '123',
                    'username' => 'John Doe',
                    'image_url' => ''
                )
            )
            ->if($this->newTestedInstance($options))
                ->then
                    ->object($this->testedInstance)->isTestedInstance()
        ;
    }

    public function testConstructWithWrongParams()
    {
        $this
            ->exception(
                function () {
                    $options = array(
                        'wrongParam' => 'wrongValue'
                    );
                    $this->newTestedInstance($options);
                }
            )
        ;
    }
}
