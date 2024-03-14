<?php 

add_action('wp_head', 'asap_setup_schema');

function asap_setup_schema()
	
{

$asap_schema_organization = get_theme_mod('asap_schema_organization', true);
$asap_schema_article = get_theme_mod('asap_schema_article', true);
$asap_schema_search = get_theme_mod('asap_schema_search', true);
$asap_enable_schema_video = get_theme_mod( 'asap_enable_schema_video', false);

$site_URL = home_url();
$site_title = get_bloginfo('title');
$site_description = get_bloginfo('description') ? get_bloginfo('description') : get_bloginfo('title');
$site_logo_id = get_theme_mod('custom_logo');
$site_logo = wp_get_attachment_image_src($site_logo_id, 'full');
$videoID = '';
	
if ( is_single () )
{
	$excerpt = wp_trim_words(get_the_excerpt());
	$post_id = get_queried_object_id();
	$post_author_id = get_post_field( 'post_author', $post_id );
	$author_url = get_author_posts_url( $post_author_id );
	$post_url = get_permalink();
	$post_title = get_post_meta( get_the_ID(), 'single_bc_text', true ); 
	if ( ! $post_title )
	{
		$post_title = get_the_title();
	}
	$post_title = str_replace(array('\'', '"'), '', $post_title); 
	
}
	
?>



<!-- Schema: Organization -->
<?php
	
$organization = array(
	"@context" => "http://schema.org",
	"@type" => "Organization",
	"name" => $site_title,
	"alternateName" => $site_description,
	"url" => $site_URL
);

if ( has_custom_logo() ) 
{
	$organization['logo'] = esc_url( wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ), 'full' )[0] );
}

?>

<?php if ( isset($organization) && $asap_schema_organization ) : ?>
<script type="application/ld+json">
	<?php echo json_encode( $organization ); ?>
</script>
<?php endif; ?>


<!-- Schema: Article -->
<?php
if ( is_single() && !is_attachment() ) 
{
    $article = array(
        "@context" => "https://schema.org",
        "@type" => "Article",
        "mainEntityOfPage" => array(
            "@type" => "WebPage",
            "@id" => get_permalink(),
        ),
        "headline" => addslashes($post_title),
    );

    if ( has_post_thumbnail() ) 
	{
        $article["image"] = array(
            "@type" => "ImageObject",
            "url" => get_the_post_thumbnail_url(get_the_ID(), 'full'),
        );
    }

    $article["author"] = array(
        "@type" => "Person",
        "name" => get_the_author_meta('display_name', $post_author_id),
		 "sameAs" => $author_url,
    );

    $article["publisher"] = array(
        "@type" => "Organization",
        "name" => $site_title,
    );

    if ( has_custom_logo() ) 
	{
        $article["publisher"]["logo"] = array(
            "@type" => "ImageObject",
            "url" => $site_logo[0],
        );
    }

    $article["datePublished"] = get_the_date('Y-m-d H:i');
    $article["dateModified"] = get_the_modified_date('Y-m-d H:i');
}
?>

<?php if ( isset($article) && $asap_schema_article  ) : ?>
    <script type="application/ld+json">
        <?php echo json_encode( $article ); ?>
    </script>
<?php endif; ?>



<!-- Schema: Search -->
<?php
if ( get_theme_mod('asap_show_search') || get_theme_mod('asap_show_search_menu') ) 
{
    $search = array(
        "@context" => "https://schema.org",
        "@type" => "WebSite",
        "url" => $site_URL,
        "potentialAction" => array(
            "@type" => "SearchAction",
            "target" => array(
                "@type" => "EntryPoint",
                "urlTemplate" => $site_URL . "/?s={s}",
            ),
            "query-input" => "required name=s",
        ),
    );
}
?>

<?php if ( isset($search) && $asap_schema_search  ) : ?>
    <script type="application/ld+json">
        <?php echo json_encode( $search ); ?>
    </script>
<?php endif; ?>




<!-- Schema: Video -->

<?php		
if ( ( is_single() || is_page() ) && $asap_enable_schema_video ) {

    global $post;

    $content = $post->post_content;

    preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/\s]{11})%i', $content, $match);

    $videoID = $match[1] ?? false;

    if ( $videoID ) {

        if ( get_theme_mod( 'asap_youtube_api_key' ) ) {

            $transient_name = 'asap_video_cache_' . $videoID;

            $video_cache = get_transient( $transient_name );

            if ( ! $video_cache ) {
				
                $googleApiUrl = 'https://www.googleapis.com/youtube/v3/videos?id=' . $videoID . '&key=' . $apikey . '&part=snippet';

                $ch = curl_init();
                curl_setopt( $ch, CURLOPT_HEADER, 0 );
                curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );
                curl_setopt( $ch, CURLOPT_URL, $googleApiUrl );
                curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1 );
                curl_setopt( $ch, CURLOPT_VERBOSE, 0 );
                curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false );

                $response = curl_exec( $ch );
                curl_close( $ch );

                $data = json_decode( $response );
                $value = json_decode( json_encode( $data ), true );

                $video_title = $value['items'][0]['snippet']['title'];
                $video_description = $value['items'][0]['snippet']['description'];
                $video_upload = $value['items'][0]['snippet']['publishedAt'];
                $video_thumb = $value['items'][0]['snippet']['thumbnails']['maxres']['url'];

                if ( $video_title && $video_upload && $video_thumb ) {

                    $video_data = array(
                        "@context" => "https://schema.org",
                        "@type" => "VideoObject",
                        "name" => $video_title,
                        "description" => $video_description,
                        "thumbnailUrl" => array(
                            $video_thumb,
                        ),
                        "uploadDate" => $video_upload,
                        "embedUrl" => "https://www.youtube.com/embed/$videoID",
                    );

					$transtient_data = json_encode($video_data);

                    set_transient( $transient_name, $transtient_data, DAY_IN_SECONDS );
					
     				$video_cache = get_transient( $transient_name );

                }

            }

            if ( $video_cache ) {

                ?>

                <script type="application/ld+json">
                    <?php echo $video_cache; ?>
                </script>

                <?php

            }

        }

    }

}

?>

<?php } ?>