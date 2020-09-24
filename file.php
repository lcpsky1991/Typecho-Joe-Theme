<?php

/**
 * 归档
 * 
 * @package custom 
 * 
 */
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->need('components/include_head.php'); ?>
</head>

<body>
    <?php $this->need('components/common_head.php'); ?>

    <div class="j-container j-article">
        <!-- 主题 -->
        <div class="mainer">
            <div class="contain">
                <div class="article">
                    <!-- 文章头部信息 -->
                    <div class="header">
                        <p id="postTitleHtml"><?php $this->title() ?></p>
                        <h1 id="postTitle"></h1>
                        <?php if (!empty($this->options->JPostBlock) && in_array('ShowPostCounting', $this->options->JPostBlock)) : ?>
                            <div class="conting">
                                <div class="left">
                                    <!-- 联系作者 -->
                                    <?php if ($this->options->JQQ) : ?>
                                        <img class="image" src="//q.qlogo.cn/g?b=qq&nk=<?php $this->options->JQQ(); ?>&s=100" />
                                    <?php else : ?>
                                        <img class="image" src="//q.qlogo.cn/g?b=qq&nk=2323333339&s=100" />
                                    <?php endif; ?>
                                    <div class="meta">
                                        <div class="head">
                                            <a href="<?php $this->author->permalink(); ?>"><?php $this->author(); ?></a>
                                        </div>
                                        <div class="body">
                                            <span><?php $this->date(); ?></span>
                                            <div class="line">/</div>
                                            <span><?php $this->commentsNum('%d'); ?> 评论</span>
                                            <div class="line">/</div>
                                            <span><?php get_post_view($this) ?> 阅读</span>
                                            <div class="line">/</div>
                                            <span><?php echo baidu_record() ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="right"><?php $this->date('m/d'); ?></div>
                            </div>
                        <?php endif; ?>
                    </div>

                    <ul class="timeline">
                        <?php $this->widget('Widget_Contents_Post_Recent@sb66', 'pageSize=10000')->to($archives); ?>
                        <?php while ($archives->next()) : ?>
                            <li>
                                <a href="<?php $archives->permalink(); ?>" class="content">
                                    <img class="lazyload" src="<?php $this->options->themeUrl('assets/img/lazyload.jpg'); ?>" data-original="<?php showThumbnail($archives); ?>">
                                    <h3><?php $archives->date('Y/m/d'); ?></h3>
                                    <div class="info">
                                        <p><?php $archives->title(); ?></p>
                                        <span><?php get_post_view($archives); ?> 阅读 <?php $archives->commentsNum('%d'); ?> 回复</span>
                                    </div>
                                </a>
                            </li>
                        <?php endwhile; ?>
                    </ul>
                </div>
            </div>
            <?php $this->need('components/common_aside.php'); ?>
        </div>
    </div>

    <!-- 公共网页底部 -->
    <?php $this->need('components/common_foot.php'); ?>



    <!-- 页面配置项 -->
    <?php $this->need('components/include_config.php'); ?>
</body>

</html>