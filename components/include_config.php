<!-- jquery 3.5.1库  -->
<?php if ($this->options->JCDN == 'close') : ?>
    <script src="<?php $this->options->themeUrl('plugin/jquery/jquery.min.js'); ?>"></script>
    <!-- 图片懒加载  -->
    <script src="<?php $this->options->themeUrl('plugin/lazyload/lazyload.min.js'); ?>"></script>
    <script src="<?php $this->options->themeUrl('plugin/cookie/cookie.min.js'); ?>"></script>
    <?php if (!isMobile()) : ?>
        <script src="<?php $this->options->themeUrl('plugin/canvas/canvas.min.js'); ?>"></script>
    <?php endif; ?>
<?php else : ?>
    <script src="//cdn.jsdelivr.net/npm/typecho_joe_theme@<?php echo getVersion() ?>/plugin/jquery/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/typecho_joe_theme@<?php echo getVersion() ?>/plugin/lazyload/lazyload.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/typecho_joe_theme@<?php echo getVersion() ?>/plugin/cookie/cookie.min.js"></script>
    <?php if (!isMobile()) : ?>
        <script src="//cdn.jsdelivr.net/npm/typecho_joe_theme@<?php echo getVersion() ?>/plugin/canvas/canvas.min.js"></script>
    <?php endif; ?>
<?php endif; ?>


<!-- 全局JS，自执行 -->
<?php $this->need('config/GlobalJS.php'); ?>


<!-- <1> 背景图 -->
<?php $this->need('config/Background.php'); ?>


<?php if (!empty($this->options->JWindowBlock) && in_array('ShowPageLoad', $this->options->JWindowBlock)) : ?>
    <!-- <2> 开启 关闭页面加载动画 -->
    <?php $this->need('config/PageLoad.php'); ?>
<?php endif; ?>


<?php if (!isMobile()) : ?>
    <?php if (!empty($this->options->JAsideBlock) && in_array('ShowAsideReplyScroll', $this->options->JAsideBlock)) : ?>
        <!-- <3> 开启 关闭 侧边栏无缝滚动 -->
        <?php $this->need('config/ReplyScroll.php'); ?>
    <?php endif; ?>
<?php endif; ?>


<!-- <4> 开启 关闭 颜色选择器 -->
<?php $this->need('config/ColorTheme.php'); ?>



<?php if (!isMobile()) : ?>
    <?php if ($this->options->JDocumentTitle) : ?>
        <!-- <5> 开启 关闭 切换标签栏时，显示不同的title -->
        <?php $this->need('config/DocumentTitle.php'); ?>
    <?php endif; ?>
<?php endif; ?>


<?php if (!isMobile()) : ?>
    <?php if (!empty($this->options->JWindowBlock) && in_array('ShowBarrager', $this->options->JWindowBlock)) : ?>
        <!-- <6> 开启/关闭 弹幕功能 -->
        <?php $this->need('config/Barrager.php'); ?>
    <?php endif; ?>
<?php endif; ?>



<?php if (!isMobile()) : ?>
    <?php if ($this->options->JLive2D !== 'close') : ?>
        <!-- <7> 开启/关闭 小人 -->
        <?php $this->need('config/Live2D.php'); ?>
    <?php endif; ?>
<?php endif; ?>



<?php if (!isMobile()) : ?>
    <?php if (!empty($this->options->JAsideBlock) && in_array('ShowAside3DTag', $this->options->JAsideBlock)) : ?>
        <!-- <8> 开启 关闭 3d 云标签 -->
        <?php $this->need('config/3DTag.php'); ?>
    <?php endif; ?>
<?php endif; ?>


<?php if (!isMobile()) : ?>
    <?php if ($this->options->JCursorType !== 'close') : ?>
        <!-- <9> 开启 关闭 鼠标点击特效 -->
        <?php $this->need('config/Cursor.php'); ?>
    <?php endif; ?>
<?php endif; ?>


<?php if (!isMobile()) : ?>
    <?php if (!empty($this->options->JAsideBlock) && in_array('ShowAsideWether', $this->options->JAsideBlock)) : ?>
        <!-- <10> 开启 关闭 天气 -->
        <?php $this->need('config/Wether.php'); ?>
    <?php endif; ?>
<?php endif; ?>


<?php if (!isMobile()) : ?>
    <?php if (!empty($this->options->JWindowBlock) && in_array('ShowAPlayer', $this->options->JWindowBlock)) : ?>
        <!-- <11> 开启 关闭 音乐播放器 -->
        <?php $this->need('config/APlayer.php'); ?>
    <?php endif; ?>
<?php endif; ?>



<?php if (!empty($this->options->JWindowBlock) && in_array('ShowConsole', $this->options->JWindowBlock)) : ?>
    <!-- <12> 启用 禁用 代码防偷 -->
    <?php $this->need('config/Console.php'); ?>
<?php endif; ?>



<?php if (!isMobile()) : ?>
    <?php if (!empty($this->options->JWindowBlock) && in_array('ShowContextMenu', $this->options->JWindowBlock)) : ?>
        <!-- <13>  启用 禁用 鼠标右键 -->
        <?php $this->need('config/ContextMenu.php'); ?>
    <?php endif; ?>
<?php endif; ?>



<?php if (!empty($this->options->JWindowBlock) && in_array('ShowProgressBar', $this->options->JWindowBlock)) : ?>
    <!-- <14> 启用 禁用 页面滚动显示进度条 -->
    <?php $this->need('config/ProgressBar.php'); ?>
<?php endif; ?>



<?php if (!isMobile()) : ?>
    <?php if (!empty($this->options->JWindowBlock) && in_array('ShowHeaderScroll', $this->options->JWindowBlock)) : ?>
        <!-- <15> 启用 禁用 头部跟随页面滚动 -->
        <?php $this->need('config/HeaderScroll.php'); ?>
    <?php endif; ?>
<?php endif; ?>



<?php if (!empty($this->options->JWindowBlock) && in_array('ShowBackTop', $this->options->JWindowBlock)) : ?>
    <!-- <16> 启用 禁用 返回顶部按钮 -->
    <?php $this->need('config/BackTop.php'); ?>
<?php endif; ?>




<?php if ($this->options->JAlert) : ?>
    <!-- <17> 启用 禁用 站点公告 -->
    <?php $this->need('config/Alert.php'); ?>
<?php endif; ?>



<?php if ($this->options->JScript) : ?>
    <!-- <18> 启用 禁用 自定义JS -->
    <script type="text/javascript">
        <?php $this->options->JScript() ?>
    </script>
<?php endif; ?>

<?php if (!isMobile()) : ?>
    <?php if (!empty($this->options->JWindowBlock) && in_array('ShowHoverMusic', $this->options->JWindowBlock)) : ?>
        <!-- <19> 启用 禁用 自定义JS -->
        <?php $this->need('config/HoverMusic.php'); ?>
    <?php endif; ?>
<?php endif; ?>