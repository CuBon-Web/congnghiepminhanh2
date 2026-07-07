<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('config:clear');
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('config:cache');
    return 'DONE'; //Return anything
});
Route::get('/crm', function () {
    return view('app');
});

Route::get('/sitemaps.xml', function () {
    $pages = collect([
        ['loc' => url('/'), 'changefreq' => 'daily', 'priority' => '1.0', 'lastmod' => now()->toAtomString()],
        ['loc' => route('allProduct'), 'changefreq' => 'daily', 'priority' => '0.9', 'lastmod' => now()->toAtomString()],
        ['loc' => route('videoReview'), 'changefreq' => 'weekly', 'priority' => '0.7', 'lastmod' => now()->toAtomString()],
        ['loc' => route('aboutUs'), 'changefreq' => 'monthly', 'priority' => '0.7', 'lastmod' => now()->toAtomString()],
        ['loc' => route('technology'), 'changefreq' => 'weekly', 'priority' => '0.7', 'lastmod' => now()->toAtomString()],
        ['loc' => route('lienHe'), 'changefreq' => 'monthly', 'priority' => '0.7', 'lastmod' => now()->toAtomString()],
        ['loc' => route('duanTieuBieu'), 'changefreq' => 'weekly', 'priority' => '0.8', 'lastmod' => now()->toAtomString()],
        ['loc' => route('fag'), 'changefreq' => 'monthly', 'priority' => '0.6', 'lastmod' => now()->toAtomString()],
        ['loc' => route('allListBlog'), 'changefreq' => 'daily', 'priority' => '0.8', 'lastmod' => now()->toAtomString()],
    ]);

    $blogs = \App\models\blog\Blog::query()
        ->where('status', 1)
        ->whereNotNull('slug')
        ->orderByDesc('id')
        ->get();

    foreach ($blogs as $blog) {
        $pages->push([
            'loc' => route('detailBlog', ['slug' => $blog->slug]),
            'changefreq' => 'weekly',
            'priority' => '0.7',
            'lastmod' => optional($blog->updated_at)->toAtomString() ?? now()->toAtomString(),
        ]);
    }

    $projects = \App\models\Project::query()
        ->where('status', 1)
        ->whereNotNull('slug')
        ->orderByDesc('id')
        ->get();

    foreach ($projects as $project) {
        $pages->push([
            'loc' => route('duanTieuBieuDetail', ['slug' => $project->slug]),
            'changefreq' => 'monthly',
            'priority' => '0.7',
            'lastmod' => optional($project->updated_at)->toAtomString() ?? now()->toAtomString(),
        ]);
    }

    $solutions = \App\models\Solution::query()
        ->where('status', 1)
        ->whereNotNull('slug')
        ->orderByDesc('id')
        ->get();

    foreach ($solutions as $solution) {
        $pages->push([
            'loc' => route('detailSolution', ['slug' => $solution->slug]),
            'changefreq' => 'weekly',
            'priority' => '0.8',
            'lastmod' => optional($solution->updated_at)->toAtomString() ?? now()->toAtomString(),
        ]);
    }

    $serviceCates = \App\models\ServiceCate::query()
        ->where('status', 1)
        ->whereNotNull('slug')
        ->orderByDesc('id')
        ->get();

    foreach ($serviceCates as $serviceCate) {
        $pages->push([
            'loc' => route('serviceList', ['slug' => $serviceCate->slug]),
            'changefreq' => 'weekly',
            'priority' => '0.7',
            'lastmod' => optional($serviceCate->updated_at)->toAtomString() ?? now()->toAtomString(),
        ]);
    }

    $services = \App\models\Services::query()
        ->where('status', 1)
        ->whereNotNull('slug')
        ->whereNotNull('cate_slug')
        ->orderByDesc('id')
        ->get();

    foreach ($services as $service) {
        $pages->push([
            'loc' => route('serviceDetail', ['danhmuc' => $service->cate_slug, 'slug' => $service->slug]),
            'changefreq' => 'weekly',
            'priority' => '0.7',
            'lastmod' => optional($service->updated_at)->toAtomString() ?? now()->toAtomString(),
        ]);
    }

    $pageContents = \App\models\PageContent::query()
        ->where('status', 1)
        ->whereNotNull('slug')
        ->orderByDesc('id')
        ->get();

    foreach ($pageContents as $pageContent) {
        $pages->push([
            'loc' => route('pagecontent', ['slug' => $pageContent->slug]),
            'changefreq' => 'monthly',
            'priority' => '0.6',
            'lastmod' => optional($pageContent->updated_at)->toAtomString() ?? now()->toAtomString(),
        ]);
    }

    $products = \App\models\product\Product::query()
        ->leftJoin('product_category as pc', 'pc.id', '=', 'products.category')
        ->leftJoin('product_type as pt', 'pt.id', '=', 'products.type_cate')
        ->select([
            'products.id',
            'products.slug',
            'products.updated_at',
            'products.cate_slug',
            'products.type_slug',
            'pc.slug as category_slug_join',
            'pt.slug as type_slug_join',
        ])
        ->orderByDesc('products.id')
        ->get();

    foreach ($products as $product) {
        $cate = trim((string) ($product->cate_slug ?: $product->category_slug_join));
        $type = trim((string) ($product->type_slug ?: $product->type_slug_join));
        $id = trim((string) $product->slug);

        if ($cate === '' || $id === '') {
            continue;
        }

        if ($type === '') {
            $type = 'loai';
        }

        $pages->push([
            'loc' => route('detailProduct', [
                'cate' => $cate,
                'type' => $type,
                'id' => $id,
            ]),
            'changefreq' => 'weekly',
            'priority' => '0.8',
            'lastmod' => optional($product->updated_at)->toAtomString() ?? now()->toAtomString(),
        ]);
    }

    $items = $pages->unique('loc')->values();
    $xml = view('sitemap', ['items' => $items])->render();

    return response($xml, 200)->header('Content-Type', 'application/xml');
})->name('sitemap');

Route::get('/sitemap-products.xml', function () {
    $pages = collect([]);

    $products = \App\models\product\Product::query()
        ->leftJoin('product_category as pc', 'pc.id', '=', 'products.category')
        ->leftJoin('product_type as pt', 'pt.id', '=', 'products.type_cate')
        ->select([
            'products.id',
            'products.slug',
            'products.updated_at',
            'products.cate_slug',
            'products.type_slug',
            'pc.slug as category_slug_join',
            'pt.slug as type_slug_join',
        ])
        ->orderByDesc('products.id')
        ->get();

    foreach ($products as $product) {
        $cate = trim((string) ($product->cate_slug ?: $product->category_slug_join));
        $type = trim((string) ($product->type_slug ?: $product->type_slug_join));
        $id = trim((string) $product->slug);

        if ($cate === '' || $id === '') {
            continue;
        }

        if ($type === '') {
            $type = 'loai';
        }

        $pages->push([
            'loc' => route('detailProduct', [
                'cate' => $cate,
                'type' => $type,
                'id' => $id,
            ]),
            'changefreq' => 'weekly',
            'priority' => '0.8',
            'lastmod' => optional($product->updated_at)->toAtomString() ?? now()->toAtomString(),
        ]);
    }

    $items = $pages->unique('loc')->values();
    $xml = view('sitemap', ['items' => $items])->render();

    return response($xml, 200)->header('Content-Type', 'application/xml');
})->name('sitemapProducts');
// Route::get('/admin', function () {
//     dd(1);
//     return view('app');
// }); 
Route::get('/','HomeController@home')->name('home')->middleware(checkLanguage::class);
Route::group(['namespace'=>'Client','middleware' => ['checkLanguage']], function(){
    Route::get('get-variant.html','ProductController@getSku')->name('getSku');
    Route::get('type-product/{id}','PageController@typeproduct');
    Route::get('district/{id}','PageController@district');
    
    Route::get('dang-nhap.html','AuthController@login')->name('login')->middleware('CheckAuthLogout::class');
    Route::post('dang-nhap.html','AuthController@postLogin')->name('postlogin');
    Route::get('dang-ky.html','AuthController@register')->name('register');
    Route::post('dang-ky.html','AuthController@postRegister')->name('postRegister');
    Route::get('dang-xuat.html','AuthController@logout')->name('logout')->middleware('CheckAuthClient::class');
    Route::post('filter.html','ProductController@filterProduct')->name('filterProduct');
    Route::get('build-pc.html','BuildPcController@buildPc')->name('buildPc');
    
    Route::get('video-review.html','PageController@videoReview')->name('videoReview');
    Route::get('trang-noi-dung/{slug}.html','PageContentController@detail')->name('pagecontent');
    Route::get('dich-vu/{slug}.html','PageController@serviceList')->name('serviceList');
    Route::get('dich-vu/{danhmuc}/{slug}.html','PageController@serviceDetail')->name('serviceDetail');
    Route::get('gioi-thieu.html','PageController@aboutUs')->name('aboutUs');  
    Route::get('cong-nghe.html','PageController@technology')->name('technology');   
    Route::get('lien-he.html','PageController@contact')->name('lienHe');
    Route::post('lien-he','PageController@postcontact')->name('postcontact');
    Route::get('du-an-tieu-bieu.html','PageController@duanTieuBieu')->name('duanTieuBieu');
    Route::get('du-an-tieu-bieu/{slug}.html','PageController@duanTieuBieuDetail')->name('duanTieuBieuDetail');
    Route::get('cau-hoi-thuong-gap.html','PageController@fag')->name('fag');
    Route::get('giai-phap/{slug}.html','SolutionController@detail')->name('detailSolution');

    Route::group(['prefix'=>'cong-trinh'], function(){
        Route::get('/tat-ca.html','ConstructionController@list')->name('allListConstruction');
        Route::get('{id}.html','ConstructionController@detail')->name('detailConstruction');
    });
    Route::get('quickview/{id}','PageController@quickview')->name('quickview');
    Route::get('nhan-bao-gia.html','PageController@baogia')->name('baogia');

    Route::get('gio-hang.html', 'CartController@listCart')->name('listCart');
    Route::post('add-to-cart', 'CartController@addToCart')->name('add.to.cart');
    Route::post('update-cart', 'CartController@update')->name('update.cart');
    Route::post('remove-from-cart', 'CartController@remove')->name('remove.from.cart');
    Route::get('thanh-toan.html','CartController@checkout')->name('checkout');
    Route::post('thantoan','CartController@postBill')->name('postBill');
    Route::get('dat-hang-thanh-cong.html','CartController@orderSuccess')->name('orderSuccess');

    Route::get('dat-ban.html','PageController@orderNow')->name('orderNow');
    Route::get('menu.html','PageController@menu')->name('menu');
    Route::get('account/orders','AuthController@accoungOrder')->name('accoungOrder')->middleware('CheckAuthClient::class');
    Route::get('account/orders/{billid}','AuthController@accoungOrderDetail')->name('accoungOrderDetail')->middleware('CheckAuthClient::class');
    
    Route::post('buildpc','BuildPcController@renderProductBuild')->name('renderProductBuild');
    Route::post('addProductBuildPc','BuildPcController@addProductBuildPc')->name('addProductBuildPc');
    Route::post('removeItemBuild','BuildPcController@removeItemBuild')->name('removeItemBuild');
    Route::post('plusQtyItemBuild','BuildPcController@plusQtyItemBuild')->name('plusQtyItemBuild');
    Route::post('mineQtyItemBuild','BuildPcController@mineQtyItemBuild')->name('mineQtyItemBuild');
    Route::post('addBuildToCart','BuildPcController@addBuildToCart')->name('addBuildToCart');
    
    Route::get('auth/google', 'GoogleController@redirectToGoogle')->name('loginGoogle');
    Route::get('auth/google/callback', 'GoogleController@handleGoogleCallback');

    Route::get('auth/facebook', 'FacebookController@redirectToFacebook')->name('loginFacebook');
    Route::get('auth/facebook/callback', 'FacebookController@handleFacebookCallback'); 
    Route::group(['prefix'=>'tin-tuc'], function(){
        Route::get('/24h-cong-nghe.html','BlogController@list')->name('allListBlog');
        Route::get('danh-muc/{slug}.html','BlogController@listCateBlog')->name('listCateBlog');
        Route::get('loai-danh-muc/{slug}.html','BlogController@listTypeBlog')->name('listTypeBlog');
        Route::get('chi-tiet/{slug}.html','BlogController@detailBlog')->name('detailBlog');
    });

    Route::get('tat-ca-san-pham.html','ProductController@allProduct')->name('allProduct');
    Route::get('san-pham-noi-bat.html','ProductController@flashSale')->name('flashSale');
    Route::get('tag/{tag}.html','ProductController@tag')->name('allListTags');
    Route::get('chi-tiet/{cate}/{type}/{id}.html','ProductController@detail_product')->name('detailProduct');
    Route::get('{danhmuc}.html','ProductController@allListCate')->name('allListProCate');
    Route::get('{danhmuc}/{loaidanhmuc}.html','ProductController@allListType')->name('allListType');
    Route::get('{danhmuc}/{loaidanhmuc}/{loai2}.html','ProductController@allListTypeTwo')->name('allListTypeTwo');
    Route::post('san-pham/compare','ProductController@compare')->name('compareProduct');
    Route::post('san-pham/remove-compare','ProductController@removeCompare')->name('removeCompare');
    Route::get('san-pham/so-sanh-san-pham','ProductController@compareList')->name('compareList');
    Route::post('auto-search-product','ProductController@autosearchcomplete')->name('autosearchcomplete');
    Route::get('ket-qua-tim-kiem','ProductController@searchResult')->name('search_result');
    
});


Route::post('/languages', 'LanguageController@index')->name('languages');
