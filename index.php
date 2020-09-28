<?php

/**
 * 
 * 基于 Typecho 开发的一款开箱即用型主题。
 * 
 * @package Typecho_Joe_Theme 
 * @author Joe
 * @version 1.2.8
 * @link //ae.js.cn
 * 
 **/

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->need('components/include_head.php'); ?>
</head>

<body>
    <!-- 公共网页头部 -->
    <?php if (!isMobile()) : ?>
        <?php $this->need('components/common_head.php'); ?>
    <?php else : ?>
        <?php $this->need('components/common_head_wap.php'); ?>
    <?php endif; ?>


    <!-- 首页 -->
    <div class="j-main j-container">

        <!-- 左边内容 -->
        <div class="j-left">

            <!-- 文章列表 -->
            <div class="j-index">
                <!-- 广告 -->
                <?php if ($this->options->JIndexAD) : ?>
                    <div class="ad">
                        <a href="<?php $this->options->JIndexADLink(); ?>" title="广告">
                            <img class="lazyload" src="<?php $this->options->themeUrl('assets/img/lazyload.jpg'); ?>" data-original="<?php $this->options->JIndexAD(); ?>" />
                        </a>
                    </div>
                <?php endif; ?>
                <!-- 热门文章 -->
                <?php if (!empty($this->options->JIndexBlock) && in_array('ShowIndexHot', $this->options->JIndexBlock)) : ?>
                    <div class="hot-box">
                        <div class="title">热门文章</div>
                        <ul class="hot">
                            <?php $this->widget('Widget_Post_hot@r3@hot', 'pageSize=4')->to($hot); ?>
                            <?php while ($hot->next()) : ?>
                                <li>
                                    <a href="<?php $hot->permalink(); ?>" title="<?php $hot->title(); ?>">
                                        <img class="lazyload" src="<?php $this->options->themeUrl('assets/img/lazyload.jpg'); ?>" data-original="<?php showThumbnail($this); ?>">
                                        <p><?php $hot->title(); ?></p>
                                        <span>
                                            <?php get_post_view($hot); ?> ℃
                                        </span>
                                    </a>
                                </li>
                            <?php endwhile; ?>
                        </ul>
                    </div>

                <?php endif; ?>



                <!-- 标题和公告 -->
                <div class="nav-title">
                    <h2>最新文章</h2>
                    <?php if ($this->options->JIndexNotice) : ?>
                        <div class="notice">
                            <svg t="1599815077446" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg">
                                <path d="M115.2 379.733v264.534h177.067L512 866.133V157.867L290.133 379.733H115.2zM710.4 512c0-78.933-44.8-145.067-110.933-177.067V691.2C665.6 657.067 710.4 590.933 710.4 512zM599.467 123.733v91.734c128 38.4 221.866 155.733 221.866 296.533s-93.866 258.133-221.866 296.533v91.734C776.533 859.733 908.8 701.867 908.8 512S778.667 164.267 599.467 123.733z" p-id="5581"></path>
                            </svg>
                            <a href="<?php $this->options->JIndexNoticeLink(); ?>">
                                <?php $this->options->JIndexNotice(); ?>
                            </a>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- 文章列表 -->
                <?php while ($this->next()) : ?>
                    <div class="list">
                        <a class="image" href="<?php $this->permalink() ?>" title="<?php $this->title() ?>">
                            <img class="lazyload" src="<?php $this->options->themeUrl('assets/img/lazyload.jpg'); ?>" data-original="<?php showThumbnail($this); ?>">
                            <span><?php $this->date('Y-m-d'); ?></span>
                            <svg t="1600220458717" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg">
                                <path d="M903.93077753 107.30625876H115.78633587C64.57261118 107.30625876 22.58166006 149.81138495 22.58166006 201.02510964v624.26547214c0 51.7240923 41.99095114 93.71694641 93.71694641 93.7169464h788.14444164c51.7202834 0 93.71694641-41.99285557 93.71694642-93.7169464v-624.26547214c-0.51227057-51.21372469-43.01739676-93.71885088-94.229217-93.71885088zM115.78633587 171.8333054h788.65671224c16.385041 0 29.70407483 13.31522639 29.70407484 29.70407482v390.22828696l-173.60830179-189.48107072c-12.80486025-13.82749697-30.21634542-21.50774542-48.14010264-19.97093513-17.92375723 1.02073227-34.82106734 10.75387344-46.60138495 26.11437327l-172.58185762 239.1598896-87.06123767-85.52061846c-12.28878076-11.78222353-27.65308802-17.92375723-44.03812902-17.92375577-16.3907529 0.50846167-31.75506163 7.67644101-43.52966736 20.48129978L86.59453164 821.70468765V202.04965083c-1.02454117-17.41529409 12.80486025-30.73052046 29.19180423-30.21634543zM903.93077753 855.50692718H141.90642105l222.25496164-245.81940722 87.0593347 86.03669649c12.80105134 12.80676323 30.21253651 18.95020139 47.11555999 17.4172 17.40958218-1.53871621 33.79652618-11.26614404 45.06267018-26.11818071l172.58376063-238.64762047 216.11152349 236.08817198 2.05098681-1.54062067v142.87778132c0.50846167 16.3907529-13.31522639 29.70597929-30.21444096 29.70597928z m0 0" p-id="1916"></path>
                                <path d="M318.07226687 509.82713538c79.88945091 0 144.41649754-65.03741277 144.41649754-144.41649753 0-79.37718032-64.52704663-144.92495923-144.41649754-144.92495922-79.89135536 0-144.41649754 64.52704663-144.41649756 144.41268862 0 79.89135536 64.52514218 144.92876814 144.41649756 144.92876813z m0-225.3266807c44.55230407 0 80.91208763 36.36168802 80.91208762 80.91018317 0 44.55611297-35.84751297 81.43007159-80.91208762 81.43007012-45.06838356 0-80.91589654-36.35978356-80.91589508-80.91589507 0-44.55611297 36.87205415-81.42435823 80.91589508-81.42435822z m0 0" p-id="1917"></path>
                            </svg>
                        </a>
                        <div class="info">
                            <a class="title" href="<?php $this->permalink() ?>" title="<?php $this->title() ?>"><?php $this->title() ?></a>
                            <a class="content" href="<?php $this->permalink() ?>"><?php $this->excerpt(500) ?></a>
                            <div class="meta">
                                <div class="item" title="文章作者">
                                    <svg t="1598001562776" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M512 464c88 0 160-72 160-160s-72-160-160-160-160 72-160 160 72 160 160 160z m-139.2 16C321.6 438.4 288 376 288 304c0-123.2 100.8-224 224-224s224 100.8 224 224c0 70.4-33.6 134.4-84.8 176C811.2 526.4 928 673.6 928 848c0 52.8-43.2 96-96 96H192c-52.8 0-96-43.2-96-96 0-174.4 116.8-321.6 276.8-368zM832 880c17.6 0 32-14.4 32-32 0-176-144-320-320-320h-64c-176 0-320 144-320 320 0 17.6 14.4 32 32 32h640z" p-id="6167"></path>
                                    </svg>
                                    <a href="<?php $this->author->permalink(); ?>"><?php $this->author(); ?></a>
                                </div>
                                <div class="item" title="更新日期">
                                    <svg t="1598001985569" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M784 160H672v-32c0-17.6-14.4-32-32-32s-32 14.4-32 32v32H416v-32c0-17.6-14.4-32-32-32s-32 14.4-32 32v32H240c-88 0-160 72-160 160v448c0 88 72 160 160 160h544c88 0 160-72 160-160V320c0-88-72-160-160-160z m-544 64h112v32c0 17.6 14.4 32 32 32s32-14.4 32-32v-32h192v32c0 17.6 14.4 32 32 32s32-14.4 32-32v-32h112c52.8 0 96 43.2 96 96v32H144v-32c0-52.8 43.2-96 96-96z m544 640H240c-52.8 0-96-43.2-96-96V416h736v352c0 52.8-43.2 96-96 96z" p-id="7455"></path>
                                        <path d="M288 672h64c17.6 0 32 14.4 32 32s-14.4 32-32 32h-64c-17.6 0-32-14.4-32-32s14.4-32 32-32z m192 0h64c17.6 0 32 14.4 32 32s-14.4 32-32 32h-64c-17.6 0-32-14.4-32-32s14.4-32 32-32z m192 0h64c17.6 0 32 14.4 32 32s-14.4 32-32 32h-64c-17.6 0-32-14.4-32-32s14.4-32 32-32zM288 512h64c17.6 0 32 14.4 32 32s-14.4 32-32 32h-64c-17.6 0-32-14.4-32-32s14.4-32 32-32z m192 0h64c17.6 0 32 14.4 32 32s-14.4 32-32 32h-64c-17.6 0-32-14.4-32-32s14.4-32 32-32z m192 0h64c17.6 0 32 14.4 32 32s-14.4 32-32 32h-64c-17.6 0-32-14.4-32-32s14.4-32 32-32z" p-id="7456"></path>
                                    </svg>
                                    <span><?php $this->date('Y-m-d'); ?></span>
                                </div>
                                <div class="item" title="阅读量">
                                    <svg t="1598001816042" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M512 896C182.4 896 46.4 630.4 11.2 548.8c-9.6-24-9.6-49.6 0-73.6C46.4 393.6 182.4 128 512 128c328 0 465.6 265.6 500.8 347.2 9.6 24 9.6 49.6 0 73.6C977.6 630.4 840 896 512 896zM70.4 499.2c-3.2 8-3.2 16 0 24C100.8 596.8 222.4 832 512 832s411.2-235.2 441.6-307.2c3.2-8 3.2-16 0-24C923.2 427.2 801.6 192 512 192S100.8 427.2 70.4 499.2zM512 672c-88 0-160-72-160-160s72-160 160-160 160 72 160 160-72 160-160 160z m0-256c-52.8 0-96 43.2-96 96s43.2 96 96 96 96-43.2 96-96-43.2-96-96-96z" p-id="6454"></path>
                                    </svg>
                                    <span><?php get_post_view($this); ?></span>
                                </div>
                                <div class="item" title="评论量">
                                    <svg t="1598000883678" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M784 144H240c-88 0-160 72-160 160v416c0 88 72 160 160 160h544c88 0 160-72 160-160V304c0-88-72-160-160-160z m-544 64h544c35.2 0 65.6 19.2 81.6 46.4L552 508.8c-24 19.2-57.6 19.2-80 0L158.4 254.4c16-27.2 46.4-46.4 81.6-46.4z m544 608H240c-52.8 0-96-43.2-96-96V326.4L432 560c24 19.2 51.2 28.8 80 28.8 28.8 0 57.6-9.6 80-28.8l288-233.6V720c0 52.8-43.2 96-96 96z" p-id="5879"></path>
                                    </svg>
                                    <span><?php $this->commentsNum('%d'); ?> 条</span>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>

            <!-- 分页 -->
            <?php $this->need('components/common_pagination.php'); ?>
        </div>


        <!-- 侧边栏 -->
        <?php $this->need('components/common_aside.php'); ?>
    </div>


    <?php if (!isMobile()) : ?>
        <!-- 弹幕列表 -->
        <ul class="j-barrager-list">
            <?php $this->widget('Widget_Comments_Recent@sb399', 'ignoreAuthor=true')->to($comments); ?>
            <?php while ($comments->next()) : ?>
                <li>
                    <span class="j-barrager-list-avatar" data-src="//q2.qlogo.cn/g?b=qq&nk=<?php echo $comments->mail; ?>&s=100"></span>
                    <span class="j-barrager-list-content"><?php $comments->excerpt(); ?></span>
                </li>
            <?php endwhile; ?>
        </ul>
    <?php endif; ?>


    <!-- 公共网页底部 -->
    <?php $this->need('components/common_foot.php'); ?>


    <!-- 页面配置项 -->
    <?php $this->need('components/include_config.php'); ?>
</body>

</html>