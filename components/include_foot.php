<!-- 启用/禁用天气 -->
<?php if (!empty($this->options->sidebarBlock) && in_array('ShowTodayWether', $this->options->sidebarBlock)) : ?>
    <script src="//apip.weatherdt.com/standard/static/js/weather-standard-common.js?v=2.0"></script>
<?php endif; ?>


<!-- jquery基础库 -->
<script src="<?php $this->options->themeUrl('assets/js/jquery.min.js'); ?>"></script>


<!-- 图片懒加载 -->
<script src="<?php $this->options->themeUrl('assets/js/jquery.lazyload.min.js'); ?>"></script>


<!-- 启用/禁用 3d标签 -->
<?php if (!empty($this->options->sidebarBlock) && in_array('Show3DTag', $this->options->sidebarBlock)) : ?>
    <script src="<?php $this->options->themeUrl('assets/js/svg3dtagcloud.min.js'); ?>"></script>
<?php endif; ?>


<!-- 启用/禁用 最近回复 -->
<?php if (!empty($this->options->sidebarBlock) && in_array('ShowReply', $this->options->sidebarBlock)) : ?>
    <script src="<?php $this->options->themeUrl('assets/js/scrollText.min.js'); ?>"></script>
<?php endif; ?>


<!-- 启用/禁用 音乐播放器 -->
<?php if (!empty($this->options->windowBlock) && in_array('ShowAPlayer', $this->options->windowBlock)) : ?>
    <script src="<?php $this->options->themeUrl('assets/js/APlayer.min.js'); ?>"></script>
    <script src="<?php $this->options->themeUrl('assets/js/Meting.min.js'); ?>"></script>
<?php endif; ?>


<!-- 公用JS -->
<script src="<?php $this->options->themeUrl('assets/js/common.js'); ?>"></script>


<!-- 代码高亮 -->
<script src="<?php $this->options->themeUrl('assets/js/prism.min.js'); ?>"></script>


<!-- 启用/禁用鼠标点击特效 -->
<?php if (!empty($this->options->windowBlock) && in_array('ShowCursorEffects', $this->options->windowBlock)) : ?>
    <script src="<?php $this->options->themeUrl('assets/js/cursor.min.js'); ?>"></script>
<?php endif; ?>


<!-- 启用/禁用 live2D小人 -->
<?php if (!empty($this->options->windowBlock) && in_array('ShowLive2D', $this->options->windowBlock)) : ?>
    <script src="https://eqcn.ajz.miesnfu.com/wp-content/plugins/wp-3d-pony/live2dw/lib/L2Dwidget.min.js"></script>
<?php endif; ?>


<!-- 启用/禁用 弹幕 -->
<?php if (!empty($this->options->postBlock) && in_array('ShowBarrager', $this->options->postBlock)) : ?>
    <script src="<?php $this->options->themeUrl('assets/js/barrager.min.js'); ?>"></script>
<?php endif; ?>


<!-- 配置项 -->
<script type="text/javascript">
    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowTodayWether', $this->options->sidebarBlock)) : ?>
        WIDGET = {
            CONFIG: {
                layout: 2,
                width: '250',
                height: '270',
                background: 1,
                dataColor: 'FFFFFF',
                key: '<?php $this->options->JWetherKey(); ?>'
            }
        };
    <?php endif; ?>


    <?php if (!empty($this->options->windowBlock) && in_array('ShowContextMenu', $this->options->windowBlock)) : ?>
        $(document).on('contextmenu', function() {
            return false;
        });
    <?php endif; ?>


    <?php if (!empty($this->options->windowBlock) && in_array('ShowLive2D', $this->options->windowBlock)) : ?>
        L2Dwidget.init({
            "model": {
                "jsonPath": "<?php $this->options->JLive2D() ?>",
                "scale": 1
            },
            "display": {
                "position": "<?php $this->options->JLive2DPosition() ?>",
                "width": 66,
                "height": 90,
                "hOffset": 100,
                "vOffset": 60
            },
            "mobile": {
                "show": false
            },
        });
    <?php endif; ?>

    <?php if (!empty($this->options->postBlock) && in_array('ShowBarrager', $this->options->postBlock)) : ?>
        if ($('#commentList').length > 0) {
            let item = Array.from($('#commentList ol li')).map(_ => {
                return {
                    info: $(_).find('.comment-content p').html()
                };
            });
            item.forEach(item => $('body').barrager(item));
        }
    <?php endif; ?>
</script>