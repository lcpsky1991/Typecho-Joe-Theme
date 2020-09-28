<?php if (!isMobile()) : ?>
    <?php $this->pageNav(
        '上一页',
        '下一页',
        1,
        '...',
        array(
            'wrapTag' => 'ul',
            'wrapClass' => 'j-pagination',
            'itemTag' => 'li',
            'textTag' => 'a',
            'currentClass' => 'active',
            'prevClass' => 'prev',
            'nextClass' => 'next'
        )
    );
    ?>
<?php else : ?>
    <?php $this->pageNav(
        'Prev',
        'Next',
        0,
        '...',
        array(
            'wrapTag' => 'ul',
            'wrapClass' => 'j-pagination',
            'itemTag' => 'li',
            'textTag' => 'a',
            'currentClass' => 'active',
            'prevClass' => 'prev',
            'nextClass' => 'next'
        )
    );
    ?>
<?php endif; ?>