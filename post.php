<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('tools/tools.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->need('components/include_head.php'); ?>
</head>

<body>
    <!-- 顶部滚动条 -->
    <?php if (!empty($this->options->postBlock) && in_array('ShowProgressBar', $this->options->postBlock)) : ?>
        <div class="joe-progress"></div>
    <?php endif; ?>

    <?php $this->need('components/common_header.php'); ?>
    <div class="joe-container">
        <div class="joe-main joe-article">

            <div class="article">
                <div class="header">
                    <h1 id="mainTitle"><?php $this->title() ?></h1>
                    <?php if (!empty($this->options->postBlock) && in_array('ShowPostHead', $this->options->postBlock)) : ?>
                        <ul>
                            <li>
                                <span>作者：</span>
                                <a href="<?php $this->author->permalink(); ?>"><?php $this->author(); ?></a>
                            </li>
                            <li>
                                <span>时间：</span>
                                <span><?php $this->date(); ?></span>
                            </li>
                            <li class="cate">
                                <span>分类：</span>
                                <?php $this->category(''); ?>
                            </li>
                            <li>
                                <span>浏览：</span>
                                <span><?php get_post_view($this) ?></span>
                            </li>
                        </ul>
                    <?php endif; ?>
                </div>

                <div class="markdown" id="markdown">
                    <?php $this->content(); ?>
                </div>
                <?php if (!empty($this->options->postBlock) && in_array('ShowPostBanQuan', $this->options->postBlock)) : ?>
                    <?php $this->need('components/common_banquan.php'); ?>
                <?php endif; ?>
            </div>

            <?php if (!empty($this->options->postBlock) && in_array('ShowPostPagination', $this->options->postBlock)) : ?>
                <ul class="page">
                    <?php $this->theNext('<li class="left">%s</li>', '', ['title' => '上一篇']); ?>
                    <?php $this->thePrev('<li class="right">%s</li>', '', ['title' => '下一篇']); ?>
                </ul>
            <?php endif; ?>

            <?php if (!empty($this->options->postBlock) && in_array('ShowPostComment', $this->options->postBlock)) : ?>
                <?php $this->need('components/common_comment.php'); ?>
            <?php endif; ?>
        </div>
        <?php $this->need('components/common_aside.php'); ?>
    </div>

    <?php $this->need('components/common_footer.php'); ?>
    <?php $this->need('components/include_foot.php'); ?>
</body>

</html>