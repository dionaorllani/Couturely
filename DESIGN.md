Project Design Document


1. Overview

The project is an online shopping platform offering users product browsing, searching, and purchasing functionalities. It includes user management features like registration, login, and profile management, as well as a shopping cart, wishlist, messages and order history.


2. Architecture

The architecture follows a three-tier model: Presentation, Application, and Data.

2.1. File Structure

Organized into key directories:

- **components:** Contains reusable PHP components (headers, footers, CRUDs, etc.).
- **css:** Stores project CSS styles.
- **js:** Includes client-side JavaScript files.
- **uploaded_img:** Repository for uploaded images of the products.
- **admin:** Manages admin-related functionalities.
- **images:** Repository for images of the sliders and banners.
- **icons:** Repository for images of each products' category. 

2.2. Technologies Used

- **PHP:** Server-side scripting and backend logic.
- **HTML/CSS:** Frontend structure and styling.
- **JavaScript:** Client-side interactions.
- **MySQL:** Database for storing product, user, and order data.
- **PDO (PHP Data Objects):** Database connectivity.


3. Database Design

Tables include:

- **users:** User information (name, email, hashed passwords).
- **admins:** Admin information (id, name, password).
- **products:** Product details (name, price, images).
- **orders:** Order details (user ID, products, total price, order status).
- **wishlist:** User wishlist items.
- **shopping_cart:** User shopping cart items.
- **messages:** User messages (message ID, user ID, username, email, phone number, message).


4. User Authentication

User authentication uses PHP sessions, ensuring secure login and registration. Passwords are securely hashed with the SHA-1 algorithm.


5. Frontend

Designed with a laptop-first approach using HTML, CSS, and JavaScript.

5.1. Responsive Design

Responsive design with CSS media queries ensures optimal user experience on various screen sizes.


6. Backend

PHP handles server-side scripting, managing user requests, interacting with the database, and serving dynamic content to the frontend.


7. Security Measures

Enhanced security includes:

- **Password Hashing:** Secure SHA-1 algorithm.
- **Input Validation:** Securing accurate authentication.
- **Secure Sessions:** Safeguards PHP sessions for user authentication.


8. Deployment

The project is intended to be deployed on a local development environment, such as the "htdocs" directory, utilizing a MySQL database for data storage. While the project may not be deployed to a live web server in its current state, the deployment process involves configuring your local environment for seamless testing and development.


9. Challenges and Solutions

Challenges addressed include:

- **Security Concerns:** Input validation and secure password hashing.
- **Responsive Design:** Mitigated through CSS media queries for consistent layouts.
- **Database Management:** Managing database transactions efficiently.
- **Authentication and Authorization:** Implementing secure authentication and authorization methods and hashing passwords.
- **User Operations:** Managing complex user operations, such as updating user profiles and ensuring a seamless user experience during these processes.


10. Future Improvements

Potential future enhancements:

- **Payment Integration:** Integrate payment gateways for seamless transactions.
- **Deployment:** Deploy the project to a production environment.
- **Optimization:** Further optimize to improve load times and responsiveness.
- **Accessibility:** Ensure accessibility for users with disabilities.