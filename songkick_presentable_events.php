<?php 

require_once dirname(__FILE__) . '/songkick_presentable_event.php';
require_once dirname(__FILE__) . '/songkick_user_events.php';
require_once dirname(__FILE__) . '/songkick_artist_events.php';

class SongkickPresentableEvents {
	
	function SongkickPresentableEvents($options) {
		if ($options['username']) {
			$songkick_id      = $options['username'];
			$songkick_id_type = 'user';
		} else {
			$songkick_id      = $options['songkick_id'];
			$songkick_id_type = $options['songkick_id_type'];
		}
		$apikey           = $options['apikey'];
		$attendance       = $options['attendance'];
		$number_of_events = $options['number_of_events'];
		
		if ($songkick_id_type == 'user')
			$this->songkick_events = new SongkickUserEvents($apikey, $songkick_id, $attendance);
		else
			$this->songkick_events = new SongkickArtistEvents($apikey, $songkick_id);

		$this->events     = $this->songkick_events->get_upcoming_events($number_of_events);
		$this->date_color = $options['date_color'];
		$this->logo       = $options['logo'];
		$this->no_calendar_style = false;
		if (isset($options['no_calendar_style'])) {
			$this->no_calendar_style = $options['no_calendar_style'];
		}
	}

	function to_html() {
		$profile_title = __('See all concerts', SONGKICK_TEXT_DOMAIN);

		$str = '';
		if (empty($this->events)) {
			$str .= '<p>'. htmlentities(__('No events...'), ENT_QUOTES, SONGKICK_I18N_ENCODING). '</p>';
		} else {
			$str .= '<ul class="songkick-events">';
			foreach($this->events as $event) {
				$presentable_event = new SongkickPresentableEvent($event);
				$str .= '<li>'.$presentable_event->to_html($this->no_calendar_style, $this->date_color).'</li>';
			}
			$str .= '</ul>';
		}
		$str .= '<p class="profile-title"><a href="'.$this->songkick_events->profile_url().'">';
		$str .= htmlentities($profile_title, ENT_QUOTES, SONGKICK_I18N_ENCODING)."</a></p>";
		$str .= $this->powered_by_songkick($this->logo);
		return $str;
	}
	
	function no_events() {
		return empty($this->events);
	}
	
	private function powered_by_songkick($logo) {
		$text = __('Concerts by Songkick', SONGKICK_TEXT_DOMAIN);
		$html  = "<a class='powered-by' href='http://www.songkick.com/'>";
		$html .= "<img src='".site_url('/wp-content/plugins/songkick-concerts-and-festivals/'.$logo)."' title='".htmlentities($text, ENT_QUOTES, SONGKICK_I18N_ENCODING)."' alt='".htmlentities($text, ENT_QUOTES, SONGKICK_I18N_ENCODING)."' /></a>";
		return $html;
	}


}
class SongkickPresentableGigography {
	
	function SongkickPresentableGigography($options) {
		if ($options['username']) {
			$songkick_id      = $options['username'];
			$songkick_id_type = 'user';
		} else {
			$songkick_id      = $options['songkick_id'];
			$songkick_id_type = $options['songkick_id_type'];
		}
		$apikey           = $options['apikey'];
		$attendance       = $options['attendance'];
		$number_of_gigs   = $options['number_of_gigs'];
		
		if ($songkick_id_type == 'user')
			$this->songkick_gigs = new SongkickUserGigography($apikey, $songkick_id, $attendance);
		else
			$this->songkick_gigs = new SongkickArtistGigography($apikey, $songkick_id);

		$this->gigs     = $this->songkick_gigs->get_upcoming_gigs($number_of_gigs);
		$this->date_color = $options['date_color'];
		$this->logo       = $options['logo'];
		$this->no_calendar_style = false;
		if (isset($options['no_calendar_style'])) {
			$this->no_calendar_style = $options['no_calendar_style'];
		}
	}

	function to_html() {
		$profile_title = __('See all concerts', SONGKICK_TEXT_DOMAIN);

		$str = '';
		if (empty($this->gigs)) {
			$str .= '<p>'. htmlentities(__('No events...'), ENT_QUOTES, SONGKICK_I18N_ENCODING). '</p>';
		} else {
			$str .= '<ul class="songkick-events">';
			foreach($this->gigs as $event) {
				$presentable_event = new SongkickPresentableEvent($event);
				$str .= '<li>'.$presentable_event->to_html($this->no_calendar_style, $this->date_color).'</li>';
			}
			$str .= '</ul>';
		}
		$str .= '<p class="profile-title"><a href="'.$this->songkick_gigs->profile_url().'">';
		$str .= htmlentities($profile_title, ENT_QUOTES, SONGKICK_I18N_ENCODING)."</a></p>";
		$str .= $this->powered_by_songkick($this->logo);
		return $str;
	}
		
	function no_gigs() {
		return empty($this->gigs);
	}
	
	private function powered_by_songkick($logo) {
		$text = __('Concerts by Songkick', SONGKICK_TEXT_DOMAIN);
		$html  = "<a class='powered-by' href='http://www.songkick.com/'>";
		$html .= "<img src='".site_url('/wp-content/plugins/songkick-concerts-and-festivals/'.$logo)."' title='".htmlentities($text, ENT_QUOTES, SONGKICK_I18N_ENCODING)."' alt='".htmlentities($text, ENT_QUOTES, SONGKICK_I18N_ENCODING)."' /></a>";
		return $html;
	}


}
?>