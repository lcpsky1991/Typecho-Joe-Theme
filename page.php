<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('functions/functions.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->need('components/include.php'); ?>
</head>

<body>
    <?php $this->need('components/header.php'); ?>
    <div class="j-post">
        <div class="main">
            <div class="article">
                <div class="header">
                    <h1 id="mainTitle"><?php $this->title() ?></h1>
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
                </div>
                <div class="markdown" id="markdown">
                    <?php $this->content(); ?>
                </div>
                <?php $this->need('components/banquan.php'); ?>
            </div>
            <?php $this->need('components/comment.php'); ?>
        </div>
        <?php $this->need('components/aside.php'); ?>
    </div>
    <?php $this->need('components/footer.php'); ?>
</body>

</html>