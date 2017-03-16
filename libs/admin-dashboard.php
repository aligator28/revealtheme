<?php
function reveal_add_editor_styles() {
  add_editor_style( 'css/admin.css' );
}
add_action( 'current_screen', 'reveal_add_editor_styles' );


function reveal_load_custom_wp_admin_style() {
        wp_register_script( 'custom_wp_admin_js', get_template_directory_uri() . '/js/admin-js.js', array('jquery') );
        wp_enqueue_script( 'custom_wp_admin_js' );
}
add_action( 'admin_enqueue_scripts', 'reveal_load_custom_wp_admin_style' );


add_action('admin_head', 'reveal_admin_custom_fonts');

function reveal_admin_custom_fonts() {
  echo "<style>
#section-reveal_category_slides_on_front_page {
  display: none;
}

#setting-error-tgmpa {
  background: #FEE0E0;
}

#menu-posts-slides,
#menu-posts-features,
#menu-posts-overviews,
#menu-posts-questions,
#menu-appearance .wp-submenu.wp-submenu-wrap a[href=\"themes.php?page=options-framework\"] {
	background-color: #650202;
  border-top: 2px solid #fefefe !important;
}
#optionsframework {
	max-width: 80%;
}
#optionsframework .group .section:nth-child(2n + 2) {
	background-color: #FDE5E5;
}
#optionsframework .group .section {
	padding: 10px 20px;
	font-size: 18px;
}
#optionsframework .group .section .controls label,
#optionsframework .group .section .option div {
	font-size: 14px;
	color: #000;
	line-height: 1.5;
}


#optionsframework .checkbox {
  vertical-align: top;
  margin: 0 3px 0 0;
  width: 17px;
  height: 17px;
}
#optionsframework .checkbox + label {
  cursor: pointer;
}


#optionsframework .checkbox:not(checked) {
  position: absolute;
  opacity: 0;
}
#optionsframework .checkbox:not(checked) + label {
  position: relative; 
  padding: 0 0 0 60px; 
}
#optionsframework .checkbox:not(checked) + label:before {
  content: '';
  position: absolute;
  top: -4px;
  left: 0;
  width: 50px;
  height: 26px;
  border-radius: 13px;
  background: #CDD1DA;
  box-shadow: inset 0 2px 3px rgba(0,0,0,.2);
}
#optionsframework .checkbox:not(checked) + label:after {
  content: '';
  position: absolute;
  top: -2px;
  left: 2px;
  width: 22px;
  height: 22px;
  border-radius: 10px;
  background: #FFF;
  box-shadow: 0 2px 5px rgba(0,0,0,.3);
  transition: all .2s; 
}
#optionsframework .checkbox:checked + label:before {
  background: darkred;
}
#optionsframework .checkbox:checked + label:after {
  left: 26px;
}
#optionsframework .checkbox:focus + label:before {
  box-shadow: 0 0 1px 2px rgba(128,0,0,.5);
}

#optionsframework .button {
	color: #fff;
	background-color: darkred;
	border-color: darkred;
}

  </style>
  ";

}
?>