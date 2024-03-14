<?php

$shortURL = get_permalink();
	
$shortTitle = get_the_title();

$thumb = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ) );

$thumbnail = '';

if ( $thumb ) : $thumbnail = ( $thumb[0] != '' ) ? '' . $thumb[0] . '' : '""'; endif;

$social_title = get_theme_mod('asap_social_title'); 
	
if ( $social_title ) : 

?>
	
<span class="social-title"><?php echo $social_title; ?></span>

<?php endif; ?>

<div class="social-buttons flexbox">
		
	<?php if ( get_theme_mod('asap_show_facebook') ) :  ?>
	
	<a title="Facebook" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $shortURL; ?>" class="asap-icon-single icon-facebook" target="_blank" rel="nofollow noopener"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 10v4h3v7h4v-7h3l1 -4h-4v-2a1 1 0 0 1 1 -1h3v-4h-3a5 5 0 0 0 -5 5v2h-3" /></svg></a>
	
	<?php endif; ?>
	
	<?php if ( get_theme_mod('asap_show_facebookm') ) :  ?>
	
	<a title="Facebook Messenger" href="fb-messenger://share/?link=<?php echo $shortURL; ?>" class="asap-icon-single icon-facebook-m" target="_blank" rel="nofollow noopener"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 20l1.3 -3.9a9 8 0 1 1 3.4 2.9l-4.7 1" /><path d="M8 13l3 -2l2 2l3 -2" /></svg></a>
	
	<?php endif; ?>		
	
	<?php if ( get_theme_mod('asap_show_twitter') ) :  ?>
	
	<a title="Twitter" href="https://twitter.com/intent/tweet?text=<?php echo $shortTitle;?>&url=<?php echo $shortURL; ?>" class="asap-icon-single icon-twitter" target="_blank" rel="nofollow noopener" viewBox="0 0 24 24"><svg xmlns="http://www.w3.org/2000/svg"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M22 4.01c-1 .49 -1.98 .689 -3 .99c-1.121 -1.265 -2.783 -1.335 -4.38 -.737s-2.643 2.06 -2.62 3.737v1c-3.245 .083 -6.135 -1.395 -8 -4c0 0 -4.182 7.433 4 11c-1.872 1.247 -3.739 2.088 -6 2c3.308 1.803 6.913 2.423 10.034 1.517c3.58 -1.04 6.522 -3.723 7.651 -7.742a13.84 13.84 0 0 0 .497 -3.753c-.002 -.249 1.51 -2.772 1.818 -4.013z" /></svg></a>
	
	<?php endif; ?>	
	
	<?php if ( get_theme_mod('asap_show_pinterest') ) :  ?>
	
	<a title="Pinterest" href="https://pinterest.com/pin/create/button/?url=<?php echo $shortURL; ?>&media=<?php echo $thumbnail; ?>" class="asap-icon-single icon-pinterest" target="_blank" rel="nofollow noopener"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="8" y1="20" x2="12" y2="11" /><path d="M10.7 14c.437 1.263 1.43 2 2.55 2c2.071 0 3.75 -1.554 3.75 -4a5 5 0 1 0 -9.7 1.7" /><circle cx="12" cy="12" r="9" /></svg></a>
	
	<?php endif; ?>	
	
	<?php if ( get_theme_mod('asap_show_whatsapp') ) :  ?>
	
	<a title="WhatsApp" href="https://wa.me/?text=<?php echo $shortTitle;?>%20-%20<?php echo $shortURL; ?>" class="asap-icon-single icon-whatsapp" target="_blank" rel="nofollow noopener"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 21l1.65 -3.8a9 9 0 1 1 3.4 2.9l-5.05 .9" /> <path d="M9 10a.5 .5 0 0 0 1 0v-1a.5 .5 0 0 0 -1 0v1a5 5 0 0 0 5 5h1a.5 .5 0 0 0 0 -1h-1a.5 .5 0 0 0 0 1" /></svg></a>	
	
	<?php endif; ?>
	
	<?php if ( get_theme_mod('asap_show_tumblr') ) :  ?>
	
	<a title="Tumblr" href="https://tumblr.com/widgets/share/tool?canonicalUrl=<?php echo $shortURL;?>" class="asap-icon-single icon-tumblr" target="_blank" rel="nofollow noopener"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M14 21h4v-4h-4v-6h4v-4h-4v-4h-4v1a3 3 0 0 1 -3 3h-1v4h4v6a4 4 0 0 0 4 4" /></svg></a>	
	
	<?php endif; ?>
		
	<?php if ( get_theme_mod('asap_show_linkedin') ) :  ?>
	
	<a title="LinkedIn" href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo $shortURL;?>&title=<?php echo $shortTitle; ?>" class="asap-icon-single icon-linkedin" target="_blank" rel="nofollow noopener"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><rect x="4" y="4" width="16" height="16" rx="2" /><line x1="8" y1="11" x2="8" y2="16" /><line x1="8" y1="8" x2="8" y2="8.01" /><line x1="12" y1="16" x2="12" y2="11" /><path d="M16 16v-3a2 2 0 0 0 -4 0" /></svg></a>	
	
	<?php endif; ?>
		
	<?php if ( get_theme_mod('asap_show_telegram') ) :  ?>
	
	<a title="Telegram" href="https://t.me/share/url?url=<?php echo $shortURL;?>&text=<?php echo $shortTitle; ?>" class="asap-icon-single icon-telegram" target="_blank" rel="nofollow noopener"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M15 10l-4 4l6 6l4 -16l-18 7l4 2l2 6l3 -4" /></svg></a>	

	<?php endif; ?>	
	
	<?php if ( get_theme_mod('asap_show_email') ) :  ?>
	
	<a title="Email" href="mailto:?subject=<?php echo $shortTitle; ?>&amp;body=<?php echo $shortURL;?>" class="asap-icon-single icon-email" target="_blank" rel="nofollow noopener"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><rect x="3" y="5" width="18" height="14" rx="2" /><polyline points="3 7 12 13 21 7" /></svg></a>	
	<?php endif; ?>	
	
	<?php if ( get_theme_mod('asap_show_reddit') ) :  ?>	
		
	<a title="Reddit" href="http://reddit.com/submit?url=<?php echo $shortURL; ?>&amp;title=<?php echo $shortTitle; ?>" class="asap-icon-single icon-reddit" target="_blank" rel="nofollow noopener"><svg xmlns="http://www.w3.org/2000/svg"viewBox="0 0 24 24"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 8c2.648 0 5.028 .826 6.675 2.14a2.5 2.5 0 0 1 2.326 4.36c0 3.59 -4.03 6.5 -9 6.5c-4.875 0 -8.845 -2.8 -9 -6.294l-1 -.206a2.5 2.5 0 0 1 2.326 -4.36c1.646 -1.313 4.026 -2.14 6.674 -2.14z" /><path d="M12 8l1 -5l6 1" /><circle cx="19" cy="4" r="1" /><circle cx="9" cy="13" r=".5" fill="currentColor" /><circle cx="15" cy="13" r=".5" fill="currentColor" /><path d="M10 17c.667 .333 1.333 .5 2 .5s1.333 -.167 2 -.5" /></svg></a>	
	
	<?php endif; ?>	
	
</div>