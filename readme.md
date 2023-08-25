# Assigments for Junior Php Developer position at NBSoft

## Project Setup

To get started with the project, follow these steps:

1. **Clone the Repository**:
   - Git clone the repository from the provided link: [https://github.com/LazarevicV/nbsoft.git](https://github.com/LazarevicV/nbsoft.git)
   - Alternatively, you can also download the project as a ZIP file from Google Drive:
   - [https://drive.google.
     com/drive/folders/1fuqYoG-ZjfQg9RRJAHfxx3AXmJenB2T1?usp=sharing](https://drive.google.com/drive/folders/1fuqYoG-ZjfQg9RRJAHfxx3AXmJenB2T1?usp=sharing)
   - and extract it to your preferred location.

2. **Project Location**:
   - Once you download (and extract if you download from Drive)<br>Make sure the project is moved to your local 
     `htdocs` 
     folder.
   - If you want to put this project into a subfolder make sure to change 
   - `"config.php"` file which is located in <br> `/4.zadatak/connection/config.php` <br>
   and also the file in <br>
   `/5.zadatak/connection/config.php`

3. **Connect to database**
    - Make two new databases in phpmyadmin
    - First should be called: `nbsoft_2zadatak`
    - Second should be called: `nbsoft-4zadatak`
    - import each sql file into correct database

### Open project

- In order to access each assigment in this project, make sure that your apache and mySQL servers are running.
- If they are, you can access assignments by typing their path as an url in your browser
- For an example, if the project is in subfolder in htdocs directory you can use this url
- `http/localhost/subfolder/nbsoft/`
- and you should see list of directories 

### 1. assigment 

1. **Project structure**
    - `css`
    - `images` <br>
   index.html

2. **Description**
    - You can access this page by entering<br>`/prvi_zadatak/`<br> after your project path in url.
    - Page is identical replica of my CV. That is done by using bootstrap grid system.

### 2. assigment 

1. **Project structure**
    - `jss`<br>
        - main.js<br>
        - validation.js<br>
      
   - index.html<br>
   - insertIntoDB.php

2. **Description**
    - You can access this page by entering<br>`/drugi_zadatak/`<br> after your project path in url.
    - After that, form should be displayed
    - Validation is done in `validation.js`<br>
   and logic for sending the data with ajax is done in `main.js`.
    - `insertIntoDB.php` is in charge of receiving data and saving it into database.
    - After you pass the validations and send the data, the form disappears, it's replaces by the data that is 
      sent, and the message for success.

### 3. assigment

1. **Project structure**
   - `css`<br>
   - `images`<br>
   - `js`
   - `slick`<br>
   index.html

2. **Description**
    - You can access this page by entering<br>`/treci_zadatak/`<br> after your project path in url.
    - After that, you should be able to see simple slider made with external slick library.

### 4. assigment

1. **Project structure**
   - `app`
     - Response.php
   - `classes`
     - Order.php
     - OrderItem.php
     - Product.php
     - User.php
   - `connection`
     - config.php
     - connection.php
   - `controllers`
     - ApiController.php
     - Controller.php
     - RedirectController.php
     - UserController.php
     - ViewController.php
   - `view`
     - components
       - nav.php
     - _404.php
     - home.php
     - login.php
     - register.php<br>
   
   - index.html

1.1 **project structure description**
- `app` -> everything related to the application goes here. There is currently Response.php which is 
  responsible for handling json api's
- `classes` -> directory for storing models
- `connection` -> directory where goes files related to database, here is also config.php which I used for declaring 
  global variables called `config.php`

2. **Description**
    - You can access this page by entering<br>`/cetvrti_zadatak/`<br> after your project path in url.
    - After that, you should be able to see a homepage for this assigment. There, you have all links that you can 
      currently access
    - You can log in with either regular user account or admins account
    - **admin account:**
      - **username**: admin
      - **password**: admin
    - **standard account:**
      - you can either make one using admin account and going to the register page, or you can use this info
      - **username**: user
      - **password**: user

2.1 **More description**
- Routes and who can access them
    - `/` -> everyone
    - `/login` -> only if there is no logged users
    - `/logout` -> only logged-in users
    - `/register` `/api/orders` `/api/users` -> only accessible by users with role **`admin`**
    - if you try to go to other routes that are not listed here you will be redirected to the `/page-not-found` route.

### 5. assigment
1. **Project structure**
    - `app`
    - `components`
    - `connection`
    - atleastThreeProducts.php
    - atleastTwoOrderItems.php
    - countOfOrderItems.php
    - index.php
    - moreThenTwoOrders.php
    - totalValueOrders.php
    - users.php

2. **Description**
    - You can access this page by entering<br>`/peti_zadatak/`<br> after your project path in url.
    - The home page is similar to last assigment. You have listed routes that you can visit.
    - Each route shows different data as requested in assigment. 
    - Data is connected with last assigment and they have same database.