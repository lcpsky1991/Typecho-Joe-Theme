$(function () {
    /* 设置markdown里面的内容链接为新标签页打开 */
    $('#markdown a').each((i, item) => {
        $(item).attr('target', '_balnk');
    });

    /* 初始化弹幕 */
    let item = Array.from($('#commentList ol li')).map(_ => {
        return {
            info: $(_).find('.comment-content p').html()
        };
    });
    item.forEach(item => $('body').barrager(item));

    /* 监听页面滚动了多少 */
    $(document).scroll(function (e) {
        var scrollAmount = $(window).scrollTop();
        var documentHeight = $(document).height();
        var windowHeight = $(window).height();
        var scrollPercent = (scrollAmount / (documentHeight - windowHeight)) * 100;
        $('#j-progress').css('width', scrollPercent + '%');
    });

    let str = $('#mainTitle').html();
    let timer = null;
    let i = 0;
    typing();
    $('#mainTitle').css('fontSize', '28px');
    function typing() {
        if (i <= str.length) {
            $('#mainTitle').html(str.slice(0, i++) + '_');
            timer = setTimeout(typing, 100);
        } else {
            $('#mainTitle').html(str);
            clearTimeout(timer);
        }
    }
});
