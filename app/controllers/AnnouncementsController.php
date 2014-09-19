<?php

class AnnouncementsController extends BaseController {

	public function viewNews($id)
	{
		return View::make('announcements.newsView')
			->with('title', Announcement::find($id)->title)
			->with('author',Announcement::find($id)->author)
			->with('content', Announcement::find($id)->contents);
			
		
	}

	public function addNews()
	{
		return View::make('announcements.addNews')
			->with('title','Post Announcement');
	}

	public function createNews(){

		Announcement::create(array(
			'title'=>Input::get('title'),
			'author'=>Input::get('author'),
			'contents'=>Input::get('content')			
			));

	    return Redirect::route('home')
			->with('message', 'Announcement created successfully');
			   	
	}

	public function viewAllNews()
	{

		$announcements = Announcement::orderBy('updated_at', 'DESC')
			->paginate(5);

		return View::make('announcements.viewAllNews')
			->with('title', 'All Recent News')
			->with('announcements', $announcements);
	}
}