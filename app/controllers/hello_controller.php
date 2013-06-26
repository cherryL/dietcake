<?php

class HelloController extends AppController
{
    public function welcome()
    {
        $name = Param::get('name', 'Chet');
        $this->set(get_defined_vars());
    }
}
