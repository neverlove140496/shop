create table categorys
(
	id int not null primary key auto_increment,
	name varchar(200) not null unique,
	slug varchar(200) not null,
	parent int default '0',
	status tinyint default '1',
	created_at datetime default current_timestamp,
	updated_at datetime default current_timestamp
);

create table products
(
	id int primary key auto_increment,
	name varchar(200) not null,
	category_id int not null,
	image varchar(200) ,
	slug varchar(200) not null,
	description text,
	price float,
	sale_price float,
	status tinyint default '1',
	created_at datetime default current_timestamp,
	updated_at datetime default current_timestamp
);

create table product_image
(
	id int primary key auto_increment,
	links varchar(200) not null,
	product_id int not null
	
);


create table attributes
(
	id int primary key auto_increment,
	name varchar(200) not null,
	value varchar(100) not null,
	type varchar(100) not null,
	created_at datetime default current_timestamp,
	updated_at datetime default current_timestamp	
);



create table product_attribute
(	
	product_id int not null,
	attribute_id int not null	
);


create table users
(
	id int primary key auto_increment,
	name varchar(200) not null,
	email varchar(200) not null unique,	
	password varchar(200) not null,
	phone varchar(20),	
	address varchar(200),	
	gender tinyint default '1',	
	birthday date,	
	level varchar(100) default 'customer',
	remember_token varchar(150) not null,
	created_at datetime default current_timestamp,
	updated_at datetime default current_timestamp
);

create table orders
(
	id int  primary key auto_increment,
	user_id int not null,
	payment varchar(100) not null,
	ship varchar(100) not null,

	status tinyint default '1',
	created_at datetime default current_timestamp,
	updated_at datetime default current_timestamp
);

create table order_detail
(	
	order_id int not null,
	product_id int not null,
	quantity int not null,
	price float,
	created_at datetime default current_timestamp,
	updated_at datetime default current_timestamp
);

create table banners
(
	id int  primary key auto_increment,
	name varchar(200) not null,
	link_image varchar(150) not null,
	links varchar(150) default '#',
	ordering int default '0',
	caption_1 varchar(150) not null,
	caption_2 varchar(150) not null,
	status tinyint default '1',
	created_at datetime default current_timestamp,
	updated_at datetime default current_timestamp
);

create table blog
(
	id int  primary key auto_increment,
	name varchar(200) not null,
	image varchar(200) default '#',
	author varchar(100) not null,
	description text,
	status tinyint default '1',
	created_at datetime default current_timestamp,
	updated_at datetime default current_timestamp
);
create table comment
(
	id int  primary key auto_increment,
	user_id int not null,
	blog_id int not null,
	content text,
	created_at datetime default current_timestamp,
	updated_at datetime default current_timestamp
);

-- KHÓA NGOẠI 
-- Sản phẩm với danh mục	
Alter table products add foreign key FK_products_categorys(category_id) references categorys(id);

-- Hóa đơn với chi tiết khasch hang
Alter table orders add foreign key FK_orders_customers(user_id) references users(id);

-- Chi tiết hóa đơn với hóa đơn
Alter table order_detail add foreign key FK_order_detail_orders(order_id) references orders(id);

-- Chi tiết hóa đơn với sản phẩm
Alter table order_detail add foreign key FK_order_detail_products(product_id) references products(id);

-- Chi tiết ảnh sản phẩm với sản phẩm
Alter table product_image add foreign key FK_product_image_products(product_id) references products(id);

-- Chi tiết  sản phẩm với thuộc tính
Alter table product_attribute add foreign key FK_product_attribute_attributes(attribute_id) references attributes(id);

-- Chi tiết  sản phẩm thuộc tính với sản phẩm
Alter table product_attribute add foreign key FK_product_attribute_products(product_id) references products(id);

-- Tin tức và người dùng
Alter table comment add foreign key FK_comment_users(user_id) references comment(id);

-- Tin tức và blog
Alter table comment add foreign key FK_comment_blog(blog_id) references blog(id);