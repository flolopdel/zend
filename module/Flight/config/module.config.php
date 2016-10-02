<?php

namespace Flight;

return array(
    'router' => array(
        'routes' => array(
            // The following is a route to simplify getting started creating
            // new controllers and actions without needing to create a new
            // module. Simply drop new controllers in, and you can access them
            // using the path /application/:controller/:action
            'flights' => array(
                'type'    => 'Segment',
                'options' => array(
                    'route'    => '/flights[/:action][/:id]',
                    'constraints' => array(
                        'action'    => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'        => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller'    => 'Flight\Controller\Flight',
                        'action'        => 'index',
                    ),
                ),
            ),
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            'Flight\Controller\Flight' => 'Flight\Controller\FlightController'
        ),
    ),
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => array(
            'flight/flight/index'           => __DIR__ . '/../view/flight/index.phtml',
            'flight/flight/details'           => __DIR__ . '/../view/flight/details.phtml',
            'flight/flight/show'           => __DIR__ . '/../view/flight/show.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view2',
        ),
    ),
);
