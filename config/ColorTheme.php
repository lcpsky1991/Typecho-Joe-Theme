<?php if (!empty($this->options->JWindowBlock) && in_array('ShowColorTheme', $this->options->JWindowBlock)) : ?>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/typecho_joe_theme@<?php echo getVersion() ?>/plugin/colpick/colpick.min.css" />
    <script src="//cdn.jsdelivr.net/npm/typecho_joe_theme@<?php echo getVersion() ?>/plugin/colpick/colpick.min.js"></script>
    <script>
        $(function() {
            /* 初始化主题色 */
            <?php if ($this->options->JGlobalTheme) : ?>
                $('body').css('--theme-color', localStorage.getItem('--theme-color') || '<?php $this->options->JGlobalTheme() ?>');
            <?php else : ?>
                $('body').css('--theme-color', localStorage.getItem('--theme-color') || '#4e7cf2');
            <?php endif; ?>

            /* 记忆颜色设置器 */
            $('#picker').colpick({
                flat: true,
                layout: 'hex',
                submit: false,
                color: localStorage.getItem('--theme-color') || <?php if ($this->options->JGlobalTheme) : ?> '<?php $this->options->JGlobalTheme() ?>'
            <?php else : ?> '#4e7cf2'
            <?php endif; ?>,

            colorScheme: 'dark',
            onChange(a, b, c) {
                $('body').css('--theme-color', '#' + b);
                localStorage.setItem('--theme-color', '#' + b);
            }
            });
            $('#showPicker').on('click', function(e) {
                e.stopPropagation();
                $('#picker').toggleClass('active');
            });
            $('#picker').on('click', function(e) {
                e.stopPropagation();
            });
        })
    </script>
<?php else : ?>
    <script>
        $(function() {
            <?php if ($this->options->JGlobalTheme) : ?>
                $('body').css('--theme-color', '<?php $this->options->JGlobalTheme() ?>');
            <?php else : ?>
                $("body").css("--theme-color", "#4e7cf2")
            <?php endif; ?>
        });
    </script>
<?php endif; ?>