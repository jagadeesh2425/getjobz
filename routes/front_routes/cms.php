<?php
Route::get('cms/{slug}', 'CmsController@getPage')->name('cms');
Route::get('terms-of-use', 'CmsController@termsOfUse')->name('terms.of.use');

Route::get('contact-us', 'ContactController@index')->name('contact.us');
Route::post('contact-us', 'ContactController@postContact')->name('contact.us');
Route::get('contact-us-thanks', 'ContactController@thanks')->name('contact.us.thanks');

Route::get('services/xpress-resume', 'ServicesController@xpressresume')->name('xpress.resume');
Route::get('services/resume-highlighter', 'ServicesController@resumehighlighter')->name('resume.highlighter');
Route::get('services/resume-writing', 'ServicesController@resumewriting')->name('resume.writing');
Route::get('services/special-packages', 'ServicesController@specialpackages')->name('special.packages');