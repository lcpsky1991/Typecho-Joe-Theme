<?php

/**
 * 基于 Typecho 开发的一款带弹幕的皮肤
 * 
 * @package Typecho Joe Theme 
 * @author Joe
 * @version 1.0
 * @link //ae.js.cn
 */

if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('tools/tools.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->need('components/include_head.php'); ?>
</head>

<body>
    <?php $this->need('components/common_header.php'); ?>
    <div class="joe-container">

        <div class="joe-main joe-index">
            <?php while ($this->next()) : ?>
                <article>
                    <a title="<?php $this->title() ?>" href="<?php $this->permalink() ?>" class="pic">
                        <img class="lazyLoad" data-original="<?php showThumbnail($this->options->themeUrl); ?>">
                    </a>
                    <div class="detail">
                        <a title="<?php $this->title() ?>" href="<?php $this->permalink() ?>" class="title">
                            <span><?php $this->title() ?></span>
                        </a>
                        <a title="<?php $this->title() ?>" href="<?php $this->permalink() ?>" class="content"><?php $this->excerpt(500, '') ?></a>
                        <div class="meta">
                            <div class="item" title="文章作者">
                                <svg t="1598001562776" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="6166" width="32" height="32">
                                    <path d="M512 464c88 0 160-72 160-160s-72-160-160-160-160 72-160 160 72 160 160 160z m-139.2 16C321.6 438.4 288 376 288 304c0-123.2 100.8-224 224-224s224 100.8 224 224c0 70.4-33.6 134.4-84.8 176C811.2 526.4 928 673.6 928 848c0 52.8-43.2 96-96 96H192c-52.8 0-96-43.2-96-96 0-174.4 116.8-321.6 276.8-368zM832 880c17.6 0 32-14.4 32-32 0-176-144-320-320-320h-64c-176 0-320 144-320 320 0 17.6 14.4 32 32 32h640z" p-id="6167"></path>
                                </svg>
                                <a href="<?php $this->author->permalink(); ?>">
                                    <?php $this->author(); ?>
                                </a>
                            </div>
                            <div class="item" title="更新日期">
                                <svg t="1598001985569" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="7454" width="32" height="32">
                                    <path d="M784 160H672v-32c0-17.6-14.4-32-32-32s-32 14.4-32 32v32H416v-32c0-17.6-14.4-32-32-32s-32 14.4-32 32v32H240c-88 0-160 72-160 160v448c0 88 72 160 160 160h544c88 0 160-72 160-160V320c0-88-72-160-160-160z m-544 64h112v32c0 17.6 14.4 32 32 32s32-14.4 32-32v-32h192v32c0 17.6 14.4 32 32 32s32-14.4 32-32v-32h112c52.8 0 96 43.2 96 96v32H144v-32c0-52.8 43.2-96 96-96z m544 640H240c-52.8 0-96-43.2-96-96V416h736v352c0 52.8-43.2 96-96 96z" p-id="7455"></path>
                                    <path d="M288 672h64c17.6 0 32 14.4 32 32s-14.4 32-32 32h-64c-17.6 0-32-14.4-32-32s14.4-32 32-32z m192 0h64c17.6 0 32 14.4 32 32s-14.4 32-32 32h-64c-17.6 0-32-14.4-32-32s14.4-32 32-32z m192 0h64c17.6 0 32 14.4 32 32s-14.4 32-32 32h-64c-17.6 0-32-14.4-32-32s14.4-32 32-32zM288 512h64c17.6 0 32 14.4 32 32s-14.4 32-32 32h-64c-17.6 0-32-14.4-32-32s14.4-32 32-32z m192 0h64c17.6 0 32 14.4 32 32s-14.4 32-32 32h-64c-17.6 0-32-14.4-32-32s14.4-32 32-32z m192 0h64c17.6 0 32 14.4 32 32s-14.4 32-32 32h-64c-17.6 0-32-14.4-32-32s14.4-32 32-32z" p-id="7456"></path>
                                </svg>
                                <span><?php $this->date('Y-m-d'); ?></span>
                            </div>
                            <div class="item" title="阅读量">
                                <svg t="1598001816042" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="6453" width="32" height="32">
                                    <path d="M512 896C182.4 896 46.4 630.4 11.2 548.8c-9.6-24-9.6-49.6 0-73.6C46.4 393.6 182.4 128 512 128c328 0 465.6 265.6 500.8 347.2 9.6 24 9.6 49.6 0 73.6C977.6 630.4 840 896 512 896zM70.4 499.2c-3.2 8-3.2 16 0 24C100.8 596.8 222.4 832 512 832s411.2-235.2 441.6-307.2c3.2-8 3.2-16 0-24C923.2 427.2 801.6 192 512 192S100.8 427.2 70.4 499.2zM512 672c-88 0-160-72-160-160s72-160 160-160 160 72 160 160-72 160-160 160z m0-256c-52.8 0-96 43.2-96 96s43.2 96 96 96 96-43.2 96-96-43.2-96-96-96z" p-id="6454"></path>
                                </svg>
                                <span><?php get_post_view($this); ?></span>
                            </div>
                            <div class="item" title="评论量">
                                <svg t="1598000883678" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="5878" width="32" height="32">
                                    <path d="M784 144H240c-88 0-160 72-160 160v416c0 88 72 160 160 160h544c88 0 160-72 160-160V304c0-88-72-160-160-160z m-544 64h544c35.2 0 65.6 19.2 81.6 46.4L552 508.8c-24 19.2-57.6 19.2-80 0L158.4 254.4c16-27.2 46.4-46.4 81.6-46.4z m544 608H240c-52.8 0-96-43.2-96-96V326.4L432 560c24 19.2 51.2 28.8 80 28.8 28.8 0 57.6-9.6 80-28.8l288-233.6V720c0 52.8-43.2 96-96 96z" p-id="5879"></path>
                                </svg>
                                <span><?php $this->commentsNum('%d'); ?>条</span>
                            </div>
                        </div>
                    </div>
                </article>
            <?php endwhile; ?>
            <?php $this->need('components/common_pagination.php'); ?>
        </div>
        <?php $this->need('components/common_aside.php'); ?>
    </div>
    <?php $this->need('components/common_footer.php'); ?>
    <?php $this->need('components/include_foot.php'); ?>
</body>

</html>