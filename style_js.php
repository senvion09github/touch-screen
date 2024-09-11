<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
<script type="text/javascript" src="assets/js/script09.js"></script> 

<script>
 AOS.init({
        duration: 800,
        once:true,
    });
</script>
<script src="https://www.google.com/recaptcha/api.js?render=6LfrpRYqAAAAAFboLVF_GR6QM2qEZJn_hykGUZcV"></script>
<script type="text/javascript" src="assets/js/jquery-validation/jquery.validate.min.js"></script>
<script type="text/javascript" src="assets/js/jquery-validation/additional-methods.min.js"></script>
<script type="text/javascript" src="api/validationA09.js"></script>

<script>
    document.getElementById('brochure_downloadfrm').addEventListener('submit', function(event) {
        // Optionally, show the link to view the brochure on form submission
        document.getElementById('lnk_download_brochure').style.display = 'block';
        document.getElementById('brochure_download_link').href = document.getElementById('lnk_download_brochure').href;
    });
</script>
