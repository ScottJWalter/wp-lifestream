<?php

class Lifestream_Label
{
	const CAN_GROUP = true;
	const TEMPLATE = 'basic';
	function __construct(&$feed, &$event, &$options)
	{
		$this->lifestream = $feed->lifestream;
		$this->feed = $feed;
		$this->event = $event;
		$this->options = $options;
	}
	
	function _get_show_details_link()
	{
		return sprintf('<a href="javascript:void(0);" onclick="lifestream_toggle(this, \'%s\', \'%2$s\', \'%2$s\');return false;">%2$s</a>', $this->options['id'], count($this->event->data));
	}
	
	// backwards compatibility
	function _get_user_label() { return $this->get_user_label(); }
	
	function get_feed_label()
	{
		return sprintf('<a href="%s">%s</a>', $this->feed->get_public_url(), $this->feed->get_public_name());
	}
	
	function get_user_label()
	{
		return $this->event->owner;
	}
	
	function get_template()
	{
		return constant(sprintf('%s::TEMPLATE', get_class($this)));
	}
	
	function get_label_single()
	{
		$post = sprintf('<a href="%s">%s</a>', htmlspecialchars($this->event->data[0]['link']), htmlspecialchars($this->event->get_event_display($this->event->data[0])));
		return $this->lifestream->__('Posted %2$s', $this->get_feed_label(), $post);
	}
	
	function get_label_plural()
	{
		return $this->lifestream->__('Posted %s items.', $this->_get_show_details_link(), $this->get_feed_label());
	}
	
	function get_label_single_user()
	{
		$post = sprintf('<a href="%s">%s</a>', htmlspecialchars($this->event->data[0]['link']), htmlspecialchars($this->event->get_event_display($this->event->data[0])));
		return $this->lifestream->__('%1$s posted %3$s', $this->get_user_label(), $this->get_feed_label(), $post);

	}
	
	function get_label_plural_user()
	{
		return $this->lifestream->__('%s posted %s items.', $this->get_user_label(), $this->_get_show_details_link(), $this->get_feed_label());
	}
}

class Lifestream_BlogLabel extends Lifestream_Label
{
	const TEMPLATE = 'post';
	
	function get_label_single()
	{
		$post = sprintf('<a href="%s">%s</a>', htmlspecialchars($this->event->data[0]['link']), htmlspecialchars($this->event->get_event_display($this->event->data[0])));
		return $this->lifestream->__('Published %2$s', $this->get_feed_label(), $post);
	}
	
	function get_label_plural()
	{
		return $this->lifestream->__('Published %s posts.', $this->_get_show_details_link(), $this->get_feed_label());
	}
	
	function get_label_single_user()
	{
		$post = sprintf('<a href="%s">%s</a>', htmlspecialchars($this->event->data[0]['link']), htmlspecialchars($this->event->get_event_display($this->event->data[0])));
		return $this->lifestream->__('%1$s published %3$s', $this->get_user_label(), $this->get_feed_label(), $post);
	}
	
	function get_label_plural_user()
	{
		return $this->lifestream->__('%s published %s.', $this->get_user_label(), $this->_get_show_details_link(), $this->get_feed_label());
	}
}

class Lifestream_PhotoLabel extends Lifestream_Label
{
	const TEMPLATE = 'photo';
	
	function get_label_single()
	{
		$post = sprintf('<a href="%s">%s</a>', htmlspecialchars($this->event->data[0]['link']), htmlspecialchars($this->event->get_event_display($this->event->data[0])));
		return $this->lifestream->__('Shared %2$s', $this->get_feed_label(), $post);
	}
	
	function get_label_plural()
	{
		return $this->lifestream->__('Shared %s photos.', $this->_get_show_details_link(), $this->get_feed_label());
	}
	
	function get_label_single_user()
	{
		$post = sprintf('<a href="%s">%s</a>', htmlspecialchars($this->event->data[0]['link']), htmlspecialchars($this->event->get_event_display($this->event->data[0])));
		return $this->lifestream->__('%1$s shared %3$s', $this->get_user_label(), $this->get_feed_label(), $post);
	}
	
	function get_label_plural_user()
	{
		return $this->lifestream->__('%s shared %s photos.', $this->get_user_label(), $this->_get_show_details_link(), $this->get_feed_label());
	}
}

class Lifestream_BookmarkLabel extends Lifestream_Label
{
	const TEMPLATE = 'bookmark';
	
	function get_label_single()
	{
		$post = sprintf('<a href="%s">%s</a>', htmlspecialchars($this->event->data[0]['link']), htmlspecialchars($this->event->get_event_display($this->event->data[0])));
		return $this->lifestream->__('Shared %2$s', $this->get_feed_label(), $post);
	}
	
	function get_label_plural()
	{
		return $this->lifestream->__('Shared %s links.', $this->_get_show_details_link(), $this->get_feed_label());
	}
	
	function get_label_single_user()
	{
		$post = sprintf('<a href="%s">%s</a>', htmlspecialchars($this->event->data[0]['link']), htmlspecialchars($this->event->get_event_display($this->event->data[0])));
		return $this->lifestream->__('%1$s shared %3$s', $this->get_user_label(), $this->get_feed_label(), $post);
	}
	
	function get_label_plural_user()
	{
		return $this->lifestream->__('%s shared %s links.', $this->get_user_label(), $this->_get_show_details_link(), $this->get_feed_label());
	}
}

class Lifestream_MessageLabel extends Lifestream_Label
{
	const CAN_GROUP = false;
	const TEMPLATE = 'message';

	function get_label_single()
	{
		return $this->lifestream->__('Posted a message.', $this->get_feed_label());
	}
	
	function get_label_plural()
	{
		return $this->lifestream->__('Posted %s messages.', $this->_get_show_details_link(), $this->get_feed_label());
	}
	
	function get_label_single_user()
	{
		return $this->lifestream->__('%s posted a message.', $this->get_user_label(), $this->get_feed_label());
	}
	
	function get_label_plural_user()
	{
		return $this->lifestream->__('%s posted %s messages.', $this->get_user_label(), $this->_get_show_details_link(), $this->get_feed_label());
	}
}

class Lifestream_ReviewLabel extends Lifestream_Label
{
	function get_label_single()
	{
		$post = sprintf('<a href="%s">%s</a>', htmlspecialchars($this->event->data[0]['link']), htmlspecialchars($this->event->get_event_display($this->event->data[0])));
		return $this->lifestream->__('Reviewed %2$s', $this->get_feed_label(), $post);
	}
	
	function get_label_plural()
	{
		return $this->lifestream->__('Reviewed %s items.', $this->_get_show_details_link(), $this->get_feed_label());
	}
	
	function get_label_single_user()
	{
		$post = sprintf('<a href="%s">%s</a>', htmlspecialchars($this->event->data[0]['link']), htmlspecialchars($this->event->get_event_display($this->event->data[0])));
		return $this->lifestream->__('%1$s reviewed %3$s', $this->get_user_label(), $this->get_feed_label(), $post);
	}
	
	function get_label_plural_user()
	{
		return $this->lifestream->__('%s reviewed %s items.', $this->get_user_label(), $this->_get_show_details_link(), $this->get_feed_label());
	}
}

class Lifestream_PurchaseLabel extends Lifestream_Label
{
	function get_label_single()
	{
		$post = sprintf('<a href="%s">%s</a>', htmlspecialchars($this->event->data[0]['link']), htmlspecialchars($this->event->get_event_display($this->event->data[0])));
		return $this->lifestream->__('Purchased %2$s', $this->get_feed_label(), $post);
	}
	
	function get_label_plural()
	{
		return $this->lifestream->__('Purchased %s items.', $this->_get_show_details_link(), $this->get_feed_label());
	}
	
	function get_label_single_user()
	{
		$post = sprintf('<a href="%s">%s</a>', htmlspecialchars($this->event->data[0]['link']), htmlspecialchars($this->event->get_event_display($this->event->data[0])));
		return $this->lifestream->__('%1$s purchased %3$s', $this->get_user_label(), $this->get_feed_label(), $post);
	}
	
	function get_label_plural_user()
	{
		return $this->lifestream->__('%s purchased %s items.', $this->get_user_label(), $this->_get_show_details_link(), $this->get_feed_label());
	}
}

class Lifestream_CommitLabel extends Lifestream_Label
{
	function get_label_single()
	{
		return $this->lifestream->__('Commited code.', $this->get_feed_label());
	}
	
	function get_label_plural()
	{
		return $this->lifestream->__('Made %s commits.', $this->_get_show_details_link(), $this->get_feed_label());
	}
	
	function get_label_single_user()
	{
		return $this->lifestream->__('%s commited code.', $this->get_user_label(), $this->get_feed_label());
	}
	
	function get_label_plural_user()
	{
		return $this->lifestream->__('%s made %s commits.', $this->get_user_label(), $this->_get_show_details_link(), $this->get_feed_label());
	}
}

class Lifestream_BookLabel extends Lifestream_Label
{
	function get_label_single()
	{
		$post = sprintf('<a href="%s">%s</a>', htmlspecialchars($this->event->data[0]['link']), htmlspecialchars($this->event->get_event_display($this->event->data[0])));
		return $this->lifestream->__('Shared %2$s', $this->get_feed_label(), $post);
	}
	
	function get_label_plural()
	{
		return $this->lifestream->__('Shared %s books.', $this->_get_show_details_link(), $this->get_feed_label());
	}
	
	function get_label_single_user()
	{
		$post = sprintf('<a href="%s">%s</a>', htmlspecialchars($this->event->data[0]['link']), htmlspecialchars($this->event->get_event_display($this->event->data[0])));
		return $this->lifestream->__('%1$s shared %3$s', $this->get_user_label(), $this->get_feed_label(), $post);
	}
	
	function get_label_plural_user()
	{
		return $this->lifestream->__('%s shared %s books.', $this->get_user_label(), $this->_get_show_details_link(), $this->get_feed_label());
	}
}

class Lifestream_CommentLabel extends Lifestream_Label
{
	const CAN_GROUP = false;
	const TEMPLATE = 'comment';

	function get_label_single()
	{
		return $this->lifestream->__('Posted a comment.', $this->get_feed_label());
	}
	
	function get_label_plural()
	{
		return $this->lifestream->__('Posted %s comments.', $this->_get_show_details_link(), $this->get_feed_label());
	}
	
	function get_label_single_user()
	{
		return $this->lifestream->__('%s posted a comment.', $this->get_user_label(), $this->get_feed_label());
	}
	
	function get_label_plural_user()
	{
		return $this->lifestream->__('%s posted %s comments.', $this->get_user_label(), $this->_get_show_details_link(), $this->get_feed_label());
	}
}

class Lifestream_LikeStoryLabel extends Lifestream_Label
{
	function get_label_single()
	{
		$post = sprintf('<a href="%s">%s</a>', htmlspecialchars($this->event->data[0]['link']), htmlspecialchars($this->event->get_event_display($this->event->data[0])));
		return $this->lifestream->__('Liked %2$s', $this->get_feed_label(), $post);
	}
	
	function get_label_plural()
	{
		return $this->lifestream->__('Liked %s stories.', $this->_get_show_details_link(), $this->get_feed_label());
	}
	
	function get_label_single_user()
	{
		$post = sprintf('<a href="%s">%s</a>', htmlspecialchars($this->event->data[0]['link']), htmlspecialchars($this->event->get_event_display($this->event->data[0])));
		return $this->lifestream->__('%1$s liked %3$s', $this->get_user_label(), $this->get_feed_label(), $post);
	}
	
	function get_label_plural_user()
	{
		return $this->lifestream->__('%s liked %s stories.', $this->get_user_label(), $this->_get_show_details_link(), $this->get_feed_label());
	}
}

class Lifestream_BusinessReviewLabel extends Lifestream_Label
{
	function get_label_single()
	{
		$post = sprintf('<a href="%s">%s</a>', htmlspecialchars($this->event->data[0]['link']), htmlspecialchars($this->event->get_event_display($this->event->data[0])));
		return $this->lifestream->__('Reviewed %2$s', $this->get_feed_label(), $post);
	}
	
	function get_label_plural()
	{
		return $this->lifestream->__('Reviewed %s businesses.', $this->_get_show_details_link(), $this->get_feed_label());
	}
	
	function get_label_single_user()
	{
		$post = sprintf('<a href="%s">%s</a>', htmlspecialchars($this->event->data[0]['link']), htmlspecialchars($this->event->get_event_display($this->event->data[0])));
		return $this->lifestream->__('%1$s reviewed %3$s', $this->get_user_label(), $this->get_feed_label(), $post);
	}
	
	function get_label_plural_user()
	{
		return $this->lifestream->__('%s reviewed %s businesses.', $this->get_user_label(), $this->_get_show_details_link(), $this->get_feed_label());
	}
}

class Lifestream_ListenLabel extends Lifestream_Label
{
	function get_label_single()
	{
		$post = sprintf('<a href="%s">%s</a>', htmlspecialchars($this->event->data[0]['link']), htmlspecialchars($this->event->get_event_display($this->event->data[0])));
		return $this->lifestream->__('Listened to %2$s', $this->get_feed_label(), $post);
	}
	
	function get_label_plural()
	{
		return $this->lifestream->__('Listened to %s songs.', $this->_get_show_details_link(), $this->get_feed_label());
	}
	
	function get_label_single_user()
	{
		$post = sprintf('<a href="%s">%s</a>', htmlspecialchars($this->event->data[0]['link']), htmlspecialchars($this->event->get_event_display($this->event->data[0])));
		return $this->lifestream->__('%1$s listened to %3$s', $this->get_user_label(), $this->get_feed_label(), $post);
	}
	
	function get_label_plural_user()
	{
		return $this->lifestream->__('%s listened to %s songs.', $this->get_user_label(), $this->_get_show_details_link(), $this->get_feed_label());
	}
}

class Lifestream_VideoLabel extends Lifestream_Label
{
	const TEMPLATE = 'photo';
	
	function get_label_single()
	{
		$post = sprintf('<a href="%s">%s</a>', htmlspecialchars($this->event->data[0]['link']), htmlspecialchars($this->event->get_event_display($this->event->data[0])));
		return $this->lifestream->__('Shared %2$s', $this->get_feed_label(), $post);
	}
	
	function get_label_plural()
	{
		return $this->lifestream->__('Shared %s videos.', $this->_get_show_details_link(), $this->get_feed_label());
	}
	
	function get_label_single_user()
	{
		$post = sprintf('<a href="%s">%s</a>', htmlspecialchars($this->event->data[0]['link']), htmlspecialchars($this->event->get_event_display($this->event->data[0])));
		return $this->lifestream->__('%1$s shared %3$s', $this->get_user_label(), $this->get_feed_label(), $post);
	}
	
	function get_label_plural_user()
	{
		return $this->lifestream->__('%s shared %s videos.', $this->get_user_label(), $this->_get_show_details_link(), $this->get_feed_label());
	}
}
class Lifestream_LikeVideoLabel extends Lifestream_VideoLabel
{
	const TEMPLATE = 'photo';
	
	function get_label_single()
	{
		$post = sprintf('<a href="%s">%s</a>', htmlspecialchars($this->event->data[0]['link']), htmlspecialchars($this->event->get_event_display($this->event->data[0])));
		return $this->lifestream->__('Liked %2$s', $this->get_feed_label(), $post);
	}
	
	function get_label_plural()
	{
		return $this->lifestream->__('Liked %s videos.', $this->_get_show_details_link(), $this->get_feed_label());
	}
	
	function get_label_single_user()
	{
		$post = sprintf('<a href="%s">%s</a>', htmlspecialchars($this->event->data[0]['link']), htmlspecialchars($this->event->get_event_display($this->event->data[0])));
		return $this->lifestream->__('%1$s liked %3$s', $this->get_user_label(), $this->get_feed_label(), $post);
	}
	
	function get_label_plural_user()
	{
		return $this->lifestream->__('%s liked %s videos.', $this->get_user_label(), $this->_get_show_details_link(), $this->get_feed_label());
	}
}

class Lifestream_LikeSongLabel extends Lifestream_Label
{
	function get_label_single()
	{
		$post = sprintf('<a href="%s">%s</a>', htmlspecialchars($this->event->data[0]['link']), htmlspecialchars($this->event->get_event_display($this->event->data[0])));
		return $this->lifestream->__('Liked %2$s', $this->get_feed_label(), $post);
	}
	
	function get_label_plural()
	{
		return $this->lifestream->__('Liked %s songs.', $this->_get_show_details_link(), $this->get_feed_label());
	}
	
	function get_label_single_user()
	{
		$post = sprintf('<a href="%s">%s</a>', htmlspecialchars($this->event->data[0]['link']), htmlspecialchars($this->event->get_event_display($this->event->data[0])));
		return $this->lifestream->__('%1$s liked %3$s', $this->get_user_label(), $this->get_feed_label(), $post);
	}
	
	function get_label_plural_user()
	{
		return $this->lifestream->__('%s liked %s songs.', $this->get_user_label(), $this->_get_show_details_link(), $this->get_feed_label());
	}
}

class Lifestream_LikeArtistLabel extends Lifestream_Label
{
	function get_label_single()
	{
		$post = sprintf('<a href="%s">%s</a>', htmlspecialchars($this->event->data[0]['link']), htmlspecialchars($this->event->get_event_display($this->event->data[0])));
		return $this->lifestream->__('Liked %2$s', $this->get_feed_label(), $post);
	}
	
	function get_label_plural()
	{
		return $this->lifestream->__('Liked %s artists.', $this->_get_show_details_link(), $this->get_feed_label());
	}
	
	function get_label_single_user()
	{
		$post = sprintf('<a href="%s">%s</a>', htmlspecialchars($this->event->data[0]['link']), htmlspecialchars($this->event->get_event_display($this->event->data[0])));
		return $this->lifestream->__('%1$s liked %3$s', $this->get_user_label(), $this->get_feed_label(), $post);
	}
	
	function get_label_plural_user()
	{
		return $this->lifestream->__('%s liked %s artists.', $this->get_user_label(), $this->_get_show_details_link(), $this->get_feed_label());
	}
}

class Lifestream_CreateStationLabel extends Lifestream_Label
{
	function get_label_single()
	{
		$post = sprintf('<a href="%s">%s</a>', htmlspecialchars($this->event->data[0]['link']), htmlspecialchars($this->event->get_event_display($this->event->data[0])));
		return $this->lifestream->__('Created %2$s', $this->get_feed_label(), $post);
	}
	
	function get_label_plural()
	{
		return $this->lifestream->__('Created %s stations.', $this->_get_show_details_link(), $this->get_feed_label());
	}
	
	function get_label_single_user()
	{
		$post = sprintf('<a href="%s">%s</a>', htmlspecialchars($this->event->data[0]['link']), htmlspecialchars($this->event->get_event_display($this->event->data[0])));
		return $this->lifestream->__('%1$s created %3$s', $this->get_user_label(), $this->get_feed_label(), $post);
	}
	
	function get_label_plural_user()
	{
		return $this->lifestream->__('%s created %s stations.', $this->get_user_label(), $this->_get_show_details_link(), $this->get_feed_label());
	}
}

class Lifestream_WatchVideoLabel extends Lifestream_Label
{
	function get_label_single()
	{
		$post = sprintf('<a href="%s">%s</a>', htmlspecialchars($this->event->data[0]['link']), htmlspecialchars($this->event->get_event_display($this->event->data[0])));
		return $this->lifestream->__('Watched %2$s', $this->get_feed_label(), $post);
	}
	
	function get_label_plural()
	{
		return $this->lifestream->__('Watched %s videos.', $this->_get_show_details_link(), $this->get_feed_label());
	}
	
	function get_label_single_user()
	{
		$post = sprintf('<a href="%s">%s</a>', htmlspecialchars($this->event->data[0]['link']), htmlspecialchars($this->event->get_event_display($this->event->data[0])));
		return $this->lifestream->__('%1$s watched %3$s', $this->get_user_label(), $this->get_feed_label(), $post);
	}
	
	function get_label_plural_user()
	{
		return $this->lifestream->__('%s watched %s videos.', $this->get_user_label(), $this->_get_show_details_link(), $this->get_feed_label());
	}
}

class Lifestream_ReviewWebsiteLabel extends Lifestream_Label
{
	function get_label_single()
	{
		$post = sprintf('<a href="%s">%s</a>', htmlspecialchars($this->event->data[0]['link']), htmlspecialchars($this->event->get_event_display($this->event->data[0])));
		return $this->lifestream->__('Reviewed %2$s', $this->get_feed_label(), $post);
	}
	
	function get_label_plural()
	{
		return $this->lifestream->__('Reviewed %s websites.', $this->_get_show_details_link(), $this->get_feed_label());
	}
	
	function get_label_single_user()
	{
		$post = sprintf('<a href="%s">%s</a>', htmlspecialchars($this->event->data[0]['link']), htmlspecialchars($this->event->get_event_display($this->event->data[0])));
		return $this->lifestream->__('%1$s reviewed %3$s', $this->get_user_label(), $this->get_feed_label(), $post);
	}
	
	function get_label_plural_user()
	{
		return $this->lifestream->__('%s reviewed %s websites.', $this->get_user_label(), $this->_get_show_details_link(), $this->get_feed_label());
	}
}

class Lifestream_LikeWebsiteLabel extends Lifestream_Label
{
	function get_label_single()
	{
		$post = sprintf('<a href="%s">%s</a>', htmlspecialchars($this->event->data[0]['link']), htmlspecialchars($this->event->get_event_display($this->event->data[0])));
		return $this->lifestream->__('Liked %2$s', $this->get_feed_label(), $post);
	}
	
	function get_label_plural()
	{
		return $this->lifestream->__('Liked %s websites.', $this->_get_show_details_link(), $this->get_feed_label());
	}
	
	function get_label_single_user()
	{
		$post = sprintf('<a href="%s">%s</a>', htmlspecialchars($this->event->data[0]['link']), htmlspecialchars($this->event->get_event_display($this->event->data[0])));
		return $this->lifestream->__('%1$s liked %3$s', $this->get_user_label(), $this->get_feed_label(), $post);
	}
	
	function get_label_plural_user()
	{
		return $this->lifestream->__('%s liked %s websites.', $this->get_user_label(), $this->_get_show_details_link(), $this->get_feed_label());
	}
}

class Lifestream_WantLabel extends Lifestream_Label
{
	function get_label_single()
	{
		$post = sprintf('<a href="%s">%s</a>', htmlspecialchars($this->event->data[0]['link']), htmlspecialchars($this->event->get_event_display($this->event->data[0])));
		return $this->lifestream->__('Wants %2$s', $this->get_feed_label(), $post);
	}
	
	function get_label_plural()
	{
		return $this->lifestream->__('Wants %s items.', $this->_get_show_details_link(), $this->get_feed_label());
	}
	
	function get_label_single_user()
	{
		$post = sprintf('<a href="%s">%s</a>', htmlspecialchars($this->event->data[0]['link']), htmlspecialchars($this->event->get_event_display($this->event->data[0])));
		return $this->lifestream->__('%1$s wants %3$s', $this->get_user_label(), $this->get_feed_label(), $post);
	}
	
	function get_label_plural_user()
	{
		return $this->lifestream->__('%s wants %s items.', $this->get_user_label(), $this->_get_show_details_link(), $this->get_feed_label());
	}
}

class Lifestream_LocationLabel extends Lifestream_Label
{
	function get_label_single()
	{
		$post = sprintf('<a href="%s">%s</a>', htmlspecialchars($this->event->data[0]['link']), htmlspecialchars($this->event->get_event_display($this->event->data[0])));
		return $this->lifestream->__('Checked in at %2$s', $this->get_feed_label(), $post);
	}
	
	function get_label_plural()
	{
		return $this->lifestream->__('Checked in %s times.', $this->_get_show_details_link(), $this->get_feed_label());
	}
	
	function get_label_single_user()
	{
		$post = sprintf('<a href="%s">%s</a>', htmlspecialchars($this->event->data[0]['link']), htmlspecialchars($this->event->get_event_display($this->event->data[0])));
		return $this->lifestream->__('%1$s checked in at %3$s', $this->get_user_label(), $this->get_feed_label(), $post);
	}
	
	function get_label_plural_user()
	{
		return $this->lifestream->__('%s checked in %s times.', $this->get_user_label(), $this->_get_show_details_link(), $this->get_feed_label());
	}
}

class Lifestream_ReceiveBadgeLabel extends Lifestream_Label
{
	function get_label_single()
	{
		$post = sprintf('<a href="%s">%s</a>', htmlspecialchars($this->event->data[0]['link']), htmlspecialchars($this->event->get_event_display($this->event->data[0])));
		return $this->lifestream->__('Received %2$s', $this->get_feed_label(), $post);
	}
	
	function get_label_plural()
	{
		return $this->lifestream->__('Received %s badges.', $this->_get_show_details_link(), $this->get_feed_label());
	}
	
	function get_label_single_user()
	{
		$post = sprintf('<a href="%s">%s</a>', htmlspecialchars($this->event->data[0]['link']), htmlspecialchars($this->event->get_event_display($this->event->data[0])));
		return $this->lifestream->__('%1$s received %3$s', $this->get_user_label(), $this->get_feed_label(), $post);
	}
	
	function get_label_plural_user()
	{
		return $this->lifestream->__('%s received %s badges.', $this->get_user_label(), $this->_get_show_details_link(), $this->get_feed_label());
	}
}

class Lifestream_EatLabel extends Lifestream_Label
{
	function get_label_single()
	{
		$post = sprintf('<a href="%s">%s</a>', htmlspecialchars($this->event->data[0]['link']), htmlspecialchars($this->event->get_event_display($this->event->data[0])));
		return $this->lifestream->__('Ate %2$s.', $this->get_feed_label(), $post);
	}
	
	function get_label_plural()
	{
		return $this->lifestream->__('Ate %s meals.', $this->_get_show_details_link(), $this->get_feed_label());
	}
	
	function get_label_single_user()
	{
		$post = sprintf('<a href="%s">%s</a>', htmlspecialchars($this->event->data[0]['link']), htmlspecialchars($this->event->get_event_display($this->event->data[0])));
		return $this->lifestream->__('%1$s ate %3$s.', $this->get_user_label(), $this->get_feed_label(), $post);
	}
	
	function get_label_plural_user()
	{
		return $this->lifestream->__('%s ate %s.', $this->get_user_label(), $this->_get_show_details_link(), $this->get_feed_label());
	}
}

class Lifestream_WatchEpisodeLabel extends Lifestream_Label
{
	function get_label_single()
	{
		$post = sprintf('<a href="%s">%s</a>', htmlspecialchars($this->event->data[0]['link']), htmlspecialchars($this->event->get_event_display($this->event->data[0])));
		return $this->lifestream->__('Watched %2$s.', $this->get_feed_label(), $post);
	}
	
	function get_label_plural()
	{
		return $this->lifestream->__('Watched %s episodes.', $this->_get_show_details_link(), $this->get_feed_label());
	}
	
	function get_label_single_user()
	{
		$post = sprintf('<a href="%s">%s</a>', htmlspecialchars($this->event->data[0]['link']), htmlspecialchars($this->event->get_event_display($this->event->data[0])));
		return $this->lifestream->__('%1$s watched %3$s.', $this->get_user_label(), $this->get_feed_label(), $post);
	}
	
	function get_label_plural_user()
	{
		return $this->lifestream->__('%s watched %s episodes.', $this->get_user_label(), $this->_get_show_details_link(), $this->get_feed_label());
	}
}

class Lifestream_ShareStoryLabel extends Lifestream_Label
{
	function get_label_single()
	{
		$post = sprintf('<a href="%s">%s</a>', htmlspecialchars($this->event->data[0]['link']), htmlspecialchars($this->event->get_event_display($this->event->data[0])));
		return $this->lifestream->__('Shared %2$s', $this->get_feed_label(), $post);
	}
	
	function get_label_plural()
	{
		return $this->lifestream->__('Shared %s stories.', $this->_get_show_details_link(), $this->get_feed_label());
	}
	
	function get_label_single_user()
	{
		$post = sprintf('<a href="%s">%s</a>', htmlspecialchars($this->event->data[0]['link']), htmlspecialchars($this->event->get_event_display($this->event->data[0])));
		return $this->lifestream->__('%1$s shared %3$s', $this->get_user_label(), $this->get_feed_label(), $post);
	}
	
	function get_label_plural_user()
	{
		return $this->lifestream->__('%s shared %s stories.', $this->get_user_label(), $this->_get_show_details_link(), $this->get_feed_label());
	}
}

class Lifestream_LikeMovieLabel extends Lifestream_VideoLabel
{
	const TEMPLATE = 'photo';
	
	function get_label_single()
	{
		$post = sprintf('<a href="%s">%s</a>', htmlspecialchars($this->event->data[0]['link']), htmlspecialchars($this->event->get_event_display($this->event->data[0])));
		return $this->lifestream->__('Liked %2$s', $this->get_feed_label(), $post);
	}
	
	function get_label_plural()
	{
		return $this->lifestream->__('Liked %s movies.', $this->_get_show_details_link(), $this->get_feed_label());
	}
	
	function get_label_single_user()
	{
		$post = sprintf('<a href="%s">%s</a>', htmlspecialchars($this->event->data[0]['link']), htmlspecialchars($this->event->get_event_display($this->event->data[0])));
		return $this->lifestream->__('%1$s liked %3$s', $this->get_user_label(), $this->get_feed_label(), $post);
	}
	
	function get_label_plural_user()
	{
		return $this->lifestream->__('%s liked %s movies.', $this->get_user_label(), $this->_get_show_details_link(), $this->get_feed_label());
	}
}

class Lifestream_ShareSlideLabel extends Lifestream_Label
{
	function get_label_single()
	{
		$post = sprintf('<a href="%s">%s</a>', htmlspecialchars($this->event->data[0]['link']), htmlspecialchars($this->event->get_event_display($this->event->data[0])));
		return $this->lifestream->__('Shared %2$s', $this->get_feed_label(), $post);
	}
	
	function get_label_plural()
	{
		return $this->lifestream->__('Shared %s presentations.', $this->_get_show_details_link(), $this->get_feed_label());
	}
	
	function get_label_single_user()
	{
		$post = sprintf('<a href="%s">%s</a>', htmlspecialchars($this->event->data[0]['link']), htmlspecialchars($this->event->get_event_display($this->event->data[0])));
		return $this->lifestream->__('%1$s shared %3$s', $this->get_user_label(), $this->get_feed_label(), $post);
	}
	
	function get_label_plural_user()
	{
		return $this->lifestream->__('%s shared %s presentations.', $this->get_user_label(), $this->_get_show_details_link(), $this->get_feed_label());
	}
}

class Lifestream_UnlockAchievementLabel extends Lifestream_Label
{
	function get_label_single()
	{
		$post = sprintf('<a href="%s">%s</a>', htmlspecialchars($this->event->data[0]['link']), htmlspecialchars($this->event->get_event_display($this->event->data[0])));
		return $this->lifestream->__('Unlocked %2$s', $this->get_feed_label(), $post);
	}
	
	function get_label_plural()
	{
		return $this->lifestream->__('Unlocked %s achievements.', $this->_get_show_details_link(), $this->get_feed_label());
	}
	
	function get_label_single_user()
	{
		$post = sprintf('<a href="%s">%s</a>', htmlspecialchars($this->event->data[0]['link']), htmlspecialchars($this->event->get_event_display($this->event->data[0])));
		return $this->lifestream->__('%1$s unlocked %3$s', $this->get_user_label(), $this->get_feed_label(), $post);
	}
	
	function get_label_plural_user()
	{
		return $this->lifestream->__('%s unlocked %s achievements.', $this->get_user_label(), $this->_get_show_details_link(), $this->get_feed_label());
	}
}

class Lifestream_PlayGameLabel extends Lifestream_Label
{
	function get_label_single()
	{
		$post = sprintf('<a href="%s">%s</a>', htmlspecialchars($this->event->data[0]['link']), htmlspecialchars($this->event->get_event_display($this->event->data[0])));
		return $this->lifestream->__('Played %2$s', $this->get_feed_label(), $post);
	}
	
	function get_label_plural()
	{
		return $this->lifestream->__('Played %s games.', $this->_get_show_details_link(), $this->get_feed_label());
	}
	
	function get_label_single_user()
	{
		$post = sprintf('<a href="%s">%s</a>', htmlspecialchars($this->event->data[0]['link']), htmlspecialchars($this->event->get_event_display($this->event->data[0])));
		return $this->lifestream->__('%1$s played %3$s', $this->get_user_label(), $this->get_feed_label(), $post);
	}
	
	function get_label_plural_user()
	{
		return $this->lifestream->__('%s played %s games.', $this->get_user_label(), $this->_get_show_details_link(), $this->get_feed_label());
	}
}
class Lifestream_QueueVideoLabel extends Lifestream_Label
{
	function get_label_single()
	{
		$post = sprintf('<a href="%s">%s</a>', htmlspecialchars($this->event->data[0]['link']), htmlspecialchars($this->event->get_event_display($this->event->data[0])));
		return $this->lifestream->__('Queued %2$s', $this->get_feed_label(), $post);
	}

	function get_label_plural()
	{
		return $this->lifestream->__('Queued %s videos.', $this->_get_show_details_link(), $this->get_feed_label());
	}
	
	function get_label_single_user()
	{
		$post = sprintf('<a href="%s">%s</a>', htmlspecialchars($this->event->data[0]['link']), htmlspecialchars($this->event->get_event_display($this->event->data[0])));
		return $this->lifestream->__('%1$s queued %3$s', $this->get_user_label(), $this->get_feed_label(), $post);
	}
	
	function get_label_plural_user()
	{
		return $this->lifestream->__('%s queued %s videos.', $this->get_user_label(), $this->_get_show_details_link(), $this->get_feed_label());
	}
}

class Lifestream_ReviewVideoLabel extends Lifestream_Label
{
	function get_label_single()
	{
		$post = sprintf('<a href="%s">%s</a>', htmlspecialchars($this->event->data[0]['link']), htmlspecialchars($this->event->get_event_display($this->event->data[0])));
		return $this->lifestream->__('Reviewed %2$s', $this->get_feed_label(), $post);
	}

	function get_label_plural()
	{
		return $this->lifestream->__('Reviewed %s videos.', $this->_get_show_details_link(), $this->get_feed_label());
	}
	
	function get_label_single_user()
	{
		$post = sprintf('<a href="%s">%s</a>', htmlspecialchars($this->event->data[0]['link']), htmlspecialchars($this->event->get_event_display($this->event->data[0])));
		return $this->lifestream->__('%1$s reviewed %3$s', $this->get_user_label(), $this->get_feed_label(), $post);
	}
	
	function get_label_plural_user()
	{
		return $this->lifestream->__('%s reviewed %s videos.', $this->get_user_label(), $this->_get_show_details_link(), $this->get_feed_label());
	}
}

class Lifestream_AttendEventLabel extends Lifestream_Label
{
	function get_label_single()
	{
		$post = sprintf('<a href="%s">%s</a>', htmlspecialchars($this->event->data[0]['link']), htmlspecialchars($this->event->get_event_display($this->event->data[0])));
		return $this->lifestream->__('Attending %2$s', $this->get_feed_label(), $post);
	}

	function get_label_plural()
	{
		return $this->lifestream->__('Attending %s events.', $this->_get_show_details_link(), $this->get_feed_label());
	}
	
	function get_label_single_user()
	{
		$post = sprintf('<a href="%s">%s</a>', htmlspecialchars($this->event->data[0]['link']), htmlspecialchars($this->event->get_event_display($this->event->data[0])));
		return $this->lifestream->__('%1$s is attending %3$s', $this->get_user_label(), $this->get_feed_label(), $post);
	}
	
	function get_label_plural_user()
	{
		return $this->lifestream->__('%s is attending %s events.', $this->get_user_label(), $this->_get_show_details_link(), $this->get_feed_label());
	}
}

class Lifestream_ContributionLabel extends Lifestream_Label
{
	function get_label_single()
	{
		$post = sprintf('<a href="%s">%s</a>', htmlspecialchars($this->event->data[0]['link']), htmlspecialchars($this->event->get_event_display($this->event->data[0])));
		return $this->lifestream->__('Contributed to %2$s', $this->get_feed_label(), $post);
	}

	function get_label_plural()
	{
		return $this->lifestream->__('Contributed to %s pages.', $this->_get_show_details_link(), $this->get_feed_label());
	}
	
	function get_label_single_user()
	{
		$post = sprintf('<a href="%s">%s</a>', htmlspecialchars($this->event->data[0]['link']), htmlspecialchars($this->event->get_event_display($this->event->data[0])));
		return $this->lifestream->__('%1$s contributed to %3$s', $this->get_user_label(), $this->get_feed_label(), $post);
	}
	
	function get_label_plural_user()
	{
		return $this->lifestream->__('%s contributed to %s pages.', $this->get_user_label(), $this->_get_show_details_link(), $this->get_feed_label());
	}
}
?>