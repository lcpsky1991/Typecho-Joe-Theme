<script type="text/javascript">
    $(function() {
        /* 取随机数的函数 */
        function random(t, n) {
            return Math.floor(Math.random() * (n - t + 1)) + t
        }

        /* 判断元素是否在当前视图窗口内 */
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

        /* 文章页点击图片预览 */
        if ($("#markdown").length > 0) {
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
        }

        /* 全局弹窗提示 */
        function JNotification(str) {
            if ($(".j-notification").hasClass("active")) return
            $(".j-notification").html(str)
            $(".j-notification").addClass("active")
            setTimeout(function() {
                $(".j-notification").removeClass("active")
            }, 2000)
        }



        /* 归档 */
        if ($(".timeline").length > 0) {

            /* 归档 - 如果在窗口内 则显示 */
            $(".timeline li").each((i, item) => {
                if (isOnScreen($(item))) {
                    $(item).find("a").addClass("active")
                } else {
                    $(item).find("a").removeClass("active")
                }
            })
            /* 鼠标滚动在调用一次 */
            $(window).on("scroll", function() {
                $(".timeline li").each((i, item) => {
                    if (isOnScreen($(item))) {
                        $(item).find("a").addClass("active")
                    } else {
                        $(item).find("a").removeClass("active")
                    }
                })
            })
        }


        /* 点击关闭图片预览 */
        $(".j-preview").on("click", function() {
            $(this).removeClass("active")
            $('body').css("overflow", "")
        })


        /* 头部点击出现下拉选项 */
        if ($(".headDrop").length > 0) {
            $('.headDrop').on('click', function(e) {
                e.stopPropagation();
                if ($(this).siblings(".headDropdown").hasClass('active')) {
                    $(this).siblings(".headDropdown").removeClass('active');
                } else {
                    $(".headDropdown").removeClass("active");
                    $(this).siblings(".headDropdown").addClass('active');
                }
            })
            /* 弹框内点击禁止事件冒泡 */
            $('.headDropdown').on('click', function(e) {
                e.stopPropagation();
            });
        }


        if ($("#search").length > 0) {
            /* 搜索框没有内容时禁止搜素 */
            $('#search').on('submit', function(e) {
                if ($('#search input').val().trim() === '') {
                    e.preventDefault();
                }
            });
        }


        if ($("#loginBox").length > 0) {
            /* 登录框没有内容时禁止登录 */
            $('#loginBox').on('submit', function(e) {
                if ($('#userName').val().trim() === '') {
                    return e.preventDefault();
                }
                if ($('#passWord').val().trim() === '') {
                    return e.preventDefault();
                }
            });
        }



        /* 留言 */
        if ($("#leavingList").length > 0) {
            let isDown = false;
            let x = 0;
            let y = 0;
            let positionX = 0;
            let positionY = 0;
            let moveItem = null;
            let zIndex = 1000
            $("#leavingList li").each(function(i, item) {
                let str = $(item).find(".content p").html()
                if (/\{!\{.*\}!\}/.test(str)) {
                    str = str.match(/{!{.*}!}/)[0].replace(/{!{/, "").replace(/}!}/, "")
                    $(item).find(".content").html(`<img class="canvas" src="${str}" />`)
                } else {
                    $(item).find(".content p").html(str)
                }
                $(item).css({
                    "z-index": random(1, 99),
                    "background-color": `rgba(${random(0, 255)}, ${random(0, 255)}, ${random(0, 255)}, ${random(0.8, 1)})`,
                    top: parseInt(Math.random() * ($("#leavingList").height() - $(item).height()), 10),
                    left: parseInt(Math.random() * ($("#leavingList").width() - $(item).width()), 10),
                    display: "flex"
                })
                $(item).on("mousedown", function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    isDown = true;
                    moveItem = $(this);
                    x = e.pageX;
                    y = e.pageY;
                    positionX = $(this).position().left;
                    positionY = $(this).position().top;
                    $(item).css("z-index", zIndex)
                    zIndex++
                    return false;
                })
            })

            $(document).on("mouseup", function(e) {
                isDown = false;
            })

            $(document).on("mousemove", function(e) {
                let xPage = e.pageX;
                let moveX = positionX + xPage - x;

                let yPage = e.pageY;
                let moveY = positionY + yPage - y;

                if (isDown == true) {
                    $(moveItem).css({
                        left: moveX,
                        top: moveY
                    });
                } else {
                    return
                }
                if (moveX < 0) {
                    $(moveItem).css({
                        left: 0
                    });
                }
                if (moveX > $("#leavingList").width() - $(moveItem).width()) {
                    $(moveItem).css({
                        left: $("#leavingList").width() - $(moveItem).width()
                    });
                }
                if (moveY < 0) {
                    $(moveItem).css({
                        top: 0
                    });
                }
                if (moveY > $("#leavingList").height() - $(moveItem).height()) {
                    $(moveItem).css({
                        top: $("#leavingList").height() - $(moveItem).height()
                    });
                }
            })
        }



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
            $(this).val($(this).val().replace(/[^0-9]/g, ''));
            if (/\d{5,11}/.test($(this).val())) {
                $("#comment-mail").val($(this).val() + "@qq.com")
                $("#comment-avatar").attr("src", "//q.qlogo.cn/g?b=qq&nk=" + $(this).val() + "&s=100")
            } else {
                $("#comment-mail").val("")
                $("#comment-avatar").attr("src", "<?php $this->options->themeUrl('assets/img/nouser.png'); ?>")
            }
        })

        /* 切换按钮 */
        $("#commentTypeContent canvas").prop("width", $("#commentTypeContent").width())
        $("#commentTypeContent canvas").prop("height", 250)
        $("#commentType button").on("click", function() {
            $("#commentType button").removeClass("active")
            $(this).addClass("active")
            if ($(this).attr("data-type") === "canvas") {
                $("#commentTypeContent canvas").prop("width", $("#commentTypeContent").width())
                $("#commentTypeContent textarea").hide()
                $("#commentTypeContent .canvas").show()
                $("#commentTypeContent .canvas").attr("data-type", "canvas")
            } else {
                $("#commentTypeContent textarea").show()
                $("#commentTypeContent .canvas").hide()
                $("#commentTypeContent .canvas").attr("data-type", "text")
            }
        })

        $(".j-comments .meta a").on("click", function() {
            $("#commentTypeContent canvas").prop("width", $("#commentTypeContent").width())
        })

        $("#comment-form .foot .right a").on("click", function() {
            $("#commentTypeContent canvas").prop("width", $("#commentTypeContent").width())
        })


        /* 格式化侧边栏图片评论 */
        if ($("#asideReply").length > 0) {
            $("#asideReply a").each(function(i, item) {
                let str = $(item).html()
                if (/\{!\{.*/.test(str)) {
                    $(item).html("# 图片回复")
                } else {
                    $(item).html(str)
                }
                $(item).css("display", "-webkit-box")
            })
        }

        /* 判断是否是canvas图片 */
        $(".replyContent p").each(function(i, item) {
            let str = $(item).html()
            if (/\{!\{.*\}!\}/.test(str)) {
                str = str.match(/{!{.*}!}/)[0].replace(/{!{/, "").replace(/}!}/, "")
                $(item).html(`<img class="canvas" src="${str}" />`)
            } else {
                $(item).html(str)
            }

        })
        if ($(".replyContent").length > 0) {
            $(".replyContent").show()
        }


        /* 评论验证 */
        $("#comment-form").on("submit", function(e) {
            if ($("#comment-nick").val().trim() === "") {
                e.preventDefault()
                return JNotification("请输入昵称")
            }
            if (!/\d{5,11}/.test($("#comment-qq").val())) {
                e.preventDefault()
                return JNotification("请输入正确的QQ")
            }
            if ($("#commentTypeContent .canvas").attr("data-type") === "canvas") {
                let url = $('#commentTypeContent canvas')[0].toDataURL('image/png');
                $("#comment-content").val("{!{" + url + "}!} ")
            }
            if ($("#comment-content").val().trim() === "") {
                e.preventDefault()
                return JNotification("请输入内容")
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