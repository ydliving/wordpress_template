<?php get_header(); ?>
<div id="wrap-left">
	<div class="newInfor">
		<div class="hB">
			<a href="<?php echo get_option('Home'); ?>" title="首页">首页</a><em> &raquo; </em>
			<?php
			if( is_single() ){
				$categorys = get_the_category();
				$category = $categorys[0];
				echo( get_category_parents($category->term_id,true,'<em> &raquo; </em>') );echo '正文';
			} elseif ( is_page() ){
				the_title();
			} elseif ( is_category() ){
				single_cat_title();
			} elseif ( is_tag() ){
				single_tag_title();
			} elseif ( is_day() ){
				the_time('Y年Fj日');
			} elseif ( is_month() ){
				the_time('Y年F');
			} elseif ( is_year() ){
				the_time('Y年');
			} elseif ( is_search() ){
				echo htmlspecialchars($s).' 的搜索结果';
			}
			?>
		</div>
		<div class="pcon">
			<div id="content" class="cl">
				<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
					<div class="post-content cl">
						<?php the_content(); ?>
					</div>
				</div><!--content-->
			</div>
		</div>

		<?php if (comments_open()) comments_template( '', true ); ?>
	<?php endwhile; ?>

</div><!--wrap-left-->

<div id="wrap-right">
	<?php get_sidebar(); ?>
</div>
<div class="cl"></div>
<?php get_footer(); ?>