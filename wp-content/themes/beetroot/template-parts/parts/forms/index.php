<?php

$i = 0;

if ( have_rows( 'content', get_the_ID() ) ):
	// Loop through rows.
	?>
    <form class="position-form form">

		<?php
		while ( have_rows( 'content', get_the_ID() ) ) : the_row();

			// Case: Paragraph layout.
			if ( get_row_layout() == 'position' ):
				$form = get_sub_field( 'form_content' );
				echo( '<div class="row mb-4">' );
				foreach ( $form as $items ):

					$params = [
						'i' =>$i,
						'title' => $items['title'],
						'placeholder' => $items['placeholder'],
						'required'    => $items['required'],
                        'links' =>$items['links'],
					];

					switch ( $items['acf_fc_layout'] ):
						case  'name';
							get_template_part( 'template-parts/parts/forms/input',
								'name', $params
							);
							break;
						case 'last';
							get_template_part( 'template-parts/parts/forms/input',
								'last', $params );
							break;
						case 'email';
							get_template_part( 'template-parts/parts/forms/input',
								'email', $params );
							break;
						case 'phone';
							get_template_part( 'template-parts/parts/forms/input',
								'phone', $params );
							break;
						case 'message';
							get_template_part( 'template-parts/parts/forms/textarea',
								'message', $params );
							break;
							case 'files';
							get_template_part( 'template-parts/parts/forms/input',
								'files', $params );
							break;
					endswitch;
					$i ++;
				endforeach;
				echo( '</div>' );

			endif;
		endwhile;
		?>

        <div class="p-0 form-check my-3">
            <input type="checkbox" class="btn-check form-check-input d-none" id="btncheck1" autocomplete="off" required>
            <label class="border form-check-label btn-outline-primary btn" for="btncheck1"></label>
            <label  for="btncheck1" class="form-check-label-text">
                I agree with Beetroot’s <a href="#"><span class="required">Privacy Policy</span></a> and saving data in compliance with Swedish law.
            </label>
        </div>
        <div class="p-0 form-check my-3">
            <input type="checkbox" class="btn-check form-check-input d-none" id="btncheck2" autocomplete="off" required>
            <label class="border form-check-label btn-outline-primary btn" for="btncheck2"></label>
            <label  for="btncheck2" class="form-check-label-text">
                Contact me with job offers in the future.            </label>
        </div>
        <button type="submit" class="btn submit text-white"><span><?= __('Apply now')?></span></button>

    </form>
<?php
endif;

