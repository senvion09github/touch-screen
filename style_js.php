<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/all.min.js"></script>
<script src="assets/js/aos.js"></script>
<script src="assets/js/jquery.fancybox.min.js"></script>
<script src="assets/js/jquery.fancybox.js"></script>
<script type="text/javascript" src="assets/js/script09.js"></script> 

<script>
 AOS.init({
        duration: 800,
        once:true,
    });
</script>
<!-- <script src="https://www.google.com/recaptcha/api.js?render=6LciE0IqAAAAANSrZkBw6KTAWupQmRStrwnH60oQ"></script> -->
<script type="text/javascript" src="assets/js/jquery-validation/jquery.validate.min.js"></script>
<script type="text/javascript" src="assets/js/jquery-validation/additional-methods.min.js"></script>
<script type="text/javascript" src="api/validationA09.js"></script>

<script>
    document.getElementById('brochure_downloadfrm').addEventListener('submit', function(event) {
        // Optionally, show the link to view the brochure on form submission
        document.getElementById('lnk_download_brochure').style.display = 'block';
        document.getElementById('brochure_download_link').href = document.getElementById('lnk_download_brochure').href;
    });

    // Extract the path from the URL
    const path = window.location.pathname;
    // Split the path into segments
    const pathSegments = path.split('/');
    // Get the last segment (e.g., "2m-series.php")
    const lastSegment = pathSegments[pathSegments.length - 1];
    // Remove the ".php" extension to get just "2m-series"
    const inputValue = lastSegment.replace('.php', '');
    // Set the value in the desired input field (replace '#yourInputId' with the actual ID of your input)
    var inputVal = '';
    console.log(inputValue);
    if (inputValue == '2-7m130') {
        var inputVal = '2.7M130';
    } else if(inputValue == '3-1m130') {
        var inputVal = '3.1M130';
    } else if(inputValue == '4-2m160') {
        var inputVal = '4.2M130';
    } else if(inputValue == '2-3m120') {
        var inputVal = '2.3M130';
    } else if(inputValue == 'operations-and-maintenance') {
        var inputVal = 'oandm';
    } else if(inputValue == 'fleetpro') {
        var inputVal = 'fleetpro';
    }
    document.querySelector('#product').value = inputVal;

</script>
