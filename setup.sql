CREATE TABLE orders
(
    id    int UNSIGNED AUTO_INCREMENT         NOT NULL,
    total DECIMAL(10, 2)                      NOT NULL,
    date  TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL
);

CREATE TABLE order_products
(

    orderid   int UNSIGNED   NOT NULL,
    productid int UNSIGNED   NOT NULL,
    qty       int            NOT NULL,
    subtotal  DECIMAL(10, 2) NOT NULL,
    PRIMARY KEY (orderid, productid)
);

CREATE TABLE products
(
    id          int UNSIGNED AUTO_INCREMENT NOT NULL,
    name        varchar(255)                NOT NULL,
    sku         varchar(255)                NOT NULL,
    description TEXT                        NOT NULL,
    price       DECIMAL(10, 2)
);
