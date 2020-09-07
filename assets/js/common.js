$(function () {
    /* 导航栏分类点击显示隐藏下拉框 */
    $('#j-dropdown').on('click', function (e) {
        e.stopPropagation();
        $(this).toggleClass('active');
    });

    /* 点击页面关闭下拉框 */
    $(document).on('click', function () {
        $('#j-dropdown').removeClass('active');
    });

    /* 侧边栏标签云 依赖 svg3dtagcloud.min.js */
    if ($('#cloudList').length > 0) {
        let entries = Array.from($('#cloudList li')).map(item => {
            return {
                label: $(item).attr('data-label'),
                url: $(item).attr('data-url')
            };
        });
        $('#cloud').svg3DTagCloud({
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
        });
    }

    /* 侧边栏评论无缝滚动 依赖scrollText.min.js */
    if ($('#replyList').length > 0) {
        new ScrollText('replyList', '', '', true, 50, true);
    }

    /* 图片懒加载 依赖footer.php里的、jquery.lazyLoad.min.js */
    $('.lazyLoad').lazyload();

    /* 详情页打字机效果 */
    if ($('#mainTitle').length > 0) {
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
    }

    /* 评论区验证 */
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
    function checkMail() {
        if ($('#mail').val().trim() === '') {
            $('#mail').addClass('error');
            $('#mail').next().html('请输入邮箱！');
            $('#mail').next().css('opacity', '1');
            $('#commentAvatar').css('transform', 'scale(0)');
        } else if (!/^\w+@qq\.com$/.test($('#mail').val())) {
            $('#mail').addClass('error');
            $('#mail').next().html('请输入正确的邮箱！');
            $('#mail').next().css('opacity', '1');
            $('#commentAvatar').css('transform', 'scale(0)');
        } else {
            $('#mail').removeClass('error');
            $('#mail').next().css('opacity', '0');
            $('#commentAvatar').attr('src', 'http://q2.qlogo.cn/g?b=qq&nk=' + $('#mail').val() + '&s=100');
            $('#commentAvatar').css('transform', 'scale(1)');
        }
    }
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
    $('#author').on('input', () => checkAuthor());
    $('#mail').on('input', () => checkMail());
    $('#textarea').on('input', () => checkTextarea());
    $('#comment-form').on('submit', function (e) {
        checkAuthor();
        checkMail();
        checkTextarea();
        if ($('#author').hasClass('error') || $('#mail').hasClass('error') || $('#textarea').hasClass('error')) {
            e.preventDefault();
        }
    });

    /* 分页当前页禁止他点击 */
    $('.joe-pagination .active a').on('click', function (e) {
        e.preventDefault();
    });

    /* 归档列表依次进入 */
    if ($('#timeline').length > 0) {
        let guiDangLis = $('#timeline .item li');
        Array.from(guiDangLis).forEach((item, index) => {
            setTimeout(() => {
                $(item).addClass('fadeIn');
            }, 100 * index);
        });
    }

    /* 判断是否需要显示返回顶部按钮 */
    function showBackTop() {
        /* 当页面滚动大于了500px的时候就显示返回顶部按钮 */
        if ($(window).scrollTop() > 500) $('#backtop').css('transform', 'scale(1)');
        else $('#backtop').css('transform', 'scale(0)');
    }

    /* 点击返回顶部按钮后，页面带有动画的滚上去 （300 滚动时间，时间为毫秒） */
    $('#backtop').on('click', function () {
        $('html,body').stop().animate({ scrollTop: 0 }, 300);
    });

    if ($('#backtop').length > 0) {
        /* 页面第一次进来时候就调用判断一次 */
        showBackTop();
        /* 页面上下滚动的时候判断 */
        $(window).on('scroll', () => showBackTop());
    }

    /* 设置markdown里面的内容链接为新标签页打开 */
    if ($('#markdown').length > 0) {
        $('#markdown a').each((i, item) => {
            $(item).attr('target', '_balnk');
        });
    }

    /* 详情页面监听滚动了多少 */
    if ($('.joe-progress').length > 0) {
        $(document).scroll(function () {
            let scrollAmount = $(window).scrollTop();
            let documentHeight = $(document).height();
            let windowHeight = $(window).height();
            let scrollPercent = (scrollAmount / (documentHeight - windowHeight)) * 100;
            $('.joe-progress').css('width', scrollPercent + '%');
        });
    }

    /* 点击清空搜索输入框内容 */
    $('#clearInputIcon').on('click', function () {
        $('#searchInput').val('');
        $('#clearInputIcon').css('transform', 'scale(0)');
    });

    /* 输入框输入显示隐藏清空图标 */
    $('#searchInput').on('input', function () {
        if ($('#searchInput').val().trim() !== '') $('#clearInputIcon').css('transform', 'scale(1)');
        else $('#clearInputIcon').css('transform', 'scale(0)');
    });

    /* 输入框为空时禁止提交 */
    $('#searchForm').on('submit', function (e) {
        if ($('#searchInput').val().trim() === '') e.preventDefault();
    });

    $(document).on('click', '#live2dcanvas', function () {
        console.log($('#live2dcanvas'));
    });

    /* 显示/隐藏 弹幕 */
    $('#barrage').on('click', function () {
        $(this).toggleClass('close');
        let barrageLists = $('.joe-barrage');
        barrageLists.each(function (index, item) {
            if ($('#barrage').hasClass('close')) {
                $(item).css({
                    opacity: 0,
                    visibility: 'hidden'
                });
            } else {
                $(item).css({
                    opacity: 1,
                    visibility: 'visible'
                });
            }
        });
    });
});
