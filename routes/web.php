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

Route::get('/', function () {
    return Redirect()->route('login');
});

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');


//Employee Route..........
Route::get('add-employee','EmployeeController@AddEmployee')->name('add.employee');
Route::post('/insert-employee','EmployeeController@InsertEmployee');
Route::get('all-employee','EmployeeController@AllEmployee')->name('all.employee');
Route::get('view-employee/{id}','EmployeeController@ViewEmployee');
Route::get('delete-employee/{id}','EmployeeController@DeleteEmployee');
Route::get('edit-employee/{id}','EmployeeController@EditEmployee');
Route::post('update-employee/{id}','EmployeeController@UpdateEmployee');

//Customer Route.........
Route::get('add-customer', 'CustomerController@AddCustomer')->name('add.customer');
Route::post('/insert-customer','CustomerController@InsertCustomer');
Route::get('all-customer','CustomerController@AllCustomer')->name('all.customer');
Route::get('view-customer/{id}','CustomerController@ViewCustomer');
Route::get('delete-customer/{id}','CustomerController@DeleteCustomer');
Route::get('edit-customer/{id}','CustomerController@EditCustomer');
Route::post('update-customer/{id}','CustomerController@UpdateCustomer');

//Supplier Route.......
Route::get('add-supplier','SupplierController@AddSupplier')->name('add.supplier');
Route::post('/insert-supplier','SupplierController@InsertSupplier');
Route::get('all-supplier','SupplierController@AllSupplier')->name('all.supplier');
Route::get('view-supplier/{id}','SupplierController@ViewSupplier');
Route::get('edit-supplier/{id}','SupplierController@EditSupplier');
Route::post('update-supplier/{id}','SupplierController@UpdateSupplier');
Route::get('delete-supplier/{id}','SupplierController@DeleteSupplier');

//Salary Route........
Route::get('add-advanced-salary','SalaryController@AddAdvancedSalary')->name('addadvncd.salary');
Route::post('/insert-advanced-salary','SalaryController@InsertAdvancedSalary');
Route::get('all-advanced-salary','SalaryController@AllAdvancedSalary')->name('alladvncd.salary');
Route::get('pay-salary','SalaryController@PaySalary')->name('pay.salary');
Route::get('view-advanced-salary/{id}','SalaryController@ViewAdvancedSalary');
Route::get('edit-advanced-salary/{id}','SalaryController@EditAdvancedSalary');
Route::post('update-advanced-salary/{id}','SalaryController@UpdateAdvancedSalary');
Route::get('delete-advanced-salary/{id}','SalaryController@DeleteAdvancedSalary');

//Category Route.......
Route::get('add-category','CategoryController@AddCategory')->name('add.category');
Route::post('insert-category','CategoryController@InsertCategory');
Route::get('all-category','CategoryController@AllCategory')->name('all.category');
Route::get('delete-category/{id}','CategoryController@DeleteCategory');
Route::get('edit-category/{id}','CategoryController@EditCategory');
Route::post('/update-category/{id}','CategoryController@UpdateCategory');

//Products Route.....
Route::get('add-products','ProductController@AddProduct')->name('add.product');
Route::post('insert-product','ProductController@InsertProduct');
Route::get('all-product','ProductController@AllProduct')->name('all.product');
Route::get('view-product/{id}','ProductController@ViewProduct');
Route::get('delete-product/{id}','ProductController@DeleteProduct');

//Expense Route......
Route::get('add-expense','ExpenseController@AddExpense')->name('add.expense');
Route::post('insert-expense','ExpenseController@InsertExpense');

Route::get('today-expense','ExpenseController@TodayExpense')->name('today.expense');
Route::get('edit-today-expense/{id}','ExpenseController@EditTodayExpense');
Route::post('update-today-expense/{id}','ExpenseController@UpdateTodayExpense');
Route::get('delete-today-expense/{id}','ExpenseController@DeleteTodayExpense');

Route::get('monthly-expense','ExpenseController@MonthlyExpense')->name('monthly.expense');
Route::get('edit-monthly-expense/{id}','ExpenseController@EditMonthlyExpense');
Route::post('update-monthly-expense/{id}','ExpenseController@UpdateMonthlyExpense');
Route::get('delete-monthly-expense/{id}','ExpenseController@DeleteMonthlyExpense');

Route::get('yearly-expense','ExpenseController@YearlyExpense')->name('yearly.expense');
Route::get('edit-yearly-expense/{id}','ExpenseController@EditYearlyExpense');
Route::post('update-yearly-expense/{id}','ExpenseController@UpdateYearlyExpense');
Route::get('delete-yearly-expense/{id}','ExpenseController@DeleteYearlyExpense');

Route::get('january-expense','ExpenseController@january')->name('january.expense');
Route::get('february-expense','ExpenseController@february')->name('february.expense');
Route::get('march-expense','ExpenseController@march')->name('march.expense');
Route::get('april-expense','ExpenseController@april')->name('april.expense');
Route::get('may-expense','ExpenseController@may')->name('may.expense');
Route::get('june-expense','ExpenseController@june')->name('june.expense');
Route::get('july-expense','ExpenseController@july')->name('july.expense');
Route::get('august-expense','ExpenseController@august')->name('august.expense');
Route::get('september-expense','ExpenseController@september')->name('september.expense');
Route::get('october-expense','ExpenseController@october')->name('october.expense');
Route::get('november-expense','ExpenseController@november')->name('november.expense');
Route::get('december-expense','ExpenseController@december')->name('december.expense');

//Attendence Route......
Route::get('take-attendence','AttendenceController@TakeAttendence')->name('take.attendence');
Route::post('insert-attendence','AttendenceController@InsertAttendence');
Route::get('all-attendence','AttendenceController@AllAttendence')->name('all.attendence');
Route::get('edit-attendence/{date}','AttendenceController@EditAttendence');
Route::post('update-attendence','AttendenceController@UpdateAttendence');
Route::get('view-attendence/{date}','AttendenceController@ViewAttendence');
Route::get('delete-attendence/{date}','AttendenceController@DeleteAttendence');

//Setting Route......
Route::get('website-setting','SettingController@WebsiteSetting')->name('website.setting');
Route::post('update-webstite/{id}','SettingController@UpdateWebstite');

//Excel Import | Export......
Route::get('import-product','ProductController@ImportProduct')->name('import.product');
Route::get('export','ProductController@export')->name('export');
Route::get('import','ProductController@import')->name('import');

//Pos Route......
Route::get('pos','PosController@index')->name('pos');
Route::get('pending-orders','PosController@PendingOrders')->name('pending.orders');
Route::get('view-order-status/{id}','PosController@ViewOrder');
Route::get('order-done/{id}','PosController@OrderDone');
Route::get('success-order','PosController@SuccessOrder')->name('success.orders');

//Cart Route.....
Route::post('add-cart','CartController@AddCart');
Route::post('update-cart/{rowId}','CartController@UpdateCart');
Route::get('delete-cart/{rowId}','CartController@DeleteCart');
Route::post('invoice-cart','CartController@InvoiceCart');
Route::post('final-invoice','CartController@FinalInvoice');
