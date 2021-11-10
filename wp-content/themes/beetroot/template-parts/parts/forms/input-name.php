<div class="form-group col my-3">
    <label for="userEmail" class="position-label"><?= $args['placeholder'] ?>
	    <?= $args['required']
		    ? '<span class="required">*</span>' : '' ?>
    </label>
    <input type="text" class="form-control border-top-0 border-end-0 border-start-0 border-bottom rounded-0" id="userFirstName"
           <?= $args['required']
		? 'required' : '' ?>>
</div>