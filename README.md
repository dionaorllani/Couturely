Couturely - Online Shopping Platform

Couturely is an online shopping platform designed to provide users with a seamless shopping experience. This document serves as a user's manual for the project.


1. Introduction

Couturely stands as a pinnacle of innovation in the realm of online shopping. Crafted with PHP and MySQL, it empowers users to explore, discover, and acquire fashion products effortlessly. Our platform boasts a plethora of features, including user registration, intuitive product browsing, a dynamic shopping cart, wishlist functionality, streamlined order placement, user profile customization, and a dedicated contact form for unparalleled customer support.


2. Prerequisites

Before you begin, ensure you have the following installed:

Web server (e.g., Apache, Nginx)

PHP (minimum version 7.0)

MySQL database

Web browser


3. Getting Started

Embark on your Couturely journey by following these simple steps:

**Clone the project repository to your local machine:**

git clone https://github.com/dionaorllani/Couturely

**Set up the database:**

Create a MySQL database.
Import the provided SQL file (shop_db.sql) into your database.

**Configure the connection:**

Navigate to the connect.php file within the components folder and update the database credentials:

$host = "localhost";

$db_name = "your_database_name";

$username = "your_username";

$password = "your_password";

**Deploy:**

If you are using XAMPP, transfer the project folder to the htdocs directory within the XAMPP installation folder (typically found in C:\xampp\htdocs on Windows).
Launch your web server and MySQL database using XAMPP.

Access Couturely through your preferred web browser:
http://localhost/Couturely


4. Usage
Unleash the full potential of Couturely through these key actions:

For users:

**Registration and Login:**

Navigate to http://localhost/Couturely/
Click on the user icon placed on the header and then "Login" to access your account or "Register" to create a new one.
Fill in the required details and submit the form.

**Browsing Products:**

Visit the "Shop" page to explore the latest products, some of which can be accessed even in through "Home" page where you can find the categories of products too.
Use the "Quick View" feature by clicking on the eye icon that shows up when the cursor is ontop of the product for a snapshot of product details.

**Adding to Cart:**

On the product details page or through "Shop" page, or "Home" page, click "Add to Cart" to include items in your cart.
Access your cart to adjust quantities and proceed to checkout.

**Wishlist:**

Add desired products to your wishlist by clicking on the heart icon that shows up when the cursor is ontop of the product.
View and manage your wishlist from the dedicated "Wishlist" page.

**Order History:**

Track your purchase history conveniently from the "Orders" page.

**Personalization:**

Customize your user profile and update your password to suit your preferences by clicking the 'Update Profile' button shown when clicking on the user icon shown on the header from where you can also Log Out.

**Seamless Ordering:**

Place orders seamlessly by navigating to the "Check Out" page through the "Cart" page by clicking the 'Proceed To Checkout' button and monitor the status via the "Orders" page.

**Engagement:**

Reach out to us with any inquiries or feedback through the "Contact Us" page for prompt assistance.


For admins:

**Registration and Login:**

Navigate to http://localhost/Couturely/
Click on the user icon placed on the header and then "Admin Login" to access your admin account.
Fill in the required details and submit the form.

**Dashboard Overview:**

After logging in, you'll be directed to the admin dashboard providing key insights into user activity, product performance, order trends, and overall site performance.

**Managing User Accounts:**

Access the "Users Accounts" page through the dashboard by clicking the 'See Users' button or by clicking 'Users' section on the header to view user accounts and manage them as needed, including registration approval, account suspension, and deletion.

**Updating Products:**

Visit the "Update Product" page through the dashboard by clicking the 'See Products' button, or by clicking 'Products' section on the header to modify product details such as name, price, details, and images; add new products, or delete products as necessary.

**Managing Placed Orders:**

Access the "Orders" page through the dashboard by clicking the 'See Orders' button or by clicking 'Orders' section on the header to view orders placed by users, update payment status, and delete orders if needed.

**Managing Messages:**

Visit the "Messages" page through the dashboard by clicking the 'See Messages' button or by clicking 'Messages' section on the header to view messages sent by users and delete them as necessary for efficient communication management.


5. Features

Couturely sets the benchmark with its unparalleled features:

Robust user authentication and authorization mechanisms.

Intuitive product browsing with detailed insights.

Effortless management of shopping carts and wishlists.

Seamless user profile customization.

Streamlined order placement and comprehensive order history tracking.

Dedicated "Contact Us" form for swift customer assistance.

Comprehensive admin dashboard providing key insights for informed decision-making and site optimization.

Robust admin tools for managing user accounts, product details, inventory, orders, and user messages efficiently.

Seamless order processing and management, from verification to fulfillment and shipping.


6. Presentation

To gain a deeper understanding of Couturely and its features, we have prepared two presentation videos. These videos provides an overview of the project, its functionalities, and how users can benefit from it. 

[Watch the presentation video](https://youtu.be/9_FH2BA_LP4)

[Watch the presentation video](https://youtu.be/RTJMSbuQj5w)

Feel free to watch the video to get a visual walkthrough of Couturely!


7. Contact

For any inquiries or assistance, don't hesitate to reach out to our dedicated project maintainers:

Diona Orllani - diona.orllani@gmail.com

Eda Azizi - azizieda5@gmail.com

Indulge in the world of Couturely, where every click brings you closer to style and sophistication!