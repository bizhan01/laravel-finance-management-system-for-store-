<?php

Auth::routes();
Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');


// CRUD Users Routes
Route::get('/delete/{id}','UserOperationController@destroy');
Route::get('/addUser','UserOperationController@index');
// Route::get('/edit-records','UserUpdateController@index');
// Route::get('/editUser/{id}','UserUpdateController@show');
Route::post('/editUser/{id}','UserUpdateController@edit');
Route::get('profile', 'UserProfileController@profile')->name('profile');
Route::post('updateNameUser', 'UserProfileController@updateNameUser')->name('updateNameUser');
Route::post('updateUserImage', 'UserProfileController@updateUserImage')->name('updateUserImage');
Route::post('updateUserPass', 'UserProfileController@updateUserPass')->name('updateUserPass');


// Finance Reports
Route::resource('/balance', 'BalanceController');
Route::get('blancess/{from?}/{to?}', 'BalanceController@blancess')->name('blancess');


// Product category Routes
Route::get('/category', 'CategoryController@index')->name('category');
Route::post('/addCategory', 'CategoryController@store')->name('addCategory');
Route::get('/deleteCategory/{id}','CategoryController@destroy')->name('deleteCategory/{id}');
Route::get('/editCategory/{id}','CategoryController@show')->name('editCategory/{id}');
Route::post('/editCategory/{id}','CategoryController@edit')->name('editCategory/{id}');

// Product section routes
Route::get('/product', 'ProductController@index')->name('product');
Route::post('/saveProduct', 'ProductController@store')->name('saveProduct');
Route::get('/deleteProduct/{id}','ProductController@destroy')->name('deleteProduct/{id}');
Route::get('/product/{id}','ProductController@info')->name('product/{id}');
Route::get('/editProduct/{id}','ProductController@show')->name('editProduct/{id}');
Route::post('/editProduct/{id}','ProductController@edit')->name('editProduct/{id}');
Route::get('/inventory', 'ProductController@inventory')->name('inventory');
Route::get('/assets', 'ProductController@assets')->name('assets');

// customer section routes
Route::get('/customer', 'CustomerController@index')->name('customer');
Route::post('/addCustomer', 'CustomerController@store')->name('addCustomer');
Route::get('/deleteCustomer/{id}','CustomerController@destroy')->name('deleteCustomer/{id}');
Route::get('/editCustomer/{id}','CustomerController@show')->name('editCustomer/{id}');
Route::post('/editCustomer/{id}','CustomerController@edit')->name('editCustomer/{id}');
Route::get('customerDetails/{id}', 'CustomerController@customerDetails')->name('customerDetails');



// Sales section Routes
Route::get('/sales', 'SellController@index')->name('sales');
Route::post('/newSell', 'SellController@store')->name('newSell');
Route::get('/salesList', 'SellController@salesList')->name('salesList');
Route::get('/salesDetails', 'salesItemController@index')->name('salesDetails');
Route::post('/saveSell', 'salesItemController@store')->name('saveSell');
Route::get('/editItems/sellItemShow/{id}','salesItemController@show')->name('sellItemShow{id}');
Route::post('/editItems/sellItemUpdate/{id}','salesItemController@edit')->name('edit/sellItemUpdate{id}');
Route::get('/editItems/deleteSellItem/{id}','salesItemController@destroy')->name('editItems/deleteSellItem/{id}');
Route::get('/editItems/deleteSell/{id}','SellController@destroy')->name('deleteSell/{id}');
Route::get('/edit/deleteSell/{id}','SellController@destroy')->name('deleteSell/{id}');
Route::get('/edit/deleteSell/{id}','SellController@destroy')->name('deleteSell/{id}');
Route::get('/deleteSell/{id}','SellController@destroy')->name('deleteSell/{id}');
Route::get('/editItems/{id}','SellOperationController@show')->name('editItems/{id}');
Route::post('/updateItems/{id}','SellOperationController@edit')->name('updateItems/{id}');
Route::get('/edit/printMyInvioce/{id}','SellOperationController@printInvioce')->name('/edit/printMyInvioce/{id}');
Route::get('/printMyInvioce/{id}','SellOperationController@printInvioce')->name('/printMyInvioce/{id}');
Route::get('customerDetails/printMyInvioce/{id}','SellOperationController@printInvioce')->name('/printMyInvioce/{id}');
Route::get('/debtors', 'SellController@debtor')->name('debtors');


// Pensions section Routes
Route::get('/pensions', 'PensionController@index')->name('pensions');
Route::post('/addPension', 'PensionController@store')->name('addPension');
Route::get('/pensionList', 'PensionController@pensionList')->name('pensionList');
Route::get('/pensionDetails', 'PensionItemsController@index')->name('pensionDetails');
Route::post('/savePension', 'PensionItemsController@store')->name('savePension');
Route::get('/edit/pensionItem/{id}','PensionItemsController@show')->name('editPension{id}');
Route::post('/edit/pensionItem/{id}','PensionItemsController@edit')->name('edit/pensionItem{id}');
Route::get('/edit/deletePensionItem/{id}','PensionItemsController@destroy')->name('edit/deletePensionItem/{id}');
Route::get('/deletePension/{id}','PensionController@destroy')->name('deletePension/{id}');
Route::get('/edit/deletePension/{id}','PensionController@destroy')->name('deletePension/{id}');
Route::get('/edit/{id}','PensionOperationController@show')->name('edit/{id}');
Route::post('/edit/{id}','PensionOperationController@edit')->name('edit/{id}');
Route::get('/edit/printInvioce/{id}','PensionOperationController@printInvioce')->name('/edit/printInvioce/{id}');
Route::get('/printInvioce/{id}','PensionOperationController@printInvioce')->name('/printInvioce/{id}');
Route::get('customerDetails/printInvioce/{id}','PensionOperationController@printInvioce')->name('/printInvioce/{id}');



// Deposit section routes
Route::get('/deposit', 'DepositController@index')->name('deposit');
Route::post('/addDeposit', 'DepositController@store')->name('addDeposit');
Route::get('/deleteDeposit/{id}','DepositController@destroy')->name('deleteDeposit/{id}');
Route::get('/editDeposit/{id}','DepositController@show')->name('editDeposit/{id}');
Route::post('/editDeposit/{id}','DepositController@edit')->name('editDeposit/{id}');
Route::get('/printDeposit/{id}','DepositController@printDeposit')->name('printDeposit/{id}');
Route::get('deposits/{from?}/{to?}', 'DepositController@deposits')->name('deposits');


// Pension section routes
Route::get('/pension', 'PensionController@index')->name('pension');
Route::post('/addPension', 'PensionController@store')->name('addPension');
Route::get('/deletePension/{id}','PensionController@destroy')->name('deletePension/{id}');
Route::get('/editPension/{id}','PensionController@show')->name('editPension/{id}');
Route::post('/editPension/{id}','PensionController@edit')->name('editPension/{id}');
Route::get('/printPension/{id}','PensionController@printPension')->name('printPension/{id}');
Route::get('pensions/{from?}/{to?}', 'PensionController@pensions')->name('pensions');


// Debite section routes
Route::get('/debite', 'DebiteController@index')->name('debite');
Route::post('/addDebite', 'DebiteController@store')->name('addDebite');
Route::get('/deleteDebite/{id}','DebiteController@destroy')->name('deleteDebite/{id}');
Route::get('/editDebite/{id}','DebiteController@show')->name('editDebite/{id}');
Route::post('/editDebite/{id}','DebiteController@edit')->name('editDebite/{id}');
Route::get('/printDebite/{id}','DebiteController@printDebite')->name('printDebite/{id}');



// Supplier section routes
Route::get('/supplier', 'SupplierController@index')->name('supplier');
Route::post('/addSupplier', 'SupplierController@store')->name('addSupplier');
Route::get('/deleteSupplier/{id}','SupplierController@destroy')->name('deleteSupplier/{id}');
Route::get('/editSupplier/{id}','SupplierController@show')->name('editSupplier/{id}');
Route::post('/editSupplier/{id}','SupplierController@edit')->name('editSupplier/{id}');
Route::get('supplierDetails/{id}', 'SupplierController@supplierDetails')->name('supplierDetails');


// Purchase section routes
Route::get('/purchase', 'PurchaseController@index')->name('purchase');
Route::post('/savePurchase', 'PurchaseController@store')->name('savePurchase');
Route::get('/deletePurchase/{id}','PurchaseController@destroy')->name('deletePurchase/{id}');
Route::get('/editPurchase/{id}','PurchaseController@show')->name('editPurchase/{id}');
Route::post('/editPurchase/{id}','PurchaseController@edit')->name('editPurchase/{id}');
Route::get('/creditor', 'PurchaseController@creditor')->name('creditor');

// Salary section Routes
Route::get('/salary', 'SalaryController@index')->name('salary');
Route::post('/addSalary', 'SalaryController@store')->name('addSalary');
Route::get('/deleteSalary/{id}','SalaryController@destroy')->name('deleteSalary/{id}');
Route::get('/editSalary/{id}','SalaryController@show')->name('editSalary/{id}');
Route::post('/editSalary/{id}','SalaryController@edit')->name('editSalary/{id}');
Route::get('/printSalary/{id}','SalaryController@printSalary')->name('printSalary/{id}');
Route::get('salaries/{from?}/{to?}', 'SalaryController@salaries')->name('salaries');


// Expense section Routes
Route::get('/expense', 'ExpenseController@index')->name('expense');
Route::post('/addExpense', 'ExpenseController@store')->name('addExpense');
Route::get('/deleteExpense/{id}','ExpenseController@destroy')->name('deleteExpense/{id}');
Route::get('/editExpense/{id}','ExpenseController@show')->name('editExpense/{id}');
Route::post('/editExpense/{id}','ExpenseController@edit')->name('editExpense/{id}');
Route::get('/printExpense/{id}','ExpenseController@printExpense')->name('printExpense/{id}');
Route::get('expenses/{from?}/{to?}', 'ExpenseController@expenses')->name('expenses');



// Quotation section Routes
Route::get('/quotation', 'QuotationController@index')->name('quotation');
Route::post('/newQuotation', 'QuotationController@store')->name('newQuotation');
Route::get('/qtnDetails', 'QuotationItemsController@index')->name('qtnDetails');
Route::post('/saveQtn', 'QuotationItemsController@store')->name('saveQtn');
Route::get('/printQtn/{id}', 'QuotationController@printQtn')->name('printQtn/{id}');



// Employee
Route::get('addEmployee', 'EmployeeController@addEmployee')->name('addEmployee');
Route::post('saveEmployee', 'EmployeeController@saveEmployee')->name('saveEmployee');
Route::get('employeeList', 'EmployeeController@employeeList')->name('employeeList');
Route::get('unemployedList', 'EmployeeController@unemployedList')->name('unemployedList');
Route::get('employeeDetails/{id}', 'EmployeeController@employeeDetails')->name('employeeDetails');
Route::get('editEmployee/{id}', 'EmployeeController@editEmployee')->name('editEmployee');
Route::post('updateEmployee', 'EmployeeController@updateEmployee')->name('updateEmployee');
Route::get('/deleteEmployee/{id}','EmployeeController@destroy')->name('deleteEmployee/{id}');
