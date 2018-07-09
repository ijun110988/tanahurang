<section class="main-search main-search--absolute">
		<div class="container">
			<div class="main-search__container">
				<section class="listing-search">
					<form action="index.html" method="get" class="listing-search__form">
						<div class="row">
							<div class="col-sm-3">
								<label for="listing-type" class="listing-search__label">Listing Types</label>
								<select name="listing-type" id="listing-type" class="ht-field">
									<option value="All" selected>All Listing Type</option>
									<option value="For Rent">For Rent</option>
									<option value="For Sale">For Sale</option>
									<option value="Open House">Open House</option>
								</select>
							</div><!-- .col -->
			
							<div class="col-sm-3">
								<label for="offer-type" class="listing-search__label">Select Your Propinsi</label>
								<select name="offer-type" id="offer-type" class="ht-field">
									<<option value='0'>All Propinsi</option>
									<?php 
												foreach ($provinsi as $prov) {
												echo "<option value='$prov[id]'>$prov[name]</option>";
									}
									?>
								</select>
							</div><!-- .col -->
			
							<!--<div class="col-sm-3">
								<label for="city" class="listing-search__label">Select Your City</label>
								<select class='form-control' id='kabupaten-kota'>
								<option value='0'>--pilih--</option>
								</select>
							</div><!-- .col -->
			
							<div class="col-sm-3">
								<label for="listing-btn" class="listing-search__label listing-search__label--hidden">Advanced Search</label>
								<a href="#" id="listing-btn" class="listing-search__btn">Advanced Search</a>
							</div><!-- .col -->
						</div><!-- row -->
			
						<div class="listing-search__advance">
							<div class="row">
								<div class="col-sm-3">
									<label for="keywords" class="listing-search__label">Max Price</label>
									<input type="text" id="keywords" class="listing-search__field" placeholder="Max Price...">
								</div><!-- .col -->
			
								<!-- .col -->
			
								<!-- .col -->
			
								<!-- .col --> 
								
								<!-- .col --> 
							</div><!-- .row -->
			
							<!-- .listing-search__more -->
						</div><!-- .listing-search__advance -->
					</form><!-- .listing-search__form -->
				</section><!-- .listing-search -->
			
				<section class="listing-sort">
					<div class="listing-sort__inner">
						<ul class="listing-sort__list">
							<li class="listing-sort__item"><a href="#" class="listing-sort__link"><i class="fa fa-th-list" aria-hidden="true" class="listing-sort__icon"></i></a></li>
							<li class="listing-sort__item"><a href="#" class="listing-sort__link"><i class="fa fa-th" aria-hidden="true" class="listing-sort__icon"></i></a></li>
							<li class="listing-sort__item"><a href="#" class="listing-sort__link listing-sort__link--active"><i class="fa fa-th-large" aria-hidden="true" class="listing-sort__icon"></i></a></li>
						</ul>
			
						<span class="listing-sort__result">1-9 of 25 results</span>
			
						<p class="listing-sort__sort">
							<label for="sort-type" class="listing-sort__label"><i class="fa fa-sort-amount-asc" aria-hidden="true"></i> Sort by </label>
							<select name="sort-type" id="sort-type" class="ht-field listing-sort__field">
								<option value="default">Default</option>
								<option value="low-price">Price (Low to High)</option>
								<option value="high-price">Price (High to Low)</option>
								<option value="featured">Featured</option>
							</select>
						</p>
					</div><!-- .listing-sort__inner -->
				</section><!-- .listing-sort -->
			</div><!-- .main-search__container -->
		</div><!-- .container -->
	</section>