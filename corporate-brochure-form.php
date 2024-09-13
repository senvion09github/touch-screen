<form action="api/ViewPdfApi.php" method="post" class="brochure-form" id="brochure_c_view_form">
    <h2>C Brochure Form</h2>
    <div class="form-group-main">
        <div class="form-group">
            <input type="text" class="form-control" name="name" placeholder="Name:">
			<input type="hidden" class="form-control" name="product" value="corporate-brochure" placeholder="Product:">
        </div>
        <div class="form-group">
            <input class="form-control" name="mobile" placeholder="Phone Number:" type="number">
        </div>
        <div class="form-group">
            <input class="form-control" name="email" placeholder="Email:" type="text">
        </div>
    </div>
    <div class="submit-btn">
        <button id="brochure_view_c_frm-submit" class="submit brochure_downloadfrm-submit enquire-now" type="submit">Submit</button>
    </div>
	<a href="serve_pdf.php?pdf=4" style='display:none' id="lnk_download_brochure_c" target="_blank">View Brochure</a>
</form>