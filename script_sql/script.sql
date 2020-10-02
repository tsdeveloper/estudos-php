create table if not exists users
(
    id         int auto_increment
        primary key,
    first_name varchar(200)                          not null,
    last_name  varchar(200)                          not null,
    email      varchar(200)                          not null,
    document   varchar(11)                           null,
    created_at timestamp default current_timestamp() not null,
    updated_at timestamp default current_timestamp() not null on update current_timestamp()
)
    charset = latin1;

create table if not exists users_address
(
    id         int auto_increment primary key,
    user_id         int not null ,
    first_name varchar(200)                          not null,
    last_name  varchar(200)                          not null,
    email      varchar(200)                          not null,
    document   varchar(11)                           null,
    created_at timestamp default current_timestamp() not null,
    updated_at timestamp default current_timestamp() not null on update current_timestamp(),
    CONSTRAINT `fK_users_address_users`
        FOREIGN KEY (user_id) REFERENCES users (id)
            ON DELETE CASCADE
)
    charset = latin1;



