<?php

//namespace ZRayPrestashop;

class PrestashopController {

    public function beforeExit($context,&$storage){

        if (isset(Context::getContext()->controller))
            $_controller = Context::getContext()->controller;
        else
        {
            $_controller = new FrontController();
        }

        $storage['Controller'][] = array(
                                    'Controller Name' => Tools::getValue('controller'),
                                    'Controller Type' => $_controller->controller_type,
                                    'Left Column' => ($_controller->display_column_left) ? 'Enabled':'Desabled',
                                    'Right Column' => ($_controller->display_column_right) ? 'Enabled' : 'Desabled',
                                    'Token' => (Configuration::get('PS_TOKEN_ENABLE')) ? 'Valid' : 'Not Valid',

                                   );

    }




}

