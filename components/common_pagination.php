<!-- 分页 -->

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
