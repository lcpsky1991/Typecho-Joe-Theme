$(function () {
    /* 懒加载图片 */
    $('img').lazyload();
    /* 初始化天气 */
    WIDGET = {
        CONFIG: {
            layout: 2,
            width: '250',
            height: '270',
            background: 1,
            dataColor: 'FFFFFF',
            key: 'utmgXFwjn6'
        }
    };
    /* 判断是否需要显示返回顶部按钮 */
    showBackTop();
    $(window).on('scroll', function () {
        showBackTop();
    });
    function showBackTop() {
        if ($(window).scrollTop() > 500) {
            $('#backtop').css('transform', 'scale(1)');
        } else {
            $('#backtop').css('transform', 'scale(0)');
        }
    }
    /* 评论无缝滚动 */
    new ScrollText('replyList', '', '', true, 50, true);
    /* 屏蔽右键 */
    $(document).on('contextmenu', function () {
        return false;
    });
    /* 返回顶部点击事件 */
    $('#backtop').on('click', function () {
        $('html,body').stop().animate({ scrollTop: 0 }, 300);
    });
    /* 点击清空搜索输入框内容 */
    $('#clearInputIcon').on('click', function () {
        $('#searchInput').val('');
        $(this).css('transform', 'scale(0)');
    });
    /* 输入框输入显示隐藏清空图标 */
    $('#searchInput').on('input', function () {
        if ($(this).val().trim() !== '') {
            $('#clearInputIcon').css('transform', 'scale(1)');
        } else {
            $('#clearInputIcon').css('transform', 'scale(0)');
        }
    });
    /* 输入框为空时禁止提交 */
    $('#searchForm').on('submit', function (e) {
        if ($('#searchInput').val().trim() === '') {
            e.preventDefault();
        }
    });
    /* 标签云 */
    var entries = Array.from($('#cloudList li')).map(_ => {
        return {
            label: $(_).attr('data-label'),
            url: $(_).attr('data-url')
        };
    });
    var settings = {
        entries: entries,
        width: 250,
        height: 250,
        radius: '65%',
        radiusMin: 75,
        bgDraw: true,
        bgColor: '#303133',
        opacityOver: 1.0,
        opacityOut: 0.05,
        opacitySpeed: 6,
        fov: 800,
        speed: 0.5,
        fontSize: '14',
        fontColor: '#fff',
        fontWeight: '500',
        fontStyle: 'normal',
        fontStretch: 'normal',
        fontToUpperCase: true
    };
    $('#cloud').svg3DTagCloud(settings);

    /* 检查用户名 */
    function checkAuthor() {
        if ($('#author').val().trim() === '') {
            $('#author').addClass('error');
            $('#author').next().html('请输入昵称！');
            $('#author').next().css('opacity', '1');
        } else if ($('#author').val().length < 2 || $('#author').val().length > 16) {
            $('#author').addClass('error');
            $('#author').next().html('请输入2 ~ 16个字符的昵称！');
            $('#author').next().css('opacity', '1');
        } else {
            $('#author').removeClass('error');
            $('#author').next().css('opacity', '0');
        }
    }
    /* 检查邮箱 */
    function checkMail() {
        if ($('#mail').val().trim() === '') {
            $('#mail').addClass('error');
            $('#mail').next().html('请输入邮箱！');
            $('#mail').next().css('opacity', '1');
        } else if (!/^\w+@qq\.com$/.test($('#mail').val())) {
            $('#mail').addClass('error');
            $('#mail').next().html('请输入正确的邮箱！');
            $('#mail').next().css('opacity', '1');
        } else {
            $('#mail').removeClass('error');
            $('#mail').next().css('opacity', '0');
        }
    }
    /* 检查输入框 */
    function checkTextarea() {
        if ($('#textarea').val().trim() === '') {
            $('#textarea').addClass('error');
            $('#textarea').next().html('请输入评论内容！');
            $('#textarea').next().css('opacity', '1');
        } else {
            $('#textarea').removeClass('error');
            $('#textarea').next().css('opacity', '0');
        }
    }
    $('#author').on('input', function () {
        checkAuthor();
    });
    $('#mail').on('input', function () {
        checkMail();
    });
    $('#textarea').on('input', function () {
        checkTextarea();
    });
    $('#comment-form').on('submit', function (e) {
        checkAuthor();
        checkMail();
        checkTextarea();
        if ($('#author').hasClass('error') || $('#mail').hasClass('error') || $('#textarea').hasClass('error')) {
            e.preventDefault();
        }
    });

    let _guiDangLis = $('#timeline .item li');
    Array.from(_guiDangLis).forEach((item, index) => {
        setTimeout(() => {
            $(item).addClass('fadeIn');
        }, 100 * index);
    });
});
