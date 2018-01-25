$(document).on('click', '.pag-right', function (event) {
    event.preventDefault();
    var page = $('.pag-right').attr('data-page');
    $.ajax({
        url: ajaxpagination.ajaxurl,
        type: 'post',
        data: {
            action: 'pagination',
            page: page
        },
        success: function (result) {
            var parse_result = $.parseJSON(result);
            if(parse_result === 'NPS') {
                $('.card').append('<h4>No posts found</h4>');
                $('.pag-right').hide();
            } else {
                var elem = [];
                $.each(parse_result, function (i, l) {
                    var temp_item = getItemElement(l);
                    elem.push(temp_item);
                });
                var $elem = $( elem );
                $('.card-section').append( $elem );
                $('.pag-right').attr('data-page', page + 1);
            }
        }
    });
    function getItemElement(item) {
        var elem = document.createElement('div');
        elem.setAttribute("class", "card");
        var inner_html = '<div class="card-img">'+ item[0] +'</div><div class="card-caption"><p>'+ item[1] +'</p><p>'+ item[2] +'</p><div class="soc-network"><ul><li><a href="#"><i class="facebook"></i>'+ item[3] +'</a></li><li><a href="#"><i class="twitter"></i>'+ item[4] +'</a></li><li><a href="#"><i class="google-plus"></i>'+ item[5] +'</a></li></ul></div></div>';
        elem.innerHTML = inner_html;

        return elem;
    }
});

$(document).on('click', '.pag-left', function (event) {
    event.preventDefault();
    var page = $('.pag-left').attr('data-page');
    $.ajax({
        url: ajaxpagination.ajaxurl,
        type: 'post',
        data: {
            action: 'pagination',
            page: page
        },
        success: function (result) {
            var parse_result = $.parseJSON(result);
            if (parse_result === 'NPS') {
                $('.card').append('<h4>No posts found</h4>');
                $('.pag-left').hide();
            } else {
                var elem = [];
                $.each(parse_result, function (i, l) {
                    var temp_item = getItemElement(l);
                    elem.push(temp_item);
                });
                var $elem = $(elem);
                $('.card-section').append($elem);
                $('.pag-left').attr('data-page', page + 1);
            }
        }
    });
    function getItemElement(item) {
        $('.card').remove();
    }
});