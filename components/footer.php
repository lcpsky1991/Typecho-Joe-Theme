<div class="j-footer">
    <div class="button" id="backtop">
        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="arrow-up" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
            <path fill="currentColor" d="M34.9 289.5l-22.2-22.2c-9.4-9.4-9.4-24.6 0-33.9L207 39c9.4-9.4 24.6-9.4 33.9 0l194.3 194.3c9.4 9.4 9.4 24.6 0 33.9L413 289.4c-9.5 9.5-25 9.3-34.3-.4L264 168.6V456c0 13.3-10.7 24-24 24h-32c-13.3 0-24-10.7-24-24V168.6L69.2 289.1c-9.3 9.8-24.8 10-34.3.4z"></path>
        </svg>
    </div>
</div>

<!-- 音乐播放器配置，请查阅相关文档进行配置 -->
<?php if (!empty($this->options->sidebarBlock) && in_array('ShowMeting', $this->options->sidebarBlock)) : ?>
    <meting-js id="<?php if ($this->options->JMeting) : ?><?php $this->options->JMeting(); ?><?php else : ?>149232428<?php endif; ?>" lrc-type="0" server="netease" theme="#ebebeb" autoplay type="playlist" fixed="true" list-olded="true"></meting-js>
<?php endif; ?>

<!-- 鼠标点击特效 -->
<?php if (!empty($this->options->sidebarBlock) && in_array('ShowCursor', $this->options->sidebarBlock)) : ?>
    <script src="<?php $this->options->themeUrl('assets/js/cursor.js'); ?>"></script>
<?php endif; ?>

<!-- 基础jquery库 -->
<script src="//cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>

<!-- 懒加载 -->
<script src="//cdn.jsdelivr.net/npm/jquery-lazyload@1.9.7/jquery.lazyload.min.js"></script>

<!-- 音乐播放器，配置项可查阅相关文档 -->
<script src="//cdn.jsdelivr.net/npm/aplayer@1.10.1/dist/APlayer.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/meting@2.0.1/dist/Meting.min.js"></script>

<!-- 天气，配置项查阅相关文档 -->
<script src="//apip.weatherdt.com/standard/static/js/weather-standard-common.js?v=2.0"></script>

<!-- 侧边栏无缝滚动 -->
<script src="<?php $this->options->themeUrl('assets/js/scrollText.js'); ?>"></script>

<!-- 侧边栏无缝滚动 -->
<script src="<?php $this->options->themeUrl('assets/js/svg3dtagcloud.js'); ?>"></script>

<!-- 评论区弹幕 -->
<script src="<?php $this->options->themeUrl('assets/js/barrager.js'); ?>"></script>

<!-- 详情页代码高亮 -->
<script src="<?php $this->options->themeUrl('assets/js/prism.js'); ?>"></script>

<!-- 全局js -->
<script src="<?php $this->options->themeUrl('assets/js/global.js'); ?>"></script>

<script>
    /* 初始化天气, 这个配置可以自己去天气官网配置好然后粘贴替换 https://cj.weather.com.cn */
    WIDGET = {
        CONFIG: {
            layout: 2,
            width: '250',
            height: '270',
            background: 1,
            dataColor: 'FFFFFF',
            key: <?php if ($this->options->JWetherKey) : ?><?php $this->options->JWetherKey(); ?><?php else : ?> 'utmgXFwjn6'
        <?php endif; ?>
        }
    };
</script>