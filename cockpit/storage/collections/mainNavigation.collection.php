<?php
 return array (
  'name' => 'mainNavigation',
  'label' => 'Main Navigation',
  '_id' => 'mainNavigation',
  'fields' => 
  array (
    0 => 
    array (
      'name' => 'mainNavigationItems',
      'label' => '',
      'type' => 'repeater',
      'default' => '',
      'info' => '',
      'group' => '',
      'localize' => true,
      'options' => 
      array (
        'field' => 
        array (
          'type' => 'set',
          'label' => 'Navigation',
          'options' => 
          array (
            'fields' => 
            array (
              0 => 
              array (
                'name' => 'title',
                'type' => 'text',
              ),
              1 => 
              array (
                'name' => 'url',
                'type' => 'text',
              ),
              2 => 
              array (
                'name' => 'sub-links',
                'type' => 'repeater',
                'label' => 'Sub Links',
                'options' => 
                array (
                  'field' => 
                  array (
                    'type' => 'set',
                    'label' => 'Navigation',
                    'options' => 
                    array (
                      'fields' => 
                      array (
                        0 => 
                        array (
                          'name' => 'title',
                          'type' => 'text',
                        ),
                        1 => 
                        array (
                          'name' => 'url',
                          'type' => 'text',
                        ),
                      ),
                    ),
                  ),
                ),
              ),
            ),
          ),
        ),
      ),
      'width' => '1-1',
      'lst' => true,
      'acl' => 
      array (
      ),
      'required' => true,
    ),
  ),
  'sortable' => false,
  'in_menu' => false,
  '_created' => 1603805871,
  '_modified' => 1603805871,
  'color' => '',
  'acl' => 
  array (
  ),
  'sort' => 
  array (
    'column' => '_created',
    'dir' => -1,
  ),
  'rules' => 
  array (
    'create' => 
    array (
      'enabled' => false,
    ),
    'read' => 
    array (
      'enabled' => false,
    ),
    'update' => 
    array (
      'enabled' => false,
    ),
    'delete' => 
    array (
      'enabled' => false,
    ),
  ),
);