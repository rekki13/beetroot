<?php
?>
<div class="form-group form-files my-3 col">
    <div class="row align-items-center" >
        <div class="col"><?= $args['title'] ?> <?= $args['required']
				? '<span class="required">*</span>' : '' ?></div>
        <div class="col ">
            <label for="inputGroupFile<?= $args['i'] ?>" class="btn p-0">Attach</label>
            <input type="file" class="custom-file-input d-none"
                   id="inputGroupFile<?= $args['i'] ?>"
                   aria-label="" aria-describedby="basic-addon1">
        </div>
		<?php
		foreach ( $args['links'] as $link ):
			?>
            <div class="col ">
                <button class="btn buttonFiles border-0 p-0"
                        type="button"
                        data-placeholder="Enter link for <?= $link ?>">
					<?= $link ?>
                </button>
            </div>
		<?php
		endforeach;
		?>

    </div>
</div>
