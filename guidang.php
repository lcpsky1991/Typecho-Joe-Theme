<?php

/**
 * 归档
 * 
 * @package custom 
 * 
 */

if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('tools/tools.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->need('components/include_head.php'); ?>
</head>

<body>

    <?php $this->need('components/common_header.php'); ?>
    <div class="joe-container">
        <div class="joe-main joe-guidang">
            <div class="article" id="timeline">
                <?php $this->widget('Widget_Contents_Post_Recent', 'pageSize=10000')->to($archives);
                $year = 0;
                $mon = 0;
                $i = 0;
                $j = 0;
                while ($archives->next()) :
                    $year_tmp = date('Y', $archives->created);
                    $mon_tmp = date('m', $archives->created);
                    if ($mon != $mon_tmp && $mon > 0) $output .= '</ul></div>';
                    if ($year != $year_tmp && $year > 0) $output .= '</ul></div>';
                    if ($mon != $mon_tmp) {
                        $mon = $mon_tmp;
                        $output .= '<div class="item"><span>' . $year_tmp . '年' . $mon_tmp . '月</span><ul>';
                    }
                    $output .= '<li><a href="' . $archives->permalink . '">' . $archives->title . '</a>';
                    $output .= '</li>';
                endwhile;
                $output .= '</ul></div>';
                echo $output;
                ?>
            </div>

            <?php if (!empty($this->options->postBlock) && in_array('ShowPostComment', $this->options->postBlock)) : ?>
                <?php $this->need('components/common_comment.php'); ?>
            <?php endif; ?>
        </div>
    </div>

    <?php $this->need('components/common_footer.php'); ?>
    <?php $this->need('components/include_foot.php'); ?>
</body>

</html>