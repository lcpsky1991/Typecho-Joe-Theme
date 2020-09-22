<?php if (!empty($this->options->JWindowBlock) && in_array('ShowPageLoad', $this->options->JWindowBlock)) : ?>
    <?php if ($this->options->JCDN == 'close') : ?>
        <link rel="stylesheet" href="<?php $this->options->themeUrl('plugin/load/load.min.css'); ?>" />
    <?php else : ?>
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/typecho_joe_theme@<?php echo getVersion() ?>/plugin/load/load.min.css" />
    <?php endif; ?>

    <script>
        $(function() {
            $(".j-load").remove()
        })
    </script>
<?php endif; ?>