<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FavoritController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FacteurProformaController;
use App\Http\Controllers\PubController;
use App\Http\Controllers\TestimonialsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AddOffreController;
use App\Http\Controllers\DomainController;
use App\Http\Controllers\SpecificationController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\OffreController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\SearchOffreController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\GroupParticipantController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\AbonnementBoutiqueController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\SettingsController;
use App\Http\Controllers\Admin\AbonnementController;
use App\Http\Controllers\Auth\DeviceManagerController;
use App\Http\Controllers\Auth\PasswordResetController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Middleware\CheckSubscriptionEndDate;

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

// Route::get('/test', function () {
//     return base_path();
// });


Route::get('/test', function () {
    return view('user.notif');
});
///cart
Route::get('/store/cart', [CartController::class, 'index'])->name('cart');
Route::post('/store/addcart', [CartController::class, 'store'])->name('cart.store');
Route::delete('/cart/{product}', [CartController::class, 'destroy'])->name('cart.destroy');



Route::get('/categories/children-web/{parentId}', [CategoryController::class, 'getChildCategories'])->name('category.childs');
Route::get('/categories/children/{parentId}', [CategoryController::class, 'getChildCategoriesJson']);

Route::get('/contact', [ContactController::class, 'create'])->name('contact.create');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

//Cahier de charge et documents 
Route::get('/specifications/all',[SpecificationController::class, 'index'])->name('specifications.all');
Route::get('/specifications/docsutils',[SpecificationController::class, 'utils'])->name('specifications.utils');
Route::get('/specifications/veille',[SpecificationController::class, 'veille'])->name('specifications.veille');
Route::get('/specifications/show/{specification}',[SpecificationController::class, 'show'])->name('specification.show');
Route::get('/domains/all',[DomainController::class, 'index'])->name('domains.index');
Route::get('/domains/show/{domain}',[DomainController::class, 'show'])->name('domain.show');
// Store 
Route::get('/store',[StoreController::class, 'index'] )->name('store');
Route::get('/store/marques',[StoreController::class, 'marques'] )->name('store.marques');
Route::get('/store/marque/products/{brand}',[StoreController::class, 'marqueProducts'] )->name('store.marque.products');
Route::get('/store/product/details/{product}',[StoreController::class, 'productDetails'] )->name('store.product.details');
Route::get('/store/show/{store}',[StoreController::class, 'show'])->name('store.show');
Route::get('/showallstores',[StoreController::class, 'Stores'])->name('store.all');
Route::get('/products',[StoreController::class, 'products'])->name('showproducts');
Route::get('/category/{category}/products',[ProductController::class, 'categoryProduct'])->name('category.products');

// facteur proforma
Route::post('/facteursave',[FacteurProformaController::class, 'store'] )->name('facteurProformastore');


Route::get('/documents', function () {
    return view('docs');
})->name('docs');
// Route::post('/admin/store/categories/store', function () {
//     return "ok";
// })->name('categories.store');

Route::get('/conditions', function () {
    return view('conditions');
})->name('conditions');

// email verification
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

// password reset
Route::get('/forgot-password',[PasswordResetController::class, 'GetPasswordLinkForm'])->name('password.request')->middleware('guest');
Route::post('/forgot-password',[PasswordResetController::class, 'GetPasswordLink'])->name('password.email')->middleware('guest');

Route::get('/reset-password/{token}',[PasswordResetController::class, 'PasswordResetForm'])->middleware('guest')->name('password.reset');
Route::post('/reset-password',[PasswordResetController::class, 'PasswordReset'])->middleware('guest')->name('password.update');


Route::get('/suspended', function () {
    return view('suspended');
})->name('suspended');

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/help',function () {
    return view('help');
})->name('help');

Route::get('/search',[SearchOffreController::class, 'index'])->name('search');//->middleware('EmailVerified', 'SessionLimiter');
Route::get('/productsall',[StoreController::class, 'allProducts'])->name('allproducts');
Route::get('/device_manager',[DeviceManagerController::class, 'index'])->name('device_manager')->middleware('auth');
Route::post('/device_manager/logout/all',[DeviceManagerController::class, 'logout_all'])->name('device_manager.logout.all')->middleware('auth');
Route::post('/device_manager/logout/{device_id}',[DeviceManagerController::class, 'logout_single'])->name('device_manager.logout.single')->middleware('auth');

// Route::middleware(['auth', 'EmailVerified', 'SessionLimiter'])->group(function () {
Route::middleware(['auth',  'SessionLimiter'])->group(function () {
    //docs
    Route::get('/specifications/create',[SpecificationController::class, 'create'])->name('specifications.create');
    Route::post('/specifications/save',[SpecificationController::class, 'newdoc'])->name('specifications.newdoc');


    /// Group 
    Route::get('/participer/{offre}', [GroupParticipantController::class, 'store'])->name('participer');

// create store
    Route::get('/create',[StoreController::class, 'createStore'] )->name('store.create');
    Route::post('/store/store',[StoreController::class, 'saveStore'] )->name('store.save');

    // Store ////////
  

        // order
    Route::post('/store/order', [OrderController::class, 'store'])->name('orders.store');
    Route::get('/store/order', [OrderController::class, 'index'])->name('orders.index');
    //////////////////////////


    Route::get('/add',[AddOffreController::class, 'index'])->name('offre.add');
    Route::post('/add',[AddOffreController::class, 'store']);

    // Route::delete('/offre',[AddOffreController::class, 'destroy'])->name('offre.destroy');

    Route::get('/settings/profile',[ProfileController::class, 'index'])->name('profile');
    Route::get('/settings/abonnement',[ProfileController::class, 'abonnement'])->name('abonnement');
    Route::get('/settings/notification',[ProfileController::class, 'notif'])->name('notification');
    Route::get('/settings/offres',[AddOffreController::class, 'mesoffres'])->name('user.offers');

    Route::post('/pack',[SettingsController::class, 'DemandeAbonnement'])->name('user.pack.add');
    Route::post('/chang_pswd',[SettingsController::class, 'EditPassword'])->name('user.password');
    Route::post('/chang_email',[SettingsController::class, 'editemail'])->name('user.email');
    Route::post('/chang_phone',[SettingsController::class, 'editphone'])->name('user.phone');

    Route::post('/favories/{offre}',[FavoritController::class, 'toggle'])->name('favorit.toggle');
    Route::get('/favories',[FavoritController::class, 'index'])->name('offre.favorit');

    Route::post('/settings/notif/',[SettingsController::class, 'Editnotif'])->name('user.notif');
    Route::delete('/settings/notif/wilaya/{wilaya}',[SettingsController::class, 'deleteWilaya'])->name('user.notif.wilaya');
    Route::delete('/settings/notif/sect/{secteur}',[SettingsController::class, 'deleteSecteur'])->name('user.notif.secteur');
    Route::delete('/settings/notif/keyword/{keyword}',[SettingsController::class, 'deleteKeyword'])->name('user.notif.keyword');
    Route::delete('/settings/notif/statut/{statut}',[SettingsController::class, 'deletestatut'])->name('user.notif.statut');




});

Route::middleware(['guest'])->group(function () {
    Route::get('/login',[LoginController::class, 'index'])->name('login');
    Route::post('/login',[LoginController::class, 'store']);

    Route::get('/register',[RegisterController::class, 'index'])->name('register');
    // Route::get('/register/{choice}',[RegisterController::class, 'index']);
    Route::post('/register',[RegisterController::class, 'store']);
});


Route::get('/detail/{offre_id}',[SearchOffreController::class, 'detail'])->name('detail');//->middleware('EmailVerified', 'SessionLimiter');


// adminpanel (both admin & publisher can access those routes)
Route::group(['prefix' => 'admin',  'middleware' => 'adminpanel'], function()
{
    Route::get('/contact/all', [ContactController::class, 'index'])->name('contact.all');
    Route::delete('/contact/delete', [ContactController::class, 'destroy'])->name('contact.destroy');
    Route::get('/contact/{contact}', [ContactController::class, 'show'])->name('contact.show');

    Route::get('/', function () { return view('admin.dashboard');})->name('dashboard');

    //Domains
    Route::get('/domains',[DomainController::class, 'allDomains'])->name('domains');
    Route::post('/domains',[DomainController::class, 'store'])->name('domain.store');
    

    //Specifications
    Route::get('/specifications',[SpecificationController::class, 'allSpecifications'])->name('specifications');
    Route::post('/specifications',[SpecificationController::class, 'store'])->name('specification.store');

   
    
    //Admin Store
    //Route::post('/store/categories/store',[CategoryController::class, 'store'])->name('categories.store');
    Route::group(['prefix' => 'store'], function() 
    {
        Route::get('/', function () { return view('admin.store.dashboard');})->name('store.admin');
        Route::get('/categories/level/{level}', [CategoryController::class, 'showLevel'])->name('categories.level');
        Route::post('/categories/filter', [CategoryController::class, 'filterLevel'])->name('categories.filter');
        Route::get('/categories/level/0',[CategoryController::class, 'showLevel'])->name('categories.all');
        Route::post('/categories/store',[CategoryController::class, 'store'])->name('categories.store');
        Route::get('/categories/{category}',[CategoryController::class, 'edit'])->name('categories.edit');
        Route::post('/categories/{category}',[CategoryController::class, 'update'])->name('categories.update');
        Route::delete('/categories/delete',[CategoryController::class, 'destroy'])->name('categories.delete');
       

         // Partners
        Route::get('/partners',[PartnerController::class, 'index'])->name('partners');
        Route::post('/partners',[PartnerController::class, 'store'])->name('partners.store');
        Route::get('/partners/{partner}',[PartnerController::class, 'edit'])->name('partners.edit');
        Route::post('/partners/{partner}',[PartnerController::class, 'update'])->name('partners.update');
        Route::delete('/partners/delete',[PartnerController::class, 'destroy'])->name('partners.delete');
        // //sub category
        // Route::get('/subcategories',[SubCategoryController::class, 'index'])->name('subcategories.all');
        // Route::post('/subcategories/store',[SubCategoryController::class, 'store'])->name('subcategories.store');
        // Route::delete('/subcategories/delete',[SubCategoryController::class, 'destroy'])->name('subcategories.delete');

        // //sub-sub category
        // Route::get('/subsubcategories',[SubSubCategoryController::class, 'index'])->name('subsubcategories.all');
        // Route::post('/subsubcategories/store',[SubSubCategoryController::class, 'store'])->name('subsubcategories.store');
        // Route::delete('/subsubcategories/delete',[SubSubCategoryController::class, 'destroy'])->name('subsubcategories.delete');
    
        //brands
        Route::get('/brands',[BrandController::class, 'index'])->name('brands.all');
        Route::post('/brands/store',[BrandController::class, 'store'])->name('brands.store');
        Route::get('/brands/edit/{brand}',[BrandController::class, 'edit'])->name('brands.edit');
        Route::post('/brands/update/{brand}',[BrandController::class, 'update'])->name('brands.update');
        Route::delete('/brands/delete',[BrandController::class, 'destroy'])->name('brands.destroy');
        

        //testimonials
        Route::post('/testimonials',[TestimonialsController::class, 'store'])->name('testimonials.store');
        Route::delete('/testimonials/delete',[TestimonialsController::class, 'destroy']);
    
        //stores
        Route::get('/pending',[StoreController::class, 'allStores'])->name('stores.pending');
        Route::get('/accepted',[StoreController::class, 'acceptedStores'])->name('stores.accepted');
        Route::get('/block/{store}',[StoreController::class, 'block'])->name('store.block');
        Route::get('/active/{store}',[StoreController::class, 'active'])->name('store.active');
        Route::post('/abonnement/add',[AbonnementBoutiqueController::class, 'store'])->name('admin.store.abonnemnt.store');
        Route::get('/{store}',[StoreController::class, 'showStoreAdmin'])->name('admin.store.show');
        Route::post('/{store}',[StoreController::class, 'editStoreAdmin'])->name('admin.store.edit');

        //orders
        Route::get('orders/unactive',[OrderController::class, 'allUnactiveOrders'])->name('orders.unactive');
        Route::get('orders/details/{order}',[OrderController::class, 'show'])->name('orders.details');
        Route::post('orders/accept',[OrderController::class, 'accept'])->name('orders.accept');
        
        //Products
        Route::get('/products/pending',[ProductController::class, 'adminProductsPending'])->name('products.pending.all');
        Route::get('/products/details/{product}',[ProductController::class, 'edit'])->name('product.edit.admin');
        Route::get('/products/accepted',[ProductController::class, 'adminProductsAccepted'])->name('products.accepted.all');
        Route::get('/products/accept/{product}',[ProductController::class, 'accept'])->name('product.accept');
        Route::get('/products/reject/{product}',[ProductController::class, 'reject'])->name('product.reject');
        Route::post('/products/update/{product}',[ProductController::class, 'adminUpdate'])->name('admin.product.update');
        Route::get('/products/edit/{product}',[ProductController::class, 'adminEdit'])->name('admin.product.edit');
        // facteurs proforma
        Route::get('/facteurs/all',[FacteurProformaController::class, 'index'])->name('factureperforma');
        Route::get('/facteurs/{facteurProforma}',[FacteurProformaController::class, 'show'])->name('facture.show');

        //Pubs =
        Route::get('/pubs/all',[PubController::class, 'index'])->name('pubs');
        Route::post('/pubs/store',[PubController::class, 'store'])->name('pubs.store');
        Route::post('/pubs/filter',[PubController::class, 'filterZone'])->name('pubs.filter');
        Route::delete('/pubs/delete',[PubController::class, 'destroy'])->name('pubs.delete');
    ///////////////

       
    });

    //Testimonials
    Route::get('/testimonials',[TestimonialsController::class, 'index'])->name('testimonials');
    

    //category
   
    Route::post('/logout',[LogoutController::class, 'index'])->name('admin.logout');  
    
    Route::get('/offers',[OffreController::class, 'index'])->name('admin.offers');
    
    Route::get('/offers/add',[OffreController::class, 'addform'])->name('admin.offers.add');
    Route::post('/offers/add',[OffreController::class, 'store']);
    
    Route::delete('/offre',[OffreController::class, 'destroy'])->name('admin.offre.destroy');

    Route::get('/offers/edit/{offer}',[OffreController::class, 'editform'])->name('admin.offers.edit');
    Route::post('/offers/edit/{offer}',[OffreController::class, 'edit']);

    Route::get('/settings', function () {
        return view('admin.settings');
    })->name('admin.settings');
    Route::post('/settings',[SettingsController::class, 'EditPassword']);

});

Route::group(['prefix' => 'admin',  'middleware' => 'admin'], function() {

    //grouping 
    Route::get('/offreGroups',[GroupParticipantController::class, 'index'])->name('admin.offregroups');
    Route::get('/offretraite',[GroupParticipantController::class, 'activeGroups'])->name('admin.offretraite');
    Route::get('/groupMembers/{offre}',[GroupParticipantController::class, 'show'])->name('groupMembers');
    Route::get('/grouped/{offre}',[GroupParticipantController::class, 'update'])->name('grouped');


    Route::get('/users',[UsersController::class, 'index'])->name('admin.users');
    Route::get('/product/add', [ProductController::class, 'adminCreate'])->name('admin.products.create');
    Route::post('/product/store', [ProductController::class, 'store'])->name('admin.products.store');
    Route::post('/users/etat/{user}',[UsersController::class, 'update_etat'])->name('admin.user.etat');
    Route::post('/users/email/{user}',[UsersController::class, 'Email_Verify'])->name('admin.user.email');
    Route::post('/users/password/{user}',[UsersController::class, 'update_password'])->name('admin.user.password');
    Route::post('/users/detail/{user}',[UsersController::class, 'update_details'])->name('admin.user.details');
    Route::delete('/abonnement',[AbonnementController::class, 'destroy'])->name('admin.abonnement.destroy');
    Route::post('/abonnement/add/{user}',[AbonnementController::class, 'store'])->name('admin.abonnement.store');
    Route::post('/abonnement/edit',[AbonnementController::class, 'edit'])->name('admin.abonnement.edit');
   
    Route::get('/abonnement/{abonnement}',[AbonnementController::class, 'detail'])->name('admin.abonnement.detail');


    Route::get('/users/add',[UsersController::class, 'addform'])->name('admin.user.add');
    Route::post('/users/add',[UsersController::class, 'store']);

    Route::get('/users/{user}',[UsersController::class, 'detail'])->name('admin.users.detail');

    Route::get('/admins',[AdminController::class, 'index'])->name('admin.admins');
    Route::get('/admins/add', function () {
        return view('admin.add_admin');
    })->name('admin.admins.add');
    Route::post('/admins/add',[AdminController::class, 'store']);

    Route::get('/offers/trash',[OffreController::class, 'trashed'])->name('admin.trash');
    Route::post('/offers/restore',[OffreController::class, 'restore'])->name('admin.offre.restore');

    Route::get('/offers/pending',[OffreController::class, 'pending'])->name('admin.pending');
    Route::post('/offers/accept',[OffreController::class, 'accept'])->name('admin.offre.accept');

    Route::post('/admin/notif/{notif}',[UsersController::class, 'Editnotif'])->name('admin.notif');
    Route::delete('/notif/sect/{user}/{secteur}',[UsersController::class, 'deleteSecteur'])->name('admin.notif.secteur');

});

Route::group(['prefix' => 'representant',  'middleware' => 'ContentCreator'], function()
{
    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('rep.dashboard');
    
    Route::get('/offers',[OffreController::class, 'index'])->name('rep.offers');
    
    Route::get('/offers/add',[OffreController::class, 'addform'])->name('rep.offers.add');
    Route::post('/offers/add',[AddOffreController::class, 'store']);
    
    Route::get('/offers/edit/{offer}',[OffreController::class, 'editform'])->name('rep.offers.edit');
    Route::post('/offers/edit/{offer}',[AddOffreController::class, 'edit']);

    Route::delete('/offre',[OffreController::class, 'destroy'])->name('rep.offre.destroy');

    Route::get('/settings', function () {
        return view('admin.settings');
    })->name('rep.settings');
    Route::post('/settings',[SettingsController::class, 'EditPassword']);

});

//Store Panel 

Route::group(['prefix' => 'store',  'middleware' => ['auth','storeAbonnement']], function()
{
    Route::get('/panel', function () {return view('store.panel.dashboard');})->name('storePanel');
    //Products
    Route::get('/products/allaccepted',[ProductController::class, 'index'])->name('products.all');
    Route::get('/products/allpending',[ProductController::class, 'pending'])->name('products.pending');
    Route::get('/products/details/{product}',[ProductController::class, 'edit'])->name('product.edit');
    Route::get('/product/add', [ProductController::class, 'create'])->name('products.create');
    Route::post('/product/store', [ProductController::class, 'store'])->name('products.store');
    Route::post('/products/update/{product}',[ProductController::class, 'update'])->name('product.update');
    //Orders
    Route::get('/orders', [OrderController::class, 'VendorOrders'])->name('orders');
    Route::get('/orderProducts/{user}', [OrderController::class, 'ordersProducts'])->name('order.products');
    Route::get('/orderConfirm', function () {return view('store.panel.confirmOrder');})->name('order.confirm');
    //Clients
    Route::get('/clients', [ClientController::class, 'index'])->name('clients');
    //Alerts
    Route::get('/alerts', function () {return view('store.panel.alerts');})->name('alerts');
    //Settings
    Route::get('/settings', function () {return view('store.panel.settings');})->name('settings');

    
   
});

Route::post('/logout',[LogoutController::class, 'index'])->name('logout')->middleware('auth');