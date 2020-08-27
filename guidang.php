<?php

/**
 * 归档
 * 
 * @package custom 
 * 
 */
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->need('components/include.php'); ?>
    <?php $this->header(); ?>
    <link rel="stylesheet" href="<?php $this->options->themeUrl('assets/css/guidang.css'); ?>">
</head>

<body>
    <?php $this->need('components/header.php'); ?>
    <div class="j-guidang">
        <div class="timeline" id="timeline">
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
    </div>
    <?php $this->need('components/footer.php'); ?>
</body>

</html>