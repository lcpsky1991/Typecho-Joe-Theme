<!-- 开启 关闭页面加载动画 -->
<?php if (!empty($this->options->JWindowBlock) && in_array('ShowPageLoad', $this->options->JWindowBlock)) : ?>
    <?php $this->need('components/common_load.php'); ?>
<?php endif; ?>

<div class="j-header">

    <!-- 上面导航 -->
    <div class="j-container above">

        <!-- L O G O -->
        <a class="logo" href="<?php $this->options->siteUrl(); ?>">
            <?php if ($this->options->JLogo) : ?>
                <img src="<?php $this->options->JLogo() ?>" />
            <?php else : ?>
                <?php if ($this->options->JCDN == 'close') : ?>
                    <img src="<?php $this->options->themeUrl('assets/img/logo.png'); ?>" />
                <?php else : ?>
                    <img src="//cdn.jsdelivr.net/npm/typecho_joe_theme@<?php echo getVersion() ?>/assets/img/logo.png" />
                <?php endif; ?>
            <?php endif; ?>
        </a>

        <!-- N A V -->
        <div class="link">
            <a class="<?php if ($this->is('index')) : ?>active<?php endif; ?>" href="<?php $this->options->siteUrl(); ?>">首页</a>
            <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
            <?php while ($pages->next()) : ?>
                <a class="<?php if ($this->is('page', $pages->slug)) : ?>active<?php endif; ?>" href="<?php $pages->permalink(); ?>"><?php $pages->title(); ?></a>
            <?php endwhile; ?>
        </div>

        <!-- 搜索 -->
        <form class="search" id="search" method="get" action="<?php $this->options->siteUrl(); ?>">
            <input maxlength="20" name="s" autocomplete="off" <?php if ($this->is('search')) : ?>value="<?php $this->archiveTitle(' &raquo; ', '', ''); ?>" <?php endif; ?> type="text" placeholder="请输入关键字..." />
            <button type="submit">Search</button>
            <?php if ($this->options->JCDN == 'close') : ?>
                <img src="<?php $this->options->themeUrl('assets/img/upiocn.png'); ?>" />
            <?php else : ?>
                <img src="//cdn.jsdelivr.net/npm/typecho_joe_theme@<?php echo getVersion() ?>/assets/img/upiocn.png" />
            <?php endif; ?>
        </form>
    </div>


    <!-- 下面导航 -->
    <div class="below">
        <div class="j-container">

            <!-- 链接 -->
            <div class="navs">
                <?php $this->widget('Widget_Metas_Category_List')->to($category); ?>
                <?php while ($category->next()) : ?>
                    <a <?php if ($this->is('category', $category->slug)) : ?>class="active" <?php endif; ?> href="<?php $category->permalink(); ?>"><?php $category->name(); ?></a>
                <?php endwhile; ?>
            </div>

            <?php if (!empty($this->options->JWindowBlock) && in_array('ShowCensusButton', $this->options->JWindowBlock)) : ?>
                <div class="button">
                    <div class="text headDrop">
                        <svg t="1600238272353" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg">
                            <path d="M186.182 558.545c0-23.272 18.618-46.545 46.545-46.545s46.546 23.273 46.546 46.545v186.182c0 23.273-18.618 46.546-46.546 46.546S186.182 768 186.182 744.727V558.545z m279.273-372.363c0-27.927 18.618-46.546 46.545-46.546s46.545 18.619 46.545 46.546v558.545c0 27.928-18.618 46.546-46.545 46.546s-46.545-18.618-46.545-46.546V186.182zM139.636 884.364c0-27.928 18.619-46.546 46.546-46.546h651.636c27.927 0 46.546 18.618 46.546 46.546s-18.619 46.545-46.546 46.545H186.182c-27.927 0-46.546-18.618-46.546-46.545z m605.091-512c0-23.273 18.618-46.546 46.546-46.546s46.545 23.273 46.545 46.546v372.363c0 23.273-18.618 46.546-46.545 46.546S744.727 768 744.727 744.727V372.364z" p-id="2266"></path>
                        </svg>
                        统计
                    </div>
                    <?php Typecho_Widget::widget('Widget_Stat')->to($stat); ?>
                    <ul class="dropdown headDropdown census">
                        <li>文章总数：<?php $stat->publishedPostsNum() ?> 篇</li>
                        <li>评论总数：<?php $stat->publishedCommentsNum() ?> 条</li>
                        <li>分类总数：<?php $stat->categoriesNum() ?> 个</li>
                        <li>最后更新：<?php get_last_update() ?></li>
                    </ul>
                </div>
            <?php endif; ?>

            <!-- 开启 / 关闭 登录 -->
            <?php if (!empty($this->options->JWindowBlock) && in_array('ShowLoginButton', $this->options->JWindowBlock)) : ?>
                <?php if ($this->user->hasLogin()) : ?>
                    <div class="button">
                        <div class="text headDrop">
                            <svg t="1600239815750" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg">
                                <path d="M256.003012 341.329983c0-141.182993 114.805994-255.997988 255.987988-255.997987 141.182993 0 255.996988 114.814994 255.996988 255.996987 0 141.173993-114.813994 255.996988-255.996988 255.996988S255.994013 482.502976 255.994013 341.329983M979.869977 970.349953c-41.949998-157.139992-152.539993-280.018986-291.409986-337.404984 98.592995-59.902997 164.861992-168.019992 164.861992-291.622986C853.311983 153.128993 700.182991 0 511.983 0s-341.329983 153.128993-341.329983 341.329983c0 123.594994 66.260997 231.709989 164.904992 291.613986C196.680015 690.372966 86.090021 813.20896 44.114023 970.347953a42.649998 42.649998 0 0 0 30.207998 52.171997 42.708998 42.708998 0 0 0 52.256998-30.206998C175.280016 810.00896 333.741009 682.658967 512 682.658967s336.755984 127.357994 385.445981 309.669985a42.579998 42.579998 0 0 0 52.223998 30.207998 42.649998 42.649998 0 0 0 30.206998-52.179997" p-id="5392"></path>
                            </svg>
                            <?php $this->user->screenName(); ?>
                        </div>
                        <!-- 用户名 -->
                        <div class="dropdown headDropdown login-item">
                            <a target="_blank" href="<?php $this->options->adminUrl(); ?>">进入后台</a>
                            <a target="_blank" href="<?php $this->options->adminUrl("manage-posts.php"); ?>">管理文章</a>
                            <a target="_blank" href="<?php $this->options->adminUrl("options-theme.php"); ?>">修改外观</a>
                            <a href="<?php $this->options->logoutUrl(); ?>">退出登录</a>
                        </div>
                    </div>
                <?php else : ?>
                    <!-- 登录 -->
                    <div class="button">
                        <div class="text headDrop">
                            <svg t="1600239815750" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg">
                                <path d="M256.003012 341.329983c0-141.182993 114.805994-255.997988 255.987988-255.997987 141.182993 0 255.996988 114.814994 255.996988 255.996987 0 141.173993-114.813994 255.996988-255.996988 255.996988S255.994013 482.502976 255.994013 341.329983M979.869977 970.349953c-41.949998-157.139992-152.539993-280.018986-291.409986-337.404984 98.592995-59.902997 164.861992-168.019992 164.861992-291.622986C853.311983 153.128993 700.182991 0 511.983 0s-341.329983 153.128993-341.329983 341.329983c0 123.594994 66.260997 231.709989 164.904992 291.613986C196.680015 690.372966 86.090021 813.20896 44.114023 970.347953a42.649998 42.649998 0 0 0 30.207998 52.171997 42.708998 42.708998 0 0 0 52.256998-30.206998C175.280016 810.00896 333.741009 682.658967 512 682.658967s336.755984 127.357994 385.445981 309.669985a42.579998 42.579998 0 0 0 52.223998 30.207998 42.649998 42.649998 0 0 0 30.206998-52.179997" p-id="5392"></path>
                            </svg>
                            登录
                        </div>
                        <!-- 登录弹框 -->
                        <form id="loginBox" class="dropdown headDropdown" action="<?php $this->options->loginAction() ?>" method="post" name="login" role="form">
                            <div class="item">
                                <span>账户</span>
                                <input id="userName" autocomplete="off" name="name" type="text" placeholder="请输入用户名...">
                                <input type="hidden" name="referer" value="<?php $this->options->siteUrl(); ?>" />
                            </div>
                            <div class="item">
                                <span>密码</span>
                                <input id="passWord" autocomplete="off" name="password" type="password" placeholder="请输入密码...">
                            </div>
                            <div class="item">
                                <button>登 录</button>
                            </div>
                        </form>
                    </div>
                <?php endif; ?>
            <?php endif; ?>

            <!-- 开启 / 关闭弹幕 -->
            <?php if (!empty($this->options->JWindowBlock) && in_array('ShowBarrager', $this->options->JWindowBlock)) : ?>
                <input title="开启/关闭弹幕" class="switch switch-anim" type="checkbox" id="barragerSwitch" />
            <?php endif; ?>
        </div>

        <!-- 滚动条 显示页面滚动了多少 -->
        <?php if (!empty($this->options->JWindowBlock) && in_array('ShowProgressBar', $this->options->JWindowBlock)) : ?>
            <div class="progress" id="progress"></div>
        <?php endif; ?>
    </div>
</div>