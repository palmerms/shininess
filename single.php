<?php get_header(); ?>
		<main class="fullwidth">
			<section id="titleheader">
				<h2 class="pagetitle">Updates and Events</h2>
			</section>
			<?php if(is_home() && !is_paged()) { } else if (function_exists('shiny_breadcrumbs')) shiny_breadcrumbs(); ?>
			<div class="row clearfix">

				<section id="content2">
				<?php if (have_posts()) : while (have_posts()) : the_post();?>
				<article class="post">
				<h3><?php the_title(); ?></h3>
				<?php the_content(); ?>
				<?php better_page_links(); ?>
				</article>
				<?php comments_template('', true); ?>
				<?php endwhile; endif; ?>
				</section>
				<aside id="sidebar">
				<?php dynamic_sidebar('main'); ?>
				</aside>
			</div>
		</main>
<?php get_footer(); ?>