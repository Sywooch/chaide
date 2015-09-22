/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     17/09/2015 11:13:20                          */
/*==============================================================*/


drop table if exists advantage;

drop table if exists article;

drop table if exists car_shop;

drop table if exists characteristic;

drop table if exists city;

drop table if exists cloth;

drop table if exists color;

drop table if exists detail;

drop table if exists history;

drop table if exists ip;

drop table if exists line;

drop table if exists locale;

drop table if exists mesure;

drop table if exists product;

drop table if exists product_advantage;

drop table if exists product_characteristic;

drop table if exists product_color;

drop table if exists product_ip;

drop table if exists product_mesure;

drop table if exists sell;

drop table if exists type;

drop table if exists user;

/*==============================================================*/
/* Table: advantage                                             */
/*==============================================================*/
create table advantage
(
   id                   int not null auto_increment,
   title                varchar(150) not null,
   description          text not null,
   creation_date        datetime not null,
   primary key (id)
);

/*==============================================================*/
/* Table: article                                               */
/*==============================================================*/
create table article
(
   id                   int not null auto_increment,
   picture              varchar(100) not null,
   title                varchar(150) not null,
   description          text not null,
   type                 enum('news','innovation') not null,
   creation_date        datetime not null,
   primary key (id)
);

/*==============================================================*/
/* Table: car_shop                                              */
/*==============================================================*/
create table car_shop
(
   user_id              int not null,
   product_id           int not null,
   primary key (user_id, product_id)
);

/*==============================================================*/
/* Table: characteristic                                        */
/*==============================================================*/
create table characteristic
(
   id                   int not null auto_increment,
   description          text not null,
   icon                 varchar(100) not null,
   creation_date        datetime not null,
   primary key (id)
);

/*==============================================================*/
/* Table: city                                                  */
/*==============================================================*/
create table city
(
   id                   int not null auto_increment,
   description          varchar(255) not null,
   primary key (id)
);

/*==============================================================*/
/* Table: cloth                                                 */
/*==============================================================*/
create table cloth
(
   id                   int not null auto_increment,
   product_id           int not null,
   description          varchar(150) not null,
   icon                 varchar(100) not null,
   primary key (id)
);

/*==============================================================*/
/* Table: color                                                 */
/*==============================================================*/
create table color
(
   id                   int not null auto_increment,
   description          varchar(100) not null,
   icon                 varchar(100) not null,
   creation_date        datetime not null,
   primary key (id)
);

/*==============================================================*/
/* Table: detail                                                */
/*==============================================================*/
create table detail
(
   product_id           int not null,
   sell_id              int not null,
   primary key (product_id, sell_id)
);

/*==============================================================*/
/* Table: history                                               */
/*==============================================================*/
create table history
(
   id                   int not null auto_increment,
   picture              varchar(100) not null,
   description          varchar(255) not null,
   year                 varchar(4) not null,
   title                varchar(100) not null,
   creation_date        datetime not null,
   primary key (id)
);

/*==============================================================*/
/* Table: ip                                                    */
/*==============================================================*/
create table ip
(
   id                   int not null auto_increment,
   description          varchar(11) not null,
   primary key (id)
);

/*==============================================================*/
/* Table: line                                                  */
/*==============================================================*/
create table line
(
   id                   int not null auto_increment,
   type_id              int,
   description          varchar(150) not null,
   primary key (id)
);

/*==============================================================*/
/* Table: locale                                                */
/*==============================================================*/
create table locale
(
   id                   int not null auto_increment,
   city_id              int,
   latitude             float not null,
   longitude            float not null,
   address              varchar(255) not null,
   primary key (id)
);

/*==============================================================*/
/* Table: mesure                                                */
/*==============================================================*/
create table mesure
(
   id                   int not null auto_increment,
   description          varchar(100) not null,
   primary key (id)
);

/*==============================================================*/
/* Table: product                                               */
/*==============================================================*/
create table product
(
   id                   int not null auto_increment,
   line_id              int,
   title                varchar(150) not null,
   description          text not null,
   price                decimal not null,
   3d                   varchar(100) not null,
   picture              varchar(150) not null,
   background1          varchar(150) not null,
   background2          varchar(150) not null,
   background3          varchar(150) not null,
   status               enum('ACTIVE','INACTIVE') not null,
   creation_date        datetime not null,
   primary key (id)
);

/*==============================================================*/
/* Table: product_advantage                                     */
/*==============================================================*/
create table product_advantage
(
   product_id           int not null,
   advantage_id         int not null,
   primary key (product_id, advantage_id)
);

/*==============================================================*/
/* Table: product_characteristic                                */
/*==============================================================*/
create table product_characteristic
(
   product_id           int not null,
   characteristic_id    int not null,
   primary key (product_id, characteristic_id)
);

/*==============================================================*/
/* Table: product_color                                         */
/*==============================================================*/
create table product_color
(
   color_id             int not null,
   product_id           int not null,
   primary key (color_id, product_id)
);

/*==============================================================*/
/* Table: product_ip                                            */
/*==============================================================*/
create table product_ip
(
   ip_id                int not null,
   product_id           int not null,
   primary key (ip_id, product_id)
);

/*==============================================================*/
/* Table: product_mesure                                        */
/*==============================================================*/
create table product_mesure
(
   mesure_id            int not null,
   product_id           int not null,
   primary key (mesure_id, product_id)
);

/*==============================================================*/
/* Table: sell                                                  */
/*==============================================================*/
create table sell
(
   id                   int not null auto_increment,
   user_id              int,
   creation_date        datetime not null,
   primary key (id)
);

/*==============================================================*/
/* Table: type                                                  */
/*==============================================================*/
create table type
(
   id                   int not null auto_increment,
   description          varchar(150) not null,
   primary key (id)
);

/*==============================================================*/
/* Table: user                                                  */
/*==============================================================*/
create table user
(
   id                   int not null auto_increment,
   city_id              int,
   identity             varchar(10) not null,
   names                varchar(255) not null,
   lastnames            varchar(255) not null,
   birthday             date not null,
   address              varchar(255) not null,
   billing_address      varchar(255) not null,
   username             varchar(150) not null,
   password             varchar(255) not null,
   phone                varchar(9) not null,
   cellphone            varchar(10) not null,
   sex                  enum('MALE','FEMALE') not null,
   creation_date        datetime not null,
   primary key (id)
);

alter table car_shop add constraint fk_car_shop foreign key (product_id)
      references product (id) on delete restrict on update restrict;

alter table car_shop add constraint fk_car_shop foreign key (user_id)
      references user (id) on delete restrict on update restrict;

alter table cloth add constraint fk_product_cloth foreign key (product_id)
      references product (id) on delete restrict on update restrict;

alter table detail add constraint fk_detail foreign key (product_id)
      references product (id) on delete restrict on update restrict;

alter table detail add constraint fk_detail foreign key (sell_id)
      references sell (id) on delete restrict on update restrict;

alter table line add constraint fk_has_many foreign key (type_id)
      references type (id) on delete restrict on update restrict;

alter table locale add constraint fk_has_many foreign key (city_id)
      references city (id) on delete restrict on update restrict;

alter table product add constraint fk_has_many foreign key (line_id)
      references line (id) on delete restrict on update restrict;

alter table product_advantage add constraint fk_product_advantage foreign key (advantage_id)
      references advantage (id) on delete restrict on update restrict;

alter table product_advantage add constraint fk_product_advantage foreign key (product_id)
      references product (id) on delete restrict on update restrict;

alter table product_characteristic add constraint fk_product_characteristic foreign key (characteristic_id)
      references characteristic (id) on delete restrict on update restrict;

alter table product_characteristic add constraint fk_product_characteristic foreign key (product_id)
      references product (id) on delete restrict on update restrict;

alter table product_color add constraint fk_product_color foreign key (color_id)
      references color (id) on delete restrict on update restrict;

alter table product_color add constraint fk_product_color foreign key (product_id)
      references product (id) on delete restrict on update restrict;

alter table product_ip add constraint fk_product_ip foreign key (ip_id)
      references ip (id) on delete restrict on update restrict;

alter table product_ip add constraint fk_product_ip foreign key (product_id)
      references product (id) on delete restrict on update restrict;

alter table product_mesure add constraint fk_product_mesure foreign key (mesure_id)
      references mesure (id) on delete restrict on update restrict;

alter table product_mesure add constraint fk_product_mesure foreign key (product_id)
      references product (id) on delete restrict on update restrict;

alter table sell add constraint fk_has_many_sells foreign key (user_id)
      references user (id) on delete restrict on update restrict;

alter table user add constraint fk_has_many foreign key (city_id)
      references city (id) on delete restrict on update restrict;

