<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->need('components/include_head.php'); ?>
</head>

<body>
    <?php $this->need('components/common_head.php'); ?>

    <div class="j-container j-article">
        <!-- 面包屑 -->
        <?php if (!empty($this->options->JPostBlock) && in_array('ShowPostBread', $this->options->JPostBlock)) : ?>
            <?php $this->need('components/common_bread.php'); ?>
        <?php endif; ?>
        <!-- 主题 -->
        <div class="mainer">
            <div class="contain">
                <div class="article">
                    <!-- 标签 -->
                    <div class="tags">
                        <?php $this->category(''); ?>
                        <?php if ($this->user->uid == $this->authorId) : ?>
                            <a href="<?php $this->options->adminUrl(); ?>write-post.php?cid=<?php echo $this->cid; ?>" class="edit">编辑文章</a>
                        <?php endif; ?>
                    </div>

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
                                            <?php checkBaiduRecord() ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="right"><?php $this->date('m/d'); ?></div>
                            </div>
                        <?php endif; ?>
                    </div>

                    <!-- 文章内容 -->
                    <div class="markdown" id="markdown">
                        <?php $this->content(); ?>
                    </div>

                    <!-- 文章版权信息 -->
                    <?php if (!empty($this->options->JPostBlock) && in_array('ShowPostBanQuan', $this->options->JPostBlock)) : ?>
                        <?php $this->need('components/common_banquan.php'); ?>
                    <?php endif; ?>

                    <!-- 相关推荐 -->
                    <?php if (!empty($this->options->JPostBlock) && in_array('ShowPostRelevant', $this->options->JPostBlock)) : ?>
                        <?php $this->need('components/common_relevant.php'); ?>
                    <?php endif; ?>
                </div>

                <!-- 分页 -->
                <ul class="page">
                    <?php $this->theNext('<li class="left">%s</li>', '', ['title' => '上一篇']); ?>
                    <?php $this->thePrev('<li class="right">%s</li>', '', ['title' => '下一篇']); ?>
                </ul>

                <?php $this->need('components/common_comments.php'); ?>
            </div>
            <?php $this->need('components/common_aside.php'); ?>
        </div>
    </div>

    <!-- 弹幕列表 -->
    <ul class="j-barrager-list">
        <?php $this->comments()->to($comments); ?>
        <?php while ($comments->next()) : ?>
            <li>
                <span class="j-barrager-list-avatar" data-src="//q2.qlogo.cn/g?b=qq&nk=<?php echo $comments->mail; ?>&s=100"></span>
                <span class="j-barrager-list-content"><?php $comments->excerpt(); ?></span>
            </li>
        <?php endwhile; ?>
    </ul>

    <?php $this->need('components/common_preview.php'); ?>

    <?php $this->need('components/common_foot.php'); ?>
    <?php $this->need('components/include_config.php'); ?>
</body>

</html>