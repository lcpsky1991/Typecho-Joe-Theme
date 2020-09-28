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
                </div>

                <div class="j-leaving">
                    <?php if ($this->allow('comment')) : ?>
                        <div id="<?php $this->respondId(); ?>" class="respond j-comment">
                            <div class="change" id="commentType">
                                <button data-type="canvas">画图模式</button>
                                <button data-type="text" class="active">文本模式</button>
                            </div>
                            <form method="post" action="<?php $this->commentUrl() ?>" id="comment-form" role="form">
                                <div class="head">
                                    <input type="text" <?php if ($this->user->hasLogin()) : ?> value="<?php $this->user->screenName(); ?>" <?php else : ?> value="<?php $this->remember('author'); ?>" <?php endif; ?> autocomplete="off" name="author" id="comment-nick" maxlength="16" placeholder="昵称：请输入昵称（必填）">
                                    <div class="line">
                                        <input autocomplete="off" type="text" maxlength="10" id="comment-qq" placeholder="QQ：请输入QQ（必填）">
                                    </div>
                                    <input name="url" type="text" placeholder="网址：请输入网址（选填）">
                                    <input name="mail" type="hidden" id="comment-mail">
                                </div>
                                <div class="content" id="commentTypeContent">
                                    <textarea name="text" autocomplete="off" id="comment-content" rows="5" placeholder="说点什么吧，也可以点击右上角切换成画图模式哦"></textarea>
                                    <div class="canvas" style="display: none;">
                                        <canvas></canvas>
                                        <ul>
                                            <li class="active" data-color="#000000"></li>
                                            <li data-color="#ff0000"></li>
                                            <li data-color="#80ff00"></li>
                                            <li data-color="#00FFFF"></li>
                                        </ul>
                                        <ol>
                                            <li data-width="1">细</li>
                                            <li class="active" data-width="3">中</li>
                                            <li data-width="5">粗</li>
                                        </ol>
                                    </div>
                                </div>
                                <div class="foot">
                                    <?php if ($this->options->JCDN == 'close') : ?>
                                        <img id="comment-avatar" src="<?php $this->options->themeUrl('assets/img/nouser.png'); ?>">
                                    <?php else : ?>
                                        <img id="comment-avatar" src="//cdn.jsdelivr.net/npm/typecho_joe_theme@<?php echo getVersion() ?>/assets/img/nouser.png">
                                    <?php endif; ?>
                                    <div class="right">
                                        <button>发表评论</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    <?php else : ?>
                        <div class="close">作者已关闭评论</div>
                    <?php endif; ?>
                </div>

            </div>
        </div>
    </div>

    <!-- 公共网页底部 -->
    <?php $this->need('components/common_foot.php'); ?>



    <!-- 页面配置项 -->
    <?php $this->need('components/include_config.php'); ?>
</body>

</html>