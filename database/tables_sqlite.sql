CREATE TABLE users (
   id INTEGER,
   first_name TEXT default '',
   last_name TEXT default '',
   email TEXT unique,
   username TEXT default '',
   password TEXT default '',
   user_role TEXT default 'user',
   access_token TEXT default '',
   created_at datetime default current_timestamp,
   updated_at datetime default current_timestamp,
   PRIMARY KEY(id)
);

CREATE TABLE companies (
   id INTEGER,
   name TEXT default '',
   address TEXT default '',
   type TEXT default 'casa matriz',
   nit TEXT default '',
   phone INT default 0,
   area TEXT default 'comida'
   created_at datetime default current_timestamp,
   updated_at datetime default current_timestamp,
   PRIMARY KEY(id)
);

CREATE TABLE bills(
   id INTEGER,
   invoice_number INT,
   control_code INT,
   date  TEXT default '',
   description datetime default '',   
   price REAL
   company_id INT,
   user_id INT,
   created_at datetime default current_timestamp,
   updated_at datetime default current_timestamp,
   PRIMARY KEY(id)
);

CREATE TABLE banks(
   id INTEGER,
   name TEXT,
   address TEXT default '',
   phone INT default 0,
   observation TEXT default '',
   created_at datetime default current_timestamp,
   updated_at datetime default current_timestamp,
   PRIMARY KEY(id)
);

CREATE TABLE accounts(
   id INTEGER,
   name TEXT,
   last_name TEXT default '',
   mobile INT default 0,
   number TEXT default '',
   bank_id INT,
   created_at datetime default current_timestamp,
   updated_at datetime default current_timestamp,
   PRIMARY KEY(id)
);

CREATE TABLE services(
   id INTEGER,
   name TEXT,
   created_at datetime default current_timestamp,
   updated_at datetime default current_timestamp,
   PRIMARY KEY(id)
);

CREATE TABLE cancels(
   id INTEGER,
   service_id INT,
   month INT,
   amount REAL,
   year INT
   created_at datetime default current_timestamp,
   updated_at datetime default current_timestamp,
   PRIMARY KEY(id)
);

CREATE TABLE songs(
   id INTEGER,
   title TEXT,
   author TEXT,   
   gender TEXT,
   lyrics TEXT,
   created_at datetime default current_timestamp,
   updated_at datetime default current_timestamp,
   PRIMARY KEY(id)
);

create table quarentines(
   id INTEGER,
   date datetime ,
   food TEXT,   
   name TEXT,
   type TEXT,
   created_at datetime default current_timestamp,
   updated_at datetime default current_timestamp,
   PRIMARY KEY(id)
);

create table registers(
   id INTEGER,
   type TEXT,
   url TEXT,   
   page TEXT,
   username TEXT,
   password TEXT,
   hash_password TEXT,
   status INT default true,
   date datetime,
   description TEXT,
   created_at datetime default current_timestamp,
   updated_at datetime default current_timestamp,
   PRIMARY KEY(id)
);

create table machines(
   id INTEGER,
   motherboard TEXT,
   processor TEXT,   
   ip TEXT,
   operative_system TEXT,
   mail_address TEXT,
   office_package TEXT,
   other TEXT default '',
   owner datetime,
   created_at datetime default current_timestamp,
   updated_at datetime default current_timestamp,
   PRIMARY KEY(id)
);

create languages (
   id INTEGER,
   name TEXT,
   created_at datetime default current_timestamp,
   updated_at datetime default current_timestamp,
   PRIMARY KEY(id)
);

create dictionaries (
   id INTEGER,
   word TEXT,
   pronuntiation TEXT,
   meaning TEXT default ''
   example TEXT default '',
   language_id INT default 1,
   created_at datetime default current_timestamp,
   updated_at datetime default current_timestamp,
   PRIMARY KEY(id)
);
