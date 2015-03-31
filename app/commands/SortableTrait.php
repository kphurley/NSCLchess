<?php
trait SortableTrait {
    public function scopeSortable($query) {
        if(Input::has('s') && Input::has('o'))
            return $query->orderBy(Input::get('s'), Input::get('o'));
        else
            return $query;
    }
 
    public static function link_to_sorting_action($col, $title = null) {
            
        $route = Route::currentRouteName();

        if (is_null($title)) {
            $title = str_replace('_', ' ', $col);
            $title = ucfirst($title);
        }
 
        $indicator = (Input::get('s') == $col ? (Input::get('o') === 'asc' ? '&uarr;' : '&darr;') : null);

        // if(Route::currentRouteName()=='team')
        //     $route = 'team/{id}';

        $parameters = array_merge(Input::get(), array('s' => $col, 'o' => (Input::get('o') === 'asc' ? 'desc' : 'asc')));
 
        return link_to_route($route, "$title $indicator", $parameters);
    }
}