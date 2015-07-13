<?php

//namespace ZRayPrestashop;

class PrestashopController {

    public function beforeExit($context,&$storage){

            $storage['Controller'][] = array(
                                    'Controller Name' => Tools::getValue('controller'),
                                  );
    }


} 