<div class="form-group col-12 my-3">
    <label for="userMessage" class="position-label"><?= $args['placeholder'] ?>
        <?= $args['required']
				? '<span class="required">*</span>' : '' ?>
    </label>
    <textarea name="userMessage" id="" cols="30" rows="2"
              class="w-100 border-top-0 border-end-0 border-start-0 rounded-0 form-control"
          <?= $args['required']
	          ? 'required' : '' ?>></textarea>
</div>