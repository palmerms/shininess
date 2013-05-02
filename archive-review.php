<?php get_header(); ?>
		<main class="fullwidth">
			<section id="titleheader">
				<h2 class="pagetitle">Latest Posts</h2>
			</section>
			<?php if(is_home() && !is_paged()) { } else if (function_exists('shiny_breadcrumbs')) shiny_breadcrumbs(); ?>
			<div class="row clearfix">
			
			<section id="content">
				<?php if (have_posts()) : while (have_posts()) : the_post();?>
				<article <?php post_class(); ?>>
				
				<h3 class="posttitle"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h3>
				<?php the_post_thumbnail( 'featured' ); ?>
				<div class="byline">Posted <time><?php the_time('l, F j, Y') ?></time></div>

				<?php the_excerpt(); ?>
				<a class="readmore" href="<?php echo get_permalink(); ?>">Read More...</a>
				
				</article>
				<?php endwhile; endif; ?>
				<?php if (function_exists("pagination")) {
					pagination($additional_loop->max_num_pages);
				} ?>
			</section>
			<aside class="sidebar1">
				<?php dynamic_sidebar( 'main' ); ?>
			</aside>
			<aside id="sidebar">
				<?php dynamic_sidebar( 'home' ); ?>
			</aside>
			</div>
			
			

		</main>
<?php get_footer(); ?>