<!-- jquery 3.5.1库  -->
<script src="//cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>

<!-- 图片懒加载  -->
<script src="//cdn.jsdelivr.net/npm/jquery-lazyload@1.9.7/jquery.lazyload.min.js"></script>

<!-- 全局JS，自执行 -->
<script type="text/javascript">
    $(function() {
        /* 初始化主题色 */




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



<!-- <1> 背景图 -->
<?php if ($this->options->JCanvasType !== 'close') : ?>
    <script src="<?php $this->options->themeUrl('plugin/background/' . $this->options->JCanvasType); ?>"></script>
<?php else : ?>
    <script>
        $(function() {
            /* 背景图 */
            if (/Android|webOS|iPhone|iPod|BlackBerry/i.test(navigator.userAgent)) {
                if ('<?php $this->options->JDocumentWAPBG() ?>' !== '') {
                    $('body').css('background-image', 'url(<?php $this->options->JDocumentWAPBG() ?>)');
                }
            } else {
                if ('<?php $this->options->JDocumentPCBG() ?>' !== '') {
                    $('body').css('background-image', 'url(<?php $this->options->JDocumentPCBG() ?>)');
                }
            }
        })
    </script>
<?php endif; ?>

<!-- <2> 开启 关闭页面加载动画 -->
<?php if (!empty($this->options->JWindowBlock) && in_array('ShowPageLoad', $this->options->JWindowBlock)) : ?>
    <link rel="stylesheet" href="<?php $this->options->themeUrl('plugin/load/load.min.css'); ?>" />
    <script>
        $(function() {
            $(".j-load").remove()
        })
    </script>
<?php endif; ?>


<!-- <3> 开启 关闭 侧边栏无缝滚动 -->
<?php if (!empty($this->options->JAsideBlock) && in_array('ShowAsideReplyScroll', $this->options->JAsideBlock)) : ?>
    <script src="<?php $this->options->themeUrl('plugin/scrollText/scrollText.min.js'); ?>"></script>
    <script>
        $(function() {
            new ScrollText('asideReply', '', '', true, 50, true)
        })
    </script>
<?php endif; ?>



<!-- <4> 开启 关闭 颜色选择器 -->
<?php if (!empty($this->options->JWindowBlock) && in_array('ShowColorTheme', $this->options->JWindowBlock)) : ?>
    <link rel="stylesheet" href="<?php $this->options->themeUrl('plugin/colpick/colpick.min.css'); ?>" />
    <script src="<?php $this->options->themeUrl('plugin/colpick/colpick.min.js'); ?>"></script>
    <script>
        $(function() {
            /* 初始化主题色 */
            <?php if ($this->options->JGlobalTheme) : ?>
                $('body').css('--theme-color', localStorage.getItem('--theme-color') || '<?php $this->options->JGlobalTheme() ?>');
            <?php else : ?>
                $('body').css('--theme-color', localStorage.getItem('--theme-color') || '#4e7cf2');
            <?php endif; ?>

            /* 记忆颜色设置器 */
            $('#picker').colpick({
                flat: true,
                layout: 'hex',
                submit: false,
                color: localStorage.getItem('--theme-color') || <?php if ($this->options->JGlobalTheme) : ?> '<?php $this->options->JGlobalTheme() ?>'
            <?php else : ?> '#4e7cf2'
            <?php endif; ?>,

            colorScheme: 'dark',
            onChange(a, b, c) {
                $('body').css('--theme-color', '#' + b);
                localStorage.setItem('--theme-color', '#' + b);
            }
            });
            $('#showPicker').on('click', function(e) {
                e.stopPropagation();
                $('#picker').toggleClass('active');
            });
            $('#picker').on('click', function(e) {
                e.stopPropagation();
            });
        })
    </script>
<?php else : ?>
    <script>
        $(function() {
            $('body').css('--theme-color', '#4e7cf2');
        })
    </script>
<?php endif; ?>


<!-- <5> 开启 关闭 切换标签栏时，显示不同的title -->
<?php if ($this->options->JDocumentTitle) : ?>
    <script>
        $(function() {
            const DOCUMENT_TITLE = document.title
            $(document).on("visibilitychange", function() {
                if (document.visibilityState === 'hidden') {
                    document.title = '<?php $this->options->JDocumentTitle() ?>'
                } else {
                    document.title = DOCUMENT_TITLE
                }
            })
        })
    </script>
<?php endif; ?>


<!-- <6> 开启/关闭 弹幕功能 -->
<?php if (!empty($this->options->JWindowBlock) && in_array('ShowBarrager', $this->options->JWindowBlock)) : ?>
    <script src="<?php $this->options->themeUrl('plugin/barrager/barrager.min.js'); ?>"></script>
    <script>
        $(function() {
            if ($('.j-barrager-list').length > 0) {
                let item = Array.from($('.j-barrager-list li')).map(item => {
                    return {
                        html: `
                            <img src="${$(item).find('.j-barrager-list-avatar').attr('data-src')}" />
                            <p>${$(item).find('.j-barrager-list-content').html()}</p>
                        `
                    };
                });
                item.forEach(item => $('body').barrager(item));
            }
            if (localStorage.getItem('barragerStatus') === 'on') {
                $('#barragerSwitch').attr('checked', true);
                $('.j-barrager').css({
                    opacity: 1,
                    visibility: 'visible'
                })
            } else {
                $('#barragerSwitch').attr('checked', false);
                $('.j-barrager').css({
                    opacity: 0,
                    visibility: 'hidden'
                })
            }
            $('#barragerSwitch').on('change', function() {
                localStorage.setItem('barragerStatus', $(this).prop('checked') ? 'on' : 'off');
                if (!$('#barragerSwitch').prop('checked')) {
                    $('.j-barrager').css({
                        opacity: 0,
                        visibility: 'hidden'
                    })
                } else {
                    $('.j-barrager').css({
                        opacity: 1,
                        visibility: 'visible'
                    })
                }
            });
        })
    </script>
<?php endif; ?>


<!-- <7> 开启/关闭 小人 -->
<?php if ($this->options->JLive2D !== 'close') : ?>
    <script src="//eqcn.ajz.miesnfu.com/wp-content/plugins/wp-3d-pony/live2dw/lib/L2Dwidget.min.js"></script>
    <script>
        $(function() {
            L2Dwidget.init({
                "model": {
                    "jsonPath": "<?php $this->options->JLive2D() ?>",
                    "scale": 1
                },
                "display": {
                    "position": "left",
                    "width": 66,
                    "height": 90,
                    "hOffset": 100,
                    "vOffset": 60
                },
                "mobile": {
                    "show": false
                },
            });
        })
    </script>
<?php endif; ?>

<!-- <8> 开启 关闭 3d 云标签 -->
<?php if (!empty($this->options->JAsideBlock) && in_array('ShowAside3DTag', $this->options->JAsideBlock)) : ?>
    <script src="//cdn.jsdelivr.net/npm/typecho_joe_theme@1.0.5/plugin/svg3dtagcloud/svg3dtagcloud.min.js"></script>
    <script>
        $(function() {
            if ($('#cloudList').length > 0) {
                let entries = Array.from($('#cloudList li')).map(item => {
                    return {
                        label: $(item).attr('data-label'),
                        url: $(item).attr('data-url')
                    };
                });
                $('#cloud').svg3DTagCloud({
                    entries: entries,
                    width: 230,
                    height: 230,
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
        })
    </script>
<?php endif; ?>


<!-- <9> 开启 关闭 鼠标点击特效 -->
<?php if ($this->options->JCursorType !== 'close') : ?>
    <script src="<?php $this->options->themeUrl('plugin/cursor/' . $this->options->JCursorType); ?>"></script>
<?php endif; ?>


<!-- <10> 开启 关闭 天气 -->
<?php if (!empty($this->options->JAsideBlock) && in_array('ShowAsideWether', $this->options->JAsideBlock)) : ?>
    <script src="//apip.weatherdt.com/standard/static/js/weather-standard-common.js"></script>
    <script>
        $(function() {
            WIDGET = {
                CONFIG: {
                    layout: 2,
                    width: '230',
                    height: '270',
                    background: 1,
                    dataColor: 'FFFFFF',
                    key: '<?php $this->options->JWetherKey(); ?>'
                }
            };
        })
    </script>
<?php endif; ?>


<!-- <11> 开启 关闭 音乐播放器 -->
<?php if (!empty($this->options->JWindowBlock) && in_array('ShowAPlayer', $this->options->JWindowBlock)) : ?>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/aplayer@1.10.0/dist/APlayer.min.css" />
    <script src="//cdn.jsdelivr.net/npm/aplayer@1.10.0/dist/APlayer.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/meting@2.0.1/dist/Meting.min.js"></script>
<?php endif; ?>


<!-- <12> 启用 禁用 代码防偷 -->
<?php if (!empty($this->options->JWindowBlock) && in_array('ShowConsole', $this->options->JWindowBlock)) : ?>
    <script>
        $(function() {
            let ConsoleManager = {
                onOpen: function() {
                    try {
                        window.open("<?php $this->options->themeUrl(); ?>console.html", target = "_self")
                    } catch (e) {
                        var n = document.createElement("button");
                        n.onclick = function() {
                            window.open("<?php $this->options->themeUrl(); ?>console.html", target = "_self")
                        }, n.click()
                    }
                },
                onClose: function() {
                    alert("Console is closed!!!!!")
                },
                init: function() {
                    var e = this,
                        n = document.createElement("div"),
                        t = false,
                        o = false;
                    Object.defineProperty(n, "id", {
                        get: function() {
                            t || (e.onOpen(), t = !0), o = !0
                        }
                    }), setInterval(function() {
                        o = !1,
                            console.info(n),
                            console.clear(),
                            !o && t && (e.onClose(), t = !1)
                    }, 100)
                }
            };
            ConsoleManager.init();
        })
    </script>
<?php endif; ?>


<!-- <13>  启用 禁用 鼠标右键 -->
<?php if (!empty($this->options->JWindowBlock) && in_array('ShowContextMenu', $this->options->JWindowBlock)) : ?>
    <script>
        $(function() {
            $(document).on("contextmenu", function(e) {
                return false;
            });
        })
    </script>
<?php endif; ?>

<!-- <14> 启用 禁用 页面滚动显示进度条 -->
<?php if (!empty($this->options->JWindowBlock) && in_array('ShowProgressBar', $this->options->JWindowBlock)) : ?>
    <script>
        $(function() {
            let progressScroll = () => {
                let scrollAmount = $(window).scrollTop();
                let documentHeight = $(document).height();
                let windowHeight = $(window).height();
                let scrollPercent = (scrollAmount / (documentHeight - windowHeight)) * 100;
                $('#progress').css('width', scrollPercent + '%');
            }
            if ($('#progress').length > 0) {
                progressScroll();
                $(document).scroll(() => progressScroll());
            }
        })
    </script>
<?php endif; ?>


<!-- <15> 启用 禁用 头部跟随页面滚动 -->
<?php if (!empty($this->options->JWindowBlock) && in_array('ShowHeaderScroll', $this->options->JWindowBlock)) : ?>
    <script>
        $(function() {
            let p = 0;
            let t = 0;
            $(window).scroll(function() {
                p = $(this).scrollTop();
                if (t <= p) {
                    $('.j-header').addClass('active');
                } else {
                    $('.j-header').removeClass('active');
                }
                t = p;
            });
        })
    </script>
<?php endif; ?>


<!-- <16> 启用 禁用 返回顶部按钮 -->
<?php if (!empty($this->options->JWindowBlock) && in_array('ShowBackTop', $this->options->JWindowBlock)) : ?>
    <script>
        $(function() {
            let showBackTop = () => {
                if ($(window).scrollTop() > 500) $('#backtop').css('transform', 'scale(1)');
                else $('#backtop').css('transform', 'scale(0)');
            }
            if ($('#backtop').length > 0) {
                showBackTop();
                $(window).on('scroll', () => showBackTop());
            }
            $('#backtop').on('click', function() {
                $('html,body').stop().animate({
                    scrollTop: 0
                }, 300);
            });
        })
    </script>
<?php endif; ?>