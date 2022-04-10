<?php
Route::redirect('/login', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth','staff']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Slider
    Route::delete('sliders/destroy', 'SliderController@massDestroy')->name('sliders.massDestroy');
    Route::post('sliders/media', 'SliderController@storeMedia')->name('sliders.storeMedia');
    Route::post('sliders/ckmedia', 'SliderController@storeCKEditorImages')->name('sliders.storeCKEditorImages');
    Route::resource('sliders', 'SliderController');

    // Settings
    Route::delete('settings/destroy', 'SettingsController@massDestroy')->name('settings.massDestroy');
    Route::post('settings/media', 'SettingsController@storeMedia')->name('settings.storeMedia');
    Route::post('settings/ckmedia', 'SettingsController@storeCKEditorImages')->name('settings.storeCKEditorImages');
    Route::resource('settings', 'SettingsController');

    // Serviece Type
    Route::delete('serviece-types/destroy', 'ServieceTypeController@massDestroy')->name('serviece-types.massDestroy');
    Route::resource('serviece-types', 'ServieceTypeController');

    // Our Services
    Route::delete('our-services/destroy', 'OurServicesController@massDestroy')->name('our-services.massDestroy');
    Route::post('our-services/media', 'OurServicesController@storeMedia')->name('our-services.storeMedia');
    Route::post('our-services/ckmedia', 'OurServicesController@storeCKEditorImages')->name('our-services.storeCKEditorImages');
    Route::resource('our-services', 'OurServicesController');

    // Product Category
    Route::delete('product-categories/destroy', 'ProductCategoryController@massDestroy')->name('product-categories.massDestroy');
    Route::post('product-categories/media', 'ProductCategoryController@storeMedia')->name('product-categories.storeMedia');
    Route::post('product-categories/ckmedia', 'ProductCategoryController@storeCKEditorImages')->name('product-categories.storeCKEditorImages');
    Route::resource('product-categories', 'ProductCategoryController');

    // Product Tag
    Route::delete('product-tags/destroy', 'ProductTagController@massDestroy')->name('product-tags.massDestroy');
    Route::resource('product-tags', 'ProductTagController');

    // Product
    Route::delete('products/destroy', 'ProductController@massDestroy')->name('products.massDestroy');
    Route::post('products/media', 'ProductController@storeMedia')->name('products.storeMedia');
    Route::post('products/ckmedia', 'ProductController@storeCKEditorImages')->name('products.storeCKEditorImages');
    Route::post('products/parse-csv-import', 'ProductController@parseCsvImport')->name('products.parseCsvImport');
    Route::post('products/process-csv-import', 'ProductController@processCsvImport')->name('products.processCsvImport');
    Route::resource('products', 'ProductController');

    // User Alerts
    Route::delete('user-alerts/destroy', 'UserAlertsController@massDestroy')->name('user-alerts.massDestroy');
    Route::get('user-alerts/read', 'UserAlertsController@read');
    Route::resource('user-alerts', 'UserAlertsController', ['except' => ['edit', 'update']]);

    // City
    Route::delete('cities/destroy', 'CityController@massDestroy')->name('cities.massDestroy');
    Route::resource('cities', 'CityController');

    // Product Carts
    Route::delete('product-carts/destroy', 'ProductCartsController@massDestroy')->name('product-carts.massDestroy');
    Route::resource('product-carts', 'ProductCartsController');

    // Service Request
    Route::delete('service-requests/destroy', 'ServiceRequestController@massDestroy')->name('service-requests.massDestroy');
    Route::resource('service-requests', 'ServiceRequestController');

   // Contactus
    Route::delete('contactus/destroy', 'ContactusController@massDestroy')->name('contactus.massDestroy');
    Route::resource('contactus', 'ContactusController');

    
    // Orders
    Route::delete('orders/destroy', 'OrdersController@massDestroy')->name('orders.massDestroy');
    Route::resource('orders', 'OrdersController');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});

//-----------------------------------frontend

Route::group([ 'as' => 'frontend.', 'namespace' => 'Frontend'], function () {
       
      Route::get('/', 'HomeController@home')->name('home');
      Route::get('about', 'AboutController@about')->name('about');
      Route::get('services', 'ServiceController@services')->name('services');
      Route::get('Service_Request', 'ServiceController@serviceRequest')->name('request-service');
      Route::POst('Service_Request/add', 'ServiceController@store')->name('store_service_request');
      Route::get('products/{category_id}', 'ProductController@products')->name('products');
      Route::get('product/details/{id}', 'ProductController@productDetails')->name('product_details');
      Route::view('contact_us','frontend.contact_us')->name('contact_us');
      Route::Post('contact_us/add', 'HomeController@contact')->name('store_contact');
      Route::view('user_login', 'frontend.login')->name('login');
      Route::view('register', 'frontend.register')->name('register');
      Route::Post('user/add', 'HomeController@register')->name('register_store');
      Route::get('search', 'ProductController@search')->name('search');

      
   
        Route::group(['middleware' => 'auth'], function () {
           Route::get('cart', 'CartController@index')->name('cart');
           Route::POst('carts/add', 'CartController@store')->name('carts.store');
           Route::get('carts/delete/{id}', 'CartController@delete')->name('cart.delete');
           Route::view('order-form','frontend.order-form')->name('order_form');
           Route::POst('order/add', 'OrderController@store')->name('order.store');
           Route::view('profile','frontend.profile')->name('profile');
           Route::POst('update_profile', 'HomeController@updateProfile')->name('update_profile');


      });

});