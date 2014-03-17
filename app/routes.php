<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

/** ------------------------------------------
 *  Route model binding
 *  ------------------------------------------
 */
Route::model('user', 'User');
Route::model('comment', 'Comment');
Route::model('post', 'Post');
Route::model('role', 'Role');
Route::model('landingpage', 'LandingPage');

/** ------------------------------------------
 *  Admin Routes
 *  ------------------------------------------
 */
Route::group(array('prefix' => 'admin', 'before' => 'auth'), function()
{
    # Blog Management
   /*
    Route::get('blogs/{post}/show', 'AdminBlogsController@getShow')
        ->where('post', '[0-9]+');
    Route::get('blogs/{post}/edit', 'AdminBlogsController@getEdit')
        ->where('post', '[0-9]+');
    Route::post('blogs/{post}/edit', 'AdminBlogsController@postEdit')
        ->where('post', '[0-9]+');
    Route::get('blogs/{post}/delete', 'AdminBlogsController@getDelete')
        ->where('post', '[0-9]+');
    Route::post('blogs/{post}/delete', 'AdminBlogsController@postDelete')
        ->where('post', '[0-9]+');
    Route::controller('blogs', 'AdminBlogsController');
	*/

    # User Management
    Route::get('users/{user}/show', 'AdminUsersController@getShow')
        ->where('user', '[0-9]+');
    Route::get('users/{user}/edit', 'AdminUsersController@getEdit')
        ->where('user', '[0-9]+');
    Route::post('users/{user}/edit', 'AdminUsersController@postEdit')
        ->where('user', '[0-9]+');
    Route::get('users/{user}/delete', 'AdminUsersController@getDelete')
        ->where('user', '[0-9]+');
    Route::post('users/{user}/delete', 'AdminUsersController@postDelete')
        ->where('user', '[0-9]+');
    Route::controller('users', 'AdminUsersController');

    # User Role Management
    Route::get('roles/{role}/show', 'AdminRolesController@getShow')
        ->where('role', '[0-9]+');
    Route::get('roles/{role}/edit', 'AdminRolesController@getEdit')
        ->where('role', '[0-9]+');
    Route::post('roles/{role}/edit', 'AdminRolesController@postEdit')
        ->where('role', '[0-9]+');
    Route::get('roles/{role}/delete', 'AdminRolesController@getDelete')
        ->where('role', '[0-9]+');
    Route::post('roles/{role}/delete', 'AdminRolesController@postDelete')
        ->where('role', '[0-9]+');
    Route::controller('roles', 'AdminRolesController');

    # Admin Dashboard
    Route::controller('/', 'AdminDashboardController');
    
    //Route::get('landingpages/create', 'LandingPagesController@create');

	# Index Page - Last route, no matches

});


/** ------------------------------------------
 *  Frontend Routes
 *  ------------------------------------------
 */
// Home Route

Route::get('/', function($slug = 'omni'){
#	return $slug; 
#	return Redirect::route('landingpages.slug')->with('slug', $slug);
return Redirect::to('omni');
})
;

// User reset routes
Route::get('user/reset/{token}', 'UserController@getReset')
    ->where('token', '[0-9a-z]+');
// User password reset
Route::post('user/reset/{token}', 'UserController@postReset')
    ->where('token', '[0-9a-z]+');
//:: User Account Routes ::
Route::post('user/{user}/edit', 'UserController@postEdit')
    ->where('user', '[0-9]+');

//:: User Account Routes ::
Route::post('user/login', 'UserController@postLogin');

# User RESTful Routes (Login, Logout, Register, etc)
Route::controller('user', 'UserController');

//:: Application Routes ::

# Filter for detect language
Route::when('contact-us','detectLang');

# Contact Us Static Page
Route::get('contact-us', function()
{
    // Return about us page
    return View::make('site/contact-us');
});

# Posts - Second to last set, match slug

Route::get('{slug}', array('uses' => 'LandingPagesController@getView', 'as' => 'landingpages.slug'));


// Route::post('{postSlug}', 'LandingPagesController@postView');


# Index Page - Last route, no matches

Route::group(array( 'before' => 'auth', 'prefix' => 'lafilm'), function()
	{

	//Route::resource('landingpages', 'LandingPagesController');
	
	Route::get('landingpages', array('as' => 'landingpages.index', 'uses' => 'LandingPagesController@index'));
		
	Route::get('landingpages/create', array('as' => 'landingpages.create', 'uses' => 'LandingPagesController@create'));
	
	Route::delete('landingpages/destroy/{id}', array('as' => 'landingpages.destroy', 'uses' => 'LandingPagesController@destroy'));
	
	Route::post('landingpages/store', array('as' => 'landingpages.store', 'uses' => 'LandingPagesController@store'));
	 
	Route::resource('template','TemplatesController');
	
	Route::get('template', array('as' => 'template.index', 'uses' => 'TemplatesController@index'));
	
	Route::get('template/create', array('uses' => 'TemplatesController@create', 'as' => 'templates.create'));
	
	Route::post('template/upload', array('uses' => 'TemplatesController@upload', 'as' => 'uploadTemplate'));
	
	Route::get('template/{id}/fields', array('uses'=> 'TemplatesController@defineFields', 'as'=>'templates.definefields')); 
	
	Route::get('blades', array('uses' => 'BladeTempsController@index', 'as' => 'blades.index'));
	
	Route::get('blades/{id}/upload', array('uses' => 'BladeTempsController@create', 'as' => 'bladetemps.create'));
	
	Route::post('blades/upload', array('uses' => 'BladeTempsController@upload', 'as' => 'uploadBladetemps'));
	
	Route::get('blades/{id}/fields', array('uses'=> 'BladeTempsController@defineFields', 'as'=>'bladetemps.definefields'));
	
//	Route::resource('landingpages', 'LandingPagesController');
	
	Route::get('landingpages/{lp_id}/variants', array('as'=> 'getVariants',  'uses' =>'LandingPagesController@getVariants'));
	
	Route::post('variants/store', array('as'=>'variants.store', 'uses' => 'VariantsController@store'));
	
	Route::get('variants/langingpages/{lp_id}', array('as'=>'variants.create', 'uses'=>'VariantsController@create'));
	
	Route::get('variables/{id}/assign', array('as'=>'variables.assigntypes', 'uses' => 'VariablesController@getAssignTypes'));
	
	Route::get('variables/{t_id}/populate', array('as'=>'variables.populate', 'uses' => 'VariablesController@populatevars'));
	
	Route::post('variables/assign', array('as'=>'assignvar', 'uses' => 'VariablesController@assignvar'));
	
	Route::resource('fields', 'FieldsController');
	
	Route::resource('field_types', 'Field_typesController');
	
	Route::get('templates/{id}/thumbnail', array('as'=>'image_thumbnail', 'uses'=>'Image_thumbnailsController@upload'));
	
	Route::get('variants/{vid}/assigntemplates', array('as'=>'variants.assigntemp', 'uses'=> 'VariantsController@getTemplates'));
	
	Route::get('variants/{vid}/edit', array('as'=>'variants.edit', 'uses'=> 'VariantsController@edit'));
	
	Route::post('variants/{vid}/update', array('as'=>'variants.update', 'uses'=> 'VariantsController@update'));
	
	Route::get('variants/{vid}/show', array('as'=>'variants.show', 'uses'=> 'VariantsController@show'));
	
	Route::post('variants/{vid}/delete', array('as'=>'variants.destroy', 'uses'=> 'VariantsController@destroy'));
	
	Route::post('variants/assigntemplates', array('as'=>'variantsTemplate', 'uses'=> 'VariantsController@assignTemplate')); 
	
	Route::get('variants/{vid}/variables/{tid}', array('as' => 'variants.vartovar', 'uses' => 'VariantsController@vartovar'));
	
	Route::post('varainttovar/assignvartext/{vid}', array('as'=>'varvartextstemp', 'uses'=> 'VariantsController@assignvartext')); 
	
	Route::post('percent/variants', array('as' => 'varaiants.percent', 'uses' => 'VariantsController@changePercent'));
	
	Route::get('variants/slider/{vid}', array('as' => 'variants.sliderimg', 'uses' => 'VariantsController@uploadSlider'));
	
	Route::post('variants/slider', array('as' => 'variants.slider', 'uses' => 'VariantsController@postImage'));
	
	Route::post('sliders/delete', array('as' =>'sliders.delete', 'uses' => 'VariantsController@deleteSlide'));
	
	Route::post('sliders/order', array('as' =>'sliders.order', 'uses' => 'VariantsController@orderSlides'));
	
	Route::resource('stats', 'StatsController');

});
//Route::resource('forms', 'FormersController');

Route::post('forms/submit4LA', array('as'=>'formers.store', 'uses' => 'FormersController@store'));
/*
Route::resource('variables_variants', 'Variables_variantsController');

Route::resource('varvar_texts', 'Varvar_textsController');







Route::resource('stats_accums', 'Stats_accumsController');
*/
