<div class="joe-aside">

    <!-- 关于作者 -->
    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowAboutAuthor', $this->options->sidebarBlock)) : ?>
        <div class="author card">
            <div class="content">
                <div class="user">
                    <?php if ($this->options->JQQ) : ?>
                        <img src="//q.qlogo.cn/g?b=qq&nk=<?php $this->options->JQQ(); ?>&s=100" />
                        <a title="点击联系作者" target="_blank" href="//wpa.qq.com/msgrd?v=3&uin=<?php $this->options->JQQ(); ?>&site=qq&menu=yes"><?php $this->author->screenName(); ?></a>
                    <?php else : ?>
                        <img src="//q.qlogo.cn/g?b=qq&nk=2323333339&s=100" />
                        <a title="点击联系作者" target="_blank" href="//wpa.qq.com/msgrd?v=3&uin=2323333339&site=qq&menu=yes"><?php $this->author->screenName(); ?></a>
                    <?php endif; ?>

                    <?php if ($this->options->JMotto) : ?>
                        <p><?php $this->options->JMotto(); ?></p>
                    <?php else : ?>
                        <p>人生之路，难免坎坷，但我执着</p>
                    <?php endif; ?>
                </div>
                <?php Typecho_Widget::widget('Widget_Stat')->to($quantity); ?>
                <div class="webinfo">
                    <div class="item">
                        <span class="num"><?php $quantity->publishedPostsNum(); ?></span>
                        <span>文章</span>
                    </div>
                    <div class="item">
                        <span class="num"><?php $quantity->publishedCommentsNum(); ?></span>
                        <span>评论</span>
                    </div>
                    <div class="item">
                        <span class="num"><?php $quantity->categoriesNum(); ?></span>
                        <span>分类</span>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <!-- 今日天气 -->
    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowTodayWether', $this->options->sidebarBlock)) : ?>
        <div class="weather card">
            <h3>今日天气</h3>
            <div class="content">
                <div id="weather-v2-plugin-standard"></div>
            </div>
        </div>
    <?php endif; ?>

    <!-- 标签云 -->
    <?php if (!empty($this->options->sidebarBlock) && in_array('Show3DTag', $this->options->sidebarBlock)) : ?>
        <div class="cloud card">
            <h3>标签云</h3>
            <div class="content" id="cloud"></div>
            <ul id="cloudList">
                <?php $this->widget('Widget_Metas_Tag_Cloud', array('sort' => 'count', 'ignoreZeroCount' => true, 'desc' => true, 'limit' => 50))->to($tags); ?>
                <?php while ($tags->next()) : ?>
                    <li data-url="<?php $tags->permalink(); ?>" data-label="<?php $tags->name(); ?>"></li>
                <?php endwhile; ?>
            </ul>
        </div>
    <?php endif; ?>

    <!-- 最近回复 -->
    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowReply', $this->options->sidebarBlock)) : ?>
        <div class="reply card">
            <h3>最近回复</h3>
            <div class="content">
                <ol id="replyList">
                    <?php $this->widget('Widget_Comments_Recent')->to($comments); ?>
                    <?php while ($comments->next()) : ?>
                        <li title="<?php $comments->excerpt(); ?>">
                            <a href="<?php $comments->permalink(); ?>" target="_blank">
                                <img src="//q2.qlogo.cn/g?b=qq&nk=<?php echo $comments->mail; ?>&s=100">
                                <div class="info">
                                    <div class="head">
                                        <span><?php $comments->author(false); ?></span>
                                        <span><?php $comments->date(); ?></span>
                                    </div>
                                    <p><?php $comments->excerpt(); ?></p>
                                </div>
                            </a>
                        </li>
                    <?php endwhile; ?>
                </ol>
            </div>
        </div>
    <?php endif; ?>


    <!-- 最新文章 -->
    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowArticle', $this->options->sidebarBlock)) : ?>
        <div class="relevant card">
            <h3>最新文章</h3>
            <div class="links">
                <?php $this->widget('Widget_Contents_Post_Recent', 'pageSize=5')->to($hot); ?>
                <?php while ($hot->next()) : ?>
                    <a title="<?php $hot->title(); ?>" target="_blank" href="<?php $hot->permalink(); ?>"><?php $hot->title(); ?></a>
                <?php endwhile; ?>
            </div>
        </div>
    <?php endif; ?>
</div>