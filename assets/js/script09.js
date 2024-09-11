jQuery(function(s) {
    var e = window.location.href,
        o = s(".main-nav ul li a, .navMenu-nav li a, .one-page-nav ul li a");
    o.each(function() {
        this.href === e && (s(this).addClass("active"), s(this).closest("li").addClass("active"))
    }), o.on("click", function() {
        o.removeClass("active").closest("li").removeClass("active"), s(this).addClass("active").closest("li").addClass("active")
    })
});

const dropdownOpener = $(".main-nav ul.nav .has-sub > a");
$(".menu-trigger").length && $(".menu-trigger").on("click", function() {
    $(this).toggleClass("active"), $(".main-nav ul").slideToggle(200)
}), $(".second-menu-trigger").length && $(".second-menu-trigger").on("click", function() {
    $(this).toggleClass("active"), $(".one-page-nav ul").slideToggle(200)
});
var btn = $("#go_top");
$(window).scroll(function() {
    $(window).scrollTop() > 300 ? btn.addClass("show") : btn.removeClass("show")
}), btn.on("click", function(s) {
    s.preventDefault(), $("html, body").animate({
        scrollTop: 0
    }, "300")
});


$(document).ready(function() {
    $('.product-tab .tab-list li a').click(function(e) {
        e.preventDefault();

        // Remove active class from all tabs
        $('.product-tab .tab-list li').removeClass('active');
        
        // Add active class to clicked tab
        $(this).parent().addClass('active');

        // Hide all tab content
        $('.tab-content .tab-pane').removeClass('active');
        
        // Show corresponding tab content
        var target = $(this).attr('href');
        $(target).addClass('active');
    });
});


document.addEventListener("DOMContentLoaded", function() {
    document.querySelectorAll(".collapsible-trigger-btn").forEach(s => {
        s.addEventListener("click", function() {
            let s = this.parentElement,
                e = s.classList.contains("collapsible-tab__open");
            if (document.querySelectorAll(".collapsibles-wrapper").forEach(s => {
                    s.classList.remove("collapsible-tab__open"), s.querySelector(".collapsible-content").style.maxHeight = null
                }), !e) {
                s.classList.add("collapsible-tab__open");
                let o = s.querySelector(".collapsible-content");
                o.style.maxHeight = o.scrollHeight + "px"
            }
        })
    })
})


$(document).ready(function() {
    $('.tab-list li').on('click', function(e) {
        e.preventDefault();
        $('.tab-list li').removeClass('active');
        $(this).addClass('active');
        var targetPage = $(this).find('a').attr('href');
        $.ajax({
            url: targetPage,
            success: function(response) {
                $('.tab-content').html($(response).find('.tab-content').html());
            },
            error: function() {
                alert('Failed to load content');
            }
        });
    });
});

