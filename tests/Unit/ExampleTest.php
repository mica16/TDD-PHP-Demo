<?php

require 'src/project/SomeClass.php';

it('example', function () {
    expect((new SomeClass())->handle())->toEqual(5);
});
