<!-- 侧边栏 -->
<?php if (!isMobile()) : ?>
    <div class="j-aside">

        <!-- 侧边栏 用户信息 -->
        <?php if (!empty($this->options->JAsideBlock) && in_array('ShowAsideAuthor', $this->options->JAsideBlock)) : ?>
            <div class="aside aside-user">
                <!-- 用户信息 -->
                <div class="user">
                    <!-- 联系作者 -->
                    <?php if ($this->options->JQQ) : ?>
                        <img src="//q.qlogo.cn/g?b=qq&nk=<?php $this->options->JQQ(); ?>&s=100" />
                        <?php if ($this->options->JQQLink) : ?>
                            <a href="<?php $this->options->JQQLink(); ?>"><?php $this->author->screenName(); ?></a>
                        <?php else : ?>
                            <a title="点击联系作者" target="_blank" href="//wpa.qq.com/msgrd?v=3&uin=<?php $this->options->JQQ(); ?>&site=qq&menu=yes"><?php $this->author->screenName(); ?></a>
                        <?php endif; ?>
                    <?php else : ?>
                        <img src="//q.qlogo.cn/g?b=qq&nk=2323333339&s=100" />
                        <a title="点击联系作者" target="_blank" href="//wpa.qq.com/msgrd?v=3&uin=2323333339&site=qq&menu=yes"><?php $this->author->screenName(); ?></a>
                    <?php endif; ?>

                    <!-- 座右铭 -->
                    <?php if ($this->options->JMotto) : ?>
                        <p><?php showAsideAuthorRemark(); ?></p>
                    <?php else : ?>
                        <p>人生之路，难免坎坷，但我执着</p>
                    <?php endif; ?>
                </div>

                <?php Typecho_Widget::widget('Widget_Stat')->to($quantity); ?>
                <!-- 网站统计 -->
                <div class="webinfo">
                    <div class="item" title="累计文章数">
                        <span class="num"><?php $quantity->publishedPostsNum(); ?></span>
                        <span>文章</span>
                    </div>
                    <div class="item" title="累计评论数">
                        <span class="num"><?php $quantity->publishedCommentsNum(); ?></span>
                        <span>评论</span>
                    </div>
                    <div class="item" title="累计分类数">
                        <span class="num"><?php $quantity->categoriesNum(); ?></span>
                        <span>分类</span>
                    </div>
                </div>
                <!-- pageSize 代表显示多少条，目前显示8条，想要显示几条直接改就行 -->
                <ul class="articles">
                    <?php $this->widget('Widget_Contents_Post_Recent', 'pageSize=8')->to($hot); ?>
                    <?php while ($hot->next()) : ?>
                        <li title="<?php $hot->title(); ?>">
                            <a href="<?php $hot->permalink(); ?>"><?php $hot->title(); ?></a>
                            <svg t="1599802830077" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg">
                                <path d="M448.12 320.331a30.118 30.118 0 0 1-42.616-42.586L552.568 130.68a213.685 213.685 0 0 1 302.2 0l38.552 38.551a213.685 213.685 0 0 1 0 302.2L746.255 618.497a30.118 30.118 0 0 1-42.586-42.616l147.034-147.035a153.45 153.45 0 0 0 0-217.028l-38.55-38.55a153.45 153.45 0 0 0-216.998 0L448.12 320.33zM575.88 703.67a30.118 30.118 0 0 1 42.616 42.586L471.432 893.32a213.685 213.685 0 0 1-302.2 0l-38.552-38.551a213.685 213.685 0 0 1 0-302.2l147.065-147.065a30.118 30.118 0 0 1 42.586 42.616L173.297 595.125a153.45 153.45 0 0 0 0 217.027l38.55 38.551a153.45 153.45 0 0 0 216.998 0L575.88 703.64z m-234.256-63.88L639.79 341.624a30.118 30.118 0 0 1 42.587 42.587L384.21 682.376a30.118 30.118 0 0 1-42.587-42.587z" p-id="7351"></path>
                            </svg>
                        </li>
                    <?php endwhile; ?>
                </ul>
            </div>
        <?php endif; ?>

        <!-- 侧边栏 广告1 -->
        <?php if ($this->options->JADContent1) : ?>
            <div class="aside aside-ad">
                <a href="<?php $this->options->JADContent1Link(); ?>" title="广告">
                    <img class="lazyload" src="<?php $this->options->themeUrl('assets/img/lazyload.jpg'); ?>" data-original="<?php $this->options->JADContent1(); ?>">
                </a>
            </div>
        <?php endif; ?>

        <!-- 天气 -->
        <?php if (!empty($this->options->JAsideBlock) && in_array('ShowAsideWether', $this->options->JAsideBlock)) : ?>
            <div class="aside aside-wether">
                <h3>今日天气</h3>
                <div class="content" title="今日天气">
                    <div id="weather-v2-plugin-standard"></div>
                </div>
            </div>
        <?php endif; ?>

        <!-- 侧边栏 最新回复 -->
        <?php if (!empty($this->options->JAsideBlock) && in_array('ShowAsideReply', $this->options->JAsideBlock)) : ?>
            <div class="aside aside-reply">
                <h3>最新回复</h3>
                <ol class="list" id="asideReply">
                    <?php $this->widget('Widget_Comments_Recent@sb666', 'ignoreAuthor=true&pageSize=5')->to($comments); ?>
                    <?php while ($comments->next()) : ?>
                        <li>
                            <div class="user">
                                <img src="//q2.qlogo.cn/g?b=qq&nk=<?php echo $comments->mail; ?>&s=100">
                                <div class="info">
                                    <div class="name"><?php $comments->author(false); ?></div>
                                    <span><?php $comments->date(); ?></span>
                                </div>
                            </div>
                            <div class="reply">
                                <a title="<?php $comments->excerpt(); ?>" href="<?php $comments->permalink(); ?>"><?php $comments->excerpt(); ?></a>
                            </div>
                        </li>
                    <?php endwhile; ?>
                </ol>
            </div>
        <?php endif; ?>

        <?php if (!empty($this->options->JAsideBlock) && in_array('ShowAsideHot', $this->options->JAsideBlock)) : ?>
            <div class="aside aside-hot">
                <h3>热门文章</h3>
                <ul>
                    <?php $this->widget('Widget_Post_hot@rs9@hot', 'pageSize=' . $this->options->JAsideReplyNum)->to($hot); ?>
                    <?php $i = 1; ?>
                    <?php while ($hot->next()) : ?>
                        <li>
                            <a href="<?php $hot->permalink(); ?>" title="<?php $hot->title(); ?>">
                                <img class="lazyload" src="<?php showThumbnail($hot); ?>">
                                <div class="info">
                                    <p><?php $hot->title(); ?></p>
                                    <span><?php get_post_view($hot); ?> 阅读，<?php $hot->date('m/d'); ?></span>
                                </div>
                                <div class="tip"><?php echo $i; ?></div>
                            </a>
                        </li>
                        <?php $i++; ?>
                    <?php endwhile; ?>
                </ul>
            </div>
        <?php endif; ?>

        <!-- 侧边栏 云标签 -->
        <?php if (!empty($this->options->JAsideBlock) && in_array('ShowAside3DTag', $this->options->JAsideBlock)) : ?>
            <div class="aside aside-cloud">
                <h3>标签云</h3>
                <div class="cloud" id="cloud"></div>
                <ul id="cloudList">
                    <?php $this->widget('Widget_Metas_Tag_Cloud', array('sort' => 'count', 'ignoreZeroCount' => true, 'desc' => true, 'limit' => 50))->to($tags); ?>
                    <?php while ($tags->next()) : ?>
                        <li data-url="<?php $tags->permalink(); ?>" data-label="<?php $tags->name(); ?>"></li>
                    <?php endwhile; ?>
                </ul>
            </div>
        <?php endif; ?>

        <!-- 侧边栏 广告2 -->
        <?php if ($this->options->JADContent2) : ?>
            <div class="aside aside-ad">
                <a href="<?php $this->options->JADContent2Link(); ?>" title="广告">
                    <img class="lazyload" src="<?php $this->options->themeUrl('assets/img/lazyload.jpg'); ?>" data-original="<?php $this->options->JADContent2(); ?>">
                </a>
            </div>
        <?php endif; ?>



    </div>
<?php endif; ?>