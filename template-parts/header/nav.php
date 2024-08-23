<?php
/**
 * Header Navigation Menu
 * 
 * @package Aquila
 */

//  call the object here
 $menu_class = \AQUILA_THEME\Inc\Menus::get_instance();

//  create a variable and call the function which argument is menu location means the id store in the varable
 $header_menu_id = $menu_class->get_menu_id('aquila-header-menu');

//  we have a function to Retrieves/get all menu items.
 $header_menus = wp_get_nav_menu_items($header_menu_id);

?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <?php 
    // use the function to display the custom logo on the frontend
      if ( function_exists( 'the_custom_logo' ) ) {
        the_custom_logo();
      }
  ?>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <?php
      /**
       * Check the condition if not empty and is array exectue the loop and check menus in parent is not empty then call a function to
       * get child items in the $child_menu_item variable
      */
      if( !empty($header_menus) && is_array($header_menus) ) {
      ?>
      <ul class="navbar-nav mr-auto">
        <?php
          foreach( $header_menus as $menu_item ) {
              if(!$menu_item->menu_item_parent) {

                $child_menu_item = $menu_class->get_child_menu_items($header_menus, $menu_item->ID);

              // Want to check the menu has child or not we created a variable and check not empty and it has array then child items aviable in varable
                $has_children = !empty($child_menu_item) && is_array($child_menu_item);

              // Check if the variable does not have childern then show this type of structure 
                if( ! $has_children) {
                    ?>
                    <!-- The values display by dynamic in my parent item -->
                    <li class="nav-item">
                      <a class="nav-link" href="<?php echo esc_url( $menu_item->url ); ?>">
                        <?php echo esc_html( $menu_item->title) ; ?>
                      </a>
                    </li>
                    <?php
                } else {
                    ?>
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="<?php echo esc_url( $menu_item->url ); ?>" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php echo esc_html( $menu_item->title) ; ?>
                      </a>
                      <!-- This is my child menus display their value by dynamic and using loop though because we alrady have chile menu item -->
                      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <?php
                          foreach($child_menu_item as $child_menu_item) {
                            ?>
                              <a class="dropdown-item" href="<?php echo esc_url( $child_menu_item->url ); ?>">
                              <?php echo esc_html( $child_menu_item->title) ; ?>
                              </a>
                            <?php
                          }
                          ?>
                      </div>
                    </li>
                    <?php
                    }
                  ?>
                  <?php 
              }   
            }
          ?>
        </ul>
        <?php
      }
    ?>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
