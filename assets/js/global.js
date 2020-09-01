$(() => {
    /* <1> 图片懒加载 依赖footer.php里的、jquery.lazyLoad.min.js */
    $('.lazyLoad').lazyload();

    /* <2> 判断是否需要显示返回顶部按钮 */
    function showBackTop() {
        /* 当页面滚动大于了500px的时候就显示返回顶部按钮 */
        if ($(window).scrollTop() > 500) $('#backtop').css('transform', 'scale(1)');
        /* 否则不显示 */ else $('#backtop').css('transform', 'scale(0)');
    }
    /* 页面第一次进来时候就调用判断一次 */
    showBackTop();
    /* 页面上下滚动的时候判断 */
    $(window).on('scroll', () => showBackTop());
    /* 点击返回顶部按钮后，页面带有动画的滚上去 （300 滚动时间，时间为毫秒） */
    $('#backtop').on('click', () => $('html,body').stop().animate({ scrollTop: 0 }, 300));

    /* <3> 侧边栏评论无缝滚动 依赖scrollText.min.js */
    if ($('#replyList').length > 0) {
        new ScrollText('replyList', '', '', true, 50, true);
    }

    /* 点击分类 弹出下拉框 */
    $('#headerCate').on('click', function (event) {
        event.stopPropagation();
        if ($('#headerCateSubmenu').hasClass('active')) {
            $('#headerCateSubmenu').removeClass('active');
        } else {
            $('#headerCateSubmenu').addClass('active');
        }
    });

    /* 页面点击事件 */
    $(document).on('click', function () {
        $('#headerCateSubmenu').removeClass('active');
    });

    /* <5> 侧边栏标签云 依赖svg3dtagcloud.js */
    if ($('#cloudList').length > 0) {
        let entries = Array.from($('#cloudList li')).map(_ => {
            return {
                label: $(_).attr('data-label'),
                url: $(_).attr('data-url')
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

    /* <6> 点击清空搜索输入框内容 */
    $('#clearInputIcon').on('click', function () {
        $('#searchInput').val('');
        $('#clearInputIcon').css('transform', 'scale(0)');
    });

    /* <7> 输入框输入显示隐藏清空图标 */
    $('#searchInput').on('input', function () {
        if ($('#searchInput').val().trim() !== '') $('#clearInputIcon').css('transform', 'scale(1)');
        else $('#clearInputIcon').css('transform', 'scale(0)');
    });

    /* <8> 输入框为空时禁止提交 */
    $('#searchForm').on('submit', function (e) {
        if ($('#searchInput').val().trim() === '') e.preventDefault();
    });

    /* <9> 归档列表依次进入 */
    if ($('#timeline').length > 0) {
        let guiDangLis = $('#timeline .item li');
        Array.from(guiDangLis).forEach((item, index) => {
            setTimeout(() => {
                $(item).addClass('fadeIn');
            }, 100 * index);
        });
    }

    /* <10> 评论区验证 */
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

    /* <11> 设置markdown里面的内容链接为新标签页打开 */
    if ($('#markdown').length > 0) {
        $('#markdown a').each((i, item) => {
            $(item).attr('target', '_balnk');
        });
    }

    /* <12> 初始化弹幕 依赖barrager.min.js */
    if ($('#commentList').length > 0) {
        let item = Array.from($('#commentList ol li')).map(_ => {
            return {
                info: $(_).find('.comment-content p').html()
            };
        });
        item.forEach(item => $('body').barrager(item));
    }

    /* <15> 详情页面监听滚动了多少 */
    if ($('#j-progress').length > 0) {
        $(document).scroll(function () {
            let scrollAmount = $(window).scrollTop();
            let documentHeight = $(document).height();
            let windowHeight = $(window).height();
            let scrollPercent = (scrollAmount / (documentHeight - windowHeight)) * 100;
            $('#j-progress').css('width', scrollPercent + '%');
        });
    }

    /* <16> 详情页打字机效果 */
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

    /* <6> 屏蔽右键按钮 */
    $(document).on('contextmenu', function () {
        return false;
    });
});
