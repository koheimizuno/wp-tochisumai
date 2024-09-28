<?php
/**
 * Singular entry template
 *
 * @package lightning
 */

if ( is_page() ) {
	$entry_tag = 'div';
} else {
	$entry_tag = 'article';
}
?>
<<?php echo esc_attr( $entry_tag ); ?> id="post-<?php the_ID(); ?>" <?php post_class( apply_filters( 'lightning_article_outer_class', 'entry entry-full' ) ); ?>>

	<?php
	// check single or loop that true.
	$is_entry_header_display = false; // is_page() and so on .
	if ( is_single() || is_archive() ) {
		$is_entry_header_display = apply_filters( 'lightning_is_entry_header', true );
	}
	?>

	<?php if ( $is_entry_header_display ) : ?>

		<header class="<?php lightning_the_class_name( 'entry-header' ); ?> singleEvent-header">
            <div class="singleEvent-wrap">
                <div class="catch-img">
                    <?php if ( has_post_thumbnail() ) : ?>
                        <img src="<?php echo esc_url( get_the_post_thumbnail_url( null, 'full' ) ); ?>" alt="<?php the_title(); ?>" />
                    <?php endif; ?>
                </div>
                <div class="singleEvent-desc">
                    <h1 class="entry-title">
                        <?php if ( is_single() ) : ?>
                            <?php the_title(); ?>
                        <?php else : ?>
                            <a href="<?php the_permalink(); ?>">
                            <?php the_title(); ?>
                            </a>
                        <?php endif; ?>
                    </h1>
                    <?php lightning_the_entry_meta(); ?>
                </div>
            </div>
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/common/cloud-img.png" alt="" class="cloud-img">
        </header>

	<?php endif; ?>

	<?php do_action( 'lightning_entry_body_before' ); ?>

	<div class="<?php lightning_the_class_name( 'entry-body' ); ?>">
		<?php do_action( 'lightning_entry_body_prepend' ); ?>


		<?php the_content(); ?>

		<div class="b-cta wide-layout section">
			<div class="b-cta-btn-wrap">
				<p class="b-cta-text">事前予約制となりますので<br class="sp-only">お気軽にご連絡ください。</p>
				<a href="<?php echo esc_url(home_url()); ?>/contact/event-form/?post_id=<?php the_ID(); ?>" class="b-cta-btn">イベント・見学会のご予約はこちら</a>
			</div>
			<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/common/cta-bg.jpg" alt="" class="b-cta-bg-img"/>
		</div>

		<div class="b-cta-info section">
			<div class="b-cta-info-item">
				<figure class="b-cta-info-img">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/single/cta-info-img01.jpg" alt=""/>
				</figure>
				<p class="b-cta-info-title">子供がいても安心です</p>
				<p class="b-cta-info-text">お子様連れの方が多いため、キッズスペースをご用意しています。絵本やDVDなどをご用意し、お父様お母様がお打合せに専念していただけるようにしております。お気に入りのDVDをご持参いただくことも可能ですので、是非お子様も一緒にお打合せいらしてください。</p>
			</div>
			<div class="b-cta-info-item">
				<figure class="b-cta-info-img">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/single/cta-info-img02.jpg" alt=""/>
				</figure>
				<p class="b-cta-info-title">お気軽にご相談ください</p>
				<ul class="b-cta-info-ul">
					<li>まったく何から始めたらよいか分からないので相談したい</li>
					<li>土地を持っているが、そこにノーブルホームの家が建つのか確認したい</li>
					<li>良いなと思っている土地と同じような条件の土地が他にあるか教えて欲しい</li>
					<li>間取りを考えてみたい</li>
					<li>資金計画の相談をしてみたい</li>
				</ul>
			</div>
		</div>

		<div class="b-cta-follow wide-layout section">
			<div class="b-cta-btn-wrap">
				<p class="b-cta-text">1つずつ解決していきましょう<br>
				私たちがお手伝いします !</p>
				<a href="<?php echo esc_url(home_url()); ?>/contact/event-form/?post_id=<?php the_ID(); ?>" class="b-cta-btn">イベント・見学会のご予約はこちら</a>
			</div>
			<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/common/cta-folow-bg.jpg" alt="" class="b-cta-bg-img"/>
		</div>

		<div class="b-flow section">
			<p class="event-title-ver b-right m-auto">ご来店の流れ</p>
			<div class="b-flow-content">
			<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/single/flow-bgtext.png" alt="" class="b-flow-textImg"/>
				<div class="b-flow-item">
					<div class="b-flow-desc">
						<p class="b-flow-desc-tit">フォームを送信し<br class="pc-only">来店予約</p>
						<p class="b-flow-desc-text">
							来場希望日前日までにご予約を願います。<br>
							当日等お急ぎの場合はお電話でご連絡ください。
						</p>
					</div>
					<figure class="b-flow-img">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/single/flow-img01.jpg" alt=""/>
					</figure>
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/single/flow01.png" alt="" class="b-flow-num"/>
				</div>
				<div class="b-flow-item">
					<div class="b-flow-desc">
						<p class="b-flow-desc-tit">スタッフから<br class="pc-only">日時のご案内</p>
						<p class="b-flow-desc-text">
							スタッフから、ご来店いただく日時のご連絡、
							ご一報させていただきます。
						</p>
					</div>
					<figure class="b-flow-img">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/single/flow-img02.jpg" alt=""/>
					</figure>
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/single/flow02.png" alt="" class="b-flow-num"/>
				</div>
				<div class="b-flow-item">
					<div class="b-flow-desc">
						<p class="b-flow-desc-tit">来店・相談</p>
						<p class="b-flow-desc-text">
							ご来店の上、土地や間取り・プランなどについての
							ご相談、資料等がありましたら、お待ちください。
						</p>
					</div>
					<figure class="b-flow-img">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/single/flow-img03.jpg" alt=""/>
					</figure>
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/single/flow03.png" alt="" class="b-flow-num"/>
				</div>
				<div class="b-flow-item">
					<div class="b-flow-desc">
						<p class="b-flow-desc-tit">住宅見学のご予約やプランの<br class="pc-only">無料相談</p>
						<p class="b-flow-desc-text">
						専門のスタッフがヒアリングを行い、お客様の
						ご希望に沿ってご提案させていただきます。
						</p>
					</div>
					<figure class="b-flow-img">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/single/flow-img04.jpg" alt=""/>
					</figure>
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/single/flow04.png" alt="" class="b-flow-num"/>
				</div>
			</div>
		</div>

		<div class="b-cta wide-layout section">
			<div class="b-cta-btn-wrap">
				<p class="b-cta-text">事前予約制となりますのでお気軽にご連絡ください。</p>
				<a href="<?php echo esc_url(home_url()); ?>/contact/event-form/?post_id=<?php the_ID(); ?>" class="b-cta-btn">イベント・見学会のご予約はこちら</a>
			</div>
			<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/common/cta-bg.jpg" alt="" class="b-cta-bg-img"/>
		</div>


		<?php do_action( 'lightning_entry_body_apppend' ); ?>
	</div>

	<?php do_action( 'lightning_entry_body_after' ); ?>

	<?php
	$args = array(
		'before'      => '<nav class="page-link"><dl><dt>Pages :</dt><dd>',
		'after'       => '</dd></dl></nav>',
		'link_before' => '<span class="page-numbers">',
		'link_after'  => '</span>',
		'echo'        => 1,
	);
	wp_link_pages( $args );
	?>

	<?php do_action( 'lightning_entry_footer_before' ); ?>


</<?php echo esc_attr( $entry_tag ); ?>><!-- [ /#post-<?php the_ID(); ?> ] -->