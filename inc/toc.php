<?php
/*
 * Table of Content - Native post index
*/
class Toc
{
	private $content;
	private $count;
	private $title;
	private $level;
	private $text;

	public function __construct($content)
	{
		if (get_theme_mod('asap_exclude_h3_tags')) {
			preg_match_all("#<[hH]([2])[^>]*?>(.*?)</[hH][2]>#is", $content, $match);
		} else {
			preg_match_all("#<[hH]([2-3])[^>]*?>(.*?)</[hH][2-3]>#is", $content, $match);
		}
		$this->content = $content;
		$this->count = count($match[0]);
		$this->title = $match[0];
		$this->level = $match[1];
		$this->text = $match[2];
	}

	public function getDataToc()
	{
		$toc = [];
		$count = $this->count;
		$level = $this->level;
		$text = $this->text;

		for ($i = 0, $j = 0; $i < $count; $i++, $j++) {
			if ($i === 0) {
				$toc[$i]['list_open'] = true;
				$toc[$i]['item_open'] = true;
				$toc[$i]['text'] = $text[$i];
				$toc[$i]['href'] = $this->getHref($text[$i]);
				if (!isset($level[$i + 1])) {
					$level[$i + 1] = null;
				}
				$toc[$i]['item_close'] = $level[$i] == $level[$i + 1] || (!isset($level[$i + 1]));
				$toc[$i]['list_close'] = $level[$i] > $level[$i + 1] || (!isset($level[$i + 1]));
				continue;
			}
			if ($i == $count - 1) {
				$toc[$j]['list_open'] = $level[$i] > $level[$i - 1];
				$toc[$j]['item_open'] = true;
				$toc[$j]['text'] = $text[$i];
				$toc[$j]['href'] = $this->getHref($text[$i]);
				$toc[$j]['item_close'] = true;
				$toc[$j]['list_close'] = $level[$i] > $level[$i - 1];
				++$j;
				$toc[$j]['list_open'] = false;
				$toc[$j]['item_open'] = false;
				$toc[$j]['text'] = "";
				$toc[$j]['href'] = "";
				$toc[$j]['item_close'] = true;
				$toc[$j]['list_close'] = true;
				break;
			}
			$toc[$j]['list_open'] = $level[$i] > $level[$i - 1];
			$toc[$j]['item_open'] = true;
			$toc[$j]['text'] = $text[$i];
			$toc[$j]['href'] = $this->getHref($text[$i]);
			$toc[$j]['item_close'] = $level[$i] >= $level[$i + 1];
			$toc[$j]['list_close'] = $level[$i] > $level[$i + 1];
			if ($level[$i] > $level[$i + 1]) {
				++$j;
				$toc[$j]['list_open'] = false;
				$toc[$j]['item_open'] = false;
				$toc[$j]['text'] = "";
				$toc[$j]['href'] = "";
				$toc[$j]['item_close'] = true;
				$toc[$j]['list_close'] = false;
			}
		}
		return $toc;
	}


	public function getPost($content)
	{
		$count = $this->count;
		$level = $this->level;
		$title = $this->title;
		$text = $this->text;

		for ($i = 0; $i < $count; $i++) {
			$tag_id = strip_tags($this->getTagId($text[$i]));
			$class_attribute = $this->getClassAttribute($title[$i]);
			$id_attribute = $this->getIdAttribute($title[$i]);
			$style_attribute = $this->getStyleAttribute($title[$i]);
			$inner_text = strip_tags($title[$i], '<b><a><i><em><u><s><strong>');

			$header_tag = 'h' . $level[$i];

			$new_title = sprintf(
				'<%s%s%s%s><span id="%s">%s</span></%s>',
				$header_tag,
				$id_attribute,
				$class_attribute,
				$style_attribute,
				$tag_id,
				$inner_text,
				$header_tag
			);

			$content = str_replace($title[$i], $new_title, $content);
		}

		return $content;
	}



	public function getToc()
	{
		ob_start();
		$dataToc = $this->getDataToc();
		$count = 0;
		$asap_index_list = get_theme_mod('asap_index_list');
		if (!$asap_index_list) {
			$asap_index_list = 1;
		}
		foreach ($dataToc as $item) : ?>
			<?php $count++; ?>
			<?php if ($item['list_open']) : ?>
				<?php if ($asap_index_list == 1) : ?>
					<ol <?php if ($count == 1) : ?> id="index-table" <?php
																endif; ?>>
					<?php else : ?>
						<ul <?php if ($count == 1) : ?> id="index-table" <?php
																		endif; ?>>
						<?php endif; ?>

					<?php endif ?>
					<?php if ($item['item_open']) : ?>
						<li>
						<?php endif ?>
						<?php if ($item['text']) : ?><a href="#<?= $this->getTagId(strip_tags($item['text'])) ?>" title="<?= strip_tags($item['text']) ?>"><?= strip_tags($item['text']) ?></a>
						<?php endif ?>
						<?php if ($item['item_close']) : ?>
						</li>
					<?php endif ?>
					<?php if ($item['list_close']) : ?>
						<?php if ($asap_index_list == 1) : ?>
						</ol>
					<?php else : ?>
						</ul>
					<?php endif; ?>
				<?php endif ?>
			<?php endforeach;
			$toc = ob_get_clean();
			return $toc;
	}

	protected function getHref($str)
	{
		
		$str = strtolower($str);
		$str = str_replace(array('á', 'é', 'í', 'ó', 'ú'), array('a', 'e', 'i', 'o', 'u'), $str);
		$str = str_replace(array('Á', 'É', 'Í', 'Ó', 'Ú'), array('a', 'e', 'i', 'o', 'u'), $str);
		$str = str_replace('.', '', $str);
		$str = preg_replace('/[^a-z0-9_]+/', '_', $str);
		return "#" . $str;
	}
	protected function getTagId($str)
	{
		$str = strip_tags($str); 
		$str = strtolower($str);
		$str = str_replace(array('á', 'é', 'í', 'ó', 'ú'), array('a', 'e', 'i', 'o', 'u'), $str);
		$str = str_replace(array('Á', 'É', 'Í', 'Ó', 'Ú'), array('a', 'e', 'i', 'o', 'u'), $str);
		$str = str_replace('.', '', $str);
		$str = preg_replace('/[^a-z0-9_]+/', '_', $str);
		$str = str_replace(' ', '_', $str);
		$str = ltrim($str, '_'); 
		return $str;
	}


private function getClassAttribute($title)
{
	$class_attribute = '';
	preg_match('/<h[2|3][^>]*class="([^"]*)"[^>]*>/', $title, $matches);
	if (isset($matches[1])) {
		$class_attribute = ' class="' . $matches[1] . '"';
	}
	return $class_attribute;
}

	private function getStyleAttribute($title)
{
    $style_attribute = '';
    preg_match('/<h[2|3][^>]*style="([^"]*)"[^>]*>/', $title, $matches);
    if (isset($matches[1])) {
        $style_attribute = ' style="' . $matches[1] . '"';
    }
    return $style_attribute;
}

	private function getIdAttribute($title)
	{
		$id_attribute = '';
		preg_match('/id="([^"]*)"/', $title, $matches);
		if (isset($matches[1])) {
			$id_attribute = ' id="' . $matches[1] . '"';
		}
		return $id_attribute;
	}
}


add_filter("the_content", "asap_add_index", 10, 2);
function asap_add_index($content)
{
	global $post;

	$matches = preg_match_all("#<[hH]([2-3])[^>]*?>(.*?)</[hH][2-3]>#is", $content, $match);	

	if (((is_single() && !is_admin() && (get_theme_mod('asap_enable_post_index'))) || (is_page() && !is_admin() && (get_theme_mod('asap_enable_page_index')))) && $matches > 1 )
	{
		try
		{
			$hide_toc = get_post_meta($post->ID, 'hide_toc', true);
			$asap_index_text = get_theme_mod('asap_index_text');
			$hide_index = get_theme_mod('asap_hide_index');

			if ($hide_index)
			{
				$chevron = '6 9 12 15 18 9';
			}
			else
			{
				$chevron = '6 15 12 9 18 15';
			}

			$icon = '<span class="btn-show"><label class="checkbox"><input type="checkbox"/ ><span class="check-table" ><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><polyline points="' . $chevron . '" /></svg></span></label></span>';

			$user_hide_index = get_theme_mod('asap_user_hide_index');

			if (!$asap_index_text):
				$asap_index_text = __('Table', 'asap');
			endif;

			$place = get_theme_mod('asap_index_pos');

			if (!$place)
			{
				$place = 1;
			}

			if ( isset($post->ID) )
			{
				$string = get_the_content($post->ID);
				$toc = new Toc($string);
				$result = $toc->getToc();
				if ( ( $place == 1 || $place == 2 ) && ! $hide_toc )
				{
					if ($place == 1)
					{
						$open = 'h2';
					}
					elseif ($place == 2)
					{
						$open = 'p';
					}
					if ($user_hide_index || get_theme_mod('asap_toc_sticky') ):
						$indice = '<div class="post-index"><span>' . $asap_index_text . $icon . '</span>' . $result . '</div><' . $open . '';
					else:
						$indice = '<div class="post-index"><span>' . $asap_index_text . '</span>' . $result . '</div><' . $open . '';
					endif;
					if ($place == 1)
					{
						$content = preg_replace('/(<h2)/i', $indice, $content, 1);
					}
					if ($place == 2)
					{
						$content = preg_replace('/(<p)/i', $indice, $content, 1);
					}
				}
				
				return $toc->getPost($content);
			}
		}
		catch(Exception $ex)
		{
			return $content;
		}
	}
	return $content;
}

function asap_toc_shortcode()
{

	ob_start();
	global $post;
	$hide_toc = get_post_meta($post->ID, 'hide_toc', true);
	if ( isset($post->ID) && ( get_theme_mod('asap_index_pos') == 4 || ( get_theme_mod('asap_index_pos') != 4 && ! $hide_toc ) ) )
	{

		$asap_index_text = get_theme_mod('asap_index_text');
		$hide_index = get_theme_mod('asap_hide_index');

		if ($hide_index)
		{
			$chevron = '6 9 12 15 18 9';
		}
		else
		{
			$chevron = '6 15 12 9 18 15';
		}

		$icon = '<span class="btn-show"><label class="checkbox"><input type="checkbox"/ ><span class="check-table" ><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><polyline points="' . $chevron . '" /></svg></span></label></span>';

		$user_hide_index = get_theme_mod('asap_user_hide_index');
		if (!$asap_index_text):
			$asap_index_text = __('Table', 'asap');
		endif;
		$string = get_the_content($post->ID);
		$toc = new Toc($string);
		$result = $toc->getToc();

		if ($user_hide_index || get_theme_mod('asap_toc_sticky') ):
			$indice = '<div class="post-index"><span>' . $asap_index_text . $icon . '</span>' . $result . '</div>';
		else:
			$indice = '<div class="post-index"><span>' . $asap_index_text . '</span>' . $result . '</div>';
		endif;

		return $indice;
		
	}

	return ob_get_clean();
}

add_shortcode('asap_toc', 'asap_toc_shortcode');

?>
