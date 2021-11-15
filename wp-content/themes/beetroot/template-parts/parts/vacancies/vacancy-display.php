<div id="container-async" data-paged="<?= $a['per_page']; ?>"
     class="sc-ajax-filter sc-ajax-filter-multi">

	<div class="input-group">
		<i class="icon-search"><?= file_get_contents( $icon_search ); ?></i>
		<input id="myInput" type="text"
		       placeholder="Search job openings"
		       class="form-control input"
		       aria-label="Text input with dropdown button">
		<div class="input-group-append">
			<button class="btn btn-outline-secondary border-0 dropdown-toggle ps-5"
			        type="button" data-toggle="dropdown"
			        aria-haspopup="true" aria-expanded="false">All
				departments
			</button>
			<div class="dropdown-menu">
				<ul class="nav-filter list-group list-group-horizontal">
					<?php foreach ( $termsC as $term ) : ?>
						<?php if ( $term->taxonomy == 'departments' ): ?>
							<li class="list-group-item p-0 <?php if ( $term->term_id
							                                          == $a['active']
							) : ?> active<?php endif; ?>">
								<a href="<?= get_term_link( $term,
									$term->taxonomy ); ?>"
								   data-filter="<?= $term->taxonomy; ?>"
								   data-term="<?= $term->slug; ?>"
								   data-page="1"
								   class="p-2 d-block">
									<?= $term->name; ?>
								</a>
							</li>
						<?php endif; ?>
					<?php endforeach; ?>
				</ul>
			</div>
		</div>
		<div class="input-group-append">
			<button class="btn btn-outline-secondary border-0 dropdown-toggle ps-5"
			        type="button" data-toggle="dropdown"
			        aria-haspopup="true" aria-expanded="false">All
				locations
			</button>
			<div class="dropdown-menu">
				<ul class="nav-filter list-group list-group-horizontal">
					<?php foreach ( $termsb as $term ) : ?>
						<?php if ( $term->taxonomy == 'locations' ): ?>
							<li class="list-group-item p-0 <?php if ( $term->term_id
							                                          == $a['active']
							) : ?> active<?php endif; ?>">
								<a href="<?= get_term_link( $term,
									$term->taxonomy ); ?>"
								   data-filter="<?= $term->taxonomy; ?>"
								   data-term="<?= $term->slug; ?>"
								   data-page="1"
								   class="p-2 d-block">
									<?= $term->name; ?>
								</a>
							</li>
						<?php endif; ?>
					<?php endforeach; ?>
				</ul>
			</div>
		</div>
	</div>
	<div class="row row__filters my-5">
		<div class="col">
			<ul class="nav-filter list-group list-group-horizontal">
				<li class="list-group-item px-3 py-2 mx-2">
					<a href="#"
					   data-filter="<?= $terms[0]->taxonomy; ?>"
					   data-term="all-terms" data-page="1"
					   class=" d-block">
						Show All
					</a>
				</li>
				<?php foreach ( $terms as $term ) : ?>
					<?php if ( $term->taxonomy != 'locations' ): ?>
						<li class="list-group-item px-3 py-2  mx-2 <?php if ( $term->term_id
						                                                      == $a['active']
						) : ?> active<?php endif; ?>">
							<a href="<?= get_term_link( $term,
								$term->taxonomy ); ?>"
							   data-filter="<?= $term->taxonomy; ?>"
							   data-term="<?= $term->slug; ?>"
							   data-page="1"
							   class="d-block">
								<?= $term->name . ' ' . $term->count ?>
							</a>
						</li>
					<?php endif; ?>
				<?php endforeach; ?>
			</ul>
		</div>
		<div class="col-1 view__buttons">

			<div class="btn-group d-flex align-items-stretch h-100"
			     role="group"
			     aria-label="Basic example">
				<div class="col view__buttons-grid activeView">
					<button type="button" id="vacancies__view-grid"
					        value="grid"
					        class="btn btn-secondary vacancies__view p-0 bg-transparent border-0"><?= file_get_contents( $icon_grid ); ?>
					</button>
				</div>
				<div class="col view__buttons-list">
					<button type="button" id="vacancies__view-list"
					        value="list"
					        class="btn btn-secondary vacancies__view p-0 bg-transparent border-0"><?= file_get_contents( $icon_list ); ?>
					</button>
				</div>
			</div>
		</div>
	</div>
	<div class="content"></div>
</div>