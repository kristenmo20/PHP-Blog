use database;

CREATE TABLE `author` (
`email` varchar(255) PRIMARY KEY
, `name` varchar(255) NOT NULL
, `password_hash` varchar(255) NOT NULL
);

CREATE TABLE `blogPost` (
    `slug` varchar(40) PRIMARY KEY
    , `post_name` varchar(255) NOT NULL
    , `post_content` text
    , `author`varchar(255)
    , FOREIGN KEY(`author`) REFERENCES `author`(`email`)
    , `publication_date` date
);


INSERT INTO `author` (`email`) VALUES ("perry.white@dailyplanet.com");
INSERT INTO `author` (`email`) VALUES ("lois.lane@dailyplanet.com");
INSERT INTO `author` (`email`) VALUES ("clark.kent@dailyplanet.com");

INSERT INTO `author` (`name`) VALUES ("Perry White");
INSERT INTO `author` (`name`) VALUES ("Lois Lane");
INSERT INTO `author` (`name`) VALUES ("Clark Kent");

INSERT INTO `author` (`password_hash`) VALUES ("123abc");
INSERT INTO `author` (`password_hash`) VALUES ("abc123");
INSERT INTO `author` (`password_hash`) VALUES ("cba321");


INSERT INTO `blogPost` (`slug`) VALUES ("The World Celebrates The Dark Knight");
INSERT INTO `blogPost` (`slug`) VALUES ("The Hero We Don't Deserve");
INSERT INTO `blogPost` (`slug`) VALUES ("Scientist Sense Strange Seismic Activity");

INSERT INTO `blogPost` (`post_name`) VALUES ("Batman Day - The World Celebrates The Dark Knight");
INSERT INTO `blogPost` (`post_name`) VALUES ("Superman - The Hero We Don't Deserve");
INSERT INTO `blogPost` (`post_name`) VALUES ("Seismic Smallville - S.T.A.R Labs Scientists Sense Strange Seismic Activity");

INSERT INTO `blogPost` (`post_content`) VALUES ("Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam hendrerit 
    neque sed lorem sodales volutpat. Curabitur feugiat placerat quam, et elementum diam ultrices eget. Donec ultricies elementum
    est, in sollicitudin arcu accumsan in. Nulla leo nisl, dignissim pretium congue sit amet, bibendum at nisl. Nam faucibus odio
    in diam mollis interdum. Vestibulum rhoncus volutpat arcu volutpat ultricies. Nunc efficitur, leo a tempus consequat, ipsum
    elit eleifend odio, quis feugiat felis tellus vitae ligula. Quisque ac facilisis justo, non vehicula metus. Curabitur sollicitudin efficitur laoreet.");

INSERT INTO `blogPost` (`post_content`) VALUES ("Suspendisse potenti. Proin semper tincidunt purus nec aliquam. Nullam non
    justo et odio hendrerit pharetra ut quis lorem. Aenean vitae sagittis magna. Aenean nulla urna, fringilla tempor turpis nec,
    ultrices dignissim lacus. Maecenas sit amet facilisis purus, eget vulputate mi. Morbi lobortis pharetra neque, ac suscipit
    urna fermentum sed. Donec vehicula ante mi, non blandit augue dapibus non. Praesent sed efficitur nunc. Vestibulum quis
    maximus tortor, consequat mollis arcu. Maecenas varius in urna eu hendrerit. Nulla suscipit blandit quam quis luctus.
    Vivamus sit amet semper leo. Nam sit amet elit vitae arcu auctor laoreet non a purus. Pellentesque habitant morbi tristique
    senectus et netus et malesuada fames ac turpis egestas.");

INSERT INTO `blogPost` (`post_content`) VALUES ("Cras consequat metus est. Nunc accumsan pulvinar nunc sed sagittis. Fusce
    efficitur justo at consequat tristique. Integer id luctus risus. Aenean nulla felis, venenatis tincidunt libero vel, 
    bibendum auctor purus. Praesent purus urna, maximus et mollis ut, malesuada ultricies urna. Praesent pharetra nec nisl 
    in sodales. Nunc tristique convallis augue, sit amet malesuada metus dapibus sit amet. Nullam non lorem a ligula convallis 
    fermentum. Aliquam blandit auctor leo sit amet luctus. Proin suscipit, lectus vel vulputate rhoncus, tellus quam pellentesque 
    tortor, vitae bibendum mi massa in dolor. Donec leo ante, cursus feugiat nibh ac, fermentum congue magna. Proin in dui lectus.");

INSERT INTO `blogPost` (`publication_date`) VALUES ("2017-05-17");
INSERT INTO `blogPost` (`publication_date`) VALUES ("2017-11-25");
INSERT INTO `blogPost` (`publication_date`) VALUES ("2017-10-22");