$(document).ready(function(){

    $(document).ready(function(){
        $('.bxslider').bxSlider();
    });

   $('.category').click(function () {
       var down = 'fa fa-arrow-circle-down';
       var right = 'fa fa-arrow-circle-right';
       var span = $(this).find('.arrow').children();
       if($(this).hasClass('black_categories')){
           $('.product').slideUp("slow");
           $(this).next().slideDown("slow");
           $('.category').removeClass('gray_categories');
           $('.category').addClass('black_categories');
           $(this).removeClass('black_categories');
           $(this).addClass('gray_categories')
       }else{
           $(this).next().slideUp("slow");
           $('.category').removeClass('gray_categories');
           $('.category').addClass('black_categories');
       }
       if(span.hasClass(right)){
           $('.category').find('.arrow').children().attr('class', right);
           span.attr('class', down);
       }else{
           span.attr('class', right);
       }
   });

    $('.block').click(function(){
        if(!$(this).hasClass('color_block_active')){
            $('.block').removeClass('color_block_active');
            $('.block').addClass('color_block');
            $(this).addClass('color_block_active');
        }
    });

    $('.left_info').click(function(){
        $('.inner_block_right').hide();
        $('.inner_block_left').show();
    });

    $('.right_info').click(function(){
        $('.inner_block_left').hide();
        $('.inner_block_right').show();
    })

    $('.form').on('beforeSubmit', function() {
        var id = $('.inner_block_left').attr('data-id');
        var data = $(this).serialize() + '&id=' + id;
        console.log(data);
        $.ajax({
            url: '/comments/add',
            type: "POST",
            data: data,
            success: function(res){
                $('.all_comment').append(res);
            }
        })

        return false;
    })

    $('.add-cart').click(function () {
        var parent = $(this).parents();
        var product_id = parent.attr('data-id');
        alert(product_id);
        $.ajax({
            url : "/cart/add",
            data : "product_id=" + product_id,
            type : "POST",
            success : function (res) {
                console.log(res);
            }
        })
    })

    $('.fa-minus').click(function () {
        var div = $(this).parent().parent();
        var id = div.attr('data-id');
        var span_col = div.find('.col');
        if(parseInt(span_col.html()) > 0 ) {
            var col = parseInt(span_col.html()) - 1;
            span_col.text(col);
            $.ajax({
                url: '/cart/sub',
                data: "product_id=" + id,
                type: "POST",
                success: function (res) {
                    var price = res;
                    var span_price = div.find('#price');
                    console.log(span_price);
                    price = parseFloat(span_price.html()) - parseFloat(price);
                    console.log(price);
                    span_price.text(price);
                    var total_price = parseFloat($('.total-price').html());
                    total_price -= parseFloat(res);
                    $('.total-price').text(total_price);
                }
            });
        }
    })

    $('.fa-plus').click(function () {
        var div = $(this).parent().parent();
        var id = div.attr('data-id');
        var span_col = div.find('.col');
        var col = parseInt(span_col.html()) + 1;
        span_col.text(col);
        $.ajax({
            url : '/cart/add',
            data : "product_id=" + id,
            type : "POST",
            success : function (res) {
                var price = res;
                var span_price = div.find('#price');
                console.log(span_price);
                price = parseFloat(span_price.html()) + parseFloat(price);
                console.log(price);
                span_price.text(price);
                var total_price = parseFloat($('.total-price').html());
                total_price += parseFloat(res);
                $('.total-price').text(total_price);

            }
        });
    })

    $('#filter_categories').change(function () {
        var filter = $('#filter_categories').val();
        if(!getFilter(window.location.href)) {
            window.location.href = window.location.href + '&filter=' + filter;
        }else{
            window.location.href = getFilter(window.location.href) + '&filter=' + filter;
        }
    });

    function getFilter(url) {
        var mass = url.split('&');
        if(mass.length < 2){
            return false;
        }else{
            return mass[0];
        }
    }

});