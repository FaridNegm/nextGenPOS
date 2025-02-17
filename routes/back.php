<?php

use App\Models\Back\Setting;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

// Start Auth Route
Route::group(['namespace' => 'App\Http\Controllers\Back'], function(){
    Route::get('/login', function(){
        // $settings = Setting::first();
        return view('back.auth.login');
    });

    Route::post('login_post' , 'HomeController@login_post');
});


// Route::group(['prefix' => 'admin/forget_password'], function(){
//     Route::get('/', function(){
//         return view('back.auth.forget_password');
//     });
// });

// clear_cache
Route::get('clear_cache', function() {
    Artisan::call('cache:clear');
    return "cleared cache";
});

 //404
Route::fallback(function () {
    return view("back.404");
});

// , 'middleware' => 'checkLogin' , 'middleware' => 'throttle'
Route::group(['prefix' => '/', 'namespace' => 'App\Http\Controllers\Back'], function(){

    Route::get('/', 'HomeController@index');

    Route::get('logout' , 'HomeController@logout');



    ////////////////////////////////////////////////////////////////////////////////
    // Admin Home Page
    Route::get('/temp-dark', function(){
    return view('back.temp_dark.index');
    });

    // users Routes
    Route::group(['prefix' => 'users'] , function (){
        Route::get('/' , 'UsersController@index');
        Route::post('/store' , 'UsersController@store');
        Route::get('/edit/{id}' , 'UsersController@edit');
        Route::post('/update/{id}' , 'UsersController@update');
        Route::get('/destroy/{id}' , 'UsersController@destroy');
        
        Route::get('datatable' , 'UsersController@datatable');
    });

    // units Routes
    Route::group(['prefix' => 'units'] , function (){
        Route::get('/' , 'UnitsController@index');
        Route::post('/store' , 'UnitsController@store');
        Route::post('/store' , 'UnitsController@store');
        Route::get('/edit/{id}' , 'UnitsController@edit');
        Route::post('/update/{id}' , 'UnitsController@update');
        Route::get('/destroy/{id}' , 'UnitsController@destroy');
        
        Route::get('datatable' , 'UnitsController@datatable');
    });
    
    // productsCategories Routes
    Route::group(['prefix' => 'productsCategories'] , function (){
        Route::get('/' , 'ProductCategoyController@index');
        Route::post('/store' , 'ProductCategoyController@store');
        Route::post('/store' , 'ProductCategoyController@store');
        Route::get('/edit/{id}' , 'ProductCategoyController@edit');
        Route::post('/update/{id}' , 'ProductCategoyController@update');
        Route::get('/destroy/{id}' , 'ProductCategoyController@destroy');
        
        Route::get('datatable' , 'ProductCategoyController@datatable');
    });

    // companies Routes
    Route::group(['prefix' => 'companies'] , function (){
        Route::get('/' , 'CompanyController@index');
        Route::post('/store' , 'CompanyController@store');
        Route::post('/store' , 'CompanyController@store');
        Route::get('/edit/{id}' , 'CompanyController@edit');
        Route::post('/update/{id}' , 'CompanyController@update');
        Route::get('/destroy/{id}' , 'CompanyController@destroy');
        
        Route::get('datatable' , 'CompanyController@datatable');
    });

    // financialYears Routes
    Route::group(['prefix' => 'financialYears'] , function (){
        Route::get('/' , 'FinancialYearsController@index');
        Route::post('/store' , 'FinancialYearsController@store');
        Route::post('/store' , 'FinancialYearsController@store');
        Route::get('/edit/{id}' , 'FinancialYearsController@edit');
        Route::post('/update/{id}' , 'FinancialYearsController@update');
        Route::get('/destroy/{id}' , 'FinancialYearsController@destroy');
        
        Route::get('datatable' , 'FinancialYearsController@datatable');
    });

    // financialStorages Routes
    Route::group(['prefix' => 'financialStorages'] , function (){
        Route::get('/' , 'FinancialStoragesController@index');
        Route::post('/store' , 'FinancialStoragesController@store');
        Route::post('/store' , 'FinancialStoragesController@store');
        Route::get('/edit/{id}' , 'FinancialStoragesController@edit');
        Route::post('/update/{id}' , 'FinancialStoragesController@update');
        Route::get('/destroy/{id}' , 'FinancialStoragesController@destroy');
        
        Route::get('datatable' , 'FinancialStoragesController@datatable');
    });


    // products Routes
    Route::group(['prefix' => 'products'] , function (){
        Route::get('/' , 'ProductController@index');
        Route::post('/store' , 'ProductController@store');
        Route::post('/store' , 'ProductController@store');
        Route::get('/edit/{id}' , 'ProductController@edit');
        Route::post('/update/{id}' , 'ProductController@update');
        Route::get('/destroy/{id}' , 'ProductController@destroy');
        
        Route::get('datatable' , 'ProductController@datatable');
    });























    // clients Routes
    Route::group(['prefix' => 'clients'] , function (){
        Route::get('/' , 'ClientsController@index');
        Route::post('/' , 'ClientsController@store');
        Route::get('/edit/{id}' , 'ClientsController@edit');
        Route::post('/update/{id}' , 'ClientsController@update');
        Route::get('/destroy/{id}' , 'ClientsController@destroy');
        
        Route::post('store_client_from_pos_page' , 'ClientsController@storeClientFromPosPage');
        Route::post('/import' , 'ClientsController@import');
        Route::get('datatable' , 'ClientsController@datatable');
    });

    
    // supplier Routes
    Route::group(['prefix' => 'suppliers'] , function (){
        Route::get('/' , 'SupplierController@index');
        Route::post('/' , 'SupplierController@store');
        Route::get('/edit/{id}' , 'SupplierController@edit');
        Route::post('/update/{id}' , 'SupplierController@update');
        Route::get('/destroy/{id}' , 'SupplierController@destroy');
        
        Route::post('/import' , 'SupplierController@import');
        Route::get('datatable_fiscal_years' , 'FiscalYearController@datatableFiscalYears');
    });

    

    // dismissal_notices
    Route::group(['prefix' => 'dismissal_notices'] , function (){
        Route::get('datatable_dismissal_notices' , 'DismissalNoticeController@datatableDismissalNotices');
        Route::get('/' , 'DismissalNoticeController@index');
        Route::post('/' , 'DismissalNoticeController@store');
        Route::get('/edit/{id}' , 'DismissalNoticeController@edit');
        Route::post('/update/{id}' , 'DismissalNoticeController@update');
        Route::get('/destroy/{id}' , 'DismissalNoticeController@destroy');
    });










    // // products
    // Route::group(['prefix' => 'products'] , function (){
    //     Route::get('/getProductsByBranch/{id}' , 'ProductsController@getProductsByBranch');
    //     Route::get('/' , 'ProductsController@index');

    //     Route::get('/get_stores_by_branch/{id}' , 'ProductsController@getStoresByBranch');
    //     Route::get('/get_last_id_with_branch_store/{id}' , 'ProductsController@getLastIdWithBranchStore');
    //     Route::get('/get_last_product_code_by_branch_and_store/{store}/{branch}' , 'ProductsController@getLastProductCodeByBranchAndStore');

    //     Route::post('/import' , 'ProductsController@import');
    //     Route::get('/add' , 'ProductsController@create');
    //     Route::post('/' , 'ProductsController@store');
    //     Route::get('/edit/{id}/{branch}' , 'ProductsController@edit');
    //     Route::get('/copy_add/{id}/{branch}/{store}' , 'ProductsController@copyAdd');
    //     Route::post('/update/{id}/{internal_code}' , 'ProductsController@update');
    //     // Route::get('/destroy/{id}' , 'ProductsController@destroy');
    // });

    // products_categories
    Route::group(['prefix' => 'products_categories'] , function (){
        Route::get('datatable_products_categories' , 'ProductCategoyController@datatableProductCategory');
        Route::get('/' , 'ProductCategoyController@index');
        Route::post('/' , 'ProductCategoyController@store');
        Route::get('/edit/{id}' , 'ProductCategoyController@edit');
        Route::post('/update/{id}' , 'ProductCategoyController@update');

        Route::get('/change_categoory_price' , 'ProductCategoyController@changeCategooryPrice');
        Route::get('/getProductsCategoryBranch/{id}' , 'ProductCategoyController@getProductsCategoryBranch');
        Route::get('/getProductsByCategory/{id}' , 'ProductCategoyController@getProductsByCategory');
        Route::post('/updateProductsByCategory' , 'ProductCategoyController@updateProductsByCategory');
        // Route::get('/destroy/{id}' , 'ProductCategoyController@destroy');
    });

    // Purchases
    Route::group(['prefix' => 'purchases'] , function (){
        Route::get('/', 'PurchasesController@index');
        Route::get('/list', 'PurchasesController@list');
        Route::get('/getPurchaseBillsByBranchAndDates/{id}/{from?}/{to?}' , 'PurchasesController@getPurchaseBillsByBranchAndDates');

        Route::get('/edit/{id}', 'PurchasesController@edit');
        Route::post('/update/{id}', 'PurchasesController@update');

        Route::get('/view/{id}', 'PurchasesController@view');
        Route::get('/print/{id}', 'PurchasesController@print');

        Route::get('/get_all_data_by_branch/{id}' , 'PurchasesController@getAllDataByBranch');
        Route::post('/store' , 'PurchasesController@store');

        Route::get('/getStatusTreasuries/{id}' , 'PurchasesController@getStatusTreasuries');
        Route::get('/getStatusPlaces/{id}' , 'PurchasesController@getStatusPlaces');

        // Route::get('/edit/{id}' , 'ProductCategoryController@edit');
        // Route::post('/update/{id}' , 'ProductCategoryController@update');
        // Route::get('/destroy/{id}' , 'ProductCategoryController@destroy');
    });

    // pos
    Route::group(['prefix' => 'sales'] , function (){

        Route::get('/', 'SalesController@index');
        Route::get('/list', 'SalesController@list');
        Route::get('/get_all_data_by_branch/{id}' , 'SalesController@getAllDataByBranch');
        Route::get('/getSalesBills/{id}/{from?}/{to?}' , 'SalesController@getSalesBills');

        Route::get('/view/{id}', 'SalesController@view');
        Route::get('/print/{id}', 'SalesController@print');
        Route::get('/print_receipt/{id}', 'SalesController@print_receipt');
        Route::get('/print_receipt_no_dis/{id}', 'SalesController@print_receipt_no_dis');

        Route::post('/store' , 'SalesController@store');

        Route::get('/getStatusTreasuries/{id}' , 'SalesController@getStatusTreasuries');
        Route::get('/getStatusPlaces/{id}' , 'SalesController@getStatusPlaces');
    });


    // add-sale-return
    Route::group(['prefix' => 'add-sale-return'] , function (){

        Route::get('/idbill/{id}', 'SalesReturnHeadController@index');
        Route::get('/get_all_data_by_branch/{id}' , 'SalesReturnHeadController@getAllDataByBranch');
        Route::get('/get_all_data_by_num_bill/{branch}/{bill}' , 'SalesReturnHeadController@getAllDataByNumBill');
        Route::post('/store/{id}' , 'SalesReturnHeadController@store');


        Route::get('/list', 'SalesReturnHeadController@list');
        Route::get('/getPurchaseBillsByBranchAndDates/{id}/{from?}/{to?}' , 'SalesReturnHeadController@getPurchaseBillsByBranchAndDates');

        Route::get('/view/{id}', 'SalesReturnHeadController@view');
        Route::get('/print/{id}', 'SalesReturnHeadController@print');



        Route::get('/getStatusTreasuries/{id}' , 'SalesReturnHeadController@getStatusTreasuries');
        Route::get('/getStatusPlaces/{id}' , 'SalesReturnHeadController@getStatusPlaces');
    });




    // add-purchase-return
    Route::group(['prefix' => 'add-purchase-return'] , function (){
        Route::get('/idbill/{id}', 'PurchasesReturnHeadController@index');
        Route::get('/get_all_data_by_branch/{id}' , 'PurchasesReturnHeadController@getAllDataByBranch');
        Route::get('/get_all_data_by_num_bill/{branch}/{bill}' , 'PurchasesReturnHeadController@getAllDataByNumBill');
        Route::post('/store/{id}' , 'PurchasesReturnHeadController@store');


        Route::get('/list', 'PurchasesReturnHeadController@list');
        Route::get('/getPurchaseBillsByBranchAndDates/{id}/{from?}/{to?}' , 'PurchasesReturnHeadController@getPurchaseBillsByBranchAndDates');

        Route::get('/view/{id}', 'PurchasesReturnHeadController@view');
        Route::get('/print/{id}', 'PurchasesReturnHeadController@print');



        Route::get('/getStatusTreasuries/{id}' , 'PurchasesReturnHeadController@getStatusTreasuries');
        Route::get('/getStatusPlaces/{id}' , 'PurchasesReturnHeadController@getStatusPlaces');
    });

    // financial-treasury Routes
    Route::group(['prefix' => 'financial-treasury'] , function (){
        Route::get('datatable_table' , 'FinancialTreasuryController@datatable');
        Route::get('/' , 'FinancialTreasuryController@index');
        Route::post('/' , 'FinancialTreasuryController@store');
        Route::get('/edit/{id}' , 'FinancialTreasuryController@edit');
        Route::post('/update/{id}' , 'FinancialTreasuryController@update');
        //Route::get('/destroy/{id}' , 'FinancialTreasuryController@destroy');

    });

    // stores
    Route::group(['prefix' => 'stores'] , function (){
        Route::get('datatable_table' , 'StoreController@datatable');
        Route::get('/' , 'StoreController@index');
        Route::post('/' , 'StoreController@store');
        Route::get('/edit/{id}' , 'StoreController@edit');
        Route::post('/update/{id}' , 'StoreController@update');
        //Route::get('/destroy/{id}' , 'StoreController@destroy');

    });

    // expenses
    Route::group(['prefix' => 'expenses'] , function (){
        Route::get('/getExpensesByBranchAndDates/{id}/{from?}/{to?}' , 'ExpensesController@getExpensesByBranchAndDates');
        Route::get('/' , 'ExpensesController@index');
        Route::post('/' , 'ExpensesController@store');

        Route::get('/get_treasury_by_branch/{id}' , 'ExpensesController@getTreasuryByBranch');

        Route::get('/edit/{id}' , 'ExpensesController@edit');
        Route::post('/update/{id}' , 'ExpensesController@update');
        Route::get('/destroy/{id}' , 'ExpensesController@destroy');
    });


    // treasury-bills Routes
    Route::group(['prefix' => 'treasury-bills'] , function (){
        Route::get('/getTreasuryBillsByBranchAndDates/{id}/{type}/{from?}/{to?}' , 'TreasuriesBillsController@getTreasuryBillsByBranchAndDates');
        Route::get('/' , 'TreasuriesBillsController@index');
        Route::get('/create' , 'TreasuriesBillsController@create');
        Route::get('/getAllDataByBranch/{id}' , 'TreasuriesBillsController@getAllDataByBranch');
        Route::get('/getStatusTreasuries/{id}' , 'TreasuriesBillsController@getStatusTreasuries');
        Route::get('/getStatusPlaces/{id}' , 'TreasuriesBillsController@getStatusPlaces');
        Route::post('/store' , 'TreasuriesBillsController@store');
        Route::get('/edit/{id}' , 'TreasuriesBillsController@edit');
        Route::post('/update/{id}' , 'TreasuriesBillsController@update');
        //Route::get('/destroy/{id}' , 'FinancialTreasuryController@destroy');
    });



     //

    //  notebook_shortcomings Routes
     Route::group(['prefix' => 'notebook_shortcomings'] , function (){
        Route::get('/getProductsByBranch/{id}' , 'NotebookShortcomings@getProductsByBranch');
        Route::get('/' , 'NotebookShortcomings@index');

        Route::post('/import' , 'NotebookShortcomings@import');

        Route::post('/' , 'NotebookShortcomings@store');
        Route::post('store_client_from_pos_page' , 'NotebookShortcomings@storeClientFromPosPage');
        Route::get('/edit/{id}' , 'NotebookShortcomings@edit');
        Route::post('/update/{id}' , 'NotebookShortcomings@update');
        Route::get('/destroy/{id}' , 'NotebookShortcomings@destroy');
    });

    // roles_permissions Routes
    Route::group(['prefix' => 'roles_permissions'] , function (){
        Route::get('/' , 'RolesPermissionsController@index');
        Route::get('create' , 'RolesPermissionsController@create');
        Route::post('/store' , 'RolesPermissionsController@store');
        Route::get('/edit/{id}' , 'RolesPermissionsController@edit');
        Route::post('/update/{id}' , 'RolesPermissionsController@update');
        Route::get('/destroy/{id}' , 'RolesPermissionsController@destroy');

        Route::get('datatable_roles_permissions' , 'RolesPermissionsController@datatable_roles_permissions');
    });

    // settings Routes
    Route::group(['prefix' => 'settings'] , function (){
        Route::get('/' , 'SettingController@index');
        Route::get('/show/{id}' , 'SettingController@show');
        Route::get('/edit/{id}' , 'SettingController@edit');
        Route::post('/update/{id}' , 'SettingController@update');
        
        Route::get('datatable_settings' , 'SettingController@datatableSettings');
    });


    Route::group(['prefix' => 'reports'] , function (){
        // itemAll المخزن العام
        Route::get('itemAll' , 'ReportController@gItemAll');
        Route::get('itemAll/stores/{id}' , 'ReportController@gItemAllStores');
        Route::get('itemAll/get/{store}' , 'ReportController@pItemAll');

        //itemDet حركه صنف
        Route::get('itemDet' , 'ReportController@gItemDet');
        Route::get('itemDet/getStore/{branch}' , 'ReportController@gItemDetStores');
        Route::get('itemDet/getProduct/{store}' , 'ReportController@gItemDetProduct');
        Route::post('itemDet/post' , 'ReportController@pItemDet');

        //supplierDet
        Route::get('supplierDet' , 'ReportController@supplierDet');
        Route::get('supplierDet/getSuppliers/{branch}' , 'ReportController@getSuppliers');
        Route::post('supplierDet/view' , 'ReportController@supplierDetView');

        //clientDet
        Route::get('clientDet' , 'ReportController@clientDet');
        Route::get('clientDet/getClients/{branch}' , 'ReportController@getClients');
        //Route::post('clientDet/view' , 'ReportController@clientDetView');


        //treasuryDet
        Route::get('treasuryDet' , 'ReportController@treasuryDet');
        Route::get('treasuryDet/getTreasuries/{branch}' , 'ReportController@getTreasuriesBranch');
        Route::post('treasuryDet/view' , 'ReportController@treasuryDetView');

    });
});

