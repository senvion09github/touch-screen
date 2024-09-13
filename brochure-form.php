<form action="api/ViewPdfApi.php" method="post" class="brochure-form" id="brochure_view_form">
    <h2>Brochure Form</h2>
    <div class="form-group-main">
            <div class="form-group">
                <input type="text" class="form-control" name="name" placeholder="Name:">
                <input type="hidden" class="form-control" id="product" name="product" placeholder="Product:">
            </div>
            <div class="form-group">
                <input class="form-control" name="mobile" placeholder="Phone Number:" type="number">
            </div>
            <div class="form-group">
                <input class="form-control" name="email" placeholder="Email:" type="text">
            </div>
    </div>
    <div class="submit-btn">
        <button id="brochure_viewfrm-submit" class="submit brochure_downloadfrm-submit enquire-now" type="submit">Submit</button>
    </div>
	<a href="serve_pdf.php?pdf=1" style='display:none' id="lnk_download_brochure1" target="_blank">View Brochure</a>
	<a href="serve_pdf.php?pdf=2" style='display:none' id="lnk_download_brochure2" target="_blank">View Brochure</a>
	<a href="serve_pdf.php?pdf=3" style='display:none' id="lnk_download_brochure3" target="_blank">View Brochure</a>
</form>