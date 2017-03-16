<?php

class pluta_Customize_Textarea_Control extends WP_Customize_Control {
	
	public $type = 'textarea';
	public function render_content() {
		
		echo '<label>';
			echo '<span class="customize-control-title">' . esc_html( $this-> label ) . '</span>';
			echo '<textarea rows="2" style ="width: 100%;"';
			$this->link();
			echo '>' . esc_textarea( $this->value() ) . '</textarea>';
		echo '</label>';
		
	}
}	