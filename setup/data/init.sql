DROP DATABASE IF EXISTS blog;

CREATE DATABASE blog CHARSET utf8;

USE blog;

CREATE TABLE author (
  email VARCHAR (255) NOT NULL PRIMARY KEY,
  first_name VARCHAR (50) NOT NULL,
  last_name VARCHAR (50) NOT NULL,
  password_hash VARCHAR (255) NOT NULL
) ENGINE = InnoDB;

CREATE TABLE blogPost (
  slug VARCHAR (50) NOT NULL PRIMARY KEY,
  title VARCHAR (255) NOT NULL,
  content TEXT NOT NULL,
  user_email VARCHAR (255),
  publication_date DATETIME DEFAULT CURRENT_TIMESTAMP,
  CONSTRAINT blogPost_fk_user_email
    FOREIGN KEY (user_email)
    REFERENCES author (email)
) ENGINE = InnoDB;



INSERT INTO author (email, first_name, last_name, password_hash) VALUES 
    ("perry.white@dailyplanet.com", "Perry", "White", "$2y$10$qss.Z3LAj5s7vzMYYmLLsePgFuk0D8qT9/p1FJ0hQAF1VeQlnLDJi"),
    ("lois.lane@dailyplanet.com", "Lois", "Lane", "$2y$10$5/ix4/P3Gm4w4KUTDwURMOgxxWZGciTx3k3CIawFJYZ1NSADl6JoS"),
    ("clark.kent@dailyplanet.com", "Clark", "Kent", "$2y$10$YsEz.LP.iC64ja.3cViXdOpOW1f9O.n2yMiNEokzb92WDUNezvoFC");


INSERT INTO blogPost (slug, title, content, user_email) VALUES 
    ("Batman Day", "Batman Day - The World Celebrates The Dark Knight", "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam hendrerit 
    neque sed lorem sodales volutpat. Curabitur feugiat placerat quam, et elementum diam ultrices eget. Donec ultricies elementum
    est, in sollicitudin arcu accumsan in. Nulla leo nisl, dignissim pretium congue sit amet, bibendum at nisl. Nam faucibus odio
    in diam mollis interdum. Vestibulum rhoncus volutpat arcu volutpat ultricies. Nunc efficitur, leo a tempus consequat, ipsum
    elit eleifend odio, quis feugiat felis tellus vitae ligula. Quisque ac facilisis justo, non vehicula metus. Curabitur sollicitudin efficitur laoreet.", "perry.white@dailyplanet.com"),
    
    ("Superman", "The Hero We Don't Deserve", "Suspendisse potenti. Proin semper tincidunt purus nec aliquam. Nullam non
    justo et odio hendrerit pharetra ut quis lorem. Aenean vitae sagittis magna. Aenean nulla urna, fringilla tempor turpis nec,
    ultrices dignissim lacus. Maecenas sit amet facilisis purus, eget vulputate mi. Morbi lobortis pharetra neque, ac suscipit
    urna fermentum sed. Donec vehicula ante mi, non blandit augue dapibus non. Praesent sed efficitur nunc. Vestibulum quis
    maximus tortor, consequat mollis arcu. Maecenas varius in urna eu hendrerit. Nulla suscipit blandit quam quis luctus.
    Vivamus sit amet semper leo. Nam sit amet elit vitae arcu auctor laoreet non a purus. Pellentesque habitant morbi tristique
    senectus et netus et malesuada fames ac turpis egestas.", "lois.lane@dailyplanet.com"),
    
    ("Seismic Smallvile", "Seismic Smallville - S.T.A.R Labs Scientists Sense Strange Seismic Activity", "Cras consequat metus est. Nunc accumsan pulvinar nunc sed sagittis. Fusce
    efficitur justo at consequat tristique. Integer id luctus risus. Aenean nulla felis, venenatis tincidunt libero vel, 
    bibendum auctor purus. Praesent purus urna, maximus et mollis ut, malesuada ultricies urna. Praesent pharetra nec nisl 
    in sodales. Nunc tristique convallis augue, sit amet malesuada metus dapibus sit amet. Nullam non lorem a ligula convallis 
    fermentum. Aliquam blandit auctor leo sit amet luctus. Proin suscipit, lectus vel vulputate rhoncus, tellus quam pellentesque 
    tortor, vitae bibendum mi massa in dolor. Donec leo ante, cursus feugiat nibh ac, fermentum congue magna. Proin in dui lectus.", "clark.kent@dailyplanet.com");
