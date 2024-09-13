jQuery(function(s) {
    var e = window.location.href,
        o = s(".main-nav ul li a, .header-nav li a");
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

document.addEventListener('DOMContentLoaded', (event) => {
            console.log('DOM fully loaded and parsed');
            document.querySelectorAll('.tab-link').forEach(link => {
                link.addEventListener('click', function(event) {
                    console.log('Link clicked:', this.href);
                    document.querySelectorAll('.tab-link').forEach(tab => tab.classList.remove('active'));
                    this.classList.add('active');
                });
            });
        });

$(document).ready(function() {
    // Cache the original offset of the .stickynav element
    var productTabOffset = $(".stickynav").offset().top - 70; // Adjust based on your top margin or header

    // On scroll event
    $(window).scroll(function() {
        var scrollTop = $(window).scrollTop();
        var isFixed = $(".stickynav").hasClass("fixed-header1");

        // Apply the fixed-header1 class when scrolling past the cached offset value
        if (scrollTop > productTabOffset && !isFixed) {
            $(".stickynav").addClass("fixed-header1");
        } 
        // Remove the fixed-header1 class when scrolling back above the cached offset value
        else if (scrollTop <= productTabOffset && isFixed) {
            $(".stickynav").removeClass("fixed-header1");
        }
    });
});

