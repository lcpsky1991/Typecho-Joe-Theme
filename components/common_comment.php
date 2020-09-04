<div class="joe-comment">
    <h3>添加新评论</h3>
    <form method="post" id="comment-form" action="<?php $this->commentUrl() ?>">
        <div class="textarea">
            <textarea name="text" id="textarea" placeholder="请输入评论内容...（评论内容将以弹幕显示）" rows="7"></textarea>
            <span class="tips"></span>
        </div>
        <div class="head">
            <div class="form-item">
                <input autocomplete="off" name="author" id="author" type="text" placeholder="请输入昵称（必填）">
                <span class="tips"></span>
            </div>
            <div class="form-item">
                <input autocomplete="off" name="mail" id="mail" type="text" placeholder="请输入QQ邮箱（必填）">
                <span class="tips"></span>
            </div>
            <div class="form-item">
                <input autocomplete="off" name="url" id="url" type="text" placeholder="请输入网址（选填）">
                <span class="tips"></span>
            </div>
        </div>
        <div class="submit">
            <img id="commentAvatar">
            <button>发表评论</button>
        </div>
    </form>
    <div id="commentList" class="commentList">
        <?php $this->comments()->to($comments); ?>
        <?php if ($comments->have()) : ?>
            <?php $comments->listComments(); ?>
        <?php endif; ?>
    </div>
</div>