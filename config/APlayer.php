<meting-js id="<?php $this->options->JMeting(); ?>" lrc-type="1" server="netease" theme="#ebebeb" autoplay type="playlist" fixed="true" list-olded="true"></meting-js>
<?php if ($this->options->JCDN == 'close') : ?>
    <link rel="stylesheet" href="<?php $this->options->themeUrl('plugin/aplayer/aplayer.min.css'); ?>" />
    <script src="<?php $this->options->themeUrl('plugin/aplayer/aplayer.min.js'); ?>"></script>
    <script src="<?php $this->options->themeUrl('plugin/aplayer/meting.min.js'); ?>"></script>
<?php else : ?>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/typecho_joe_theme@<?php echo getVersion() ?>/plugin/aplayer/aplayer.min.css" />
    <script src="//cdn.jsdelivr.net/npm/typecho_joe_theme@<?php echo getVersion() ?>/plugin/aplayer/aplayer.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/typecho_joe_theme@<?php echo getVersion() ?>/plugin/aplayer/meting.min.js"></script>
<?php endif; ?>