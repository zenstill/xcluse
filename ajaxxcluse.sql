-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2015 at 04:13 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ajaxxcluse`
--

-- --------------------------------------------------------

--
-- Table structure for table `addtocompare`
--

CREATE TABLE IF NOT EXISTS `addtocompare` (
`id` int(12) NOT NULL,
  `user_id` int(12) NOT NULL,
  `product_id` int(12) NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `add_to_wishlist`
--

CREATE TABLE IF NOT EXISTS `add_to_wishlist` (
`id` int(12) NOT NULL,
  `group_id` int(12) NOT NULL,
  `user_id` int(12) NOT NULL,
  `product_id` int(12) NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `add_to_wishlist`
--

INSERT INTO `add_to_wishlist` (`id`, `group_id`, `user_id`, `product_id`, `created_date`) VALUES
(50, 10, 1, 159, '2015-06-30 12:12:09'),
(51, 13, 1, 158, '2015-06-30 12:12:10'),
(52, 13, 1, 157, '2015-06-30 12:12:12'),
(53, 8, 1, 156, '2015-06-30 12:12:14'),
(54, 1, 1, 160, '2015-07-01 05:57:15');

-- --------------------------------------------------------

--
-- Table structure for table `saved_search`
--

CREATE TABLE IF NOT EXISTS `saved_search` (
`id` int(12) NOT NULL,
  `user_id` int(12) NOT NULL,
  `keywords` varchar(250) NOT NULL,
  `urls` varchar(250) NOT NULL,
  `saved_date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `saved_search`
--

INSERT INTO `saved_search` (`id`, `user_id`, `keywords`, `urls`, `saved_date`) VALUES
(1, 1, 'a:2:{i:0;s:3:"2xl";i:1;s:6:"brand1";}', 'a:4:{s:8:"main_cat";s:2:"40";s:1:"q";s:0:"";s:4:"size";a:1:{i:0;s:2:"30";}s:5:"brand";a:1:{i:0;s:2:"46";}}', '2015-07-25 06:38:53');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist_group`
--

CREATE TABLE IF NOT EXISTS `wishlist_group` (
`id` int(12) NOT NULL,
  `group_name` varchar(250) NOT NULL,
  `user_id` int(12) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wishlist_group`
--

INSERT INTO `wishlist_group` (`id`, `group_name`, `user_id`) VALUES
(1, 'Default', 0);

-- --------------------------------------------------------

--
-- Table structure for table `woof_query_cache`
--

CREATE TABLE IF NOT EXISTS `woof_query_cache` (
  `mkey` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `mvalue` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wp_commentmeta`
--

CREATE TABLE IF NOT EXISTS `wp_commentmeta` (
`meta_id` bigint(20) unsigned NOT NULL,
  `comment_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wp_comments`
--

CREATE TABLE IF NOT EXISTS `wp_comments` (
`comment_ID` bigint(20) unsigned NOT NULL,
  `comment_post_ID` bigint(20) unsigned NOT NULL DEFAULT '0',
  `comment_author` tinytext COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment_author_email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_author_url` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_author_IP` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comment_date_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comment_content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment_karma` int(11) NOT NULL DEFAULT '0',
  `comment_approved` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `comment_agent` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_parent` bigint(20) unsigned NOT NULL DEFAULT '0',
  `user_id` bigint(20) unsigned NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wp_comments`
--

INSERT INTO `wp_comments` (`comment_ID`, `comment_post_ID`, `comment_author`, `comment_author_email`, `comment_author_url`, `comment_author_IP`, `comment_date`, `comment_date_gmt`, `comment_content`, `comment_karma`, `comment_approved`, `comment_agent`, `comment_type`, `comment_parent`, `user_id`) VALUES
(1, 1, 'Mr WordPress', '', 'https://wordpress.org/', '', '2015-05-07 12:17:27', '2015-05-07 12:17:27', 'Hi, this is a comment.\nTo delete a comment, just log in and view the post&#039;s comments. There you will have the option to edit or delete them.', 0, '1', '', '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `wp_links`
--

CREATE TABLE IF NOT EXISTS `wp_links` (
`link_id` bigint(20) unsigned NOT NULL,
  `link_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `link_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `link_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `link_target` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `link_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `link_visible` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Y',
  `link_owner` bigint(20) unsigned NOT NULL DEFAULT '1',
  `link_rating` int(11) NOT NULL DEFAULT '0',
  `link_updated` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `link_rel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `link_notes` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `link_rss` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wp_options`
--

CREATE TABLE IF NOT EXISTS `wp_options` (
`option_id` bigint(20) unsigned NOT NULL,
  `option_name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `option_value` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `autoload` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'yes'
) ENGINE=InnoDB AUTO_INCREMENT=3906 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wp_options`
--

INSERT INTO `wp_options` (`option_id`, `option_name`, `option_value`, `autoload`) VALUES
(1, 'siteurl', 'http://localhost/jegadeesh/ajaxexcluse', 'yes'),
(2, 'home', 'http://localhost/jegadeesh/ajaxexcluse', 'yes'),
(3, 'blogname', 'xcluse', 'yes'),
(4, 'blogdescription', 'Just another WordPress site', 'yes'),
(5, 'users_can_register', '0', 'yes'),
(6, 'admin_email', 'jegadeesh10@gmail.com', 'yes'),
(7, 'start_of_week', '1', 'yes'),
(8, 'use_balanceTags', '0', 'yes'),
(9, 'use_smilies', '1', 'yes'),
(10, 'require_name_email', '1', 'yes'),
(11, 'comments_notify', '1', 'yes'),
(12, 'posts_per_rss', '10', 'yes'),
(13, 'rss_use_excerpt', '0', 'yes'),
(14, 'mailserver_url', 'mail.example.com', 'yes'),
(15, 'mailserver_login', 'login@example.com', 'yes'),
(16, 'mailserver_pass', 'password', 'yes'),
(17, 'mailserver_port', '110', 'yes'),
(18, 'default_category', '1', 'yes'),
(19, 'default_comment_status', 'open', 'yes'),
(20, 'default_ping_status', 'open', 'yes'),
(21, 'default_pingback_flag', '1', 'yes'),
(22, 'posts_per_page', '10', 'yes'),
(23, 'date_format', 'F j, Y', 'yes'),
(24, 'time_format', 'g:i a', 'yes'),
(25, 'links_updated_date_format', 'F j, Y g:i a', 'yes'),
(26, 'comment_moderation', '0', 'yes'),
(27, 'moderation_notify', '1', 'yes'),
(28, 'permalink_structure', '/%postname%/', 'yes'),
(29, 'gzipcompression', '0', 'yes'),
(30, 'hack_file', '0', 'yes'),
(31, 'blog_charset', 'UTF-8', 'yes'),
(32, 'moderation_keys', '', 'no'),
(33, 'active_plugins', 'a:5:{i:2;s:27:"woocommerce/woocommerce.php";i:3;s:42:"wordpress-social-login/wp-social-login.php";i:4;s:51:"wp-gallery-custom-links/wp-gallery-custom-links.php";i:5;s:33:"wp-postratings/wp-postratings.php";i:7;s:37:"yith-woocommerce-ajax-search/init.php";}', 'yes'),
(34, 'category_base', '', 'yes'),
(35, 'ping_sites', 'http://rpc.pingomatic.com/', 'yes'),
(36, 'advanced_edit', '0', 'yes'),
(37, 'comment_max_links', '2', 'yes'),
(38, 'gmt_offset', '0', 'yes'),
(39, 'default_email_category', '1', 'yes'),
(40, 'recently_edited', 'a:2:{i:0;s:73:"C:\\xampp\\htdocs\\jegadeesh\\newxcluse/wp-content/themes/newxcluse/style.css";i:1;s:0:"";}', 'no'),
(41, 'template', 'testxcluse', 'yes'),
(42, 'stylesheet', 'testxcluse', 'yes'),
(43, 'comment_whitelist', '1', 'yes'),
(44, 'blacklist_keys', '', 'no'),
(45, 'comment_registration', '0', 'yes'),
(46, 'html_type', 'text/html', 'yes'),
(47, 'use_trackback', '0', 'yes'),
(48, 'default_role', 'subscriber', 'yes'),
(49, 'db_version', '31536', 'yes'),
(50, 'uploads_use_yearmonth_folders', '1', 'yes'),
(51, 'upload_path', '', 'yes'),
(52, 'blog_public', '1', 'yes'),
(53, 'default_link_category', '2', 'yes'),
(54, 'show_on_front', 'posts', 'yes'),
(55, 'tag_base', '', 'yes'),
(56, 'show_avatars', '1', 'yes'),
(57, 'avatar_rating', 'G', 'yes'),
(58, 'upload_url_path', '', 'yes'),
(59, 'thumbnail_size_w', '150', 'yes'),
(60, 'thumbnail_size_h', '150', 'yes'),
(61, 'thumbnail_crop', '1', 'yes'),
(62, 'medium_size_w', '300', 'yes'),
(63, 'medium_size_h', '300', 'yes'),
(64, 'avatar_default', 'mystery', 'yes'),
(65, 'large_size_w', '1024', 'yes'),
(66, 'large_size_h', '1024', 'yes'),
(67, 'image_default_link_type', 'file', 'yes'),
(68, 'image_default_size', '', 'yes'),
(69, 'image_default_align', '', 'yes'),
(70, 'close_comments_for_old_posts', '0', 'yes'),
(71, 'close_comments_days_old', '14', 'yes'),
(72, 'thread_comments', '1', 'yes'),
(73, 'thread_comments_depth', '5', 'yes'),
(74, 'page_comments', '0', 'yes'),
(75, 'comments_per_page', '50', 'yes'),
(76, 'default_comments_page', 'newest', 'yes'),
(77, 'comment_order', 'asc', 'yes'),
(78, 'sticky_posts', 'a:0:{}', 'yes'),
(79, 'widget_categories', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
(80, 'widget_text', 'a:2:{i:1;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(81, 'widget_rss', 'a:2:{i:1;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(82, 'uninstall_plugins', 'a:1:{s:48:"woocommerce-ajax-filters/woocommerce-filters.php";a:2:{i:0;s:13:"BeRocket_AAPF";i:1;s:24:"br_delete_plugin_options";}}', 'no'),
(83, 'timezone_string', '', 'yes'),
(84, 'page_for_posts', '0', 'yes'),
(85, 'page_on_front', '0', 'yes'),
(86, 'default_post_format', '0', 'yes'),
(87, 'link_manager_enabled', '0', 'yes'),
(88, 'initial_db_version', '31532', 'yes'),
(89, 'wp_user_roles', 'a:7:{s:13:"administrator";a:2:{s:4:"name";s:13:"Administrator";s:12:"capabilities";a:133:{s:13:"switch_themes";b:1;s:11:"edit_themes";b:1;s:16:"activate_plugins";b:1;s:12:"edit_plugins";b:1;s:10:"edit_users";b:1;s:10:"edit_files";b:1;s:14:"manage_options";b:1;s:17:"moderate_comments";b:1;s:17:"manage_categories";b:1;s:12:"manage_links";b:1;s:12:"upload_files";b:1;s:6:"import";b:1;s:15:"unfiltered_html";b:1;s:10:"edit_posts";b:1;s:17:"edit_others_posts";b:1;s:20:"edit_published_posts";b:1;s:13:"publish_posts";b:1;s:10:"edit_pages";b:1;s:4:"read";b:1;s:8:"level_10";b:1;s:7:"level_9";b:1;s:7:"level_8";b:1;s:7:"level_7";b:1;s:7:"level_6";b:1;s:7:"level_5";b:1;s:7:"level_4";b:1;s:7:"level_3";b:1;s:7:"level_2";b:1;s:7:"level_1";b:1;s:7:"level_0";b:1;s:17:"edit_others_pages";b:1;s:20:"edit_published_pages";b:1;s:13:"publish_pages";b:1;s:12:"delete_pages";b:1;s:19:"delete_others_pages";b:1;s:22:"delete_published_pages";b:1;s:12:"delete_posts";b:1;s:19:"delete_others_posts";b:1;s:22:"delete_published_posts";b:1;s:20:"delete_private_posts";b:1;s:18:"edit_private_posts";b:1;s:18:"read_private_posts";b:1;s:20:"delete_private_pages";b:1;s:18:"edit_private_pages";b:1;s:18:"read_private_pages";b:1;s:12:"delete_users";b:1;s:12:"create_users";b:1;s:17:"unfiltered_upload";b:1;s:14:"edit_dashboard";b:1;s:14:"update_plugins";b:1;s:14:"delete_plugins";b:1;s:15:"install_plugins";b:1;s:13:"update_themes";b:1;s:14:"install_themes";b:1;s:11:"update_core";b:1;s:10:"list_users";b:1;s:12:"remove_users";b:1;s:9:"add_users";b:1;s:13:"promote_users";b:1;s:18:"edit_theme_options";b:1;s:13:"delete_themes";b:1;s:6:"export";b:1;s:18:"manage_woocommerce";b:1;s:24:"view_woocommerce_reports";b:1;s:12:"edit_product";b:1;s:12:"read_product";b:1;s:14:"delete_product";b:1;s:13:"edit_products";b:1;s:20:"edit_others_products";b:1;s:16:"publish_products";b:1;s:21:"read_private_products";b:1;s:15:"delete_products";b:1;s:23:"delete_private_products";b:1;s:25:"delete_published_products";b:1;s:22:"delete_others_products";b:1;s:21:"edit_private_products";b:1;s:23:"edit_published_products";b:1;s:20:"manage_product_terms";b:1;s:18:"edit_product_terms";b:1;s:20:"delete_product_terms";b:1;s:20:"assign_product_terms";b:1;s:15:"edit_shop_order";b:1;s:15:"read_shop_order";b:1;s:17:"delete_shop_order";b:1;s:16:"edit_shop_orders";b:1;s:23:"edit_others_shop_orders";b:1;s:19:"publish_shop_orders";b:1;s:24:"read_private_shop_orders";b:1;s:18:"delete_shop_orders";b:1;s:26:"delete_private_shop_orders";b:1;s:28:"delete_published_shop_orders";b:1;s:25:"delete_others_shop_orders";b:1;s:24:"edit_private_shop_orders";b:1;s:26:"edit_published_shop_orders";b:1;s:23:"manage_shop_order_terms";b:1;s:21:"edit_shop_order_terms";b:1;s:23:"delete_shop_order_terms";b:1;s:23:"assign_shop_order_terms";b:1;s:16:"edit_shop_coupon";b:1;s:16:"read_shop_coupon";b:1;s:18:"delete_shop_coupon";b:1;s:17:"edit_shop_coupons";b:1;s:24:"edit_others_shop_coupons";b:1;s:20:"publish_shop_coupons";b:1;s:25:"read_private_shop_coupons";b:1;s:19:"delete_shop_coupons";b:1;s:27:"delete_private_shop_coupons";b:1;s:29:"delete_published_shop_coupons";b:1;s:26:"delete_others_shop_coupons";b:1;s:25:"edit_private_shop_coupons";b:1;s:27:"edit_published_shop_coupons";b:1;s:24:"manage_shop_coupon_terms";b:1;s:22:"edit_shop_coupon_terms";b:1;s:24:"delete_shop_coupon_terms";b:1;s:24:"assign_shop_coupon_terms";b:1;s:17:"edit_shop_webhook";b:1;s:17:"read_shop_webhook";b:1;s:19:"delete_shop_webhook";b:1;s:18:"edit_shop_webhooks";b:1;s:25:"edit_others_shop_webhooks";b:1;s:21:"publish_shop_webhooks";b:1;s:26:"read_private_shop_webhooks";b:1;s:20:"delete_shop_webhooks";b:1;s:28:"delete_private_shop_webhooks";b:1;s:30:"delete_published_shop_webhooks";b:1;s:27:"delete_others_shop_webhooks";b:1;s:26:"edit_private_shop_webhooks";b:1;s:28:"edit_published_shop_webhooks";b:1;s:25:"manage_shop_webhook_terms";b:1;s:23:"edit_shop_webhook_terms";b:1;s:25:"delete_shop_webhook_terms";b:1;s:25:"assign_shop_webhook_terms";b:1;s:14:"manage_ratings";b:1;}}s:6:"editor";a:2:{s:4:"name";s:6:"Editor";s:12:"capabilities";a:34:{s:17:"moderate_comments";b:1;s:17:"manage_categories";b:1;s:12:"manage_links";b:1;s:12:"upload_files";b:1;s:15:"unfiltered_html";b:1;s:10:"edit_posts";b:1;s:17:"edit_others_posts";b:1;s:20:"edit_published_posts";b:1;s:13:"publish_posts";b:1;s:10:"edit_pages";b:1;s:4:"read";b:1;s:7:"level_7";b:1;s:7:"level_6";b:1;s:7:"level_5";b:1;s:7:"level_4";b:1;s:7:"level_3";b:1;s:7:"level_2";b:1;s:7:"level_1";b:1;s:7:"level_0";b:1;s:17:"edit_others_pages";b:1;s:20:"edit_published_pages";b:1;s:13:"publish_pages";b:1;s:12:"delete_pages";b:1;s:19:"delete_others_pages";b:1;s:22:"delete_published_pages";b:1;s:12:"delete_posts";b:1;s:19:"delete_others_posts";b:1;s:22:"delete_published_posts";b:1;s:20:"delete_private_posts";b:1;s:18:"edit_private_posts";b:1;s:18:"read_private_posts";b:1;s:20:"delete_private_pages";b:1;s:18:"edit_private_pages";b:1;s:18:"read_private_pages";b:1;}}s:6:"author";a:2:{s:4:"name";s:6:"Author";s:12:"capabilities";a:10:{s:12:"upload_files";b:1;s:10:"edit_posts";b:1;s:20:"edit_published_posts";b:1;s:13:"publish_posts";b:1;s:4:"read";b:1;s:7:"level_2";b:1;s:7:"level_1";b:1;s:7:"level_0";b:1;s:12:"delete_posts";b:1;s:22:"delete_published_posts";b:1;}}s:11:"contributor";a:2:{s:4:"name";s:11:"Contributor";s:12:"capabilities";a:5:{s:10:"edit_posts";b:1;s:4:"read";b:1;s:7:"level_1";b:1;s:7:"level_0";b:1;s:12:"delete_posts";b:1;}}s:10:"subscriber";a:2:{s:4:"name";s:10:"Subscriber";s:12:"capabilities";a:2:{s:4:"read";b:1;s:7:"level_0";b:1;}}s:8:"customer";a:2:{s:4:"name";s:8:"Customer";s:12:"capabilities";a:3:{s:4:"read";b:1;s:10:"edit_posts";b:0;s:12:"delete_posts";b:0;}}s:12:"shop_manager";a:2:{s:4:"name";s:12:"Shop Manager";s:12:"capabilities";a:110:{s:7:"level_9";b:1;s:7:"level_8";b:1;s:7:"level_7";b:1;s:7:"level_6";b:1;s:7:"level_5";b:1;s:7:"level_4";b:1;s:7:"level_3";b:1;s:7:"level_2";b:1;s:7:"level_1";b:1;s:7:"level_0";b:1;s:4:"read";b:1;s:18:"read_private_pages";b:1;s:18:"read_private_posts";b:1;s:10:"edit_users";b:1;s:10:"edit_posts";b:1;s:10:"edit_pages";b:1;s:20:"edit_published_posts";b:1;s:20:"edit_published_pages";b:1;s:18:"edit_private_pages";b:1;s:18:"edit_private_posts";b:1;s:17:"edit_others_posts";b:1;s:17:"edit_others_pages";b:1;s:13:"publish_posts";b:1;s:13:"publish_pages";b:1;s:12:"delete_posts";b:1;s:12:"delete_pages";b:1;s:20:"delete_private_pages";b:1;s:20:"delete_private_posts";b:1;s:22:"delete_published_pages";b:1;s:22:"delete_published_posts";b:1;s:19:"delete_others_posts";b:1;s:19:"delete_others_pages";b:1;s:17:"manage_categories";b:1;s:12:"manage_links";b:1;s:17:"moderate_comments";b:1;s:15:"unfiltered_html";b:1;s:12:"upload_files";b:1;s:6:"export";b:1;s:6:"import";b:1;s:10:"list_users";b:1;s:18:"manage_woocommerce";b:1;s:24:"view_woocommerce_reports";b:1;s:12:"edit_product";b:1;s:12:"read_product";b:1;s:14:"delete_product";b:1;s:13:"edit_products";b:1;s:20:"edit_others_products";b:1;s:16:"publish_products";b:1;s:21:"read_private_products";b:1;s:15:"delete_products";b:1;s:23:"delete_private_products";b:1;s:25:"delete_published_products";b:1;s:22:"delete_others_products";b:1;s:21:"edit_private_products";b:1;s:23:"edit_published_products";b:1;s:20:"manage_product_terms";b:1;s:18:"edit_product_terms";b:1;s:20:"delete_product_terms";b:1;s:20:"assign_product_terms";b:1;s:15:"edit_shop_order";b:1;s:15:"read_shop_order";b:1;s:17:"delete_shop_order";b:1;s:16:"edit_shop_orders";b:1;s:23:"edit_others_shop_orders";b:1;s:19:"publish_shop_orders";b:1;s:24:"read_private_shop_orders";b:1;s:18:"delete_shop_orders";b:1;s:26:"delete_private_shop_orders";b:1;s:28:"delete_published_shop_orders";b:1;s:25:"delete_others_shop_orders";b:1;s:24:"edit_private_shop_orders";b:1;s:26:"edit_published_shop_orders";b:1;s:23:"manage_shop_order_terms";b:1;s:21:"edit_shop_order_terms";b:1;s:23:"delete_shop_order_terms";b:1;s:23:"assign_shop_order_terms";b:1;s:16:"edit_shop_coupon";b:1;s:16:"read_shop_coupon";b:1;s:18:"delete_shop_coupon";b:1;s:17:"edit_shop_coupons";b:1;s:24:"edit_others_shop_coupons";b:1;s:20:"publish_shop_coupons";b:1;s:25:"read_private_shop_coupons";b:1;s:19:"delete_shop_coupons";b:1;s:27:"delete_private_shop_coupons";b:1;s:29:"delete_published_shop_coupons";b:1;s:26:"delete_others_shop_coupons";b:1;s:25:"edit_private_shop_coupons";b:1;s:27:"edit_published_shop_coupons";b:1;s:24:"manage_shop_coupon_terms";b:1;s:22:"edit_shop_coupon_terms";b:1;s:24:"delete_shop_coupon_terms";b:1;s:24:"assign_shop_coupon_terms";b:1;s:17:"edit_shop_webhook";b:1;s:17:"read_shop_webhook";b:1;s:19:"delete_shop_webhook";b:1;s:18:"edit_shop_webhooks";b:1;s:25:"edit_others_shop_webhooks";b:1;s:21:"publish_shop_webhooks";b:1;s:26:"read_private_shop_webhooks";b:1;s:20:"delete_shop_webhooks";b:1;s:28:"delete_private_shop_webhooks";b:1;s:30:"delete_published_shop_webhooks";b:1;s:27:"delete_others_shop_webhooks";b:1;s:26:"edit_private_shop_webhooks";b:1;s:28:"edit_published_shop_webhooks";b:1;s:25:"manage_shop_webhook_terms";b:1;s:23:"edit_shop_webhook_terms";b:1;s:25:"delete_shop_webhook_terms";b:1;s:25:"assign_shop_webhook_terms";b:1;}}}', 'yes'),
(90, 'widget_search', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
(91, 'widget_recent-posts', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
(92, 'widget_recent-comments', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
(93, 'widget_archives', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
(94, 'widget_meta', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
(95, 'sidebars_widgets', 'a:4:{s:19:"wp_inactive_widgets";a:0:{}s:15:"sidebar-widgets";a:1:{i:0;s:26:"woocommerce_price_filter-2";}s:27:"sidebar-widget-recent-views";a:0:{}s:13:"array_version";i:3;}', 'yes'),
(97, 'cron', 'a:9:{i:1437837015;a:1:{s:32:"woocommerce_cancel_unpaid_orders";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:2:{s:8:"schedule";b:0;s:4:"args";a:0:{}}}}i:1437852120;a:1:{s:20:"wp_maybe_auto_update";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:10:"twicedaily";s:4:"args";a:0:{}s:8:"interval";i:43200;}}}i:1437859961;a:1:{s:28:"woocommerce_cleanup_sessions";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:10:"twicedaily";s:4:"args";a:0:{}s:8:"interval";i:43200;}}}i:1437868800;a:1:{s:27:"woocommerce_scheduled_sales";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:5:"daily";s:4:"args";a:0:{}s:8:"interval";i:86400;}}}i:1437869848;a:3:{s:16:"wp_version_check";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:10:"twicedaily";s:4:"args";a:0:{}s:8:"interval";i:43200;}}s:17:"wp_update_plugins";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:10:"twicedaily";s:4:"args";a:0:{}s:8:"interval";i:43200;}}s:16:"wp_update_themes";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:10:"twicedaily";s:4:"args";a:0:{}s:8:"interval";i:43200;}}}i:1437900334;a:1:{s:30:"wp_scheduled_auto_draft_delete";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:5:"daily";s:4:"args";a:0:{}s:8:"interval";i:86400;}}}i:1437903161;a:1:{s:30:"woocommerce_tracker_send_event";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:5:"daily";s:4:"args";a:0:{}s:8:"interval";i:86400;}}}i:1437913064;a:1:{s:19:"wp_scheduled_delete";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:5:"daily";s:4:"args";a:0:{}s:8:"interval";i:86400;}}}s:7:"version";i:2;}', 'yes'),
(107, '_transient_random_seed', '8a88cdf015a618c419022273b9f6f7cb', 'yes'),
(109, 'db_upgraded', '', 'yes'),
(114, 'auto_core_update_notified', 'a:4:{s:4:"type";s:7:"success";s:5:"email";s:21:"jegadeesh10@gmail.com";s:7:"version";s:5:"4.2.3";s:9:"timestamp";i:1437654817;}', 'yes'),
(137, 'recently_activated', 'a:0:{}', 'yes'),
(138, 'woocommerce_default_country', 'US:AL', 'yes'),
(139, 'woocommerce_allowed_countries', 'specific', 'yes'),
(140, 'woocommerce_specific_allowed_countries', 'a:1:{i:0;s:2:"US";}', 'yes'),
(141, 'woocommerce_default_customer_address', 'geolocation', 'yes'),
(142, 'woocommerce_demo_store', 'no', 'yes'),
(143, 'woocommerce_demo_store_notice', 'This is a demo store for testing purposes — no orders shall be fulfilled.', 'no'),
(144, 'woocommerce_api_enabled', 'yes', 'yes'),
(145, 'woocommerce_currency', 'USD', 'yes'),
(146, 'woocommerce_currency_pos', 'left', 'yes'),
(147, 'woocommerce_price_thousand_sep', ',', 'yes'),
(148, 'woocommerce_price_decimal_sep', '.', 'yes'),
(149, 'woocommerce_price_num_decimals', '2', 'yes'),
(150, 'woocommerce_weight_unit', 'kg', 'yes'),
(151, 'woocommerce_dimension_unit', 'cm', 'yes'),
(152, 'woocommerce_enable_review_rating', 'yes', 'no'),
(153, 'woocommerce_review_rating_required', 'yes', 'no'),
(154, 'woocommerce_review_rating_verification_label', 'yes', 'no'),
(155, 'woocommerce_review_rating_verification_required', 'no', 'no'),
(156, 'woocommerce_shop_page_id', '187', 'yes'),
(157, 'woocommerce_shop_page_display', '', 'yes'),
(158, 'woocommerce_category_archive_display', '', 'yes'),
(159, 'woocommerce_default_catalog_orderby', 'date', 'yes'),
(160, 'woocommerce_cart_redirect_after_add', 'no', 'yes'),
(161, 'woocommerce_enable_ajax_add_to_cart', 'yes', 'yes'),
(162, 'shop_catalog_image_size', 'a:3:{s:5:"width";s:3:"300";s:6:"height";s:3:"300";s:4:"crop";s:1:"1";}', 'yes'),
(163, 'shop_single_image_size', 'a:3:{s:5:"width";s:3:"600";s:6:"height";s:3:"600";s:4:"crop";s:1:"1";}', 'yes'),
(164, 'shop_thumbnail_image_size', 'a:3:{s:5:"width";s:3:"180";s:6:"height";s:3:"180";s:4:"crop";s:1:"1";}', 'yes'),
(165, 'woocommerce_enable_lightbox', 'yes', 'yes'),
(166, 'woocommerce_manage_stock', 'yes', 'yes'),
(167, 'woocommerce_hold_stock_minutes', '60', 'no'),
(168, 'woocommerce_notify_low_stock', 'yes', 'no'),
(169, 'woocommerce_notify_no_stock', 'yes', 'no'),
(170, 'woocommerce_stock_email_recipient', 'jegadeesh10@gmail.com', 'no'),
(171, 'woocommerce_notify_low_stock_amount', '2', 'no'),
(172, 'woocommerce_notify_no_stock_amount', '0', 'no'),
(173, 'woocommerce_hide_out_of_stock_items', 'no', 'yes'),
(174, 'woocommerce_stock_format', '', 'yes'),
(175, 'woocommerce_file_download_method', 'force', 'no'),
(176, 'woocommerce_downloads_require_login', 'no', 'no'),
(177, 'woocommerce_downloads_grant_access_after_payment', 'yes', 'no'),
(178, 'woocommerce_calc_taxes', 'no', 'yes'),
(179, 'woocommerce_prices_include_tax', 'no', 'yes'),
(180, 'woocommerce_tax_based_on', 'shipping', 'yes'),
(181, 'woocommerce_shipping_tax_class', 'title', 'yes'),
(182, 'woocommerce_tax_round_at_subtotal', 'no', 'yes'),
(183, 'woocommerce_tax_classes', 'Reduced Rate\r\nZero Rate', 'yes'),
(184, 'woocommerce_tax_display_shop', 'excl', 'yes'),
(185, 'woocommerce_tax_display_cart', 'excl', 'no'),
(186, 'woocommerce_price_display_suffix', '', 'yes'),
(187, 'woocommerce_tax_total_display', 'itemized', 'no'),
(188, 'woocommerce_enable_coupons', 'yes', 'no'),
(189, 'woocommerce_enable_guest_checkout', 'yes', 'no'),
(190, 'woocommerce_force_ssl_checkout', 'no', 'yes'),
(191, 'woocommerce_unforce_ssl_checkout', 'no', 'yes'),
(192, 'woocommerce_cart_page_id', '5', 'yes'),
(193, 'woocommerce_checkout_page_id', '6', 'yes'),
(194, 'woocommerce_terms_page_id', '', 'no'),
(195, 'woocommerce_checkout_pay_endpoint', 'order-pay', 'yes'),
(196, 'woocommerce_checkout_order_received_endpoint', 'order-received', 'yes'),
(197, 'woocommerce_myaccount_add_payment_method_endpoint', 'add-payment-method', 'yes'),
(198, 'woocommerce_calc_shipping', 'yes', 'yes'),
(199, 'woocommerce_enable_shipping_calc', 'yes', 'no'),
(200, 'woocommerce_shipping_cost_requires_address', 'no', 'no'),
(201, 'woocommerce_shipping_method_format', '', 'no'),
(202, 'woocommerce_ship_to_destination', 'billing', 'no'),
(203, 'woocommerce_ship_to_countries', '', 'yes'),
(204, 'woocommerce_specific_ship_to_countries', '', 'yes'),
(205, 'woocommerce_myaccount_page_id', '7', 'yes'),
(206, 'woocommerce_myaccount_view_order_endpoint', 'view-order', 'yes'),
(207, 'woocommerce_myaccount_edit_account_endpoint', 'edit-account', 'yes'),
(208, 'woocommerce_myaccount_edit_address_endpoint', 'edit-address', 'yes'),
(209, 'woocommerce_myaccount_lost_password_endpoint', 'lost-password', 'yes'),
(210, 'woocommerce_logout_endpoint', 'customer-logout', 'yes'),
(211, 'woocommerce_enable_signup_and_login_from_checkout', 'yes', 'no'),
(212, 'woocommerce_enable_myaccount_registration', 'no', 'no'),
(213, 'woocommerce_enable_checkout_login_reminder', 'yes', 'no'),
(214, 'woocommerce_registration_generate_username', 'yes', 'no'),
(215, 'woocommerce_registration_generate_password', 'no', 'no'),
(216, 'woocommerce_email_from_name', 'xcluse', 'no'),
(217, 'woocommerce_email_from_address', 'jegadeesh10@gmail.com', 'no'),
(218, 'woocommerce_email_header_image', '', 'no'),
(219, 'woocommerce_email_footer_text', 'xcluse - Powered by WooCommerce', 'no'),
(220, 'woocommerce_email_base_color', '#557da1', 'no'),
(221, 'woocommerce_email_background_color', '#f5f5f5', 'no'),
(222, 'woocommerce_email_body_background_color', '#fdfdfd', 'no'),
(223, 'woocommerce_email_text_color', '#505050', 'no'),
(227, 'woocommerce_admin_notices', 'a:1:{i:0;s:13:"theme_support";}', 'yes'),
(231, 'woocommerce_language_pack_version', 'a:2:{i:0;s:5:"2.3.8";i:1;s:5:"en_US";}', 'yes'),
(236, 'woocommerce_meta_box_errors', 'a:0:{}', 'yes'),
(246, 'woocommerce_allow_tracking', 'no', 'yes'),
(255, '_transient_twentyfifteen_categories', '1', 'yes'),
(278, 'current_theme', '', 'yes'),
(279, 'theme_mods_xcluse', 'a:2:{i:0;b:0;s:16:"sidebars_widgets";a:2:{s:4:"time";i:1436090854;s:4:"data";a:2:{s:19:"wp_inactive_widgets";a:2:{i:0;s:26:"woocommerce_price_filter-3";i:1;s:38:"woocommerce_recently_viewed_products-2";}s:15:"sidebar-widgets";a:0:{}}}}', 'yes'),
(280, 'theme_switched', '', 'yes'),
(282, '_transient_product_query-transient-version', '1437717623', 'yes'),
(292, '_transient_product-transient-version', '1437717623', 'yes'),
(324, 'yit_recently_activated', 'a:0:{}', 'yes'),
(325, 'yith_wcwl_frontend_css_colors', 's:1159:"a:10:{s:15:"add_to_wishlist";a:3:{s:10:"background";s:7:"#333333";s:5:"color";s:7:"#ffffff";s:12:"border_color";s:7:"#333333";}s:21:"add_to_wishlist_hover";a:3:{s:10:"background";s:7:"#4f4f4f";s:5:"color";s:7:"#ffffff";s:12:"border_color";s:7:"#4f4f4f";}s:11:"add_to_cart";a:3:{s:10:"background";s:7:"#333333";s:5:"color";s:7:"#ffffff";s:12:"border_color";s:7:"#333333";}s:17:"add_to_cart_hover";a:3:{s:10:"background";s:7:"#4f4f4f";s:5:"color";s:7:"#ffffff";s:12:"border_color";s:7:"#4f4f4f";}s:14:"button_style_1";a:3:{s:10:"background";s:7:"#333333";s:5:"color";s:7:"#ffffff";s:12:"border_color";s:7:"#333333";}s:20:"button_style_1_hover";a:3:{s:10:"background";s:7:"#4f4f4f";s:5:"color";s:7:"#ffffff";s:12:"border_color";s:7:"#4f4f4f";}s:14:"button_style_2";a:3:{s:10:"background";s:7:"#ffffff";s:5:"color";s:7:"#858484";s:12:"border_color";s:7:"#c6c6c6";}s:20:"button_style_2_hover";a:3:{s:10:"background";s:7:"#4f4f4f";s:5:"color";s:7:"#ffffff";s:12:"border_color";s:7:"#4f4f4f";}s:14:"wishlist_table";a:3:{s:10:"background";s:7:"#ffffff";s:5:"color";s:7:"#6d6c6c";s:12:"border_color";s:7:"#ffffff";}s:7:"headers";a:1:{s:10:"background";s:7:"#f4f4f4";}}";', 'yes'),
(326, 'yith_wcwl_enabled', 'yes', 'yes'),
(327, 'yith_wcwl_wishlist_title', 'My wishlist on xcluse', 'yes'),
(328, 'yith_wcwl_wishlist_page_id', '11', 'yes'),
(329, 'yith_wcwl_redirect_cart', 'no', 'yes'),
(330, 'yith_wcwl_remove_after_add_to_cart', 'yes', 'yes'),
(331, 'yith_wcwl_add_to_wishlist_text', 'sfdsffsd', 'yes'),
(332, 'yith_wcwl_browse_wishlist_text', 'Browse Wishlist', 'yes'),
(333, 'yith_wcwl_already_in_wishlist_text', 'product added', 'yes'),
(334, 'yith_wcwl_product_added_text', 'Product added!', 'yes'),
(335, 'yith_wcwl_add_to_cart_text', 'Add to Cart', 'yes'),
(336, 'yith_wcwl_price_show', 'yes', 'yes'),
(337, 'yith_wcwl_add_to_cart_show', 'no', 'yes'),
(338, 'yith_wcwl_stock_show', 'no', 'yes'),
(339, 'yith_wcwl_use_button', 'no', 'yes'),
(340, 'yith_wcwl_custom_css', '<i class="fa fa-heart"></i>', 'yes'),
(341, 'yith_wcwl_frontend_css', 'no', 'yes'),
(342, 'yith_wcwl_rounded_corners', 'yes', 'yes'),
(343, 'yith_wcwl_add_to_wishlist_icon', 'fa-heart', 'yes'),
(344, 'yith_wcwl_add_to_cart_icon', 'fa-shopping-cart', 'yes'),
(345, 'yith_wcwl_share_fb', 'no', 'yes'),
(346, 'yith_wcwl_share_twitter', 'no', 'yes'),
(347, 'yith_wcwl_share_pinterest', 'no', 'yes'),
(348, 'yith_wcwl_share_googleplus', 'no', 'yes'),
(349, 'yith_wcwl_share_email', 'no', 'yes'),
(350, 'yith_wcwl_socials_title', 'My wishlist on xcluse', 'yes'),
(351, 'yith_wcwl_socials_text', '', 'yes'),
(352, 'yith_wcwl_socials_image_url', '', 'yes'),
(353, 'yith-wcwl-page-id', '11', 'yes'),
(354, 'yith_wcwl_version', '2.0.6', 'yes'),
(355, 'yith_wcwl_db_version', '2.0.0', 'yes'),
(356, 'yith_wcwl_general_videobox', 'a:7:{s:11:"plugin_name";s:25:"YITH WooCommerce Wishlist";s:18:"title_first_column";s:30:"Discover the Advanced Features";s:24:"description_first_column";s:90:"Upgrade to the PREMIUM VERSION\r\nof YITH WOOCOMMERCE WISHLIST to benefit from all features!";s:5:"video";a:3:{s:8:"video_id";s:9:"118797844";s:15:"video_image_url";s:112:"http://localhost/jegadeesh/newxcluse/wp-content/plugins/yith-woocommerce-wishlist//assets/images/video-thumb.jpg";s:17:"video_description";s:0:"";}s:19:"title_second_column";s:28:"Get Support and Pro Features";s:25:"description_second_column";s:205:"By purchasing the premium version of the plugin, you will take advantage of the advanced features of the product and you will get one year of free updates and support through our platform available 24h/24.";s:6:"button";a:2:{s:4:"href";s:61:"http://yithemes.com/themes/plugins/yith-woocommerce-wishlist/";s:5:"title";s:28:"Get Support and Pro Features";}}', 'yes'),
(358, 'yith_wcwl_show_dateadded', 'no', 'yes'),
(359, 'yith_wcwl_repeat_remove_button', 'no', 'yes'),
(360, 'yith_wcwl_button_position', 'shortcode', 'yes'),
(374, 'yith_woocompare_is_button', 'link', 'yes'),
(375, 'yith_woocompare_button_text', '', 'yes'),
(376, 'yith_woocompare_compare_button_in_product_page', 'yes', 'yes'),
(377, 'yith_woocompare_compare_button_in_products_list', 'no', 'yes'),
(378, 'yith_woocompare_auto_open', 'yes', 'yes'),
(379, 'yith_woocompare_table_text', 'Compare products', 'yes'),
(380, 'yith_woocompare_fields', 'a:6:{s:5:"image";b:1;s:5:"title";b:1;s:5:"price";b:1;s:11:"description";b:1;s:5:"stock";b:1;s:11:"add-to-cart";b:1;}', 'yes'),
(381, 'yith_woocompare_price_end', 'no', 'yes'),
(382, 'yith_woocompare_add_to_cart_end', 'no', 'yes'),
(383, 'yith_woocompare_image_size', 'a:3:{s:5:"width";s:3:"220";s:6:"height";s:3:"154";s:4:"crop";s:2:"on";}', 'yes'),
(399, 'yith_woocompare_fields_attrs', 'a:6:{i:0;s:5:"image";i:1;s:5:"title";i:2;s:5:"price";i:3;s:11:"description";i:4;s:5:"stock";i:5;s:11:"add-to-cart";}', 'yes'),
(406, 'theme_mods_twentythirteen', 'a:2:{i:0;b:0;s:16:"sidebars_widgets";a:2:{s:4:"time";i:1436523553;s:4:"data";a:3:{s:19:"wp_inactive_widgets";a:1:{i:0;s:26:"woocommerce_price_filter-2";}s:9:"sidebar-1";a:0:{}s:9:"sidebar-2";N;}}}', 'yes'),
(476, 'br_filters_options', 'a:5:{s:19:"no_products_message";s:43:"There are no products meeting your criteria";s:17:"no_products_class";s:0:"";s:18:"products_holder_id";s:11:"ul.products";s:15:"control_sorting";s:1:"1";s:9:"user_func";a:3:{s:13:"before_update";s:0:"";s:9:"on_update";s:0:"";s:12:"after_update";s:0:"";}}', 'yes'),
(481, 'woof_first_init', '1', 'yes'),
(482, 'woof_set_automatically', '1', 'yes'),
(483, 'woof_show_count', '1', 'yes'),
(484, 'woof_show_count_dynamic', '1', 'yes'),
(485, 'woof_autosubmit', '1', 'yes'),
(486, 'woof_hide_dynamic_empty_pos', '0', 'yes'),
(487, 'woof_use_chosen', '0', 'yes'),
(489, 'woof_settings', 'a:16:{s:8:"tax_type";a:6:{s:7:"pa_size";s:8:"checkbox";s:12:"pa_magnifier";s:5:"radio";s:7:"pa_jega";s:5:"radio";s:8:"pa_color";s:5:"radio";s:11:"product_cat";s:8:"checkbox";s:11:"product_tag";s:5:"radio";}s:14:"excluded_terms";a:6:{s:7:"pa_size";s:0:"";s:12:"pa_magnifier";s:0:"";s:7:"pa_jega";s:0:"";s:8:"pa_color";s:0:"";s:11:"product_cat";s:0:"";s:11:"product_tag";s:0:"";}s:16:"tax_block_height";a:6:{s:7:"pa_size";s:1:"0";s:12:"pa_magnifier";s:1:"0";s:7:"pa_jega";s:1:"0";s:8:"pa_color";s:1:"0";s:11:"product_cat";s:1:"0";s:11:"product_tag";s:1:"0";}s:16:"show_title_label";a:6:{s:7:"pa_size";s:1:"0";s:12:"pa_magnifier";s:1:"0";s:7:"pa_jega";s:1:"0";s:8:"pa_color";s:1:"0";s:11:"product_cat";s:1:"0";s:11:"product_tag";s:1:"0";}s:13:"dispay_in_row";a:6:{s:7:"pa_size";s:1:"0";s:12:"pa_magnifier";s:1:"0";s:7:"pa_jega";s:1:"0";s:8:"pa_color";s:1:"0";s:11:"product_cat";s:1:"0";s:11:"product_tag";s:1:"0";}s:16:"custom_tax_label";a:6:{s:7:"pa_size";s:0:"";s:12:"pa_magnifier";s:0:"";s:7:"pa_jega";s:0:"";s:8:"pa_color";s:0:"";s:11:"product_cat";s:0:"";s:11:"product_tag";s:0:"";}s:3:"tax";a:4:{s:7:"pa_size";s:1:"1";s:12:"pa_magnifier";s:1:"1";s:7:"pa_jega";s:1:"1";s:8:"pa_color";s:1:"1";}s:11:"icheck_skin";s:9:"flat_aero";s:12:"overlay_skin";s:7:"default";s:19:"overlay_skin_bg_img";s:0:"";s:18:"plainoverlay_color";s:0:"";s:21:"woof_auto_hide_button";s:1:"0";s:25:"woof_auto_hide_button_img";s:0:"";s:25:"woof_auto_hide_button_txt";s:0:"";s:15:"custom_css_code";s:0:"";s:16:"cache_count_data";s:1:"0";}', 'yes'),
(491, 'widget_woof_widget', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
(492, 'widget_woocommerce_price_filter', 'a:2:{i:2;a:1:{s:5:"title";s:15:"Filter by price";}s:12:"_multiwidget";i:1;}', 'yes'),
(493, 'widget_woocommerce_product_categories', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
(561, 'widget_woocommerce_layered_nav_filters', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
(595, 'theme_mods_storefront', 'a:2:{i:0;b:0;s:16:"sidebars_widgets";a:2:{s:4:"time";i:1433421989;s:4:"data";a:7:{s:19:"wp_inactive_widgets";a:2:{i:0;s:26:"woocommerce_price_filter-3";i:1;s:38:"woocommerce_recently_viewed_products-2";}s:9:"sidebar-1";a:0:{}s:8:"header-1";a:0:{}s:8:"footer-1";a:0:{}s:8:"footer-2";a:0:{}s:8:"footer-3";a:0:{}s:8:"footer-4";a:0:{}}}}', 'yes'),
(597, 'widget_woocommerce_layered_nav', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
(613, 'widget_berocket_aapf_widget', 'a:2:{i:1;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(614, 'widget_calendar', 'a:2:{i:1;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(615, 'widget_nav_menu', 'a:2:{i:1;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(616, 'widget_pages', 'a:2:{i:1;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(618, 'widget_tag_cloud', 'a:2:{i:1;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(620, 'widget_woocommerce_widget_cart', 'a:2:{i:1;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(621, 'widget_woocommerce_products', 'a:2:{i:1;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(622, 'widget_woocommerce_product_search', 'a:2:{i:1;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(623, 'widget_woocommerce_product_tag_cloud', 'a:2:{i:1;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(624, 'widget_woocommerce_recently_viewed_products', 'a:2:{i:1;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(625, 'widget_woocommerce_recent_reviews', 'a:2:{i:1;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(626, 'widget_woocommerce_top_rated_products', 'a:2:{i:1;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(627, 'widget_yith-woocompare-widget', 'a:2:{i:1;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(757, 'wsl_settings_welcome_panel_enabled', '1', 'yes'),
(758, 'wsl_settings_redirect_url', 'http://localhost/jegadeesh/newxcluse', 'yes'),
(759, 'wsl_settings_force_redirect_url', '2', 'yes'),
(760, 'wsl_settings_connect_with_label', 'Connect with:', 'yes'),
(761, 'wsl_settings_users_avatars', '1', 'yes'),
(762, 'wsl_settings_use_popup', '2', 'yes'),
(763, 'wsl_settings_widget_display', '4', 'yes'),
(764, 'wsl_settings_authentication_widget_css', '.wp-social-login-connect-with {}\r\n.wp-social-login-provider-list {}\r\n.wp-social-login-provider-list a {}\r\n.wp-social-login-provider-list img {}\r\n.wsl_connect_with_provider {}', 'yes'),
(765, 'wsl_settings_bouncer_registration_enabled', '1', 'yes'),
(766, 'wsl_settings_bouncer_authentication_enabled', '1', 'yes'),
(767, 'wsl_settings_bouncer_profile_completion_require_email', '2', 'yes'),
(768, 'wsl_settings_bouncer_profile_completion_change_username', '2', 'yes'),
(769, 'wsl_settings_bouncer_new_users_moderation_level', '1', 'yes'),
(770, 'wsl_settings_bouncer_new_users_membership_default_role', 'default', 'yes'),
(771, 'wsl_settings_bouncer_new_users_restrict_domain_enabled', '2', 'yes'),
(772, 'wsl_settings_bouncer_new_users_restrict_domain_text_bounce', '<strong>This website is restricted to invited readers only.</strong><p>It doesn''t look like you have been invited to access this site. If you think this is a mistake, you might want to contact the website owner and request an invitation.<p>', 'yes'),
(773, 'wsl_settings_bouncer_new_users_restrict_email_enabled', '2', 'yes'),
(774, 'wsl_settings_bouncer_new_users_restrict_email_text_bounce', '<strong>This website is restricted to invited readers only.</strong><p>It doesn''t look like you have been invited to access this site. If you think this is a mistake, you might want to contact the website owner and request an invitation.<p>', 'yes'),
(775, 'wsl_settings_bouncer_new_users_restrict_profile_enabled', '2', 'yes'),
(776, 'wsl_settings_bouncer_new_users_restrict_profile_text_bounce', '<strong>This website is restricted to invited readers only.</strong><p>It doesn''t look like you have been invited to access this site. If you think this is a mistake, you might want to contact the website owner and request an invitation.<p>', 'yes'),
(777, 'wsl_settings_contacts_import_facebook', '2', 'yes'),
(778, 'wsl_settings_contacts_import_google', '2', 'yes'),
(779, 'wsl_settings_contacts_import_twitter', '2', 'yes'),
(780, 'wsl_settings_contacts_import_live', '2', 'yes'),
(781, 'wsl_settings_contacts_import_linkedin', '2', 'yes'),
(782, 'wsl_settings_buddypress_enable_mapping', '2', 'yes'),
(783, 'wsl_settings_buddypress_xprofile_map', '', 'yes'),
(784, 'wsl_settings_Facebook_enabled', '1', 'yes'),
(785, 'wsl_settings_Google_enabled', '1', 'yes'),
(786, 'wsl_settings_Twitter_enabled', '1', 'yes'),
(787, 'wsl_components_core_enabled', '1', 'yes'),
(788, 'wsl_components_networks_enabled', '1', 'yes'),
(789, 'wsl_components_login-widget_enabled', '1', 'yes'),
(790, 'wsl_components_bouncer_enabled', '1', 'yes'),
(791, 'wsl_settings_Facebook_app_scope', 'email, public_profile, user_friends', 'yes'),
(792, 'wsl_settings_Google_app_scope', 'profile https://www.googleapis.com/auth/plus.profile.emails.read', 'yes'),
(793, 'wsl_settings_GitHub_app_scope', 'user:email', 'yes'),
(817, 'wsl_settings_social_icon_set', 'wpzoom', 'yes'),
(818, 'wsl_settings_users_notification', '0', 'yes'),
(821, 'woocommerce_permalinks', 'a:5:{s:13:"category_base";s:0:"";s:8:"tag_base";s:0:"";s:14:"attribute_base";s:0:"";s:12:"product_base";s:8:"/product";s:22:"use_verbose_page_rules";b:1;}', 'yes'),
(856, 'theme_mods_newxcluse', 'a:3:{i:0;b:0;s:18:"nav_menu_locations";a:0:{}s:16:"sidebars_widgets";a:2:{s:4:"time";i:1436089868;s:4:"data";a:3:{s:19:"wp_inactive_widgets";a:0:{}s:15:"sidebar-widgets";a:1:{i:0;s:26:"woocommerce_price_filter-3";}s:27:"sidebar-widget-recent-views";a:1:{i:0;s:38:"woocommerce_recently_viewed_products-2";}}}}', 'yes'),
(988, 'widget_yith-woo-ajax-navigation', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
(990, 'widget_yith-woo-ajax-reset-navigation', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
(1148, '_transient_woocommerce_webhook_ids', 'a:0:{}', 'yes'),
(1223, 'pa_magnifier_children', 'a:0:{}', 'yes'),
(1228, 'pa_jega_children', 'a:0:{}', 'yes'),
(1235, 'pa_ramesh_children', 'a:0:{}', 'yes'),
(1291, 'mgop_options', 'a:4:{s:4:"post";a:2:{s:6:"titles";a:1:{s:15:"gallery-on-post";a:2:{s:5:"title";s:15:"Gallery on Post";s:8:"position";s:5:"after";}}s:8:"position";a:1:{i:0;s:5:"after";}}s:4:"page";a:2:{s:6:"titles";a:1:{s:15:"gallery-on-post";a:2:{s:5:"title";s:15:"Gallery on Post";s:8:"position";s:5:"after";}}s:8:"position";a:1:{i:0;s:5:"after";}}s:7:"product";a:3:{s:6:"active";s:7:"product";s:6:"titles";a:1:{s:15:"gallery-on-post";a:2:{s:5:"title";s:15:"Gallery on Post";s:8:"position";s:9:"shortcode";}}s:8:"position";a:1:{i:0;s:9:"shortcode";}}s:9:"validated";s:1:"1";}', 'yes'),
(1294, '_transient_wc_ln_count_3f89880c7277b86ae5c1904df45c3144', 'a:3:{i:0;s:2:"87";i:1;s:2:"88";i:2;s:2:"90";}', 'yes'),
(1371, 'postratings_image', 'stars_crystal', 'yes'),
(1372, 'postratings_max', '5', 'yes'),
(1373, 'postratings_template_vote', '%RATINGS_IMAGES_VOTE% (<strong>%RATINGS_USERS%</strong> votes, average: <strong>%RATINGS_AVERAGE%</strong> out of %RATINGS_MAX%)<br />%RATINGS_TEXT%', 'yes'),
(1374, 'postratings_template_text', '%RATINGS_IMAGES% (<em><strong>%RATINGS_USERS%</strong> votes, <strong>%RATINGS_AVERAGE%</strong>/ %RATINGS_MAX% </em>)', 'yes'),
(1375, 'postratings_template_none', '%RATINGS_IMAGES_VOTE% (No Ratings Yet)<br />%RATINGS_TEXT%', 'yes'),
(1376, 'postratings_logging_method', '3', 'yes'),
(1377, 'postratings_allowtorate', '1', 'yes'),
(1378, 'postratings_ratingstext', 'a:5:{i:0;s:6:"1 Star";i:1;s:7:"2 Stars";i:2;s:7:"3 Stars";i:3;s:7:"4 Stars";i:4;s:7:"5 Stars";}', 'yes'),
(1379, 'postratings_template_highestrated', '<li><a href=\\"%POST_URL%\\" title=\\"%POST_TITLE%\\">%POST_TITLE%</a> %RATINGS_IMAGES% (%RATINGS_AVERAGE% out of %RATINGS_MAX%)</li>', 'yes'),
(1380, 'postratings_ajax_style', 'a:2:{s:7:"loading";i:1;s:6:"fading";i:1;}', 'yes'),
(1381, 'postratings_ratingsvalue', 'a:5:{i:0;i:1;i:1;i:2;i:2;i:3;i:3;i:4;i:4;i:5;}', 'yes'),
(1382, 'postratings_customrating', '0', 'yes'),
(1383, 'postratings_template_permission', '%RATINGS_IMAGES% (<em><strong>%RATINGS_USERS%</strong> votes, average: <strong>%RATINGS_AVERAGE%</strong> out of %RATINGS_MAX%</em>)<br /><em>You need to be a registered member to rate this post.</em>', 'yes'),
(1384, 'postratings_template_mostrated', '<li><a href=\\"%POST_URL%\\"  title=\\"%POST_TITLE%\\">%POST_TITLE%</a> - %RATINGS_USERS% votes</li>', 'yes'),
(1385, 'postratings_options', 'a:1:{s:11:"richsnippet";i:0;}', 'yes'),
(1443, 'nav_menu_options', 'a:2:{i:0;b:0;s:8:"auto_add";a:0:{}}', 'yes'),
(1862, 'woof_try_ajax', '0', 'yes'),
(1863, 'woof_checkboxes_slide', '0', 'yes'),
(1864, 'woof_use_beauty_scroll', '0', 'yes'),
(1865, 'woof_show_title_search', '0', 'yes'),
(1866, 'woof_show_in_stock_only', '0', 'yes'),
(1867, 'woof_show_sales_only', '0', 'yes'),
(1868, 'woof_show_price_search', '0', 'yes'),
(1869, 'woof_filter_btn_txt', '', 'yes'),
(1870, 'woof_reset_btn_txt', '', 'yes'),
(1981, '_transient_wc_ln_count_2a358e31aedf266059735bf0c08f55a6', 'a:2:{i:0;s:2:"86";i:1;s:3:"107";}', 'yes'),
(2097, 'yith_wcas_general_videobox', 'a:7:{s:11:"plugin_name";s:28:"YITH WooCommerce Ajax Search";s:18:"title_first_column";s:30:"Discover the Advanced Features";s:24:"description_first_column";s:93:"Upgrade to the PREMIUM VERSION\r\nof YITH WOOCOMMERCE AJAX SEARCH to benefit from all features!";s:5:"video";a:3:{s:8:"video_id";s:9:"118917627";s:15:"video_image_url";s:122:"http://localhost/jegadeesh/newxcluse/wp-content/plugins/yith-woocommerce-ajax-search/assets/images/ajax-search-premium.jpg";s:17:"video_description";s:28:"YITH WooCommerce Ajax Search";}s:19:"title_second_column";s:28:"Get Support and Pro Features";s:25:"description_second_column";s:205:"By purchasing the premium version of the plugin, you will take advantage of the advanced features of the product and you will get one year of free updates and support through our platform available 24h/24.";s:6:"button";a:2:{s:4:"href";s:64:"http://yithemes.com/themes/plugins/yith-woocommerce-ajax-search/";s:5:"title";s:28:"Get Support and Pro Features";}}', 'yes'),
(2098, 'yith_wcas_search_input_label', 'Search for products', 'yes'),
(2099, 'yith_wcas_search_submit_label', 'Search', 'yes'),
(2100, 'yith_wcas_min_chars', '1', 'yes'),
(2101, 'yith_wcas_posts_per_page', '3', 'yes'),
(2384, '_transient_shipping-transient-version', '1433928394', 'yes'),
(2439, 'yith_wcmg_slider_direction', 'left', 'yes'),
(2440, 'yith_wcmg_enable_plugin', 'yes', 'yes'),
(2441, 'yith_wcmg_enable_mobile', 'yes', 'yes'),
(2442, 'yith_wcmg_force_sizes', 'yes', 'yes'),
(2443, 'yith_wcmg_zoom_width', 'auto', 'yes'),
(2444, 'yith_wcmg_zoom_height', 'auto', 'yes'),
(2445, 'woocommerce_magnifier_image', 'a:3:{s:5:"width";s:3:"600";s:6:"height";s:3:"600";s:4:"crop";s:2:"on";}', 'yes'),
(2446, 'yith_wcmg_zoom_position', 'right', 'yes'),
(2447, 'yith_wcmg_zoom_mobile_position', 'inside', 'yes'),
(2448, 'yith_wcmg_loading_label', 'Loading...', 'yes'),
(2449, 'yith_wcmg_lens_opacity', '0.5', 'yes'),
(2450, 'yith_wcmg_softfocus', 'yes', 'yes'),
(2451, 'yith_wcmg_enableslider', 'yes', 'yes'),
(2452, 'yith_wcmg_slider_responsive', 'yes', 'yes'),
(2453, 'yith_wcmg_slider_items', '3', 'yes'),
(2454, 'yith_wcmg_slider_circular', 'yes', 'yes'),
(2455, 'yith_wcmg_slider_infinite', 'yes', 'yes'),
(2897, 'pa_size_children', 'a:0:{}', 'yes'),
(2898, 'pa_color_children', 'a:0:{}', 'yes'),
(2899, 'pa_brand_children', 'a:0:{}', 'yes'),
(3031, 'category_children', 'a:0:{}', 'yes'),
(3079, '_transient_timeout_wc_max_related_1601435301663', '1438164861', 'no'),
(3080, '_transient_wc_max_related_1601435301663', '4', 'no'),
(3139, '_transient_timeout_wc_max_related_1561435301663', '1438321366', 'no'),
(3140, '_transient_wc_max_related_1561435301663', '4', 'no'),
(3150, '_transient_timeout_wc_max_related_1591435301663', '1438337840', 'no'),
(3151, '_transient_wc_max_related_1591435301663', '3', 'no'),
(3154, '_transient_timeout_wc_max_related_1571435301663', '1438337878', 'no'),
(3155, '_transient_wc_max_related_1571435301663', '0', 'no'),
(3163, '_transient_timeout_wc_max_related_1601435753967', '1438345969', 'no'),
(3164, '_transient_wc_max_related_1601435753967', '3', 'no'),
(3165, '_transient_timeout_wc_max_related_1601435754252', '1438346255', 'no'),
(3166, '_transient_wc_max_related_1601435754252', '3', 'no'),
(3249, '_transient_timeout_wc_max_related_1591435925791', '1438521021', 'no'),
(3250, '_transient_wc_max_related_1591435925791', '3', 'no'),
(3279, 'reimagined_admin_theme_option', 'a:15:{s:9:"dash_icon";s:9:"dashicons";s:10:"admin_back";s:0:"";s:11:"theme_color";s:10:"Reimagined";s:17:"login_screen_logo";s:78:"http://xcluse.com/demo/test/wp-content/themes/newxcluse/images/logo-xcluse.png";s:10:"login_back";s:84:"http://localhost/jegadeesh/testxcluse/wp-content/themes/newxcluse/images/slider3.jpg";s:14:"admin_bar_logo";s:78:"http://xcluse.com/demo/test/wp-content/themes/newxcluse/images/logo-xcluse.png";s:20:"admin_bar_name_links";s:78:"http://xcluse.com/demo/test/wp-content/themes/newxcluse/images/logo-xcluse.png";s:8:"bar_name";s:0:"";s:22:"admin_bar_updates_hide";s:2:"on";s:23:"admin_bar_comments_hide";s:2:"on";s:18:"admin_bar_new_hide";s:2:"on";s:17:"admin_footer_text";s:0:"";s:22:"admin_footer_text_hide";s:2:"on";s:20:"admin_footer_version";s:0:"";s:25:"admin_footer_version_hide";s:2:"on";}', 'yes'),
(3297, 'widget_ratings-widget', 'a:2:{i:1;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(3298, 'widget_yith_woocommerce_ajax_search', 'a:2:{i:1;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(3304, 'woocommerce_db_version', '2.3.8', 'yes'),
(3305, 'woocommerce_version', '2.3.8', 'yes'),
(3309, '_transient_wc_attribute_taxonomies', 'a:3:{i:0;O:8:"stdClass":6:{s:12:"attribute_id";s:2:"14";s:14:"attribute_name";s:4:"size";s:15:"attribute_label";s:4:"size";s:14:"attribute_type";s:6:"select";s:17:"attribute_orderby";s:10:"menu_order";s:16:"attribute_public";s:1:"0";}i:1;O:8:"stdClass":6:{s:12:"attribute_id";s:2:"15";s:14:"attribute_name";s:5:"color";s:15:"attribute_label";s:5:"color";s:14:"attribute_type";s:6:"select";s:17:"attribute_orderby";s:10:"menu_order";s:16:"attribute_public";s:1:"0";}i:2;O:8:"stdClass":6:{s:12:"attribute_id";s:2:"16";s:14:"attribute_name";s:5:"brand";s:15:"attribute_label";s:5:"brand";s:14:"attribute_type";s:6:"select";s:17:"attribute_orderby";s:10:"menu_order";s:16:"attribute_public";s:1:"0";}}', 'yes'),
(3318, 'theme_mods_twentyfifteen', 'a:1:{s:16:"sidebars_widgets";a:2:{s:4:"time";i:1436091050;s:4:"data";a:2:{s:19:"wp_inactive_widgets";a:2:{i:0;s:26:"woocommerce_price_filter-3";i:1;s:38:"woocommerce_recently_viewed_products-2";}s:9:"sidebar-1";a:0:{}}}}', 'yes'),
(3319, 'theme_mods_testxcluse', 'a:2:{i:0;b:0;s:18:"nav_menu_locations";a:0:{}}', 'yes'),
(3321, 'theme_mods_twentyfourteen', 'a:2:{i:0;b:0;s:16:"sidebars_widgets";a:2:{s:4:"time";i:1437833430;s:4:"data";a:4:{s:19:"wp_inactive_widgets";a:1:{i:0;s:26:"woocommerce_price_filter-2";}s:9:"sidebar-1";a:0:{}s:9:"sidebar-2";N;s:9:"sidebar-3";N;}}}', 'yes'),
(3372, '_transient_timeout_wc_max_related_1591436162334', '1438763526', 'no'),
(3373, '_transient_wc_max_related_1591436162334', '3', 'no'),
(3374, '_transient_timeout_wc_max_related_1601436162334', '1438763527', 'no'),
(3375, '_transient_wc_max_related_1601436162334', '3', 'no'),
(3377, '_transient_timeout_wc_max_related_1561436162334', '1438764367', 'no'),
(3378, '_transient_wc_max_related_1561436162334', '3', 'no'),
(3444, '_transient_timeout_wc_max_related_1821436162334', '1439109492', 'no'),
(3445, '_transient_wc_max_related_1821436162334', '2', 'no'),
(3486, '_transient_woocommerce_cache_excluded_uris', 'a:6:{i:0;s:3:"p=5";i:1;s:5:"/cart";i:2;s:3:"p=6";i:3;s:9:"/checkout";i:4;s:3:"p=7";i:5;s:11:"/my-account";}', 'yes'),
(3535, '_transient_timeout_wc_max_related_1821436792159', '1439384645', 'no'),
(3536, '_transient_wc_max_related_1821436792159', '2', 'no'),
(3537, '_transient_timeout_wc_max_related_1791436792159', '1439384650', 'no'),
(3538, '_transient_wc_max_related_1791436792159', '2', 'no'),
(3539, '_transient_timeout_wc_max_related_1561436792159', '1439384654', 'no'),
(3540, '_transient_wc_max_related_1561436792159', '3', 'no'),
(3543, '_transient_timeout_wc_max_related_1581436792159', '1439384691', 'no'),
(3544, '_transient_wc_max_related_1581436792159', '3', 'no'),
(3545, '_transient_timeout_wc_max_related_1591436792159', '1439384692', 'no'),
(3546, '_transient_wc_max_related_1591436792159', '3', 'no'),
(3547, '_transient_timeout_wc_max_related_1601436792159', '1439385341', 'no'),
(3548, '_transient_wc_max_related_1601436792159', '3', 'no'),
(3555, '_transient_timeout_wc_max_related_1901436857036', '1439449296', 'no'),
(3556, '_transient_wc_max_related_1901436857036', '4', 'no'),
(3566, '_transient_timeout_wc_max_related_1821436857355', '1439455586', 'no'),
(3567, '_transient_wc_max_related_1821436857355', '2', 'no'),
(3579, '_transient_timeout_wc_max_related_1911436857355', '1439468833', 'no'),
(3580, '_transient_wc_max_related_1911436857355', '5', 'no'),
(3620, '_transient_timeout_geoip_49.207.190.221', '1437714521', 'no'),
(3621, '_transient_geoip_49.207.190.221', 'IN', 'no'),
(3623, '37', 's:68:"a:2:{s:4:"size";a:1:{i:0;i:30;}s:5:"brand";a:2:{i:0;i:46;i:1;i:47;}}";', 'yes'),
(3644, '38', 's:104:"a:3:{s:4:"size";a:1:{i:0;i:30;}s:5:"color";a:1:{i:0;i:42;}s:5:"brand";a:3:{i:0;i:46;i:1;i:47;i:2;i:49;}}";', 'yes'),
(3645, '40', 's:68:"a:2:{s:4:"size";a:1:{i:0;i:30;}s:5:"brand";a:2:{i:0;i:46;i:1;i:47;}}";', 'yes'),
(3646, '39', 's:68:"a:2:{s:4:"size";a:1:{i:0;i:30;}s:5:"brand";a:2:{i:0;i:46;i:1;i:47;}}";', 'yes'),
(3647, '_site_transient_timeout_browser_bfa58c308f5ca3be02504bfe8661769b', '1437735659', 'yes'),
(3648, '_site_transient_browser_bfa58c308f5ca3be02504bfe8661769b', 'a:9:{s:8:"platform";s:7:"Windows";s:4:"name";s:7:"Firefox";s:7:"version";s:4:"39.0";s:10:"update_url";s:23:"http://www.firefox.com/";s:7:"img_src";s:50:"http://s.wordpress.org/images/browsers/firefox.png";s:11:"img_src_ssl";s:49:"https://wordpress.org/images/browsers/firefox.png";s:15:"current_version";s:2:"16";s:7:"upgrade";b:0;s:8:"insecure";b:0;}', 'yes'),
(3665, '_transient_timeout_wc_max_related_1601437135403', '1439729409', 'no'),
(3666, '_transient_wc_max_related_1601437135403', '5', 'no'),
(3667, '_transient_timeout_wc_max_related_1911437135403', '1439729690', 'no'),
(3668, '_transient_wc_max_related_1911437135403', '5', 'no'),
(3669, '_transient_timeout_wc_max_related_1581437135403', '1439729692', 'no'),
(3670, '_transient_wc_max_related_1581437135403', '5', 'no'),
(3671, '_transient_timeout_wc_max_related_1901437135403', '1439729694', 'no'),
(3672, '_transient_wc_max_related_1901437135403', '5', 'no'),
(3673, '_transient_timeout_wc_max_related_1591437135403', '1439729695', 'no'),
(3674, '_transient_wc_max_related_1591437135403', '5', 'no'),
(3681, 'new_excluse', 's:104:"a:3:{s:4:"size";a:1:{i:0;i:30;}s:5:"color";a:1:{i:0;i:42;}s:5:"brand";a:3:{i:0;i:46;i:1;i:47;i:2;i:49;}}";', 'yes'),
(3682, 'sale_xcluse', 's:104:"a:3:{s:4:"size";a:1:{i:0;i:30;}s:5:"color";a:1:{i:0;i:42;}s:5:"brand";a:3:{i:0;i:46;i:1;i:47;i:2;i:49;}}";', 'yes'),
(3684, '_transient_timeout_wc_max_related_1821437135403', '1439966214', 'no'),
(3685, '_transient_wc_max_related_1821437135403', '2', 'no'),
(3693, '_transient_timeout_wc_max_related_1561437135403', '1439972760', 'no'),
(3694, '_transient_wc_max_related_1561437135403', '5', 'no'),
(3719, '_transient_timeout_wc_max_related_1591437643507', '1440235765', 'no'),
(3720, '_transient_wc_max_related_1591437643507', '5', 'no'),
(3721, '_transient_timeout_wc_max_related_1561437643507', '1440235836', 'no'),
(3722, '_transient_wc_max_related_1561437643507', '5', 'no'),
(3727, '_transient_timeout_wc_max_related_1591437645039', '1440237732', 'no'),
(3728, '_transient_wc_max_related_1591437645039', '5', 'no'),
(3737, '_transient_timeout_wc_max_related_1591437646758', '1440239062', 'no'),
(3738, '_transient_wc_max_related_1591437646758', '5', 'no'),
(3739, '_transient_timeout_wc_max_related_1561437646758', '1440239230', 'no'),
(3740, '_transient_wc_max_related_1561437646758', '5', 'no'),
(3743, '_transient_timeout_wc_max_related_1591437647802', '1440239805', 'no'),
(3744, '_transient_wc_max_related_1591437647802', '5', 'no'),
(3746, '_transient_timeout_wc_max_related_1561437647802', '1440241468', 'no'),
(3747, '_transient_wc_max_related_1561437647802', '5', 'no'),
(3748, '_transient_timeout_wc_max_related_1571437647802', '1440241470', 'no'),
(3749, '_transient_wc_max_related_1571437647802', '2', 'no');
INSERT INTO `wp_options` (`option_id`, `option_name`, `option_value`, `autoload`) VALUES
(3754, '_site_transient_update_core', 'O:8:"stdClass":4:{s:7:"updates";a:1:{i:0;O:8:"stdClass":10:{s:8:"response";s:6:"latest";s:8:"download";s:59:"https://downloads.wordpress.org/release/wordpress-4.2.3.zip";s:6:"locale";s:5:"en_US";s:8:"packages";O:8:"stdClass":5:{s:4:"full";s:59:"https://downloads.wordpress.org/release/wordpress-4.2.3.zip";s:10:"no_content";s:70:"https://downloads.wordpress.org/release/wordpress-4.2.3-no-content.zip";s:11:"new_bundled";s:71:"https://downloads.wordpress.org/release/wordpress-4.2.3-new-bundled.zip";s:7:"partial";b:0;s:8:"rollback";b:0;}s:7:"current";s:5:"4.2.3";s:7:"version";s:5:"4.2.3";s:11:"php_version";s:5:"5.2.4";s:13:"mysql_version";s:3:"5.0";s:11:"new_bundled";s:3:"4.1";s:15:"partial_version";s:0:"";}}s:12:"last_checked";i:1437833417;s:15:"version_checked";s:5:"4.2.3";s:12:"translations";a:0:{}}', 'yes'),
(3757, 'rewrite_rules', 'a:165:{s:27:".?.+?/attachment/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:37:".?.+?/attachment/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:57:".?.+?/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:52:".?.+?/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:52:".?.+?/attachment/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:20:"(.?.+?)/trackback/?$";s:35:"index.php?pagename=$matches[1]&tb=1";s:40:"(.?.+?)/feed/(feed|rdf|rss|rss2|atom)/?$";s:47:"index.php?pagename=$matches[1]&feed=$matches[2]";s:35:"(.?.+?)/(feed|rdf|rss|rss2|atom)/?$";s:47:"index.php?pagename=$matches[1]&feed=$matches[2]";s:28:"(.?.+?)/page/?([0-9]{1,})/?$";s:48:"index.php?pagename=$matches[1]&paged=$matches[2]";s:35:"(.?.+?)/comment-page-([0-9]{1,})/?$";s:48:"index.php?pagename=$matches[1]&cpage=$matches[2]";s:25:"(.?.+?)/wc-api(/(.*))?/?$";s:49:"index.php?pagename=$matches[1]&wc-api=$matches[3]";s:28:"(.?.+?)/order-pay(/(.*))?/?$";s:52:"index.php?pagename=$matches[1]&order-pay=$matches[3]";s:33:"(.?.+?)/order-received(/(.*))?/?$";s:57:"index.php?pagename=$matches[1]&order-received=$matches[3]";s:29:"(.?.+?)/view-order(/(.*))?/?$";s:53:"index.php?pagename=$matches[1]&view-order=$matches[3]";s:31:"(.?.+?)/edit-account(/(.*))?/?$";s:55:"index.php?pagename=$matches[1]&edit-account=$matches[3]";s:31:"(.?.+?)/edit-address(/(.*))?/?$";s:55:"index.php?pagename=$matches[1]&edit-address=$matches[3]";s:32:"(.?.+?)/lost-password(/(.*))?/?$";s:56:"index.php?pagename=$matches[1]&lost-password=$matches[3]";s:34:"(.?.+?)/customer-logout(/(.*))?/?$";s:58:"index.php?pagename=$matches[1]&customer-logout=$matches[3]";s:37:"(.?.+?)/add-payment-method(/(.*))?/?$";s:61:"index.php?pagename=$matches[1]&add-payment-method=$matches[3]";s:31:".?.+?/([^/]+)/wc-api(/(.*))?/?$";s:51:"index.php?attachment=$matches[1]&wc-api=$matches[3]";s:42:".?.+?/attachment/([^/]+)/wc-api(/(.*))?/?$";s:51:"index.php?attachment=$matches[1]&wc-api=$matches[3]";s:20:"(.?.+?)(/[0-9]+)?/?$";s:47:"index.php?pagename=$matches[1]&page=$matches[2]";s:22:"^wc-api/v([1-2]{1})/?$";s:51:"index.php?wc-api-version=$matches[1]&wc-api-route=/";s:24:"^wc-api/v([1-2]{1})(.*)?";s:61:"index.php?wc-api-version=$matches[1]&wc-api-route=$matches[2]";s:13:"products-2/?$";s:27:"index.php?post_type=product";s:43:"products-2/feed/(feed|rdf|rss|rss2|atom)/?$";s:44:"index.php?post_type=product&feed=$matches[1]";s:38:"products-2/(feed|rdf|rss|rss2|atom)/?$";s:44:"index.php?post_type=product&feed=$matches[1]";s:30:"products-2/page/([0-9]{1,})/?$";s:45:"index.php?post_type=product&paged=$matches[1]";s:35:"product/[^/]+/attachment/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:45:"product/[^/]+/attachment/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:65:"product/[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:60:"product/[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:60:"product/[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:28:"product/([^/]+)/trackback/?$";s:34:"index.php?product=$matches[1]&tb=1";s:48:"product/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:46:"index.php?product=$matches[1]&feed=$matches[2]";s:43:"product/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:46:"index.php?product=$matches[1]&feed=$matches[2]";s:36:"product/([^/]+)/page/?([0-9]{1,})/?$";s:47:"index.php?product=$matches[1]&paged=$matches[2]";s:43:"product/([^/]+)/comment-page-([0-9]{1,})/?$";s:47:"index.php?product=$matches[1]&cpage=$matches[2]";s:33:"product/([^/]+)/wc-api(/(.*))?/?$";s:48:"index.php?product=$matches[1]&wc-api=$matches[3]";s:39:"product/[^/]+/([^/]+)/wc-api(/(.*))?/?$";s:51:"index.php?attachment=$matches[1]&wc-api=$matches[3]";s:50:"product/[^/]+/attachment/([^/]+)/wc-api(/(.*))?/?$";s:51:"index.php?attachment=$matches[1]&wc-api=$matches[3]";s:28:"product/([^/]+)(/[0-9]+)?/?$";s:46:"index.php?product=$matches[1]&page=$matches[2]";s:24:"product/[^/]+/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:34:"product/[^/]+/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:54:"product/[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:49:"product/[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:49:"product/[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:47:"category/(.+?)/feed/(feed|rdf|rss|rss2|atom)/?$";s:52:"index.php?category_name=$matches[1]&feed=$matches[2]";s:42:"category/(.+?)/(feed|rdf|rss|rss2|atom)/?$";s:52:"index.php?category_name=$matches[1]&feed=$matches[2]";s:35:"category/(.+?)/page/?([0-9]{1,})/?$";s:53:"index.php?category_name=$matches[1]&paged=$matches[2]";s:32:"category/(.+?)/wc-api(/(.*))?/?$";s:54:"index.php?category_name=$matches[1]&wc-api=$matches[3]";s:17:"category/(.+?)/?$";s:35:"index.php?category_name=$matches[1]";s:44:"tag/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:42:"index.php?tag=$matches[1]&feed=$matches[2]";s:39:"tag/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:42:"index.php?tag=$matches[1]&feed=$matches[2]";s:32:"tag/([^/]+)/page/?([0-9]{1,})/?$";s:43:"index.php?tag=$matches[1]&paged=$matches[2]";s:29:"tag/([^/]+)/wc-api(/(.*))?/?$";s:44:"index.php?tag=$matches[1]&wc-api=$matches[3]";s:14:"tag/([^/]+)/?$";s:25:"index.php?tag=$matches[1]";s:45:"type/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:50:"index.php?post_format=$matches[1]&feed=$matches[2]";s:40:"type/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:50:"index.php?post_format=$matches[1]&feed=$matches[2]";s:33:"type/([^/]+)/page/?([0-9]{1,})/?$";s:51:"index.php?post_format=$matches[1]&paged=$matches[2]";s:15:"type/([^/]+)/?$";s:33:"index.php?post_format=$matches[1]";s:55:"product-category/(.+?)/feed/(feed|rdf|rss|rss2|atom)/?$";s:50:"index.php?product_cat=$matches[1]&feed=$matches[2]";s:50:"product-category/(.+?)/(feed|rdf|rss|rss2|atom)/?$";s:50:"index.php?product_cat=$matches[1]&feed=$matches[2]";s:43:"product-category/(.+?)/page/?([0-9]{1,})/?$";s:51:"index.php?product_cat=$matches[1]&paged=$matches[2]";s:25:"product-category/(.+?)/?$";s:33:"index.php?product_cat=$matches[1]";s:52:"product-tag/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:50:"index.php?product_tag=$matches[1]&feed=$matches[2]";s:47:"product-tag/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:50:"index.php?product_tag=$matches[1]&feed=$matches[2]";s:40:"product-tag/([^/]+)/page/?([0-9]{1,})/?$";s:51:"index.php?product_tag=$matches[1]&paged=$matches[2]";s:22:"product-tag/([^/]+)/?$";s:33:"index.php?product_tag=$matches[1]";s:45:"product_variation/[^/]+/attachment/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:55:"product_variation/[^/]+/attachment/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:75:"product_variation/[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:70:"product_variation/[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:70:"product_variation/[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:38:"product_variation/([^/]+)/trackback/?$";s:44:"index.php?product_variation=$matches[1]&tb=1";s:46:"product_variation/([^/]+)/page/?([0-9]{1,})/?$";s:57:"index.php?product_variation=$matches[1]&paged=$matches[2]";s:53:"product_variation/([^/]+)/comment-page-([0-9]{1,})/?$";s:57:"index.php?product_variation=$matches[1]&cpage=$matches[2]";s:43:"product_variation/([^/]+)/wc-api(/(.*))?/?$";s:58:"index.php?product_variation=$matches[1]&wc-api=$matches[3]";s:49:"product_variation/[^/]+/([^/]+)/wc-api(/(.*))?/?$";s:51:"index.php?attachment=$matches[1]&wc-api=$matches[3]";s:60:"product_variation/[^/]+/attachment/([^/]+)/wc-api(/(.*))?/?$";s:51:"index.php?attachment=$matches[1]&wc-api=$matches[3]";s:38:"product_variation/([^/]+)(/[0-9]+)?/?$";s:56:"index.php?product_variation=$matches[1]&page=$matches[2]";s:34:"product_variation/[^/]+/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:44:"product_variation/[^/]+/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:64:"product_variation/[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:59:"product_variation/[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:59:"product_variation/[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:45:"shop_order_refund/[^/]+/attachment/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:55:"shop_order_refund/[^/]+/attachment/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:75:"shop_order_refund/[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:70:"shop_order_refund/[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:70:"shop_order_refund/[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:38:"shop_order_refund/([^/]+)/trackback/?$";s:44:"index.php?shop_order_refund=$matches[1]&tb=1";s:46:"shop_order_refund/([^/]+)/page/?([0-9]{1,})/?$";s:57:"index.php?shop_order_refund=$matches[1]&paged=$matches[2]";s:53:"shop_order_refund/([^/]+)/comment-page-([0-9]{1,})/?$";s:57:"index.php?shop_order_refund=$matches[1]&cpage=$matches[2]";s:43:"shop_order_refund/([^/]+)/wc-api(/(.*))?/?$";s:58:"index.php?shop_order_refund=$matches[1]&wc-api=$matches[3]";s:49:"shop_order_refund/[^/]+/([^/]+)/wc-api(/(.*))?/?$";s:51:"index.php?attachment=$matches[1]&wc-api=$matches[3]";s:60:"shop_order_refund/[^/]+/attachment/([^/]+)/wc-api(/(.*))?/?$";s:51:"index.php?attachment=$matches[1]&wc-api=$matches[3]";s:38:"shop_order_refund/([^/]+)(/[0-9]+)?/?$";s:56:"index.php?shop_order_refund=$matches[1]&page=$matches[2]";s:34:"shop_order_refund/[^/]+/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:44:"shop_order_refund/[^/]+/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:64:"shop_order_refund/[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:59:"shop_order_refund/[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:59:"shop_order_refund/[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:48:".*wp-(atom|rdf|rss|rss2|feed|commentsrss2)\\.php$";s:18:"index.php?feed=old";s:20:".*wp-app\\.php(/.*)?$";s:19:"index.php?error=403";s:18:".*wp-register.php$";s:23:"index.php?register=true";s:32:"feed/(feed|rdf|rss|rss2|atom)/?$";s:27:"index.php?&feed=$matches[1]";s:27:"(feed|rdf|rss|rss2|atom)/?$";s:27:"index.php?&feed=$matches[1]";s:20:"page/?([0-9]{1,})/?$";s:28:"index.php?&paged=$matches[1]";s:17:"wc-api(/(.*))?/?$";s:29:"index.php?&wc-api=$matches[2]";s:20:"order-pay(/(.*))?/?$";s:32:"index.php?&order-pay=$matches[2]";s:25:"order-received(/(.*))?/?$";s:37:"index.php?&order-received=$matches[2]";s:21:"view-order(/(.*))?/?$";s:33:"index.php?&view-order=$matches[2]";s:23:"edit-account(/(.*))?/?$";s:35:"index.php?&edit-account=$matches[2]";s:23:"edit-address(/(.*))?/?$";s:35:"index.php?&edit-address=$matches[2]";s:24:"lost-password(/(.*))?/?$";s:36:"index.php?&lost-password=$matches[2]";s:26:"customer-logout(/(.*))?/?$";s:38:"index.php?&customer-logout=$matches[2]";s:29:"add-payment-method(/(.*))?/?$";s:41:"index.php?&add-payment-method=$matches[2]";s:41:"comments/feed/(feed|rdf|rss|rss2|atom)/?$";s:42:"index.php?&feed=$matches[1]&withcomments=1";s:36:"comments/(feed|rdf|rss|rss2|atom)/?$";s:42:"index.php?&feed=$matches[1]&withcomments=1";s:26:"comments/wc-api(/(.*))?/?$";s:29:"index.php?&wc-api=$matches[2]";s:44:"search/(.+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:40:"index.php?s=$matches[1]&feed=$matches[2]";s:39:"search/(.+)/(feed|rdf|rss|rss2|atom)/?$";s:40:"index.php?s=$matches[1]&feed=$matches[2]";s:32:"search/(.+)/page/?([0-9]{1,})/?$";s:41:"index.php?s=$matches[1]&paged=$matches[2]";s:29:"search/(.+)/wc-api(/(.*))?/?$";s:42:"index.php?s=$matches[1]&wc-api=$matches[3]";s:14:"search/(.+)/?$";s:23:"index.php?s=$matches[1]";s:47:"author/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:50:"index.php?author_name=$matches[1]&feed=$matches[2]";s:42:"author/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:50:"index.php?author_name=$matches[1]&feed=$matches[2]";s:35:"author/([^/]+)/page/?([0-9]{1,})/?$";s:51:"index.php?author_name=$matches[1]&paged=$matches[2]";s:32:"author/([^/]+)/wc-api(/(.*))?/?$";s:52:"index.php?author_name=$matches[1]&wc-api=$matches[3]";s:17:"author/([^/]+)/?$";s:33:"index.php?author_name=$matches[1]";s:69:"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/feed/(feed|rdf|rss|rss2|atom)/?$";s:80:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&feed=$matches[4]";s:64:"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/(feed|rdf|rss|rss2|atom)/?$";s:80:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&feed=$matches[4]";s:57:"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/page/?([0-9]{1,})/?$";s:81:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&paged=$matches[4]";s:54:"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/wc-api(/(.*))?/?$";s:82:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&wc-api=$matches[5]";s:39:"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/?$";s:63:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]";s:56:"([0-9]{4})/([0-9]{1,2})/feed/(feed|rdf|rss|rss2|atom)/?$";s:64:"index.php?year=$matches[1]&monthnum=$matches[2]&feed=$matches[3]";s:51:"([0-9]{4})/([0-9]{1,2})/(feed|rdf|rss|rss2|atom)/?$";s:64:"index.php?year=$matches[1]&monthnum=$matches[2]&feed=$matches[3]";s:44:"([0-9]{4})/([0-9]{1,2})/page/?([0-9]{1,})/?$";s:65:"index.php?year=$matches[1]&monthnum=$matches[2]&paged=$matches[3]";s:41:"([0-9]{4})/([0-9]{1,2})/wc-api(/(.*))?/?$";s:66:"index.php?year=$matches[1]&monthnum=$matches[2]&wc-api=$matches[4]";s:26:"([0-9]{4})/([0-9]{1,2})/?$";s:47:"index.php?year=$matches[1]&monthnum=$matches[2]";s:43:"([0-9]{4})/feed/(feed|rdf|rss|rss2|atom)/?$";s:43:"index.php?year=$matches[1]&feed=$matches[2]";s:38:"([0-9]{4})/(feed|rdf|rss|rss2|atom)/?$";s:43:"index.php?year=$matches[1]&feed=$matches[2]";s:31:"([0-9]{4})/page/?([0-9]{1,})/?$";s:44:"index.php?year=$matches[1]&paged=$matches[2]";s:28:"([0-9]{4})/wc-api(/(.*))?/?$";s:45:"index.php?year=$matches[1]&wc-api=$matches[3]";s:13:"([0-9]{4})/?$";s:26:"index.php?year=$matches[1]";s:27:"[^/]+/attachment/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:37:"[^/]+/attachment/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:57:"[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:52:"[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:52:"[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:20:"([^/]+)/trackback/?$";s:31:"index.php?name=$matches[1]&tb=1";s:40:"([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:43:"index.php?name=$matches[1]&feed=$matches[2]";s:35:"([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:43:"index.php?name=$matches[1]&feed=$matches[2]";s:28:"([^/]+)/page/?([0-9]{1,})/?$";s:44:"index.php?name=$matches[1]&paged=$matches[2]";s:35:"([^/]+)/comment-page-([0-9]{1,})/?$";s:44:"index.php?name=$matches[1]&cpage=$matches[2]";s:25:"([^/]+)/wc-api(/(.*))?/?$";s:45:"index.php?name=$matches[1]&wc-api=$matches[3]";s:31:"[^/]+/([^/]+)/wc-api(/(.*))?/?$";s:51:"index.php?attachment=$matches[1]&wc-api=$matches[3]";s:42:"[^/]+/attachment/([^/]+)/wc-api(/(.*))?/?$";s:51:"index.php?attachment=$matches[1]&wc-api=$matches[3]";s:20:"([^/]+)(/[0-9]+)?/?$";s:43:"index.php?name=$matches[1]&page=$matches[2]";s:16:"[^/]+/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:26:"[^/]+/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:46:"[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:41:"[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:41:"[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";}', 'yes'),
(3758, 'can_compress_scripts', '1', 'yes'),
(3771, '_transient_timeout_wc_max_related_1561437714419', '1440306423', 'no'),
(3772, '_transient_wc_max_related_1561437714419', '5', 'no'),
(3773, '_transient_timeout_geoip_::1', '1438319416', 'no'),
(3774, '_transient_geoip_::1', '', 'no'),
(3775, '_transient_timeout_external_ip_address_::1', '1438319417', 'no'),
(3776, '_transient_external_ip_address_::1', '49.207.190.201', 'no'),
(3777, '_transient_timeout_geoip_49.207.190.201', '1438319417', 'no'),
(3778, '_transient_geoip_49.207.190.201', 'IN', 'no'),
(3781, '_transient_timeout_wc_max_related_1561437714492', '1440307399', 'no'),
(3782, '_transient_wc_max_related_1561437714492', '5', 'no'),
(3785, 'product_cat_children', 'a:4:{i:40;a:1:{i:0;i:37;}i:37;a:1:{i:0;i:39;}i:38;a:1:{i:0;i:40;}i:58;a:1:{i:0;i:59;}}', 'yes'),
(3788, '_transient_timeout_wc_max_related_1561437717623', '1440309629', 'no'),
(3789, '_transient_wc_max_related_1561437717623', '5', 'no'),
(3790, '_transient_timeout_plugin_slugs', '1437807941', 'no'),
(3791, '_transient_plugin_slugs', 'a:14:{i:0;s:48:"woocommerce-ajax-filters/woocommerce-filters.php";i:1;s:19:"akismet/akismet.php";i:2;s:9:"hello.php";i:3;s:53:"multiple-gallery-on-post/multiple-gallery-on-post.php";i:4;s:27:"woocommerce/woocommerce.php";i:5;s:37:"woocommerce-products-filter/index.php";i:6;s:59:"woocommerce-show-attributes/woocommerce-show-attributes.php";i:7;s:42:"wordpress-social-login/wp-social-login.php";i:8;s:33:"wp-postratings/wp-postratings.php";i:9;s:51:"wp-gallery-custom-links/wp-gallery-custom-links.php";i:10;s:41:"yith-woocommerce-ajax-navigation/init.php";i:11;s:37:"yith-woocommerce-ajax-search/init.php";i:12;s:33:"yith-woocommerce-compare/init.php";i:13;s:34:"yith-woocommerce-wishlist/init.php";}', 'no'),
(3792, '_transient_timeout_wc_upgrade_notice_2.3.8', '1437807943', 'no'),
(3793, '_transient_wc_upgrade_notice_2.3.8', '', 'no'),
(3804, '_transient_timeout_wc_max_related_1911437717623', '1440325061', 'no'),
(3805, '_transient_wc_max_related_1911437717623', '5', 'no'),
(3821, '_transient_timeout_wc_max_related_1601437717623', '1440396979', 'no'),
(3822, '_transient_wc_max_related_1601437717623', '5', 'no'),
(3823, '_transient_timeout_wc_max_related_1821437717623', '1440398415', 'no'),
(3824, '_transient_wc_max_related_1821437717623', '2', 'no'),
(3825, '_transient_timeout_wc_max_related_1591437717623', '1440400237', 'no'),
(3826, '_transient_wc_max_related_1591437717623', '5', 'no'),
(3834, '_transient_timeout_wc_max_related_1581437717623', '1440402542', 'no'),
(3835, '_transient_wc_max_related_1581437717623', '5', 'no'),
(3837, '_wc_session_1', 'a:21:{s:4:"cart";s:6:"a:0:{}";s:15:"applied_coupons";s:6:"a:0:{}";s:23:"coupon_discount_amounts";s:6:"a:0:{}";s:27:"coupon_discount_tax_amounts";s:6:"a:0:{}";s:21:"removed_cart_contents";s:6:"a:0:{}";s:19:"cart_contents_total";i:0;s:20:"cart_contents_weight";i:0;s:19:"cart_contents_count";i:0;s:5:"total";i:0;s:8:"subtotal";i:0;s:15:"subtotal_ex_tax";i:0;s:9:"tax_total";i:0;s:5:"taxes";s:6:"a:0:{}";s:14:"shipping_taxes";s:6:"a:0:{}";s:13:"discount_cart";i:0;s:17:"discount_cart_tax";i:0;s:14:"shipping_total";i:0;s:18:"shipping_tax_total";i:0;s:9:"fee_total";i:0;s:4:"fees";s:6:"a:0:{}";s:10:"wc_notices";N;}', 'no'),
(3838, '_wc_session_expires_1', '1437985226', 'no'),
(3842, '_transient_is_multi_author', '0', 'yes'),
(3843, '_transient_twentyfourteen_category_count', '3', 'yes'),
(3844, '_transient_timeout_wc_uf_pid_11356a59603a927b93758a948750333d', '1440404453', 'no'),
(3845, '_transient_wc_uf_pid_11356a59603a927b93758a948750333d', 'a:10:{i:0;i:191;i:1;i:190;i:2;i:182;i:3;i:179;i:4;i:171;i:5;i:160;i:6;i:159;i:7;i:158;i:8;i:157;i:9;i:156;}', 'no'),
(3846, '_transient_timeout_wc_rating_count_1911437717623', '1440404454', 'no'),
(3847, '_transient_wc_rating_count_1911437717623', '0', 'no'),
(3848, '_transient_timeout_wc_average_rating_1911437717623', '1440404454', 'no'),
(3849, '_transient_wc_average_rating_1911437717623', '', 'no'),
(3850, '_transient_timeout_wc_rating_count_1901437717623', '1440404454', 'no'),
(3851, '_transient_wc_rating_count_1901437717623', '0', 'no'),
(3852, '_transient_timeout_wc_average_rating_1901437717623', '1440404454', 'no'),
(3853, '_transient_wc_average_rating_1901437717623', '', 'no'),
(3854, '_transient_timeout_wc_rating_count_1821437717623', '1440404454', 'no'),
(3855, '_transient_wc_rating_count_1821437717623', '0', 'no'),
(3856, '_transient_timeout_wc_average_rating_1821437717623', '1440404454', 'no'),
(3857, '_transient_wc_average_rating_1821437717623', '', 'no'),
(3858, '_transient_timeout_wc_rating_count_1791437717623', '1440404454', 'no'),
(3859, '_transient_wc_rating_count_1791437717623', '0', 'no'),
(3860, '_transient_timeout_wc_average_rating_1791437717623', '1440404454', 'no'),
(3861, '_transient_wc_average_rating_1791437717623', '', 'no'),
(3862, '_transient_timeout_wc_rating_count_1711437717623', '1440404454', 'no'),
(3863, '_transient_wc_rating_count_1711437717623', '0', 'no'),
(3864, '_transient_timeout_wc_average_rating_1711437717623', '1440404454', 'no'),
(3865, '_transient_wc_average_rating_1711437717623', '', 'no'),
(3866, '_transient_timeout_wc_rating_count_1601437717623', '1440404454', 'no'),
(3867, '_transient_wc_rating_count_1601437717623', '0', 'no'),
(3868, '_transient_timeout_wc_average_rating_1601437717623', '1440404454', 'no'),
(3869, '_transient_wc_average_rating_1601437717623', '', 'no'),
(3870, '_transient_timeout_wc_rating_count_1591437717623', '1440404454', 'no'),
(3871, '_transient_wc_rating_count_1591437717623', '0', 'no'),
(3872, '_transient_timeout_wc_average_rating_1591437717623', '1440404454', 'no'),
(3873, '_transient_wc_average_rating_1591437717623', '', 'no'),
(3874, '_transient_timeout_wc_rating_count_1581437717623', '1440404454', 'no'),
(3875, '_transient_wc_rating_count_1581437717623', '0', 'no'),
(3876, '_transient_timeout_wc_average_rating_1581437717623', '1440404454', 'no'),
(3877, '_transient_wc_average_rating_1581437717623', '', 'no'),
(3878, '_transient_timeout_wc_rating_count_1571437717623', '1440404454', 'no'),
(3879, '_transient_wc_rating_count_1571437717623', '0', 'no'),
(3880, '_transient_timeout_wc_average_rating_1571437717623', '1440404454', 'no'),
(3881, '_transient_wc_average_rating_1571437717623', '', 'no'),
(3882, '_transient_timeout_wc_rating_count_1561437717623', '1440404454', 'no'),
(3883, '_transient_wc_rating_count_1561437717623', '0', 'no'),
(3884, '_transient_timeout_wc_average_rating_1561437717623', '1440404455', 'no'),
(3885, '_transient_wc_average_rating_1561437717623', '', 'no'),
(3886, '_transient_timeout_wc_review_count_1911437717623', '1440404459', 'no'),
(3887, '_transient_wc_review_count_1911437717623', '0', 'no'),
(3888, '_transient_timeout_wc_review_count_1821437717623', '1440404478', 'no'),
(3889, '_transient_wc_review_count_1821437717623', '0', 'no'),
(3890, '_transient_timeout_wc_review_count_1901437717623', '1440404479', 'no'),
(3891, '_transient_wc_review_count_1901437717623', '0', 'no'),
(3892, '_transient_timeout_wc_max_related_1901437717623', '1440404479', 'no'),
(3893, '_transient_wc_max_related_1901437717623', '5', 'no'),
(3894, 'widget_widget_twentyfourteen_ephemera', 'a:2:{i:1;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(3895, '_transient_doing_cron', '1437833414.8842129707336425781250', 'yes'),
(3898, '_site_transient_timeout_theme_roots', '1437835218', 'yes'),
(3899, '_site_transient_theme_roots', 'a:4:{s:10:"testxcluse";s:7:"/themes";s:13:"twentyfifteen";s:7:"/themes";s:14:"twentyfourteen";s:7:"/themes";s:14:"twentythirteen";s:7:"/themes";}', 'yes'),
(3900, '_site_transient_update_themes', 'O:8:"stdClass":4:{s:12:"last_checked";i:1437833425;s:7:"checked";a:4:{s:10:"testxcluse";s:0:"";s:13:"twentyfifteen";s:3:"1.1";s:14:"twentyfourteen";s:3:"1.4";s:14:"twentythirteen";s:3:"1.5";}s:8:"response";a:1:{s:13:"twentyfifteen";a:4:{s:5:"theme";s:13:"twentyfifteen";s:11:"new_version";s:3:"1.2";s:3:"url";s:43:"https://wordpress.org/themes/twentyfifteen/";s:7:"package";s:59:"https://downloads.wordpress.org/theme/twentyfifteen.1.2.zip";}}s:12:"translations";a:0:{}}', 'yes'),
(3901, '_site_transient_update_plugins', 'O:8:"stdClass":4:{s:12:"last_checked";i:1437833422;s:8:"response";a:8:{s:48:"woocommerce-ajax-filters/woocommerce-filters.php";O:8:"stdClass":6:{s:2:"id";s:5:"55887";s:4:"slug";s:24:"woocommerce-ajax-filters";s:6:"plugin";s:48:"woocommerce-ajax-filters/woocommerce-filters.php";s:11:"new_version";s:7:"1.1.0.8";s:3:"url";s:55:"https://wordpress.org/plugins/woocommerce-ajax-filters/";s:7:"package";s:75:"https://downloads.wordpress.org/plugin/woocommerce-ajax-filters.1.1.0.8.zip";}s:19:"akismet/akismet.php";O:8:"stdClass":6:{s:2:"id";s:2:"15";s:4:"slug";s:7:"akismet";s:6:"plugin";s:19:"akismet/akismet.php";s:11:"new_version";s:5:"3.1.3";s:3:"url";s:38:"https://wordpress.org/plugins/akismet/";s:7:"package";s:56:"https://downloads.wordpress.org/plugin/akismet.3.1.3.zip";}s:27:"woocommerce/woocommerce.php";O:8:"stdClass":6:{s:2:"id";s:5:"25331";s:4:"slug";s:11:"woocommerce";s:6:"plugin";s:27:"woocommerce/woocommerce.php";s:11:"new_version";s:6:"2.3.13";s:3:"url";s:42:"https://wordpress.org/plugins/woocommerce/";s:7:"package";s:61:"https://downloads.wordpress.org/plugin/woocommerce.2.3.13.zip";}s:37:"woocommerce-products-filter/index.php";O:8:"stdClass":6:{s:2:"id";s:5:"55691";s:4:"slug";s:27:"woocommerce-products-filter";s:6:"plugin";s:37:"woocommerce-products-filter/index.php";s:11:"new_version";s:5:"1.1.1";s:3:"url";s:58:"https://wordpress.org/plugins/woocommerce-products-filter/";s:7:"package";s:70:"https://downloads.wordpress.org/plugin/woocommerce-products-filter.zip";}s:41:"yith-woocommerce-ajax-navigation/init.php";O:8:"stdClass":6:{s:2:"id";s:5:"41700";s:4:"slug";s:32:"yith-woocommerce-ajax-navigation";s:6:"plugin";s:41:"yith-woocommerce-ajax-navigation/init.php";s:11:"new_version";s:5:"2.0.4";s:3:"url";s:63:"https://wordpress.org/plugins/yith-woocommerce-ajax-navigation/";s:7:"package";s:81:"https://downloads.wordpress.org/plugin/yith-woocommerce-ajax-navigation.2.0.4.zip";}s:37:"yith-woocommerce-ajax-search/init.php";O:8:"stdClass":6:{s:2:"id";s:5:"42851";s:4:"slug";s:28:"yith-woocommerce-ajax-search";s:6:"plugin";s:37:"yith-woocommerce-ajax-search/init.php";s:11:"new_version";s:5:"1.3.4";s:3:"url";s:59:"https://wordpress.org/plugins/yith-woocommerce-ajax-search/";s:7:"package";s:77:"https://downloads.wordpress.org/plugin/yith-woocommerce-ajax-search.1.3.4.zip";}s:33:"yith-woocommerce-compare/init.php";O:8:"stdClass":7:{s:2:"id";s:5:"41769";s:4:"slug";s:24:"yith-woocommerce-compare";s:6:"plugin";s:33:"yith-woocommerce-compare/init.php";s:11:"new_version";s:5:"2.0.0";s:3:"url";s:55:"https://wordpress.org/plugins/yith-woocommerce-compare/";s:7:"package";s:73:"https://downloads.wordpress.org/plugin/yith-woocommerce-compare.2.0.0.zip";s:14:"upgrade_notice";s:222:"Added: Added new plugin core\nFixed: Error in class yith-woocompare-fontend\nFixed: Lightbox doesn&#039;t close after click view cart\nFixed: minor bug fix\nUpdated: Language files\nRemoved: old default.po catalog language file";}s:34:"yith-woocommerce-wishlist/init.php";O:8:"stdClass":7:{s:2:"id";s:5:"41084";s:4:"slug";s:25:"yith-woocommerce-wishlist";s:6:"plugin";s:34:"yith-woocommerce-wishlist/init.php";s:11:"new_version";s:5:"2.0.9";s:3:"url";s:56:"https://wordpress.org/plugins/yith-woocommerce-wishlist/";s:7:"package";s:74:"https://downloads.wordpress.org/plugin/yith-woocommerce-wishlist.2.0.9.zip";s:14:"upgrade_notice";s:300:"Added: russian translation\nAdded: WooCommerce class to wishlist view form\nAdded: spinner to plugin assets\nAdded: check on &quot;user_logged_in&quot; for sub-templates in wishlist-view\nAdded: WordPress 4.2.3 compatibility\nAdded: WPML 3.2.2 compatibility (removed deprecated function)\nAdded: new check ";}}s:12:"translations";a:0:{}s:9:"no_update";a:6:{s:9:"hello.php";O:8:"stdClass":6:{s:2:"id";s:4:"3564";s:4:"slug";s:11:"hello-dolly";s:6:"plugin";s:9:"hello.php";s:11:"new_version";s:3:"1.6";s:3:"url";s:42:"https://wordpress.org/plugins/hello-dolly/";s:7:"package";s:58:"https://downloads.wordpress.org/plugin/hello-dolly.1.6.zip";}s:53:"multiple-gallery-on-post/multiple-gallery-on-post.php";O:8:"stdClass":6:{s:2:"id";s:5:"45525";s:4:"slug";s:24:"multiple-gallery-on-post";s:6:"plugin";s:53:"multiple-gallery-on-post/multiple-gallery-on-post.php";s:11:"new_version";s:3:"0.4";s:3:"url";s:55:"https://wordpress.org/plugins/multiple-gallery-on-post/";s:7:"package";s:67:"https://downloads.wordpress.org/plugin/multiple-gallery-on-post.zip";}s:59:"woocommerce-show-attributes/woocommerce-show-attributes.php";O:8:"stdClass":6:{s:2:"id";s:5:"52695";s:4:"slug";s:27:"woocommerce-show-attributes";s:6:"plugin";s:59:"woocommerce-show-attributes/woocommerce-show-attributes.php";s:11:"new_version";s:5:"1.4.2";s:3:"url";s:58:"https://wordpress.org/plugins/woocommerce-show-attributes/";s:7:"package";s:76:"https://downloads.wordpress.org/plugin/woocommerce-show-attributes.1.4.2.zip";}s:42:"wordpress-social-login/wp-social-login.php";O:8:"stdClass":6:{s:2:"id";s:5:"27354";s:4:"slug";s:22:"wordpress-social-login";s:6:"plugin";s:42:"wordpress-social-login/wp-social-login.php";s:11:"new_version";s:5:"2.2.3";s:3:"url";s:53:"https://wordpress.org/plugins/wordpress-social-login/";s:7:"package";s:71:"https://downloads.wordpress.org/plugin/wordpress-social-login.2.2.3.zip";}s:33:"wp-postratings/wp-postratings.php";O:8:"stdClass":6:{s:2:"id";s:3:"369";s:4:"slug";s:14:"wp-postratings";s:6:"plugin";s:33:"wp-postratings/wp-postratings.php";s:11:"new_version";s:4:"1.81";s:3:"url";s:45:"https://wordpress.org/plugins/wp-postratings/";s:7:"package";s:62:"https://downloads.wordpress.org/plugin/wp-postratings.1.81.zip";}s:51:"wp-gallery-custom-links/wp-gallery-custom-links.php";O:8:"stdClass":7:{s:2:"id";s:5:"32001";s:4:"slug";s:23:"wp-gallery-custom-links";s:6:"plugin";s:51:"wp-gallery-custom-links/wp-gallery-custom-links.php";s:11:"new_version";s:6:"1.10.3";s:3:"url";s:54:"https://wordpress.org/plugins/wp-gallery-custom-links/";s:7:"package";s:73:"https://downloads.wordpress.org/plugin/wp-gallery-custom-links.1.10.3.zip";s:14:"upgrade_notice";s:300:"Added a &quot;Do Not Change&quot; default target option to improve performance by reducing the number of regexes to apply &quot;_self&quot; on every gallery item. If your theme opens all gallery items in a new window by default and you prefer to keep them in the same window, you will need to add ope";}}}', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `wp_postmeta`
--

CREATE TABLE IF NOT EXISTS `wp_postmeta` (
`meta_id` bigint(20) unsigned NOT NULL,
  `post_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB AUTO_INCREMENT=1822 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wp_postmeta`
--

INSERT INTO `wp_postmeta` (`meta_id`, `post_id`, `meta_key`, `meta_value`) VALUES
(1, 2, '_wp_page_template', 'default'),
(35, 10, '_wp_attached_file', '2015/05/blog-1-large.png'),
(36, 10, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:378;s:6:"height";i:312;s:4:"file";s:24:"2015/05/blog-1-large.png";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:24:"blog-1-large-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:24:"blog-1-large-300x248.png";s:5:"width";i:300;s:6:"height";i:248;s:9:"mime-type";s:9:"image/png";}s:14:"shop_thumbnail";a:4:{s:4:"file";s:24:"blog-1-large-180x180.png";s:5:"width";i:180;s:6:"height";i:180;s:9:"mime-type";s:9:"image/png";}s:12:"shop_catalog";a:4:{s:4:"file";s:24:"blog-1-large-300x300.png";s:5:"width";i:300;s:6:"height";i:300;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:11:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";s:11:"orientation";i:0;}}'),
(63, 12, '_wp_attached_file', '2015/05/list1.jpg'),
(65, 13, '_wp_attached_file', '2015/05/list1-.jpg'),
(125, 17, '_wp_attached_file', '2015/05/slide2.jpg'),
(126, 17, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:212;s:6:"height";i:212;s:4:"file";s:18:"2015/05/slide2.jpg";s:5:"sizes";a:3:{s:9:"thumbnail";a:4:{s:4:"file";s:18:"slide2-150x150.jpg";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}s:21:"yith-woocompare-image";a:4:{s:4:"file";s:18:"slide2-212x154.jpg";s:5:"width";i:212;s:6:"height";i:154;s:9:"mime-type";s:10:"image/jpeg";}s:14:"shop_thumbnail";a:4:{s:4:"file";s:18:"slide2-180x180.jpg";s:5:"width";i:180;s:6:"height";i:180;s:9:"mime-type";s:10:"image/jpeg";}}s:10:"image_meta";a:11:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";s:11:"orientation";i:0;}}'),
(135, 16, '_purchase_note', ''),
(136, 16, '_featured', 'no'),
(137, 16, '_weight', ''),
(138, 16, '_length', ''),
(139, 16, '_width', ''),
(140, 16, '_height', ''),
(141, 16, '_sku', ''),
(142, 16, '_product_attributes', 'a:0:{}'),
(143, 16, '_sale_price_dates_from', ''),
(144, 16, '_sale_price_dates_to', ''),
(145, 16, '_price', '100'),
(146, 16, '_sold_individually', ''),
(147, 16, '_manage_stock', 'no'),
(148, 16, '_backorders', 'no'),
(149, 16, '_stock', ''),
(150, 16, '_upsell_ids', 'a:0:{}'),
(151, 16, '_crosssell_ids', 'a:0:{}'),
(152, 16, '_product_image_gallery', ''),
(155, 19, '_wp_attached_file', '2015/05/slide9.jpg'),
(156, 19, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:212;s:6:"height";i:212;s:4:"file";s:18:"2015/05/slide9.jpg";s:5:"sizes";a:3:{s:9:"thumbnail";a:4:{s:4:"file";s:18:"slide9-150x150.jpg";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}s:21:"yith-woocompare-image";a:4:{s:4:"file";s:18:"slide9-212x154.jpg";s:5:"width";i:212;s:6:"height";i:154;s:9:"mime-type";s:10:"image/jpeg";}s:14:"shop_thumbnail";a:4:{s:4:"file";s:18:"slide9-180x180.jpg";s:5:"width";i:180;s:6:"height";i:180;s:9:"mime-type";s:10:"image/jpeg";}}s:10:"image_meta";a:11:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";s:11:"orientation";i:0;}}'),
(185, 21, '_wp_attached_file', '2015/05/slide5.jpg'),
(186, 21, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:212;s:6:"height";i:212;s:4:"file";s:18:"2015/05/slide5.jpg";s:5:"sizes";a:3:{s:9:"thumbnail";a:4:{s:4:"file";s:18:"slide5-150x150.jpg";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}s:21:"yith-woocompare-image";a:4:{s:4:"file";s:18:"slide5-212x154.jpg";s:5:"width";i:212;s:6:"height";i:154;s:9:"mime-type";s:10:"image/jpeg";}s:14:"shop_thumbnail";a:4:{s:4:"file";s:18:"slide5-180x180.jpg";s:5:"width";i:180;s:6:"height";i:180;s:9:"mime-type";s:10:"image/jpeg";}}s:10:"image_meta";a:11:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";s:11:"orientation";i:0;}}'),
(215, 23, '_wp_attached_file', '2015/05/slide8.jpg'),
(216, 23, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:212;s:6:"height";i:212;s:4:"file";s:18:"2015/05/slide8.jpg";s:5:"sizes";a:3:{s:9:"thumbnail";a:4:{s:4:"file";s:18:"slide8-150x150.jpg";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}s:21:"yith-woocompare-image";a:4:{s:4:"file";s:18:"slide8-212x154.jpg";s:5:"width";i:212;s:6:"height";i:154;s:9:"mime-type";s:10:"image/jpeg";}s:14:"shop_thumbnail";a:4:{s:4:"file";s:18:"slide8-180x180.jpg";s:5:"width";i:180;s:6:"height";i:180;s:9:"mime-type";s:10:"image/jpeg";}}s:10:"image_meta";a:11:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";s:11:"orientation";i:0;}}'),
(247, 25, '_edit_lock', '1437398540:1'),
(248, 25, '_edit_last', '1'),
(249, 25, '_wp_page_template', 'prosperent.php'),
(251, 1, '_edit_lock', '1435304452:1'),
(412, 35, '_webhook_pending_delivery', '1'),
(413, 36, '_edit_lock', '1432204473:1'),
(414, 36, '_edit_last', '1'),
(416, 36, '_visibility', 'visible'),
(417, 36, '_stock_status', 'instock'),
(418, 36, 'total_sales', '0'),
(419, 36, '_downloadable', 'no'),
(420, 36, '_virtual', 'no'),
(421, 36, '_regular_price', '100'),
(422, 36, '_sale_price', ''),
(423, 36, '_purchase_note', ''),
(424, 36, '_featured', 'no'),
(425, 36, '_weight', ''),
(426, 36, '_length', ''),
(427, 36, '_width', ''),
(428, 36, '_height', ''),
(429, 36, '_sku', ''),
(430, 36, '_product_attributes', 'a:0:{}'),
(431, 36, '_sale_price_dates_from', ''),
(432, 36, '_sale_price_dates_to', ''),
(433, 36, '_price', '100'),
(434, 36, '_sold_individually', ''),
(435, 36, '_manage_stock', 'no'),
(436, 36, '_backorders', 'no'),
(437, 36, '_stock', ''),
(438, 36, '_upsell_ids', 'a:0:{}'),
(439, 36, '_crosssell_ids', 'a:0:{}'),
(440, 36, '_product_url', 'http://docs.woothemes.com/wc-apidocs/function-add_woocommerce_term_meta.html'),
(441, 36, '_button_text', ''),
(442, 36, '_product_image_gallery', ''),
(469, 39, 'attribute_pa_size', '2xl'),
(470, 39, '_price', '21.99'),
(471, 39, '_regular_price', '21.99'),
(472, 39, '_product_attributes', 'a:1:{s:7:"pa_size";a:5:{s:4:"name";s:3:"2xl";s:5:"value";s:0:"";s:10:"is_visible";s:1:"1";s:12:"is_variation";s:1:"1";s:11:"is_taxonomy";s:1:"1";}}'),
(473, 40, 'attribute_pa_size', 'xl'),
(474, 40, '_price', '20.99'),
(475, 40, '_regular_price', '20.99'),
(476, 40, '_product_attributes', 'a:1:{s:7:"pa_size";a:5:{s:4:"name";s:2:"xl";s:5:"value";s:0:"";s:10:"is_visible";s:1:"1";s:12:"is_variation";s:1:"1";s:11:"is_taxonomy";s:1:"1";}}'),
(477, 41, 'attribute_pa_size', 'lg'),
(478, 41, '_price', '18.99'),
(479, 41, '_regular_price', '18.99'),
(480, 41, '_product_attributes', 'a:1:{s:7:"pa_size";a:5:{s:4:"name";s:2:"lg";s:5:"value";s:0:"";s:10:"is_visible";s:1:"1";s:12:"is_variation";s:1:"1";s:11:"is_taxonomy";s:1:"1";}}'),
(481, 42, 'attribute_pa_size', 'md'),
(482, 42, '_price', '18.99'),
(483, 42, '_regular_price', '18.99'),
(484, 42, '_product_attributes', 'a:1:{s:7:"pa_size";a:5:{s:4:"name";s:2:"md";s:5:"value";s:0:"";s:10:"is_visible";s:1:"1";s:12:"is_variation";s:1:"1";s:11:"is_taxonomy";s:1:"1";}}'),
(485, 43, 'attribute_pa_size', 'sm'),
(486, 43, '_price', '18.99'),
(487, 43, '_regular_price', '18.99'),
(488, 43, '_product_attributes', 'a:1:{s:7:"pa_size";a:5:{s:4:"name";s:2:"sm";s:5:"value";s:0:"";s:10:"is_visible";s:1:"1";s:12:"is_variation";s:1:"1";s:11:"is_taxonomy";s:1:"1";}}'),
(496, 45, 'attribute_pa_size', '2xl'),
(497, 45, '_price', '21.99'),
(498, 45, '_regular_price', '21.99'),
(499, 45, '_product_attributes', 'a:1:{s:7:"pa_size";a:5:{s:4:"name";s:3:"2xl";s:5:"value";s:0:"";s:10:"is_visible";s:1:"1";s:12:"is_variation";s:1:"1";s:11:"is_taxonomy";s:1:"1";}}'),
(500, 46, 'attribute_pa_size', 'xl'),
(501, 46, '_price', '20.99'),
(502, 46, '_regular_price', '20.99'),
(503, 46, '_product_attributes', 'a:1:{s:7:"pa_size";a:5:{s:4:"name";s:2:"xl";s:5:"value";s:0:"";s:10:"is_visible";s:1:"1";s:12:"is_variation";s:1:"1";s:11:"is_taxonomy";s:1:"1";}}'),
(504, 47, 'attribute_pa_size', 'lg'),
(505, 47, '_price', '18.99'),
(506, 47, '_regular_price', '18.99'),
(507, 47, '_product_attributes', 'a:1:{s:7:"pa_size";a:5:{s:4:"name";s:2:"lg";s:5:"value";s:0:"";s:10:"is_visible";s:1:"1";s:12:"is_variation";s:1:"1";s:11:"is_taxonomy";s:1:"1";}}'),
(508, 48, 'attribute_pa_size', 'md'),
(509, 48, '_price', '18.99'),
(510, 48, '_regular_price', '18.99'),
(511, 48, '_product_attributes', 'a:1:{s:7:"pa_size";a:5:{s:4:"name";s:2:"md";s:5:"value";s:0:"";s:10:"is_visible";s:1:"1";s:12:"is_variation";s:1:"1";s:11:"is_taxonomy";s:1:"1";}}'),
(512, 49, 'attribute_pa_size', 'sm'),
(513, 49, '_price', '18.99'),
(514, 49, '_regular_price', '18.99'),
(515, 49, '_product_attributes', 'a:1:{s:7:"pa_size";a:5:{s:4:"name";s:2:"sm";s:5:"value";s:0:"";s:10:"is_visible";s:1:"1";s:12:"is_variation";s:1:"1";s:11:"is_taxonomy";s:1:"1";}}'),
(525, 52, 'attribute_pa_size2', '2xl'),
(526, 52, '_price', '21.99'),
(527, 52, '_regular_price', '21.99'),
(528, 52, '_product_attributes', 'a:1:{s:8:"pa_size2";a:5:{s:4:"name";s:3:"2xl";s:5:"value";s:0:"";s:10:"is_visible";s:1:"1";s:12:"is_variation";s:1:"1";s:11:"is_taxonomy";s:1:"1";}}'),
(529, 53, 'attribute_pa_size2', 'xl'),
(530, 53, '_price', '20.99'),
(531, 53, '_regular_price', '20.99'),
(532, 53, '_product_attributes', 'a:1:{s:8:"pa_size2";a:5:{s:4:"name";s:2:"xl";s:5:"value";s:0:"";s:10:"is_visible";s:1:"1";s:12:"is_variation";s:1:"1";s:11:"is_taxonomy";s:1:"1";}}'),
(533, 54, 'attribute_pa_size2', 'lg'),
(534, 54, '_price', '18.99'),
(535, 54, '_regular_price', '18.99'),
(536, 54, '_product_attributes', 'a:1:{s:8:"pa_size2";a:5:{s:4:"name";s:2:"lg";s:5:"value";s:0:"";s:10:"is_visible";s:1:"1";s:12:"is_variation";s:1:"1";s:11:"is_taxonomy";s:1:"1";}}'),
(537, 55, 'attribute_pa_size2', 'md'),
(538, 55, '_price', '18.99'),
(539, 55, '_regular_price', '18.99'),
(540, 55, '_product_attributes', 'a:1:{s:8:"pa_size2";a:5:{s:4:"name";s:2:"md";s:5:"value";s:0:"";s:10:"is_visible";s:1:"1";s:12:"is_variation";s:1:"1";s:11:"is_taxonomy";s:1:"1";}}'),
(541, 56, 'attribute_pa_size2', 'sm'),
(542, 56, '_price', '18.99'),
(543, 56, '_regular_price', '18.99'),
(544, 56, '_product_attributes', 'a:1:{s:8:"pa_size2";a:5:{s:4:"name";s:2:"sm";s:5:"value";s:0:"";s:10:"is_visible";s:1:"1";s:12:"is_variation";s:1:"1";s:11:"is_taxonomy";s:1:"1";}}'),
(557, 63, 'attribute_pa_size', '2xl'),
(558, 63, '_price', '21.99'),
(559, 63, '_regular_price', '21.99'),
(560, 63, '_product_attributes', 'a:1:{s:7:"pa_size";a:5:{s:4:"name";s:3:"2xl";s:5:"value";s:0:"";s:10:"is_visible";s:1:"1";s:12:"is_variation";s:1:"1";s:11:"is_taxonomy";s:1:"1";}}'),
(561, 64, 'attribute_pa_size', 'xl'),
(562, 64, '_price', '20.99'),
(563, 64, '_regular_price', '20.99'),
(564, 64, '_product_attributes', 'a:1:{s:7:"pa_size";a:5:{s:4:"name";s:2:"xl";s:5:"value";s:0:"";s:10:"is_visible";s:1:"1";s:12:"is_variation";s:1:"1";s:11:"is_taxonomy";s:1:"1";}}'),
(565, 65, 'attribute_pa_size', 'lg'),
(566, 65, '_price', '18.99'),
(567, 65, '_regular_price', '18.99'),
(568, 65, '_product_attributes', 'a:1:{s:7:"pa_size";a:5:{s:4:"name";s:2:"lg";s:5:"value";s:0:"";s:10:"is_visible";s:1:"1";s:12:"is_variation";s:1:"1";s:11:"is_taxonomy";s:1:"1";}}'),
(569, 66, 'attribute_pa_size', 'md'),
(570, 66, '_price', '18.99'),
(571, 66, '_regular_price', '18.99'),
(572, 66, '_product_attributes', 'a:1:{s:7:"pa_size";a:5:{s:4:"name";s:2:"md";s:5:"value";s:0:"";s:10:"is_visible";s:1:"1";s:12:"is_variation";s:1:"1";s:11:"is_taxonomy";s:1:"1";}}'),
(573, 67, 'attribute_pa_size', 'sm'),
(574, 67, '_price', '18.99'),
(575, 67, '_regular_price', '18.99'),
(576, 67, '_product_attributes', 'a:1:{s:7:"pa_size";a:5:{s:4:"name";s:2:"sm";s:5:"value";s:0:"";s:10:"is_visible";s:1:"1";s:12:"is_variation";s:1:"1";s:11:"is_taxonomy";s:1:"1";}}'),
(583, 69, 'attribute_pa_size', '2xl'),
(584, 69, '_price', '21.99'),
(585, 69, '_regular_price', '21.99'),
(586, 69, '_product_attributes', 'a:1:{s:7:"pa_size";a:5:{s:4:"name";s:3:"2xl";s:5:"value";s:0:"";s:10:"is_visible";s:1:"1";s:12:"is_variation";s:1:"1";s:11:"is_taxonomy";s:1:"1";}}'),
(587, 70, 'attribute_pa_size', 'xl'),
(588, 70, '_price', '20.99'),
(589, 70, '_regular_price', '20.99'),
(590, 70, '_product_attributes', 'a:1:{s:7:"pa_size";a:5:{s:4:"name";s:2:"xl";s:5:"value";s:0:"";s:10:"is_visible";s:1:"1";s:12:"is_variation";s:1:"1";s:11:"is_taxonomy";s:1:"1";}}'),
(591, 71, 'attribute_pa_size', 'lg'),
(592, 71, '_price', '18.99'),
(593, 71, '_regular_price', '18.99'),
(594, 71, '_product_attributes', 'a:1:{s:7:"pa_size";a:5:{s:4:"name";s:2:"lg";s:5:"value";s:0:"";s:10:"is_visible";s:1:"1";s:12:"is_variation";s:1:"1";s:11:"is_taxonomy";s:1:"1";}}'),
(595, 72, 'attribute_pa_size', 'md'),
(596, 72, '_price', '18.99'),
(597, 72, '_regular_price', '18.99'),
(598, 72, '_product_attributes', 'a:1:{s:7:"pa_size";a:5:{s:4:"name";s:2:"md";s:5:"value";s:0:"";s:10:"is_visible";s:1:"1";s:12:"is_variation";s:1:"1";s:11:"is_taxonomy";s:1:"1";}}'),
(599, 73, 'attribute_pa_size', 'sm'),
(600, 73, '_price', '18.99'),
(601, 73, '_regular_price', '18.99'),
(602, 73, '_product_attributes', 'a:1:{s:7:"pa_size";a:5:{s:4:"name";s:2:"sm";s:5:"value";s:0:"";s:10:"is_visible";s:1:"1";s:12:"is_variation";s:1:"1";s:11:"is_taxonomy";s:1:"1";}}'),
(610, 75, 'attribute_pa_size', '2xl'),
(611, 75, '_price', '21.99'),
(612, 75, '_regular_price', '21.99'),
(613, 75, '_product_attributes', 'a:1:{s:7:"pa_size";a:5:{s:4:"name";s:3:"2xl";s:5:"value";s:0:"";s:10:"is_visible";s:1:"1";s:12:"is_variation";s:1:"1";s:11:"is_taxonomy";s:1:"1";}}'),
(614, 76, 'attribute_pa_size', 'xl'),
(615, 76, '_price', '20.99'),
(616, 76, '_regular_price', '20.99'),
(617, 76, '_product_attributes', 'a:1:{s:7:"pa_size";a:5:{s:4:"name";s:2:"xl";s:5:"value";s:0:"";s:10:"is_visible";s:1:"1";s:12:"is_variation";s:1:"1";s:11:"is_taxonomy";s:1:"1";}}'),
(618, 77, 'attribute_pa_size', 'lg'),
(619, 77, '_price', '18.99'),
(620, 77, '_regular_price', '18.99'),
(621, 77, '_product_attributes', 'a:1:{s:7:"pa_size";a:5:{s:4:"name";s:2:"lg";s:5:"value";s:0:"";s:10:"is_visible";s:1:"1";s:12:"is_variation";s:1:"1";s:11:"is_taxonomy";s:1:"1";}}'),
(622, 78, 'attribute_pa_size', 'md'),
(623, 78, '_price', '18.99'),
(624, 78, '_regular_price', '18.99'),
(625, 78, '_product_attributes', 'a:1:{s:7:"pa_size";a:5:{s:4:"name";s:2:"md";s:5:"value";s:0:"";s:10:"is_visible";s:1:"1";s:12:"is_variation";s:1:"1";s:11:"is_taxonomy";s:1:"1";}}'),
(626, 79, 'attribute_pa_size', 'sm'),
(627, 79, '_price', '18.99'),
(628, 79, '_regular_price', '18.99'),
(629, 79, '_product_attributes', 'a:1:{s:7:"pa_size";a:5:{s:4:"name";s:2:"sm";s:5:"value";s:0:"";s:10:"is_visible";s:1:"1";s:12:"is_variation";s:1:"1";s:11:"is_taxonomy";s:1:"1";}}'),
(636, 81, 'attribute_pa_size', '2xl'),
(637, 81, '_price', '21.99'),
(638, 81, '_regular_price', '21.99'),
(639, 81, '_product_attributes', 'a:1:{s:7:"pa_size";a:5:{s:4:"name";s:3:"2xl";s:5:"value";s:0:"";s:10:"is_visible";s:1:"1";s:12:"is_variation";s:1:"1";s:11:"is_taxonomy";s:1:"1";}}'),
(640, 82, 'attribute_pa_size', 'xl'),
(641, 82, '_price', '20.99'),
(642, 82, '_regular_price', '20.99'),
(643, 82, '_product_attributes', 'a:1:{s:7:"pa_size";a:5:{s:4:"name";s:2:"xl";s:5:"value";s:0:"";s:10:"is_visible";s:1:"1";s:12:"is_variation";s:1:"1";s:11:"is_taxonomy";s:1:"1";}}'),
(644, 83, 'attribute_pa_size', 'lg'),
(645, 83, '_price', '18.99'),
(646, 83, '_regular_price', '18.99'),
(647, 83, '_product_attributes', 'a:1:{s:7:"pa_size";a:5:{s:4:"name";s:2:"lg";s:5:"value";s:0:"";s:10:"is_visible";s:1:"1";s:12:"is_variation";s:1:"1";s:11:"is_taxonomy";s:1:"1";}}'),
(648, 84, 'attribute_pa_size', 'md'),
(649, 84, '_price', '18.99'),
(650, 84, '_regular_price', '18.99'),
(651, 84, '_product_attributes', 'a:1:{s:7:"pa_size";a:5:{s:4:"name";s:2:"md";s:5:"value";s:0:"";s:10:"is_visible";s:1:"1";s:12:"is_variation";s:1:"1";s:11:"is_taxonomy";s:1:"1";}}'),
(652, 85, 'attribute_pa_size', 'sm'),
(653, 85, '_price', '18.99'),
(654, 85, '_regular_price', '18.99'),
(655, 85, '_product_attributes', 'a:1:{s:7:"pa_size";a:5:{s:4:"name";s:2:"sm";s:5:"value";s:0:"";s:10:"is_visible";s:1:"1";s:12:"is_variation";s:1:"1";s:11:"is_taxonomy";s:1:"1";}}'),
(663, 89, '_wp_attached_file', 'http://img5a.flixcart.com/image/bedsheet/c/y/v/he3016-home-ecstasy-flat-he3016-set-with-two-pillow-covers-1100x1100-imadqhanu3bgrs58.jpeg'),
(693, 92, '_wp_attached_file', '2015/05/slide13.jpg'),
(694, 92, '_wp_attachment_metadata', ''),
(725, 21, '_gallery_link_url', 'http://sem3-idn.s3-website-us-east-1.amazonaws.com/20b3633e350bc2ca499e4d07b0a83a13,0.jpg'),
(726, 21, '_gallery_link_target', ''),
(727, 21, '_gallery_link_preserve_click', 'remove'),
(728, 21, '_gallery_link_additional_css_classes', ''),
(729, 21, '_edit_lock', '1431930949:1'),
(730, 21, '_edit_last', '1'),
(795, 36, 'ratings_users', '1'),
(796, 36, 'ratings_score', '5'),
(797, 36, 'ratings_average', '5'),
(798, 96, '_edit_lock', '1432201523:1'),
(799, 96, '_edit_last', '1'),
(800, 96, '_visibility', 'visible'),
(801, 96, '_stock_status', 'instock'),
(802, 96, 'total_sales', '0'),
(803, 96, '_downloadable', 'no'),
(804, 96, '_virtual', 'no'),
(805, 96, '_regular_price', '10'),
(806, 96, '_sale_price', ''),
(807, 96, '_purchase_note', ''),
(808, 96, '_featured', 'no'),
(809, 96, '_weight', ''),
(810, 96, '_length', ''),
(811, 96, '_width', ''),
(812, 96, '_height', ''),
(813, 96, '_sku', ''),
(814, 96, '_product_attributes', 'a:0:{}'),
(815, 96, '_sale_price_dates_from', ''),
(816, 96, '_sale_price_dates_to', ''),
(817, 96, '_price', '10'),
(818, 96, '_sold_individually', ''),
(819, 96, '_manage_stock', 'no'),
(820, 96, '_backorders', 'no'),
(821, 96, '_stock', ''),
(822, 96, '_upsell_ids', 'a:0:{}'),
(823, 96, '_crosssell_ids', 'a:0:{}'),
(824, 96, '_product_image_gallery', ''),
(825, 97, '_edit_lock', '1432201508:1'),
(826, 97, '_edit_last', '1'),
(827, 97, '_visibility', 'visible'),
(828, 97, '_stock_status', 'instock'),
(829, 97, 'total_sales', '0'),
(830, 97, '_downloadable', 'no'),
(831, 97, '_virtual', 'no'),
(832, 97, '_regular_price', '300'),
(833, 97, '_sale_price', ''),
(834, 97, '_purchase_note', ''),
(835, 97, '_featured', 'no'),
(836, 97, '_weight', ''),
(837, 97, '_length', ''),
(838, 97, '_width', ''),
(839, 97, '_height', ''),
(840, 97, '_sku', ''),
(841, 97, '_product_attributes', 'a:0:{}'),
(842, 97, '_sale_price_dates_from', ''),
(843, 97, '_sale_price_dates_to', ''),
(844, 97, '_price', '300'),
(845, 97, '_sold_individually', ''),
(846, 97, '_manage_stock', 'no'),
(847, 97, '_backorders', 'no'),
(848, 97, '_stock', ''),
(849, 97, '_upsell_ids', 'a:0:{}'),
(850, 97, '_crosssell_ids', 'a:0:{}'),
(851, 97, '_product_image_gallery', ''),
(852, 97, '_thumbnail_id', '23'),
(853, 36, '_thumbnail_ext_url', 'http://images.prosperentcdn.com/images/250x250/www.brandsmartusa.com/images/product/large/51924.jpg'),
(854, 36, '_thumbnail_id', 'by_url'),
(855, 99, '_menu_item_type', 'post_type'),
(856, 99, '_menu_item_menu_item_parent', '0'),
(857, 99, '_menu_item_object_id', '25'),
(858, 99, '_menu_item_object', 'page'),
(859, 99, '_menu_item_target', ''),
(860, 99, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(861, 99, '_menu_item_xfn', ''),
(862, 99, '_menu_item_url', ''),
(864, 100, '_menu_item_type', 'post_type'),
(865, 100, '_menu_item_menu_item_parent', '99'),
(866, 100, '_menu_item_object_id', '11'),
(867, 100, '_menu_item_object', 'page'),
(868, 100, '_menu_item_target', ''),
(869, 100, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(870, 100, '_menu_item_xfn', ''),
(871, 100, '_menu_item_url', ''),
(873, 101, '_menu_item_type', 'post_type'),
(874, 101, '_menu_item_menu_item_parent', '0'),
(875, 101, '_menu_item_object_id', '7'),
(876, 101, '_menu_item_object', 'page'),
(877, 101, '_menu_item_target', ''),
(878, 101, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(879, 101, '_menu_item_xfn', ''),
(880, 101, '_menu_item_url', ''),
(882, 102, '_menu_item_type', 'post_type'),
(883, 102, '_menu_item_menu_item_parent', '99'),
(884, 102, '_menu_item_object_id', '7'),
(885, 102, '_menu_item_object', 'page'),
(886, 102, '_menu_item_target', ''),
(887, 102, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(888, 102, '_menu_item_xfn', ''),
(889, 102, '_menu_item_url', ''),
(891, 103, '_menu_item_type', 'post_type'),
(892, 103, '_menu_item_menu_item_parent', '0'),
(893, 103, '_menu_item_object_id', '6'),
(894, 103, '_menu_item_object', 'page'),
(895, 103, '_menu_item_target', ''),
(896, 103, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(897, 103, '_menu_item_xfn', ''),
(898, 103, '_menu_item_url', ''),
(900, 105, '_edit_lock', '1432213579:1'),
(901, 105, '_edit_last', '1'),
(902, 105, '_visibility', 'visible'),
(903, 105, '_stock_status', 'instock'),
(904, 105, '_downloadable', 'no'),
(905, 105, '_virtual', 'no'),
(906, 105, '_regular_price', '10'),
(907, 105, '_sale_price', ''),
(908, 105, '_purchase_note', ''),
(909, 105, '_featured', 'no'),
(910, 105, '_weight', ''),
(911, 105, '_length', ''),
(912, 105, '_width', ''),
(913, 105, '_height', ''),
(914, 105, '_sku', ''),
(915, 105, '_product_attributes', 'a:0:{}'),
(916, 105, '_sale_price_dates_from', ''),
(917, 105, '_sale_price_dates_to', ''),
(918, 105, '_price', '10'),
(919, 105, '_sold_individually', ''),
(920, 105, '_manage_stock', 'no'),
(921, 105, '_backorders', 'no'),
(922, 105, '_stock', ''),
(923, 105, '_upsell_ids', 'a:0:{}'),
(924, 105, '_crosssell_ids', 'a:0:{}'),
(925, 105, '_product_image_gallery', ''),
(931, 105, 'total_sales', '0'),
(932, 106, '_edit_lock', '1432213044:1'),
(933, 106, '_edit_last', '1'),
(934, 106, '_visibility', 'visible'),
(935, 106, '_stock_status', 'instock'),
(936, 106, '_downloadable', 'no'),
(937, 106, '_virtual', 'no'),
(938, 106, '_regular_price', '300'),
(939, 106, '_sale_price', ''),
(940, 106, '_purchase_note', ''),
(941, 106, '_featured', 'no'),
(942, 106, '_weight', ''),
(943, 106, '_length', ''),
(944, 106, '_width', ''),
(945, 106, '_height', ''),
(946, 106, '_sku', ''),
(947, 106, '_product_attributes', 'a:0:{}'),
(948, 106, '_sale_price_dates_from', ''),
(949, 106, '_sale_price_dates_to', ''),
(950, 106, '_price', '300'),
(951, 106, '_sold_individually', ''),
(952, 106, '_manage_stock', 'no'),
(953, 106, '_backorders', 'no'),
(954, 106, '_stock', ''),
(955, 106, '_upsell_ids', 'a:0:{}'),
(956, 106, '_crosssell_ids', 'a:0:{}'),
(957, 106, '_product_image_gallery', ''),
(958, 106, '_thumbnail_id', '23'),
(963, 106, 'total_sales', '0'),
(965, 107, '_edit_last', '1'),
(966, 107, '_visibility', 'visible'),
(967, 107, '_stock_status', 'instock'),
(968, 107, '_downloadable', 'no'),
(969, 107, '_virtual', 'no'),
(970, 107, '_regular_price', '300'),
(971, 107, '_sale_price', '120'),
(972, 107, '_purchase_note', ''),
(973, 107, '_featured', 'no'),
(974, 107, '_weight', ''),
(975, 107, '_length', ''),
(976, 107, '_width', ''),
(977, 107, '_height', ''),
(978, 107, '_sku', ''),
(979, 107, '_product_attributes', 'a:1:{s:7:"pa_size";a:6:{s:4:"name";s:7:"pa_size";s:5:"value";s:0:"";s:8:"position";s:1:"0";s:10:"is_visible";i:1;s:12:"is_variation";i:0;s:11:"is_taxonomy";i:1;}}'),
(980, 107, '_sale_price_dates_from', ''),
(981, 107, '_sale_price_dates_to', ''),
(982, 107, '_price', '120'),
(983, 107, '_sold_individually', ''),
(984, 107, '_manage_stock', 'no'),
(985, 107, '_backorders', 'no'),
(986, 107, '_stock', ''),
(987, 107, '_upsell_ids', 'a:0:{}'),
(988, 107, '_crosssell_ids', 'a:0:{}'),
(989, 107, '_product_image_gallery', ''),
(995, 107, 'total_sales', '0'),
(1060, 110, '_wp_attached_file', '2015/05/slide19.jpg'),
(1061, 110, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:212;s:6:"height";i:212;s:4:"file";s:19:"2015/05/slide19.jpg";s:5:"sizes";a:3:{s:9:"thumbnail";a:4:{s:4:"file";s:19:"slide19-150x150.jpg";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}s:21:"yith-woocompare-image";a:4:{s:4:"file";s:19:"slide19-212x154.jpg";s:5:"width";i:212;s:6:"height";i:154;s:9:"mime-type";s:10:"image/jpeg";}s:14:"shop_thumbnail";a:4:{s:4:"file";s:19:"slide19-180x180.jpg";s:5:"width";i:180;s:6:"height";i:180;s:9:"mime-type";s:10:"image/jpeg";}}s:10:"image_meta";a:11:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";s:11:"orientation";i:0;}}'),
(1063, 111, '_wp_attached_file', '2015/05/slide18.jpg'),
(1064, 111, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:212;s:6:"height";i:212;s:4:"file";s:19:"2015/05/slide18.jpg";s:5:"sizes";a:3:{s:9:"thumbnail";a:4:{s:4:"file";s:19:"slide18-150x150.jpg";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}s:21:"yith-woocompare-image";a:4:{s:4:"file";s:19:"slide18-212x154.jpg";s:5:"width";i:212;s:6:"height";i:154;s:9:"mime-type";s:10:"image/jpeg";}s:14:"shop_thumbnail";a:4:{s:4:"file";s:19:"slide18-180x180.jpg";s:5:"width";i:180;s:6:"height";i:180;s:9:"mime-type";s:10:"image/jpeg";}}s:10:"image_meta";a:11:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";s:11:"orientation";i:0;}}'),
(1066, 112, '_wp_attached_file', '2015/05/slide17.jpg'),
(1067, 112, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:212;s:6:"height";i:212;s:4:"file";s:19:"2015/05/slide17.jpg";s:5:"sizes";a:3:{s:9:"thumbnail";a:4:{s:4:"file";s:19:"slide17-150x150.jpg";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}s:21:"yith-woocompare-image";a:4:{s:4:"file";s:19:"slide17-212x154.jpg";s:5:"width";i:212;s:6:"height";i:154;s:9:"mime-type";s:10:"image/jpeg";}s:14:"shop_thumbnail";a:4:{s:4:"file";s:19:"slide17-180x180.jpg";s:5:"width";i:180;s:6:"height";i:180;s:9:"mime-type";s:10:"image/jpeg";}}s:10:"image_meta";a:11:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";s:11:"orientation";i:0;}}'),
(1068, 107, '_thumbnail_id', '112'),
(1069, 113, '_wp_attached_file', '2015/05/slide14.jpg'),
(1070, 113, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:212;s:6:"height";i:212;s:4:"file";s:19:"2015/05/slide14.jpg";s:5:"sizes";a:3:{s:9:"thumbnail";a:4:{s:4:"file";s:19:"slide14-150x150.jpg";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}s:21:"yith-woocompare-image";a:4:{s:4:"file";s:19:"slide14-212x154.jpg";s:5:"width";i:212;s:6:"height";i:154;s:9:"mime-type";s:10:"image/jpeg";}s:14:"shop_thumbnail";a:4:{s:4:"file";s:19:"slide14-180x180.jpg";s:5:"width";i:180;s:6:"height";i:180;s:9:"mime-type";s:10:"image/jpeg";}}s:10:"image_meta";a:11:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";s:11:"orientation";i:0;}}'),
(1071, 105, '_thumbnail_id', '113'),
(1099, 116, '_edit_lock', '1432646567:1'),
(1100, 116, '_edit_last', '1'),
(1101, 116, '_wp_page_template', 'changepassword.php'),
(1102, 116, 'ratings_users', '0'),
(1103, 116, 'ratings_score', '0'),
(1104, 116, 'ratings_average', '0'),
(1133, 119, '_edit_lock', '1433422048:1'),
(1134, 119, '_edit_last', '1'),
(1135, 119, '_wp_page_template', 'shopbyroom.php'),
(1136, 119, 'ratings_users', '0'),
(1137, 119, 'ratings_score', '0'),
(1138, 119, 'ratings_average', '0'),
(1254, 131, '_edit_last', '1'),
(1255, 131, '_wp_page_template', 'default'),
(1256, 131, 'ratings_users', '0'),
(1257, 131, 'ratings_score', '0'),
(1258, 131, 'ratings_average', '0'),
(1259, 131, '_edit_lock', '1436094269:1'),
(1261, 4, '_edit_lock', '1436531755:1'),
(1263, 138, '_edit_lock', '1436447915:1'),
(1264, 138, '_edit_last', '1'),
(1265, 138, '_wp_page_template', 'mycompare.php'),
(1266, 138, 'ratings_users', '0'),
(1267, 138, 'ratings_score', '0'),
(1268, 138, 'ratings_average', '0'),
(1303, 145, '_wp_attached_file', '2015/06/apartment_big_image_01.jpg'),
(1304, 145, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:1920;s:6:"height";i:1080;s:4:"file";s:34:"2015/06/apartment_big_image_01.jpg";s:5:"sizes";a:8:{s:9:"thumbnail";a:4:{s:4:"file";s:34:"apartment_big_image_01-150x150.jpg";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}s:6:"medium";a:4:{s:4:"file";s:34:"apartment_big_image_01-300x169.jpg";s:5:"width";i:300;s:6:"height";i:169;s:9:"mime-type";s:10:"image/jpeg";}s:5:"large";a:4:{s:4:"file";s:35:"apartment_big_image_01-1024x576.jpg";s:5:"width";i:1024;s:6:"height";i:576;s:9:"mime-type";s:10:"image/jpeg";}s:21:"yith-woocompare-image";a:4:{s:4:"file";s:34:"apartment_big_image_01-220x154.jpg";s:5:"width";i:220;s:6:"height";i:154;s:9:"mime-type";s:10:"image/jpeg";}s:14:"shop_thumbnail";a:4:{s:4:"file";s:34:"apartment_big_image_01-180x180.jpg";s:5:"width";i:180;s:6:"height";i:180;s:9:"mime-type";s:10:"image/jpeg";}s:12:"shop_catalog";a:4:{s:4:"file";s:34:"apartment_big_image_01-300x300.jpg";s:5:"width";i:300;s:6:"height";i:300;s:9:"mime-type";s:10:"image/jpeg";}s:11:"shop_single";a:4:{s:4:"file";s:34:"apartment_big_image_01-600x600.jpg";s:5:"width";i:600;s:6:"height";i:600;s:9:"mime-type";s:10:"image/jpeg";}s:14:"shop_magnifier";a:4:{s:4:"file";s:34:"apartment_big_image_01-600x600.jpg";s:5:"width";i:600;s:6:"height";i:600;s:9:"mime-type";s:10:"image/jpeg";}}s:10:"image_meta";a:11:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";s:11:"orientation";i:1;}}'),
(1341, 152, '_edit_last', '1'),
(1342, 152, '_edit_lock', '1435060762:1'),
(1343, 152, '_wp_page_template', 'prosperent.php'),
(1344, 152, 'ratings_users', '0'),
(1345, 152, 'ratings_score', '0'),
(1346, 152, 'ratings_average', '0'),
(1347, 154, '_edit_last', '1'),
(1348, 154, '_edit_lock', '1435060951:1'),
(1349, 154, '_wp_page_template', 'check.php'),
(1350, 154, 'ratings_users', '0'),
(1351, 154, 'ratings_score', '0'),
(1352, 154, 'ratings_average', '0'),
(1371, 106, '_wp_trash_meta_status', 'publish'),
(1372, 106, '_wp_trash_meta_time', '1435231491'),
(1373, 105, '_wp_trash_meta_status', 'publish'),
(1374, 105, '_wp_trash_meta_time', '1435231491'),
(1375, 97, '_wp_trash_meta_status', 'publish'),
(1376, 97, '_wp_trash_meta_time', '1435231491'),
(1377, 96, '_wp_trash_meta_status', 'publish'),
(1378, 96, '_wp_trash_meta_time', '1435231492'),
(1379, 36, '_wp_trash_meta_status', 'publish'),
(1380, 36, '_wp_trash_meta_time', '1435231492'),
(1381, 156, '_edit_last', '1'),
(1382, 156, '_edit_lock', '1437714492:1'),
(1383, 156, '_thumbnail_id', '145'),
(1384, 156, '_product_attributes', 'a:1:{s:8:"pa_color";a:6:{s:4:"name";s:8:"pa_color";s:5:"value";s:0:"";s:8:"position";s:1:"0";s:10:"is_visible";i:1;s:12:"is_variation";i:0;s:11:"is_taxonomy";i:1;}}'),
(1385, 156, '_visibility', 'visible'),
(1386, 156, '_stock_status', 'instock'),
(1409, 157, '_edit_last', '1'),
(1410, 157, '_edit_lock', '1437649601:1'),
(1411, 157, '_thumbnail_id', '112'),
(1412, 157, '_visibility', 'visible'),
(1413, 157, '_stock_status', 'instock'),
(1414, 157, 'total_sales', '0'),
(1415, 157, '_downloadable', 'no'),
(1416, 157, '_virtual', 'no'),
(1417, 157, '_regular_price', '350'),
(1418, 157, '_sale_price', '240'),
(1419, 157, '_purchase_note', ''),
(1420, 157, '_featured', 'no'),
(1421, 157, '_weight', ''),
(1422, 157, '_length', ''),
(1423, 157, '_width', ''),
(1424, 157, '_height', ''),
(1425, 157, '_sku', ''),
(1426, 157, '_product_attributes', 'a:2:{s:8:"pa_color";a:6:{s:4:"name";s:8:"pa_color";s:5:"value";s:0:"";s:8:"position";s:1:"0";s:10:"is_visible";i:1;s:12:"is_variation";i:0;s:11:"is_taxonomy";i:1;}s:8:"pa_brand";a:6:{s:4:"name";s:8:"pa_brand";s:5:"value";s:0:"";s:8:"position";s:1:"1";s:10:"is_visible";i:1;s:12:"is_variation";i:0;s:11:"is_taxonomy";i:1;}}'),
(1427, 157, '_sale_price_dates_from', ''),
(1428, 157, '_sale_price_dates_to', ''),
(1429, 157, '_price', '240'),
(1430, 157, '_sold_individually', ''),
(1431, 157, '_manage_stock', 'no'),
(1432, 157, '_backorders', 'no'),
(1433, 157, '_stock', ''),
(1434, 157, '_upsell_ids', 'a:0:{}'),
(1435, 157, '_crosssell_ids', 'a:0:{}'),
(1436, 157, '_product_image_gallery', ''),
(1437, 158, '_edit_last', '1'),
(1438, 158, '_edit_lock', '1436793376:1'),
(1439, 158, '_product_attributes', 'a:1:{s:8:"pa_brand";a:6:{s:4:"name";s:8:"pa_brand";s:5:"value";s:0:"";s:8:"position";s:1:"0";s:10:"is_visible";i:1;s:12:"is_variation";i:0;s:11:"is_taxonomy";i:1;}}'),
(1440, 158, '_thumbnail_id', '23'),
(1441, 158, '_visibility', 'visible'),
(1442, 158, '_stock_status', 'instock'),
(1443, 158, 'total_sales', '0'),
(1444, 158, '_downloadable', 'no'),
(1445, 158, '_virtual', 'no'),
(1446, 158, '_regular_price', '98'),
(1447, 158, '_sale_price', ''),
(1448, 158, '_purchase_note', ''),
(1449, 158, '_featured', 'no'),
(1450, 158, '_weight', ''),
(1451, 158, '_length', ''),
(1452, 158, '_width', ''),
(1453, 158, '_height', ''),
(1454, 158, '_sku', ''),
(1455, 158, '_sale_price_dates_from', ''),
(1456, 158, '_sale_price_dates_to', ''),
(1457, 158, '_price', '98'),
(1458, 158, '_sold_individually', ''),
(1459, 158, '_manage_stock', 'no'),
(1460, 158, '_backorders', 'no'),
(1461, 158, '_stock', ''),
(1462, 158, '_upsell_ids', 'a:0:{}'),
(1463, 158, '_crosssell_ids', 'a:0:{}'),
(1464, 158, '_product_image_gallery', ''),
(1465, 159, '_edit_last', '1'),
(1466, 159, '_edit_lock', '1437647783:1'),
(1467, 159, '_thumbnail_id', '10'),
(1468, 159, '_visibility', 'visible'),
(1469, 159, '_stock_status', 'instock'),
(1470, 159, 'total_sales', '0'),
(1471, 159, '_downloadable', 'no'),
(1472, 159, '_virtual', 'no'),
(1473, 159, '_regular_price', '78'),
(1474, 159, '_sale_price', ''),
(1475, 159, '_purchase_note', ''),
(1476, 159, '_featured', 'no'),
(1477, 159, '_weight', ''),
(1478, 159, '_length', ''),
(1479, 159, '_width', ''),
(1480, 159, '_height', ''),
(1481, 159, '_sku', ''),
(1482, 159, '_product_attributes', 'a:1:{s:8:"pa_color";a:6:{s:4:"name";s:8:"pa_color";s:5:"value";s:0:"";s:8:"position";s:1:"0";s:10:"is_visible";i:1;s:12:"is_variation";i:0;s:11:"is_taxonomy";i:1;}}'),
(1483, 159, '_sale_price_dates_from', ''),
(1484, 159, '_sale_price_dates_to', ''),
(1485, 159, '_price', '78'),
(1486, 159, '_sold_individually', ''),
(1487, 159, '_manage_stock', 'no'),
(1488, 159, '_backorders', 'no'),
(1489, 159, '_stock', ''),
(1490, 159, '_upsell_ids', 'a:0:{}'),
(1491, 159, '_crosssell_ids', 'a:0:{}'),
(1492, 159, '_product_image_gallery', ''),
(1493, 160, '_edit_last', '1'),
(1494, 160, '_edit_lock', '1437116792:1'),
(1495, 160, '_thumbnail_id', '17'),
(1496, 160, '_visibility', 'visible'),
(1497, 160, '_stock_status', 'instock'),
(1498, 160, 'total_sales', '0'),
(1499, 160, '_downloadable', 'no'),
(1500, 160, '_virtual', 'no'),
(1501, 160, '_regular_price', '150'),
(1502, 160, '_sale_price', ''),
(1503, 160, '_purchase_note', ''),
(1504, 160, '_featured', 'no'),
(1505, 160, '_weight', ''),
(1506, 160, '_length', ''),
(1507, 160, '_width', ''),
(1508, 160, '_height', ''),
(1509, 160, '_sku', ''),
(1510, 160, '_product_attributes', 'a:2:{s:7:"pa_size";a:6:{s:4:"name";s:7:"pa_size";s:5:"value";s:0:"";s:8:"position";s:1:"0";s:10:"is_visible";i:1;s:12:"is_variation";i:0;s:11:"is_taxonomy";i:1;}s:8:"pa_brand";a:6:{s:4:"name";s:8:"pa_brand";s:5:"value";s:0:"";s:8:"position";s:1:"2";s:10:"is_visible";i:1;s:12:"is_variation";i:0;s:11:"is_taxonomy";i:1;}}'),
(1511, 160, '_sale_price_dates_from', ''),
(1512, 160, '_sale_price_dates_to', ''),
(1513, 160, '_price', '150'),
(1514, 160, '_sold_individually', ''),
(1515, 160, '_manage_stock', 'no'),
(1516, 160, '_backorders', 'no'),
(1517, 160, '_stock', ''),
(1518, 160, '_upsell_ids', 'a:0:{}'),
(1519, 160, '_crosssell_ids', 'a:0:{}'),
(1520, 160, '_product_image_gallery', ''),
(1521, 152, '_wp_trash_meta_status', 'publish'),
(1522, 152, '_wp_trash_meta_time', '1435298574'),
(1523, 154, '_wp_trash_meta_status', 'publish'),
(1524, 154, '_wp_trash_meta_time', '1435298576'),
(1525, 161, '_edit_last', '1'),
(1526, 161, '_edit_lock', '1435298866:1'),
(1527, 161, '_wp_page_template', 'mytest.php'),
(1528, 161, 'ratings_users', '0'),
(1529, 161, 'ratings_score', '0'),
(1530, 161, 'ratings_average', '0'),
(1531, 164, '_edit_last', '1'),
(1532, 164, '_edit_lock', '1435304441:1'),
(1535, 164, 'ratings_users', '0'),
(1536, 164, 'ratings_score', '0'),
(1537, 164, 'ratings_average', '0'),
(1540, 1, '_edit_last', '1'),
(1543, 1, 'ratings_users', '0'),
(1544, 1, 'ratings_score', '0'),
(1545, 1, 'ratings_average', '0'),
(1546, 1, 'my_number', '4'),
(1547, 168, '_edit_last', '1'),
(1548, 168, '_edit_lock', '1436094596:1'),
(1549, 168, '_wp_page_template', 'mywishlist.php'),
(1550, 168, 'ratings_users', '0'),
(1551, 168, 'ratings_score', '0'),
(1552, 168, 'ratings_average', '0'),
(1553, 158, '_product_url', 'http://www.google.com'),
(1554, 158, '_button_text', ''),
(1555, 171, '_edit_last', '1'),
(1556, 171, '_visibility', 'visible'),
(1557, 171, '_stock_status', 'instock'),
(1558, 156, '_regular_price', '85'),
(1559, 156, '_sale_price', '75'),
(1560, 156, '_sku', ''),
(1561, 172, '_edit_last', '1'),
(1562, 172, '_edit_lock', '1436088195:1'),
(1563, 173, '_edit_last', '1'),
(1564, 173, '_edit_lock', '1436090494:1'),
(1565, 173, '_wp_page_template', 'wisssssssssssss.php'),
(1566, 173, 'ratings_users', '0'),
(1567, 173, 'ratings_score', '0'),
(1568, 173, 'ratings_average', '0'),
(1569, 177, '_edit_last', '1'),
(1570, 177, '_edit_lock', '1436090969:1'),
(1573, 177, 'ratings_users', '0'),
(1574, 177, 'ratings_score', '0'),
(1575, 177, 'ratings_average', '0'),
(1576, 179, '_edit_last', '1'),
(1577, 179, '_edit_lock', '1436090998:1'),
(1578, 179, '_visibility', 'visible'),
(1579, 179, '_stock_status', 'instock'),
(1580, 179, 'total_sales', '0'),
(1581, 179, '_downloadable', 'no'),
(1582, 179, '_virtual', 'no'),
(1583, 179, '_regular_price', ''),
(1584, 179, '_sale_price', ''),
(1585, 179, '_purchase_note', ''),
(1586, 179, '_featured', 'no'),
(1587, 179, '_weight', ''),
(1588, 179, '_length', ''),
(1589, 179, '_width', ''),
(1590, 179, '_height', ''),
(1591, 179, '_sku', ''),
(1592, 179, '_product_attributes', 'a:0:{}'),
(1593, 179, '_sale_price_dates_from', ''),
(1594, 179, '_sale_price_dates_to', ''),
(1595, 179, '_price', ''),
(1596, 179, '_sold_individually', ''),
(1597, 179, '_manage_stock', 'no'),
(1598, 179, '_backorders', 'no'),
(1599, 179, '_stock', ''),
(1600, 179, '_upsell_ids', 'a:0:{}'),
(1601, 179, '_crosssell_ids', 'a:0:{}'),
(1602, 179, '_product_image_gallery', ''),
(1603, 180, '_edit_last', '1'),
(1604, 180, '_edit_lock', '1436100799:1'),
(1605, 180, '_wp_page_template', 'default'),
(1606, 180, 'ratings_users', '0'),
(1607, 180, 'ratings_score', '0'),
(1608, 180, 'ratings_average', '0'),
(1609, 182, '_edit_last', '1'),
(1610, 182, '_edit_lock', '1437717624:1'),
(1612, 182, '_visibility', 'visible'),
(1613, 182, '_stock_status', 'instock'),
(1614, 182, 'total_sales', '0'),
(1615, 182, '_downloadable', 'no'),
(1616, 182, '_virtual', 'no'),
(1617, 182, '_regular_price', '100'),
(1618, 182, '_sale_price', '100'),
(1619, 182, '_purchase_note', ''),
(1620, 182, '_featured', 'no'),
(1621, 182, '_weight', ''),
(1622, 182, '_length', ''),
(1623, 182, '_width', ''),
(1624, 182, '_height', ''),
(1625, 182, '_sku', ''),
(1626, 182, '_sale_price_dates_from', ''),
(1627, 182, '_sale_price_dates_to', ''),
(1628, 182, '_price', '100'),
(1629, 182, '_sold_individually', ''),
(1630, 182, '_manage_stock', 'no'),
(1631, 182, '_backorders', 'no'),
(1632, 182, '_stock', ''),
(1633, 182, '_upsell_ids', 'a:0:{}'),
(1634, 182, '_crosssell_ids', 'a:0:{}'),
(1635, 182, '_product_image_gallery', ''),
(1636, 182, '_product_attributes', 'a:1:{s:7:"pa_size";a:6:{s:4:"name";s:7:"pa_size";s:5:"value";s:0:"";s:8:"position";s:1:"0";s:10:"is_visible";i:1;s:12:"is_variation";i:0;s:11:"is_taxonomy";i:1;}}'),
(1637, 184, '_edit_last', '1'),
(1638, 184, '_edit_lock', '1436530010:1'),
(1639, 185, '_edit_last', '1'),
(1640, 185, '_edit_lock', '1436530116:1'),
(1641, 185, '_wp_page_template', 'default'),
(1642, 185, 'ratings_users', '0'),
(1643, 185, 'ratings_score', '0'),
(1644, 185, 'ratings_average', '0'),
(1645, 185, '_wp_trash_meta_status', 'publish'),
(1646, 185, '_wp_trash_meta_time', '1436530287'),
(1647, 187, '_edit_last', '1'),
(1648, 187, '_edit_lock', '1436530971:1'),
(1649, 187, '_wp_page_template', 'archive-product.php'),
(1650, 187, 'ratings_users', '0'),
(1651, 187, 'ratings_score', '0'),
(1652, 187, 'ratings_average', '0'),
(1653, 4, '_edit_last', '1'),
(1654, 4, '_wp_page_template', 'archive-product.php'),
(1655, 4, 'ratings_users', '0'),
(1656, 4, 'ratings_score', '0'),
(1657, 4, 'ratings_average', '0'),
(1658, 156, 'total_sales', '0'),
(1659, 156, '_downloadable', 'no'),
(1660, 156, '_virtual', 'no'),
(1661, 156, '_purchase_note', ''),
(1662, 156, '_featured', 'no'),
(1663, 156, '_weight', ''),
(1664, 156, '_length', ''),
(1665, 156, '_width', ''),
(1666, 156, '_height', ''),
(1667, 156, '_sale_price_dates_from', ''),
(1668, 156, '_sale_price_dates_to', ''),
(1669, 156, '_price', '75'),
(1670, 156, '_sold_individually', ''),
(1671, 156, '_manage_stock', 'no'),
(1672, 156, '_backorders', 'no'),
(1673, 156, '_stock', ''),
(1674, 156, '_upsell_ids', 'a:0:{}'),
(1675, 156, '_crosssell_ids', 'a:0:{}'),
(1676, 156, '_product_image_gallery', ''),
(1677, 156, 'ratings_users', '1'),
(1678, 156, 'ratings_score', '4'),
(1679, 156, 'ratings_average', '4'),
(1680, 158, 'ratings_users', '1'),
(1681, 158, 'ratings_score', '3'),
(1682, 158, 'ratings_average', '3'),
(1683, 160, 'post_views_count', '23'),
(1684, 190, '_edit_last', '1'),
(1685, 190, '_edit_lock', '1436857201:1'),
(1686, 190, '_visibility', 'visible'),
(1687, 190, '_stock_status', 'instock'),
(1688, 190, 'total_sales', '0'),
(1689, 190, '_downloadable', 'no'),
(1690, 190, '_virtual', 'no'),
(1691, 190, '_regular_price', '54'),
(1692, 190, '_sale_price', ''),
(1693, 190, '_purchase_note', ''),
(1694, 190, '_featured', 'no'),
(1695, 190, '_weight', ''),
(1696, 190, '_length', ''),
(1697, 190, '_width', ''),
(1698, 190, '_height', ''),
(1699, 190, '_sku', ''),
(1700, 190, '_product_attributes', 'a:0:{}'),
(1701, 190, '_sale_price_dates_from', ''),
(1702, 190, '_sale_price_dates_to', ''),
(1703, 190, '_price', '54'),
(1704, 190, '_sold_individually', ''),
(1705, 190, '_manage_stock', 'no'),
(1706, 190, '_backorders', 'no'),
(1707, 190, '_stock', ''),
(1708, 190, '_upsell_ids', 'a:0:{}'),
(1709, 190, '_crosssell_ids', 'a:0:{}'),
(1710, 190, '_product_image_gallery', ''),
(1711, 190, 'post_views_count', '4'),
(1712, 190, 'ratings_users', '1'),
(1713, 190, 'ratings_score', '3'),
(1714, 190, 'ratings_average', '3'),
(1715, 191, '_edit_last', '1'),
(1716, 191, '_edit_lock', '1436857428:1'),
(1717, 191, '_visibility', 'visible'),
(1718, 191, '_stock_status', 'instock'),
(1719, 191, 'total_sales', '0'),
(1720, 191, '_downloadable', 'no'),
(1721, 191, '_virtual', 'no'),
(1722, 191, '_regular_price', ''),
(1723, 191, '_sale_price', ''),
(1724, 191, '_purchase_note', ''),
(1725, 191, '_featured', 'no'),
(1726, 191, '_weight', ''),
(1727, 191, '_length', ''),
(1728, 191, '_width', ''),
(1729, 191, '_height', ''),
(1730, 191, '_sku', ''),
(1731, 191, '_product_attributes', 'a:0:{}'),
(1732, 191, '_sale_price_dates_from', ''),
(1733, 191, '_sale_price_dates_to', ''),
(1734, 191, '_price', ''),
(1735, 191, '_sold_individually', ''),
(1736, 191, '_manage_stock', 'no'),
(1737, 191, '_backorders', 'no'),
(1738, 191, '_stock', ''),
(1739, 191, '_upsell_ids', 'a:0:{}'),
(1740, 191, '_crosssell_ids', 'a:0:{}'),
(1741, 191, '_product_image_gallery', ''),
(1742, 182, 'post_views_count', '7'),
(1743, 191, 'post_views_count', '8'),
(1744, 192, '_edit_last', '1'),
(1745, 192, '_edit_lock', '1437116357:1'),
(1746, 192, '_wp_page_template', 'filtertheme.php'),
(1747, 192, 'ratings_users', '0'),
(1748, 192, 'ratings_score', '0'),
(1749, 192, 'ratings_average', '0'),
(1750, 158, 'post_views_count', '3'),
(1751, 159, 'post_views_count', '85'),
(1752, 196, '_edit_last', '1'),
(1753, 196, '_edit_lock', '1437373004:1'),
(1754, 196, '_wp_page_template', 'filternew.php'),
(1755, 196, 'ratings_users', '0'),
(1756, 196, 'ratings_score', '0'),
(1757, 196, 'ratings_average', '0'),
(1758, 198, '_edit_last', '1'),
(1759, 198, '_edit_lock', '1437373158:1'),
(1760, 198, '_wp_page_template', 'filtersale.php'),
(1761, 198, 'ratings_users', '0'),
(1762, 198, 'ratings_score', '0'),
(1763, 198, 'ratings_average', '0'),
(1764, 156, 'post_views_count', '25'),
(1765, 156, 'variation_id', '120'),
(1766, 159, 'variation_id', '120'),
(1767, 157, 'variation_id', '120'),
(1768, 157, 'post_views_count', '4'),
(1787, 202, '_menu_item_type', 'taxonomy'),
(1788, 202, '_menu_item_menu_item_parent', '0'),
(1789, 202, '_menu_item_object_id', '38'),
(1790, 202, '_menu_item_object', 'product_cat'),
(1791, 202, '_menu_item_target', ''),
(1792, 202, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(1793, 202, '_menu_item_xfn', ''),
(1794, 202, '_menu_item_url', ''),
(1814, 205, '_menu_item_type', 'taxonomy'),
(1815, 205, '_menu_item_menu_item_parent', '0'),
(1816, 205, '_menu_item_object_id', '58'),
(1817, 205, '_menu_item_object', 'product_cat'),
(1818, 205, '_menu_item_target', ''),
(1819, 205, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(1820, 205, '_menu_item_xfn', ''),
(1821, 205, '_menu_item_url', '');

-- --------------------------------------------------------

--
-- Table structure for table `wp_posts`
--

CREATE TABLE IF NOT EXISTS `wp_posts` (
`ID` bigint(20) unsigned NOT NULL,
  `post_author` bigint(20) unsigned NOT NULL DEFAULT '0',
  `post_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_date_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_excerpt` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'publish',
  `comment_status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'open',
  `ping_status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'open',
  `post_password` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `post_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `to_ping` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pinged` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_modified_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_content_filtered` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_parent` bigint(20) unsigned NOT NULL DEFAULT '0',
  `guid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `menu_order` int(11) NOT NULL DEFAULT '0',
  `post_type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'post',
  `post_mime_type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_count` bigint(20) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=206 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wp_posts`
--

INSERT INTO `wp_posts` (`ID`, `post_author`, `post_date`, `post_date_gmt`, `post_content`, `post_title`, `post_excerpt`, `post_status`, `comment_status`, `ping_status`, `post_password`, `post_name`, `to_ping`, `pinged`, `post_modified`, `post_modified_gmt`, `post_content_filtered`, `post_parent`, `guid`, `menu_order`, `post_type`, `post_mime_type`, `comment_count`) VALUES
(1, 1, '2015-05-07 12:17:27', '2015-05-07 12:17:27', 'Welcome to WordPress. This is your first post. Edit or delete it, then start blogging!', 'Hello world!', '', 'publish', 'open', 'open', '', 'hello-world', '', '', '2015-06-26 07:43:12', '2015-06-26 07:43:12', '', 0, 'http://localhost/jegadeesh/newxcluse/?p=1', 0, 'post', '', 1),
(2, 1, '2015-05-07 12:17:27', '2015-05-07 12:17:27', 'This is an example page. It''s different from a blog post because it will stay in one place and will show up in your site navigation (in most themes). Most people start with an About page that introduces them to potential site visitors. It might say something like this:\n\n<blockquote>Hi there! I''m a bike messenger by day, aspiring actor by night, and this is my blog. I live in Los Angeles, have a great dog named Jack, and I like pi&#241;a coladas. (And gettin'' caught in the rain.)</blockquote>\n\n...or something like this:\n\n<blockquote>The XYZ Doohickey Company was founded in 1971, and has been providing quality doohickeys to the public ever since. Located in Gotham City, XYZ employs over 2,000 people and does all kinds of awesome things for the Gotham community.</blockquote>\n\nAs a new WordPress user, you should go to <a href="http://localhost/jegadeesh/newxcluse/wp-admin/">your dashboard</a> to delete this page and create new pages for your content. Have fun!', 'Sample Page', '', 'publish', 'open', 'open', '', 'sample-page', '', '', '2015-05-07 12:17:27', '2015-05-07 12:17:27', '', 0, 'http://localhost/jegadeesh/newxcluse/?page_id=2', 0, 'page', '', 0),
(4, 1, '2015-05-07 12:21:38', '2015-05-07 12:21:38', '', 'Shop', '', 'publish', 'closed', 'open', '', 'shop', '', '', '2015-07-10 12:29:13', '2015-07-10 12:29:13', '', 0, 'http://localhost/jegadeesh/newxcluse/shop/', 0, 'page', '', 0),
(5, 1, '2015-05-07 12:21:39', '2015-05-07 12:21:39', '[woocommerce_cart]', 'Cart', '', 'publish', 'closed', 'open', '', 'cart', '', '', '2015-05-07 12:21:39', '2015-05-07 12:21:39', '', 0, 'http://localhost/jegadeesh/newxcluse/cart/', 0, 'page', '', 0),
(6, 1, '2015-05-07 12:21:39', '2015-05-07 12:21:39', '[woocommerce_checkout]', 'Checkout', '', 'publish', 'closed', 'open', '', 'checkout', '', '', '2015-05-07 12:21:39', '2015-05-07 12:21:39', '', 0, 'http://localhost/jegadeesh/newxcluse/checkout/', 0, 'page', '', 0),
(7, 1, '2015-05-07 12:21:39', '2015-05-07 12:21:39', '[woocommerce_my_account]', 'My Account', '', 'publish', 'closed', 'open', '', 'my-account', '', '', '2015-05-07 12:21:39', '2015-05-07 12:21:39', '', 0, 'http://localhost/jegadeesh/newxcluse/my-account/', 0, 'page', '', 0),
(10, 1, '2015-05-08 09:45:22', '2015-05-08 09:45:22', '', 'blog-1-large', '', 'inherit', 'open', 'open', '', 'blog-1-large', '', '', '2015-05-08 09:45:22', '2015-05-08 09:45:22', '', 0, 'http://localhost/jegadeesh/newxcluse/wp-content/uploads/2015/05/blog-1-large.png', 0, 'attachment', 'image/png', 0),
(12, 1, '2015-05-11 07:36:46', '2015-05-11 07:36:46', '', 'list1', '', 'inherit', 'open', 'open', '', 'list1', '', '', '2015-05-11 07:36:46', '2015-05-11 07:36:46', '', 0, 'http://localhost/jegadeesh/newxcluse/wp-content/uploads/2015/05/list1.jpg', 0, 'attachment', 'image/jpeg', 0),
(13, 1, '2015-05-11 07:36:56', '2015-05-11 07:36:56', '', 'list1-', '', 'inherit', 'open', 'open', '', 'list1-2', '', '', '2015-05-11 07:36:56', '2015-05-11 07:36:56', '', 0, 'http://localhost/jegadeesh/newxcluse/wp-content/uploads/2015/05/list1-.jpg', 0, 'attachment', 'image/jpeg', 0),
(16, 1, '2015-05-12 06:08:17', '2015-05-12 06:08:17', 'gdfgdfg dfgdfg dfgdfgdfg gdf', 'product5', '', 'trash', 'open', 'closed', '', 'product5', '', '', '2015-05-19 08:43:19', '2015-05-19 08:43:19', '', 0, 'http://localhost/jegadeesh/newxcluse/?post_type=product&#038;p=16', 0, 'product', '', 0),
(17, 1, '2015-05-12 06:08:02', '2015-05-12 06:08:02', '', 'slide2', '', 'inherit', 'open', 'open', '', 'slide2', '', '', '2015-05-12 06:08:02', '2015-05-12 06:08:02', '', 0, 'http://localhost/jegadeesh/newxcluse/wp-content/uploads/2015/05/slide2.jpg', 0, 'attachment', 'image/jpeg', 0),
(19, 1, '2015-05-12 06:08:36', '2015-05-12 06:08:36', '', 'slide9', '', 'inherit', 'open', 'open', '', 'slide9', '', '', '2015-05-12 06:08:36', '2015-05-12 06:08:36', '', 0, 'http://localhost/jegadeesh/newxcluse/wp-content/uploads/2015/05/slide9.jpg', 0, 'attachment', 'image/jpeg', 0),
(21, 1, '2015-05-12 06:09:10', '2015-05-12 06:09:10', '', 'slide5', '', 'inherit', 'open', 'open', '', 'slide5', '', '', '2015-05-18 06:02:37', '2015-05-18 06:02:37', '', 0, 'http://localhost/jegadeesh/newxcluse/wp-content/uploads/2015/05/slide5.jpg', 0, 'attachment', 'image/jpeg', 0),
(23, 1, '2015-05-12 06:09:47', '2015-05-12 06:09:47', '', 'slide8', '', 'inherit', 'open', 'open', '', 'slide8', '', '', '2015-05-12 06:09:47', '2015-05-12 06:09:47', '', 0, 'http://localhost/jegadeesh/newxcluse/wp-content/uploads/2015/05/slide8.jpg', 0, 'attachment', 'image/jpeg', 0),
(25, 1, '2015-05-14 10:30:46', '2015-05-14 10:30:46', '', 'prosperent', '', 'publish', 'open', 'open', '', 'prosperent', '', '', '2015-05-14 10:30:46', '2015-05-14 10:30:46', '', 0, 'http://localhost/jegadeesh/newxcluse/?page_id=25', 0, 'page', '', 0),
(26, 1, '2015-05-14 10:30:46', '2015-05-14 10:30:46', '', 'prosperent', '', 'inherit', 'open', 'open', '', '25-revision-v1', '', '', '2015-05-14 10:30:46', '2015-05-14 10:30:46', '', 25, 'http://localhost/jegadeesh/newxcluse/25-revision-v1/', 0, 'revision', '', 0),
(35, 1, '2015-05-15 12:13:35', '0000-00-00 00:00:00', '', 'Webhook created on May 15, 2015 @ 12:13 PM', '', 'pending', 'open', 'closed', 'webhook_5555e2ef3dee', '', '', '', '2015-05-15 12:13:35', '0000-00-00 00:00:00', '', 0, 'http://localhost/jegadeesh/newxcluse/?post_type=shop_webhook&p=35', 0, 'shop_webhook', '', 0),
(36, 1, '2015-05-16 07:05:52', '2015-05-16 07:05:52', 'ewteter retretret retret', 'jegadeesh', '', 'trash', 'open', 'closed', '', 'jegadeesh', '', '', '2015-06-25 11:24:52', '2015-06-25 11:24:52', '', 0, 'http://localhost/jegadeesh/newxcluse/?post_type=product&#038;p=36', 0, 'product', '', 0),
(39, 1, '2015-05-16 08:00:48', '2015-05-16 08:00:48', '', 'Variation #1 of 5 for prdct#38', '', 'publish', 'open', 'open', '', 'product-38-variation-1', '', '', '2015-05-16 08:00:48', '2015-05-16 08:00:48', '', 38, 'http://localhost/jegadeesh/newxcluse/?product_variation=product-38-variation-1', 0, 'product_variation', '', 0),
(40, 1, '2015-05-16 08:00:51', '2015-05-16 08:00:51', '', 'Variation #2 of 5 for prdct#38', '', 'publish', 'open', 'open', '', 'product-38-variation-2', '', '', '2015-05-16 08:00:51', '2015-05-16 08:00:51', '', 38, 'http://localhost/jegadeesh/newxcluse/?product_variation=product-38-variation-2', 0, 'product_variation', '', 0),
(41, 1, '2015-05-16 08:00:51', '2015-05-16 08:00:51', '', 'Variation #3 of 5 for prdct#38', '', 'publish', 'open', 'open', '', 'product-38-variation-3', '', '', '2015-05-16 08:00:51', '2015-05-16 08:00:51', '', 38, 'http://localhost/jegadeesh/newxcluse/?product_variation=product-38-variation-3', 0, 'product_variation', '', 0),
(42, 1, '2015-05-16 08:00:51', '2015-05-16 08:00:51', '', 'Variation #4 of 5 for prdct#38', '', 'publish', 'open', 'open', '', 'product-38-variation-4', '', '', '2015-05-16 08:00:51', '2015-05-16 08:00:51', '', 38, 'http://localhost/jegadeesh/newxcluse/?product_variation=product-38-variation-4', 0, 'product_variation', '', 0),
(43, 1, '2015-05-16 08:00:51', '2015-05-16 08:00:51', '', 'Variation #5 of 5 for prdct#38', '', 'publish', 'open', 'open', '', 'product-38-variation-5', '', '', '2015-05-16 08:00:51', '2015-05-16 08:00:51', '', 38, 'http://localhost/jegadeesh/newxcluse/?product_variation=product-38-variation-5', 0, 'product_variation', '', 0),
(45, 1, '2015-05-16 08:10:02', '2015-05-16 08:10:02', '', 'Variation #1 of 5 for prdct#44', '', 'publish', 'open', 'open', '', 'product-44-variation-1', '', '', '2015-05-16 08:10:02', '2015-05-16 08:10:02', '', 44, 'http://localhost/jegadeesh/newxcluse/?product_variation=product-44-variation-1', 0, 'product_variation', '', 0),
(46, 1, '2015-05-16 08:10:04', '2015-05-16 08:10:04', '', 'Variation #2 of 5 for prdct#44', '', 'publish', 'open', 'open', '', 'product-44-variation-2', '', '', '2015-05-16 08:10:04', '2015-05-16 08:10:04', '', 44, 'http://localhost/jegadeesh/newxcluse/?product_variation=product-44-variation-2', 0, 'product_variation', '', 0),
(47, 1, '2015-05-16 08:10:04', '2015-05-16 08:10:04', '', 'Variation #3 of 5 for prdct#44', '', 'publish', 'open', 'open', '', 'product-44-variation-3', '', '', '2015-05-16 08:10:04', '2015-05-16 08:10:04', '', 44, 'http://localhost/jegadeesh/newxcluse/?product_variation=product-44-variation-3', 0, 'product_variation', '', 0),
(48, 1, '2015-05-16 08:10:05', '2015-05-16 08:10:05', '', 'Variation #4 of 5 for prdct#44', '', 'publish', 'open', 'open', '', 'product-44-variation-4', '', '', '2015-05-16 08:10:05', '2015-05-16 08:10:05', '', 44, 'http://localhost/jegadeesh/newxcluse/?product_variation=product-44-variation-4', 0, 'product_variation', '', 0),
(49, 1, '2015-05-16 08:10:05', '2015-05-16 08:10:05', '', 'Variation #5 of 5 for prdct#44', '', 'publish', 'open', 'open', '', 'product-44-variation-5', '', '', '2015-05-16 08:10:05', '2015-05-16 08:10:05', '', 44, 'http://localhost/jegadeesh/newxcluse/?product_variation=product-44-variation-5', 0, 'product_variation', '', 0),
(52, 1, '2015-05-16 09:30:49', '2015-05-16 09:30:49', '', 'Variation #1 of 5 for prdct#51', '', 'publish', 'open', 'open', '', 'product-51-variation-1', '', '', '2015-05-16 09:30:49', '2015-05-16 09:30:49', '', 51, 'http://localhost/jegadeesh/newxcluse/?product_variation=product-51-variation-1', 0, 'product_variation', '', 0),
(53, 1, '2015-05-16 09:30:49', '2015-05-16 09:30:49', '', 'Variation #2 of 5 for prdct#51', '', 'publish', 'open', 'open', '', 'product-51-variation-2', '', '', '2015-05-16 09:30:49', '2015-05-16 09:30:49', '', 51, 'http://localhost/jegadeesh/newxcluse/?product_variation=product-51-variation-2', 0, 'product_variation', '', 0),
(54, 1, '2015-05-16 09:30:50', '2015-05-16 09:30:50', '', 'Variation #3 of 5 for prdct#51', '', 'publish', 'open', 'open', '', 'product-51-variation-3', '', '', '2015-05-16 09:30:50', '2015-05-16 09:30:50', '', 51, 'http://localhost/jegadeesh/newxcluse/?product_variation=product-51-variation-3', 0, 'product_variation', '', 0),
(55, 1, '2015-05-16 09:30:50', '2015-05-16 09:30:50', '', 'Variation #4 of 5 for prdct#51', '', 'publish', 'open', 'open', '', 'product-51-variation-4', '', '', '2015-05-16 09:30:50', '2015-05-16 09:30:50', '', 51, 'http://localhost/jegadeesh/newxcluse/?product_variation=product-51-variation-4', 0, 'product_variation', '', 0),
(56, 1, '2015-05-16 09:30:50', '2015-05-16 09:30:50', '', 'Variation #5 of 5 for prdct#51', '', 'publish', 'open', 'open', '', 'product-51-variation-5', '', '', '2015-05-16 09:30:50', '2015-05-16 09:30:50', '', 51, 'http://localhost/jegadeesh/newxcluse/?product_variation=product-51-variation-5', 0, 'product_variation', '', 0),
(63, 1, '2015-05-16 09:40:02', '2015-05-16 09:40:02', '', 'Variation #1 of 5 for prdct#62', '', 'publish', 'open', 'open', '', 'product-62-variation-1', '', '', '2015-05-16 09:40:02', '2015-05-16 09:40:02', '', 62, 'http://localhost/jegadeesh/newxcluse/?product_variation=product-62-variation-1', 0, 'product_variation', '', 0),
(64, 1, '2015-05-16 09:40:02', '2015-05-16 09:40:02', '', 'Variation #2 of 5 for prdct#62', '', 'publish', 'open', 'open', '', 'product-62-variation-2', '', '', '2015-05-16 09:40:02', '2015-05-16 09:40:02', '', 62, 'http://localhost/jegadeesh/newxcluse/?product_variation=product-62-variation-2', 0, 'product_variation', '', 0),
(65, 1, '2015-05-16 09:40:03', '2015-05-16 09:40:03', '', 'Variation #3 of 5 for prdct#62', '', 'publish', 'open', 'open', '', 'product-62-variation-3', '', '', '2015-05-16 09:40:03', '2015-05-16 09:40:03', '', 62, 'http://localhost/jegadeesh/newxcluse/?product_variation=product-62-variation-3', 0, 'product_variation', '', 0),
(66, 1, '2015-05-16 09:40:03', '2015-05-16 09:40:03', '', 'Variation #4 of 5 for prdct#62', '', 'publish', 'open', 'open', '', 'product-62-variation-4', '', '', '2015-05-16 09:40:03', '2015-05-16 09:40:03', '', 62, 'http://localhost/jegadeesh/newxcluse/?product_variation=product-62-variation-4', 0, 'product_variation', '', 0),
(67, 1, '2015-05-16 09:40:03', '2015-05-16 09:40:03', '', 'Variation #5 of 5 for prdct#62', '', 'publish', 'open', 'open', '', 'product-62-variation-5', '', '', '2015-05-16 09:40:03', '2015-05-16 09:40:03', '', 62, 'http://localhost/jegadeesh/newxcluse/?product_variation=product-62-variation-5', 0, 'product_variation', '', 0),
(69, 1, '2015-05-16 09:42:13', '2015-05-16 09:42:13', '', 'Variation #1 of 5 for prdct#68', '', 'publish', 'open', 'open', '', 'product-68-variation-1', '', '', '2015-05-16 09:42:13', '2015-05-16 09:42:13', '', 68, 'http://localhost/jegadeesh/newxcluse/?product_variation=product-68-variation-1', 0, 'product_variation', '', 0),
(70, 1, '2015-05-16 09:42:14', '2015-05-16 09:42:14', '', 'Variation #2 of 5 for prdct#68', '', 'publish', 'open', 'open', '', 'product-68-variation-2', '', '', '2015-05-16 09:42:14', '2015-05-16 09:42:14', '', 68, 'http://localhost/jegadeesh/newxcluse/?product_variation=product-68-variation-2', 0, 'product_variation', '', 0),
(71, 1, '2015-05-16 09:42:14', '2015-05-16 09:42:14', '', 'Variation #3 of 5 for prdct#68', '', 'publish', 'open', 'open', '', 'product-68-variation-3', '', '', '2015-05-16 09:42:14', '2015-05-16 09:42:14', '', 68, 'http://localhost/jegadeesh/newxcluse/?product_variation=product-68-variation-3', 0, 'product_variation', '', 0),
(72, 1, '2015-05-16 09:42:14', '2015-05-16 09:42:14', '', 'Variation #4 of 5 for prdct#68', '', 'publish', 'open', 'open', '', 'product-68-variation-4', '', '', '2015-05-16 09:42:14', '2015-05-16 09:42:14', '', 68, 'http://localhost/jegadeesh/newxcluse/?product_variation=product-68-variation-4', 0, 'product_variation', '', 0),
(73, 1, '2015-05-16 09:42:14', '2015-05-16 09:42:14', '', 'Variation #5 of 5 for prdct#68', '', 'publish', 'open', 'open', '', 'product-68-variation-5', '', '', '2015-05-16 09:42:14', '2015-05-16 09:42:14', '', 68, 'http://localhost/jegadeesh/newxcluse/?product_variation=product-68-variation-5', 0, 'product_variation', '', 0),
(75, 1, '2015-05-16 09:44:20', '2015-05-16 09:44:20', '', 'Variation #1 of 5 for prdct#74', '', 'publish', 'open', 'open', '', 'product-74-variation-1', '', '', '2015-05-16 09:44:20', '2015-05-16 09:44:20', '', 74, 'http://localhost/jegadeesh/newxcluse/?product_variation=product-74-variation-1', 0, 'product_variation', '', 0),
(76, 1, '2015-05-16 09:44:21', '2015-05-16 09:44:21', '', 'Variation #2 of 5 for prdct#74', '', 'publish', 'open', 'open', '', 'product-74-variation-2', '', '', '2015-05-16 09:44:21', '2015-05-16 09:44:21', '', 74, 'http://localhost/jegadeesh/newxcluse/?product_variation=product-74-variation-2', 0, 'product_variation', '', 0),
(77, 1, '2015-05-16 09:44:21', '2015-05-16 09:44:21', '', 'Variation #3 of 5 for prdct#74', '', 'publish', 'open', 'open', '', 'product-74-variation-3', '', '', '2015-05-16 09:44:21', '2015-05-16 09:44:21', '', 74, 'http://localhost/jegadeesh/newxcluse/?product_variation=product-74-variation-3', 0, 'product_variation', '', 0),
(78, 1, '2015-05-16 09:44:21', '2015-05-16 09:44:21', '', 'Variation #4 of 5 for prdct#74', '', 'publish', 'open', 'open', '', 'product-74-variation-4', '', '', '2015-05-16 09:44:21', '2015-05-16 09:44:21', '', 74, 'http://localhost/jegadeesh/newxcluse/?product_variation=product-74-variation-4', 0, 'product_variation', '', 0),
(79, 1, '2015-05-16 09:44:21', '2015-05-16 09:44:21', '', 'Variation #5 of 5 for prdct#74', '', 'publish', 'open', 'open', '', 'product-74-variation-5', '', '', '2015-05-16 09:44:21', '2015-05-16 09:44:21', '', 74, 'http://localhost/jegadeesh/newxcluse/?product_variation=product-74-variation-5', 0, 'product_variation', '', 0),
(81, 1, '2015-05-16 10:32:56', '2015-05-16 10:32:56', '', 'Variation #1 of 5 for prdct#80', '', 'publish', 'open', 'open', '', 'product-80-variation-1', '', '', '2015-05-16 10:32:56', '2015-05-16 10:32:56', '', 80, 'http://localhost/jegadeesh/newxcluse/?product_variation=product-80-variation-1', 0, 'product_variation', '', 0),
(82, 1, '2015-05-16 10:32:57', '2015-05-16 10:32:57', '', 'Variation #2 of 5 for prdct#80', '', 'publish', 'open', 'open', '', 'product-80-variation-2', '', '', '2015-05-16 10:32:57', '2015-05-16 10:32:57', '', 80, 'http://localhost/jegadeesh/newxcluse/?product_variation=product-80-variation-2', 0, 'product_variation', '', 0),
(83, 1, '2015-05-16 10:32:57', '2015-05-16 10:32:57', '', 'Variation #3 of 5 for prdct#80', '', 'publish', 'open', 'open', '', 'product-80-variation-3', '', '', '2015-05-16 10:32:57', '2015-05-16 10:32:57', '', 80, 'http://localhost/jegadeesh/newxcluse/?product_variation=product-80-variation-3', 0, 'product_variation', '', 0),
(84, 1, '2015-05-16 10:32:57', '2015-05-16 10:32:57', '', 'Variation #4 of 5 for prdct#80', '', 'publish', 'open', 'open', '', 'product-80-variation-4', '', '', '2015-05-16 10:32:57', '2015-05-16 10:32:57', '', 80, 'http://localhost/jegadeesh/newxcluse/?product_variation=product-80-variation-4', 0, 'product_variation', '', 0),
(85, 1, '2015-05-16 10:32:57', '2015-05-16 10:32:57', '', 'Variation #5 of 5 for prdct#80', '', 'publish', 'open', 'open', '', 'product-80-variation-5', '', '', '2015-05-16 10:32:57', '2015-05-16 10:32:57', '', 80, 'http://localhost/jegadeesh/newxcluse/?product_variation=product-80-variation-5', 0, 'product_variation', '', 0),
(89, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 'dfgdfgdg', '', 'publish', 'open', 'open', '', 'dgdfgdfg', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0, 'http://img5a.flixcart.com/image/bedsheet/c/y/v/he3016-home-ecstasy-flat-he3016-set-with-two-pillow-covers-1100x1100-imadqhanu3bgrs58.jpeg', 0, 'attachment', 'image/jpeg', 0),
(92, 1, '2015-05-18 05:40:08', '2015-05-18 05:40:08', '', 'slide13', '', 'inherit', 'open', 'open', '', 'slide13', '', '', '2015-05-18 05:40:08', '2015-05-18 05:40:08', '', 0, 'http://sem3-idn.s3-website-us-east-1.amazonaws.com/20b3633e350bc2ca499e4d07b0a83a13,0.jpg', 0, 'attachment', 'image/jpeg', 0),
(96, 1, '2015-05-19 13:07:31', '2015-05-19 13:07:31', 'dsfdsfdsf', 'dfdsf', '', 'trash', 'open', 'closed', '', 'dfdsf', '', '', '2015-06-25 11:24:52', '2015-06-25 11:24:52', '', 0, 'http://localhost/jegadeesh/newxcluse/?post_type=product&#038;p=96', 0, 'product', '', 0),
(97, 1, '2015-05-19 13:07:43', '2015-05-19 13:07:43', 'sdfdsfdsfdsf', 'sfdsf', '', 'trash', 'open', 'closed', '', 'sfdsf', '', '', '2015-06-25 11:24:51', '2015-06-25 11:24:51', '', 0, 'http://localhost/jegadeesh/newxcluse/?post_type=product&#038;p=97', 0, 'product', '', 0),
(99, 1, '2015-05-21 08:50:28', '2015-05-21 08:50:28', ' ', '', '', 'publish', 'open', 'open', '', '99', '', '', '2015-05-21 09:09:04', '2015-05-21 09:09:04', '', 0, 'http://localhost/jegadeesh/newxcluse/?p=99', 1, 'nav_menu_item', '', 0),
(100, 1, '2015-05-21 08:50:28', '2015-05-21 08:50:28', ' ', '', '', 'publish', 'open', 'open', '', '100', '', '', '2015-05-21 09:09:04', '2015-05-21 09:09:04', '', 0, 'http://localhost/jegadeesh/newxcluse/?p=100', 3, 'nav_menu_item', '', 0),
(101, 1, '2015-05-21 08:50:28', '2015-05-21 08:50:28', ' ', '', '', 'publish', 'open', 'open', '', '101', '', '', '2015-05-21 09:09:04', '2015-05-21 09:09:04', '', 0, 'http://localhost/jegadeesh/newxcluse/?p=101', 4, 'nav_menu_item', '', 0),
(102, 1, '2015-05-21 09:09:04', '2015-05-21 09:09:04', ' ', '', '', 'publish', 'open', 'open', '', '102', '', '', '2015-05-21 09:09:04', '2015-05-21 09:09:04', '', 0, 'http://localhost/jegadeesh/newxcluse/?p=102', 2, 'nav_menu_item', '', 0),
(103, 1, '2015-05-21 09:09:04', '2015-05-21 09:09:04', ' ', '', '', 'publish', 'open', 'open', '', '103', '', '', '2015-05-21 09:09:04', '2015-05-21 09:09:04', '', 0, 'http://localhost/jegadeesh/newxcluse/?p=103', 5, 'nav_menu_item', '', 0),
(105, 1, '2015-05-21 12:59:31', '2015-05-21 12:59:31', 'dsfdsfdsf', 'dfdsf (Copy)', '', 'trash', 'open', 'closed', '', 'dfdsf-copy', '', '', '2015-06-25 11:24:51', '2015-06-25 11:24:51', '', 0, 'http://localhost/jegadeesh/newxcluse/shop/dfdsf-copy/', 0, 'product', '', 0),
(106, 1, '2015-05-21 12:59:42', '2015-05-21 12:59:42', 'sdfdsfdsfdsf', 'sfdsf (Copy)', '', 'trash', 'open', 'closed', '', 'sfdsf-copy', '', '', '2015-06-25 11:24:51', '2015-06-25 11:24:51', '', 0, 'http://localhost/jegadeesh/newxcluse/shop/sfdsf-copy/', 0, 'product', '', 0),
(107, 1, '2015-05-21 12:59:52', '2015-05-21 12:59:52', 'sdfdsfdsfdsf', 'ganesh', '', 'trash', 'open', 'closed', '', 'sfdsf-copy-2', '', '', '2015-06-25 11:24:51', '2015-06-25 11:24:51', '', 0, 'http://localhost/jegadeesh/newxcluse/shop/sfdsf-copy-2/', 0, 'product', '', 0),
(110, 1, '2015-05-21 13:00:43', '2015-05-21 13:00:43', '', 'slide19', '', 'inherit', 'open', 'open', '', 'slide19', '', '', '2015-05-21 13:00:43', '2015-05-21 13:00:43', '', 0, 'http://localhost/jegadeesh/newxcluse/wp-content/uploads/2015/05/slide19.jpg', 0, 'attachment', 'image/jpeg', 0),
(111, 1, '2015-05-21 13:01:06', '2015-05-21 13:01:06', '', 'slide18', '', 'inherit', 'open', 'open', '', 'slide18', '', '', '2015-05-21 13:01:06', '2015-05-21 13:01:06', '', 0, 'http://localhost/jegadeesh/newxcluse/wp-content/uploads/2015/05/slide18.jpg', 0, 'attachment', 'image/jpeg', 0),
(112, 1, '2015-05-21 13:01:30', '2015-05-21 13:01:30', '', 'slide17', '', 'inherit', 'open', 'open', '', 'slide17', '', '', '2015-05-21 13:01:30', '2015-05-21 13:01:30', '', 0, 'http://localhost/jegadeesh/newxcluse/wp-content/uploads/2015/05/slide17.jpg', 0, 'attachment', 'image/jpeg', 0),
(113, 1, '2015-05-21 13:02:13', '2015-05-21 13:02:13', '', 'slide14', '', 'inherit', 'open', 'open', '', 'slide14', '', '', '2015-05-21 13:02:13', '2015-05-21 13:02:13', '', 105, 'http://localhost/jegadeesh/newxcluse/wp-content/uploads/2015/05/slide14.jpg', 0, 'attachment', 'image/jpeg', 0),
(116, 1, '2015-05-26 06:47:56', '2015-05-26 06:47:56', '', 'changepassword', '', 'publish', 'open', 'open', '', 'changepassword', '', '', '2015-05-26 06:47:56', '2015-05-26 06:47:56', '', 0, 'http://localhost/jegadeesh/newxcluse/?page_id=116', 0, 'page', '', 0),
(117, 1, '2015-05-26 06:47:56', '2015-05-26 06:47:56', '', 'changepassword', '', 'inherit', 'open', 'open', '', '116-revision-v1', '', '', '2015-05-26 06:47:56', '2015-05-26 06:47:56', '', 116, 'http://localhost/jegadeesh/newxcluse/116-revision-v1/', 0, 'revision', '', 0),
(119, 1, '2015-05-27 11:47:47', '2015-05-27 11:47:47', '', 'shop_by_room', '', 'publish', 'open', 'open', '', 'shopbyroom', '', '', '2015-05-28 07:22:17', '2015-05-28 07:22:17', '', 0, 'http://localhost/jegadeesh/newxcluse/?page_id=119', 0, 'page', '', 0),
(120, 1, '2015-05-27 11:47:47', '2015-05-27 11:47:47', '', 'shop_by_room', '', 'inherit', 'open', 'open', '', '119-revision-v1', '', '', '2015-05-27 11:47:47', '2015-05-27 11:47:47', '', 119, 'http://localhost/jegadeesh/newxcluse/119-revision-v1/', 0, 'revision', '', 0),
(131, 1, '2015-06-04 12:00:25', '2015-06-04 12:00:25', '[yith_wcwl_wishlist]', 'wishlist', '', 'publish', 'open', 'open', '', 'ramesh', '', '', '2015-06-06 06:46:30', '2015-06-06 06:46:30', '', 0, 'http://localhost/jegadeesh/newxcluse/?page_id=131', 0, 'page', '', 0),
(132, 1, '2015-06-04 12:00:25', '2015-06-04 12:00:25', '[yith_wcwl_wishlist]', 'ramesh', '', 'inherit', 'open', 'open', '', '131-revision-v1', '', '', '2015-06-04 12:00:25', '2015-06-04 12:00:25', '', 131, 'http://localhost/jegadeesh/newxcluse/131-revision-v1/', 0, 'revision', '', 0),
(134, 1, '2015-06-04 12:56:41', '2015-06-04 12:56:41', '[yith_wcwl_wishlist]', 'wishlist', '', 'inherit', 'open', 'open', '', '131-revision-v1', '', '', '2015-06-04 12:56:41', '2015-06-04 12:56:41', '', 131, 'http://localhost/jegadeesh/newxcluse/131-revision-v1/', 0, 'revision', '', 0),
(135, 1, '2015-06-05 06:58:07', '2015-06-05 06:58:07', '[yith_wcwl_wishlist<b> pagination=''yes''</b>]', 'wishlist', '', 'inherit', 'open', 'open', '', '131-autosave-v1', '', '', '2015-06-05 06:58:07', '2015-06-05 06:58:07', '', 131, 'http://localhost/jegadeesh/newxcluse/131-autosave-v1/', 0, 'revision', '', 0),
(136, 1, '2015-06-05 06:58:08', '2015-06-05 06:58:08', '[yith_wcwl_wishlist<b> pagination=''yes''</b>]', 'wishlist', '', 'inherit', 'open', 'open', '', '131-revision-v1', '', '', '2015-06-05 06:58:08', '2015-06-05 06:58:08', '', 131, 'http://localhost/jegadeesh/newxcluse/131-revision-v1/', 0, 'revision', '', 0),
(137, 1, '2015-06-06 04:58:05', '2015-06-06 04:58:05', '[yith_wcwl_wishlist]', 'wishlist', '', 'inherit', 'open', 'open', '', '131-revision-v1', '', '', '2015-06-06 04:58:05', '2015-06-06 04:58:05', '', 131, 'http://localhost/jegadeesh/newxcluse/131-revision-v1/', 0, 'revision', '', 0),
(138, 1, '2015-06-06 07:33:57', '2015-06-06 07:33:57', '', 'compare', '', 'publish', 'open', 'open', '', 'compare', '', '', '2015-07-09 11:02:43', '2015-07-09 11:02:43', '', 0, 'http://localhost/jegadeesh/newxcluse/?page_id=138', 0, 'page', '', 0),
(139, 1, '2015-06-06 07:33:57', '2015-06-06 07:33:57', '', 'compare', '', 'inherit', 'open', 'open', '', '138-revision-v1', '', '', '2015-06-06 07:33:57', '2015-06-06 07:33:57', '', 138, 'http://localhost/jegadeesh/newxcluse/138-revision-v1/', 0, 'revision', '', 0),
(140, 1, '2015-06-06 10:19:09', '2015-06-06 10:19:09', '[''yith_compare_button'']', 'compare', '', 'inherit', 'open', 'open', '', '138-revision-v1', '', '', '2015-06-06 10:19:09', '2015-06-06 10:19:09', '', 138, 'http://localhost/jegadeesh/newxcluse/138-revision-v1/', 0, 'revision', '', 0),
(141, 1, '2015-06-06 10:19:42', '2015-06-06 10:19:42', '[yith_compare_button]', 'compare', '', 'inherit', 'open', 'open', '', '138-revision-v1', '', '', '2015-06-06 10:19:42', '2015-06-06 10:19:42', '', 138, 'http://localhost/jegadeesh/newxcluse/138-revision-v1/', 0, 'revision', '', 0),
(142, 1, '2015-06-08 08:49:04', '2015-06-08 08:49:04', '', 'compare', '', 'inherit', 'open', 'open', '', '138-revision-v1', '', '', '2015-06-08 08:49:04', '2015-06-08 08:49:04', '', 138, 'http://localhost/jegadeesh/newxcluse/138-revision-v1/', 0, 'revision', '', 0),
(145, 1, '2015-06-11 07:58:49', '2015-06-11 07:58:49', '', 'apartment_big_image_01', '', 'inherit', 'open', 'open', '', 'apartment_big_image_01', '', '', '2015-06-11 07:58:49', '2015-06-11 07:58:49', '', 0, 'http://localhost/jegadeesh/newxcluse/wp-content/uploads/2015/06/apartment_big_image_01.jpg', 0, 'attachment', 'image/jpeg', 0),
(152, 1, '2015-06-23 12:01:37', '2015-06-23 12:01:37', '', 'check', '', 'trash', 'open', 'open', '', 'check', '', '', '2015-06-26 06:02:54', '2015-06-26 06:02:54', '', 0, 'http://localhost/jegadeesh/testxcluse/?page_id=152', 0, 'page', '', 0),
(153, 1, '2015-06-23 12:01:37', '2015-06-23 12:01:37', '', 'check', '', 'inherit', 'open', 'open', '', '152-revision-v1', '', '', '2015-06-23 12:01:37', '2015-06-23 12:01:37', '', 152, 'http://localhost/jegadeesh/testxcluse/152-revision-v1/', 0, 'revision', '', 0),
(154, 1, '2015-06-23 12:03:43', '2015-06-23 12:03:43', '', 'check', '', 'trash', 'open', 'open', '', 'check-2', '', '', '2015-06-26 06:02:56', '2015-06-26 06:02:56', '', 0, 'http://localhost/jegadeesh/testxcluse/?page_id=154', 0, 'page', '', 0),
(155, 1, '2015-06-23 12:03:43', '2015-06-23 12:03:43', '', 'check', '', 'inherit', 'open', 'open', '', '154-revision-v1', '', '', '2015-06-23 12:03:43', '2015-06-23 12:03:43', '', 154, 'http://localhost/jegadeesh/testxcluse/154-revision-v1/', 0, 'revision', '', 0),
(156, 1, '2015-06-25 11:25:26', '2015-06-25 11:25:26', 'fsdfdsf', 'test1', '', 'publish', 'open', 'closed', '', 'test1', '', '', '2015-07-24 05:08:12', '2015-07-24 05:08:12', '', 0, 'http://localhost/jegadeesh/testxcluse/?post_type=product&#038;p=156', 0, 'product', '', 0),
(157, 1, '2015-06-25 11:26:00', '2015-06-25 11:26:00', 'tytrytrytrytry', 'test2', '', 'publish', 'open', 'closed', '', 'test2', '', '', '2015-07-23 10:36:41', '2015-07-23 10:36:41', '', 0, '', 0, 'product', '', 0),
(158, 1, '2015-06-25 11:26:27', '2015-06-25 11:26:27', 'fdsfdsfdsfdsf', 'test3', '', 'publish', 'open', 'closed', '', 'test3', '', '', '2015-07-13 12:55:23', '2015-07-13 12:55:23', '', 0, 'http://localhost/jegadeesh/testxcluse/?post_type=product&#038;p=158', 0, 'product', '', 0),
(159, 1, '2015-06-25 11:26:52', '2015-06-25 11:26:52', 'fdsf fdsfds fdsf', 'test4', '', 'publish', 'open', 'closed', '', 'test4', '', '', '2015-07-23 10:36:23', '2015-07-23 10:36:23', '', 0, 'http://localhost/jegadeesh/testxcluse/?post_type=product&#038;p=158', 0, 'product', '', 0),
(160, 1, '2015-06-25 11:27:12', '2015-06-25 11:27:12', 'dsfdsf dsfdsf dsfsd', 'test5', '', 'publish', 'open', 'closed', '', 'test5', '', '', '2015-07-13 12:55:15', '2015-07-13 12:55:15', '', 0, 'http://localhost/jegadeesh/testxcluse/?post_type=product&#038;p=160', 0, 'product', '', 0),
(161, 1, '2015-06-26 06:03:09', '2015-06-26 06:03:09', 'dgdfgdfgdfg', 'mytest', '', 'publish', 'open', 'open', '', 'mytest', '', '', '2015-06-26 06:03:09', '2015-06-26 06:03:09', '', 0, 'http://localhost/jegadeesh/testxcluse/?page_id=161', 0, 'page', '', 0),
(162, 1, '2015-06-26 06:03:09', '2015-06-26 06:03:09', 'dgdfgdfgdfg', 'mytest', '', 'inherit', 'open', 'open', '', '161-revision-v1', '', '', '2015-06-26 06:03:09', '2015-06-26 06:03:09', '', 161, 'http://localhost/jegadeesh/testxcluse/161-revision-v1/', 0, 'revision', '', 0),
(164, 1, '2015-06-26 07:42:46', '2015-06-26 07:42:46', 'vcxvcxvcxvxv', 'vcxvcx', '', 'publish', 'open', 'open', '', 'vcxvcx', '', '', '2015-06-26 07:43:02', '2015-06-26 07:43:02', '', 0, 'http://localhost/jegadeesh/testxcluse/?p=164', 0, 'post', '', 0),
(165, 1, '2015-06-26 07:42:46', '2015-06-26 07:42:46', 'vcxvcxvcxvxv', 'vcxvcx', '', 'inherit', 'open', 'open', '', '164-revision-v1', '', '', '2015-06-26 07:42:46', '2015-06-26 07:42:46', '', 164, 'http://localhost/jegadeesh/testxcluse/164-revision-v1/', 0, 'revision', '', 0),
(166, 1, '2015-06-26 07:43:12', '2015-06-26 07:43:12', 'Welcome to WordPress. This is your first post. Edit or delete it, then start blogging!', 'Hello world!', '', 'inherit', 'open', 'open', '', '1-revision-v1', '', '', '2015-06-26 07:43:12', '2015-06-26 07:43:12', '', 1, 'http://localhost/jegadeesh/testxcluse/1-revision-v1/', 0, 'revision', '', 0),
(168, 1, '2015-06-29 10:08:50', '2015-06-29 10:08:50', '', 'mywishlist', '', 'publish', 'open', 'open', '', 'mywishlist-2', '', '', '2015-06-29 10:08:50', '2015-06-29 10:08:50', '', 0, 'http://localhost/jegadeesh/testxcluse/?page_id=168', 0, 'page', '', 0),
(169, 1, '2015-06-29 10:08:50', '2015-06-29 10:08:50', '', 'mywishlist', '', 'inherit', 'open', 'open', '', '168-revision-v1', '', '', '2015-06-29 10:08:50', '2015-06-29 10:08:50', '', 168, 'http://localhost/jegadeesh/testxcluse/168-revision-v1/', 0, 'revision', '', 0),
(171, 1, '2015-07-03 06:00:00', '2015-07-03 00:00:00', 'this is for post content', 'post title', 'this is for post excerpt', 'publish', 'open', 'open', '', 'post-title', '', '', '2015-07-03 00:00:00', '2015-07-03 00:00:00', '', 0, 'http://code.tutsplus.com/tutorials/writing-custom-queries-in-wordpress--wp-25510', 0, 'product', '', 0),
(172, 1, '2015-07-05 09:23:15', '0000-00-00 00:00:00', '', 'shopbyroom', '', 'draft', 'open', 'open', '', '', '', '', '2015-07-05 09:23:15', '2015-07-05 09:23:15', '', 0, 'http://localhost/jegadeesh/testxcluse/?page_id=172', 0, 'page', '', 0),
(173, 1, '2015-07-05 10:02:12', '2015-07-05 10:02:12', '', 'hkjhikjuj', '', 'publish', 'open', 'open', '', 'hkjhikjuj', '', '', '2015-07-05 10:02:31', '2015-07-05 10:02:31', '', 0, 'http://localhost/jegadeesh/testxcluse/?page_id=173', 0, 'page', '', 0),
(174, 1, '2015-07-05 10:02:12', '2015-07-05 10:02:12', '', 'hkjhikjuj', '', 'inherit', 'open', 'open', '', '173-revision-v1', '', '', '2015-07-05 10:02:12', '2015-07-05 10:02:12', '', 173, 'http://localhost/jegadeesh/testxcluse/173-revision-v1/', 0, 'revision', '', 0),
(175, 1, '2015-07-05 10:02:23', '2015-07-05 10:02:23', '', 'hkjhikjuj', '', 'inherit', 'open', 'open', '', '173-revision-v1', '', '', '2015-07-05 10:02:23', '2015-07-05 10:02:23', '', 173, 'http://localhost/jegadeesh/testxcluse/173-revision-v1/', 0, 'revision', '', 0),
(176, 1, '2015-07-05 10:02:31', '2015-07-05 10:02:31', '', 'hkjhikjuj', '', 'inherit', 'open', 'open', '', '173-revision-v1', '', '', '2015-07-05 10:02:31', '2015-07-05 10:02:31', '', 173, 'http://localhost/jegadeesh/testxcluse/173-revision-v1/', 0, 'revision', '', 0),
(177, 1, '2015-07-05 10:11:49', '2015-07-05 10:11:49', 'etretretretret', 'dstretr', '', 'publish', 'open', 'open', '', 'dstretr', '', '', '2015-07-05 10:11:49', '2015-07-05 10:11:49', '', 0, 'http://localhost/jegadeesh/testxcluse/?p=177', 0, 'post', '', 0),
(178, 1, '2015-07-05 10:11:49', '2015-07-05 10:11:49', 'etretretretret', 'dstretr', '', 'inherit', 'open', 'open', '', '177-revision-v1', '', '', '2015-07-05 10:11:49', '2015-07-05 10:11:49', '', 177, 'http://localhost/jegadeesh/testxcluse/177-revision-v1/', 0, 'revision', '', 0),
(179, 1, '2015-07-05 10:12:17', '2015-07-05 10:12:17', 'dsfdsfdsfdsf', 'dsfdsf', '', 'publish', 'open', 'closed', '', 'dsfdsf', '', '', '2015-07-05 10:12:17', '2015-07-05 10:12:17', '', 0, 'http://localhost/jegadeesh/testxcluse/?post_type=product&#038;p=179', 0, 'product', '', 0),
(180, 1, '2015-07-05 11:13:35', '2015-07-05 11:13:35', 'fdsfdsfdsfsf', 'fdssd', '', 'publish', 'open', 'open', '', 'fdssd', '', '', '2015-07-05 11:13:35', '2015-07-05 11:13:35', '', 0, 'http://localhost/jegadeesh/testxcluse/?page_id=180', 0, 'page', '', 0),
(181, 1, '2015-07-05 11:13:35', '2015-07-05 11:13:35', 'fdsfdsfdsfsf', 'fdssd', '', 'inherit', 'open', 'open', '', '180-revision-v1', '', '', '2015-07-05 11:13:35', '2015-07-05 11:13:35', '', 180, 'http://localhost/jegadeesh/testxcluse/180-revision-v1/', 0, 'revision', '', 0),
(182, 1, '2015-07-06 05:23:08', '2015-07-06 05:23:08', 'fdsfdsf sdfsdsf sdfsdfsf dsfdsfdsf dsfdsfdsf dsfdsfds', 'kesavan', '', 'publish', 'open', 'closed', '', 'kesavan', '', '', '2015-07-24 06:00:23', '2015-07-24 06:00:23', '', 0, 'http://localhost/jegadeesh/testxcluse/?post_type=product&#038;p=182', 0, 'product', '', 0),
(184, 1, '2015-07-10 12:06:50', '0000-00-00 00:00:00', '', 'products', '', 'draft', 'open', 'open', '', '', '', '', '2015-07-10 12:06:50', '2015-07-10 12:06:50', '', 0, 'http://localhost/jegadeesh/ajaxexcluse/?page_id=184', 0, 'page', '', 0),
(185, 1, '2015-07-10 12:07:53', '2015-07-10 12:07:53', '', 'products', '', 'trash', 'open', 'open', '', 'products', '', '', '2015-07-10 12:11:27', '2015-07-10 12:11:27', '', 0, 'http://localhost/jegadeesh/ajaxexcluse/?page_id=185', 0, 'page', '', 0),
(186, 1, '2015-07-10 12:07:53', '2015-07-10 12:07:53', '', 'products', '', 'inherit', 'open', 'open', '', '185-revision-v1', '', '', '2015-07-10 12:07:53', '2015-07-10 12:07:53', '', 185, 'http://localhost/jegadeesh/ajaxexcluse/185-revision-v1/', 0, 'revision', '', 0),
(187, 1, '2015-07-10 12:20:24', '2015-07-10 12:20:24', '', 'products', '', 'publish', 'open', 'open', '', 'products-2', '', '', '2015-07-10 12:20:24', '2015-07-10 12:20:24', '', 0, 'http://localhost/jegadeesh/ajaxexcluse/?page_id=187', 0, 'page', '', 0),
(188, 1, '2015-07-10 12:20:24', '2015-07-10 12:20:24', '', 'products', '', 'inherit', 'open', 'open', '', '187-revision-v1', '', '', '2015-07-10 12:20:24', '2015-07-10 12:20:24', '', 187, 'http://localhost/jegadeesh/ajaxexcluse/187-revision-v1/', 0, 'revision', '', 0),
(189, 1, '2015-07-10 12:29:13', '2015-07-10 12:29:13', '', 'Shop', '', 'inherit', 'open', 'open', '', '4-revision-v1', '', '', '2015-07-10 12:29:13', '2015-07-10 12:29:13', '', 4, 'http://localhost/jegadeesh/ajaxexcluse/4-revision-v1/', 0, 'revision', '', 0),
(190, 1, '2015-07-14 06:57:08', '2015-07-14 06:57:08', '', 'product6', '', 'publish', 'open', 'closed', '', 'product6', '', '', '2015-07-14 06:57:16', '2015-07-14 06:57:16', '', 0, 'http://localhost/jegadeesh/ajaxexcluse/?post_type=product&#038;p=190', 0, 'product', '', 0),
(191, 1, '2015-07-14 07:02:35', '2015-07-14 07:02:35', '', 'test7', '', 'publish', 'open', 'closed', '', 'test7', '', '', '2015-07-14 07:02:35', '2015-07-14 07:02:35', '', 0, 'http://localhost/jegadeesh/ajaxexcluse/?post_type=product&#038;p=191', 0, 'product', '', 0),
(192, 1, '2015-07-17 06:57:35', '2015-07-17 06:57:35', '', 'filtertheme', '', 'publish', 'open', 'open', '', 'filtertheme', '', '', '2015-07-17 06:57:35', '2015-07-17 06:57:35', '', 0, 'http://localhost/jegadeesh/ajaxexcluse/?page_id=192', 0, 'page', '', 0),
(193, 1, '2015-07-17 06:57:35', '2015-07-17 06:57:35', '', 'filtertheme', '', 'inherit', 'open', 'open', '', '192-revision-v1', '', '', '2015-07-17 06:57:35', '2015-07-17 06:57:35', '', 192, 'http://localhost/jegadeesh/ajaxexcluse/192-revision-v1/', 0, 'revision', '', 0),
(196, 1, '2015-07-20 05:57:22', '2015-07-20 05:57:22', '', 'filter_new', '', 'publish', 'open', 'open', '', 'filter_new', '', '', '2015-07-20 05:57:22', '2015-07-20 05:57:22', '', 0, 'http://localhost/jegadeesh/ajaxexcluse/?page_id=196', 0, 'page', '', 0),
(197, 1, '2015-07-20 05:57:22', '2015-07-20 05:57:22', '', 'filter_new', '', 'inherit', 'open', 'open', '', '196-revision-v1', '', '', '2015-07-20 05:57:22', '2015-07-20 05:57:22', '', 196, 'http://localhost/jegadeesh/ajaxexcluse/196-revision-v1/', 0, 'revision', '', 0),
(198, 1, '2015-07-20 06:19:18', '2015-07-20 06:19:18', '', 'filter_sale', '', 'publish', 'open', 'open', '', 'filter_sale', '', '', '2015-07-20 06:19:18', '2015-07-20 06:19:18', '', 0, 'http://localhost/jegadeesh/ajaxexcluse/?page_id=198', 0, 'page', '', 0),
(199, 1, '2015-07-20 06:19:18', '2015-07-20 06:19:18', '', 'filter_sale', '', 'inherit', 'open', 'open', '', '198-revision-v1', '', '', '2015-07-20 06:19:18', '2015-07-20 06:19:18', '', 198, 'http://localhost/jegadeesh/ajaxexcluse/198-revision-v1/', 0, 'revision', '', 0),
(202, 1, '2015-07-24 05:38:10', '2015-07-24 05:38:10', ' ', '', '', 'publish', 'open', 'open', '', '202', '', '', '2015-07-24 06:44:46', '2015-07-24 06:44:46', '', 0, 'http://localhost/jegadeesh/ajaxexcluse/?p=202', 1, 'nav_menu_item', '', 0),
(205, 1, '2015-07-24 05:56:30', '2015-07-24 05:56:30', ' ', '', '', 'publish', 'open', 'open', '', '205', '', '', '2015-07-24 06:44:46', '2015-07-24 06:44:46', '', 0, 'http://localhost/jegadeesh/ajaxexcluse/?p=205', 2, 'nav_menu_item', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `wp_ratings`
--

CREATE TABLE IF NOT EXISTS `wp_ratings` (
`rating_id` int(11) NOT NULL,
  `rating_postid` int(11) NOT NULL,
  `rating_posttitle` text NOT NULL,
  `rating_rating` int(2) NOT NULL,
  `rating_timestamp` varchar(15) NOT NULL,
  `rating_ip` varchar(40) NOT NULL,
  `rating_host` varchar(200) NOT NULL,
  `rating_username` varchar(50) NOT NULL,
  `rating_userid` int(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wp_ratings`
--

INSERT INTO `wp_ratings` (`rating_id`, `rating_postid`, `rating_posttitle`, `rating_rating`, `rating_timestamp`, `rating_ip`, `rating_host`, `rating_username`, `rating_userid`) VALUES
(1, 36, 'jegadeesh', 5, '1432031409', '::1', 'Zen6', 'admin', 1),
(2, 118, 'latest', 4, '1432809282', '::1', 'Zen6', 'admin', 1),
(3, 118, 'latest', 2, '1432815205', '::1', 'Zen6', 'Guest', 0),
(4, 125, 'ramesh4', 3, '1433756097', '::1', 'Zen6', 'admin', 1),
(5, 124, 'ramesh3', 5, '1433756310', '::1', 'Zen6', 'admin', 1),
(6, 124, 'ramesh3', 3, '1433930743', '::1', 'zen6', 'admin', 1),
(7, 125, 'ramesh4', 5, '1433930751', '::1', 'zen6', 'admin', 1),
(8, 118, 'Latest gfd ggfd ggdfg dfgdfgd gg dfgfdg fdgfd gfdgdfg Latest Latest Latest Latest Latest Latest Latest Latest', 5, '1433930800', '::1', 'zen6', 'admin', 1),
(9, 156, 'test1', 4, '1436792657', '::1', 'zen6', 'admin', 1),
(10, 158, 'test3', 3, '1436792695', '::1', 'zen6', 'admin', 1),
(11, 190, 'product6', 3, '1436857319', '::1', 'zen6', 'admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `wp_terms`
--

CREATE TABLE IF NOT EXISTS `wp_terms` (
`term_id` bigint(20) unsigned NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `slug` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `term_group` bigint(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wp_terms`
--

INSERT INTO `wp_terms` (`term_id`, `name`, `slug`, `term_group`) VALUES
(1, 'Uncategorized', 'uncategorized', 0),
(2, 'simple', 'simple', 0),
(3, 'grouped', 'grouped', 0),
(4, 'variable', 'variable', 0),
(5, 'external', 'external', 0),
(15, '50', '50', 0),
(16, 'red', 'red', 0),
(30, '2xl', '2xl', 0),
(31, 'xl', 'xl', 0),
(32, 'lg', 'lg', 0),
(33, 'md', 'md', 0),
(34, 'sm', 'sm', 0),
(35, 'xxxxxl', 'xxxxxl', 0),
(36, 'main_menu', 'main_menu', 0),
(37, 'main1', 'main1', 0),
(38, 'main2', 'main2', 0),
(39, 'sub1', 'sub1', 0),
(40, 'mainmain', 'mainmain', 0),
(41, 'red', 'red', 0),
(42, 'green', 'green', 0),
(43, 'brand7', 'brand7', 0),
(44, 'brand8', 'brand8', 0),
(45, 'brand3', 'brand3', 0),
(46, 'brand1', 'brand1', 0),
(47, 'brand4', 'brand4', 0),
(48, 'brand9', 'brand9', 0),
(49, 'brand2', 'brand2', 0),
(50, 'brand6', 'brand6', 0),
(51, 'brand5', 'brand5', 0),
(52, 'mainmenu', 'mainmenu', 0),
(53, 'ramesh', 'ramesh', 0),
(54, 'ramesh', 'ramesh', 0),
(55, 'ramesh', 'ramesh', 0),
(56, 'cvcxvcxv', 'cvcxvcxv', 0),
(57, 'xcvvdfgfd', 'xcvvdfgfd', 0),
(58, 'secondlevel', 'secondlevel', 0),
(59, 'third_level', 'third_level', 0);

-- --------------------------------------------------------

--
-- Table structure for table `wp_term_relationships`
--

CREATE TABLE IF NOT EXISTS `wp_term_relationships` (
  `object_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `term_taxonomy_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `term_order` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wp_term_relationships`
--

INSERT INTO `wp_term_relationships` (`object_id`, `term_taxonomy_id`, `term_order`) VALUES
(1, 57, 0),
(22, 15, 0),
(36, 5, 0),
(36, 37, 0),
(36, 38, 0),
(36, 39, 0),
(96, 2, 0),
(96, 38, 0),
(97, 2, 0),
(97, 37, 0),
(99, 36, 0),
(100, 36, 0),
(101, 36, 0),
(102, 36, 0),
(103, 36, 0),
(105, 2, 0),
(105, 38, 0),
(106, 2, 0),
(106, 37, 0),
(156, 2, 0),
(156, 37, 0),
(156, 41, 0),
(157, 2, 0),
(157, 38, 0),
(157, 49, 0),
(157, 54, 0),
(158, 5, 0),
(158, 37, 0),
(158, 46, 0),
(159, 2, 0),
(159, 37, 0),
(159, 42, 0),
(160, 2, 0),
(160, 30, 0),
(160, 37, 0),
(160, 47, 0),
(164, 56, 0),
(177, 1, 0),
(179, 2, 0),
(179, 38, 0),
(182, 2, 0),
(182, 30, 0),
(182, 38, 0),
(182, 39, 0),
(182, 46, 0),
(182, 47, 0),
(182, 59, 0),
(190, 2, 0),
(190, 37, 0),
(191, 2, 0),
(191, 37, 0),
(202, 52, 0),
(205, 52, 0);

-- --------------------------------------------------------

--
-- Table structure for table `wp_term_taxonomy`
--

CREATE TABLE IF NOT EXISTS `wp_term_taxonomy` (
`term_taxonomy_id` bigint(20) unsigned NOT NULL,
  `term_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `taxonomy` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent` bigint(20) unsigned NOT NULL DEFAULT '0',
  `count` bigint(20) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wp_term_taxonomy`
--

INSERT INTO `wp_term_taxonomy` (`term_taxonomy_id`, `term_id`, `taxonomy`, `description`, `parent`, `count`) VALUES
(1, 1, 'category', '', 0, 1),
(2, 2, 'product_type', '', 0, 8),
(3, 3, 'product_type', '', 0, 0),
(4, 4, 'product_type', '', 0, 0),
(5, 5, 'product_type', '', 0, 1),
(15, 15, 'pa_type', '', 0, 1),
(16, 16, 'pa_type', '', 0, 0),
(30, 30, 'pa_size', '', 0, 2),
(31, 31, 'pa_size', '', 0, 0),
(32, 32, 'pa_size', '', 0, 0),
(33, 33, 'pa_size', '', 0, 0),
(34, 34, 'pa_size', '', 0, 0),
(35, 35, 'pa_size', '', 0, 0),
(36, 36, 'nav_menu', '', 0, 5),
(37, 37, 'product_cat', 'rewewrw rwrwerew rewrewrew ewrewrewr', 40, 6),
(38, 38, 'product_cat', '', 0, 3),
(39, 39, 'product_cat', '', 37, 1),
(40, 40, 'product_cat', '', 38, 0),
(41, 41, 'pa_color', '', 0, 1),
(42, 42, 'pa_color', '', 0, 1),
(43, 43, 'pa_brand', '', 0, 0),
(44, 44, 'pa_brand', '', 0, 0),
(45, 45, 'pa_brand', '', 0, 0),
(46, 46, 'pa_brand', '', 0, 2),
(47, 47, 'pa_brand', '', 0, 2),
(48, 48, 'pa_brand', '', 0, 0),
(49, 49, 'pa_brand', '', 0, 1),
(50, 50, 'pa_brand', '', 0, 0),
(51, 51, 'pa_brand', '', 0, 0),
(52, 52, 'nav_menu', '', 0, 2),
(53, 53, 'pa_size', '', 0, 0),
(54, 54, 'pa_color', '', 0, 1),
(55, 55, 'pa_brand', '', 0, 0),
(56, 56, 'category', '', 0, 1),
(57, 57, 'category', '', 0, 1),
(58, 58, 'product_cat', '', 0, 0),
(59, 59, 'product_cat', '', 58, 1);

-- --------------------------------------------------------

--
-- Table structure for table `wp_usermeta`
--

CREATE TABLE IF NOT EXISTS `wp_usermeta` (
`umeta_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB AUTO_INCREMENT=188 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wp_usermeta`
--

INSERT INTO `wp_usermeta` (`umeta_id`, `user_id`, `meta_key`, `meta_value`) VALUES
(1, 1, 'nickname', 'admin'),
(2, 1, 'first_name', ''),
(3, 1, 'last_name', ''),
(4, 1, 'description', ''),
(5, 1, 'rich_editing', 'true'),
(6, 1, 'comment_shortcuts', 'false'),
(7, 1, 'admin_color', 'fresh'),
(8, 1, 'use_ssl', '0'),
(9, 1, 'show_admin_bar_front', 'true'),
(10, 1, 'wp_capabilities', 'a:1:{s:13:"administrator";b:1;}'),
(11, 1, 'wp_user_level', '10'),
(12, 1, 'dismissed_wp_pointers', 'wp360_locks,wp390_widgets,wp410_dfw,yith_wcwl_panel,yith_wcas_panel'),
(13, 1, 'show_welcome_panel', '1'),
(15, 1, 'wp_dashboard_quick_press_last_post_id', '195'),
(16, 1, 'wp_user-settings', 'libraryContent=browse&posts_list_mode=list'),
(17, 1, 'wp_user-settings-time', '1435927472'),
(20, 1, 'closedpostboxes_product', 'a:4:{i:0;s:26:"woocommerce-product-images";i:1;s:10:"postcustom";i:2;s:11:"postexcerpt";i:3;s:11:"commentsdiv";}'),
(21, 1, 'metaboxhidden_product', 'a:1:{i:0;s:7:"slugdiv";}'),
(72, 1, 'managenav-menuscolumnshidden', 'a:4:{i:0;s:11:"link-target";i:1;s:11:"css-classes";i:2;s:3:"xfn";i:3;s:11:"description";}'),
(73, 1, 'metaboxhidden_nav-menus', 'a:5:{i:0;s:8:"add-post";i:1;s:11:"add-product";i:2;s:12:"add-post_tag";i:3;s:15:"add-product_tag";i:4;s:30:"woocommerce_endpoints_nav_link";}'),
(76, 1, 'nav_menu_recently_edited', '52'),
(91, 1, 'billing_first_name', ''),
(92, 1, 'billing_last_name', ''),
(93, 1, 'billing_company', ''),
(94, 1, 'billing_address_1', ''),
(95, 1, 'billing_address_2', ''),
(96, 1, 'billing_city', ''),
(97, 1, 'billing_postcode', ''),
(98, 1, 'billing_country', ''),
(99, 1, 'billing_state', ''),
(100, 1, 'billing_phone', ''),
(101, 1, 'billing_email', ''),
(102, 1, 'shipping_first_name', ''),
(103, 1, 'shipping_last_name', ''),
(104, 1, 'shipping_company', ''),
(105, 1, 'shipping_address_1', ''),
(106, 1, 'shipping_address_2', ''),
(107, 1, 'shipping_city', ''),
(108, 1, 'shipping_postcode', ''),
(109, 1, 'shipping_country', ''),
(110, 1, 'shipping_state', ''),
(181, 1, '_woocommerce_persistent_cart', 'a:1:{s:4:"cart";a:0:{}}'),
(183, 1, 'closedpostboxes_dashboard', 'a:2:{i:0;s:28:"woocommerce_dashboard_status";i:1;s:17:"dashboard_primary";}'),
(184, 1, 'metaboxhidden_dashboard', 'a:0:{}'),
(185, 1, '1_reimagined_menu_positions', 'index.php,edit.php,upload.php,edit.php?post_type=page,edit-comments.php,edit.php?post_type=shop_order,edit.php?post_type=product,themes.php,yith_wcas_panel,plugins.php,users.php,tools.php,options-general.php,wp-postratings/postratings-manager.php'),
(186, 1, 'session_tokens', 'a:2:{s:64:"1cfeb88534f2186718bf104956915e5cc2e01900d390d2a9c3335a4ddee05294";a:4:{s:10:"expiration";i:1438585942;s:2:"ip";s:3:"::1";s:2:"ua";s:109:"Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/43.0.2357.134 Safari/537.36";s:5:"login";i:1437376342;}s:64:"5aab06f550f9a0897e93861f6e3e1aba06cbc8ae5d9328012183d15eb5997d2c";a:4:{s:10:"expiration";i:1437985226;s:2:"ip";s:3:"::1";s:2:"ua";s:72:"Mozilla/5.0 (Windows NT 6.3; WOW64; rv:39.0) Gecko/20100101 Firefox/39.0";s:5:"login";i:1437812426;}}'),
(187, 1, 'closedpostboxes_nav-menus', 'a:0:{}');

-- --------------------------------------------------------

--
-- Table structure for table `wp_users`
--

CREATE TABLE IF NOT EXISTS `wp_users` (
`ID` bigint(20) unsigned NOT NULL,
  `user_login` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_pass` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_nicename` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_url` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_registered` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_activation_key` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_status` int(11) NOT NULL DEFAULT '0',
  `display_name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wp_users`
--

INSERT INTO `wp_users` (`ID`, `user_login`, `user_pass`, `user_nicename`, `user_email`, `user_url`, `user_registered`, `user_activation_key`, `user_status`, `display_name`) VALUES
(1, 'admin', '$P$BV1QKZN.SVT0zUI5g3Qenyzp5ZBTZA/', 'admin', 'jegadeesh@zenstill.com', '', '2015-05-07 12:17:26', '', 0, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `wp_woocommerce_attribute_taxonomies`
--

CREATE TABLE IF NOT EXISTS `wp_woocommerce_attribute_taxonomies` (
`attribute_id` bigint(20) NOT NULL,
  `attribute_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attribute_label` longtext COLLATE utf8mb4_unicode_ci,
  `attribute_type` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attribute_orderby` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attribute_public` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wp_woocommerce_attribute_taxonomies`
--

INSERT INTO `wp_woocommerce_attribute_taxonomies` (`attribute_id`, `attribute_name`, `attribute_label`, `attribute_type`, `attribute_orderby`, `attribute_public`) VALUES
(14, 'size', 'size', 'select', 'menu_order', 0),
(15, 'color', 'color', 'select', 'menu_order', 0);

-- --------------------------------------------------------

--
-- Table structure for table `wp_woocommerce_downloadable_product_permissions`
--

CREATE TABLE IF NOT EXISTS `wp_woocommerce_downloadable_product_permissions` (
`permission_id` bigint(20) NOT NULL,
  `download_id` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `order_id` bigint(20) NOT NULL DEFAULT '0',
  `order_key` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_email` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `downloads_remaining` varchar(9) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `access_granted` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `access_expires` datetime DEFAULT NULL,
  `download_count` bigint(20) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wp_woocommerce_order_itemmeta`
--

CREATE TABLE IF NOT EXISTS `wp_woocommerce_order_itemmeta` (
`meta_id` bigint(20) NOT NULL,
  `order_item_id` bigint(20) NOT NULL,
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wp_woocommerce_order_items`
--

CREATE TABLE IF NOT EXISTS `wp_woocommerce_order_items` (
`order_item_id` bigint(20) NOT NULL,
  `order_item_name` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_item_type` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `order_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wp_woocommerce_tax_rates`
--

CREATE TABLE IF NOT EXISTS `wp_woocommerce_tax_rates` (
`tax_rate_id` bigint(20) NOT NULL,
  `tax_rate_country` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `tax_rate_state` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `tax_rate` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `tax_rate_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `tax_rate_priority` bigint(20) NOT NULL,
  `tax_rate_compound` int(1) NOT NULL DEFAULT '0',
  `tax_rate_shipping` int(1) NOT NULL DEFAULT '1',
  `tax_rate_order` bigint(20) NOT NULL,
  `tax_rate_class` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wp_woocommerce_tax_rate_locations`
--

CREATE TABLE IF NOT EXISTS `wp_woocommerce_tax_rate_locations` (
`location_id` bigint(20) NOT NULL,
  `location_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tax_rate_id` bigint(20) NOT NULL,
  `location_type` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wp_woocommerce_termmeta`
--

CREATE TABLE IF NOT EXISTS `wp_woocommerce_termmeta` (
`meta_id` bigint(20) NOT NULL,
  `woocommerce_term_id` bigint(20) NOT NULL,
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wp_woocommerce_termmeta`
--

INSERT INTO `wp_woocommerce_termmeta` (`meta_id`, `woocommerce_term_id`, `meta_key`, `meta_value`) VALUES
(34, 74, 'order_pa_size', '0'),
(35, 80, 'order_pa_size', '0'),
(36, 37, 'order', '0'),
(37, 37, 'product_count_product_cat', '7'),
(38, 38, 'order', '0'),
(39, 38, 'product_count_product_cat', '9'),
(40, 39, 'order', '0'),
(41, 39, 'product_count_product_cat', '1'),
(42, 40, 'order', '0'),
(43, 40, 'display_type', ''),
(44, 40, 'thumbnail_id', '0'),
(45, 37, 'display_type', ''),
(46, 37, 'thumbnail_id', '0'),
(47, 40, 'product_count_product_cat', '7'),
(48, 41, 'order_pa_color', '0'),
(49, 42, 'order_pa_color', '0'),
(50, 43, 'order_pa_brand', '0'),
(51, 44, 'order_pa_brand', '0'),
(52, 45, 'order_pa_brand', '0'),
(53, 46, 'order_pa_brand', '0'),
(54, 47, 'order_pa_brand', '0'),
(55, 48, 'order_pa_brand', '0'),
(56, 49, 'order_pa_brand', '0'),
(57, 50, 'order_pa_brand', '0'),
(58, 51, 'order_pa_brand', '0'),
(59, 58, 'order', '0'),
(60, 58, 'display_type', ''),
(61, 58, 'thumbnail_id', '0'),
(62, 59, 'order', '0'),
(63, 59, 'display_type', ''),
(64, 59, 'thumbnail_id', '0'),
(65, 59, 'product_count_product_cat', '1'),
(66, 58, 'product_count_product_cat', '1');

-- --------------------------------------------------------

--
-- Table structure for table `wp_wsluserscontacts`
--

CREATE TABLE IF NOT EXISTS `wp_wsluserscontacts` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `provider` varchar(50) NOT NULL,
  `identifier` varchar(255) NOT NULL,
  `full_name` varchar(150) NOT NULL,
  `email` varchar(255) NOT NULL,
  `profile_url` varchar(255) NOT NULL,
  `photo_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `wp_wslusersprofiles`
--

CREATE TABLE IF NOT EXISTS `wp_wslusersprofiles` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `provider` varchar(50) NOT NULL,
  `object_sha` varchar(45) NOT NULL,
  `identifier` varchar(255) NOT NULL,
  `profileurl` varchar(255) NOT NULL,
  `websiteurl` varchar(255) NOT NULL,
  `photourl` varchar(255) NOT NULL,
  `displayname` varchar(150) NOT NULL,
  `description` varchar(255) NOT NULL,
  `firstname` varchar(150) NOT NULL,
  `lastname` varchar(150) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `language` varchar(20) NOT NULL,
  `age` varchar(10) NOT NULL,
  `birthday` int(11) NOT NULL,
  `birthmonth` int(11) NOT NULL,
  `birthyear` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `emailverified` varchar(255) NOT NULL,
  `phone` varchar(75) NOT NULL,
  `address` varchar(255) NOT NULL,
  `country` varchar(75) NOT NULL,
  `region` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `zip` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `wp_yith_wcwl`
--

CREATE TABLE IF NOT EXISTS `wp_yith_wcwl` (
`ID` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `wishlist_id` int(11) DEFAULT NULL,
  `dateadded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `wp_yith_wcwl`
--

INSERT INTO `wp_yith_wcwl` (`ID`, `prod_id`, `quantity`, `user_id`, `wishlist_id`, `dateadded`) VALUES
(14, 125, 1, 1, 1, '2015-06-04 07:34:20'),
(15, 107, 1, 1, 1, '2015-06-11 23:55:27'),
(16, 160, 1, 1, 1, '2015-06-29 03:50:22');

-- --------------------------------------------------------

--
-- Table structure for table `wp_yith_wcwl_lists`
--

CREATE TABLE IF NOT EXISTS `wp_yith_wcwl_lists` (
`ID` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `wishlist_slug` varchar(200) NOT NULL,
  `wishlist_name` text,
  `wishlist_token` varchar(64) NOT NULL,
  `wishlist_privacy` tinyint(1) NOT NULL DEFAULT '0',
  `is_default` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `wp_yith_wcwl_lists`
--

INSERT INTO `wp_yith_wcwl_lists` (`ID`, `user_id`, `wishlist_slug`, `wishlist_name`, `wishlist_token`, `wishlist_privacy`, `is_default`) VALUES
(1, 1, '', '', '88OK5ED3CDZ1', 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addtocompare`
--
ALTER TABLE `addtocompare`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `add_to_wishlist`
--
ALTER TABLE `add_to_wishlist`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `saved_search`
--
ALTER TABLE `saved_search`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist_group`
--
ALTER TABLE `wishlist_group`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wp_commentmeta`
--
ALTER TABLE `wp_commentmeta`
 ADD PRIMARY KEY (`meta_id`), ADD KEY `comment_id` (`comment_id`), ADD KEY `meta_key` (`meta_key`(191));

--
-- Indexes for table `wp_comments`
--
ALTER TABLE `wp_comments`
 ADD PRIMARY KEY (`comment_ID`), ADD KEY `comment_post_ID` (`comment_post_ID`), ADD KEY `comment_approved_date_gmt` (`comment_approved`,`comment_date_gmt`), ADD KEY `comment_date_gmt` (`comment_date_gmt`), ADD KEY `comment_parent` (`comment_parent`), ADD KEY `comment_author_email` (`comment_author_email`(10));

--
-- Indexes for table `wp_links`
--
ALTER TABLE `wp_links`
 ADD PRIMARY KEY (`link_id`), ADD KEY `link_visible` (`link_visible`);

--
-- Indexes for table `wp_options`
--
ALTER TABLE `wp_options`
 ADD PRIMARY KEY (`option_id`), ADD UNIQUE KEY `option_name` (`option_name`);

--
-- Indexes for table `wp_postmeta`
--
ALTER TABLE `wp_postmeta`
 ADD PRIMARY KEY (`meta_id`), ADD KEY `post_id` (`post_id`), ADD KEY `meta_key` (`meta_key`(191));

--
-- Indexes for table `wp_posts`
--
ALTER TABLE `wp_posts`
 ADD PRIMARY KEY (`ID`), ADD KEY `post_name` (`post_name`(191)), ADD KEY `type_status_date` (`post_type`,`post_status`,`post_date`,`ID`), ADD KEY `post_parent` (`post_parent`), ADD KEY `post_author` (`post_author`);

--
-- Indexes for table `wp_ratings`
--
ALTER TABLE `wp_ratings`
 ADD PRIMARY KEY (`rating_id`);

--
-- Indexes for table `wp_terms`
--
ALTER TABLE `wp_terms`
 ADD PRIMARY KEY (`term_id`), ADD KEY `slug` (`slug`(191)), ADD KEY `name` (`name`(191));

--
-- Indexes for table `wp_term_relationships`
--
ALTER TABLE `wp_term_relationships`
 ADD PRIMARY KEY (`object_id`,`term_taxonomy_id`), ADD KEY `term_taxonomy_id` (`term_taxonomy_id`);

--
-- Indexes for table `wp_term_taxonomy`
--
ALTER TABLE `wp_term_taxonomy`
 ADD PRIMARY KEY (`term_taxonomy_id`), ADD UNIQUE KEY `term_id_taxonomy` (`term_id`,`taxonomy`), ADD KEY `taxonomy` (`taxonomy`);

--
-- Indexes for table `wp_usermeta`
--
ALTER TABLE `wp_usermeta`
 ADD PRIMARY KEY (`umeta_id`), ADD KEY `user_id` (`user_id`), ADD KEY `meta_key` (`meta_key`(191));

--
-- Indexes for table `wp_users`
--
ALTER TABLE `wp_users`
 ADD PRIMARY KEY (`ID`), ADD KEY `user_login_key` (`user_login`), ADD KEY `user_nicename` (`user_nicename`);

--
-- Indexes for table `wp_woocommerce_attribute_taxonomies`
--
ALTER TABLE `wp_woocommerce_attribute_taxonomies`
 ADD PRIMARY KEY (`attribute_id`), ADD KEY `attribute_name` (`attribute_name`(191));

--
-- Indexes for table `wp_woocommerce_downloadable_product_permissions`
--
ALTER TABLE `wp_woocommerce_downloadable_product_permissions`
 ADD PRIMARY KEY (`permission_id`), ADD KEY `download_order_key_product` (`product_id`,`order_id`,`order_key`(191),`download_id`), ADD KEY `download_order_product` (`download_id`,`order_id`,`product_id`);

--
-- Indexes for table `wp_woocommerce_order_itemmeta`
--
ALTER TABLE `wp_woocommerce_order_itemmeta`
 ADD PRIMARY KEY (`meta_id`), ADD KEY `order_item_id` (`order_item_id`), ADD KEY `meta_key` (`meta_key`(191));

--
-- Indexes for table `wp_woocommerce_order_items`
--
ALTER TABLE `wp_woocommerce_order_items`
 ADD PRIMARY KEY (`order_item_id`), ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `wp_woocommerce_tax_rates`
--
ALTER TABLE `wp_woocommerce_tax_rates`
 ADD PRIMARY KEY (`tax_rate_id`), ADD KEY `tax_rate_country` (`tax_rate_country`(191)), ADD KEY `tax_rate_state` (`tax_rate_state`(191)), ADD KEY `tax_rate_class` (`tax_rate_class`(191)), ADD KEY `tax_rate_priority` (`tax_rate_priority`);

--
-- Indexes for table `wp_woocommerce_tax_rate_locations`
--
ALTER TABLE `wp_woocommerce_tax_rate_locations`
 ADD PRIMARY KEY (`location_id`), ADD KEY `tax_rate_id` (`tax_rate_id`), ADD KEY `location_type` (`location_type`), ADD KEY `location_type_code` (`location_type`,`location_code`(191));

--
-- Indexes for table `wp_woocommerce_termmeta`
--
ALTER TABLE `wp_woocommerce_termmeta`
 ADD PRIMARY KEY (`meta_id`), ADD KEY `woocommerce_term_id` (`woocommerce_term_id`), ADD KEY `meta_key` (`meta_key`(191));

--
-- Indexes for table `wp_wsluserscontacts`
--
ALTER TABLE `wp_wsluserscontacts`
 ADD UNIQUE KEY `id` (`id`), ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `wp_wslusersprofiles`
--
ALTER TABLE `wp_wslusersprofiles`
 ADD UNIQUE KEY `id` (`id`), ADD KEY `user_id` (`user_id`), ADD KEY `provider` (`provider`);

--
-- Indexes for table `wp_yith_wcwl`
--
ALTER TABLE `wp_yith_wcwl`
 ADD PRIMARY KEY (`ID`), ADD KEY `prod_id` (`prod_id`);

--
-- Indexes for table `wp_yith_wcwl_lists`
--
ALTER TABLE `wp_yith_wcwl_lists`
 ADD PRIMARY KEY (`ID`), ADD UNIQUE KEY `wishlist_token` (`wishlist_token`), ADD KEY `wishlist_slug` (`wishlist_slug`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addtocompare`
--
ALTER TABLE `addtocompare`
MODIFY `id` int(12) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `add_to_wishlist`
--
ALTER TABLE `add_to_wishlist`
MODIFY `id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT for table `saved_search`
--
ALTER TABLE `saved_search`
MODIFY `id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `wishlist_group`
--
ALTER TABLE `wishlist_group`
MODIFY `id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `wp_commentmeta`
--
ALTER TABLE `wp_commentmeta`
MODIFY `meta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `wp_comments`
--
ALTER TABLE `wp_comments`
MODIFY `comment_ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `wp_links`
--
ALTER TABLE `wp_links`
MODIFY `link_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `wp_options`
--
ALTER TABLE `wp_options`
MODIFY `option_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3906;
--
-- AUTO_INCREMENT for table `wp_postmeta`
--
ALTER TABLE `wp_postmeta`
MODIFY `meta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1822;
--
-- AUTO_INCREMENT for table `wp_posts`
--
ALTER TABLE `wp_posts`
MODIFY `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=206;
--
-- AUTO_INCREMENT for table `wp_ratings`
--
ALTER TABLE `wp_ratings`
MODIFY `rating_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `wp_terms`
--
ALTER TABLE `wp_terms`
MODIFY `term_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=60;
--
-- AUTO_INCREMENT for table `wp_term_taxonomy`
--
ALTER TABLE `wp_term_taxonomy`
MODIFY `term_taxonomy_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=60;
--
-- AUTO_INCREMENT for table `wp_usermeta`
--
ALTER TABLE `wp_usermeta`
MODIFY `umeta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=188;
--
-- AUTO_INCREMENT for table `wp_users`
--
ALTER TABLE `wp_users`
MODIFY `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `wp_woocommerce_attribute_taxonomies`
--
ALTER TABLE `wp_woocommerce_attribute_taxonomies`
MODIFY `attribute_id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `wp_woocommerce_downloadable_product_permissions`
--
ALTER TABLE `wp_woocommerce_downloadable_product_permissions`
MODIFY `permission_id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `wp_woocommerce_order_itemmeta`
--
ALTER TABLE `wp_woocommerce_order_itemmeta`
MODIFY `meta_id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `wp_woocommerce_order_items`
--
ALTER TABLE `wp_woocommerce_order_items`
MODIFY `order_item_id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `wp_woocommerce_tax_rates`
--
ALTER TABLE `wp_woocommerce_tax_rates`
MODIFY `tax_rate_id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `wp_woocommerce_tax_rate_locations`
--
ALTER TABLE `wp_woocommerce_tax_rate_locations`
MODIFY `location_id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `wp_woocommerce_termmeta`
--
ALTER TABLE `wp_woocommerce_termmeta`
MODIFY `meta_id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=67;
--
-- AUTO_INCREMENT for table `wp_wsluserscontacts`
--
ALTER TABLE `wp_wsluserscontacts`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `wp_wslusersprofiles`
--
ALTER TABLE `wp_wslusersprofiles`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `wp_yith_wcwl`
--
ALTER TABLE `wp_yith_wcwl`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `wp_yith_wcwl_lists`
--
ALTER TABLE `wp_yith_wcwl_lists`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
