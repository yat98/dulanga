$(document).ready(function(){
    $('.lazy').lazyload({effect : "fadeIn"});
    if($('.blog').length > 2){
        $('.blog').addClass('col-lg-3');
        $('.blog').eq(1).removeClass('ml-lg-5').addClass('mx-lg-5').addClass('genap');
        $('.blog').eq(4).addClass('mx-lg-5').addClass('genap');
    } else{
        $('.blog').eq(1).addClass('ml-lg-5');
        $('.blog').addClass('col-lg');
    }

    let link = "http://localhost/dulanga/kegiatan";
    let linkKegiatan = link+'/detail';
    let linkKontak = "http://localhost/dulanga/kritik";
    let hrefLocation = window.location.href;

    if(hrefLocation.includes(linkKegiatan)){
        $('.kegiatan-scroll').addClass('active');
    }
    
    $('.page-scroll').on('click',function(e){
        if($('.page-scroll').hasClass('active')){
            $('.page-scroll').removeClass('active');
        }
        let tujuan = $(this).attr('href');
        let element = $(tujuan);
        let footer = $('.footer-scroll').attr('href');
        $(this).addClass('active');
        if(tujuan == footer){
            $('html,body').animate({
                scrollTop: element.offset().top + 150
            },1000);
        }else{
            $('html,body').animate({
                scrollTop: element.offset().top - 50
            },1000);
        }
        e.preventDefault();
    });

    $('.scroll-up').on('click',function(){
        let tujuan = $(this).attr('scroll-target');
        let element = $(tujuan);
        $('html,body').animate({
            scrollTop: element.offset().top - 150
        },1000);
    });

    // RESIZE
    let mediaQuery = window.matchMedia("(max-width: 991px)");
    $(window).on('resize',function(){
        if(window.outerWidth <= 991){
            $('.navbar-landing').removeClass('hilang-atas'); 
        }else{
            $('.navbar-landing').addClass('hilang-atas');
            if($('.navbar-landing').hasClass('muncul-atas')) {
                $('.navbar-landing').removeClass('muncul-atas'); 
            }
        }
    });

    // LOAD EVENT
    $(window).on('load',function(){
        setTimeout(function(){
            $('#header h3').addClass('muncul-atas');
        },400);
        setTimeout(function(){
            $('#header h1').addClass('muncul-atas');
        },500);
        setTimeout(function(){
            $('#header hr').addClass('muncul-atas');
        },600);
        setTimeout(function(){
            $('#header img').addClass('muncul-atas');
        },200);
        setTimeout(function(){
            $('.border-gradient-header').css({
                'transition':'2s',
                'opacity':1
            });
        },2000)
        if(mediaQuery.matches){
            $('.navbar-landing').removeClass('hilang-atas'); 
        }else{
            $('.navbar-landing').addClass('hilang-atas'); 
        }
        
        if(hrefLocation.includes(link)){
            element = $('#kegiatan');
            $('html,body').animate({
                scrollTop: element.offset().top - 80
            },1000);
            $('.home-scroll').removeClass('active');
            $('.kegiatan-scroll').addClass('active');
        }

        if(hrefLocation==linkKontak){
            $('.home-scroll').removeClass('active');
            $('.footer-scroll').addClass('active');
            element = $('#footer');
            $('html,body').animate({
                scrollTop: element.offset().top + 180
            },1000);
        }
    });

    // SCROLL EVENT
    $(window).scroll(function(){
        let jarakScroll = $(this).scrollTop();
        let opacity = 1;

        // navbar-landing & HEADER
        if(jarakScroll > $('#header').offset().top + 100){
            opacity-=0.4;
            $('#header h1').css({
                'opacity':opacity,
                'transform':'translate(0px,'+jarakScroll/4+'px)'
            });
            $('#header h3').css({
                'opacity':opacity,
                'transform':'translate(0px,'+jarakScroll/5+'px)'
            });
            $('#header img').css({
                'opacity':opacity,
                'transform':'translate(0px,'+jarakScroll/2+'px)'
            });
            $('#header hr').css({
                'transform':'translate(0px,'+jarakScroll/3+'px)',
                'opacity':opacity
            });
        }else{
            $('#header h1').css({
                'opacity':1,
                'transform':'translate(0px,0px)'

            });
            $('#header h3').css({
                'opacity':1,
                'transform':'translate(0px,0px)'

            });
            $('#header img').css({
                'opacity':1,
                'transform':'translate(0px,0px)'
            });
            $('#header hr').css({
                'opacity':1,
                'transform':'translate(0px,0px)'
            });
        }

        if(jarakScroll > $('#header').offset().top + 300){
           $('.navbar-landing').addClass('muncul-atas');
        }else{
           if(!mediaQuery.matches){
                $('.navbar-landing').removeClass('muncul-atas'); 
           }
        }

        // VIDEO
        if(jarakScroll > $('#gallery').offset().top - 220){
            $('#gallery .video').addClass('muncul-atas');
        }else{
            $('#gallery .video').removeClass('muncul-atas');
        }

        // SEJARAH
        if(jarakScroll > $('#sejarah').offset().top - 220){
            $('#gallery .video').removeClass('muncul-atas');
            $('#sejarah .col-lg-6').addClass('muncul-kiri-rotate');
            $('#sejarah .col-lg-4').addClass('muncul-kanan-rotate');
        
        }else{
            $('#sejarah .col-lg-4').removeClass('muncul-kanan-rotate');
            $('#sejarah .col-lg-6').removeClass('muncul-kiri-rotate');
        }

        // KEGIATAN
        if(jarakScroll > $('#kegiatan').offset().top - 400){
            $('#sejarah .col-lg-4').removeClass('muncul-kanan-rotate');
            $('#sejarah .col-lg-6').removeClass('muncul-kiri-rotate');
            $('#kegiatan h2').addClass('muncul-atas');
            $('#kegiatan .cari').addClass('muncul-atas');
            $('#kegiatan .blog').each(function(i){
                setTimeout(function(){
                    $('#kegiatan .blog').eq(i).addClass('muncul');
                },600*i);
                $('#kegiatan .paging').addClass('muncul');
            });
            
        }else{
            $('#kegiatan h2').removeClass('muncul-atas');         
            $('#kegiatan .cari').removeClass('muncul-atas');
            $('#kegiatan .blog').each(function(i){
                $('#kegiatan .paging').addClass('muncul');
            });
        }

        // TESTIMONI
        if(jarakScroll > $('#testimoni').offset().top - 390){
            $('#testimoni .caption').addClass('muncul-atas');
            $('#testimoni .image').addClass('muncul');
            $('#testimoni .desc').addClass('muncul-bawah');
        }else{
            $('#testimoni .caption').removeClass('muncul-atas');
            $('#testimoni .image').removeClass('muncul');
            $('#testimoni .desc').removeClass('muncul-bawah');
        }

        // FOOTER
        if(jarakScroll > $('#footer').offset().top - 190){
            $('#footer .profil').addClass('muncul-kiri');
            $('#footer .fast-link').addClass('muncul');
            $('#footer .kritik').addClass('muncul-kanan');
            setTimeout(function(){
                $('.footer-last .copyright').addClass('muncul-bawah');
            },1000);
        }else{
            $('#footer .profil').removeClass('muncul-kiri');
            $('#footer .fast-link').removeClass('muncul');
            $('#footer .kritik').removeClass('muncul-kanan');
            setTimeout(function(){
                $('.footer-last .copyright').removeClass('muncul-bawah');
            },500);
        }

        // SCROLL UP
        if((jarakScroll > $('#gallery').offset().top + 800)){
            $('.scroll-up').addClass('muncul-bawah');
        }else{
            $('.scroll-up').removeClass('muncul-bawah');
        }

        if(jarakScroll > $('#footer').offset().top - 60){
            $('.scroll-up').css({
                'bottom':'70px'
            });
        } else{
            $('.scroll-up').css({
                'bottom':'10px'
            });
        }
    });

    // TESTIMONI
    $('.testimoni-img').click(function(){
        $('.testimoni-img').each(function(i){
            if($('.testimoni-img').eq(i).hasClass('besar')){
                $('.testimoni-img').eq(i).removeClass('besar').addClass('kecil');
                $('.caption-text').eq(i).addClass('d-none');
                $('.user').eq(i).addClass('d-none');
            }
        });
        let i = $('.testimoni-img').index(this);
        $('.caption-text').eq(i).removeClass('d-none');
        $('.user').eq(i).removeClass('d-none');
        $(this).addClass('besar').removeClass('kecil');
    });
});