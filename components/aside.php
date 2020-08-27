<div class="j-aside">
    <div class="author card">
        <h3>关于作者</h3>
        <div class="content">
            <div class="user">
                <img src="//q.qlogo.cn/g?b=qq&nk=2323333339&s=100">
                <a title="点击联系作者" target="_blank" href="//wpa.qq.com/msgrd?v=3&uin=2323333339&site=qq&menu=yes"><?php $this->author->screenName(); ?></a>
                <p>人生之路，难免坎坷，但我执着</p>
            </div>
            <?php Typecho_Widget::widget('Widget_Stat')->to($quantity); ?>
            <div class="webinfo">
                <div class="item">
                    <span class="num"><?php $quantity->publishedPostsNum(); ?></span>
                    <span>文章数</span>
                </div>
                <div class="item">
                    <span class="num"><?php $quantity->publishedCommentsNum(); ?></span>
                    <span>评论数</span>
                </div>
                <div class="item">
                    <span class="num"><?php echo $this->options->birthday ? round((time() - strtotime($this->options->birthday)) / 86400, 0) : 0; ?></span>
                    <span>运行天数</span>
                </div>
            </div>
        </div>
    </div>
    <div class="weather card">
        <h3>今日天气</h3>
        <div class="content">
            <div id="weather-v2-plugin-standard"></div>
            <div class="loading"></div>
        </div>
    </div>
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
    <div class="reply card">
        <h3>最近回复</h3>
        <div class="content">
            <ol id="replyList">
                <?php $this->widget('Widget_Comments_Recent')->to($comments); ?>
                <?php while ($comments->next()) : ?>
                    <li title="<?php $comments->excerpt(); ?>">
                        <a href="<?php $comments->permalink(); ?>" target="_blank">
                            <img src="//q2.qlogo.cn/g?b=qq&nk=<?php echo $comments->mail; ?>&s=100">
                            <div>
                                <span><?php $comments->author(false); ?></span>
                                <p><?php $comments->excerpt(); ?></p>
                            </div>
                        </a>
                    </li>
                <?php endwhile; ?>
            </ol>
        </div>
    </div>
    <div class="relevant card">
        <h3>最新文章</h3>
        <div class="links">
            <?php $this->widget('Widget_Contents_Post_Recent', 'pageSize=5')->to($hot); ?>
            <?php while ($hot->next()) : ?>
                <a title="<?php $hot->title(); ?>" target="_blank" href="<?php $hot->permalink(); ?>"><?php $hot->title(); ?></a>
            <?php endwhile; ?>
        </div>
    </div>
</div>