<?php
 return array (
  'name' => 'pages',
  'label' => 'Seiten',
  '_id' => 'Pages',
  'fields' => 
  array (
    0 => 
    array (
      'name' => 'metaTitle',
      'label' => 'Meta-Title',
      'type' => 'text',
      'default' => '',
      'info' => '',
      'group' => 'Meta-Information',
      'localize' => true,
      'options' => 
      array (
      ),
      'width' => '1-1',
      'lst' => false,
      'acl' => 
      array (
      ),
      'required' => false,
    ),
    1 => 
    array (
      'name' => 'metaDescription',
      'label' => 'Meta-Description',
      'type' => 'text',
      'default' => '',
      'info' => '',
      'group' => 'Meta-Information',
      'localize' => true,
      'options' => 
      array (
      ),
      'width' => '1-1',
      'lst' => false,
      'acl' => 
      array (
      ),
      'required' => false,
    ),
    2 => 
    array (
      'name' => 'indexable',
      'label' => 'Für Suchmaschinen veröffentlichen',
      'type' => 'boolean',
      'default' => '',
      'info' => '',
      'group' => 'Meta-Information',
      'localize' => false,
      'options' => 
      array (
        'default' => true,
      ),
      'width' => '1-1',
      'lst' => false,
      'acl' => 
      array (
      ),
    ),
    3 => 
    array (
      'name' => 'title',
      'label' => '',
      'type' => 'text',
      'default' => '',
      'info' => '',
      'group' => '',
      'localize' => true,
      'options' => 
      array (
        'slug' => true,
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
      'name' => 'url',
      'label' => 'Url-Slug',
      'type' => 'text',
      'default' => '',
      'info' => 'Wenn nichts hinterlegt ist, wird der Titel verwendet.',
      'group' => '',
      'localize' => false,
      'options' => 
      array (
      ),
      'width' => '1-2',
      'lst' => false,
      'acl' => 
      array (
      ),
      'required' => false,
    ),
    5 => 
    array (
      'name' => 'published',
      'label' => 'Published',
      'type' => 'boolean',
      'default' => '',
      'info' => 'Seite veröffentlichen',
      'group' => '',
      'localize' => false,
      'options' => 
      array (
      ),
      'width' => '1-2',
      'lst' => true,
      'acl' => 
      array (
      ),
    ),
    6 => 
    array (
      'name' => 'menu',
      'label' => 'Menü',
      'type' => 'set',
      'default' => '',
      'info' => 'In welchem Menü soll die Seite angezeigt werden',
      'group' => '',
      'localize' => false,
      'options' => 
      array (
        'fields' => 
        array (
          0 => 
          array (
            'name' => 'header',
            'type' => 'boolean',
          ),
          1 => 
          array (
            'name' => 'footer',
            'type' => 'boolean',
          ),
        ),
      ),
      'width' => '1-2',
      'lst' => false,
      'acl' => 
      array (
      ),
    ),
    7 => 
    array (
      'name' => 'subPages',
      'label' => 'Unterseiten',
      'type' => 'collectionlink',
      'default' => '',
      'info' => '',
      'group' => 'Unterseiten',
      'localize' => false,
      'options' => 
      array (
        'link' => 'subpages',
        'display' => 'Unterseiten',
        'multiple' => true,
        'limit' => false,
      ),
      'width' => '1-1',
      'lst' => false,
      'acl' => 
      array (
      ),
    ),
    8 => 
    array (
      'name' => 'components',
      'label' => 'Elemente',
      'type' => 'layout',
      'default' => '',
      'info' => '',
      'group' => 'Content',
      'localize' => true,
      'options' => 
      array (
      ),
      'width' => '1-1',
      'lst' => false,
      'acl' => 
      array (
      ),
      'required' => true,
    ),
  ),
  'sortable' => true,
  'in_menu' => false,
  '_created' => 1603983467,
  '_modified' => 1604409791,
  'color' => '#FFCE54',
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
  'icon' => '',
  'contentpreview' => 
  array (
    'enabled' => true,
    'url' => 'http://localhost:3000/preview',
  ),
);