$(function () {
    if (localStorage.getItem('j-show')) {
        $('.j-tab li').each((i, item) => {
            if ($(item).attr('data-show') == localStorage.getItem('j-show')) {
                $(item).addClass('active');
            }
        });
        $('.' + localStorage.getItem('j-show')).show();
    } else {
        $('.j-tab li').first().addClass('active');
        $('.j-global').show();
    }

    $('.j-tab li').on('click', function () {
        localStorage.setItem('j-show', $(this).attr('data-show'));
        $('.j-tab li').removeClass('active');
        $(this).addClass('active');

        $('.j-content').hide();
        $('.' + $(this).attr('data-show')).show();
    });
    $('.j-content input').prop('autocomplete', 'off');
});
