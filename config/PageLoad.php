<?php if ($this->options->JCDN == 'close') : ?>
    <link rel="stylesheet" href="<?php $this->options->themeUrl('plugin/load/load.min.css'); ?>" />
<?php else : ?>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/typecho_joe_theme@<?php echo getVersion() ?>/plugin/load/load.min.css" />
<?php endif; ?>

<script>
    document.onreadystatechange = function() {
        if (document.readyState == "complete") {
            $(".j-load").remove()
        }
    }
</script>