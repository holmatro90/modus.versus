<?php

add_action('init', 'register_post_types');
function register_post_types(){
register_post_type('services', array(
'labels' => array(
'name' => __( 'Services' ),
'singular_name' => __( 'Service' ),
'add_new'            => 'Add new services', // для добавления новой записи
'add_new_item'       => 'Add new service', // заголовка у вновь создаваемой записи в админ-панели.
'edit_item'          => 'Edit service', // для редактирования типа записи
'new_item'           => 'New service', // текст новой записи
'view_item'          => '', // для просмотра записи этого типа.

),
'description'         => '',
'public'              => true,
'publicly_queryable'  => true,
'exclude_from_search' => true,
'show_ui'             => true,
'show_in_menu'        => true, // показывать ли в меню адмнки
'show_in_admin_bar'   => true, // по умолчанию значение show_in_menu
'show_in_nav_menus'   => null,
'show_in_rest'        => true, // добавить в REST API. C WP 4.7
'rest_base'           => null, // $post_type. C WP 4.7
'menu_position'       => null,
'menu_icon'           => 'dashicons-groups',
'capability_type'   => 'post',
//'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
//'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
'hierarchical'        => false,
'supports'            => array('title','editor','custom-fields'), // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
'taxonomies'          => array('services'),
'has_archive'         => false,
'rewrite'             => true,
'query_var'           => true,
) );
}


add_action('init', 'create_taxonomy');
function create_taxonomy(){
// заголовки
// весь список: http://wp-kama.ru/function/get_taxonomy_labels
$labels = array(
'name'              => 'Services',
'singular_name'     => 'Service',
'search_items'      => 'Search Services',
'all_items'         => 'All Services',
'parent_item'       => 'Parent Service',
'parent_item_colon' => 'Parent Service:',
'edit_item'         => 'Edit Service',
'update_item'       => 'Update Service',
'add_new_item'      => 'Add New Service',
'new_item_name'     => 'New Service Name',
'menu_name'         => 'Service',
);
// параметры
$args = array(
'label'                 => '', // определяется параметром $labels->name
'labels'                => $labels,
'description'           => '', // описание таксономии
'public'                => true,
'hierarchical'          => false,
'update_count_callback' => '',
'rewrite'               => true,
//'query_var'             => $taxonomy, // название параметра запроса
'capabilities'          => array(),
'meta_box_cb'           => null, // callback функция. Отвечает за html код метабокса (с версии 3.8): post_categories_meta_box или post_tags_meta_box. Если указать false, то метабокс будет отключен вообще
'show_admin_column'     => false, // Позволить или нет авто-создание колонки таксономии в таблице ассоциированного типа записи. (с версии 3.5)
'_builtin'              => false,
'show_in_quick_edit'    => null, // по умолчанию значение show_ui
);
register_taxonomy('taxonomy', array('post'), $args );
}
