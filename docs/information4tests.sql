-- phpMyAdmin SQL Dump
-- version 4.0.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 14, 2014 at 11:58 PM
-- Server version: 5.5.33
-- PHP Version: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `simplestore`
--

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `name`, `active`, `slug`) VALUES
(1, 'Computers', 1, 'computers'),
(2, 'Smartphones', 1, 'smartphones'),
(3, 'Phones', 1, 'phones');

--
-- Dumping data for table `category_product`
--

INSERT INTO `category_product` (`category_id`, `product_id`) VALUES
(2, 1),
(3, 1),
(3, 2),
(1, 3);

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `name`, `description`, `price`, `imageURL`, `active`) VALUES
(1, 'Galaxy S3', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque sollicitudin ligula orci, id dapibus diam sodales eget. Pellentesque felis quam, placerat sit amet mauris ac, tincidunt suscipit velit. Vivamus quis convallis dui. Maecenas sit amet metus sed libero iaculis ultricies. Mauris rutrum lacus nec nisl auctor commodo eu quis metus. Morbi id gravida orci. Fusce quis odio turpis. Suspendisse eget elit vitae tortor mollis ultricies quis a lectus. Phasellus mollis egestas bibendum.\r\n\r\nNulla blandit dapibus quam a tincidunt. Nulla a lobortis nulla, id scelerisque quam. Proin vitae metus cursus, porttitor ligula quis, sagittis velit. Ut nibh neque, congue convallis egestas sit amet, ullamcorper non magna. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Curabitur sed ipsum pellentesque, lacinia odio nec, fringilla augue. Sed quis purus sed mi lobortis egestas sed sed arcu. Nullam adipiscing sapien non lacinia bibendum. Phasellus consectetur, mauris ac rutrum auctor, arcu elit iaculis nibh, ac interdum purus est ac elit. Quisque id dolor sagittis augue porta porttitor. Donec laoreet luctus tellus, in imperdiet velit mattis at.\r\n\r\nUt vitae enim velit. Curabitur et felis a leo volutpat ultricies. Pellentesque ultricies sollicitudin ligula sit amet bibendum. Ut vitae quam laoreet, rhoncus dui et, semper orci. Vivamus tempor ipsum nec volutpat imperdiet. Ut quis eleifend massa. Vestibulum at luctus metus. Etiam condimentum tristique consequat.\r\n\r\nCurabitur urna mi, pharetra a pellentesque id, tempus eu leo. Ut pulvinar aliquam ipsum eget tincidunt. Donec mi turpis, fringilla quis volutpat nec, consequat eget justo. Cras sodales non ipsum ut interdum. Phasellus elementum ut tellus ut gravida. In erat orci, accumsan quis eros eu, tempor mattis elit. Duis egestas porta ultricies. Ut luctus mi sit amet varius fermentum. Sed a dignissim metus. Quisque adipiscing molestie tempor. Curabitur mattis pulvinar elit quis placerat. Phasellus tincidunt, quam vitae aliquam adipiscing, nulla arcu pretium nulla, sit amet ullamcorper nunc mi ac ligula. Phasellus lacus ligula, molestie nec tincidunt a, porttitor vel enim. Nullam eu tempor nunc, sit amet mattis lorem.\r\n\r\nDonec commodo convallis leo eget rhoncus. Suspendisse placerat risus vitae lacus aliquam pretium. Aliquam elit augue, elementum at consequat nec, accumsan a magna. Mauris pulvinar nisl purus, ut faucibus mauris rhoncus ac. Integer at aliquet augue. Maecenas in lorem suscipit, elementum massa et, adipiscing velit. Nullam nisl justo, dictum quis mollis in, porttitor ullamcorper eros. Phasellus sed ornare lacus, nec aliquet dolor. In nunc lorem, rutrum id placerat vel, scelerisque at nisl. Phasellus ut mauris orci. Maecenas vulputate, lectus a sodales venenatis, nibh quam placerat magna, id accumsan sapien dui in metus. Cras vehicula lobortis nulla, non pellentesque nisl fermentum eget.', 2500, '66ebbea4fe6ea3fea9eba6515b083118.jpg', 1),
(2, 'Phone Nokia 1661 with flashlight', 'with flashlight!!!!!!!!\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque sollicitudin ligula orci, id dapibus diam sodales eget. Pellentesque felis quam, placerat sit amet mauris ac, tincidunt suscipit velit. Vivamus quis convallis dui. Maecenas sit amet metus sed libero iaculis ultricies. Mauris rutrum lacus nec nisl auctor commodo eu quis metus. Morbi id gravida orci. Fusce quis odio turpis. Suspendisse eget elit vitae tortor mollis ultricies quis a lectus. Phasellus mollis egestas bibendum.\r\n\r\nNulla blandit dapibus quam a tincidunt. Nulla a lobortis nulla, id scelerisque quam. Proin vitae metus cursus, porttitor ligula quis, sagittis velit. Ut nibh neque, congue convallis egestas sit amet, ullamcorper non magna. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Curabitur sed ipsum pellentesque, lacinia odio nec, fringilla augue. Sed quis purus sed mi lobortis egestas sed sed arcu. Nullam adipiscing sapien non lacinia bibendum. Phasellus consectetur, mauris ac rutrum auctor, arcu elit iaculis nibh, ac interdum purus est ac elit. Quisque id dolor sagittis augue porta porttitor. Donec laoreet luctus tellus, in imperdiet velit mattis at.\r\n\r\nUt vitae enim velit. Curabitur et felis a leo volutpat ultricies. Pellentesque ultricies sollicitudin ligula sit amet bibendum. Ut vitae quam laoreet, rhoncus dui et, semper orci. Vivamus tempor ipsum nec volutpat imperdiet. Ut quis eleifend massa. Vestibulum at luctus metus. Etiam condimentum tristique consequat.\r\n\r\nCurabitur urna mi, pharetra a pellentesque id, tempus eu leo. Ut pulvinar aliquam ipsum eget tincidunt. Donec mi turpis, fringilla quis volutpat nec, consequat eget justo. Cras sodales non ipsum ut interdum. Phasellus elementum ut tellus ut gravida. In erat orci, accumsan quis eros eu, tempor mattis elit. Duis egestas porta ultricies. Ut luctus mi sit amet varius fermentum. Sed a dignissim metus. Quisque adipiscing molestie tempor. Curabitur mattis pulvinar elit quis placerat. Phasellus tincidunt, quam vitae aliquam adipiscing, nulla arcu pretium nulla, sit amet ullamcorper nunc mi ac ligula. Phasellus lacus ligula, molestie nec tincidunt a, porttitor vel enim. Nullam eu tempor nunc, sit amet mattis lorem.\r\n\r\nDonec commodo convallis leo eget rhoncus. Suspendisse placerat risus vitae lacus aliquam pretium. Aliquam elit augue, elementum at consequat nec, accumsan a magna. Mauris pulvinar nisl purus, ut faucibus mauris rhoncus ac. Integer at aliquet augue. Maecenas in lorem suscipit, elementum massa et, adipiscing velit. Nullam nisl justo, dictum quis mollis in, porttitor ullamcorper eros. Phasellus sed ornare lacus, nec aliquet dolor. In nunc lorem, rutrum id placerat vel, scelerisque at nisl. Phasellus ut mauris orci. Maecenas vulputate, lectus a sodales venenatis, nibh quam placerat magna, id accumsan sapien dui in metus. Cras vehicula lobortis nulla, non pellentesque nisl fermentum eget.', 1000, '2b48e3700611e35a7644113912b6bf4b.jpg', 1),
(3, 'Computer PC Mix Gamer L3900', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque sollicitudin ligula orci, id dapibus diam sodales eget. Pellentesque felis quam, placerat sit amet mauris ac, tincidunt suscipit velit. Vivamus quis convallis dui. Maecenas sit amet metus sed libero iaculis ultricies. Mauris rutrum lacus nec nisl auctor commodo eu quis metus. Morbi id gravida orci. Fusce quis odio turpis. Suspendisse eget elit vitae tortor mollis ultricies quis a lectus. Phasellus mollis egestas bibendum.\r\n\r\nNulla blandit dapibus quam a tincidunt. Nulla a lobortis nulla, id scelerisque quam. Proin vitae metus cursus, porttitor ligula quis, sagittis velit. Ut nibh neque, congue convallis egestas sit amet, ullamcorper non magna. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Curabitur sed ipsum pellentesque, lacinia odio nec, fringilla augue. Sed quis purus sed mi lobortis egestas sed sed arcu. Nullam adipiscing sapien non lacinia bibendum. Phasellus consectetur, mauris ac rutrum auctor, arcu elit iaculis nibh, ac interdum purus est ac elit. Quisque id dolor sagittis augue porta porttitor. Donec laoreet luctus tellus, in imperdiet velit mattis at.\r\n\r\nUt vitae enim velit. Curabitur et felis a leo volutpat ultricies. Pellentesque ultricies sollicitudin ligula sit amet bibendum. Ut vitae quam laoreet, rhoncus dui et, semper orci. Vivamus tempor ipsum nec volutpat imperdiet. Ut quis eleifend massa. Vestibulum at luctus metus. Etiam condimentum tristique consequat.\r\n\r\nCurabitur urna mi, pharetra a pellentesque id, tempus eu leo. Ut pulvinar aliquam ipsum eget tincidunt. Donec mi turpis, fringilla quis volutpat nec, consequat eget justo. Cras sodales non ipsum ut interdum. Phasellus elementum ut tellus ut gravida. In erat orci, accumsan quis eros eu, tempor mattis elit. Duis egestas porta ultricies. Ut luctus mi sit amet varius fermentum. Sed a dignissim metus. Quisque adipiscing molestie tempor. Curabitur mattis pulvinar elit quis placerat. Phasellus tincidunt, quam vitae aliquam adipiscing, nulla arcu pretium nulla, sit amet ullamcorper nunc mi ac ligula. Phasellus lacus ligula, molestie nec tincidunt a, porttitor vel enim. Nullam eu tempor nunc, sit amet mattis lorem.\r\n\r\nDonec commodo convallis leo eget rhoncus. Suspendisse placerat risus vitae lacus aliquam pretium. Aliquam elit augue, elementum at consequat nec, accumsan a magna. Mauris pulvinar nisl purus, ut faucibus mauris rhoncus ac. Integer at aliquet augue. Maecenas in lorem suscipit, elementum massa et, adipiscing velit. Nullam nisl justo, dictum quis mollis in, porttitor ullamcorper eros. Phasellus sed ornare lacus, nec aliquet dolor. In nunc lorem, rutrum id placerat vel, scelerisque at nisl. Phasellus ut mauris orci. Maecenas vulputate, lectus a sodales venenatis, nibh quam placerat magna, id accumsan sapien dui in metus. Cras vehicula lobortis nulla, non pellentesque nisl fermentum eget.', 5000, '99cad70540a5c346c93b46492181c77d.jpg', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
