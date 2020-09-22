<div class="j-comment">
    <h3>添加新评论</h3>
    <form id="comment" method="post" action="<?php $this->commentUrl() ?>">
        <div class="head">
            <input type="text" autocomplete="off" name="author" id="comment-nick" maxlength="16" placeholder="昵称：请输入昵称（必填）">
            <div class="line">
                <input autocomplete="off" type="text" maxlength="10" id="comment-qq" placeholder="QQ：请输入QQ（必填）">
            </div>
            <input name="url" type="text" placeholder="网址：请输入网址（选填）">
            <input name="mail" type="hidden" id="comment-mail">
        </div>
        <textarea name="text" autocomplete="off" id="comment-content" class="body" rows="5" placeholder="说点什么吧。。。"></textarea>
        <div class="foot">
            <img id="comment-avatar" src="<?php $this->options->themeUrl('assets/img/nouser.png'); ?>">
            <button>发表评论</button>
        </div>
    </form>
</div>