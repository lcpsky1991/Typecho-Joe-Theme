<!-- 相关推荐 -->
<?php $this->related(4)->to($relatedPosts); ?>
<?php if ($relatedPosts->have()) : ?>
    <div class="j-relevant">
        <div class="title">相关推荐</div>
        <ul>
            <?php while ($relatedPosts->next()) : ?>
                <li>
                    <a href="<?php $relatedPosts->permalink(); ?>">
                        <img class="lazyload" src="<?php $this->options->themeUrl('assets/img/lazyload.jpg'); ?>" data-original="<?php showThumbnail($relatedPosts); ?>">
                        <span><?php $relatedPosts->title(); ?></span>
                    </a>
                </li>
            <?php endwhile; ?>
        </ul>
    </div>
<?php endif; ?>