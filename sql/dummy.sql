-- --------------------------------------------------------
-- Hostitel:                     127.0.0.1
-- Verze serveru:                8.0.28 - MySQL Community Server - GPL
-- OS serveru:                   Linux
-- HeidiSQL Verze:               11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Exportování dat pro tabulku nette_example.article: ~0 rows (přibližně)
/*!40000 ALTER TABLE `article` DISABLE KEYS */;
INSERT INTO `article` (`id`, `name`, `perex`, `created`, `requires_logging_in`) VALUES
	(1, 'Lorem ipsum', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Integer tempor. Etiam ligula pede, sagittis quis, interdum ultricies, scelerisque eu. Vivamus porttitor turpis ac leo. Mauris dolor felis, sagittis at, luctus sed, aliquam non, tellus. Sed ac dolor sit amet purus malesuada congue. Fusce wisi. Et harum quidem rerum facilis est et expedita distinctio. Duis condimentum augue id magna semper rutrum. Aenean vel massa quis mauris vehicula lacinia.', '2022-03-11 10:29:20', 0),
	(2, 'ipsum', 'Donec vitae arcu. Aliquam ante. In convallis. Mauris dictum facilisis augue. In dapibus augue non sapien. In laoreet, magna id viverra tincidunt, sem odio bibendum justo, vel imperdiet sapien wisi sed libero. In convallis. Nullam at arcu a est sollicitudin euismod. Maecenas sollicitudin. Maecenas fermentum, sem in pharetra pellentesque, velit turpis volutpat ante, in pharetra metus odio a lectus. Vestibulum fermentum tortor id mi. Nullam dapibus fermentum ipsum. Nam quis nulla. Duis ante orci, molestie vitae vehicula venenatis, tincidunt ac pede. Duis pulvinar.', '2022-03-10 10:29:37', 1),
	(3, 'Nulla est', 'Nulla est. Duis ante orci, molestie vitae vehicula venenatis, tincidunt ac pede. Et harum quidem rerum facilis est et expedita distinctio. Nulla quis diam. Fusce wisi. Cras pede libero, dapibus nec, pretium sit amet, tempor quis. Fusce tellus. Mauris tincidunt sem sed arcu. Praesent vitae arcu tempor neque lacinia pretium. Fusce dui leo, imperdiet in, aliquam sit amet, feugiat eu, orci. Nulla est.', '2022-03-09 10:30:29', 1),
	(4, 'Nunc tincidunt ante vitae massa', 'Nunc tincidunt ante vitae massa. Integer malesuada. Donec vitae arcu. Aliquam erat volutpat. Maecenas fermentum, sem in pharetra pellentesque, velit turpis volutpat ante, in pharetra metus odio a lectus. Sed elit dui, pellentesque a, faucibus vel, interdum nec, diam. Donec vitae arcu. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Curabitur vitae diam non enim vestibulum interdum. Maecenas aliquet accumsan leo. Phasellus faucibus molestie nisl. Vivamus porttitor turpis ac leo. Integer imperdiet lectus quis justo. Nullam lectus justo, vulputate eget mollis sed, tempor sed magna. Duis sapien nunc, commodo et, interdum suscipit, sollicitudin et, dolor. Nulla non arcu lacinia neque faucibus fringilla. Etiam egestas wisi a erat. Etiam ligula pede, sagittis quis, interdum ultricies, scelerisque eu. Duis viverra diam non justo. Suspendisse nisl.', '2022-03-08 10:30:48', 1),
	(5, 'Nunc tincidunt ante vitae massa', 'Nunc tincidunt ante vitae massa. Integer malesuada. Donec vitae arcu. Aliquam erat volutpat. Maecenas fermentum, sem in pharetra pellentesque, velit turpis volutpat ante, in pharetra metus odio a lectus. Sed elit dui, pellentesque a, faucibus vel, interdum nec, diam. Donec vitae arcu. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Curabitur vitae diam non enim vestibulum interdum. Maecenas aliquet accumsan leo. Phasellus faucibus molestie nisl. Vivamus porttitor turpis ac leo. Integer imperdiet lectus quis justo. Nullam lectus justo, vulputate eget mollis sed, tempor sed magna. Duis sapien nunc, commodo et, interdum suscipit, sollicitudin et, dolor. Nulla non arcu lacinia neque faucibus fringilla. Etiam egestas wisi a erat. Etiam ligula pede, sagittis quis, interdum ultricies, scelerisque eu. Duis viverra diam non justo. Suspendisse nisl.', '2022-03-08 09:30:48', 1),
	(6, 'Nunc tincidunt ante vitae massa', 'Nunc tincidunt ante vitae massa. Integer malesuada. Donec vitae arcu. Aliquam erat volutpat. Maecenas fermentum, sem in pharetra pellentesque, velit turpis volutpat ante, in pharetra metus odio a lectus. Sed elit dui, pellentesque a, faucibus vel, interdum nec, diam. Donec vitae arcu. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Curabitur vitae diam non enim vestibulum interdum. Maecenas aliquet accumsan leo. Phasellus faucibus molestie nisl. Vivamus porttitor turpis ac leo. Integer imperdiet lectus quis justo. Nullam lectus justo, vulputate eget mollis sed, tempor sed magna. Duis sapien nunc, commodo et, interdum suscipit, sollicitudin et, dolor. Nulla non arcu lacinia neque faucibus fringilla. Etiam egestas wisi a erat. Etiam ligula pede, sagittis quis, interdum ultricies, scelerisque eu. Duis viverra diam non justo. Suspendisse nisl.', '2022-03-08 08:30:48', 1),
	(7, 'Nunc tincidunt ante vitae massa', 'Nunc tincidunt ante vitae massa. Integer malesuada. Donec vitae arcu. Aliquam erat volutpat. Maecenas fermentum, sem in pharetra pellentesque, velit turpis volutpat ante, in pharetra metus odio a lectus. Sed elit dui, pellentesque a, faucibus vel, interdum nec, diam. Donec vitae arcu. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Curabitur vitae diam non enim vestibulum interdum. Maecenas aliquet accumsan leo. Phasellus faucibus molestie nisl. Vivamus porttitor turpis ac leo. Integer imperdiet lectus quis justo. Nullam lectus justo, vulputate eget mollis sed, tempor sed magna. Duis sapien nunc, commodo et, interdum suscipit, sollicitudin et, dolor. Nulla non arcu lacinia neque faucibus fringilla. Etiam egestas wisi a erat. Etiam ligula pede, sagittis quis, interdum ultricies, scelerisque eu. Duis viverra diam non justo. Suspendisse nisl.', '2022-03-08 07:30:48', 1),
	(8, 'A Nunc tincidunt ante vitae massa', 'Nunc tincidunt ante vitae massa. Integer malesuada. Donec vitae arcu. Aliquam erat volutpat. Maecenas fermentum, sem in pharetra pellentesque, velit turpis volutpat ante, in pharetra metus odio a lectus. Sed elit dui, pellentesque a, faucibus vel, interdum nec, diam. Donec vitae arcu. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Curabitur vitae diam non enim vestibulum interdum. Maecenas aliquet accumsan leo. Phasellus faucibus molestie nisl. Vivamus porttitor turpis ac leo. Integer imperdiet lectus quis justo. Nullam lectus justo, vulputate eget mollis sed, tempor sed magna. Duis sapien nunc, commodo et, interdum suscipit, sollicitudin et, dolor. Nulla non arcu lacinia neque faucibus fringilla. Etiam egestas wisi a erat. Etiam ligula pede, sagittis quis, interdum ultricies, scelerisque eu. Duis viverra diam non justo. Suspendisse nisl.', '2022-03-08 06:30:48', 1),
	(9, 'Nunc tincidunt ante vitae massa', 'Nunc tincidunt ante vitae massa. Integer malesuada. Donec vitae arcu. Aliquam erat volutpat. Maecenas fermentum, sem in pharetra pellentesque, velit turpis volutpat ante, in pharetra metus odio a lectus. Sed elit dui, pellentesque a, faucibus vel, interdum nec, diam. Donec vitae arcu. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Curabitur vitae diam non enim vestibulum interdum. Maecenas aliquet accumsan leo. Phasellus faucibus molestie nisl. Vivamus porttitor turpis ac leo. Integer imperdiet lectus quis justo. Nullam lectus justo, vulputate eget mollis sed, tempor sed magna. Duis sapien nunc, commodo et, interdum suscipit, sollicitudin et, dolor. Nulla non arcu lacinia neque faucibus fringilla. Etiam egestas wisi a erat. Etiam ligula pede, sagittis quis, interdum ultricies, scelerisque eu. Duis viverra diam non justo. Suspendisse nisl.', '2022-03-08 05:30:48', 1),
	(10, 'Nunc tincidunt ante vitae massa', 'Nunc tincidunt ante vitae massa. Integer malesuada. Donec vitae arcu. Aliquam erat volutpat. Maecenas fermentum, sem in pharetra pellentesque, velit turpis volutpat ante, in pharetra metus odio a lectus. Sed elit dui, pellentesque a, faucibus vel, interdum nec, diam. Donec vitae arcu. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Curabitur vitae diam non enim vestibulum interdum. Maecenas aliquet accumsan leo. Phasellus faucibus molestie nisl. Vivamus porttitor turpis ac leo. Integer imperdiet lectus quis justo. Nullam lectus justo, vulputate eget mollis sed, tempor sed magna. Duis sapien nunc, commodo et, interdum suscipit, sollicitudin et, dolor. Nulla non arcu lacinia neque faucibus fringilla. Etiam egestas wisi a erat. Etiam ligula pede, sagittis quis, interdum ultricies, scelerisque eu. Duis viverra diam non justo. Suspendisse nisl.', '2022-03-08 04:30:48', 1),
	(11, 'Nunc tincidunt ante vitae massa', 'Nunc tincidunt ante vitae massa. Integer malesuada. Donec vitae arcu. Aliquam erat volutpat. Maecenas fermentum, sem in pharetra pellentesque, velit turpis volutpat ante, in pharetra metus odio a lectus. Sed elit dui, pellentesque a, faucibus vel, interdum nec, diam. Donec vitae arcu. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Curabitur vitae diam non enim vestibulum interdum. Maecenas aliquet accumsan leo. Phasellus faucibus molestie nisl. Vivamus porttitor turpis ac leo. Integer imperdiet lectus quis justo. Nullam lectus justo, vulputate eget mollis sed, tempor sed magna. Duis sapien nunc, commodo et, interdum suscipit, sollicitudin et, dolor. Nulla non arcu lacinia neque faucibus fringilla. Etiam egestas wisi a erat. Etiam ligula pede, sagittis quis, interdum ultricies, scelerisque eu. Duis viverra diam non justo. Suspendisse nisl.', '2022-03-08 04:30:48', 1);
/*!40000 ALTER TABLE `article` ENABLE KEYS */;

-- Exportování dat pro tabulku nette_example.article_rating: ~0 rows (přibližně)
/*!40000 ALTER TABLE `article_rating` DISABLE KEYS */;
INSERT INTO `article_rating` (`id`, `user_id`, `article_id`, `rating`) VALUES
	(1, 8, 1, 1),
	(2, 1, 1, 1),
	(3, 8, 2, 0),
	(21, 8, 4, 1),
	(22, 8, 5, 0),
	(24, 8, 6, 1),
	(25, 8, 7, 0),
	(26, 8, 9, 1),
	(27, 8, 11, 0),
	(32, 8, 8, 1),
	(49, 1, 2, 1),
	(50, 1, 3, 1),
	(51, 1, 4, 0),
	(52, 1, 5, 0),
	(53, 1, 9, 0),
	(54, 1, 10, 1),
	(58, 1, 6, 1);
/*!40000 ALTER TABLE `article_rating` ENABLE KEYS */;

-- Exportování dat pro tabulku nette_example.user: ~1 rows (přibližně)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `first_name`, `last_name`, `email`, `password`, `created`) VALUES
	(1, 'admin', 'admin', 'admin@example.org', '$2y$12$jMLyRDIvNpasHcdm3iKggO5Sj52A4F6DZo3tiVUxUJVlP0ZegTN2y', '2022-03-09 11:04:53'),
	(8, 'admin', 'admin', 'admin@example2.org', '$2y$12$jMLyRDIvNpasHcdm3iKggO5Sj52A4F6DZo3tiVUxUJVlP0ZegTN2y', '2022-03-09 11:14:11');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
