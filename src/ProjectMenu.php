<?php

namespace Codeuz\Project;

class ProjectMenu 
{
	public static function branch($infos, $links) {
		$html = '';
		
		// Set menu open status
		$open = false;
		foreach ($infos['paths'] as $path) {
			if (substr($path, -1) == '*') {
				if (strpos(url()->current(), url(substr($path, 0, -1))) !== false) {
					$open = true;
				}
			}
			else {
				if (url()->current() == url($path)) {
					$open = true;
				}
			}
		}
		
		
		$html.= '<li class="'.($open ? 'open keep-open' : '').'">';
		$html.= '<a data-toggle="dropdown" href="#" class="dropdown-toggle'.($open ? ' active' : '').'">';
		$html.= '<span class="glyphicon '.$infos['icon'].'"></span> '.$infos['name'];
		if (! $open) {
			$html.= '<span class="glyphicon glyphicon-triangle-bottom"></span>';
	        $html.= '<span class="glyphicon glyphicon-triangle-top"></span>';
		}
		$html.= '</a>';
		$html.= '<ul class="dropdown-menu">';
		foreach ($links as $link) {
			$html .= '<li><a href="'.url($link[0]).'" class="';
			if (url()->current() == url($link[0])) {
				$html.='active';
			}
			$html.='"><span class="glyphicon glyphicon-chevron-right"></span> '.$link[1].'</a></li>';
		}
		$html.= '</ul>';
		$html.= '</li>';
		
		return $html;
	}
}
