<?php
function breadcrumb_trail($args       = array())
{

	$breadcrumb = apply_filters('breadcrumb_trail_object', null, $args);

	if (!is_object($breadcrumb)) $breadcrumb = new Breadcrumb_Trail($args);

	return $breadcrumb->trail();
}
class Breadcrumb_Trail
{
	public $items         = array();
	public $args          = array();
	public $labels        = array();
	public $post_taxonomy = array();
	public function __toString()
	{
		return $this->trail();
	}
	public function __construct($args       = array())
	{
		

		$asap_schema_breadcrumbs = get_theme_mod('asap_schema_breadcrumbs', true);
		
		$defaults   = array(
			'container'            	=> 'nav',
			'before'            	=> '',
			'after'            		=> '',
			'browse_tag'            => 'h2',
			'list_tag'            	=> 'ul',
			'item_tag'            	=> 'li',
			'show_on_front'       	=> true,
			'network'            	=> false,
			'show_title'            => true,
			'show_browse'        	=> true,
			'labels'            	=> array() ,
			'post_taxonomy'   		=> array() ,
			'echo'           		=> true,
			'show_schema'         	=> '',
			'customizer_schema'		=> $asap_schema_breadcrumbs,
		);
		$this->args = apply_filters('breadcrumb_trail_args', wp_parse_args($args, $defaults));
		$this->set_labels();
		$this->set_post_taxonomy();
		$this->add_items();
	}
	public function trail()
	{
		$breadcrumb    = '';
		$item_count    = count($this->items);
		$item_position = 0;
		if (0 < $item_count)
		{
			if (true === $this->args['show_browse'])
			{

				$breadcrumb .= sprintf('<%1$s class="trail-browse">%2$s</%1$s>', tag_escape($this->args['browse_tag']) , $this->labels['browse']);
			}

			if ($this->args['show_schema'] && $this->args['customizer_schema'])
			{
				$breadcrumb .= sprintf('<%s class="breadcrumb" itemscope itemtype="http://schema.org/BreadcrumbList">', tag_escape($this->args['list_tag']));
				$breadcrumb .= sprintf('<meta name="numberOfItems" content="%d" />', absint($item_count));
				$breadcrumb .= '<meta name="itemListOrder" content="Ascending" />';

			}
			else
			{

				$breadcrumb .= sprintf('<%s class="breadcrumb">', tag_escape($this->args['list_tag']));

			}
			foreach ($this->items as $item)
			{
				++$item_position;
				preg_match('/(<a.*?>)(.*?)(<\/a>)/i', $item, $matches);
				$item       = !empty($matches) ? sprintf('%s<span itemprop="name">%s</span>%s', $matches[1], $matches[2], $matches[3]) : sprintf('<span itemprop="name">%s</span>', $item);
				$item       = !empty($matches) ? preg_replace('/(<a.*?)([\'"])>/i', '$1$2 itemprop=$2item$2>', $item) : sprintf('%s', $item);
				$item_class = 'trail-item';
				$attributes = '';
				$meta = '';
				
				if (1 === $item_position && 1 < $item_count) $item_class .= ' trail-begin';

				elseif ($item_count === $item_position) $item_class .= ' trail-end';

				if ($this->args['show_schema']  && $this->args['customizer_schema'] )
				{
					$attributes = 'itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="' . $item_class . '"';
					$meta       = sprintf('<meta itemprop="position" content="%s" />', absint($item_position));

				}
				$breadcrumb .= sprintf('<%1$s %2$s>%3$s%4$s</%1$s>', tag_escape($this->args['item_tag']) , $attributes, $item, $meta);
			}
			$breadcrumb .= sprintf('</%s>', tag_escape($this->args['list_tag']));

			if ($this->args['show_schema']  && $this->args['customizer_schema'] )
			{
				$breadcrumb = sprintf('<%1$s role="navigation" aria-label="%2$s" class="breadcrumb-trail breadcrumbs" itemprop="breadcrumb">%3$s%4$s%5$s</%1$s>', tag_escape($this->args['container']) , esc_attr($this->labels['aria_label']) , $this->args['before'], $breadcrumb, $this->args['after']);

			}
			else
			{

				$breadcrumb = sprintf('<%1$s class="breadcrumb-trail breadcrumbs">%3$s%4$s%5$s</%1$s>', tag_escape($this->args['container']) , esc_attr($this->labels['aria_label']) , $this->args['before'], $breadcrumb, $this->args['after']);

			}
		}
		$breadcrumb = apply_filters('breadcrumb_trail', $breadcrumb, $this->args);

		if (false === $this->args['echo']) return $breadcrumb;

		echo $breadcrumb;
	}
	protected function set_labels()
	{

		$defaults            = array(
			'browse'                     => esc_html__('Browse:', 'asap') ,
			'aria_label'                     => esc_attr_x('Breadcrumbs', 'breadcrumbs aria label', 'asap') ,
			'home'                     => esc_html__('Home', 'asap') ,
			'error_404'                     => esc_html__('404 Not Found', 'asap') ,
			'archives'                     => esc_html__('Archives', 'asap') ,
			'search'                     => esc_html__('Search results for: %s', 'asap') ,
			'paged'                     => esc_html__('Page %s', 'asap') ,
			'paged_comments'                     => esc_html__('Comment Page %s', 'asap') ,
			'archive_minute'                     => esc_html__('Minute %s', 'asap') ,
			'archive_week'                     => esc_html__('Week %s', 'asap') ,
			'archive_minute_hour'                     => '%s',
			'archive_hour'                     => '%s',
			'archive_day'                     => '%s',
			'archive_month'                     => '%s',
			'archive_year'                     => '%s',
		);

		$this->labels        = apply_filters('breadcrumb_trail_labels', wp_parse_args($this->args['labels'], $defaults));
	}
	protected function set_post_taxonomy()
	{

		$defaults            = array();
		if ('%postname%' === trim(get_option('permalink_structure') , '/')) $defaults['post']                     = 'category';

		$this->post_taxonomy = apply_filters('breadcrumb_trail_post_taxonomy', wp_parse_args($this->args['post_taxonomy'], $defaults));
	}
	protected function add_items()
	{
		if (is_front_page())
		{
			$this->add_front_page_items();
		}
		else
		{
			$this->add_network_home_link();
			$this->add_site_home_link();
			if (is_home())
			{
				$this->add_blog_items();
			}
			elseif (is_singular())
			{
				$this->add_singular_items();
			}
			elseif (is_archive())
			{

				if (is_post_type_archive()) $this->add_post_type_archive_items();

				elseif (is_category() || is_tag() || is_tax()) $this->add_term_archive_items();

				elseif (is_author()) $this->add_user_archive_items();

				elseif (get_query_var('minute') && get_query_var('hour')) $this->add_minute_hour_archive_items();

				elseif (get_query_var('minute')) $this->add_minute_archive_items();

				elseif (get_query_var('hour')) $this->add_hour_archive_items();

				elseif (is_day()) $this->add_day_archive_items();

				elseif (get_query_var('w')) $this->add_week_archive_items();

				elseif (is_month()) $this->add_month_archive_items();

				elseif (is_year()) $this->add_year_archive_items();

				else $this->add_default_archive_items();
			}
			elseif (is_search())
			{
				$this->add_search_items();
			}
			elseif (is_404())
			{
				$this->add_404_items();
			}
		}
		$this->add_paged_items();
		$this->items = array_unique(apply_filters('breadcrumb_trail_items', $this->items, $this->args));
	}
	protected function add_rewrite_front_items()
	{
		global $wp_rewrite;

		if ($wp_rewrite->front) $this->add_path_parents($wp_rewrite->front);
	}
	protected function add_paged_items()
	{
		if (is_singular() && 1 < get_query_var('page') && true === $this->args['show_title']) $this->items[]         = sprintf($this->labels['paged'], number_format_i18n(absint(get_query_var('page'))));
		elseif (is_singular() && get_option('page_comments') && 1 < get_query_var('cpage')) $this->items[]         = sprintf($this->labels['paged_comments'], number_format_i18n(absint(get_query_var('cpage'))));
		elseif (is_paged() && true === $this->args['show_title']) $this->items[]         = sprintf($this->labels['paged'], number_format_i18n(absint(get_query_var('paged'))));
	}
	protected function add_network_home_link()
	{

		if (is_multisite() && !is_main_site() && true === $this->args['network']) $this->items[]         = sprintf('<a href="%s" rel="home">%s</a>', esc_url(network_home_url()) , $this->labels['home']);
	}
	protected function add_site_home_link()
	{

		$label   = get_theme_mod('asap_breadcrumb_text');
		$network = is_multisite() && !is_main_site() && true === $this->args['network'];
		$rel     = $network ? '' : ' rel="home"';
		if (!$label):
			$label   = get_bloginfo('name');
		endif;

		$this->items[] = sprintf('<a href="%s"%s>%s</a>', esc_url(user_trailingslashit(home_url())) , $rel, $label);
	}
	protected function add_front_page_items()
	{
		if (true === $this->args['show_on_front'] || is_paged() || (is_singular() && 1 < get_query_var('page')))
		{
			$this->add_network_home_link();
			if (is_paged()) $this->add_site_home_link();
			elseif (true === $this->args['show_title']) $this->items[]         = is_multisite() && true === $this->args['network'] ? get_bloginfo('name') : $this->labels['home'];
		}
	}
	protected function add_blog_items()
	{
		$post_id = get_queried_object_id();
		$post    = get_post($post_id);
		if (0 < $post->post_parent) $this->add_post_parents($post->post_parent);
		$title   = get_the_title($post_id);
		if (is_paged()) $this->items[]         = sprintf('<a href="%s">%s</a>', esc_url(get_permalink($post_id)) , $title);

		elseif ($title && true === $this->args['show_title']) $this->items[]         = $title;
	}
	protected function add_singular_items()
	{
		$post    = get_queried_object();
		$post_id = get_queried_object_id();
		
		if ( ! get_theme_mod('asap_hide_breadcrumb_cats') ) {
			
			if (0 < $post->post_parent) $this->add_post_parents($post->post_parent);
			else $this->add_post_hierarchy($post_id);
			if (!empty($this->post_taxonomy[$post
				->post_type])) $this->add_post_terms($post_id, $this->post_taxonomy[$post->post_type]);
			
		}
		
		if ($post_title = single_post_title('', false))
		{

			$post_title = get_post_meta(get_the_ID() , 'single_bc_text', true);

			if (!$post_title):
				$post_title = get_the_title();
			endif;

			if ((1 < get_query_var('page') || is_paged()) || (get_option('page_comments') && 1 < absint(get_query_var('cpage')))) $this->items[] = sprintf('<a href="%s">%s</a>', esc_url(get_permalink($post_id)) , $post_title);

			elseif (true === $this->args['show_title']) $this->items[] = $post_title;
		}
	}
	protected function add_term_archive_items()
	{
		global $wp_rewrite;
		$term           = get_queried_object();
		$taxonomy       = get_taxonomy($term->taxonomy);
		$done_post_type = false;
		if (false !== $taxonomy->rewrite)
		{
			if ($taxonomy->rewrite['with_front'] && $wp_rewrite->front) $this->add_rewrite_front_items();
			$this->add_path_parents($taxonomy->rewrite['slug']);
			if ($taxonomy->rewrite['slug'])
			{

				$slug             = trim($taxonomy->rewrite['slug'], '/');
				// strings. For example, "movies/genres" where "movies" is the post
				$matches          = explode('/', $slug);
				if (isset($matches))
				{
					$matches          = array_reverse($matches);
					foreach ($matches as $match)
					{
						$slug             = $match;
						$post_types       = $this->get_post_types_by_slug($match);

						if (!empty($post_types))
						{

							$post_type_object = $post_types[0];
							$label            = !empty($post_type_object
								->labels
								->archive_title) ? $post_type_object
								->labels->archive_title : $post_type_object
								->labels->name;
							$label            = apply_filters('post_type_archive_title', $label, $post_type_object->name);
							$this->items[]                  = sprintf('<a href="%s">%s</a>', esc_url(get_post_type_archive_link($post_type_object->name)) , $label);

							$done_post_type   = true;
							break;
						}
					}
				}
			}
		}
		if (false === $done_post_type && 1 === count($taxonomy->object_type) && post_type_exists($taxonomy->object_type[0]))
		{
			if ('post' === $taxonomy->object_type[0])
			{
				$post_id          = get_option('page_for_posts');

				if ('posts' !== get_option('show_on_front') && 0 < $post_id) $this->items[]                  = sprintf('<a href="%s">%s</a>', esc_url(get_permalink($post_id)) , get_the_title($post_id));
			}
			else
			{
				$post_type_object = get_post_type_object($taxonomy->object_type[0]);

				$label            = !empty($post_type_object
					->labels
					->archive_title) ? $post_type_object
					->labels->archive_title : $post_type_object
					->labels->name;
				$label            = apply_filters('post_type_archive_title', $label, $post_type_object->name);

				$this->items[]                  = sprintf('<a href="%s">%s</a>', esc_url(get_post_type_archive_link($post_type_object->name)) , $label);
			}
		}
		if (is_taxonomy_hierarchical($term->taxonomy) && $term->parent) $this->add_term_parents($term->parent, $term->taxonomy);
		if (is_paged()) $this->items[]                  = sprintf('<a href="%s">%s</a>', esc_url(get_term_link($term, $term->taxonomy)) , single_term_title('', false));

		elseif (true === $this->args['show_title']) $this->items[]                  = single_term_title('', false);
	}
	protected function add_post_type_archive_items()
	{
		$post_type_object = get_post_type_object(get_query_var('post_type'));

		if (false !== $post_type_object->rewrite)
		{
			if ($post_type_object->rewrite['with_front']) $this->add_rewrite_front_items();
			if (!empty($post_type_object->rewrite['slug'])) $this->add_path_parents($post_type_object->rewrite['slug']);
		}
		if (is_paged() || is_author()) $this->items[] = sprintf('<a href="%s">%s</a>', esc_url(get_post_type_archive_link($post_type_object->name)) , post_type_archive_title('', false));

		elseif (true === $this->args['show_title']) $this->items[] = post_type_archive_title('', false);
		if (is_author()) $this->add_user_archive_items();
	}
	protected function add_user_archive_items()
	{
		global $wp_rewrite;
		$this->add_rewrite_front_items();
		$user_id = get_query_var('author');
		if (!empty($wp_rewrite->author_base) && !is_post_type_archive()) $this->add_path_parents($wp_rewrite->author_base);
		if (is_paged()) $this->items[] = sprintf('<a href="%s">%s</a>', esc_url(get_author_posts_url($user_id)) , get_the_author_meta('display_name', $user_id));

		elseif (true === $this->args['show_title']) $this->items[] = get_the_author_meta('display_name', $user_id);
	}
	protected function add_minute_hour_archive_items()
	{
		$this->add_rewrite_front_items();
		if (true === $this->args['show_title']) $this->items[] = sprintf($this->labels['archive_minute_hour'], get_the_time(esc_html_x('g:i a', 'minute and hour archives time format', 'asap')));
	}
	protected function add_minute_archive_items()
	{
		$this->add_rewrite_front_items();
		if (true === $this->args['show_title']) $this->items[] = sprintf($this->labels['archive_minute'], get_the_time(esc_html_x('i', 'minute archives time format', 'asap')));
	}
	protected function add_hour_archive_items()
	{
		$this->add_rewrite_front_items();
		if (true === $this->args['show_title']) $this->items[] = sprintf($this->labels['archive_hour'], get_the_time(esc_html_x('g a', 'hour archives time format', 'asap')));
	}
	protected function add_day_archive_items()
	{
		$this->add_rewrite_front_items();
		$year  = sprintf($this->labels['archive_year'], get_the_time(esc_html_x('Y', 'yearly archives date format', 'asap')));
		$month = sprintf($this->labels['archive_month'], get_the_time(esc_html_x('F', 'monthly archives date format', 'asap')));
		$day   = sprintf($this->labels['archive_day'], get_the_time(esc_html_x('j', 'daily archives date format', 'asap')));
		$this->items[]       = sprintf('<a href="%s">%s</a>', esc_url(get_year_link(get_the_time('Y'))) , $year);
		$this->items[]       = sprintf('<a href="%s">%s</a>', esc_url(get_month_link(get_the_time('Y') , get_the_time('m'))) , $month);
		if (is_paged()) $this->items[]       = sprintf('<a href="%s">%s</a>', esc_url(get_day_link(get_the_time('Y')) , get_the_time('m') , get_the_time('d')) , $day);

		elseif (true === $this->args['show_title']) $this->items[]       = $day;
	}
	protected function add_week_archive_items()
	{
		$this->add_rewrite_front_items();
		$year = sprintf($this->labels['archive_year'], get_the_time(esc_html_x('Y', 'yearly archives date format', 'asap')));
		$week = sprintf($this->labels['archive_week'], get_the_time(esc_html_x('W', 'weekly archives date format', 'asap')));
		$this->items[]      = sprintf('<a href="%s">%s</a>', esc_url(get_year_link(get_the_time('Y'))) , $year);
		if (is_paged()) $this->items[]      = esc_url(get_archives_link(add_query_arg(array(
			'm'      => get_the_time('Y') ,
			'w'      => get_the_time('W')
		) , home_url()) , $week, false));

		elseif (true === $this->args['show_title']) $this->items[]      = $week;
	}
	protected function add_month_archive_items()
	{
		$this->add_rewrite_front_items();
		$year  = sprintf($this->labels['archive_year'], get_the_time(esc_html_x('Y', 'yearly archives date format', 'asap')));
		$month = sprintf($this->labels['archive_month'], get_the_time(esc_html_x('F', 'monthly archives date format', 'asap')));
		$this->items[]       = sprintf('<a href="%s">%s</a>', esc_url(get_year_link(get_the_time('Y'))) , $year);
		if (is_paged()) $this->items[]       = sprintf('<a href="%s">%s</a>', esc_url(get_month_link(get_the_time('Y') , get_the_time('m'))) , $month);

		elseif (true === $this->args['show_title']) $this->items[]       = $month;
	}
	protected function add_year_archive_items()
	{
		$this->add_rewrite_front_items();
		$year = sprintf($this->labels['archive_year'], get_the_time(esc_html_x('Y', 'yearly archives date format', 'asap')));
		if (is_paged()) $this->items[]      = sprintf('<a href="%s">%s</a>', esc_url(get_year_link(get_the_time('Y'))) , $year);

		elseif (true === $this->args['show_title']) $this->items[]      = $year;
	}
	protected function add_default_archive_items()
	{
		if (is_date() || is_time()) $this->add_rewrite_front_items();

		if (true === $this->args['show_title']) $this->items[]         = $this->labels['archives'];
	}
	protected function add_search_items()
	{

		if (is_paged()) $this->items[]         = sprintf('<a href="%s">%s</a>', esc_url(get_search_link()) , sprintf($this->labels['search'], get_search_query()));

		elseif (true === $this->args['show_title']) $this->items[]         = sprintf($this->labels['search'], get_search_query());
	}
	protected function add_404_items()
	{

		if (true === $this->args['show_title']) $this->items[]         = $this->labels['error_404'];
	}
	protected function add_post_parents($post_id)
	{
		$parents = array();

		while ($post_id)
		{
			$post    = get_post($post_id);
			if ('page' == $post->post_type && 'page' == get_option('show_on_front') && $post_id == get_option('page_on_front')) break;
			$parents[] = sprintf('<a href="%s">%s</a>', esc_url(get_permalink($post_id)) , get_the_title($post_id));
			if (0 >= $post->post_parent) break;
			$post_id = $post->post_parent;
		}
		$this->add_post_hierarchy($post_id);
		if (!empty($this->post_taxonomy[$post
			->post_type])) $this->add_post_terms($post_id, $this->post_taxonomy[$post->post_type]);
		$this->items      = array_merge($this->items, array_reverse($parents));
	}
	protected function add_post_hierarchy($post_id)
	{
		$post_type        = get_post_type($post_id);
		$post_type_object = get_post_type_object($post_type);
		if ('post' === $post_type)
		{
			$this->add_rewrite_front_items();
			$this->map_rewrite_tags($post_id, get_option('permalink_structure'));
		}
		elseif (false !== $post_type_object->rewrite)
		{
			if ($post_type_object->rewrite['with_front']) $this->add_rewrite_front_items();
			if (!empty($post_type_object->rewrite['slug'])) $this->add_path_parents($post_type_object->rewrite['slug']);
		}
		if ($post_type_object->has_archive)
		{
			$label = !empty($post_type_object
				->labels
				->archive_title) ? $post_type_object
				->labels->archive_title : $post_type_object
				->labels->name;
			$label = apply_filters('post_type_archive_title', $label, $post_type_object->name);

			$this->items[]       = sprintf('<a href="%s">%s</a>', esc_url(get_post_type_archive_link($post_type)) , $label);
		}
		if ('post' !== $post_type && !empty($post_type_object->rewrite['slug']) && false !== strpos($post_type_object->rewrite['slug'], '%')) $this->map_rewrite_tags($post_id, $post_type_object->rewrite['slug']);
	}
	protected function get_post_types_by_slug($slug)
	{

		$return     = array();

		$post_types = get_post_types(array() , 'objects');

		foreach ($post_types as $type)
		{

			if ($slug === $type->has_archive || (true === $type->has_archive && $slug === $type->rewrite['slug'])) $return[]            = $type;
		}

		return $return;
	}
	protected function add_post_terms($post_id, $taxonomy)
	{

		$url_pillar_page  = get_post_meta(get_the_ID() , 'single_bc_url_pillar_page', true);
		$text_pillar_page = get_post_meta(get_the_ID() , 'single_bc_text_pillar_page', true);

		if (($url_pillar_page) && ($text_pillar_page))

		{

			$this->items[]                  = sprintf('<a href="' . $url_pillar_page . '">' . $text_pillar_page . '</a>');

		}

		else

		{
			$post_type        = get_post_type($post_id);
			$terms            = get_the_terms($post_id, $taxonomy);
			if ($terms && !is_wp_error($terms))
			{
				if (function_exists('wp_list_sort')) $terms            = wp_list_sort($terms, 'term_id');

				else usort($terms, '_usort_terms_by_ID');

				$term = get_term($terms[0], $taxonomy);
				if (0 < $term->parent) $this->add_term_parents($term->parent, $taxonomy);
				$this->items[]      = sprintf('<a href="%s">%s</a>', esc_url(get_term_link($term, $taxonomy)) , $term->name);
			}

		}
	}
	function add_path_parents($path)
	{
		$path = trim($path, '/');
		if (empty($path)) return;
		$post = get_page_by_path($path);

		if (!empty($post))
		{
			$this->add_post_parents($post->ID);
		}

		elseif (is_null($post))
		{
			$path = trim($path, '/');
			preg_match_all("/\/.*?\z/", $path, $matches);
			if (isset($matches))
			{
				$matches = array_reverse($matches);
				foreach ($matches as $match)
				{
					if (isset($match[0]))
					{
						$path    = str_replace($match[0], '', $path);
						$post    = get_page_by_path(trim($path, '/'));
						if (!empty($post) && 0 < $post->ID)
						{
							$this->add_post_parents($post->ID);
							break;
						}
					}
				}
			}
		}
	}
	function add_term_parents($term_id, $taxonomy)
	{
		$parents     = array();
		while ($term_id)
		{
			$term        = get_term($term_id, $taxonomy);
			$parents[]             = sprintf('<a href="%s">%s</a>', esc_url(get_term_link($term, $taxonomy)) , $term->name);
			$term_id     = $term->parent;
		}
		if (!empty($parents)) $this->items = array_merge($this->items, array_reverse($parents));
	}
	protected function map_rewrite_tags($post_id, $path)
	{

		$post        = get_post($post_id);
		$path        = trim($path, '/');
		$matches     = explode('/', $path);
		if (is_array($matches))
		{
			foreach ($matches as $match)
			{
				$tag         = trim($match, '/');
				if ('%year%' == $tag) $this->items[]             = sprintf('<a href="%s">%s</a>', esc_url(get_year_link(get_the_time('Y', $post_id))) , sprintf($this->labels['archive_year'], get_the_time(esc_html_x('Y', 'yearly archives date format', 'asap'))));
				elseif ('%monthnum%' == $tag) $this->items[]             = sprintf('<a href="%s">%s</a>', esc_url(get_month_link(get_the_time('Y', $post_id) , get_the_time('m', $post_id))) , sprintf($this->labels['archive_month'], get_the_time(esc_html_x('F', 'monthly archives date format', 'asap'))));
				elseif ('%day%' == $tag) $this->items[]             = sprintf('<a href="%s">%s</a>', esc_url(get_day_link(get_the_time('Y', $post_id) , get_the_time('m', $post_id) , get_the_time('d', $post_id))) , sprintf($this->labels['archive_day'], get_the_time(esc_html_x('j', 'daily archives date format', 'asap'))));
				elseif ('%author%' == $tag) $this->items[]             = sprintf('<a href="%s">%s</a>', esc_url(get_author_posts_url($post->post_author)) , get_the_author_meta('display_name', $post->post_author));
				elseif (taxonomy_exists(trim($tag, '%')))
				{
					$this->post_taxonomy[$post->post_type]             = false;
					$this->add_post_terms($post_id, trim($tag, '%'));
				}
			}
		}
	}
}

