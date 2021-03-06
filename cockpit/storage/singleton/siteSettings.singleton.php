<?php
 return array (
  'name' => 'siteSettings',
  'label' => 'Seiten-Einstellungen',
  '_id' => 'siteSettings',
  'fields' => 
  array (
    0 => 
    array (
      'name' => 'name',
      'label' => 'Webseiten-Name',
      'type' => 'text',
      'default' => '',
      'info' => '',
      'group' => '',
      'localize' => true,
      'options' => 
      array (
      ),
      'width' => '1-1',
      'lst' => true,
      'acl' => 
      array (
      ),
      'required' => true,
    ),
    1 => 
    array (
      'name' => 'description',
      'label' => 'Beschreibung der Webseite',
      'type' => 'text',
      'default' => '',
      'info' => '',
      'group' => '',
      'localize' => true,
      'options' => 
      array (
      ),
      'width' => '1-1',
      'lst' => true,
      'acl' => 
      array (
      ),
      'required' => true,
    ),
    2 => 
    array (
      'name' => 'homepage',
      'label' => 'Startseite',
      'type' => 'collectionlink',
      'default' => '',
      'info' => '',
      'group' => '',
      'localize' => false,
      'options' => 
      array (
        'link' => 'pages',
        'display' => 'Startseite',
        'multiple' => false,
        'limit' => false,
      ),
      'width' => '1-2',
      'lst' => true,
      'acl' => 
      array (
      ),
      'required' => true,
    ),
    3 => 
    array (
      'name' => '404',
      'label' => '',
      'type' => 'collectionlink',
      'default' => '',
      'info' => '',
      'group' => '',
      'localize' => false,
      'options' => 
      array (
        'link' => 'pages',
        'display' => '404 Seite',
        'multiple' => false,
        'limit' => false,
      ),
      'width' => '1-2',
      'lst' => true,
      'acl' => 
      array (
      ),
      'required' => true,
    ),
    4 => 
    array (
      'name' => 'footerText',
      'label' => 'Footer-Inhalt',
      'type' => 'textarea',
      'default' => '',
      'info' => '',
      'group' => '',
      'localize' => true,
      'options' => 
      array (
      ),
      'width' => '1-1',
      'lst' => true,
      'acl' => 
      array (
      ),
      'required' => true,
    ),
    5 => 
    array (
      'name' => 'favIcon',
      'label' => 'Favicon',
      'type' => 'image',
      'default' => '',
      'info' => '',
      'group' => '',
      'localize' => false,
      'options' => 
      array (
      ),
      'width' => '1-4',
      'lst' => true,
      'acl' => 
      array (
      ),
      'required' => true,
    ),
    6 => 
    array (
      'name' => 'primaryColor',
      'label' => 'Primary Farbe',
      'type' => 'color',
      'default' => '',
      'info' => '',
      'group' => 'Theme',
      'localize' => false,
      'options' => 
      array (
      ),
      'width' => '1-4',
      'lst' => true,
      'acl' => 
      array (
      ),
    ),
    7 => 
    array (
      'name' => 'secondaryColor',
      'label' => 'Secondary Farbe',
      'type' => 'color',
      'default' => '',
      'info' => '',
      'group' => 'Theme',
      'localize' => false,
      'options' => 
      array (
      ),
      'width' => '1-4',
      'lst' => true,
      'acl' => 
      array (
      ),
    ),
    8 => 
    array (
      'name' => 'textColor',
      'label' => 'Text Farbe',
      'type' => 'color',
      'default' => '',
      'info' => '',
      'group' => 'Theme',
      'localize' => false,
      'options' => 
      array (
      ),
      'width' => '1-4',
      'lst' => true,
      'acl' => 
      array (
      ),
    ),
    9 => 
    array (
      'name' => 'accentColor',
      'label' => 'Accent Farbe',
      'type' => 'color',
      'default' => '',
      'info' => '',
      'group' => 'Theme',
      'localize' => false,
      'options' => 
      array (
      ),
      'width' => '1-4',
      'lst' => true,
      'acl' => 
      array (
      ),
    ),
  ),
  'data' => NULL,
  '_created' => 1603984709,
  '_modified' => 1606149191,
  'description' => '',
  'acl' => 
  array (
  ),
  'color' => '#4FC1E9',
);