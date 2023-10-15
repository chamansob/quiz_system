<?php
$pro1 = Template::findOrFail(1);
$user = Users::count();
$menu = Menus::count();
$module = Module::count();
$slider = Slider::count();
$page = Page::count();
$social = Social::count();
$testimonial = Testimonials::count();


?>

<div class="sidebar-wrapper sidebar-theme">
  <nav id="sidebar">
    <div class="shadow-bottom"></div>
    <ul class="list-unstyled menu-categories" id="accordionExample">
     
      <?php     
      $dashbord_name = "Dashboards";
      $menu_name = "Menu";
      $page_name = "Page";
      $module_name = "Module";      
      $slider_name = "Slider";     
      $social_name = "Social";
      $testimonails_name = "Testimonials";
      $user_name = "User";
      $menu_items = array(
        // Dashboard Menu 
        array(
          'label' => $dashbord_name,
          'link' => '#' . strtolower($dashbord_name),
          'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>',
          'parent_class' => 'list-unstyled menu-categories',
          'parent_id' => 'accordionExample',
          'extra' => 'data-active="true" data-toggle="collapse" aria-expanded="true" class="dropdown-toggle"',
          'children' => array(
            array(
              'label' => 'Login Log',
              'link' =>  TP_BACK_SIDE . 'user/log_history',
              'icon' => '',
              'child_class' => 'collapse submenu list-unstyled show',
              'child_id' => strtolower($dashbord_name),
              'child_extra' => '',
            ),
            array(
              'label' => 'Backup',
              'link' =>  TP_BACK_SIDE . 'template/backnow_history',
              'icon' => '',
              'child_class' => '',
              'child_id' => '',
              'child_extra' => '',
            ),

          )
        ),

        // Menu 
        array(
          'label' => $menu_name,
          'link' => '#' . strtolower($menu_name),
          'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-cpu">
              <rect x="4" y="4" width="16" height="16" rx="2" ry="2"></rect>
              <rect x="9" y="9" width="6" height="6"></rect>
              <line x1="9" y1="1" x2="9" y2="4"></line>
              <line x1="15" y1="1" x2="15" y2="4"></line>
              <line x1="9" y1="20" x2="9" y2="23"></line>
              <line x1="15" y1="20" x2="15" y2="23"></line>
              <line x1="20" y1="9" x2="23" y2="9"></line>
              <line x1="20" y1="14" x2="23" y2="14"></line>
              <line x1="1" y1="9" x2="4" y2="9"></line>
              <line x1="1" y1="14" x2="4" y2="14"></line>
            </svg>',
          'parent_class' => 'list-unstyled menu-categories',
          'parent_id' => 'accordionExample',
          'extra' => 'data-active="true" data-toggle="collapse" aria-expanded="true" class="dropdown-toggle"',
          'children' => array(
            array(
              'label' => 'Add Menu',
              'link' =>  TP_BACK_SIDE . $menu_name . '/add',
              'icon' => '',
              'child_class' => 'collapse submenu list-unstyled',
              'child_id' => strtolower($menu_name),
              'child_extra' => '',
            ),
            array(
              'label' => 'Show ' . $menu_name . '(' . $menu . ')',
              'link' =>  TP_BACK_AD . 'menu.php?act=menu',
              'icon' => '',
              'child_class' => '',
              'child_id' => '',
              'child_extra' => '',
            ), array(
              'label' => 'Add ' . $menu_name . ' Type',
              'link' =>  TP_BACK_SIDE . 'menu_type/add',
              'icon' => '',
              'child_class' => '',
              'child_id' => '',
              'child_extra' => '',
            ), array(
              'label' => 'Show ' . $menu_name . ' Type',
              'link' =>  TP_BACK_SIDE . 'menu_type/show',
              'icon' => '',
              'child_class' => '',
              'child_id' => '',
              'child_extra' => '',
            ),

          )
        ),
        // Page Menu
        array(
          'label' => $page_name,
          'link' => '#' . strtolower($page_name),
          'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-box">
              <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z">
              </path>
              <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
              <line x1="12" y1="22.08" x2="12" y2="12"></line>
            </svg>',
          'parent_class' => 'list-unstyled menu-categories',
          'parent_id' => 'accordionExample',
          'extra' => 'data-active="true" data-toggle="collapse" aria-expanded="true" class="dropdown-toggle"',
          'children' => array(
            array(
              'label' => 'Add ' . ($page_name),
              'link' =>  TP_BACK_SIDE . strtolower($page_name) . '/add',
              'icon' => '',
              'child_class' => 'collapse submenu list-unstyled',
              'child_id' => strtolower($page_name),
              'child_extra' => '',
            ),
            array(
              'label' => 'Show ' . ($page_name) . '(' . $page . ')',
              'link' =>  TP_BACK_SIDE . strtolower($page_name) . '/show',
              'icon' => '',
              'child_class' => '',
              'child_id' => '',
              'child_extra' => '',
            ),

          )
        ), // Module Menu
        array(
          'label' => $module_name,
          'link' => '#' . strtolower($module_name),
          'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layout"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="3" y1="9" x2="21" y2="9"></line><line x1="9" y1="21" x2="9" y2="9"></line></svg>',
          'parent_class' => 'list-unstyled menu-categories',
          'parent_id' => 'accordionExample',
          'extra' => 'data-active="true" data-toggle="collapse" aria-expanded="true" class="dropdown-toggle"',
          'children' => array(
            array(
              'label' => 'Add ' . ($module_name),
              'link' =>  TP_BACK_SIDE . strtolower($module_name) . '/add',
              'icon' => '',
              'child_class' => 'collapse submenu list-unstyled',
              'child_id' => strtolower($module_name),
              'child_extra' => '',
            ),
            array(
              'label' => 'Show ' . ($module_name) . '(' . $module . ')',
              'link' =>  TP_BACK_SIDE . strtolower($module_name) . '/show',
              'icon' => '',
              'child_class' => '',
              'child_id' => '',
              'child_extra' => '',
            ),

          )
        ),
        //Slider Menu
        array(
          'label' => $slider_name,
          'link' => '#' . strtolower($slider_name),
          'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layers"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline></svg>',
          'parent_class' => 'list-unstyled menu-categories',
          'parent_id' => 'accordionExample',
          'extra' => 'data-active="true" data-toggle="collapse" aria-expanded="true" class="dropdown-toggle"',
          'children' => array(
            array(
              'label' => 'Add ' . ($slider_name),
              'link' =>  TP_BACK_SIDE . strtolower($slider_name) . '/add',
              'icon' => '',
              'child_class' => 'collapse submenu list-unstyled',
              'child_id' => strtolower($slider_name),
              'child_extra' => '',
            ),
            array(
              'label' => 'Show ' . ($slider_name) . '(' . $slider . ')',
              'link' =>  TP_BACK_SIDE . strtolower($slider_name) . '/show',
              'icon' => '',
              'child_class' => '',
              'child_id' => '',
              'child_extra' => '',
            ),

          )
        ),
        // Social Menu
        array(
          'label' => $social_name,
          'link' => '#' . strtolower($social_name),
          'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>',
          'parent_class' => 'list-unstyled menu-categories',
          'parent_id' => 'accordionExample',
          'extra' => 'data-active="true" data-toggle="collapse" aria-expanded="true" class="dropdown-toggle"',
          'children' => array(
            array(
              'label' => 'Add ' . ($social_name),
              'link' =>  TP_BACK_SIDE . strtolower($social_name) . '/add',
              'icon' => '',
              'child_class' => 'collapse submenu list-unstyled',
              'child_id' => strtolower($social_name),
              'child_extra' => '',
            ),
            array(
              'label' => 'Show ' . ($social_name) . '(' . $social . ')',
              'link' =>  TP_BACK_SIDE . strtolower($social_name) . '/show',
              'icon' => '',
              'child_class' => '',
              'child_id' => '',
              'child_extra' => '',
            ),

          )
        ),
        array(
          'label' => $testimonails_name,
          'link' => '#' . strtolower($testimonails_name),
          'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-frown"><circle cx="12" cy="12" r="10"></circle><path d="M16 16s-1.5-2-4-2-4 2-4 2"></path><line x1="9" y1="9" x2="9.01" y2="9"></line><line x1="15" y1="9" x2="15.01" y2="9"></line></svg>',
          'parent_class' => 'list-unstyled menu-categories',
          'parent_id' => 'accordionExample',
          'extra' => 'data-active="true" data-toggle="collapse" aria-expanded="true" class="dropdown-toggle"',
          'children' => array(
            array(
              'label' => 'Add ' . ($testimonails_name),
              'link' =>  TP_BACK_SIDE . strtolower($testimonails_name) . '/add',
              'icon' => '',
              'child_class' => 'collapse submenu list-unstyled',
              'child_id' => strtolower($testimonails_name),
              'child_extra' => '',
            ),
            array(
              'label' => 'Show ' . ($testimonails_name) . '(' . $testimonial . ')',
              'link' =>  TP_BACK_SIDE . strtolower($testimonails_name) . '/show',
              'icon' => '',
              'child_class' => '',
              'child_id' => '',
              'child_extra' => '',
            ),

          )
        ),
        //User Menu
        array(
          'label' => $user_name,
          'link' => '#' . strtolower($user_name),
          'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>',
          'parent_class' => 'list-unstyled menu-categories',
          'parent_id' => 'accordionExample',
          'extra' => 'data-active="true" data-toggle="collapse" aria-expanded="true" class="dropdown-toggle"',
          'children' => array(
            array(
              'label' => 'Add ' . ($user_name),
              'link' =>  TP_BACK_SIDE . strtolower($user_name) . 's/add',
              'icon' => '',
              'child_class' => 'collapse submenu list-unstyled',
              'child_id' => strtolower($user_name),
              'child_extra' => '',
            ),
            array(
              'label' => 'Show ' . ($user_name) . '(' . $user . ')',
              'link' =>  TP_BACK_SIDE . strtolower($user_name) . 's/show',
              'icon' => '',
              'child_class' => '',
              'child_id' => '',
              'child_extra' => '',
            ),

          )
        ),
        //Site Settings
        array(
          'label' => 'Site Settings',
          'link' => '',
          'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-settings">
              <circle cx="12" cy="12" r="3"></circle>
              <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z">
              </path>
            </svg>',
          'parent_class' => '',
          'parent_id' => '',
          'extra' => 'aria-expanded="false" class="dropdown-toggle"',
          'children' => ''
        ),
      );
      echo generate_menu($menu_items);

      ?>
    </ul>
  </nav>
</div>