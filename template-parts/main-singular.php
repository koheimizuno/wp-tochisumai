<?php
/**
 * Singular main template
 *
 * @package Lightning G3
 */

if ( apply_filters( 'lightning_is_extend_single', false ) ) :
	do_action( 'lightning_extend_single' );
else :
	if ( have_posts() ) :
		while ( have_posts() ) :
			the_post();
			
			// 投稿が「イベント」カテゴリーに属しているかをチェック
			if ( has_category( 'event', $post ) ) {
				// 「イベント」カテゴリー用のテンプレートを読み込む
				$template = 'template-parts/entry-event.php';
				$return   = locate_template( $template );
				if ( $return ) {
					locate_template( $template, true );
				} else {
					lightning_get_template_part( 'template-parts/entry', get_post_type() );
				}
			} else {
				// デフォルトのテンプレート読み込み処理
				$template = 'template-parts/entry-' . esc_attr( $post->post_name ) . '.php';
				$return   = locate_template( $template );
				if ( $return && get_post_type() !== $post->post_name ) {
					locate_template( $template, true );
				} else {
					lightning_get_template_part( 'template-parts/entry', get_post_type() );
				}
			}

			do_action( 'lightning_comment_before' );
			comments_template( '', true );
			do_action( 'lightning_comment_after' );

			if ( !is_singular( 'case' ) && !has_category( 'event', $post )) {
				if ( apply_filters( 'lightning_is_next_prev', is_single(), 'next_prev' ) ) {
					lightning_get_template_part( 'template-parts/next-prev', get_post_type() );
				}
			}

		endwhile;
	endif;
endif;