<script type="text/javascript">
    $(function() {
        /* 文章页点击图片预览 */
        $("#markdown img").each(function(i, item) {
            $(item).addClass("lazyload");
            $(item).attr("data-original", $(item).attr("src"));
            $(item).attr("src", "<?php $this->options->themeUrl('assets/img/lazyload.jpg'); ?>")
            $(item).on("click", function() {
                $(".j-preview").addClass("active")
                $('body').css("overflow", "hidden")
                $(".j-preview img").attr("src", $(item).attr("data-original"))
            })
        })

        /* 归档按顺序依次进入 */
        function isOnScreen(el) {
            var win = $(window);
            var viewport = {
                top: win.scrollTop(),
                left: win.scrollLeft()
            };
            viewport.right = viewport.left + win.width();
            viewport.bottom = viewport.top + win.height();
            var bounds = el.offset();
            bounds.right = bounds.left + el.outerWidth();
            bounds.bottom = bounds.top + el.outerHeight();
            return (!(viewport.right < bounds.left || viewport.left > bounds.right || viewport.bottom < bounds.top || viewport.top > bounds.bottom));
        }

        $(".timeline li").each((i, item) => {
            if (isOnScreen($(item))) {
                $(item).find("a").addClass("active")
            } else {
                $(item).find("a").removeClass("active")
            }
        })

        $(window).on("scroll", function() {
            $(".timeline li").each((i, item) => {
                if (isOnScreen($(item))) {
                    $(item).find("a").addClass("active")
                } else {
                    $(item).find("a").removeClass("active")
                }
            })
        })









        /* 点击关闭图片预览 */
        $(".j-preview").on("click", function() {
            $(this).removeClass("active")
            $('body').css("overflow", "")
        })


        /* 点击按钮显示弹框 */
        $('.headDrop').on('click', function(e) {
            e.stopPropagation();
            $(".headDropdown").removeClass("active");
            $(this).siblings(".headDropdown").addClass('active');
        })


        /* 弹框内点击禁止事件冒泡 */
        $('.headDropdown').on('click', function(e) {
            e.stopPropagation();
        });


        /* 搜索框没有内容时禁止搜素 */
        $('#search').on('submit', function(e) {
            if ($('#search input').val().trim() === '') {
                e.preventDefault();
            }
        });


        /* 登录框没有内容时禁止登录 */
        $('#loginBox').on('submit', function(e) {
            if ($('#userName').val().trim() === '') {
                return e.preventDefault();
            }
            if ($('#passWord').val().trim() === '') {
                return e.preventDefault();
            }
        });


        /* 文章详情页标题打字机效果 */
        if ($("#postTitle").length > 0) {
            let str = $('#postTitleHtml').html();
            let timer = null;
            let i = 0;
            let typing = () => {
                if (i <= str.length) {
                    $('#postTitle').html(str.slice(0, i++) + '_');
                    timer = setTimeout(typing, 100);
                } else {
                    $('#postTitle').html(str);
                    clearTimeout(timer);
                }
            }
            typing();
        }

        /* 输入QQ号时候的验证 */
        $("#comment-qq").on("input", function() {
            let val = $(this).val()
            $(this).val(val.replace(/[^0-9]/g, ''));
            if (/\d{5,11}/.test(val)) {
                $("#comment-mail").val(val + "@qq.com")
                $("#comment-avatar").attr("src", "//q.qlogo.cn/g?b=qq&nk=" + val + "&s=100")
            } else {
                $("#comment-mail").val("")
                $("#comment-avatar").attr("src", "<?php $this->options->themeUrl('assets/img/nouser.png'); ?>")
            }
        })

        /* 评论验证 */
        $("#comment").on("submit", function(e) {
            if ($("#comment-nick").val().trim() === "") {
                e.preventDefault()
                return alert("请输入昵称")
            }
            if ($("#comment-content").val().trim() === "") {
                e.preventDefault()
                return alert("请输入内容")
            }
            if (!/\d{5,11}/.test($("#comment-qq").val())) {
                e.preventDefault()
                return alert("请输入正确的QQ")
            }
        })

        /* 页面点击事件类 */
        $(document).on('click', function(e) {
            $(".headDropdown").removeClass("active")
            if ($('#picker').length > 0) {
                $('#picker').removeClass('active');
            }
        });


        /* 图片懒加载 */
        $(".lazyload").lazyload({
            effect: "fadeIn"
        });
    })
</script>