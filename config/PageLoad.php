<?php if (!empty($this->options->JWindowBlock) && in_array('ShowPageLoad', $this->options->JWindowBlock)) : ?>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/typecho_joe_theme@1.0.5/plugin/load/load.min.css" />
    <script>
        $(function() {
            $(".j-load").remove()
        })
    </script>
<?php endif; ?>