<header id="header" class="stickynav09">

<div class="header_fixed">

  <div class="container">

  <div class="row">

            <div class="col-12 p-0">

                <nav class="main-nav">

                  <div class="logo"><a href="index.php">

                  <img src="assets/images/logo.jpg" alt="">

                    </a>

                    </div>

                    <!-- ***** Logo End ***** -->

                    <!-- ***** Menu Start ***** -->
                    <div class="header-nav">
                    <ul>

        <li><a class="nav-link" href="index.php">Home</a></li>


        <li class="dropdown"><a><span>Products</span> <i class="fa-solid fa-chevron-down"></i></a>

       <ul class="header-nav">
              <li><a href="2m-series.php">2.7M130</a></li>
            <li><a href="3m-series.php">3.1M130</a></li>
            <li><a href="4m-series.php">4.2M160</a></li>
            

          </ul>

        </li>

          <li class="dropdown"><a><span>Services</span> <i class="fa-solid fa-chevron-down"></i></a>

       <ul class="header-nav">

            <li><a href="operations-and-maintenance.php">O & M</a></li>
            <li><a href="fleetpro.php">FleetPro</a></li>
          </ul>

        </li>

        <li><a class="nav-link" href="index.php#manufacturing">Manufacturing</a></li>          

        <li><a class="nav-link" href="index.php#contact">Contact</a></li>

      </ul>
    
   <!--  <a class='menu-trigger'>
    <span></span>
    </a> -->
  </div>
    <!-- ***** Menu End ***** -->
     </nav>

    </div>
   </div>
</div>

</div>

</header>



<script type="text/javascript">
  document.addEventListener('DOMContentLoaded', function () {
    const dropdownLinks = document.querySelectorAll('.dropdown > a');
    const dropdownItems = document.querySelectorAll('.dropdown');

    dropdownLinks.forEach(dropdownLink => {
      dropdownLink.addEventListener('click', function (event) {
        event.preventDefault();
        const parentLi = this.parentElement;
        dropdownItems.forEach(item => {
          if (item !== parentLi && !item.contains(parentLi)) {
            item.classList.remove('active09');
          }
        });
        parentLi.classList.toggle('active09');
      });
    });
  });
</script>

