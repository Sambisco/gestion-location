$(document).on("click", "li:has(ul)", function (e) {
    $("ul", this).toggle("slow");
    $(".arrow", this).toggleClass("fa-chevron-up")
})
$(document).on("click", ".desktop", function (e) {
    let sidebar = $(".sidebar");
    console.log(sidebar);
    $(sidebar).toggleClass("close");

})
$(document).on("click", ".mobile", function (e) {
    let sidebar = $(".sidebar");
    console.log(sidebar);
    $(sidebar).toggleClass("showMobile");
})
$(document).on("click", "#header-button-search", function (e) {
    $(".search-box").toggle("slow");
    $(".user-box").hide()
    $(".notification-box").hide();
})
$(document).on('click', '#cart', function (e) {
    $(".tour-panier").show('slow');
})
$(document).on('click', '.btn-close-panier', function (e) {
    $(".tour-panier").hide('slow');
})
$(document).on("click", ".profile", function () {
    $("#deconnect").fadeIn();
    $(".search-box").hide();
})
$(document).on("click", ".show-notification", function () {
    $(".notification-box").toggle("slow");
    $(".search-box").hide();
})
$(document).on("click", "#btn-deconnect", function () {
    window.location = "../controller/deconnect";
})
const productContainers = [...document.querySelectorAll('.navigation_slider')];
const nxtBtn = [...document.querySelectorAll('.nxt-btn_slider')];
const preBtn = [...document.querySelectorAll('.pre-btn_slider')];

productContainers.forEach((item, i) => {
    let containerDimensions = item.getBoundingClientRect();
    let containerWidth = containerDimensions.width;

    nxtBtn[i].addEventListener('click', () => {
        item.scrollLeft += containerWidth;
    })

    preBtn[i].addEventListener('click', () => {
        item.scrollLeft -= containerWidth;
    })
})
jQuery(function ($) {

    $("#btn-modal-ajouter-i").click(function () {
        $(".grand").fadeIn();
    });
    $("#btn-modal-ajouter").click(function () {
        $(".moyen").fadeIn();
    });
    $(".close-modal").click(function () {
        $(".grand").fadeOut();
        $(".moyen").fadeOut();
        $(".petit").fadeOut();
    });
    // バブリングを停止
    $(".overlay-inner").click(function (event) {
        event.stopPropagation();
    });
});


$(document).on("click", ".close-alert-info", function () {
    $('.alert-info').hide();
})


$(window).scroll(function () {
    if ($(this).scrollTop() > 100) {
        $('.scroll-to-top').show().fadeIn();
    } else {
        $('.scroll-to-top').fadeOut().hide();
    }
})
$(document).on("click", ".scroll-to-top", function () {
    $('html, body').animate({ scrollTop: 0 }, 360);
    return false;

})

$(function () {
    $(".content-navigation").draggable();
    $(".content-calendrier").draggable();
});
$(document).on("click", ".active_nav_click", function (e) {
    e.preventDefault()
    $(".active_nav_click").removeClass("active_nav");
    $(this).addClass("active_nav");
})
$(document).on('click', '.toggle-btn1', function (e) {
    $(".nav2").toggleClass("active");
    $(".toggle-btn-close2").toggleClass("fa-times");
})
$(document).on('click', '.toggle-btn3', function (e) {
    $(".nav3").toggleClass("active");
    $(".toggle-btn-close3").toggleClass("fa-times");
})
$('.button-content').click(function () {
    var $this = $(this);
    $('.tabs .active').hide('drop', function () {
        $(this).removeClass('active');
        $('.tabs div:eq(' + $this.index() + ')').show('fade').addClass('active');
    });

});
$(document).on('click', '#button_1', function (e) {
    $('.main-sous-content1').addClass('active-content')
    $('.main-sous-content2').removeClass('active-content')
    $('.main-sous-content3').removeClass('active-content')
})
$(document).on('click', '#button_2', function (e) {
    $('.main-sous-content2').addClass('active-content')
    $('.main-sous-content1').removeClass('active-content')
    $('.main-sous-content3').removeClass('active-content')
})
$(document).on('click', '#button_3', function (e) {
    $('.main-sous-content3').addClass('active-content')
    $('.main-sous-content1').removeClass('active-content')
    $('.main-sous-content2').removeClass('active-content')
})
$(document).on('click', '.open-download1', function (e) {
    $('.download1').toggle("slow");
})
$(document).on('click', '.open-download2', function (e) {
    $('.download2').toggle("slow");
})
$(document).on('click', '.open-download3', function (e) {
    $('.download3').toggle("slow");
})
$(document).on('click', '.open-download4', function (e) {
    $('.download4').toggle("slow");
})
$(document).on('click', '.open-download5', function (e) {
    $('.download5').toggle("slow");
})
$(document).on('click', '.open-download6', function (e) {
    $('.download6').toggle("slow");
})


$(document).on('click', '#tableau1', function (e) {
    $("#tableau1-modal").fadeIn();
});
$(document).on('click', '#tableau2', function (e) {
    $("#tableau2-modal").fadeIn();
});
$(document).on('click', '#tableau3', function (e) {
    $("#tableau3-modal").fadeIn();
});
$(document).on('click', '#tableau4', function (e) {
    $("#tableau4-modal").fadeIn();
});
$(document).on('click', '#tableau5', function (e) {
    $("#tableau5-modal").fadeIn();
});
$(document).on('click', '#tableau6', function (e) {
    $("#tableau6-modal").fadeIn();
});
$(document).on('click', '.calendar', function (e) {
    $('.calendrier').toggleClass("showcalendar")
})
$('#Exportindemnite').click(function () {
    let table = $("#example1").clone();
    console.log(table);
    table.find(".no-export").each(function () {
        $(this).remove();
    });
    TableToExcel.convert(table[0], {
        name: `Demande-Indemnite.xlsx`,
        sheet: {
            name: 'Indemnite'
        }
    });
});
let iconsswitcher = document.querySelector(".icons-switcher");
let colorswitchers = document.querySelector(".color-box");
iconsswitcher.addEventListener("click", () => {
    colorswitchers.classList.toggle("open-switch")
})

let btnswitchers = document.querySelectorAll(".btn-switcher");
for (var btnswitcher of btnswitchers) {
    btnswitcher.addEventListener("click", (e) => {
        let target = e.target;
        let openswitch = document.querySelector(".open-switch");
        if (openswitch) openswitch.classList.remove("open-switch");
        document.querySelector(".active-color").classList.remove("active-color");
        let datacolor = target.getAttribute("data-color");
        if (datacolor == "vert") {
            document.documentElement.classList.add("green");
            document.documentElement.classList.remove("principal");
            document.documentElement.classList.remove("orange");
            document.documentElement.classList.remove("purple");
            window.localStorage.setItem('mode', 'green');
            target.classList.add("active-color");
            checkInputs1()
            get_years()
        } else if (datacolor == "bleu") {
            document.documentElement.classList.add("principal");
            document.documentElement.classList.remove("green");
            document.documentElement.classList.remove("orange");
            document.documentElement.classList.remove("purple");
            window.localStorage.setItem('mode', 'principal');
            target.classList.add("active-color");
            checkInputs1()
            get_years()
        } else if (datacolor == "orange") {
            document.documentElement.classList.add("orange");
            document.documentElement.classList.remove("principal");
            document.documentElement.classList.remove("green");
            document.documentElement.classList.remove("purple");
            window.localStorage.setItem('mode', 'orange');
            target.classList.add("active-color");
            checkInputs1()
            get_years()
        } else if (datacolor == "violet") {
            document.documentElement.classList.add("purple");
            document.documentElement.classList.remove("orange");
            document.documentElement.classList.remove("principal");
            document.documentElement.classList.remove("green");
            window.localStorage.setItem('mode', 'purple');
            target.classList.add("active-color");
            checkInputs1()
            get_years()
        } 
    })
}
const mode = window.localStorage.getItem('mode');
if (mode == "green") {
    document.documentElement.classList.add("green");
    document.documentElement.classList.remove("orange");
    document.documentElement.classList.remove("principal");
    document.documentElement.classList.remove("purple");
    window.localStorage.setItem('mode', 'green');
    document.getElementById("green-switcher").classList.add("active-color");
    document.getElementById("principal").classList.remove("active-color");
    document.getElementById("orange-switcher").classList.remove("active-color");
    document.getElementById("purple-switcher").classList.remove("active-color");
}
if (mode == "principal") {
    document.documentElement.classList.add("principal");
    document.documentElement.classList.remove("green");
    document.documentElement.classList.remove("orange");
    document.documentElement.classList.remove("purple");
    window.localStorage.setItem('mode', 'principal');
    document.getElementById("principal").classList.add("active-color");
    document.getElementById("green-switcher").classList.remove("active-color");
    document.getElementById("orange-switcher").classList.remove("active-color");
    document.getElementById("purple-switcher").classList.remove("active-color");
}
if (mode == "orange") {
    document.documentElement.classList.add("orange");
    document.documentElement.classList.remove("green");
    document.documentElement.classList.remove("principal");
    document.documentElement.classList.remove("purple");
    window.localStorage.setItem('mode', 'orange');
    document.getElementById("orange-switcher").classList.add("active-color");
    document.getElementById("green-switcher").classList.remove("active-color");
    document.getElementById("principal").classList.remove("active-color");
    document.getElementById("purple-switcher").classList.remove("active-color");

}
if (mode == "purple") {
    document.documentElement.classList.add("purple")
    document.documentElement.classList.remove("orange")
    document.documentElement.classList.remove("green")
    document.documentElement.classList.remove("principal")
    window.localStorage.setItem('mode', 'purple');
    document.getElementById("purple-switcher").classList.add("active-color");
    document.getElementById("orange-switcher").classList.remove("active-color");
    document.getElementById("green-switcher").classList.remove("active-color");
    document.getElementById("principal").classList.remove("active-color");

}
const pages = document.getElementsByClassName("page");

for (var i = 0; i < pages.length; i++){
	var page = pages[i];
	if (i % 2 === 0) {
		page.style.zIndex = (pages.length - i);
	}
}
document.addEventListener("DOMContentLoaded", function () {
	
})
