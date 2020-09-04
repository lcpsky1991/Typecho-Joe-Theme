<div class="joe-footer">
    <div class="container">
        <div class="left">

            <!-- 最底部版权信息 -->
            <?php if ($this->options->JBanQuan) : ?>
                <span class="info"><?php $this->options->JBanQuan() ?></span>
            <?php else : ?>
                <span class="info">2015 - 2020 © Reach - HaoOuBa</span>
            <?php endif; ?>

            <!-- 启用/禁用网页计时 -->
            <?php if (!empty($this->options->windowBlock) && in_array('ShowCountTime', $this->options->windowBlock)) : ?>
                <svg t="1599036944272" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="2749">
                    <path d="M872 64c13.2544 0 24 10.7456 24 24 0 13.2544-10.7456 24-24 24h-104v177.456c0 67.0672-36.4912 128.8224-95.2368 161.1744l-111.0816 61.1744 111.328 61.536C731.6176 605.7328 768 667.4112 768 734.376V912h104c13.2544 0 24 10.7456 24 24 0 13.2544-10.7456 24-24 24H152c-13.2544 0-24-10.7456-24-24 0-13.2544 10.7456-24 24-24h104V734.544c0-67.0672 36.4912-128.8224 95.2368-161.1744l111.08-61.176-111.328-61.5328C292.3824 418.2656 256 356.5872 256 289.6224V112H152c-13.2544 0-24-10.7456-24-24 0-13.2544 10.7456-24 24-24h720zM512.4 539.4112l-138.0064 76.0032A136 136 0 0 0 304 734.544V912h416V734.3776a136 136 0 0 0-70.2096-119.0272l-137.3904-75.9392zM720 112H304v177.6224a136 136 0 0 0 70.2096 119.0272l137.3904 75.9392 138.0064-76.0032A136 136 0 0 0 720 289.456V112z" fill="#979797" p-id="2750"></path>
                </svg>
                <span class="time"><?php echo timer_stop(); ?></span>
            <?php endif; ?>

        </div>
        <div class="right">

            <!-- 最底部右侧链接 -->
            <?php if ($this->options->JFootLink) : ?>
                <?php $this->options->JFootLink() ?>
            <?php else : ?>
                <a href="">关于</a>
                <a href="">归档</a>
                <a href="">RSS</a>
            <?php endif; ?>

        </div>
    </div>
</div>

<div class="joe-actions">

    <!-- 启用/禁用 返回顶部按钮 -->
    <?php if (!empty($this->options->windowBlock) && in_array('ShowBackTop', $this->options->windowBlock)) : ?>
        <div class="button" id="backtop">
            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="arrow-up" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                <path fill="currentColor" d="M34.9 289.5l-22.2-22.2c-9.4-9.4-9.4-24.6 0-33.9L207 39c9.4-9.4 24.6-9.4 33.9 0l194.3 194.3c9.4 9.4 9.4 24.6 0 33.9L413 289.4c-9.5 9.5-25 9.3-34.3-.4L264 168.6V456c0 13.3-10.7 24-24 24h-32c-13.3 0-24-10.7-24-24V168.6L69.2 289.1c-9.3 9.8-24.8 10-34.3.4z"></path>
            </svg>
        </div>
    <?php endif; ?>

</div>

<!-- 启用/禁用 音乐播放器 -->
<?php if (!empty($this->options->windowBlock) && in_array('ShowAPlayer', $this->options->windowBlock)) : ?>
    <meting-js id="<?php $this->options->JMeting(); ?>" lrc-type="0" server="netease" theme="#ebebeb" autoplay type="playlist" fixed="true" list-olded="true"></meting-js>
<?php endif; ?>