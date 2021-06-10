#dfsghjh

-	I developed not a complete(since there is not many administrative functions) e-shoppng website.
-	This website have two types of users; customers,admins.
-	I created an admin and this admin can create users with administrative privileges. These users can search, add, update or delete a product. Create the necessary pages for these operations.
-	Customers can register by themselves using the form that ı have provided. Customers can update their information.
-	I provided a registration and login page.
-	I sell at least one type of product on my page and my product have categories. For example, ı am selling cosmetics on my website, this cosmetics  also have categories body lotion, toothpaste, toothbrush etc.
-	Products have title(name), picture, price, description.
-	I implemented a shopping cart mechanism. Customers can search and view products. They can add, view and remove products from the shopping cart.
-	Shopping cart also show the total cost. It also have the options; continue shopping and checkout
-	In the checkout part I display the shipping address and ask for the payment method.
-	I also implement session concept and order control system for admin purposes that list and cancel the orders etc.
List of technologies that you have used:
-	PHP, JavaScript, SQL, HTML, CSS, Bootstrap


Database Diagram

![image](https://drive.google.com/uc?export=view&id=1HoBf0V3jxMFwx8GUeQhKJLiYlhyp_Muc)






How My Program Works
-	header.php: I start, destroy and unset session in this part.Also ı connect my database , ı take my css files and ı include navbar.php in this header file. I include this file at the top of every other file.

-	footer.php: I take ready scripts and ı create my own scripts also ı close the connection in this file. I include this file at the bottom of every other file.


-	navbar.php: This file contains two navbar; one of them for category other one is classic navbar. Also, this file contains some PHP codes which change dropdown menü according to userId set or not.

-	index.php: In this file ı write php codes that takes products from database and print them with their information in the home page. Also when user clicks specific category or search for specific product this code prints related products. 


-	signup.php: In this file ı check user inputs; if they are empty or not, if passwords equal or not, if given e-mail already exist or not. At the and ı insert given inputs in my database and create user.

-	login.php: In this file ı checks, if inputs are not empty and given password, e-mail are exist in database.If exist then ı set session bu using userId.


-	account.php: I take posted inputs from forms then ı update users information by checking e-mail.

-	basket.php: In this file when user click add button in index.php ı get information of products an add them to the basket.If user want to delete product from basket code follows same logic with add and delete product.
When user try to buy nothing or buy something without login code send an alert. Also ı have a modal that takes neccasary information for an order, then ı insert this informations to my database. 

-	admin.php: I have two container; one for radio buttons one for forms in add and update forms ı used ;
enctype="multipart/form-data"
for upload file throug the form.Also ı write php code that checks hidden inputs, for understand that which form are we in.

-	addProduct.php: In this file ı write php code that get inputs from admin.php forms and load them database

-	createAdmin.php: this file just like register.php only difference is ı change
admin from 0 to 1.

-	updateProduct.php: This file just like addProduct.php but in update we may have empty inputs. If so, it is not going to give any alert instead we only change given inputs.

-	deleteProduct.php: In this file an only use one input and it is product id. I find given product id from database and delete it. 


-	order.php: This file just like deleteProduct.php but we delete given orderId from both order_product and orders table.

