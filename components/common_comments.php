<?php
function threadedComments($comments, $options)
{
    if ($comments->authorId) {
        if ($comments->authorId == $comments->ownerId) {
            $commentClass = 'comment-by-author';
        }
    }
?>
    <li id="li-<?php $comments->theId(); ?>">
        <div id="<?php $comments->theId(); ?>">
            <div class="item">
                <img class="left" src="http://q2.qlogo.cn/g?b=qq&nk=<?php echo $comments->mail; ?>&s=100">
                <div class="right">
                    <div class="name">
                        <span><?php $comments->author(); ?></span>
                        <i class="<?php echo $commentClass; ?>">作者</i>
                    </div>
                    <div class="content replyContent">
                        <?php echo reply($comments->parent); ?>
                        <?php $comments->content(); ?>
                    </div>
                    <div class="meta">
                        <span><?php $comments->date(); ?></span>
                        <?php $comments->reply('<svg t="1601003432079" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="6644" width="200" height="200"><path d="M947.2 467.968h-276.48v61.44h276.48zM947.2 650.24h-363.52v61.44h363.52zM947.2 832.512H482.304v61.44H947.2zM519.168 179.2l122.368 85.504-352.256 503.808-122.368-85.504L519.168 179.2m-14.848-85.504L81.92 698.368l223.232 156.16L727.04 249.856 504.32 93.696z" p-id="6645"></path><path d="M433.152 195.072L397.824 245.76l223.232 155.648 35.328-50.176zM143.36 740.864l-61.44-42.496v237.056l222.72-81.408-60.928-43.008-100.352 36.864z" p-id="6646"></path></svg>回复'); ?>
                    </div>
                </div>
            </div>
        </div>
        <?php if ($comments->children) { ?>
            <div class="comment-children">
                <?php $comments->threadedComments($options); ?>
            </div>
        <?php } ?>
    </li>
<?php } ?>


<?php $this->comments()->to($comments); ?>
<div class="j-comments">
    <div class="title">评论 (<?php $this->commentsNum(); ?>)</div>
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
                        <?php $comments->cancelReply("取消"); ?>
                        <button>发表评论</button>
                    </div>
                </div>
            </form>
        </div>
    <?php else : ?>
        <div class="close">作者已关闭评论</div>
    <?php endif; ?>

    <?php if ($comments->have()) : ?>
        <?php $comments->listComments(); ?>
        <?php $comments->pageNav(
            '上一页',
            '下一页',
            1,
            '...',
            array(
                'wrapTag' => 'ul',
                'wrapClass' => 'j-pagination',
                'itemTag' => 'li',
                'textTag' => 'a',
                'currentClass' => 'active',
                'prevClass' => 'prev',
                'nextClass' => 'next'
            )
        ); ?>
    <?php endif; ?>
</div>