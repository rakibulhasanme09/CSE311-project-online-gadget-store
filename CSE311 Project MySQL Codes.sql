create database gadget_store;
use gadget_store;

create table categories (category_id int PRIMARY KEY AUTO_INCREMENT, category_title varchar(100));

create table brands (brand_id int PRIMARY KEY AUTO_INCREMENT, brand_title varchar(100));

create table products (product_id int PRIMARY KEY AUTO_INCREMENT, product_title varchar(100),
product_description varchar(300), product_keyword varchar(300), category_id int, brand_id int,
product_image1 varchar(300), product_image2 varchar(300), product_image3 varchar(300), product_price varchar(100),
date timestamp, status varchar(100), foreign key (category_id) references categories(category_id), 
foreign key (brand_id) references brands(brand_id));

create table cart_details (product_id int PRIMARY KEY, ip_address varchar(255), quantity int, 
foreign key (product_id) references products(product_id));