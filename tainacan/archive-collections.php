<?php get_header(); ?>

<article>
  <div
    id="av_section_1"
    class="
      avia-section
      main_color
      avia-section-default
      avia-no-border-styling
      avia-bg-style-scroll
      avia-builder-el-0
      el_before_av_codeblock
      avia-builder-el-first
      container_wrap
      fullsize
      tainacan-collection-archive__header
    "
    style="
      background-color: #b6181d;
      background-repeat: no-repeat;
      background-image: url(https://cmqueixadas.com.br/wp-content/uploads/2020/09/banner.jpg);
      background-attachment: scroll;
      background-position: top left;
    "
    data-section-bg-repeat="no-repeat"
  >
    <div class="container">
      <main
        role="main"
        itemprop="mainContentOfPage"
        class="template-page content av-content-full alpha units"
      >
        <div class="post-entry post-entry-type-page post-entry-2063">
          <div class="entry-content-wrapper clearfix">
            <div
              class="
                flex_column_table
                av-equal-height-column-flextable
                -flextable
              "
            >
              <div
                class="
                  flex_column
                  av_one_half av-animated-generic
                  left-to-right
                  flex_column_table_cell
                  av-equal-height-column av-align-top av-zero-column-padding
                  first
                  avia-builder-el-1
                  el_before_av_one_third
                  avia-builder-el-first
                  avia_start_animation
                  avia_start_delayed_animation
                "
                style="border-radius: 0px"
              >
                <section
                  class="av_textblock_section"
                  itemscope="itemscope"
                  itemtype="https://schema.org/CreativeWork"
                >
                  <div
                    class="avia_textblock av_inherit_color"
                    style="font-size: 25px; color: #ffffff"
                    itemprop="text"
                  >
                    <h2 style="text-align: right">FIRMEZA PERMANENTE</h2>
                    <h3 style="text-align: right">
                      Perus um bairro de <strong>luta </strong>e<br />
                      <strong>memória</strong>
                    </h3>
                    <p style="text-align: right">
                      <a href="/"
                        ><span style="font-family: postillion; font-size: 24pt"
                          >VOLTAR PARA A PÁGINA PRINCIPAL</span
                        ></a
                      >
                    </p>
                  </div>
                </section>
              </div>
              <div class="av-flex-placeholder"></div>
              <div
                class="
                  flex_column
                  av_one_third av-animated-generic
                  right-to-left
                  flex_column_table_cell
                  av-equal-height-column av-align-top
                  avia-builder-el-3
                  el_after_av_one_half el_before_av_one_fifth
                  avia_start_animation avia_start_delayed_animation
                "
                style="
                  background: #080707;
                  padding: 20px;
                  background-color: #080707;
                  border-radius: 0px;
                "
              >
                <section
                  class="av_textblock_section"
                  itemscope="itemscope"
                  itemtype="https://schema.org/CreativeWork"
                >
                  <div
                    class="avia_textblock av_inherit_color"
                    style="font-size: 20px; color: #ffffff"
                    itemprop="text"
                  >
                    <h4 style="text-align: left">
                      Acervo<br />
                      de memória<br />
                      e preservação
                    </h4>
                  </div>
                </section>
              </div>
              <div class="av-flex-placeholder"></div>
              <div
                class="
                  flex_column
                  av_one_fifth
                  flex_column_table_cell
                  av-equal-height-column av-align-top
                  avia-builder-el-5
                  el_after_av_one_fourth el_before_av_hr
                "
                style="padding: 20px; border-radius: 0px"
              ></div>
            </div>
            <!--close column table wrapper. Autoclose: 1 -->
            <div
              style="height: 30px"
              class="
                hr hr-invisible
                avia-builder-el-6
                el_after_av_one_fifth
                avia-builder-el-last
              "
            >
              <span class="hr-inner"><span class="hr-inner-style"></span></span>
            </div>
          </div>
        </div>
      </main>
      <!-- close content main element -->
      <main class="entry-content tainacan-collection-archive">

<?php

global $avia_config;

// check if we got posts to display:
if (have_posts()) :
	$first = true;

	$counterclass = "";
	$post_loop_count = 1;
	$page = (get_query_var('paged')) ? get_query_var('paged') : 1;
	if($page > 1) $post_loop_count = ((int) ($page - 1) * (int) get_query_var('posts_per_page')) +1;
	$blog_style = avia_get_option('blog_style','multi-big');

	while ( have_posts() ) : the_post();


	$the_id 		= get_the_ID();
	$parity         = $post_loop_count % 2 ? 'odd' : 'even';
	$last           = count($wp_query->posts) == $post_loop_count ? " post-entry-last " : "";
	$post_class 	= "post-entry-".$the_id." post-loop-".$post_loop_count." post-parity-".$parity.$last." ".$blog_style;
	$post_format 	= get_post_format() ? get_post_format() : 'standard';

	?>

	<article <?php post_class('tainacan-collection-archive__collection post-entry post-entry-type-'.$post_format . " " . $post_class . " "); avia_markup_helper(array('context' => 'entry')); ?> >
        <a href="<?php echo get_permalink(); ?>" >
            <div class="entry-content-wrapper clearfix <?php echo $post_format; ?>-content">

                <header class="entry-content-header">
                    <?php if ( has_post_thumbnail() ) : 
                        $thumbnail_id = get_post_thumbnail_id( get_the_ID() );
                        $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true); ?>
                        <img src="<?php the_post_thumbnail_url( 'large' ) ?>" class="tainacan-collection-archive__collection-img" alt="<?php echo esc_attr($alt); ?>">  
                    <?php endif; ?>

                    <?php
                    
                    $default_heading = 'h2';
                    $args = array(
                                'heading'		=> $default_heading,
                                'extra_class'	=> ''
                            );

                    /**
                     * @since 4.5.5
                     * @return array
                     */
                    $args = apply_filters( 'avf_customize_heading_settings', $args, 'loop_search', array() );

                    $heading = ! empty( $args['heading'] ) ? $args['heading'] : $default_heading;
                    $css = ! empty( $args['extra_class'] ) ? $args['extra_class'] : '';
                
                    echo "<{$heading} class='post-title entry-title {$css}>'>" . get_the_title(). "</{$heading}>";

                    ?>
                </header>

                <?php
                    echo '<div class="entry-content" '.avia_markup_helper(array('context' => 'entry_content','echo'=>false)).'>';
                    $excerpt = trim(get_the_excerpt());
                    if(!empty($excerpt))
                    {
                        the_excerpt();
                    }
                    else
                    {
                        $excerpt = strip_shortcodes( get_the_content() );
                        $excerpt = apply_filters('the_excerpt', $excerpt);
                        $excerpt = str_replace(']]>', ']]&gt;', $excerpt);
                        echo $excerpt;
                    }
                    echo '</div>';
                ?>
            </div>
        </a>
        <footer class="entry-footer"></footer>
        
        <?php do_action('ava_after_content', $the_id, 'loop-search'); ?>
	</article><!--end post-entry-->

	<?php


		$first = false;
		$post_loop_count++;
		if($post_loop_count >= 100) $counterclass = "nowidth";
	endwhile;
	else:


?>

	<article class="entry entry-content-wrapper clearfix" id='search-fail'>
            <p class="entry-content" <?php avia_markup_helper(array('context' => 'entry_content')); ?>>
                <strong><?php _e('Nothing Found', 'avia_framework'); ?></strong><br/>
               <?php _e('Sorry, no posts matched your criteria. Please try another search', 'avia_framework'); ?>
            </p>

            <div class='hr_invisible'></div>

            <section class="search_not_found">
                <p><?php _e('You might want to consider some of our suggestions to get better results:', 'avia_framework'); ?></p>
                <ul>
                    <li><?php _e('Check your spelling.', 'avia_framework'); ?></li>
                    <li><?php _e('Try a similar keyword, for example: tablet instead of laptop.', 'avia_framework'); ?></li>
                    <li><?php _e('Try using more than one keyword.', 'avia_framework'); ?></li>
                </ul>
        <?php
		
		/**
		 * Additional output when nothing found in search
		 * 
		 * @since 4.1.2
		 * @added_by günter
		 * @return string			cutom HTML escaped for echo | ''
		 */
		$custom_no_earch_result = apply_filters( 'avf_search_results_pagecontent', '' );
		echo $custom_no_earch_result;
		
		
        echo '</section>';
	echo "</article>";

	endif;
	echo avia_pagination('', 'nav');
?>

</main>
    </div>
  </div>

  
<?php get_footer(); ?>
