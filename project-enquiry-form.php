<div class="project-form-main">
	<form action="api/downloadApi.php" method="post" class="brochure_download-form" id="brochure_downloadfrm">
		<h2>Have a project?<br>
		Let's make something great together!</h2>
		<div class="form-main">
			<div class="form-group">
				<input type="text" class="form-control" name="name" placeholder="Name:">
			</div>
			<div class="form-group">
				<input type="text" class="form-control" name="company_name" placeholder="Company Name:">
			</div>
			<div class="form-group">
			<input class="form-control" name="mobile" placeholder="Phone Number:" type="number">
			</div>
			<div class="form-group">
			<input class="form-control" name="email" placeholder="Email:" type="text">
			</div>
			</div>
			<div class="FormGridS1">
			<div class="form-group">
			<textarea class="form-control textarea" placeholder="Message:" type="text" name="message"></textarea>
			</div>
				</div>
			<div class="submit-btn">
			<button id="brochure_downloadfrm-submit" class="submit brochure_downloadfrm-submit enquire-now" type="submit">Submit</button>
		</div>
	</form>
	<p>We are always looking for talented individuals to join our team. If you would like to work with us send your cv to <a href="mailto:retech-hr@senvion.in">retech-hr@senvion.in</a></p>
</div>

<div class="brochure-form-main">
	<img src="assets/images/brochure-img.jpg">
	<div class="brochure-text">
		<h2>Let's drive<br>the future<br>of clean energy,<br>together!</h2>
	</div>
	<div class="brochure-link">
		<a data-fancybox data-src="#brochure-form" href="javascript:;">
  Download Brochure <i class="fa-solid fa-arrow-down"></i>
</a>
	</div>
</div>



<div class="brochure-main" style="display: none;" id="brochure-form">
    <div class="fancybox-content">
      <?php include 'brochure-form.php' ?>
    </div>
</div>