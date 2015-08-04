<?php

//namespace ZRayPrestashop;

class PrestashopController {

    public function beforeExit($context,&$storage){



        $storage['Controller'][] = array(
                                    'Controller Name' => Tools::getValue('controller'),
                                    'Controller Type' => Context::getContext()->controller->controller_type,
                                    'Token' => (Configuration::get('PS_TOKEN_ENABLE')) ? 'Valid' : 'Not Valid',

                                   );


    }


} 