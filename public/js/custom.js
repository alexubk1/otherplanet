$(document).ready(function(){
    var pathArray = window.location.pathname;

    $(window).scroll(function () {
            var sc = $(window).scrollTop();

            if ($(window).width() > 991) {
                if (sc > 750) {
                    $('.sidenav').css('position', 'fixed');
                    if (!window.location.href.indexOf("album") > -1) {
                        $('.dot-h1').css('margin-top', '45px');
                        $('.grid').css('margin-top', '180px');
                    }
                }
                else {
                    $('.sidenav').css('position', 'sticky');
                    $('.grid').css('margin-top', '0');
                    $('.dot-h1').css('margin-top', '0');
                }

                if (sc > 700) {
                    $('.navbar').css('display', 'none');
                }
                else {
                    $('.navbar').css('display', 'block');
                }
            }
        });

        var $grid = $('.grid').masonry({
        itemSelector: '.grid-item',
        percentPosition: true,
        columnWidth: '.grid-sizer',
        gutter: '.gutter-sizer'
    });

    // Get the modal
    var modal = document.getElementById("myModal");

// Get the image and insert it inside the modal - use its "alt" text as a caption
    var modalImg = document.getElementById("img01");
    var captionText = document.getElementById("caption");

    var imageThis = '';
    var relativeX = '';
    var relativeY = '';
    var offset    = '';

    $('.img-show').on('click', function(){
         imageThis = $(this);
         modal.style.display = "block";
         modalImg.src = $(this).prop('src');
         //captionText.innerHTML = $(this).prop('alt');
    });

    $('.child-left').hover(function () {
        $(this).awesomeCursor('arrow-left', {
            color:'white',
            size:'80px'
        });

        $('.child-left').on('click', function() {
            var image = imageThis;
            var image = image.closest('.grid-item').prev().find('img');
            if (image.prop('src') == undefined) {
                image = $('.grid-item:last').find('img');
            }
            modal.style.display = "block";
            modalImg.src = image.prop('src');
            //captionText.innerHTML = image.prop('alt');
            imageThis = image;
        });
    });

    $('.child-right').hover(function () {
        $(this).awesomeCursor('arrow-right', {
            color:'white',
            size:'80px'
        });

        $('.child-right').on('click', function() {
            var image = imageThis;
            var image = image.closest('.grid-item').next().find('img');
            if (image.prop('src') == undefined) {
                image = $('.grid-item:first').find('img');
            }
            modal.style.display = "block";
            modalImg.src = image.prop('src');
            //captionText.innerHTML = image.prop('alt');
            imageThis = image;
                });
    });

    $('.child-top').hover(function () {
        $(this).awesomeCursor('fas fa-th', {
            color:'white',
            size:'60px'
        });
        // When the user clicks on <span> (x), close the modal
        $('.child-top').on('click', function () {
            modal.style.display = "none";
        });
    });


    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }
});

