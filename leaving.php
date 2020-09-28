<?php

/**
 * 留言墙
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
                    </div>

                    <?php $this->comments()->to($comments); ?>

                    <?php if ($comments->have()) : ?>
                        <ul class="leaving" id="leavingList">
                            <?php while ($comments->next()) : ?>
                                <li>
                                    <div class="title">
                                        <img src="//q2.qlogo.cn/g?b=qq&nk=<?php echo $comments->mail; ?>&s=100" alt="">
                                        <span><?php $comments->author(); ?></span>
                                        <span><?php $comments->date(); ?></span>
                                    </div>
                                    <div class="content">
                                        <?php $comments->content(); ?>
                                    </div>
                                </li>
                            <?php endwhile; ?>
                        </ul>
                    <?php else : ?>
                        <div class="none">暂无留言。期待您的第一个脚印。</div>
                    <?php endif; ?>
                </div>

                <?php $this->need('components/common_comments.php'); ?>
            </div>
        </div>
    </div>

    <!-- 公共网页底部 -->
    <?php $this->need('components/common_foot.php'); ?>



    <!-- 页面配置项 -->
    <?php $this->need('components/include_config.php'); ?>
</body>

</html>