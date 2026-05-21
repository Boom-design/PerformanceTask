# Product Inventory Management System 📦

A comprehensive **Product Inventory Management System** built with **Laravel Framework**. This system helps small store owners manage and organize product records efficiently through complete CRUD operations.

---

## ✅ Project Requirements Met

| Requirement | Status | Details |
|---|---|---|
| **Database** | ✅ Complete | SQLite database with proper schema |
| **Migration** | ✅ Complete | 2026_05_21_025003_create_products_table.php |
| **Model** | ✅ Complete | App\Models\Product with fillable attributes |
| **Controller** | ✅ Complete | ProductController with 7 CRUD methods |
| **Routes** | ✅ Complete | RESTful resource routes configured |
| **Blade Templates** | ✅ Complete | 5 responsive views (index, create, edit, show) |
| **CRUD Operations** | ✅ Complete | Full Create, Read, Update, Delete functionality |
| **Integration** | ✅ Complete | Database, Migration, Model, Controller, Routes work together |

---

## 🛠️ Tech Stack

```
Framework:    Laravel 12.60.2
Language:     PHP 8.2.12
Database:     SQLite
Frontend:     Blade, Tailwind CSS
Version Control: Git & GitHub
```

---

## 📁 Project Structure

```
app/
├── Http/
│   └── Controllers/
│       └── ProductController.php              ⭐ CRUD Controller
└── Models/
    └── Product.php                            ⭐ Product Model

database/
├── migrations/
│   └── 2026_05_21_025003_create_products_table.php
└── seeders/
    └── ProductSeeder.php                      (8 sample products)

resources/views/
├── layouts/
│   └── app.blade.php                          ⭐ Main layout
└── products/
    ├── index.blade.php                        ⭐ Product list
    ├── create.blade.php                       ⭐ Add product
    ├── edit.blade.php                         ⭐ Edit product
    └── show.blade.php                         ⭐ Product details

routes/
└── web.php                                    ⭐ Routes config

.env                                           Configuration file
```

---

## 🗄️ Database Schema - Products Table

```sql
┌─────────────────────────────────────┐
│         PRODUCTS TABLE              │
├─────────────────────────────────────┤
│ id (Primary Key)                    │
│ name (VARCHAR 255, UNIQUE)          │
│ category (VARCHAR 100)              │
│ quantity (INTEGER, Default: 0)      │
│ price (DECIMAL 10,2)                │
│ date_added (DATE)                   │
│ created_at (TIMESTAMP)              │
│ updated_at (TIMESTAMP)              │
└─────────────────────────────────────┘
```

### Field Descriptions

| Field | Type | Purpose |
|---|---|---|
| **id** | BIGINT | Unique product identifier |
| **name** | VARCHAR(255) UNIQUE | Product name - must be unique |
| **category** | VARCHAR(100) | Product classification |
| **quantity** | INTEGER | Available stock count |
| **price** | DECIMAL(10,2) | Unit price (₱) |
| **date_added** | DATE | When product was added |
| **created_at** | TIMESTAMP | Record creation time |
| **updated_at** | TIMESTAMP | Last update time |

---

## 🔧 Product Model (app/Models/Product.php)

```php
class Product extends Model
{
    // Mass assignable attributes
    protected $fillable = [
        'name',
        'category',
        'quantity',
        'price',
        'date_added',
    ];

    // Data casting
    protected $casts = [
        'date_added' => 'date',
        'price' => 'decimal:2',
    ];
}
```

---

## 🎮 Controller Methods (ProductController.php)

| Method | HTTP | Purpose |
|---|---|---|
| **index()** | GET | Display all products |
| **create()** | GET | Show create form |
| **store()** | POST | Save new product |
| **show()** | GET | Display product details |
| **edit()** | GET | Show edit form |
| **update()** | PUT | Update product |
| **destroy()** | DELETE | Delete product |

### Sample Controller Code

```php
// Store new product with validation
public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|unique:products|max:255',
        'category' => 'required|string|max:100',
        'quantity' => 'required|integer|min:0',
        'price' => 'required|numeric|min:0',
        'date_added' => 'nullable|date',
    ]);

    Product::create($validated);
    return redirect()->route('products.index')
                    ->with('success', 'Product created successfully!');
}

// Update product
public function update(Request $request, Product $product)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255|unique:products,name,'.$product->id,
        'category' => 'required|string|max:100',
        'quantity' => 'required|integer|min:0',
        'price' => 'required|numeric|min:0',
        'date_added' => 'nullable|date',
    ]);

    $product->update($validated);
    return redirect()->route('products.index')
                    ->with('success', 'Product updated successfully!');
}

// Delete product
public function destroy(Product $product)
{
    $product->delete();
    return redirect()->route('products.index')
                    ->with('success', 'Product deleted successfully!');
}
```

---

## 🌐 Web Routes (routes/web.php)

```php
use App\Http\Controllers\ProductController;

// Redirect home to products
Route::get('/', function () {
    return redirect()->route('products.index');
});

// RESTful Resource Routes
Route::resource('products', ProductController::class);

// Generated Routes:
GET      /products              → products.index
GET      /products/create       → products.create
POST     /products              → products.store
GET      /products/{id}         → products.show
GET      /products/{id}/edit    → products.edit
PUT      /products/{id}         → products.update
DELETE   /products/{id}         → products.destroy
```

---

## 🎨 Blade Templates

### 1️⃣ **layouts/app.blade.php** (Main Layout)
- Navigation bar with links
- Tailwind CSS styling
- Footer with project info
- Responsive design

### 2️⃣ **products/index.blade.php** (Product List)
- Table with all products
- Add New Product button
- View, Edit, Delete actions
- Pagination (10 per page)
- Success message display

### 3️⃣ **products/create.blade.php** (Add Product)
- Form with all fields
- Input validation feedback
- Error message display
- Cancel button

### 4️⃣ **products/edit.blade.php** (Edit Product)
- Pre-filled product data
- Update functionality
- Validation feedback
- Cancel option

### 5️⃣ **products/show.blade.php** (Product Details)
- Complete product information
- Total inventory value calculation
- Stock status indicators
- Edit and Delete options
- Timestamps display

---

## 🎨 User Interface Design

### Color Scheme
- **Blue (#3B82F6)**: Primary actions, View & Edit buttons
- **Gray (#6B7280)**: Neutral backgrounds, secondary buttons
- **Red (#EF4444)**: Delete buttons, danger actions, warnings

### Features
✅ Responsive design (mobile-friendly)
✅ Tailwind CSS styling
✅ Professional layout
✅ Clear navigation
✅ Form validation feedback
✅ Stock status indicators
✅ Pagination support

---

## 📊 Sample Data (ProductSeeder)

**8 Pre-seeded Products:**

```
1. Wireless Headphones       | Electronics      | 25 units  | ₱2,499.99
2. USB-C Cable              | Electronics      | 150 units | ₱299.99
3. Screen Protector         | Accessories      | 80 units  | ₱199.99
4. Laptop Stand             | Office Supplies  | 45 units  | ₱1,299.99
5. Mechanical Keyboard      | Electronics      | 12 units  | ₱3,999.99
6. Ergonomic Mouse          | Electronics      | 60 units  | ₱1,899.99
7. Monitor Arm Mount        | Office Supplies  | 30 units  | ₱2,299.99
8. USB Hub (4-Port)         | Electronics      | 2 units   | ₱899.99
```

---

## ⚙️ Installation & Setup

### Step 1: Clone Repository
```bash
git clone https://github.com/Boom-design/PerformanceTask.git
cd performancetasknimalolot
```

### Step 2: Install Dependencies
```bash
composer install
```

### Step 3: Setup Environment
```bash
cp .env.example .env
php artisan key:generate
```

### Step 4: Database Setup
```bash
php artisan migrate              # Create database & tables
php artisan db:seed             # Add sample data
```

### Step 5: Start Server
```bash
php artisan serve
```

**Access Application:** `http://127.0.0.1:8000`

---

## ✨ Key Features

### 1. **CRUD Operations**
- ✅ Create new products
- ✅ Read/View product details
- ✅ Update existing products
- ✅ Delete products with confirmation

### 2. **Data Validation**
- Product name (required, unique)
- Category (required)
- Quantity (required, non-negative)
- Price (required, positive)
- Date Added (optional)

### 3. **User Experience**
- Success/error messages
- Form validation feedback
- Confirmation dialogs for deletion
- Pagination for product list
- Responsive design

### 4. **Security**
- CSRF token protection
- SQL injection prevention (Eloquent ORM)
- Mass assignment protection
- Input validation
- Unique constraints

---

## 📈 Additional Features

### Stock Status Indicators
- 🔴 **Red**: Out of stock or low stock (≤5 units)
- ⚫ **Gray**: Normal stock

### Calculations
- **Total Inventory Value** = Unit Price × Quantity

### Timestamps
- Product creation time
- Last update time
- Date product was added to inventory

---

## 🧪 Testing the System

### Add a Product
1. Go to `/products/create`
2. Fill in all fields
3. Click "Add Product"
4. See success message

### View Products
1. Go to `/products`
2. See all products in table
3. Click "View" for details

### Edit a Product
1. From product list, click "Edit"
2. Modify any field
3. Click "Update Product"
4. See success message

### Delete a Product
1. From product list, click "Delete"
2. Confirm deletion
3. Product is removed
4. See success message

---

## 📦 Files to Review

| File | Purpose |
|---|---|
| **app/Models/Product.php** | Database model with validations |
| **app/Http/Controllers/ProductController.php** | CRUD logic |
| **database/migrations/2026_05_21_025003_create_products_table.php** | Database schema |
| **resources/views/products/** | UI templates |
| **routes/web.php** | Application routes |

---

## 🔍 Code Quality Standards

✅ MVC Architecture (Separation of Concerns)
✅ RESTful API Design Principles
✅ Eloquent ORM Usage
✅ Blade Template Best Practices
✅ Form Validation Patterns
✅ Error Handling
✅ PSR-12 Coding Standards
✅ Clear Code Organization

---

## 📝 Submission Checklist

- [x] Database created with proper schema
- [x] Migration file created
- [x] Product Model with fillable attributes
- [x] ProductController with 7 methods
- [x] Routes configured (RESTful)
- [x] 5 Blade templates created
- [x] Full CRUD functionality working
- [x] Input validation implemented
- [x] Error handling in place
- [x] Responsive UI design
- [x] Sample data seeded
- [x] Code pushed to GitHub
- [x] README documentation complete

---

## 🎓 Learning Concepts Demonstrated

✓ Laravel Framework
✓ MVC Architecture
✓ Database Design & Migrations
✓ Eloquent ORM
✓ RESTful Routing
✓ Form Validation
✓ Blade Templating
✓ Responsive Web Design
✓ Git Version Control
✓ Error Handling

---

## 📞 GitHub Repository

**Repository:** https://github.com/Boom-design/PerformanceTask
**Owner:** Boom-design
**Branch:** main

---

## 📄 License

This project is open source and available under the MIT License.

---

## 👤 Author

**Boom-design**
- GitHub Profile: https://github.com/Boom-design
- Email: reachselwyn1556@gmail.com

---

## ✅ Status

**Status:** Complete and Ready for Instructor Review
**Last Updated:** May 21, 2026
**All Requirements:** ✅ SATISFIED
