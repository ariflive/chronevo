-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 14, 2026 at 11:57 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chronevo`
--

-- --------------------------------------------------------

--
-- Table structure for table `wp_commentmeta`
--

CREATE TABLE `wp_commentmeta` (
  `meta_id` bigint(20) UNSIGNED NOT NULL,
  `comment_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_value` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wp_comments`
--

CREATE TABLE `wp_comments` (
  `comment_ID` bigint(20) UNSIGNED NOT NULL,
  `comment_post_ID` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `comment_author` tinytext NOT NULL,
  `comment_author_email` varchar(100) NOT NULL DEFAULT '',
  `comment_author_url` varchar(200) NOT NULL DEFAULT '',
  `comment_author_IP` varchar(100) NOT NULL DEFAULT '',
  `comment_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comment_date_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comment_content` text NOT NULL,
  `comment_karma` int(11) NOT NULL DEFAULT 0,
  `comment_approved` varchar(20) NOT NULL DEFAULT '1',
  `comment_agent` varchar(255) NOT NULL DEFAULT '',
  `comment_type` varchar(20) NOT NULL DEFAULT 'comment',
  `comment_parent` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `user_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `wp_comments`
--

INSERT INTO `wp_comments` (`comment_ID`, `comment_post_ID`, `comment_author`, `comment_author_email`, `comment_author_url`, `comment_author_IP`, `comment_date`, `comment_date_gmt`, `comment_content`, `comment_karma`, `comment_approved`, `comment_agent`, `comment_type`, `comment_parent`, `user_id`) VALUES
(1, 1, 'A WordPress Commenter', 'wapuu@wordpress.example', 'https://wordpress.org/', '', '2026-01-17 05:12:57', '2026-01-17 05:12:57', 'Hi, this is a comment.\nTo get started with moderating, editing, and deleting comments, please visit the Comments screen in the dashboard.\nCommenter avatars come from <a href=\"https://gravatar.com/\">Gravatar</a>.', 0, '1', '', 'comment', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `wp_links`
--

CREATE TABLE `wp_links` (
  `link_id` bigint(20) UNSIGNED NOT NULL,
  `link_url` varchar(255) NOT NULL DEFAULT '',
  `link_name` varchar(255) NOT NULL DEFAULT '',
  `link_image` varchar(255) NOT NULL DEFAULT '',
  `link_target` varchar(25) NOT NULL DEFAULT '',
  `link_description` varchar(255) NOT NULL DEFAULT '',
  `link_visible` varchar(20) NOT NULL DEFAULT 'Y',
  `link_owner` bigint(20) UNSIGNED NOT NULL DEFAULT 1,
  `link_rating` int(11) NOT NULL DEFAULT 0,
  `link_updated` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `link_rel` varchar(255) NOT NULL DEFAULT '',
  `link_notes` mediumtext NOT NULL,
  `link_rss` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wp_options`
--

CREATE TABLE `wp_options` (
  `option_id` bigint(20) UNSIGNED NOT NULL,
  `option_name` varchar(191) NOT NULL DEFAULT '',
  `option_value` longtext NOT NULL,
  `autoload` varchar(20) NOT NULL DEFAULT 'yes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `wp_options`
--

INSERT INTO `wp_options` (`option_id`, `option_name`, `option_value`, `autoload`) VALUES
(1, 'cron', 'a:11:{i:1771067578;a:1:{s:34:\"wp_privacy_delete_old_export_files\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:6:\"hourly\";s:4:\"args\";a:0:{}s:8:\"interval\";i:3600;}}}i:1771089196;a:1:{s:21:\"wp_update_user_counts\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:10:\"twicedaily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:43200;}}}i:1771092777;a:1:{s:16:\"wp_version_check\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:10:\"twicedaily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:43200;}}}i:1771094577;a:1:{s:17:\"wp_update_plugins\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:10:\"twicedaily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:43200;}}}i:1771096377;a:1:{s:16:\"wp_update_themes\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:10:\"twicedaily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:43200;}}}i:1771132378;a:2:{s:30:\"wp_site_health_scheduled_check\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:6:\"weekly\";s:4:\"args\";a:0:{}s:8:\"interval\";i:604800;}}s:32:\"recovery_mode_clean_expired_keys\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:5:\"daily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:86400;}}}i:1771132396;a:2:{s:19:\"wp_scheduled_delete\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:5:\"daily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:86400;}}s:25:\"delete_expired_transients\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:5:\"daily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:86400;}}}i:1771132400;a:1:{s:30:\"wp_scheduled_auto_draft_delete\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:5:\"daily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:86400;}}}i:1771650823;a:1:{s:30:\"wp_delete_temp_updater_backups\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:6:\"weekly\";s:4:\"args\";a:0:{}s:8:\"interval\";i:604800;}}}i:1771651238;a:1:{s:27:\"acf_update_site_health_data\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:6:\"weekly\";s:4:\"args\";a:0:{}s:8:\"interval\";i:604800;}}}s:7:\"version\";i:2;}', 'on'),
(2, 'siteurl', 'http://localhost/chronevo', 'on'),
(3, 'home', 'http://localhost/chronevo', 'on'),
(4, 'blogname', 'CHRONEVO', 'on'),
(5, 'blogdescription', 'CONNECT EXPLORE DESIGN', 'on'),
(6, 'users_can_register', '0', 'on'),
(7, 'admin_email', 'ariflive.com@gmail.com', 'on'),
(8, 'start_of_week', '1', 'on'),
(9, 'use_balanceTags', '0', 'on'),
(10, 'use_smilies', '1', 'on'),
(11, 'require_name_email', '1', 'on'),
(12, 'comments_notify', '', 'on'),
(13, 'posts_per_rss', '10', 'on'),
(14, 'rss_use_excerpt', '0', 'on'),
(15, 'mailserver_url', 'mail.example.com', 'on'),
(16, 'mailserver_login', 'login@example.com', 'on'),
(17, 'mailserver_pass', '', 'on'),
(18, 'mailserver_port', '110', 'on'),
(19, 'default_category', '1', 'on'),
(20, 'default_comment_status', '', 'on'),
(21, 'default_ping_status', '', 'on'),
(22, 'default_pingback_flag', '', 'on'),
(23, 'posts_per_page', '10', 'on'),
(24, 'date_format', 'F j, Y', 'on'),
(25, 'time_format', 'g:i a', 'on'),
(26, 'links_updated_date_format', 'F j, Y g:i a', 'on'),
(27, 'comment_moderation', '', 'on'),
(28, 'moderation_notify', '', 'on'),
(29, 'permalink_structure', '/%category%/%postname%', 'on'),
(30, 'rewrite_rules', 'a:98:{s:11:\"^wp-json/?$\";s:22:\"index.php?rest_route=/\";s:14:\"^wp-json/(.*)?\";s:33:\"index.php?rest_route=/$matches[1]\";s:21:\"^index.php/wp-json/?$\";s:22:\"index.php?rest_route=/\";s:24:\"^index.php/wp-json/(.*)?\";s:33:\"index.php?rest_route=/$matches[1]\";s:17:\"^wp-sitemap\\.xml$\";s:23:\"index.php?sitemap=index\";s:17:\"^wp-sitemap\\.xsl$\";s:36:\"index.php?sitemap-stylesheet=sitemap\";s:23:\"^wp-sitemap-index\\.xsl$\";s:34:\"index.php?sitemap-stylesheet=index\";s:48:\"^wp-sitemap-([a-z]+?)-([a-z\\d_-]+?)-(\\d+?)\\.xml$\";s:75:\"index.php?sitemap=$matches[1]&sitemap-subtype=$matches[2]&paged=$matches[3]\";s:34:\"^wp-sitemap-([a-z]+?)-(\\d+?)\\.xml$\";s:47:\"index.php?sitemap=$matches[1]&paged=$matches[2]\";s:40:\"./(.+?)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:52:\"index.php?category_name=$matches[1]&feed=$matches[2]\";s:35:\"./(.+?)/(feed|rdf|rss|rss2|atom)/?$\";s:52:\"index.php?category_name=$matches[1]&feed=$matches[2]\";s:16:\"./(.+?)/embed/?$\";s:46:\"index.php?category_name=$matches[1]&embed=true\";s:28:\"./(.+?)/page/?([0-9]{1,})/?$\";s:53:\"index.php?category_name=$matches[1]&paged=$matches[2]\";s:10:\"./(.+?)/?$\";s:35:\"index.php?category_name=$matches[1]\";s:44:\"tag/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:42:\"index.php?tag=$matches[1]&feed=$matches[2]\";s:39:\"tag/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:42:\"index.php?tag=$matches[1]&feed=$matches[2]\";s:20:\"tag/([^/]+)/embed/?$\";s:36:\"index.php?tag=$matches[1]&embed=true\";s:32:\"tag/([^/]+)/page/?([0-9]{1,})/?$\";s:43:\"index.php?tag=$matches[1]&paged=$matches[2]\";s:14:\"tag/([^/]+)/?$\";s:25:\"index.php?tag=$matches[1]\";s:45:\"type/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:50:\"index.php?post_format=$matches[1]&feed=$matches[2]\";s:40:\"type/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:50:\"index.php?post_format=$matches[1]&feed=$matches[2]\";s:21:\"type/([^/]+)/embed/?$\";s:44:\"index.php?post_format=$matches[1]&embed=true\";s:33:\"type/([^/]+)/page/?([0-9]{1,})/?$\";s:51:\"index.php?post_format=$matches[1]&paged=$matches[2]\";s:15:\"type/([^/]+)/?$\";s:33:\"index.php?post_format=$matches[1]\";s:48:\".*wp-(atom|rdf|rss|rss2|feed|commentsrss2)\\.php$\";s:18:\"index.php?feed=old\";s:20:\".*wp-app\\.php(/.*)?$\";s:19:\"index.php?error=403\";s:18:\".*wp-register.php$\";s:23:\"index.php?register=true\";s:32:\"feed/(feed|rdf|rss|rss2|atom)/?$\";s:27:\"index.php?&feed=$matches[1]\";s:27:\"(feed|rdf|rss|rss2|atom)/?$\";s:27:\"index.php?&feed=$matches[1]\";s:8:\"embed/?$\";s:21:\"index.php?&embed=true\";s:20:\"page/?([0-9]{1,})/?$\";s:28:\"index.php?&paged=$matches[1]\";s:27:\"comment-page-([0-9]{1,})/?$\";s:38:\"index.php?&page_id=2&cpage=$matches[1]\";s:41:\"comments/feed/(feed|rdf|rss|rss2|atom)/?$\";s:42:\"index.php?&feed=$matches[1]&withcomments=1\";s:36:\"comments/(feed|rdf|rss|rss2|atom)/?$\";s:42:\"index.php?&feed=$matches[1]&withcomments=1\";s:17:\"comments/embed/?$\";s:21:\"index.php?&embed=true\";s:44:\"search/(.+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:40:\"index.php?s=$matches[1]&feed=$matches[2]\";s:39:\"search/(.+)/(feed|rdf|rss|rss2|atom)/?$\";s:40:\"index.php?s=$matches[1]&feed=$matches[2]\";s:20:\"search/(.+)/embed/?$\";s:34:\"index.php?s=$matches[1]&embed=true\";s:32:\"search/(.+)/page/?([0-9]{1,})/?$\";s:41:\"index.php?s=$matches[1]&paged=$matches[2]\";s:14:\"search/(.+)/?$\";s:23:\"index.php?s=$matches[1]\";s:47:\"author/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:50:\"index.php?author_name=$matches[1]&feed=$matches[2]\";s:42:\"author/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:50:\"index.php?author_name=$matches[1]&feed=$matches[2]\";s:23:\"author/([^/]+)/embed/?$\";s:44:\"index.php?author_name=$matches[1]&embed=true\";s:35:\"author/([^/]+)/page/?([0-9]{1,})/?$\";s:51:\"index.php?author_name=$matches[1]&paged=$matches[2]\";s:17:\"author/([^/]+)/?$\";s:33:\"index.php?author_name=$matches[1]\";s:69:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/feed/(feed|rdf|rss|rss2|atom)/?$\";s:80:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&feed=$matches[4]\";s:64:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/(feed|rdf|rss|rss2|atom)/?$\";s:80:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&feed=$matches[4]\";s:45:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/embed/?$\";s:74:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&embed=true\";s:57:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/page/?([0-9]{1,})/?$\";s:81:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&paged=$matches[4]\";s:39:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/?$\";s:63:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]\";s:56:\"([0-9]{4})/([0-9]{1,2})/feed/(feed|rdf|rss|rss2|atom)/?$\";s:64:\"index.php?year=$matches[1]&monthnum=$matches[2]&feed=$matches[3]\";s:51:\"([0-9]{4})/([0-9]{1,2})/(feed|rdf|rss|rss2|atom)/?$\";s:64:\"index.php?year=$matches[1]&monthnum=$matches[2]&feed=$matches[3]\";s:32:\"([0-9]{4})/([0-9]{1,2})/embed/?$\";s:58:\"index.php?year=$matches[1]&monthnum=$matches[2]&embed=true\";s:44:\"([0-9]{4})/([0-9]{1,2})/page/?([0-9]{1,})/?$\";s:65:\"index.php?year=$matches[1]&monthnum=$matches[2]&paged=$matches[3]\";s:26:\"([0-9]{4})/([0-9]{1,2})/?$\";s:47:\"index.php?year=$matches[1]&monthnum=$matches[2]\";s:43:\"([0-9]{4})/feed/(feed|rdf|rss|rss2|atom)/?$\";s:43:\"index.php?year=$matches[1]&feed=$matches[2]\";s:38:\"([0-9]{4})/(feed|rdf|rss|rss2|atom)/?$\";s:43:\"index.php?year=$matches[1]&feed=$matches[2]\";s:19:\"([0-9]{4})/embed/?$\";s:37:\"index.php?year=$matches[1]&embed=true\";s:31:\"([0-9]{4})/page/?([0-9]{1,})/?$\";s:44:\"index.php?year=$matches[1]&paged=$matches[2]\";s:13:\"([0-9]{4})/?$\";s:26:\"index.php?year=$matches[1]\";s:27:\".?.+?/attachment/([^/]+)/?$\";s:32:\"index.php?attachment=$matches[1]\";s:37:\".?.+?/attachment/([^/]+)/trackback/?$\";s:37:\"index.php?attachment=$matches[1]&tb=1\";s:57:\".?.+?/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:52:\".?.+?/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:52:\".?.+?/attachment/([^/]+)/comment-page-([0-9]{1,})/?$\";s:50:\"index.php?attachment=$matches[1]&cpage=$matches[2]\";s:33:\".?.+?/attachment/([^/]+)/embed/?$\";s:43:\"index.php?attachment=$matches[1]&embed=true\";s:16:\"(.?.+?)/embed/?$\";s:41:\"index.php?pagename=$matches[1]&embed=true\";s:20:\"(.?.+?)/trackback/?$\";s:35:\"index.php?pagename=$matches[1]&tb=1\";s:40:\"(.?.+?)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:47:\"index.php?pagename=$matches[1]&feed=$matches[2]\";s:35:\"(.?.+?)/(feed|rdf|rss|rss2|atom)/?$\";s:47:\"index.php?pagename=$matches[1]&feed=$matches[2]\";s:28:\"(.?.+?)/page/?([0-9]{1,})/?$\";s:48:\"index.php?pagename=$matches[1]&paged=$matches[2]\";s:35:\"(.?.+?)/comment-page-([0-9]{1,})/?$\";s:48:\"index.php?pagename=$matches[1]&cpage=$matches[2]\";s:24:\"(.?.+?)(?:/([0-9]+))?/?$\";s:47:\"index.php?pagename=$matches[1]&page=$matches[2]\";s:31:\".+?/[^/]+/attachment/([^/]+)/?$\";s:32:\"index.php?attachment=$matches[1]\";s:41:\".+?/[^/]+/attachment/([^/]+)/trackback/?$\";s:37:\"index.php?attachment=$matches[1]&tb=1\";s:61:\".+?/[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:56:\".+?/[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:56:\".+?/[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$\";s:50:\"index.php?attachment=$matches[1]&cpage=$matches[2]\";s:37:\".+?/[^/]+/attachment/([^/]+)/embed/?$\";s:43:\"index.php?attachment=$matches[1]&embed=true\";s:22:\"(.+?)/([^/]+)/embed/?$\";s:63:\"index.php?category_name=$matches[1]&name=$matches[2]&embed=true\";s:26:\"(.+?)/([^/]+)/trackback/?$\";s:57:\"index.php?category_name=$matches[1]&name=$matches[2]&tb=1\";s:46:\"(.+?)/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:69:\"index.php?category_name=$matches[1]&name=$matches[2]&feed=$matches[3]\";s:41:\"(.+?)/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:69:\"index.php?category_name=$matches[1]&name=$matches[2]&feed=$matches[3]\";s:34:\"(.+?)/([^/]+)/page/?([0-9]{1,})/?$\";s:70:\"index.php?category_name=$matches[1]&name=$matches[2]&paged=$matches[3]\";s:41:\"(.+?)/([^/]+)/comment-page-([0-9]{1,})/?$\";s:70:\"index.php?category_name=$matches[1]&name=$matches[2]&cpage=$matches[3]\";s:30:\"(.+?)/([^/]+)(?:/([0-9]+))?/?$\";s:69:\"index.php?category_name=$matches[1]&name=$matches[2]&page=$matches[3]\";s:20:\".+?/[^/]+/([^/]+)/?$\";s:32:\"index.php?attachment=$matches[1]\";s:30:\".+?/[^/]+/([^/]+)/trackback/?$\";s:37:\"index.php?attachment=$matches[1]&tb=1\";s:50:\".+?/[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:45:\".+?/[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:45:\".+?/[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$\";s:50:\"index.php?attachment=$matches[1]&cpage=$matches[2]\";s:26:\".+?/[^/]+/([^/]+)/embed/?$\";s:43:\"index.php?attachment=$matches[1]&embed=true\";s:38:\"(.+?)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:52:\"index.php?category_name=$matches[1]&feed=$matches[2]\";s:33:\"(.+?)/(feed|rdf|rss|rss2|atom)/?$\";s:52:\"index.php?category_name=$matches[1]&feed=$matches[2]\";s:14:\"(.+?)/embed/?$\";s:46:\"index.php?category_name=$matches[1]&embed=true\";s:26:\"(.+?)/page/?([0-9]{1,})/?$\";s:53:\"index.php?category_name=$matches[1]&paged=$matches[2]\";s:33:\"(.+?)/comment-page-([0-9]{1,})/?$\";s:53:\"index.php?category_name=$matches[1]&cpage=$matches[2]\";s:8:\"(.+?)/?$\";s:35:\"index.php?category_name=$matches[1]\";}', 'on'),
(31, 'hack_file', '0', 'on'),
(32, 'blog_charset', 'UTF-8', 'on'),
(33, 'moderation_keys', '', 'off'),
(34, 'active_plugins', 'a:2:{i:0;s:30:\"advanced-custom-fields/acf.php\";i:1;s:33:\"classic-editor/classic-editor.php\";}', 'on'),
(35, 'category_base', '/.', 'on'),
(36, 'ping_sites', 'https://rpc.pingomatic.com/', 'on'),
(37, 'comment_max_links', '2', 'on'),
(38, 'gmt_offset', '4', 'on'),
(39, 'default_email_category', '1', 'on'),
(40, 'recently_edited', '', 'off'),
(41, 'template', 'chronevo', 'on'),
(42, 'stylesheet', 'chronevo', 'on'),
(43, 'comment_registration', '', 'on'),
(44, 'html_type', 'text/html', 'on'),
(45, 'use_trackback', '0', 'on'),
(46, 'default_role', 'subscriber', 'on'),
(47, 'db_version', '60717', 'on'),
(48, 'uploads_use_yearmonth_folders', '', 'on'),
(49, 'upload_path', '', 'on'),
(50, 'blog_public', '1', 'on'),
(51, 'default_link_category', '2', 'on'),
(52, 'show_on_front', 'page', 'on'),
(53, 'tag_base', '', 'on'),
(54, 'show_avatars', '1', 'on'),
(55, 'avatar_rating', 'G', 'on'),
(56, 'upload_url_path', '', 'on'),
(57, 'thumbnail_size_w', '0', 'on'),
(58, 'thumbnail_size_h', '0', 'on'),
(59, 'thumbnail_crop', '', 'on'),
(60, 'medium_size_w', '0', 'on'),
(61, 'medium_size_h', '0', 'on'),
(62, 'avatar_default', 'mystery', 'on'),
(63, 'large_size_w', '0', 'on'),
(64, 'large_size_h', '0', 'on'),
(65, 'image_default_link_type', '', 'on'),
(66, 'image_default_size', '', 'on'),
(67, 'image_default_align', '', 'on'),
(68, 'close_comments_for_old_posts', '', 'on'),
(69, 'close_comments_days_old', '14', 'on'),
(70, 'thread_comments', '1', 'on'),
(71, 'thread_comments_depth', '5', 'on'),
(72, 'page_comments', '', 'on'),
(73, 'comments_per_page', '50', 'on'),
(74, 'default_comments_page', 'newest', 'on'),
(75, 'comment_order', 'asc', 'on'),
(76, 'sticky_posts', 'a:0:{}', 'on'),
(77, 'widget_categories', 'a:0:{}', 'on'),
(78, 'widget_text', 'a:0:{}', 'on'),
(79, 'widget_rss', 'a:0:{}', 'on'),
(80, 'uninstall_plugins', 'a:0:{}', 'off'),
(81, 'timezone_string', '', 'on'),
(82, 'page_for_posts', '0', 'on'),
(83, 'page_on_front', '2', 'on'),
(84, 'default_post_format', '0', 'on'),
(85, 'link_manager_enabled', '0', 'on'),
(86, 'finished_splitting_shared_terms', '1', 'on'),
(87, 'site_icon', '0', 'on'),
(88, 'medium_large_size_w', '768', 'on'),
(89, 'medium_large_size_h', '0', 'on'),
(90, 'wp_page_for_privacy_policy', '3', 'on'),
(91, 'show_comments_cookies_opt_in', '1', 'on'),
(92, 'admin_email_lifespan', '1784178777', 'on'),
(93, 'disallowed_keys', '', 'off'),
(94, 'comment_previously_approved', '', 'on'),
(95, 'auto_plugin_theme_update_emails', 'a:0:{}', 'off'),
(96, 'auto_update_core_dev', 'enabled', 'on'),
(97, 'auto_update_core_minor', 'enabled', 'on'),
(98, 'auto_update_core_major', 'enabled', 'on'),
(99, 'wp_force_deactivated_plugins', 'a:0:{}', 'on'),
(100, 'wp_attachment_pages_enabled', '0', 'on'),
(101, 'wp_notes_notify', '', 'on'),
(102, 'initial_db_version', '60717', 'on'),
(103, 'wp_user_roles', 'a:5:{s:13:\"administrator\";a:2:{s:4:\"name\";s:13:\"Administrator\";s:12:\"capabilities\";a:61:{s:13:\"switch_themes\";b:1;s:11:\"edit_themes\";b:1;s:16:\"activate_plugins\";b:1;s:12:\"edit_plugins\";b:1;s:10:\"edit_users\";b:1;s:10:\"edit_files\";b:1;s:14:\"manage_options\";b:1;s:17:\"moderate_comments\";b:1;s:17:\"manage_categories\";b:1;s:12:\"manage_links\";b:1;s:12:\"upload_files\";b:1;s:6:\"import\";b:1;s:15:\"unfiltered_html\";b:1;s:10:\"edit_posts\";b:1;s:17:\"edit_others_posts\";b:1;s:20:\"edit_published_posts\";b:1;s:13:\"publish_posts\";b:1;s:10:\"edit_pages\";b:1;s:4:\"read\";b:1;s:8:\"level_10\";b:1;s:7:\"level_9\";b:1;s:7:\"level_8\";b:1;s:7:\"level_7\";b:1;s:7:\"level_6\";b:1;s:7:\"level_5\";b:1;s:7:\"level_4\";b:1;s:7:\"level_3\";b:1;s:7:\"level_2\";b:1;s:7:\"level_1\";b:1;s:7:\"level_0\";b:1;s:17:\"edit_others_pages\";b:1;s:20:\"edit_published_pages\";b:1;s:13:\"publish_pages\";b:1;s:12:\"delete_pages\";b:1;s:19:\"delete_others_pages\";b:1;s:22:\"delete_published_pages\";b:1;s:12:\"delete_posts\";b:1;s:19:\"delete_others_posts\";b:1;s:22:\"delete_published_posts\";b:1;s:20:\"delete_private_posts\";b:1;s:18:\"edit_private_posts\";b:1;s:18:\"read_private_posts\";b:1;s:20:\"delete_private_pages\";b:1;s:18:\"edit_private_pages\";b:1;s:18:\"read_private_pages\";b:1;s:12:\"delete_users\";b:1;s:12:\"create_users\";b:1;s:17:\"unfiltered_upload\";b:1;s:14:\"edit_dashboard\";b:1;s:14:\"update_plugins\";b:1;s:14:\"delete_plugins\";b:1;s:15:\"install_plugins\";b:1;s:13:\"update_themes\";b:1;s:14:\"install_themes\";b:1;s:11:\"update_core\";b:1;s:10:\"list_users\";b:1;s:12:\"remove_users\";b:1;s:13:\"promote_users\";b:1;s:18:\"edit_theme_options\";b:1;s:13:\"delete_themes\";b:1;s:6:\"export\";b:1;}}s:6:\"editor\";a:2:{s:4:\"name\";s:6:\"Editor\";s:12:\"capabilities\";a:34:{s:17:\"moderate_comments\";b:1;s:17:\"manage_categories\";b:1;s:12:\"manage_links\";b:1;s:12:\"upload_files\";b:1;s:15:\"unfiltered_html\";b:1;s:10:\"edit_posts\";b:1;s:17:\"edit_others_posts\";b:1;s:20:\"edit_published_posts\";b:1;s:13:\"publish_posts\";b:1;s:10:\"edit_pages\";b:1;s:4:\"read\";b:1;s:7:\"level_7\";b:1;s:7:\"level_6\";b:1;s:7:\"level_5\";b:1;s:7:\"level_4\";b:1;s:7:\"level_3\";b:1;s:7:\"level_2\";b:1;s:7:\"level_1\";b:1;s:7:\"level_0\";b:1;s:17:\"edit_others_pages\";b:1;s:20:\"edit_published_pages\";b:1;s:13:\"publish_pages\";b:1;s:12:\"delete_pages\";b:1;s:19:\"delete_others_pages\";b:1;s:22:\"delete_published_pages\";b:1;s:12:\"delete_posts\";b:1;s:19:\"delete_others_posts\";b:1;s:22:\"delete_published_posts\";b:1;s:20:\"delete_private_posts\";b:1;s:18:\"edit_private_posts\";b:1;s:18:\"read_private_posts\";b:1;s:20:\"delete_private_pages\";b:1;s:18:\"edit_private_pages\";b:1;s:18:\"read_private_pages\";b:1;}}s:6:\"author\";a:2:{s:4:\"name\";s:6:\"Author\";s:12:\"capabilities\";a:10:{s:12:\"upload_files\";b:1;s:10:\"edit_posts\";b:1;s:20:\"edit_published_posts\";b:1;s:13:\"publish_posts\";b:1;s:4:\"read\";b:1;s:7:\"level_2\";b:1;s:7:\"level_1\";b:1;s:7:\"level_0\";b:1;s:12:\"delete_posts\";b:1;s:22:\"delete_published_posts\";b:1;}}s:11:\"contributor\";a:2:{s:4:\"name\";s:11:\"Contributor\";s:12:\"capabilities\";a:5:{s:10:\"edit_posts\";b:1;s:4:\"read\";b:1;s:7:\"level_1\";b:1;s:7:\"level_0\";b:1;s:12:\"delete_posts\";b:1;}}s:10:\"subscriber\";a:2:{s:4:\"name\";s:10:\"Subscriber\";s:12:\"capabilities\";a:2:{s:4:\"read\";b:1;s:7:\"level_0\";b:1;}}}', 'on'),
(104, 'fresh_site', '0', 'off'),
(105, 'user_count', '1', 'off'),
(106, 'widget_block', 'a:6:{i:2;a:1:{s:7:\"content\";s:19:\"<!-- wp:search /-->\";}i:3;a:1:{s:7:\"content\";s:154:\"<!-- wp:group --><div class=\"wp-block-group\"><!-- wp:heading --><h2>Recent Posts</h2><!-- /wp:heading --><!-- wp:latest-posts /--></div><!-- /wp:group -->\";}i:4;a:1:{s:7:\"content\";s:227:\"<!-- wp:group --><div class=\"wp-block-group\"><!-- wp:heading --><h2>Recent Comments</h2><!-- /wp:heading --><!-- wp:latest-comments {\"displayAvatar\":false,\"displayDate\":false,\"displayExcerpt\":false} /--></div><!-- /wp:group -->\";}i:5;a:1:{s:7:\"content\";s:146:\"<!-- wp:group --><div class=\"wp-block-group\"><!-- wp:heading --><h2>Archives</h2><!-- /wp:heading --><!-- wp:archives /--></div><!-- /wp:group -->\";}i:6;a:1:{s:7:\"content\";s:150:\"<!-- wp:group --><div class=\"wp-block-group\"><!-- wp:heading --><h2>Categories</h2><!-- /wp:heading --><!-- wp:categories /--></div><!-- /wp:group -->\";}s:12:\"_multiwidget\";i:1;}', 'auto'),
(107, 'sidebars_widgets', 'a:2:{s:19:\"wp_inactive_widgets\";a:5:{i:0;s:7:\"block-2\";i:1;s:7:\"block-3\";i:2;s:7:\"block-4\";i:3;s:7:\"block-5\";i:4;s:7:\"block-6\";}s:13:\"array_version\";i:3;}', 'auto'),
(108, 'widget_pages', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'auto'),
(109, 'widget_calendar', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'auto'),
(110, 'widget_archives', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'auto'),
(111, 'widget_media_audio', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'auto'),
(112, 'widget_media_image', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'auto'),
(113, 'widget_media_gallery', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'auto'),
(114, 'widget_media_video', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'auto'),
(115, 'widget_meta', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'auto'),
(116, 'widget_search', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'auto'),
(117, 'widget_recent-posts', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'auto'),
(118, 'widget_recent-comments', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'auto'),
(119, 'widget_tag_cloud', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'auto'),
(120, 'widget_nav_menu', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'auto'),
(121, 'widget_custom_html', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'auto'),
(122, '_transient_wp_core_block_css_files', 'a:2:{s:7:\"version\";s:5:\"6.9.1\";s:5:\"files\";a:584:{i:0;s:31:\"accordion-heading/style-rtl.css\";i:1;s:35:\"accordion-heading/style-rtl.min.css\";i:2;s:27:\"accordion-heading/style.css\";i:3;s:31:\"accordion-heading/style.min.css\";i:4;s:28:\"accordion-item/style-rtl.css\";i:5;s:32:\"accordion-item/style-rtl.min.css\";i:6;s:24:\"accordion-item/style.css\";i:7;s:28:\"accordion-item/style.min.css\";i:8;s:29:\"accordion-panel/style-rtl.css\";i:9;s:33:\"accordion-panel/style-rtl.min.css\";i:10;s:25:\"accordion-panel/style.css\";i:11;s:29:\"accordion-panel/style.min.css\";i:12;s:23:\"accordion/style-rtl.css\";i:13;s:27:\"accordion/style-rtl.min.css\";i:14;s:19:\"accordion/style.css\";i:15;s:23:\"accordion/style.min.css\";i:16;s:23:\"archives/editor-rtl.css\";i:17;s:27:\"archives/editor-rtl.min.css\";i:18;s:19:\"archives/editor.css\";i:19;s:23:\"archives/editor.min.css\";i:20;s:22:\"archives/style-rtl.css\";i:21;s:26:\"archives/style-rtl.min.css\";i:22;s:18:\"archives/style.css\";i:23;s:22:\"archives/style.min.css\";i:24;s:20:\"audio/editor-rtl.css\";i:25;s:24:\"audio/editor-rtl.min.css\";i:26;s:16:\"audio/editor.css\";i:27;s:20:\"audio/editor.min.css\";i:28;s:19:\"audio/style-rtl.css\";i:29;s:23:\"audio/style-rtl.min.css\";i:30;s:15:\"audio/style.css\";i:31;s:19:\"audio/style.min.css\";i:32;s:19:\"audio/theme-rtl.css\";i:33;s:23:\"audio/theme-rtl.min.css\";i:34;s:15:\"audio/theme.css\";i:35;s:19:\"audio/theme.min.css\";i:36;s:21:\"avatar/editor-rtl.css\";i:37;s:25:\"avatar/editor-rtl.min.css\";i:38;s:17:\"avatar/editor.css\";i:39;s:21:\"avatar/editor.min.css\";i:40;s:20:\"avatar/style-rtl.css\";i:41;s:24:\"avatar/style-rtl.min.css\";i:42;s:16:\"avatar/style.css\";i:43;s:20:\"avatar/style.min.css\";i:44;s:21:\"button/editor-rtl.css\";i:45;s:25:\"button/editor-rtl.min.css\";i:46;s:17:\"button/editor.css\";i:47;s:21:\"button/editor.min.css\";i:48;s:20:\"button/style-rtl.css\";i:49;s:24:\"button/style-rtl.min.css\";i:50;s:16:\"button/style.css\";i:51;s:20:\"button/style.min.css\";i:52;s:22:\"buttons/editor-rtl.css\";i:53;s:26:\"buttons/editor-rtl.min.css\";i:54;s:18:\"buttons/editor.css\";i:55;s:22:\"buttons/editor.min.css\";i:56;s:21:\"buttons/style-rtl.css\";i:57;s:25:\"buttons/style-rtl.min.css\";i:58;s:17:\"buttons/style.css\";i:59;s:21:\"buttons/style.min.css\";i:60;s:22:\"calendar/style-rtl.css\";i:61;s:26:\"calendar/style-rtl.min.css\";i:62;s:18:\"calendar/style.css\";i:63;s:22:\"calendar/style.min.css\";i:64;s:25:\"categories/editor-rtl.css\";i:65;s:29:\"categories/editor-rtl.min.css\";i:66;s:21:\"categories/editor.css\";i:67;s:25:\"categories/editor.min.css\";i:68;s:24:\"categories/style-rtl.css\";i:69;s:28:\"categories/style-rtl.min.css\";i:70;s:20:\"categories/style.css\";i:71;s:24:\"categories/style.min.css\";i:72;s:19:\"code/editor-rtl.css\";i:73;s:23:\"code/editor-rtl.min.css\";i:74;s:15:\"code/editor.css\";i:75;s:19:\"code/editor.min.css\";i:76;s:18:\"code/style-rtl.css\";i:77;s:22:\"code/style-rtl.min.css\";i:78;s:14:\"code/style.css\";i:79;s:18:\"code/style.min.css\";i:80;s:18:\"code/theme-rtl.css\";i:81;s:22:\"code/theme-rtl.min.css\";i:82;s:14:\"code/theme.css\";i:83;s:18:\"code/theme.min.css\";i:84;s:22:\"columns/editor-rtl.css\";i:85;s:26:\"columns/editor-rtl.min.css\";i:86;s:18:\"columns/editor.css\";i:87;s:22:\"columns/editor.min.css\";i:88;s:21:\"columns/style-rtl.css\";i:89;s:25:\"columns/style-rtl.min.css\";i:90;s:17:\"columns/style.css\";i:91;s:21:\"columns/style.min.css\";i:92;s:33:\"comment-author-name/style-rtl.css\";i:93;s:37:\"comment-author-name/style-rtl.min.css\";i:94;s:29:\"comment-author-name/style.css\";i:95;s:33:\"comment-author-name/style.min.css\";i:96;s:29:\"comment-content/style-rtl.css\";i:97;s:33:\"comment-content/style-rtl.min.css\";i:98;s:25:\"comment-content/style.css\";i:99;s:29:\"comment-content/style.min.css\";i:100;s:26:\"comment-date/style-rtl.css\";i:101;s:30:\"comment-date/style-rtl.min.css\";i:102;s:22:\"comment-date/style.css\";i:103;s:26:\"comment-date/style.min.css\";i:104;s:31:\"comment-edit-link/style-rtl.css\";i:105;s:35:\"comment-edit-link/style-rtl.min.css\";i:106;s:27:\"comment-edit-link/style.css\";i:107;s:31:\"comment-edit-link/style.min.css\";i:108;s:32:\"comment-reply-link/style-rtl.css\";i:109;s:36:\"comment-reply-link/style-rtl.min.css\";i:110;s:28:\"comment-reply-link/style.css\";i:111;s:32:\"comment-reply-link/style.min.css\";i:112;s:30:\"comment-template/style-rtl.css\";i:113;s:34:\"comment-template/style-rtl.min.css\";i:114;s:26:\"comment-template/style.css\";i:115;s:30:\"comment-template/style.min.css\";i:116;s:42:\"comments-pagination-numbers/editor-rtl.css\";i:117;s:46:\"comments-pagination-numbers/editor-rtl.min.css\";i:118;s:38:\"comments-pagination-numbers/editor.css\";i:119;s:42:\"comments-pagination-numbers/editor.min.css\";i:120;s:34:\"comments-pagination/editor-rtl.css\";i:121;s:38:\"comments-pagination/editor-rtl.min.css\";i:122;s:30:\"comments-pagination/editor.css\";i:123;s:34:\"comments-pagination/editor.min.css\";i:124;s:33:\"comments-pagination/style-rtl.css\";i:125;s:37:\"comments-pagination/style-rtl.min.css\";i:126;s:29:\"comments-pagination/style.css\";i:127;s:33:\"comments-pagination/style.min.css\";i:128;s:29:\"comments-title/editor-rtl.css\";i:129;s:33:\"comments-title/editor-rtl.min.css\";i:130;s:25:\"comments-title/editor.css\";i:131;s:29:\"comments-title/editor.min.css\";i:132;s:23:\"comments/editor-rtl.css\";i:133;s:27:\"comments/editor-rtl.min.css\";i:134;s:19:\"comments/editor.css\";i:135;s:23:\"comments/editor.min.css\";i:136;s:22:\"comments/style-rtl.css\";i:137;s:26:\"comments/style-rtl.min.css\";i:138;s:18:\"comments/style.css\";i:139;s:22:\"comments/style.min.css\";i:140;s:20:\"cover/editor-rtl.css\";i:141;s:24:\"cover/editor-rtl.min.css\";i:142;s:16:\"cover/editor.css\";i:143;s:20:\"cover/editor.min.css\";i:144;s:19:\"cover/style-rtl.css\";i:145;s:23:\"cover/style-rtl.min.css\";i:146;s:15:\"cover/style.css\";i:147;s:19:\"cover/style.min.css\";i:148;s:22:\"details/editor-rtl.css\";i:149;s:26:\"details/editor-rtl.min.css\";i:150;s:18:\"details/editor.css\";i:151;s:22:\"details/editor.min.css\";i:152;s:21:\"details/style-rtl.css\";i:153;s:25:\"details/style-rtl.min.css\";i:154;s:17:\"details/style.css\";i:155;s:21:\"details/style.min.css\";i:156;s:20:\"embed/editor-rtl.css\";i:157;s:24:\"embed/editor-rtl.min.css\";i:158;s:16:\"embed/editor.css\";i:159;s:20:\"embed/editor.min.css\";i:160;s:19:\"embed/style-rtl.css\";i:161;s:23:\"embed/style-rtl.min.css\";i:162;s:15:\"embed/style.css\";i:163;s:19:\"embed/style.min.css\";i:164;s:19:\"embed/theme-rtl.css\";i:165;s:23:\"embed/theme-rtl.min.css\";i:166;s:15:\"embed/theme.css\";i:167;s:19:\"embed/theme.min.css\";i:168;s:19:\"file/editor-rtl.css\";i:169;s:23:\"file/editor-rtl.min.css\";i:170;s:15:\"file/editor.css\";i:171;s:19:\"file/editor.min.css\";i:172;s:18:\"file/style-rtl.css\";i:173;s:22:\"file/style-rtl.min.css\";i:174;s:14:\"file/style.css\";i:175;s:18:\"file/style.min.css\";i:176;s:23:\"footnotes/style-rtl.css\";i:177;s:27:\"footnotes/style-rtl.min.css\";i:178;s:19:\"footnotes/style.css\";i:179;s:23:\"footnotes/style.min.css\";i:180;s:23:\"freeform/editor-rtl.css\";i:181;s:27:\"freeform/editor-rtl.min.css\";i:182;s:19:\"freeform/editor.css\";i:183;s:23:\"freeform/editor.min.css\";i:184;s:22:\"gallery/editor-rtl.css\";i:185;s:26:\"gallery/editor-rtl.min.css\";i:186;s:18:\"gallery/editor.css\";i:187;s:22:\"gallery/editor.min.css\";i:188;s:21:\"gallery/style-rtl.css\";i:189;s:25:\"gallery/style-rtl.min.css\";i:190;s:17:\"gallery/style.css\";i:191;s:21:\"gallery/style.min.css\";i:192;s:21:\"gallery/theme-rtl.css\";i:193;s:25:\"gallery/theme-rtl.min.css\";i:194;s:17:\"gallery/theme.css\";i:195;s:21:\"gallery/theme.min.css\";i:196;s:20:\"group/editor-rtl.css\";i:197;s:24:\"group/editor-rtl.min.css\";i:198;s:16:\"group/editor.css\";i:199;s:20:\"group/editor.min.css\";i:200;s:19:\"group/style-rtl.css\";i:201;s:23:\"group/style-rtl.min.css\";i:202;s:15:\"group/style.css\";i:203;s:19:\"group/style.min.css\";i:204;s:19:\"group/theme-rtl.css\";i:205;s:23:\"group/theme-rtl.min.css\";i:206;s:15:\"group/theme.css\";i:207;s:19:\"group/theme.min.css\";i:208;s:21:\"heading/style-rtl.css\";i:209;s:25:\"heading/style-rtl.min.css\";i:210;s:17:\"heading/style.css\";i:211;s:21:\"heading/style.min.css\";i:212;s:19:\"html/editor-rtl.css\";i:213;s:23:\"html/editor-rtl.min.css\";i:214;s:15:\"html/editor.css\";i:215;s:19:\"html/editor.min.css\";i:216;s:20:\"image/editor-rtl.css\";i:217;s:24:\"image/editor-rtl.min.css\";i:218;s:16:\"image/editor.css\";i:219;s:20:\"image/editor.min.css\";i:220;s:19:\"image/style-rtl.css\";i:221;s:23:\"image/style-rtl.min.css\";i:222;s:15:\"image/style.css\";i:223;s:19:\"image/style.min.css\";i:224;s:19:\"image/theme-rtl.css\";i:225;s:23:\"image/theme-rtl.min.css\";i:226;s:15:\"image/theme.css\";i:227;s:19:\"image/theme.min.css\";i:228;s:29:\"latest-comments/style-rtl.css\";i:229;s:33:\"latest-comments/style-rtl.min.css\";i:230;s:25:\"latest-comments/style.css\";i:231;s:29:\"latest-comments/style.min.css\";i:232;s:27:\"latest-posts/editor-rtl.css\";i:233;s:31:\"latest-posts/editor-rtl.min.css\";i:234;s:23:\"latest-posts/editor.css\";i:235;s:27:\"latest-posts/editor.min.css\";i:236;s:26:\"latest-posts/style-rtl.css\";i:237;s:30:\"latest-posts/style-rtl.min.css\";i:238;s:22:\"latest-posts/style.css\";i:239;s:26:\"latest-posts/style.min.css\";i:240;s:18:\"list/style-rtl.css\";i:241;s:22:\"list/style-rtl.min.css\";i:242;s:14:\"list/style.css\";i:243;s:18:\"list/style.min.css\";i:244;s:22:\"loginout/style-rtl.css\";i:245;s:26:\"loginout/style-rtl.min.css\";i:246;s:18:\"loginout/style.css\";i:247;s:22:\"loginout/style.min.css\";i:248;s:19:\"math/editor-rtl.css\";i:249;s:23:\"math/editor-rtl.min.css\";i:250;s:15:\"math/editor.css\";i:251;s:19:\"math/editor.min.css\";i:252;s:18:\"math/style-rtl.css\";i:253;s:22:\"math/style-rtl.min.css\";i:254;s:14:\"math/style.css\";i:255;s:18:\"math/style.min.css\";i:256;s:25:\"media-text/editor-rtl.css\";i:257;s:29:\"media-text/editor-rtl.min.css\";i:258;s:21:\"media-text/editor.css\";i:259;s:25:\"media-text/editor.min.css\";i:260;s:24:\"media-text/style-rtl.css\";i:261;s:28:\"media-text/style-rtl.min.css\";i:262;s:20:\"media-text/style.css\";i:263;s:24:\"media-text/style.min.css\";i:264;s:19:\"more/editor-rtl.css\";i:265;s:23:\"more/editor-rtl.min.css\";i:266;s:15:\"more/editor.css\";i:267;s:19:\"more/editor.min.css\";i:268;s:30:\"navigation-link/editor-rtl.css\";i:269;s:34:\"navigation-link/editor-rtl.min.css\";i:270;s:26:\"navigation-link/editor.css\";i:271;s:30:\"navigation-link/editor.min.css\";i:272;s:29:\"navigation-link/style-rtl.css\";i:273;s:33:\"navigation-link/style-rtl.min.css\";i:274;s:25:\"navigation-link/style.css\";i:275;s:29:\"navigation-link/style.min.css\";i:276;s:33:\"navigation-submenu/editor-rtl.css\";i:277;s:37:\"navigation-submenu/editor-rtl.min.css\";i:278;s:29:\"navigation-submenu/editor.css\";i:279;s:33:\"navigation-submenu/editor.min.css\";i:280;s:25:\"navigation/editor-rtl.css\";i:281;s:29:\"navigation/editor-rtl.min.css\";i:282;s:21:\"navigation/editor.css\";i:283;s:25:\"navigation/editor.min.css\";i:284;s:24:\"navigation/style-rtl.css\";i:285;s:28:\"navigation/style-rtl.min.css\";i:286;s:20:\"navigation/style.css\";i:287;s:24:\"navigation/style.min.css\";i:288;s:23:\"nextpage/editor-rtl.css\";i:289;s:27:\"nextpage/editor-rtl.min.css\";i:290;s:19:\"nextpage/editor.css\";i:291;s:23:\"nextpage/editor.min.css\";i:292;s:24:\"page-list/editor-rtl.css\";i:293;s:28:\"page-list/editor-rtl.min.css\";i:294;s:20:\"page-list/editor.css\";i:295;s:24:\"page-list/editor.min.css\";i:296;s:23:\"page-list/style-rtl.css\";i:297;s:27:\"page-list/style-rtl.min.css\";i:298;s:19:\"page-list/style.css\";i:299;s:23:\"page-list/style.min.css\";i:300;s:24:\"paragraph/editor-rtl.css\";i:301;s:28:\"paragraph/editor-rtl.min.css\";i:302;s:20:\"paragraph/editor.css\";i:303;s:24:\"paragraph/editor.min.css\";i:304;s:23:\"paragraph/style-rtl.css\";i:305;s:27:\"paragraph/style-rtl.min.css\";i:306;s:19:\"paragraph/style.css\";i:307;s:23:\"paragraph/style.min.css\";i:308;s:35:\"post-author-biography/style-rtl.css\";i:309;s:39:\"post-author-biography/style-rtl.min.css\";i:310;s:31:\"post-author-biography/style.css\";i:311;s:35:\"post-author-biography/style.min.css\";i:312;s:30:\"post-author-name/style-rtl.css\";i:313;s:34:\"post-author-name/style-rtl.min.css\";i:314;s:26:\"post-author-name/style.css\";i:315;s:30:\"post-author-name/style.min.css\";i:316;s:25:\"post-author/style-rtl.css\";i:317;s:29:\"post-author/style-rtl.min.css\";i:318;s:21:\"post-author/style.css\";i:319;s:25:\"post-author/style.min.css\";i:320;s:33:\"post-comments-count/style-rtl.css\";i:321;s:37:\"post-comments-count/style-rtl.min.css\";i:322;s:29:\"post-comments-count/style.css\";i:323;s:33:\"post-comments-count/style.min.css\";i:324;s:33:\"post-comments-form/editor-rtl.css\";i:325;s:37:\"post-comments-form/editor-rtl.min.css\";i:326;s:29:\"post-comments-form/editor.css\";i:327;s:33:\"post-comments-form/editor.min.css\";i:328;s:32:\"post-comments-form/style-rtl.css\";i:329;s:36:\"post-comments-form/style-rtl.min.css\";i:330;s:28:\"post-comments-form/style.css\";i:331;s:32:\"post-comments-form/style.min.css\";i:332;s:32:\"post-comments-link/style-rtl.css\";i:333;s:36:\"post-comments-link/style-rtl.min.css\";i:334;s:28:\"post-comments-link/style.css\";i:335;s:32:\"post-comments-link/style.min.css\";i:336;s:26:\"post-content/style-rtl.css\";i:337;s:30:\"post-content/style-rtl.min.css\";i:338;s:22:\"post-content/style.css\";i:339;s:26:\"post-content/style.min.css\";i:340;s:23:\"post-date/style-rtl.css\";i:341;s:27:\"post-date/style-rtl.min.css\";i:342;s:19:\"post-date/style.css\";i:343;s:23:\"post-date/style.min.css\";i:344;s:27:\"post-excerpt/editor-rtl.css\";i:345;s:31:\"post-excerpt/editor-rtl.min.css\";i:346;s:23:\"post-excerpt/editor.css\";i:347;s:27:\"post-excerpt/editor.min.css\";i:348;s:26:\"post-excerpt/style-rtl.css\";i:349;s:30:\"post-excerpt/style-rtl.min.css\";i:350;s:22:\"post-excerpt/style.css\";i:351;s:26:\"post-excerpt/style.min.css\";i:352;s:34:\"post-featured-image/editor-rtl.css\";i:353;s:38:\"post-featured-image/editor-rtl.min.css\";i:354;s:30:\"post-featured-image/editor.css\";i:355;s:34:\"post-featured-image/editor.min.css\";i:356;s:33:\"post-featured-image/style-rtl.css\";i:357;s:37:\"post-featured-image/style-rtl.min.css\";i:358;s:29:\"post-featured-image/style.css\";i:359;s:33:\"post-featured-image/style.min.css\";i:360;s:34:\"post-navigation-link/style-rtl.css\";i:361;s:38:\"post-navigation-link/style-rtl.min.css\";i:362;s:30:\"post-navigation-link/style.css\";i:363;s:34:\"post-navigation-link/style.min.css\";i:364;s:27:\"post-template/style-rtl.css\";i:365;s:31:\"post-template/style-rtl.min.css\";i:366;s:23:\"post-template/style.css\";i:367;s:27:\"post-template/style.min.css\";i:368;s:24:\"post-terms/style-rtl.css\";i:369;s:28:\"post-terms/style-rtl.min.css\";i:370;s:20:\"post-terms/style.css\";i:371;s:24:\"post-terms/style.min.css\";i:372;s:31:\"post-time-to-read/style-rtl.css\";i:373;s:35:\"post-time-to-read/style-rtl.min.css\";i:374;s:27:\"post-time-to-read/style.css\";i:375;s:31:\"post-time-to-read/style.min.css\";i:376;s:24:\"post-title/style-rtl.css\";i:377;s:28:\"post-title/style-rtl.min.css\";i:378;s:20:\"post-title/style.css\";i:379;s:24:\"post-title/style.min.css\";i:380;s:26:\"preformatted/style-rtl.css\";i:381;s:30:\"preformatted/style-rtl.min.css\";i:382;s:22:\"preformatted/style.css\";i:383;s:26:\"preformatted/style.min.css\";i:384;s:24:\"pullquote/editor-rtl.css\";i:385;s:28:\"pullquote/editor-rtl.min.css\";i:386;s:20:\"pullquote/editor.css\";i:387;s:24:\"pullquote/editor.min.css\";i:388;s:23:\"pullquote/style-rtl.css\";i:389;s:27:\"pullquote/style-rtl.min.css\";i:390;s:19:\"pullquote/style.css\";i:391;s:23:\"pullquote/style.min.css\";i:392;s:23:\"pullquote/theme-rtl.css\";i:393;s:27:\"pullquote/theme-rtl.min.css\";i:394;s:19:\"pullquote/theme.css\";i:395;s:23:\"pullquote/theme.min.css\";i:396;s:39:\"query-pagination-numbers/editor-rtl.css\";i:397;s:43:\"query-pagination-numbers/editor-rtl.min.css\";i:398;s:35:\"query-pagination-numbers/editor.css\";i:399;s:39:\"query-pagination-numbers/editor.min.css\";i:400;s:31:\"query-pagination/editor-rtl.css\";i:401;s:35:\"query-pagination/editor-rtl.min.css\";i:402;s:27:\"query-pagination/editor.css\";i:403;s:31:\"query-pagination/editor.min.css\";i:404;s:30:\"query-pagination/style-rtl.css\";i:405;s:34:\"query-pagination/style-rtl.min.css\";i:406;s:26:\"query-pagination/style.css\";i:407;s:30:\"query-pagination/style.min.css\";i:408;s:25:\"query-title/style-rtl.css\";i:409;s:29:\"query-title/style-rtl.min.css\";i:410;s:21:\"query-title/style.css\";i:411;s:25:\"query-title/style.min.css\";i:412;s:25:\"query-total/style-rtl.css\";i:413;s:29:\"query-total/style-rtl.min.css\";i:414;s:21:\"query-total/style.css\";i:415;s:25:\"query-total/style.min.css\";i:416;s:20:\"query/editor-rtl.css\";i:417;s:24:\"query/editor-rtl.min.css\";i:418;s:16:\"query/editor.css\";i:419;s:20:\"query/editor.min.css\";i:420;s:19:\"quote/style-rtl.css\";i:421;s:23:\"quote/style-rtl.min.css\";i:422;s:15:\"quote/style.css\";i:423;s:19:\"quote/style.min.css\";i:424;s:19:\"quote/theme-rtl.css\";i:425;s:23:\"quote/theme-rtl.min.css\";i:426;s:15:\"quote/theme.css\";i:427;s:19:\"quote/theme.min.css\";i:428;s:23:\"read-more/style-rtl.css\";i:429;s:27:\"read-more/style-rtl.min.css\";i:430;s:19:\"read-more/style.css\";i:431;s:23:\"read-more/style.min.css\";i:432;s:18:\"rss/editor-rtl.css\";i:433;s:22:\"rss/editor-rtl.min.css\";i:434;s:14:\"rss/editor.css\";i:435;s:18:\"rss/editor.min.css\";i:436;s:17:\"rss/style-rtl.css\";i:437;s:21:\"rss/style-rtl.min.css\";i:438;s:13:\"rss/style.css\";i:439;s:17:\"rss/style.min.css\";i:440;s:21:\"search/editor-rtl.css\";i:441;s:25:\"search/editor-rtl.min.css\";i:442;s:17:\"search/editor.css\";i:443;s:21:\"search/editor.min.css\";i:444;s:20:\"search/style-rtl.css\";i:445;s:24:\"search/style-rtl.min.css\";i:446;s:16:\"search/style.css\";i:447;s:20:\"search/style.min.css\";i:448;s:20:\"search/theme-rtl.css\";i:449;s:24:\"search/theme-rtl.min.css\";i:450;s:16:\"search/theme.css\";i:451;s:20:\"search/theme.min.css\";i:452;s:24:\"separator/editor-rtl.css\";i:453;s:28:\"separator/editor-rtl.min.css\";i:454;s:20:\"separator/editor.css\";i:455;s:24:\"separator/editor.min.css\";i:456;s:23:\"separator/style-rtl.css\";i:457;s:27:\"separator/style-rtl.min.css\";i:458;s:19:\"separator/style.css\";i:459;s:23:\"separator/style.min.css\";i:460;s:23:\"separator/theme-rtl.css\";i:461;s:27:\"separator/theme-rtl.min.css\";i:462;s:19:\"separator/theme.css\";i:463;s:23:\"separator/theme.min.css\";i:464;s:24:\"shortcode/editor-rtl.css\";i:465;s:28:\"shortcode/editor-rtl.min.css\";i:466;s:20:\"shortcode/editor.css\";i:467;s:24:\"shortcode/editor.min.css\";i:468;s:24:\"site-logo/editor-rtl.css\";i:469;s:28:\"site-logo/editor-rtl.min.css\";i:470;s:20:\"site-logo/editor.css\";i:471;s:24:\"site-logo/editor.min.css\";i:472;s:23:\"site-logo/style-rtl.css\";i:473;s:27:\"site-logo/style-rtl.min.css\";i:474;s:19:\"site-logo/style.css\";i:475;s:23:\"site-logo/style.min.css\";i:476;s:27:\"site-tagline/editor-rtl.css\";i:477;s:31:\"site-tagline/editor-rtl.min.css\";i:478;s:23:\"site-tagline/editor.css\";i:479;s:27:\"site-tagline/editor.min.css\";i:480;s:26:\"site-tagline/style-rtl.css\";i:481;s:30:\"site-tagline/style-rtl.min.css\";i:482;s:22:\"site-tagline/style.css\";i:483;s:26:\"site-tagline/style.min.css\";i:484;s:25:\"site-title/editor-rtl.css\";i:485;s:29:\"site-title/editor-rtl.min.css\";i:486;s:21:\"site-title/editor.css\";i:487;s:25:\"site-title/editor.min.css\";i:488;s:24:\"site-title/style-rtl.css\";i:489;s:28:\"site-title/style-rtl.min.css\";i:490;s:20:\"site-title/style.css\";i:491;s:24:\"site-title/style.min.css\";i:492;s:26:\"social-link/editor-rtl.css\";i:493;s:30:\"social-link/editor-rtl.min.css\";i:494;s:22:\"social-link/editor.css\";i:495;s:26:\"social-link/editor.min.css\";i:496;s:27:\"social-links/editor-rtl.css\";i:497;s:31:\"social-links/editor-rtl.min.css\";i:498;s:23:\"social-links/editor.css\";i:499;s:27:\"social-links/editor.min.css\";i:500;s:26:\"social-links/style-rtl.css\";i:501;s:30:\"social-links/style-rtl.min.css\";i:502;s:22:\"social-links/style.css\";i:503;s:26:\"social-links/style.min.css\";i:504;s:21:\"spacer/editor-rtl.css\";i:505;s:25:\"spacer/editor-rtl.min.css\";i:506;s:17:\"spacer/editor.css\";i:507;s:21:\"spacer/editor.min.css\";i:508;s:20:\"spacer/style-rtl.css\";i:509;s:24:\"spacer/style-rtl.min.css\";i:510;s:16:\"spacer/style.css\";i:511;s:20:\"spacer/style.min.css\";i:512;s:20:\"table/editor-rtl.css\";i:513;s:24:\"table/editor-rtl.min.css\";i:514;s:16:\"table/editor.css\";i:515;s:20:\"table/editor.min.css\";i:516;s:19:\"table/style-rtl.css\";i:517;s:23:\"table/style-rtl.min.css\";i:518;s:15:\"table/style.css\";i:519;s:19:\"table/style.min.css\";i:520;s:19:\"table/theme-rtl.css\";i:521;s:23:\"table/theme-rtl.min.css\";i:522;s:15:\"table/theme.css\";i:523;s:19:\"table/theme.min.css\";i:524;s:24:\"tag-cloud/editor-rtl.css\";i:525;s:28:\"tag-cloud/editor-rtl.min.css\";i:526;s:20:\"tag-cloud/editor.css\";i:527;s:24:\"tag-cloud/editor.min.css\";i:528;s:23:\"tag-cloud/style-rtl.css\";i:529;s:27:\"tag-cloud/style-rtl.min.css\";i:530;s:19:\"tag-cloud/style.css\";i:531;s:23:\"tag-cloud/style.min.css\";i:532;s:28:\"template-part/editor-rtl.css\";i:533;s:32:\"template-part/editor-rtl.min.css\";i:534;s:24:\"template-part/editor.css\";i:535;s:28:\"template-part/editor.min.css\";i:536;s:27:\"template-part/theme-rtl.css\";i:537;s:31:\"template-part/theme-rtl.min.css\";i:538;s:23:\"template-part/theme.css\";i:539;s:27:\"template-part/theme.min.css\";i:540;s:24:\"term-count/style-rtl.css\";i:541;s:28:\"term-count/style-rtl.min.css\";i:542;s:20:\"term-count/style.css\";i:543;s:24:\"term-count/style.min.css\";i:544;s:30:\"term-description/style-rtl.css\";i:545;s:34:\"term-description/style-rtl.min.css\";i:546;s:26:\"term-description/style.css\";i:547;s:30:\"term-description/style.min.css\";i:548;s:23:\"term-name/style-rtl.css\";i:549;s:27:\"term-name/style-rtl.min.css\";i:550;s:19:\"term-name/style.css\";i:551;s:23:\"term-name/style.min.css\";i:552;s:28:\"term-template/editor-rtl.css\";i:553;s:32:\"term-template/editor-rtl.min.css\";i:554;s:24:\"term-template/editor.css\";i:555;s:28:\"term-template/editor.min.css\";i:556;s:27:\"term-template/style-rtl.css\";i:557;s:31:\"term-template/style-rtl.min.css\";i:558;s:23:\"term-template/style.css\";i:559;s:27:\"term-template/style.min.css\";i:560;s:27:\"text-columns/editor-rtl.css\";i:561;s:31:\"text-columns/editor-rtl.min.css\";i:562;s:23:\"text-columns/editor.css\";i:563;s:27:\"text-columns/editor.min.css\";i:564;s:26:\"text-columns/style-rtl.css\";i:565;s:30:\"text-columns/style-rtl.min.css\";i:566;s:22:\"text-columns/style.css\";i:567;s:26:\"text-columns/style.min.css\";i:568;s:19:\"verse/style-rtl.css\";i:569;s:23:\"verse/style-rtl.min.css\";i:570;s:15:\"verse/style.css\";i:571;s:19:\"verse/style.min.css\";i:572;s:20:\"video/editor-rtl.css\";i:573;s:24:\"video/editor-rtl.min.css\";i:574;s:16:\"video/editor.css\";i:575;s:20:\"video/editor.min.css\";i:576;s:19:\"video/style-rtl.css\";i:577;s:23:\"video/style-rtl.min.css\";i:578;s:15:\"video/style.css\";i:579;s:19:\"video/style.min.css\";i:580;s:19:\"video/theme-rtl.css\";i:581;s:23:\"video/theme-rtl.min.css\";i:582;s:15:\"video/theme.css\";i:583;s:19:\"video/theme.min.css\";}}', 'on'),
(125, 'theme_mods_twentytwentyfive', 'a:2:{s:18:\"custom_css_post_id\";i:-1;s:16:\"sidebars_widgets\";a:2:{s:4:\"time\";i:1768628784;s:4:\"data\";a:3:{s:19:\"wp_inactive_widgets\";a:0:{}s:9:\"sidebar-1\";a:3:{i:0;s:7:\"block-2\";i:1;s:7:\"block-3\";i:2;s:7:\"block-4\";}s:9:\"sidebar-2\";a:2:{i:0;s:7:\"block-5\";i:1;s:7:\"block-6\";}}}}', 'off'),
(126, '_transient_wp_styles_for_blocks', 'a:2:{s:4:\"hash\";s:32:\"4ad6ed4956ef7f814db220c22a123393\";s:6:\"blocks\";a:6:{s:11:\"core/button\";s:0:\"\";s:14:\"core/site-logo\";s:0:\"\";s:18:\"core/post-template\";s:120:\":where(.wp-block-post-template.is-layout-flex){gap: 1.25em;}:where(.wp-block-post-template.is-layout-grid){gap: 1.25em;}\";s:18:\"core/term-template\";s:120:\":where(.wp-block-term-template.is-layout-flex){gap: 1.25em;}:where(.wp-block-term-template.is-layout-grid){gap: 1.25em;}\";s:12:\"core/columns\";s:102:\":where(.wp-block-columns.is-layout-flex){gap: 2em;}:where(.wp-block-columns.is-layout-grid){gap: 2em;}\";s:14:\"core/pullquote\";s:69:\":root :where(.wp-block-pullquote){font-size: 1.5em;line-height: 1.6;}\";}}', 'on'),
(128, 'recovery_keys', 'a:0:{}', 'off'),
(141, 'can_compress_scripts', '1', 'on'),
(157, 'finished_updating_comment_type', '1', 'auto'),
(158, 'WPLANG', '', 'auto'),
(159, 'new_admin_email', 'ariflive.com@gmail.com', 'auto'),
(174, '_site_transient_wp_plugin_dependencies_plugin_data', 'a:0:{}', 'off'),
(175, 'recently_activated', 'a:0:{}', 'off'),
(181, '_site_transient_update_plugins', 'O:8:\"stdClass\":5:{s:12:\"last_checked\";i:1771057849;s:8:\"response\";a:0:{}s:12:\"translations\";a:0:{}s:9:\"no_update\";a:2:{s:30:\"advanced-custom-fields/acf.php\";O:8:\"stdClass\":10:{s:2:\"id\";s:36:\"w.org/plugins/advanced-custom-fields\";s:4:\"slug\";s:22:\"advanced-custom-fields\";s:6:\"plugin\";s:30:\"advanced-custom-fields/acf.php\";s:11:\"new_version\";s:5:\"6.7.0\";s:3:\"url\";s:53:\"https://wordpress.org/plugins/advanced-custom-fields/\";s:7:\"package\";s:71:\"https://downloads.wordpress.org/plugin/advanced-custom-fields.6.7.0.zip\";s:5:\"icons\";a:2:{s:2:\"1x\";s:67:\"https://ps.w.org/advanced-custom-fields/assets/icon.svg?rev=3207824\";s:3:\"svg\";s:67:\"https://ps.w.org/advanced-custom-fields/assets/icon.svg?rev=3207824\";}s:7:\"banners\";a:2:{s:2:\"2x\";s:78:\"https://ps.w.org/advanced-custom-fields/assets/banner-1544x500.jpg?rev=3374528\";s:2:\"1x\";s:77:\"https://ps.w.org/advanced-custom-fields/assets/banner-772x250.jpg?rev=3374528\";}s:11:\"banners_rtl\";a:0:{}s:8:\"requires\";s:3:\"6.2\";}s:33:\"classic-editor/classic-editor.php\";O:8:\"stdClass\":10:{s:2:\"id\";s:28:\"w.org/plugins/classic-editor\";s:4:\"slug\";s:14:\"classic-editor\";s:6:\"plugin\";s:33:\"classic-editor/classic-editor.php\";s:11:\"new_version\";s:5:\"1.6.7\";s:3:\"url\";s:45:\"https://wordpress.org/plugins/classic-editor/\";s:7:\"package\";s:63:\"https://downloads.wordpress.org/plugin/classic-editor.1.6.7.zip\";s:5:\"icons\";a:2:{s:2:\"2x\";s:67:\"https://ps.w.org/classic-editor/assets/icon-256x256.png?rev=1998671\";s:2:\"1x\";s:67:\"https://ps.w.org/classic-editor/assets/icon-128x128.png?rev=1998671\";}s:7:\"banners\";a:2:{s:2:\"2x\";s:70:\"https://ps.w.org/classic-editor/assets/banner-1544x500.png?rev=1998671\";s:2:\"1x\";s:69:\"https://ps.w.org/classic-editor/assets/banner-772x250.png?rev=1998676\";}s:11:\"banners_rtl\";a:0:{}s:8:\"requires\";s:3:\"4.9\";}}s:7:\"checked\";a:2:{s:30:\"advanced-custom-fields/acf.php\";s:5:\"6.7.0\";s:33:\"classic-editor/classic-editor.php\";s:5:\"1.6.7\";}}', 'off'),
(182, 'acf_first_activated_version', '6.7.0', 'on'),
(183, 'acf_site_health', '{\"version\":\"6.7.0\",\"plugin_type\":\"Free\",\"update_source\":\"wordpress.org\",\"wp_version\":\"6.9\",\"mysql_version\":\"10.4.32-MariaDB\",\"is_multisite\":false,\"active_theme\":{\"name\":\"Chronevo\",\"version\":\"1.0.0\",\"theme_uri\":\"http:\\/\\/localhost\\/chronevo\\/\",\"stylesheet\":false},\"active_plugins\":{\"advanced-custom-fields\\/acf.php\":{\"name\":\"Advanced Custom Fields\",\"version\":\"6.7.0\",\"plugin_uri\":\"https:\\/\\/www.advancedcustomfields.com\"},\"classic-editor\\/classic-editor.php\":{\"name\":\"Classic Editor\",\"version\":\"1.6.7\",\"plugin_uri\":\"https:\\/\\/wordpress.org\\/plugins\\/classic-editor\\/\"}},\"ui_field_groups\":\"0\",\"php_field_groups\":\"0\",\"json_field_groups\":\"0\",\"rest_field_groups\":\"0\",\"all_location_rules\":[],\"number_of_fields_by_type\":[],\"number_of_third_party_fields_by_type\":[],\"post_types_enabled\":true,\"ui_post_types\":\"3\",\"json_post_types\":\"0\",\"ui_taxonomies\":\"3\",\"json_taxonomies\":\"0\",\"rest_api_format\":\"light\",\"admin_ui_enabled\":true,\"field_type-modal_enabled\":true,\"field_settings_tabs_enabled\":false,\"shortcode_enabled\":false,\"registered_acf_forms\":\"0\",\"json_save_paths\":1,\"json_load_paths\":1,\"event_first_activated\":1768627238,\"last_updated\":1771058149,\"event_first_created_field_group\":1771058149}', 'off'),
(185, 'acf_version', '6.7.0', 'auto');
INSERT INTO `wp_options` (`option_id`, `option_name`, `option_value`, `autoload`) VALUES
(186, '_site_transient_update_themes', 'O:8:\"stdClass\":5:{s:12:\"last_checked\";i:1771057850;s:7:\"checked\";a:1:{s:8:\"chronevo\";s:5:\"1.0.0\";}s:8:\"response\";a:0:{}s:9:\"no_update\";a:0:{}s:12:\"translations\";a:0:{}}', 'off'),
(187, 'current_theme', 'Chronevo', 'auto'),
(188, 'theme_mods_chronevo', 'a:3:{i:0;b:0;s:18:\"nav_menu_locations\";a:0:{}s:18:\"custom_css_post_id\";i:-1;}', 'on'),
(189, 'theme_switched', '', 'auto'),
(208, 'nav_menu_options', 'a:2:{i:0;b:0;s:8:\"auto_add\";a:0:{}}', 'off'),
(227, '_transient_health-check-site-status-result', '{\"good\":16,\"recommended\":6,\"critical\":2}', 'on'),
(297, 'wp_calendar_block_has_published_posts', '1', 'auto'),
(323, '_site_transient_timeout_php_check_da775d00ae55849f14f81cf79fc50d46', '1771168859', 'off'),
(324, '_site_transient_php_check_da775d00ae55849f14f81cf79fc50d46', 'a:5:{s:19:\"recommended_version\";s:3:\"8.3\";s:15:\"minimum_version\";s:6:\"7.2.24\";s:12:\"is_supported\";b:0;s:9:\"is_secure\";b:1;s:13:\"is_acceptable\";b:1;}', 'off'),
(355, '_site_transient_timeout_theme_roots', '1771059028', 'off'),
(356, '_site_transient_theme_roots', 'a:1:{s:8:\"chronevo\";s:7:\"/themes\";}', 'off'),
(357, '_site_transient_timeout_browser_8e253f85246590342756399a57054cb8', '1771662087', 'off'),
(358, '_site_transient_browser_8e253f85246590342756399a57054cb8', 'a:10:{s:4:\"name\";s:6:\"Chrome\";s:7:\"version\";s:9:\"144.0.0.0\";s:8:\"platform\";s:7:\"Windows\";s:10:\"update_url\";s:29:\"https://www.google.com/chrome\";s:7:\"img_src\";s:43:\"http://s.w.org/images/browsers/chrome.png?1\";s:11:\"img_src_ssl\";s:44:\"https://s.w.org/images/browsers/chrome.png?1\";s:15:\"current_version\";s:2:\"18\";s:7:\"upgrade\";b:0;s:8:\"insecure\";b:0;s:6:\"mobile\";b:0;}', 'off'),
(361, '_site_transient_update_core', 'O:8:\"stdClass\":4:{s:7:\"updates\";a:1:{i:0;O:8:\"stdClass\":10:{s:8:\"response\";s:6:\"latest\";s:8:\"download\";s:59:\"https://downloads.wordpress.org/release/wordpress-6.9.1.zip\";s:6:\"locale\";s:5:\"en_US\";s:8:\"packages\";O:8:\"stdClass\":5:{s:4:\"full\";s:59:\"https://downloads.wordpress.org/release/wordpress-6.9.1.zip\";s:10:\"no_content\";s:70:\"https://downloads.wordpress.org/release/wordpress-6.9.1-no-content.zip\";s:11:\"new_bundled\";s:71:\"https://downloads.wordpress.org/release/wordpress-6.9.1-new-bundled.zip\";s:7:\"partial\";s:0:\"\";s:8:\"rollback\";s:0:\"\";}s:7:\"current\";s:5:\"6.9.1\";s:7:\"version\";s:5:\"6.9.1\";s:11:\"php_version\";s:6:\"7.2.24\";s:13:\"mysql_version\";s:5:\"5.5.5\";s:11:\"new_bundled\";s:3:\"6.7\";s:15:\"partial_version\";s:0:\"\";}}s:12:\"last_checked\";i:1771057851;s:15:\"version_checked\";s:5:\"6.9.1\";s:12:\"translations\";a:0:{}}', 'off'),
(384, 'category_children', 'a:0:{}', 'auto'),
(392, '_site_transient_timeout_wp_theme_files_patterns-c4b9c41e05247c5c7f92b5a0c83b2f76', '1771068271', 'off'),
(393, '_site_transient_wp_theme_files_patterns-c4b9c41e05247c5c7f92b5a0c83b2f76', 'a:2:{s:7:\"version\";s:5:\"1.0.0\";s:8:\"patterns\";a:0:{}}', 'off');

-- --------------------------------------------------------

--
-- Table structure for table `wp_postmeta`
--

CREATE TABLE `wp_postmeta` (
  `meta_id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_value` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `wp_postmeta`
--

INSERT INTO `wp_postmeta` (`meta_id`, `post_id`, `meta_key`, `meta_value`) VALUES
(1, 2, '_wp_page_template', 'default'),
(2, 3, '_wp_page_template', 'default'),
(3, 2, '_edit_last', '1'),
(4, 2, '_edit_lock', '1771059483:1'),
(5, 8, '_edit_last', '1'),
(6, 8, '_wp_page_template', 'default'),
(7, 8, '_edit_lock', '1771065291:1'),
(11, 13, '_edit_last', '1'),
(12, 13, '_wp_page_template', 'default'),
(13, 13, '_edit_lock', '1768636528:1'),
(14, 15, '_menu_item_type', 'post_type'),
(15, 15, '_menu_item_menu_item_parent', '0'),
(16, 15, '_menu_item_object_id', '2'),
(17, 15, '_menu_item_object', 'page'),
(18, 15, '_menu_item_target', ''),
(19, 15, '_menu_item_classes', 'a:1:{i:0;s:0:\"\";}'),
(20, 15, '_menu_item_xfn', ''),
(21, 15, '_menu_item_url', ''),
(23, 16, '_menu_item_type', 'post_type'),
(24, 16, '_menu_item_menu_item_parent', '0'),
(25, 16, '_menu_item_object_id', '8'),
(26, 16, '_menu_item_object', 'page'),
(27, 16, '_menu_item_target', ''),
(28, 16, '_menu_item_classes', 'a:1:{i:0;s:0:\"\";}'),
(29, 16, '_menu_item_xfn', ''),
(30, 16, '_menu_item_url', ''),
(32, 17, '_menu_item_type', 'post_type'),
(33, 17, '_menu_item_menu_item_parent', '0'),
(34, 17, '_menu_item_object_id', '13'),
(35, 17, '_menu_item_object', 'page'),
(36, 17, '_menu_item_target', ''),
(37, 17, '_menu_item_classes', 'a:1:{i:0;s:0:\"\";}'),
(38, 17, '_menu_item_xfn', ''),
(39, 17, '_menu_item_url', ''),
(50, 19, '_menu_item_type', 'taxonomy'),
(51, 19, '_menu_item_menu_item_parent', '0'),
(52, 19, '_menu_item_object_id', '1'),
(53, 19, '_menu_item_object', 'category'),
(54, 19, '_menu_item_target', ''),
(55, 19, '_menu_item_classes', 'a:1:{i:0;s:0:\"\";}'),
(56, 19, '_menu_item_xfn', ''),
(57, 19, '_menu_item_url', ''),
(59, 20, '_menu_item_type', 'post_type'),
(60, 20, '_menu_item_menu_item_parent', '0'),
(61, 20, '_menu_item_object_id', '2'),
(62, 20, '_menu_item_object', 'page'),
(63, 20, '_menu_item_target', ''),
(64, 20, '_menu_item_classes', 'a:1:{i:0;s:0:\"\";}'),
(65, 20, '_menu_item_xfn', ''),
(66, 20, '_menu_item_url', ''),
(68, 21, '_menu_item_type', 'post_type'),
(69, 21, '_menu_item_menu_item_parent', '0'),
(70, 21, '_menu_item_object_id', '8'),
(71, 21, '_menu_item_object', 'page'),
(72, 21, '_menu_item_target', ''),
(73, 21, '_menu_item_classes', 'a:1:{i:0;s:0:\"\";}'),
(74, 21, '_menu_item_xfn', ''),
(75, 21, '_menu_item_url', ''),
(86, 23, '_menu_item_type', 'post_type'),
(87, 23, '_menu_item_menu_item_parent', '0'),
(88, 23, '_menu_item_object_id', '13'),
(89, 23, '_menu_item_object', 'page'),
(90, 23, '_menu_item_target', ''),
(91, 23, '_menu_item_classes', 'a:1:{i:0;s:0:\"\";}'),
(92, 23, '_menu_item_xfn', ''),
(93, 23, '_menu_item_url', ''),
(95, 24, '_menu_item_type', 'taxonomy'),
(96, 24, '_menu_item_menu_item_parent', '0'),
(97, 24, '_menu_item_object_id', '1'),
(98, 24, '_menu_item_object', 'category'),
(99, 24, '_menu_item_target', ''),
(100, 24, '_menu_item_classes', 'a:1:{i:0;s:0:\"\";}'),
(101, 24, '_menu_item_xfn', ''),
(102, 24, '_menu_item_url', ''),
(104, 25, '_menu_item_type', 'custom'),
(105, 25, '_menu_item_menu_item_parent', '0'),
(106, 25, '_menu_item_object_id', '25'),
(107, 25, '_menu_item_object', 'custom'),
(108, 25, '_menu_item_target', ''),
(109, 25, '_menu_item_classes', 'a:1:{i:0;s:0:\"\";}'),
(110, 25, '_menu_item_xfn', ''),
(111, 25, '_menu_item_url', 'https://x.com/supercarbaldie'),
(113, 26, '_menu_item_type', 'custom'),
(114, 26, '_menu_item_menu_item_parent', '0'),
(115, 26, '_menu_item_object_id', '26'),
(116, 26, '_menu_item_object', 'custom'),
(117, 26, '_menu_item_target', ''),
(118, 26, '_menu_item_classes', 'a:1:{i:0;s:0:\"\";}'),
(119, 26, '_menu_item_xfn', ''),
(120, 26, '_menu_item_url', 'https://www.instagram.com/supercarbaldie_official/'),
(122, 27, '_menu_item_type', 'custom'),
(123, 27, '_menu_item_menu_item_parent', '0'),
(124, 27, '_menu_item_object_id', '27'),
(125, 27, '_menu_item_object', 'custom'),
(126, 27, '_menu_item_target', ''),
(127, 27, '_menu_item_classes', 'a:1:{i:0;s:0:\"\";}'),
(128, 27, '_menu_item_xfn', ''),
(129, 27, '_menu_item_url', 'https://www.youtube.com/channel/UCTq_oZyS8rJ__Cs3XyyU5yw'),
(131, 28, '_menu_item_type', 'custom'),
(132, 28, '_menu_item_menu_item_parent', '0'),
(133, 28, '_menu_item_object_id', '28'),
(134, 28, '_menu_item_object', 'custom'),
(135, 28, '_menu_item_target', ''),
(136, 28, '_menu_item_classes', 'a:1:{i:0;s:0:\"\";}'),
(137, 28, '_menu_item_xfn', ''),
(138, 28, '_menu_item_url', 'https://www.pinterest.com/ChronEvo/'),
(140, 29, '_menu_item_type', 'custom'),
(141, 29, '_menu_item_menu_item_parent', '0'),
(142, 29, '_menu_item_object_id', '29'),
(143, 29, '_menu_item_object', 'custom'),
(144, 29, '_menu_item_target', ''),
(145, 29, '_menu_item_classes', 'a:1:{i:0;s:0:\"\";}'),
(146, 29, '_menu_item_xfn', ''),
(147, 29, '_menu_item_url', 'https://www.linkedin.com/company/chronevomedia/'),
(149, 30, '_menu_item_type', 'custom'),
(150, 30, '_menu_item_menu_item_parent', '0'),
(151, 30, '_menu_item_object_id', '30'),
(152, 30, '_menu_item_object', 'custom'),
(153, 30, '_menu_item_target', ''),
(154, 30, '_menu_item_classes', 'a:1:{i:0;s:0:\"\";}'),
(155, 30, '_menu_item_xfn', ''),
(156, 30, '_menu_item_url', 'https://vk.com/connect_explore_design'),
(161, 31, '_menu_item_type', 'taxonomy'),
(162, 31, '_menu_item_menu_item_parent', '0'),
(163, 31, '_menu_item_object_id', '6'),
(164, 31, '_menu_item_object', 'category'),
(165, 31, '_menu_item_target', ''),
(166, 31, '_menu_item_classes', 'a:1:{i:0;s:0:\"\";}'),
(167, 31, '_menu_item_xfn', ''),
(168, 31, '_menu_item_url', ''),
(170, 15, '_wp_old_date', '2026-01-17'),
(171, 16, '_wp_old_date', '2026-01-17'),
(172, 19, '_wp_old_date', '2026-01-17'),
(173, 17, '_wp_old_date', '2026-01-17'),
(174, 32, '_menu_item_type', 'taxonomy'),
(175, 32, '_menu_item_menu_item_parent', '0'),
(176, 32, '_menu_item_object_id', '6'),
(177, 32, '_menu_item_object', 'category'),
(178, 32, '_menu_item_target', ''),
(179, 32, '_menu_item_classes', 'a:1:{i:0;s:0:\"\";}'),
(180, 32, '_menu_item_xfn', ''),
(181, 32, '_menu_item_url', ''),
(183, 20, '_wp_old_date', '2026-01-17'),
(184, 21, '_wp_old_date', '2026-01-17'),
(185, 24, '_wp_old_date', '2026-01-17'),
(186, 23, '_wp_old_date', '2026-01-17'),
(187, 1, '_edit_last', '1'),
(189, 1, '_wp_old_slug', 'hello-world'),
(190, 1, '_edit_lock', '1771065982:1'),
(193, 36, '_edit_last', '1'),
(194, 36, '_edit_lock', '1769796548:1'),
(197, 36, '_wp_old_slug', 'all-the-greatest-ideas-come-unexpectedly'),
(198, 20, '_wp_old_date', '2026-01-24'),
(199, 21, '_wp_old_date', '2026-01-24'),
(200, 32, '_wp_old_date', '2026-01-24'),
(201, 24, '_wp_old_date', '2026-01-24'),
(202, 23, '_wp_old_date', '2026-01-24'),
(203, 39, '_edit_last', '1'),
(204, 39, '_edit_lock', '1771061336:1'),
(205, 2, 'tagline_1', 'CONNECT'),
(206, 2, '_tagline_1', 'field_699033d6ebb9b'),
(207, 2, 'tagline_2', 'EXPLORE'),
(208, 2, '_tagline_2', 'field_6990344e5f9a5'),
(209, 2, 'tagline_3', 'DESIGN'),
(210, 2, '_tagline_3', 'field_6990345b5f9a6'),
(211, 44, 'tagline_1', 'CONNECT2'),
(212, 44, '_tagline_1', 'field_699033d6ebb9b'),
(213, 44, 'tagline_2', 'EXPLORE'),
(214, 44, '_tagline_2', 'field_6990344e5f9a5'),
(215, 44, 'tagline_3', 'DESIGN'),
(216, 44, '_tagline_3', 'field_6990345b5f9a6'),
(217, 45, 'tagline_1', 'CONNECT'),
(218, 45, '_tagline_1', 'field_699033d6ebb9b'),
(219, 45, 'tagline_2', 'EXPLORE'),
(220, 45, '_tagline_2', 'field_6990344e5f9a5'),
(221, 45, 'tagline_3', 'DESIGN'),
(222, 45, '_tagline_3', 'field_6990345b5f9a6'),
(223, 49, '_wp_attached_file', 'sYweukcLYAl9OpeP.jpg'),
(224, 49, '_wp_attachment_metadata', 'a:6:{s:5:\"width\";i:435;s:6:\"height\";i:543;s:4:\"file\";s:20:\"sYweukcLYAl9OpeP.jpg\";s:8:\"filesize\";i:29972;s:5:\"sizes\";a:0:{}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}'),
(225, 2, 'photo_left', '49'),
(226, 2, '_photo_left', 'field_6990362066460'),
(227, 2, 'photo_center', '51'),
(228, 2, '_photo_center', 'field_6990364ba3c4d'),
(229, 2, 'photo_right', '53'),
(230, 2, '_photo_right', 'field_69903657a3c4e'),
(231, 50, 'tagline_1', 'CONNECT'),
(232, 50, '_tagline_1', 'field_699033d6ebb9b'),
(233, 50, 'tagline_2', 'EXPLORE'),
(234, 50, '_tagline_2', 'field_6990344e5f9a5'),
(235, 50, 'tagline_3', 'DESIGN'),
(236, 50, '_tagline_3', 'field_6990345b5f9a6'),
(237, 50, 'photo_left', '49'),
(238, 50, '_photo_left', 'field_6990362066460'),
(239, 50, 'photo_center', ''),
(240, 50, '_photo_center', 'field_6990364ba3c4d'),
(241, 50, 'photo_right', ''),
(242, 50, '_photo_right', 'field_69903657a3c4e'),
(243, 51, '_wp_attached_file', 'txXzaCsSfKlEy1cV.jpg'),
(244, 51, '_wp_attachment_metadata', 'a:6:{s:5:\"width\";i:850;s:6:\"height\";i:840;s:4:\"file\";s:20:\"txXzaCsSfKlEy1cV.jpg\";s:8:\"filesize\";i:82853;s:5:\"sizes\";a:1:{s:12:\"medium_large\";a:5:{s:4:\"file\";s:28:\"txXzaCsSfKlEy1cV-768x759.jpg\";s:5:\"width\";i:768;s:6:\"height\";i:759;s:9:\"mime-type\";s:10:\"image/jpeg\";s:8:\"filesize\";i:62014;}}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}'),
(245, 52, 'tagline_1', 'CONNECT'),
(246, 52, '_tagline_1', 'field_699033d6ebb9b'),
(247, 52, 'tagline_2', 'EXPLORE'),
(248, 52, '_tagline_2', 'field_6990344e5f9a5'),
(249, 52, 'tagline_3', 'DESIGN'),
(250, 52, '_tagline_3', 'field_6990345b5f9a6'),
(251, 52, 'photo_left', '49'),
(252, 52, '_photo_left', 'field_6990362066460'),
(253, 52, 'photo_center', '51'),
(254, 52, '_photo_center', 'field_6990364ba3c4d'),
(255, 52, 'photo_right', ''),
(256, 52, '_photo_right', 'field_69903657a3c4e'),
(257, 53, '_wp_attached_file', '80mDuJOzOa19YQnb.jpg'),
(258, 53, '_wp_attachment_metadata', 'a:6:{s:5:\"width\";i:235;s:6:\"height\";i:404;s:4:\"file\";s:20:\"80mDuJOzOa19YQnb.jpg\";s:8:\"filesize\";i:20300;s:5:\"sizes\";a:0:{}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}'),
(259, 54, 'tagline_1', 'CONNECT'),
(260, 54, '_tagline_1', 'field_699033d6ebb9b'),
(261, 54, 'tagline_2', 'EXPLORE'),
(262, 54, '_tagline_2', 'field_6990344e5f9a5'),
(263, 54, 'tagline_3', 'DESIGN'),
(264, 54, '_tagline_3', 'field_6990345b5f9a6'),
(265, 54, 'photo_left', '49'),
(266, 54, '_photo_left', 'field_6990362066460'),
(267, 54, 'photo_center', '51'),
(268, 54, '_photo_center', 'field_6990364ba3c4d'),
(269, 54, 'photo_right', '53'),
(270, 54, '_photo_right', 'field_69903657a3c4e'),
(271, 55, '_edit_last', '1'),
(273, 55, '_edit_lock', '1771059522:1'),
(274, 57, '_edit_last', '1'),
(276, 57, '_edit_lock', '1771059533:1'),
(277, 59, '_edit_last', '1'),
(279, 59, '_edit_lock', '1771059541:1'),
(280, 61, '_edit_last', '1'),
(282, 61, '_edit_lock', '1771059912:1'),
(283, 63, '_edit_last', '1'),
(285, 63, '_edit_lock', '1771059556:1'),
(288, 67, '_edit_last', '1'),
(289, 67, '_edit_lock', '1771064179:1'),
(290, 8, 'tagline_1', 'Let\'s Work Together'),
(291, 8, '_tagline_1', 'field_699040ecb33d4'),
(292, 8, 'tagline_2', 'Turning Ideas Into Impact'),
(293, 8, '_tagline_2', 'field_69904117b33d5'),
(294, 8, 'tagline_3', 'Where Vision Meets Action'),
(295, 8, '_tagline_3', 'field_69904122b33d6'),
(296, 8, 'youtube', 'KfIaXTb45tI'),
(297, 8, '_youtube', 'field_69904179203e6'),
(298, 72, 'tagline_1', 'Let\'s Work Together'),
(299, 72, '_tagline_1', 'field_699040ecb33d4'),
(300, 72, 'tagline_2', 'Turning Ideas Into Impact'),
(301, 72, '_tagline_2', 'field_69904117b33d5'),
(302, 72, 'tagline_3', 'Where Vision Meets Action'),
(303, 72, '_tagline_3', 'field_69904122b33d6'),
(304, 72, 'youtube', 'KfIaXTb45tI'),
(305, 72, '_youtube', 'field_69904179203e6'),
(306, 75, '_wp_attached_file', 'iqRTJLOsqF19EOA5.jpg'),
(307, 75, '_wp_attachment_metadata', 'a:6:{s:5:\"width\";i:725;s:6:\"height\";i:875;s:4:\"file\";s:20:\"iqRTJLOsqF19EOA5.jpg\";s:8:\"filesize\";i:117893;s:5:\"sizes\";a:0:{}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}'),
(308, 8, 'image_back', '75'),
(309, 8, '_image_back', 'field_6990421e553e4'),
(310, 8, 'image_front', '77'),
(311, 8, '_image_front', 'field_6990422f553e5'),
(312, 76, 'tagline_1', 'Let\'s Work Together'),
(313, 76, '_tagline_1', 'field_699040ecb33d4'),
(314, 76, 'tagline_2', 'Turning Ideas Into Impact'),
(315, 76, '_tagline_2', 'field_69904117b33d5'),
(316, 76, 'tagline_3', 'Where Vision Meets Action'),
(317, 76, '_tagline_3', 'field_69904122b33d6'),
(318, 76, 'youtube', 'KfIaXTb45tI'),
(319, 76, '_youtube', 'field_69904179203e6'),
(320, 76, 'image_back', '75'),
(321, 76, '_image_back', 'field_6990421e553e4'),
(322, 76, 'image_front', ''),
(323, 76, '_image_front', 'field_6990422f553e5'),
(324, 77, '_wp_attached_file', '9yjjcywBi6uBCAXc.jpg'),
(325, 77, '_wp_attachment_metadata', 'a:6:{s:5:\"width\";i:300;s:6:\"height\";i:400;s:4:\"file\";s:20:\"9yjjcywBi6uBCAXc.jpg\";s:8:\"filesize\";i:6700;s:5:\"sizes\";a:0:{}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}'),
(326, 78, 'tagline_1', 'Let\'s Work Together'),
(327, 78, '_tagline_1', 'field_699040ecb33d4'),
(328, 78, 'tagline_2', 'Turning Ideas Into Impact'),
(329, 78, '_tagline_2', 'field_69904117b33d5'),
(330, 78, 'tagline_3', 'Where Vision Meets Action'),
(331, 78, '_tagline_3', 'field_69904122b33d6'),
(332, 78, 'youtube', 'KfIaXTb45tI'),
(333, 78, '_youtube', 'field_69904179203e6'),
(334, 78, 'image_back', '75'),
(335, 78, '_image_back', 'field_6990421e553e4'),
(336, 78, 'image_front', '77'),
(337, 78, '_image_front', 'field_6990422f553e5'),
(338, 79, 'tagline_1', 'Let\'s Work Together'),
(339, 79, '_tagline_1', 'field_699040ecb33d4'),
(340, 79, 'tagline_2', 'Turning Ideas Into Impact'),
(341, 79, '_tagline_2', 'field_69904117b33d5'),
(342, 79, 'tagline_3', 'Where Vision Meets Action'),
(343, 79, '_tagline_3', 'field_69904122b33d6'),
(344, 79, 'youtube', 'KfIaXTb45tI'),
(345, 79, '_youtube', 'field_69904179203e6'),
(346, 79, 'image_back', '75'),
(347, 79, '_image_back', 'field_6990421e553e4'),
(348, 79, 'image_front', '77'),
(349, 79, '_image_front', 'field_6990422f553e5'),
(350, 80, 'tagline_1', 'Let\'s Work Together'),
(351, 80, '_tagline_1', 'field_699040ecb33d4'),
(352, 80, 'tagline_2', 'Turning Ideas Into Impact'),
(353, 80, '_tagline_2', 'field_69904117b33d5'),
(354, 80, 'tagline_3', 'Where Vision Meets Action'),
(355, 80, '_tagline_3', 'field_69904122b33d6'),
(356, 80, 'youtube', 'KfIaXTb45tI'),
(357, 80, '_youtube', 'field_69904179203e6'),
(358, 80, 'image_back', '75'),
(359, 80, '_image_back', 'field_6990421e553e4'),
(360, 80, 'image_front', '77'),
(361, 80, '_image_front', 'field_6990422f553e5'),
(362, 81, 'tagline_1', 'Let\'s Work Together'),
(363, 81, '_tagline_1', 'field_699040ecb33d4'),
(364, 81, 'tagline_2', 'Turning Ideas Into Impact'),
(365, 81, '_tagline_2', 'field_69904117b33d5'),
(366, 81, 'tagline_3', 'Where Vision Meets Action'),
(367, 81, '_tagline_3', 'field_69904122b33d6'),
(368, 81, 'youtube', 'KfIaXTb45tI'),
(369, 81, '_youtube', 'field_69904179203e6'),
(370, 81, 'image_back', '75'),
(371, 81, '_image_back', 'field_6990421e553e4'),
(372, 81, 'image_front', '77'),
(373, 81, '_image_front', 'field_6990422f553e5'),
(374, 8, 'tagline', 'Who We Are'),
(375, 8, '_tagline', 'field_6990461030391'),
(376, 83, 'tagline_1', 'Let\'s Work Together'),
(377, 83, '_tagline_1', 'field_699040ecb33d4'),
(378, 83, 'tagline_2', 'Turning Ideas Into Impact'),
(379, 83, '_tagline_2', 'field_69904117b33d5'),
(380, 83, 'tagline_3', 'Where Vision Meets Action'),
(381, 83, '_tagline_3', 'field_69904122b33d6'),
(382, 83, 'youtube', 'KfIaXTb45tI'),
(383, 83, '_youtube', 'field_69904179203e6'),
(384, 83, 'image_back', '75'),
(385, 83, '_image_back', 'field_6990421e553e4'),
(386, 83, 'image_front', '77'),
(387, 83, '_image_front', 'field_6990422f553e5'),
(388, 83, 'tagline', 'Who Are We'),
(389, 83, '_tagline', 'field_6990461030391'),
(390, 84, '_edit_last', '1'),
(391, 84, '_edit_lock', '1771065491:1'),
(392, 8, 'title', 'Recognized for Outstanding Design'),
(393, 8, '_title', 'field_69904c0599795'),
(394, 8, 'description', 'At Chronevo, great design is at the heart of everything we create. Being recognized by respected design institutions around the world is an incredible honor for our team. These awards celebrate our passion for innovation, attention to detail, and commitment to crafting products that are both beautiful and purposeful. And they inspire us to keep raising the bar.'),
(395, 8, '_description', 'field_69904c2899796'),
(396, 8, 'image', '49'),
(397, 8, '_image', 'field_69904c4099797'),
(398, 89, 'tagline_1', 'Let\'s Work Together'),
(399, 89, '_tagline_1', 'field_699040ecb33d4'),
(400, 89, 'tagline_2', 'Turning Ideas Into Impact'),
(401, 89, '_tagline_2', 'field_69904117b33d5'),
(402, 89, 'tagline_3', 'Where Vision Meets Action'),
(403, 89, '_tagline_3', 'field_69904122b33d6'),
(404, 89, 'youtube', 'KfIaXTb45tI'),
(405, 89, '_youtube', 'field_69904179203e6'),
(406, 89, 'image_back', '75'),
(407, 89, '_image_back', 'field_6990421e553e4'),
(408, 89, 'image_front', '77'),
(409, 89, '_image_front', 'field_6990422f553e5'),
(410, 89, 'tagline', 'Huge Honor'),
(411, 89, '_tagline', 'field_69904c4d99798'),
(412, 89, 'title', 'Prestigious Awards For Design'),
(413, 89, '_title', 'field_69904c0599795'),
(414, 89, 'description', 'Dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur. Dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas.'),
(415, 89, '_description', 'field_69904c2899796'),
(416, 89, 'image', '49'),
(417, 89, '_image', 'field_69904c4099797'),
(418, 8, 'award_tagline', 'We’re Truly Honored'),
(419, 8, '_award_tagline', 'field_69904c4d99798'),
(420, 90, 'tagline_1', 'Let\'s Work Together'),
(421, 90, '_tagline_1', 'field_699040ecb33d4'),
(422, 90, 'tagline_2', 'Turning Ideas Into Impact'),
(423, 90, '_tagline_2', 'field_69904117b33d5'),
(424, 90, 'tagline_3', 'Where Vision Meets Action'),
(425, 90, '_tagline_3', 'field_69904122b33d6'),
(426, 90, 'youtube', 'KfIaXTb45tI'),
(427, 90, '_youtube', 'field_69904179203e6'),
(428, 90, 'image_back', '75'),
(429, 90, '_image_back', 'field_6990421e553e4'),
(430, 90, 'image_front', '77'),
(431, 90, '_image_front', 'field_6990422f553e5'),
(432, 90, 'tagline', 'Who We Are'),
(433, 90, '_tagline', 'field_6990461030391'),
(434, 90, 'title', 'Prestigious Awards For Design'),
(435, 90, '_title', 'field_69904c0599795'),
(436, 90, 'description', 'Dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur. Dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas.'),
(437, 90, '_description', 'field_69904c2899796'),
(438, 90, 'image', '49'),
(439, 90, '_image', 'field_69904c4099797'),
(440, 90, 'award_tagline', 'Huge Honor'),
(441, 90, '_award_tagline', 'field_69904c4d99798'),
(442, 91, 'tagline_1', 'Let\'s Work Together'),
(443, 91, '_tagline_1', 'field_699040ecb33d4'),
(444, 91, 'tagline_2', 'Turning Ideas Into Impact'),
(445, 91, '_tagline_2', 'field_69904117b33d5'),
(446, 91, 'tagline_3', 'Where Vision Meets Action'),
(447, 91, '_tagline_3', 'field_69904122b33d6'),
(448, 91, 'youtube', 'KfIaXTb45tI'),
(449, 91, '_youtube', 'field_69904179203e6'),
(450, 91, 'image_back', '75'),
(451, 91, '_image_back', 'field_6990421e553e4'),
(452, 91, 'image_front', '77'),
(453, 91, '_image_front', 'field_6990422f553e5'),
(454, 91, 'tagline', 'Who We Are'),
(455, 91, '_tagline', 'field_6990461030391'),
(456, 91, 'title', 'Internationally Recognized for Design Excellence'),
(457, 91, '_title', 'field_69904c0599795'),
(458, 91, 'description', 'Chronevo’s commitment to precision, innovation, and refined aesthetics has earned recognition from leading global design authorities. Each award reflects our dedication to craftsmanship, forward-thinking engineering, and uncompromising attention to detail. These honors are not just milestones — they represent our ongoing pursuit of excellence in every creation.'),
(459, 91, '_description', 'field_69904c2899796'),
(460, 91, 'image', '49'),
(461, 91, '_image', 'field_69904c4099797'),
(462, 91, 'award_tagline', 'A Mark of Distinction'),
(463, 91, '_award_tagline', 'field_69904c4d99798'),
(464, 92, 'tagline_1', 'Let\'s Work Together'),
(465, 92, '_tagline_1', 'field_699040ecb33d4'),
(466, 92, 'tagline_2', 'Turning Ideas Into Impact'),
(467, 92, '_tagline_2', 'field_69904117b33d5'),
(468, 92, 'tagline_3', 'Where Vision Meets Action'),
(469, 92, '_tagline_3', 'field_69904122b33d6'),
(470, 92, 'youtube', 'KfIaXTb45tI'),
(471, 92, '_youtube', 'field_69904179203e6'),
(472, 92, 'image_back', '75'),
(473, 92, '_image_back', 'field_6990421e553e4'),
(474, 92, 'image_front', '77'),
(475, 92, '_image_front', 'field_6990422f553e5'),
(476, 92, 'tagline', 'Who We Are'),
(477, 92, '_tagline', 'field_6990461030391'),
(478, 92, 'title', 'Recognized for Outstanding Design'),
(479, 92, '_title', 'field_69904c0599795'),
(480, 92, 'description', 'At Chronevo, great design is at the heart of everything we create. Being recognized by respected design institutions around the world is an incredible honor for our team. These awards celebrate our passion for innovation, attention to detail, and commitment to crafting products that are both beautiful and purposeful. And they inspire us to keep raising the bar.'),
(481, 92, '_description', 'field_69904c2899796'),
(482, 92, 'image', '49'),
(483, 92, '_image', 'field_69904c4099797'),
(484, 92, 'award_tagline', 'We’re Truly Honored'),
(485, 92, '_award_tagline', 'field_69904c4d99798'),
(486, 8, 'show', '1'),
(487, 8, '_show', 'field_69904ebff0306'),
(488, 94, 'tagline_1', 'Let\'s Work Together'),
(489, 94, '_tagline_1', 'field_699040ecb33d4'),
(490, 94, 'tagline_2', 'Turning Ideas Into Impact'),
(491, 94, '_tagline_2', 'field_69904117b33d5'),
(492, 94, 'tagline_3', 'Where Vision Meets Action'),
(493, 94, '_tagline_3', 'field_69904122b33d6'),
(494, 94, 'youtube', 'KfIaXTb45tI'),
(495, 94, '_youtube', 'field_69904179203e6'),
(496, 94, 'image_back', '75'),
(497, 94, '_image_back', 'field_6990421e553e4'),
(498, 94, 'image_front', '77'),
(499, 94, '_image_front', 'field_6990422f553e5'),
(500, 94, 'tagline', 'Who We Are'),
(501, 94, '_tagline', 'field_6990461030391'),
(502, 94, 'title', 'Recognized for Outstanding Design'),
(503, 94, '_title', 'field_69904c0599795'),
(504, 94, 'description', 'At Chronevo, great design is at the heart of everything we create. Being recognized by respected design institutions around the world is an incredible honor for our team. These awards celebrate our passion for innovation, attention to detail, and commitment to crafting products that are both beautiful and purposeful. And they inspire us to keep raising the bar.'),
(505, 94, '_description', 'field_69904c2899796'),
(506, 94, 'image', '49'),
(507, 94, '_image', 'field_69904c4099797'),
(508, 94, 'award_tagline', 'We’re Truly Honored'),
(509, 94, '_award_tagline', 'field_69904c4d99798'),
(510, 94, 'show', '1'),
(511, 94, '_show', 'field_69904ebff0306'),
(512, 95, 'tagline_1', 'Let\'s Work Together'),
(513, 95, '_tagline_1', 'field_699040ecb33d4'),
(514, 95, 'tagline_2', 'Turning Ideas Into Impact'),
(515, 95, '_tagline_2', 'field_69904117b33d5'),
(516, 95, 'tagline_3', 'Where Vision Meets Action'),
(517, 95, '_tagline_3', 'field_69904122b33d6'),
(518, 95, 'youtube', 'KfIaXTb45tI'),
(519, 95, '_youtube', 'field_69904179203e6'),
(520, 95, 'image_back', '75'),
(521, 95, '_image_back', 'field_6990421e553e4'),
(522, 95, 'image_front', '77'),
(523, 95, '_image_front', 'field_6990422f553e5'),
(524, 95, 'tagline', 'Who We Are'),
(525, 95, '_tagline', 'field_6990461030391'),
(526, 95, 'title', 'Recognized for Outstanding Design'),
(527, 95, '_title', 'field_69904c0599795'),
(528, 95, 'description', 'At Chronevo, great design is at the heart of everything we create. Being recognized by respected design institutions around the world is an incredible honor for our team. These awards celebrate our passion for innovation, attention to detail, and commitment to crafting products that are both beautiful and purposeful. And they inspire us to keep raising the bar.'),
(529, 95, '_description', 'field_69904c2899796'),
(530, 95, 'image', '49'),
(531, 95, '_image', 'field_69904c4099797'),
(532, 95, 'award_tagline', 'We’re Truly Honored'),
(533, 95, '_award_tagline', 'field_69904c4d99798'),
(534, 95, 'show', '0'),
(535, 95, '_show', 'field_69904ebff0306'),
(536, 96, 'tagline_1', 'Let\'s Work Together'),
(537, 96, '_tagline_1', 'field_699040ecb33d4'),
(538, 96, 'tagline_2', 'Turning Ideas Into Impact'),
(539, 96, '_tagline_2', 'field_69904117b33d5'),
(540, 96, 'tagline_3', 'Where Vision Meets Action'),
(541, 96, '_tagline_3', 'field_69904122b33d6'),
(542, 96, 'youtube', 'KfIaXTb45tI'),
(543, 96, '_youtube', 'field_69904179203e6'),
(544, 96, 'image_back', '75'),
(545, 96, '_image_back', 'field_6990421e553e4'),
(546, 96, 'image_front', '77'),
(547, 96, '_image_front', 'field_6990422f553e5'),
(548, 96, 'tagline', 'Who We Are'),
(549, 96, '_tagline', 'field_6990461030391'),
(550, 96, 'title', 'Recognized for Outstanding Design'),
(551, 96, '_title', 'field_69904c0599795'),
(552, 96, 'description', 'At Chronevo, great design is at the heart of everything we create. Being recognized by respected design institutions around the world is an incredible honor for our team. These awards celebrate our passion for innovation, attention to detail, and commitment to crafting products that are both beautiful and purposeful. And they inspire us to keep raising the bar.'),
(553, 96, '_description', 'field_69904c2899796'),
(554, 96, 'image', '49'),
(555, 96, '_image', 'field_69904c4099797'),
(556, 96, 'award_tagline', 'We’re Truly Honored'),
(557, 96, '_award_tagline', 'field_69904c4d99798'),
(558, 96, 'show', '1'),
(559, 96, '_show', 'field_69904ebff0306'),
(562, 1, '_wp_old_slug', 'design-trends'),
(563, 97, '_edit_last', '1'),
(564, 97, '_edit_lock', '1771066490:1'),
(566, 1, 'portfolio_tagline', 'Brand Identity Design'),
(567, 1, '_portfolio_tagline', 'field_69905129bd3f8'),
(569, 99, '_edit_last', '1'),
(570, 99, '_edit_lock', '1771065964:1'),
(572, 99, 'portfolio_tagline', 'Editorial Photography'),
(573, 99, '_portfolio_tagline', 'field_69905129bd3f8'),
(574, 99, '_thumbnail_id', '49'),
(576, 1, '_thumbnail_id', '51'),
(578, 100, '_edit_last', '1'),
(579, 100, '_thumbnail_id', '53'),
(581, 100, 'portfolio_tagline', 'Web Design Project'),
(582, 100, '_portfolio_tagline', 'field_69905129bd3f8'),
(583, 100, '_edit_lock', '1771066026:1'),
(584, 102, '_edit_last', '1'),
(585, 102, '_thumbnail_id', '75'),
(587, 102, 'portfolio_tagline', 'Print Campaign'),
(588, 102, '_portfolio_tagline', 'field_69905129bd3f8'),
(589, 102, '_edit_lock', '1771066084:1'),
(590, 103, '_edit_last', '1'),
(591, 103, '_thumbnail_id', '77'),
(593, 103, 'portfolio_tagline', 'Product Photography'),
(594, 103, '_portfolio_tagline', 'field_69905129bd3f8'),
(595, 103, '_edit_lock', '1771066112:1'),
(596, 104, '_edit_last', '1'),
(597, 104, '_thumbnail_id', '51'),
(599, 104, 'portfolio_tagline', 'Brand Strategy'),
(600, 104, '_portfolio_tagline', 'field_69905129bd3f8'),
(601, 104, '_edit_lock', '1771066138:1');

-- --------------------------------------------------------

--
-- Table structure for table `wp_posts`
--

CREATE TABLE `wp_posts` (
  `ID` bigint(20) UNSIGNED NOT NULL,
  `post_author` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `post_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_date_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_content` longtext NOT NULL,
  `post_title` text NOT NULL,
  `post_excerpt` text NOT NULL,
  `post_status` varchar(20) NOT NULL DEFAULT 'publish',
  `comment_status` varchar(20) NOT NULL DEFAULT 'open',
  `ping_status` varchar(20) NOT NULL DEFAULT 'open',
  `post_password` varchar(255) NOT NULL DEFAULT '',
  `post_name` varchar(200) NOT NULL DEFAULT '',
  `to_ping` text NOT NULL,
  `pinged` text NOT NULL,
  `post_modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_modified_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_content_filtered` longtext NOT NULL,
  `post_parent` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `guid` varchar(255) NOT NULL DEFAULT '',
  `menu_order` int(11) NOT NULL DEFAULT 0,
  `post_type` varchar(20) NOT NULL DEFAULT 'post',
  `post_mime_type` varchar(100) NOT NULL DEFAULT '',
  `comment_count` bigint(20) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `wp_posts`
--

INSERT INTO `wp_posts` (`ID`, `post_author`, `post_date`, `post_date_gmt`, `post_content`, `post_title`, `post_excerpt`, `post_status`, `comment_status`, `ping_status`, `post_password`, `post_name`, `to_ping`, `pinged`, `post_modified`, `post_modified_gmt`, `post_content_filtered`, `post_parent`, `guid`, `menu_order`, `post_type`, `post_mime_type`, `comment_count`) VALUES
(1, 1, '2026-01-17 05:12:57', '2026-01-17 05:12:57', '<!-- wp:paragraph -->\r\n<p>Dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, quia. Dicta sunt explicabo. Adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim minim veniam quis nostrud exercitation ipsam voluptatem.</p>\r\n<!-- /wp:paragraph -->', 'Visual Identity', '', 'publish', 'closed', 'closed', '', 'visual-identity', '', '', '2026-02-14 14:48:42', '2026-02-14 10:48:42', '', 0, 'http://localhost/chronevo/?p=1', 0, 'post', '', 1),
(2, 1, '2026-01-17 05:12:57', '2026-01-17 05:12:57', '', 'Home', '', 'publish', 'closed', 'closed', '', 'home', '', '', '2026-02-14 12:58:46', '2026-02-14 08:58:46', '', 0, 'http://localhost/chronevo/?page_id=2', 0, 'page', '', 0),
(3, 1, '2026-01-17 05:12:57', '2026-01-17 05:12:57', '<!-- wp:heading -->\n<h2 class=\"wp-block-heading\">Who we are</h2>\n<!-- /wp:heading -->\n<!-- wp:paragraph -->\n<p><strong class=\"privacy-policy-tutorial\">Suggested text: </strong>Our website address is: http://localhost/chronevo.</p>\n<!-- /wp:paragraph -->\n<!-- wp:heading -->\n<h2 class=\"wp-block-heading\">Comments</h2>\n<!-- /wp:heading -->\n<!-- wp:paragraph -->\n<p><strong class=\"privacy-policy-tutorial\">Suggested text: </strong>When visitors leave comments on the site we collect the data shown in the comments form, and also the visitor&#8217;s IP address and browser user agent string to help spam detection.</p>\n<!-- /wp:paragraph -->\n<!-- wp:paragraph -->\n<p>An anonymized string created from your email address (also called a hash) may be provided to the Gravatar service to see if you are using it. The Gravatar service privacy policy is available here: https://automattic.com/privacy/. After approval of your comment, your profile picture is visible to the public in the context of your comment.</p>\n<!-- /wp:paragraph -->\n<!-- wp:heading -->\n<h2 class=\"wp-block-heading\">Media</h2>\n<!-- /wp:heading -->\n<!-- wp:paragraph -->\n<p><strong class=\"privacy-policy-tutorial\">Suggested text: </strong>If you upload images to the website, you should avoid uploading images with embedded location data (EXIF GPS) included. Visitors to the website can download and extract any location data from images on the website.</p>\n<!-- /wp:paragraph -->\n<!-- wp:heading -->\n<h2 class=\"wp-block-heading\">Cookies</h2>\n<!-- /wp:heading -->\n<!-- wp:paragraph -->\n<p><strong class=\"privacy-policy-tutorial\">Suggested text: </strong>If you leave a comment on our site you may opt-in to saving your name, email address and website in cookies. These are for your convenience so that you do not have to fill in your details again when you leave another comment. These cookies will last for one year.</p>\n<!-- /wp:paragraph -->\n<!-- wp:paragraph -->\n<p>If you visit our login page, we will set a temporary cookie to determine if your browser accepts cookies. This cookie contains no personal data and is discarded when you close your browser.</p>\n<!-- /wp:paragraph -->\n<!-- wp:paragraph -->\n<p>When you log in, we will also set up several cookies to save your login information and your screen display choices. Login cookies last for two days, and screen options cookies last for a year. If you select &quot;Remember Me&quot;, your login will persist for two weeks. If you log out of your account, the login cookies will be removed.</p>\n<!-- /wp:paragraph -->\n<!-- wp:paragraph -->\n<p>If you edit or publish an article, an additional cookie will be saved in your browser. This cookie includes no personal data and simply indicates the post ID of the article you just edited. It expires after 1 day.</p>\n<!-- /wp:paragraph -->\n<!-- wp:heading -->\n<h2 class=\"wp-block-heading\">Embedded content from other websites</h2>\n<!-- /wp:heading -->\n<!-- wp:paragraph -->\n<p><strong class=\"privacy-policy-tutorial\">Suggested text: </strong>Articles on this site may include embedded content (e.g. videos, images, articles, etc.). Embedded content from other websites behaves in the exact same way as if the visitor has visited the other website.</p>\n<!-- /wp:paragraph -->\n<!-- wp:paragraph -->\n<p>These websites may collect data about you, use cookies, embed additional third-party tracking, and monitor your interaction with that embedded content, including tracking your interaction with the embedded content if you have an account and are logged in to that website.</p>\n<!-- /wp:paragraph -->\n<!-- wp:heading -->\n<h2 class=\"wp-block-heading\">Who we share your data with</h2>\n<!-- /wp:heading -->\n<!-- wp:paragraph -->\n<p><strong class=\"privacy-policy-tutorial\">Suggested text: </strong>If you request a password reset, your IP address will be included in the reset email.</p>\n<!-- /wp:paragraph -->\n<!-- wp:heading -->\n<h2 class=\"wp-block-heading\">How long we retain your data</h2>\n<!-- /wp:heading -->\n<!-- wp:paragraph -->\n<p><strong class=\"privacy-policy-tutorial\">Suggested text: </strong>If you leave a comment, the comment and its metadata are retained indefinitely. This is so we can recognize and approve any follow-up comments automatically instead of holding them in a moderation queue.</p>\n<!-- /wp:paragraph -->\n<!-- wp:paragraph -->\n<p>For users that register on our website (if any), we also store the personal information they provide in their user profile. All users can see, edit, or delete their personal information at any time (except they cannot change their username). Website administrators can also see and edit that information.</p>\n<!-- /wp:paragraph -->\n<!-- wp:heading -->\n<h2 class=\"wp-block-heading\">What rights you have over your data</h2>\n<!-- /wp:heading -->\n<!-- wp:paragraph -->\n<p><strong class=\"privacy-policy-tutorial\">Suggested text: </strong>If you have an account on this site, or have left comments, you can request to receive an exported file of the personal data we hold about you, including any data you have provided to us. You can also request that we erase any personal data we hold about you. This does not include any data we are obliged to keep for administrative, legal, or security purposes.</p>\n<!-- /wp:paragraph -->\n<!-- wp:heading -->\n<h2 class=\"wp-block-heading\">Where your data is sent</h2>\n<!-- /wp:heading -->\n<!-- wp:paragraph -->\n<p><strong class=\"privacy-policy-tutorial\">Suggested text: </strong>Visitor comments may be checked through an automated spam detection service.</p>\n<!-- /wp:paragraph -->\n', 'Privacy Policy', '', 'draft', 'closed', 'open', '', 'privacy-policy', '', '', '2026-01-17 05:12:57', '2026-01-17 05:12:57', '', 0, 'http://localhost/chronevo/?page_id=3', 0, 'page', '', 0),
(4, 0, '2026-01-17 05:12:58', '2026-01-17 05:12:58', '<!-- wp:page-list /-->', 'Navigation', '', 'publish', 'closed', 'closed', '', 'navigation', '', '', '2026-01-17 05:12:58', '2026-01-17 05:12:58', '', 0, 'http://localhost/chronevo/2026/01/17/navigation/', 0, 'wp_navigation', '', 0),
(6, 1, '2026-01-17 09:19:09', '2026-01-17 05:19:09', '<!-- wp:paragraph -->\n<p>This is an example page. It\'s different from a blog post because it will stay in one place and will show up in your site navigation (in most themes). Most people start with an About page that introduces them to potential site visitors. It might say something like this:</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:quote -->\n<blockquote class=\"wp-block-quote\">\n<!-- wp:paragraph -->\n<p>Hi there! I\'m a bike messenger by day, aspiring actor by night, and this is my website. I live in Los Angeles, have a great dog named Jack, and I like pi&#241;a coladas. (And gettin\' caught in the rain.)</p>\n<!-- /wp:paragraph -->\n</blockquote>\n<!-- /wp:quote -->\n\n<!-- wp:paragraph -->\n<p>...or something like this:</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:quote -->\n<blockquote class=\"wp-block-quote\">\n<!-- wp:paragraph -->\n<p>The XYZ Doohickey Company was founded in 1971, and has been providing quality doohickeys to the public ever since. Located in Gotham City, XYZ employs over 2,000 people and does all kinds of awesome things for the Gotham community.</p>\n<!-- /wp:paragraph -->\n</blockquote>\n<!-- /wp:quote -->\n\n<!-- wp:paragraph -->\n<p>As a new WordPress user, you should go to <a href=\"http://localhost/chronevo/wp-admin/\">your dashboard</a> to delete this page and create new pages for your content. Have fun!</p>\n<!-- /wp:paragraph -->', 'Home', '', 'inherit', 'closed', 'closed', '', '2-revision-v1', '', '', '2026-01-17 09:19:09', '2026-01-17 05:19:09', '', 2, 'http://localhost/chronevo/?p=6', 0, 'revision', '', 0),
(7, 1, '2026-01-17 09:19:14', '2026-01-17 05:19:14', '{\"version\": 3, \"isGlobalStylesUserThemeJSON\": true }', 'Custom Styles', '', 'publish', 'closed', 'closed', '', 'wp-global-styles-twentytwentyfive', '', '', '2026-01-17 09:19:14', '2026-01-17 05:19:14', '', 0, 'http://localhost/chronevo/blog/wp-global-styles-twentytwentyfive/', 0, 'wp_global_styles', '', 0),
(8, 1, '2026-01-17 11:56:40', '2026-01-17 07:56:40', 'Chronevo is built on restraint, intention, and time. We believe true influence is never forced, it is composed. We work quietly, shaping culture with precision and care. Every decision is measured. Every detail has a purpose. We do not follow trends. We create work that endures.\r\n\r\nChronevo exists for brands that value permanence over excess, clarity over noise, and presence over performance. It\'s not what is seen first, it is what remains.', 'About Us', '', 'publish', 'closed', 'closed', '', 'about', '', '', '2026-02-14 14:36:37', '2026-02-14 10:36:37', '', 0, 'http://localhost/chronevo/?page_id=8', 0, 'page', '', 0),
(9, 1, '2026-01-17 11:56:40', '2026-01-17 07:56:40', '', 'About', '', 'inherit', 'closed', 'closed', '', '8-revision-v1', '', '', '2026-01-17 11:56:40', '2026-01-17 07:56:40', '', 8, 'http://localhost/chronevo/?p=9', 0, 'revision', '', 0),
(13, 1, '2026-01-17 11:57:18', '2026-01-17 07:57:18', '', 'Contact', '', 'publish', 'closed', 'closed', '', 'contact', '', '', '2026-01-17 11:57:18', '2026-01-17 07:57:18', '', 0, 'http://localhost/chronevo/?page_id=13', 0, 'page', '', 0),
(14, 1, '2026-01-17 11:57:18', '2026-01-17 07:57:18', '', 'Contact', '', 'inherit', 'closed', 'closed', '', '13-revision-v1', '', '', '2026-01-17 11:57:18', '2026-01-17 07:57:18', '', 13, 'http://localhost/chronevo/?p=14', 0, 'revision', '', 0),
(15, 1, '2026-01-24 16:52:20', '2026-01-17 07:59:14', ' ', '', '', 'publish', 'closed', 'closed', '', '15', '', '', '2026-01-24 16:52:20', '2026-01-24 12:52:20', '', 0, 'http://localhost/chronevo/?p=15', 1, 'nav_menu_item', '', 0),
(16, 1, '2026-01-24 16:52:20', '2026-01-17 07:59:14', ' ', '', '', 'publish', 'closed', 'closed', '', '16', '', '', '2026-01-24 16:52:20', '2026-01-24 12:52:20', '', 0, 'http://localhost/chronevo/?p=16', 2, 'nav_menu_item', '', 0),
(17, 1, '2026-01-24 16:52:20', '2026-01-17 07:59:14', ' ', '', '', 'publish', 'closed', 'closed', '', '17', '', '', '2026-01-24 16:52:20', '2026-01-24 12:52:20', '', 0, 'http://localhost/chronevo/?p=17', 5, 'nav_menu_item', '', 0),
(19, 1, '2026-01-24 16:52:20', '2026-01-17 07:59:14', ' ', '', '', 'publish', 'closed', 'closed', '', '19', '', '', '2026-01-24 16:52:20', '2026-01-24 12:52:20', '', 0, 'http://localhost/chronevo/?p=19', 4, 'nav_menu_item', '', 0),
(20, 1, '2026-02-14 12:31:48', '2026-01-17 08:03:18', ' ', '', '', 'publish', 'closed', 'closed', '', '20', '', '', '2026-02-14 12:31:48', '2026-02-14 08:31:48', '', 0, 'http://localhost/chronevo/?p=20', 1, 'nav_menu_item', '', 0),
(21, 1, '2026-02-14 12:31:48', '2026-01-17 08:03:18', ' ', '', '', 'publish', 'closed', 'closed', '', '21', '', '', '2026-02-14 12:31:48', '2026-02-14 08:31:48', '', 0, 'http://localhost/chronevo/?p=21', 2, 'nav_menu_item', '', 0),
(23, 1, '2026-02-14 12:31:48', '2026-01-17 08:03:18', ' ', '', '', 'publish', 'closed', 'closed', '', '23', '', '', '2026-02-14 12:31:48', '2026-02-14 08:31:48', '', 0, 'http://localhost/chronevo/?p=23', 5, 'nav_menu_item', '', 0),
(24, 1, '2026-02-14 12:31:48', '2026-01-17 08:03:18', ' ', '', '', 'publish', 'closed', 'closed', '', '24', '', '', '2026-02-14 12:31:48', '2026-02-14 08:31:48', '', 0, 'http://localhost/chronevo/?p=24', 4, 'nav_menu_item', '', 0),
(25, 1, '2026-01-17 12:08:44', '2026-01-17 08:08:44', '', 'X', '', 'publish', 'closed', 'closed', '', 'x', '', '', '2026-01-17 12:08:44', '2026-01-17 08:08:44', '', 0, 'http://localhost/chronevo/?p=25', 5, 'nav_menu_item', '', 0),
(26, 1, '2026-01-17 12:08:44', '2026-01-17 08:08:44', '', 'Instagram', '', 'publish', 'closed', 'closed', '', 'instagram', '', '', '2026-01-17 12:08:44', '2026-01-17 08:08:44', '', 0, 'http://localhost/chronevo/?p=26', 2, 'nav_menu_item', '', 0),
(27, 1, '2026-01-17 12:08:44', '2026-01-17 08:08:44', '', 'Youtube', '', 'publish', 'closed', 'closed', '', 'youtube', '', '', '2026-01-17 12:08:44', '2026-01-17 08:08:44', '', 0, 'http://localhost/chronevo/?p=27', 1, 'nav_menu_item', '', 0),
(28, 1, '2026-01-17 12:08:44', '2026-01-17 08:08:44', '', 'Pinterest', '', 'publish', 'closed', 'closed', '', 'pinterest', '', '', '2026-01-17 12:08:44', '2026-01-17 08:08:44', '', 0, 'http://localhost/chronevo/?p=28', 3, 'nav_menu_item', '', 0),
(29, 1, '2026-01-17 12:08:44', '2026-01-17 08:08:44', '', 'Linkedin', '', 'publish', 'closed', 'closed', '', 'linkedin', '', '', '2026-01-17 12:08:44', '2026-01-17 08:08:44', '', 0, 'http://localhost/chronevo/?p=29', 4, 'nav_menu_item', '', 0),
(30, 1, '2026-01-17 12:08:44', '2026-01-17 08:08:44', '', 'VK', '', 'publish', 'closed', 'closed', '', 'vk', '', '', '2026-01-17 12:08:44', '2026-01-17 08:08:44', '', 0, 'http://localhost/chronevo/?p=30', 6, 'nav_menu_item', '', 0),
(31, 1, '2026-01-24 16:52:20', '2026-01-24 12:52:20', ' ', '', '', 'publish', 'closed', 'closed', '', '31', '', '', '2026-01-24 16:52:20', '2026-01-24 12:52:20', '', 0, 'http://localhost/chronevo/?p=31', 3, 'nav_menu_item', '', 0),
(32, 1, '2026-02-14 12:31:48', '2026-01-24 12:52:36', ' ', '', '', 'publish', 'closed', 'closed', '', '32', '', '', '2026-02-14 12:31:48', '2026-02-14 08:31:48', '', 0, 'http://localhost/chronevo/?p=32', 3, 'nav_menu_item', '', 0),
(33, 1, '2026-01-24 16:53:21', '2026-01-24 12:53:21', '<!-- wp:paragraph -->\n<p>Welcome to WordPress. This is your first post. Edit or delete it, then start writing!</p>\n<!-- /wp:paragraph -->', 'Design Trends', '', 'inherit', 'closed', 'closed', '', '1-revision-v1', '', '', '2026-01-24 16:53:21', '2026-01-24 12:53:21', '', 1, 'http://localhost/chronevo/?p=33', 0, 'revision', '', 0),
(34, 1, '2026-01-24 17:06:01', '2026-01-24 13:06:01', '<!-- wp:paragraph -->\r\n<h2>Lorem ipsum dolor</h2>\r\n<p>Dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, quia. Dicta sunt explicabo. Adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim minim veniam quis nostrud exercitation ipsam voluptatem.</p>\r\n<!-- /wp:paragraph -->', 'Design Trends', '', 'inherit', 'closed', 'closed', '', '1-revision-v1', '', '', '2026-01-24 17:06:01', '2026-01-24 13:06:01', '', 1, 'http://localhost/chronevo/?p=34', 0, 'revision', '', 0),
(36, 1, '2026-01-30 22:08:46', '2026-01-30 18:08:46', 'Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa, quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt, explicabo.', 'All the greatest ideas come unexpectedly', '', 'publish', 'closed', 'closed', '', 'article', '', '', '2026-01-30 22:11:26', '2026-01-30 18:11:26', '', 0, 'http://localhost/chronevo/?p=36', 0, 'post', '', 0),
(37, 1, '2026-01-30 22:08:46', '2026-01-30 18:08:46', 'Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa, quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt, explicabo.', 'All the greatest ideas come unexpectedly', '', 'inherit', 'closed', 'closed', '', '36-revision-v1', '', '', '2026-01-30 22:08:46', '2026-01-30 18:08:46', '', 36, 'http://localhost/chronevo/?p=37', 0, 'revision', '', 0),
(38, 1, '2026-02-14 12:21:27', '0000-00-00 00:00:00', '', 'Auto Draft', '', 'auto-draft', '', '', '', '', '', '', '2026-02-14 12:21:27', '0000-00-00 00:00:00', '', 0, 'http://localhost/chronevo/?p=38', 0, 'post', '', 0),
(39, 1, '2026-02-14 12:35:49', '2026-02-14 08:35:49', 'a:9:{s:8:\"location\";a:1:{i:0;a:1:{i:0;a:3:{s:5:\"param\";s:4:\"page\";s:8:\"operator\";s:2:\"==\";s:5:\"value\";s:1:\"2\";}}}s:8:\"position\";s:6:\"normal\";s:5:\"style\";s:7:\"default\";s:15:\"label_placement\";s:3:\"top\";s:21:\"instruction_placement\";s:5:\"label\";s:14:\"hide_on_screen\";s:0:\"\";s:11:\"description\";s:0:\"\";s:12:\"show_in_rest\";i:0;s:13:\"display_title\";s:0:\"\";}', 'Home Fields', 'home-fields', 'publish', 'closed', 'closed', '', 'group_699033d6b3932', '', '', '2026-02-14 13:31:17', '2026-02-14 09:31:17', '', 0, 'http://localhost/chronevo/?post_type=acf-field-group&#038;p=39', 0, 'acf-field-group', '', 0),
(40, 1, '2026-02-14 12:35:49', '2026-02-14 08:35:49', 'a:12:{s:10:\"aria-label\";s:0:\"\";s:4:\"type\";s:4:\"text\";s:12:\"instructions\";s:0:\"\";s:8:\"required\";i:0;s:17:\"conditional_logic\";i:0;s:7:\"wrapper\";a:3:{s:5:\"width\";s:0:\"\";s:5:\"class\";s:0:\"\";s:2:\"id\";s:0:\"\";}s:13:\"default_value\";s:7:\"CONNECT\";s:9:\"maxlength\";s:0:\"\";s:17:\"allow_in_bindings\";i:0;s:11:\"placeholder\";s:0:\"\";s:7:\"prepend\";s:0:\"\";s:6:\"append\";s:0:\"\";}', 'Tagline 1', 'tagline_1', 'publish', 'closed', 'closed', '', 'field_699033d6ebb9b', '', '', '2026-02-14 12:38:02', '2026-02-14 08:38:02', '', 39, 'http://localhost/chronevo/?post_type=acf-field&#038;p=40', 0, 'acf-field', '', 0),
(41, 1, '2026-02-14 12:36:52', '2026-02-14 08:36:52', '', 'Home', '', 'inherit', 'closed', 'closed', '', '2-revision-v1', '', '', '2026-02-14 12:36:52', '2026-02-14 08:36:52', '', 2, 'http://localhost/chronevo/?p=41', 0, 'revision', '', 0),
(42, 1, '2026-02-14 12:38:02', '2026-02-14 08:38:02', 'a:12:{s:10:\"aria-label\";s:0:\"\";s:4:\"type\";s:4:\"text\";s:12:\"instructions\";s:0:\"\";s:8:\"required\";i:0;s:17:\"conditional_logic\";i:0;s:7:\"wrapper\";a:3:{s:5:\"width\";s:0:\"\";s:5:\"class\";s:0:\"\";s:2:\"id\";s:0:\"\";}s:13:\"default_value\";s:7:\"EXPLORE\";s:9:\"maxlength\";s:0:\"\";s:17:\"allow_in_bindings\";i:0;s:11:\"placeholder\";s:0:\"\";s:7:\"prepend\";s:0:\"\";s:6:\"append\";s:0:\"\";}', 'Tagline 2', 'tagline_2', 'publish', 'closed', 'closed', '', 'field_6990344e5f9a5', '', '', '2026-02-14 12:38:02', '2026-02-14 08:38:02', '', 39, 'http://localhost/chronevo/?post_type=acf-field&p=42', 1, 'acf-field', '', 0),
(43, 1, '2026-02-14 12:38:02', '2026-02-14 08:38:02', 'a:12:{s:10:\"aria-label\";s:0:\"\";s:4:\"type\";s:4:\"text\";s:12:\"instructions\";s:0:\"\";s:8:\"required\";i:0;s:17:\"conditional_logic\";i:0;s:7:\"wrapper\";a:3:{s:5:\"width\";s:0:\"\";s:5:\"class\";s:0:\"\";s:2:\"id\";s:0:\"\";}s:13:\"default_value\";s:6:\"DESIGN\";s:9:\"maxlength\";s:0:\"\";s:17:\"allow_in_bindings\";i:0;s:11:\"placeholder\";s:0:\"\";s:7:\"prepend\";s:0:\"\";s:6:\"append\";s:0:\"\";}', 'Tagline 3', 'tagline_3', 'publish', 'closed', 'closed', '', 'field_6990345b5f9a6', '', '', '2026-02-14 12:38:02', '2026-02-14 08:38:02', '', 39, 'http://localhost/chronevo/?post_type=acf-field&p=43', 2, 'acf-field', '', 0),
(44, 1, '2026-02-14 12:41:10', '2026-02-14 08:41:10', '', 'Home', '', 'inherit', 'closed', 'closed', '', '2-revision-v1', '', '', '2026-02-14 12:41:10', '2026-02-14 08:41:10', '', 2, 'http://localhost/chronevo/?p=44', 0, 'revision', '', 0),
(45, 1, '2026-02-14 12:42:24', '2026-02-14 08:42:24', '', 'Home', '', 'inherit', 'closed', 'closed', '', '2-revision-v1', '', '', '2026-02-14 12:42:24', '2026-02-14 08:42:24', '', 2, 'http://localhost/chronevo/?p=45', 0, 'revision', '', 0),
(46, 1, '2026-02-14 12:45:59', '2026-02-14 08:45:59', 'a:17:{s:10:\"aria-label\";s:0:\"\";s:4:\"type\";s:5:\"image\";s:12:\"instructions\";s:0:\"\";s:8:\"required\";i:0;s:17:\"conditional_logic\";i:0;s:7:\"wrapper\";a:3:{s:5:\"width\";s:0:\"\";s:5:\"class\";s:0:\"\";s:2:\"id\";s:0:\"\";}s:13:\"return_format\";s:3:\"url\";s:7:\"library\";s:3:\"all\";s:9:\"min_width\";s:0:\"\";s:10:\"min_height\";s:0:\"\";s:8:\"min_size\";s:0:\"\";s:9:\"max_width\";s:0:\"\";s:10:\"max_height\";s:0:\"\";s:8:\"max_size\";s:0:\"\";s:10:\"mime_types\";s:0:\"\";s:17:\"allow_in_bindings\";i:0;s:12:\"preview_size\";s:6:\"medium\";}', 'Photo Left', 'photo_left', 'publish', 'closed', 'closed', '', 'field_6990362066460', '', '', '2026-02-14 12:45:59', '2026-02-14 08:45:59', '', 39, 'http://localhost/chronevo/?post_type=acf-field&p=46', 3, 'acf-field', '', 0),
(47, 1, '2026-02-14 12:46:26', '2026-02-14 08:46:26', 'a:17:{s:10:\"aria-label\";s:0:\"\";s:4:\"type\";s:5:\"image\";s:12:\"instructions\";s:0:\"\";s:8:\"required\";i:0;s:17:\"conditional_logic\";i:0;s:7:\"wrapper\";a:3:{s:5:\"width\";s:0:\"\";s:5:\"class\";s:0:\"\";s:2:\"id\";s:0:\"\";}s:13:\"return_format\";s:3:\"url\";s:7:\"library\";s:3:\"all\";s:9:\"min_width\";s:0:\"\";s:10:\"min_height\";s:0:\"\";s:8:\"min_size\";s:0:\"\";s:9:\"max_width\";s:0:\"\";s:10:\"max_height\";s:0:\"\";s:8:\"max_size\";s:0:\"\";s:10:\"mime_types\";s:0:\"\";s:17:\"allow_in_bindings\";i:0;s:12:\"preview_size\";s:6:\"medium\";}', 'Photo Center', 'photo_center', 'publish', 'closed', 'closed', '', 'field_6990364ba3c4d', '', '', '2026-02-14 12:46:26', '2026-02-14 08:46:26', '', 39, 'http://localhost/chronevo/?post_type=acf-field&p=47', 4, 'acf-field', '', 0),
(48, 1, '2026-02-14 12:46:26', '2026-02-14 08:46:26', 'a:17:{s:10:\"aria-label\";s:0:\"\";s:4:\"type\";s:5:\"image\";s:12:\"instructions\";s:0:\"\";s:8:\"required\";i:0;s:17:\"conditional_logic\";i:0;s:7:\"wrapper\";a:3:{s:5:\"width\";s:0:\"\";s:5:\"class\";s:0:\"\";s:2:\"id\";s:0:\"\";}s:13:\"return_format\";s:3:\"url\";s:7:\"library\";s:3:\"all\";s:9:\"min_width\";s:0:\"\";s:10:\"min_height\";s:0:\"\";s:8:\"min_size\";s:0:\"\";s:9:\"max_width\";s:0:\"\";s:10:\"max_height\";s:0:\"\";s:8:\"max_size\";s:0:\"\";s:10:\"mime_types\";s:0:\"\";s:17:\"allow_in_bindings\";i:0;s:12:\"preview_size\";s:6:\"medium\";}', 'Photo Right', 'photo_right', 'publish', 'closed', 'closed', '', 'field_69903657a3c4e', '', '', '2026-02-14 12:46:26', '2026-02-14 08:46:26', '', 39, 'http://localhost/chronevo/?post_type=acf-field&p=48', 5, 'acf-field', '', 0),
(49, 1, '2026-02-14 12:55:14', '2026-02-14 08:55:14', '', 'sYweukcLYAl9OpeP', '', 'inherit', '', 'closed', '', 'syweukclyal9opep', '', '', '2026-02-14 12:55:14', '2026-02-14 08:55:14', '', 2, 'http://localhost/chronevo/media/sYweukcLYAl9OpeP.jpg', 0, 'attachment', 'image/jpeg', 0),
(50, 1, '2026-02-14 12:55:23', '2026-02-14 08:55:23', '', 'Home', '', 'inherit', 'closed', 'closed', '', '2-revision-v1', '', '', '2026-02-14 12:55:23', '2026-02-14 08:55:23', '', 2, 'http://localhost/chronevo/?p=50', 0, 'revision', '', 0),
(51, 1, '2026-02-14 12:57:33', '2026-02-14 08:57:33', '', 'txXzaCsSfKlEy1cV', '', 'inherit', '', 'closed', '', 'txxzacssfkley1cv', '', '', '2026-02-14 12:57:33', '2026-02-14 08:57:33', '', 2, 'http://localhost/chronevo/media/txXzaCsSfKlEy1cV.jpg', 0, 'attachment', 'image/jpeg', 0),
(52, 1, '2026-02-14 12:57:38', '2026-02-14 08:57:38', '', 'Home', '', 'inherit', 'closed', 'closed', '', '2-revision-v1', '', '', '2026-02-14 12:57:38', '2026-02-14 08:57:38', '', 2, 'http://localhost/chronevo/?p=52', 0, 'revision', '', 0),
(53, 1, '2026-02-14 12:58:41', '2026-02-14 08:58:41', '', '80mDuJOzOa19YQnb', '', 'inherit', '', 'closed', '', '80mdujozoa19yqnb', '', '', '2026-02-14 12:58:41', '2026-02-14 08:58:41', '', 2, 'http://localhost/chronevo/media/80mDuJOzOa19YQnb.jpg', 0, 'attachment', 'image/jpeg', 0),
(54, 1, '2026-02-14 12:58:46', '2026-02-14 08:58:46', '', 'Home', '', 'inherit', 'closed', 'closed', '', '2-revision-v1', '', '', '2026-02-14 12:58:46', '2026-02-14 08:58:46', '', 2, 'http://localhost/chronevo/?p=54', 0, 'revision', '', 0),
(55, 1, '2026-02-14 13:00:59', '2026-02-14 09:00:59', '', 'Visuals & Storytelling', '', 'publish', 'closed', 'closed', '', 'visuals-storytelling', '', '', '2026-02-14 13:00:59', '2026-02-14 09:00:59', '', 0, 'http://localhost/chronevo/?p=55', 0, 'post', '', 0),
(56, 1, '2026-02-14 13:00:59', '2026-02-14 09:00:59', '', 'Visuals & Storytelling', '', 'inherit', 'closed', 'closed', '', '55-revision-v1', '', '', '2026-02-14 13:00:59', '2026-02-14 09:00:59', '', 55, 'http://localhost/chronevo/?p=56', 0, 'revision', '', 0),
(57, 1, '2026-02-14 13:01:11', '2026-02-14 09:01:11', '', 'Art & Expression', '', 'publish', 'closed', 'closed', '', 'art-expression', '', '', '2026-02-14 13:01:11', '2026-02-14 09:01:11', '', 0, 'http://localhost/chronevo/?p=57', 0, 'post', '', 0),
(58, 1, '2026-02-14 13:01:11', '2026-02-14 09:01:11', '', 'Art & Expression', '', 'inherit', 'closed', 'closed', '', '57-revision-v1', '', '', '2026-02-14 13:01:11', '2026-02-14 09:01:11', '', 57, 'http://localhost/chronevo/?p=58', 0, 'revision', '', 0),
(59, 1, '2026-02-14 13:01:21', '2026-02-14 09:01:21', '', 'Imagery & Meaning', '', 'publish', 'closed', 'closed', '', 'imagery-meaning', '', '', '2026-02-14 13:01:21', '2026-02-14 09:01:21', '', 0, 'http://localhost/chronevo/?p=59', 0, 'post', '', 0),
(60, 1, '2026-02-14 13:01:21', '2026-02-14 09:01:21', '', 'Imagery & Meaning', '', 'inherit', 'closed', 'closed', '', '59-revision-v1', '', '', '2026-02-14 13:01:21', '2026-02-14 09:01:21', '', 59, 'http://localhost/chronevo/?p=60', 0, 'revision', '', 0),
(61, 1, '2026-02-14 13:01:29', '2026-02-14 09:01:29', '', 'Design & Dialogue', '', 'publish', 'closed', 'closed', '', 'design-dialogue', '', '', '2026-02-14 13:05:12', '2026-02-14 09:05:12', '', 0, 'http://localhost/chronevo/?p=61', 0, 'post', '', 0),
(62, 1, '2026-02-14 13:01:29', '2026-02-14 09:01:29', '', 'Design & Dialogue', '', 'inherit', 'closed', 'closed', '', '61-revision-v1', '', '', '2026-02-14 13:01:29', '2026-02-14 09:01:29', '', 61, 'http://localhost/chronevo/?p=62', 0, 'revision', '', 0),
(63, 1, '2026-02-14 13:01:37', '2026-02-14 09:01:37', '', 'Picture & Prose', '', 'publish', 'closed', 'closed', '', 'picture-prose', '', '', '2026-02-14 13:01:37', '2026-02-14 09:01:37', '', 0, 'http://localhost/chronevo/?p=63', 0, 'post', '', 0),
(64, 1, '2026-02-14 13:01:37', '2026-02-14 09:01:37', '', 'Picture & Prose', '', 'inherit', 'closed', 'closed', '', '63-revision-v1', '', '', '2026-02-14 13:01:37', '2026-02-14 09:01:37', '', 63, 'http://localhost/chronevo/?p=64', 0, 'revision', '', 0),
(65, 1, '2026-02-14 13:05:02', '2026-02-14 09:05:02', '', 'Design & Dialogue 2', '', 'inherit', 'closed', 'closed', '', '61-revision-v1', '', '', '2026-02-14 13:05:02', '2026-02-14 09:05:02', '', 61, 'http://localhost/chronevo/?p=65', 0, 'revision', '', 0),
(66, 1, '2026-02-14 13:05:12', '2026-02-14 09:05:12', '', 'Design & Dialogue', '', 'inherit', 'closed', 'closed', '', '61-revision-v1', '', '', '2026-02-14 13:05:12', '2026-02-14 09:05:12', '', 61, 'http://localhost/chronevo/?p=66', 0, 'revision', '', 0),
(67, 1, '2026-02-14 13:32:27', '2026-02-14 09:32:27', 'a:9:{s:8:\"location\";a:1:{i:0;a:1:{i:0;a:3:{s:5:\"param\";s:4:\"page\";s:8:\"operator\";s:2:\"==\";s:5:\"value\";s:1:\"8\";}}}s:8:\"position\";s:6:\"normal\";s:5:\"style\";s:7:\"default\";s:15:\"label_placement\";s:3:\"top\";s:21:\"instruction_placement\";s:5:\"label\";s:14:\"hide_on_screen\";s:0:\"\";s:11:\"description\";s:0:\"\";s:12:\"show_in_rest\";i:0;s:13:\"display_title\";s:0:\"\";}', 'About Fields', 'about-fields', 'publish', 'closed', 'closed', '', 'group_699040ec4e77c', '', '', '2026-02-14 13:53:40', '2026-02-14 09:53:40', '', 0, 'http://localhost/chronevo/?post_type=acf-field-group&#038;p=67', 0, 'acf-field-group', '', 0),
(68, 1, '2026-02-14 13:32:27', '2026-02-14 09:32:27', 'a:12:{s:10:\"aria-label\";s:0:\"\";s:4:\"type\";s:4:\"text\";s:12:\"instructions\";s:0:\"\";s:8:\"required\";i:0;s:17:\"conditional_logic\";i:0;s:7:\"wrapper\";a:3:{s:5:\"width\";s:0:\"\";s:5:\"class\";s:0:\"\";s:2:\"id\";s:0:\"\";}s:13:\"default_value\";s:0:\"\";s:9:\"maxlength\";s:0:\"\";s:17:\"allow_in_bindings\";i:0;s:11:\"placeholder\";s:0:\"\";s:7:\"prepend\";s:0:\"\";s:6:\"append\";s:0:\"\";}', 'Tagline 1', 'tagline_1', 'publish', 'closed', 'closed', '', 'field_699040ecb33d4', '', '', '2026-02-14 13:53:40', '2026-02-14 09:53:40', '', 67, 'http://localhost/chronevo/?post_type=acf-field&#038;p=68', 1, 'acf-field', '', 0),
(69, 1, '2026-02-14 13:32:27', '2026-02-14 09:32:27', 'a:12:{s:10:\"aria-label\";s:0:\"\";s:4:\"type\";s:4:\"text\";s:12:\"instructions\";s:0:\"\";s:8:\"required\";i:0;s:17:\"conditional_logic\";i:0;s:7:\"wrapper\";a:3:{s:5:\"width\";s:0:\"\";s:5:\"class\";s:0:\"\";s:2:\"id\";s:0:\"\";}s:13:\"default_value\";s:0:\"\";s:9:\"maxlength\";s:0:\"\";s:17:\"allow_in_bindings\";i:0;s:11:\"placeholder\";s:0:\"\";s:7:\"prepend\";s:0:\"\";s:6:\"append\";s:0:\"\";}', 'Tagline 2', 'tagline_2', 'publish', 'closed', 'closed', '', 'field_69904117b33d5', '', '', '2026-02-14 13:53:40', '2026-02-14 09:53:40', '', 67, 'http://localhost/chronevo/?post_type=acf-field&#038;p=69', 2, 'acf-field', '', 0),
(70, 1, '2026-02-14 13:32:27', '2026-02-14 09:32:27', 'a:12:{s:10:\"aria-label\";s:0:\"\";s:4:\"type\";s:4:\"text\";s:12:\"instructions\";s:0:\"\";s:8:\"required\";i:0;s:17:\"conditional_logic\";i:0;s:7:\"wrapper\";a:3:{s:5:\"width\";s:0:\"\";s:5:\"class\";s:0:\"\";s:2:\"id\";s:0:\"\";}s:13:\"default_value\";s:0:\"\";s:9:\"maxlength\";s:0:\"\";s:17:\"allow_in_bindings\";i:0;s:11:\"placeholder\";s:0:\"\";s:7:\"prepend\";s:0:\"\";s:6:\"append\";s:0:\"\";}', 'Tagline 3', 'tagline_3', 'publish', 'closed', 'closed', '', 'field_69904122b33d6', '', '', '2026-02-14 13:53:40', '2026-02-14 09:53:40', '', 67, 'http://localhost/chronevo/?post_type=acf-field&#038;p=70', 3, 'acf-field', '', 0),
(71, 1, '2026-02-14 13:33:56', '2026-02-14 09:33:56', 'a:12:{s:10:\"aria-label\";s:0:\"\";s:4:\"type\";s:4:\"text\";s:12:\"instructions\";s:0:\"\";s:8:\"required\";i:0;s:17:\"conditional_logic\";i:0;s:7:\"wrapper\";a:3:{s:5:\"width\";s:0:\"\";s:5:\"class\";s:0:\"\";s:2:\"id\";s:0:\"\";}s:13:\"default_value\";s:0:\"\";s:9:\"maxlength\";s:0:\"\";s:17:\"allow_in_bindings\";i:0;s:11:\"placeholder\";s:0:\"\";s:7:\"prepend\";s:0:\"\";s:6:\"append\";s:0:\"\";}', 'Youtube', 'youtube', 'publish', 'closed', 'closed', '', 'field_69904179203e6', '', '', '2026-02-14 13:53:40', '2026-02-14 09:53:40', '', 67, 'http://localhost/chronevo/?post_type=acf-field&#038;p=71', 4, 'acf-field', '', 0),
(72, 1, '2026-02-14 13:36:03', '2026-02-14 09:36:03', 'Chronevo is built on restraint, intention, and time. We believe true influence is never forced, it is composed. We work quietly, shaping culture with precision and care. Every decision is measured. Every detail has a purpose. We do not follow trends. We create work that endures.\r\n\r\nChronevo exists for brands that value permanence over excess, clarity over noise, and presence over performance. It\'s not what is seen first, it is what remains.', 'About', '', 'inherit', 'closed', 'closed', '', '8-revision-v1', '', '', '2026-02-14 13:36:03', '2026-02-14 09:36:03', '', 8, 'http://localhost/chronevo/?p=72', 0, 'revision', '', 0),
(73, 1, '2026-02-14 13:37:02', '2026-02-14 09:37:02', 'a:17:{s:10:\"aria-label\";s:0:\"\";s:4:\"type\";s:5:\"image\";s:12:\"instructions\";s:0:\"\";s:8:\"required\";i:0;s:17:\"conditional_logic\";i:0;s:7:\"wrapper\";a:3:{s:5:\"width\";s:0:\"\";s:5:\"class\";s:0:\"\";s:2:\"id\";s:0:\"\";}s:13:\"return_format\";s:3:\"url\";s:7:\"library\";s:3:\"all\";s:9:\"min_width\";s:0:\"\";s:10:\"min_height\";s:0:\"\";s:8:\"min_size\";s:0:\"\";s:9:\"max_width\";s:0:\"\";s:10:\"max_height\";s:0:\"\";s:8:\"max_size\";s:0:\"\";s:10:\"mime_types\";s:0:\"\";s:17:\"allow_in_bindings\";i:0;s:12:\"preview_size\";s:6:\"medium\";}', 'Image Back', 'image_back', 'publish', 'closed', 'closed', '', 'field_6990421e553e4', '', '', '2026-02-14 13:53:40', '2026-02-14 09:53:40', '', 67, 'http://localhost/chronevo/?post_type=acf-field&#038;p=73', 5, 'acf-field', '', 0),
(74, 1, '2026-02-14 13:37:02', '2026-02-14 09:37:02', 'a:17:{s:10:\"aria-label\";s:0:\"\";s:4:\"type\";s:5:\"image\";s:12:\"instructions\";s:0:\"\";s:8:\"required\";i:0;s:17:\"conditional_logic\";i:0;s:7:\"wrapper\";a:3:{s:5:\"width\";s:0:\"\";s:5:\"class\";s:0:\"\";s:2:\"id\";s:0:\"\";}s:13:\"return_format\";s:3:\"url\";s:7:\"library\";s:3:\"all\";s:9:\"min_width\";s:0:\"\";s:10:\"min_height\";s:0:\"\";s:8:\"min_size\";s:0:\"\";s:9:\"max_width\";s:0:\"\";s:10:\"max_height\";s:0:\"\";s:8:\"max_size\";s:0:\"\";s:10:\"mime_types\";s:0:\"\";s:17:\"allow_in_bindings\";i:0;s:12:\"preview_size\";s:6:\"medium\";}', 'Image Front', 'image_front', 'publish', 'closed', 'closed', '', 'field_6990422f553e5', '', '', '2026-02-14 13:53:40', '2026-02-14 09:53:40', '', 67, 'http://localhost/chronevo/?post_type=acf-field&#038;p=74', 6, 'acf-field', '', 0),
(75, 1, '2026-02-14 13:37:13', '2026-02-14 09:37:13', '', 'iqRTJLOsqF19EOA5', '', 'inherit', '', 'closed', '', 'iqrtjlosqf19eoa5', '', '', '2026-02-14 13:37:13', '2026-02-14 09:37:13', '', 8, 'http://localhost/chronevo/media/iqRTJLOsqF19EOA5.jpg', 0, 'attachment', 'image/jpeg', 0),
(76, 1, '2026-02-14 13:37:18', '2026-02-14 09:37:18', 'Chronevo is built on restraint, intention, and time. We believe true influence is never forced, it is composed. We work quietly, shaping culture with precision and care. Every decision is measured. Every detail has a purpose. We do not follow trends. We create work that endures.\r\n\r\nChronevo exists for brands that value permanence over excess, clarity over noise, and presence over performance. It\'s not what is seen first, it is what remains.', 'About', '', 'inherit', 'closed', 'closed', '', '8-revision-v1', '', '', '2026-02-14 13:37:18', '2026-02-14 09:37:18', '', 8, 'http://localhost/chronevo/?p=76', 0, 'revision', '', 0),
(77, 1, '2026-02-14 13:37:29', '2026-02-14 09:37:29', '', '9yjjcywBi6uBCAXc', '', 'inherit', '', 'closed', '', '9yjjcywbi6ubcaxc', '', '', '2026-02-14 13:37:29', '2026-02-14 09:37:29', '', 8, 'http://localhost/chronevo/media/9yjjcywBi6uBCAXc.jpg', 0, 'attachment', 'image/jpeg', 0),
(78, 1, '2026-02-14 13:37:34', '2026-02-14 09:37:34', 'Chronevo is built on restraint, intention, and time. We believe true influence is never forced, it is composed. We work quietly, shaping culture with precision and care. Every decision is measured. Every detail has a purpose. We do not follow trends. We create work that endures.\r\n\r\nChronevo exists for brands that value permanence over excess, clarity over noise, and presence over performance. It\'s not what is seen first, it is what remains.', 'About', '', 'inherit', 'closed', 'closed', '', '8-revision-v1', '', '', '2026-02-14 13:37:34', '2026-02-14 09:37:34', '', 8, 'http://localhost/chronevo/?p=78', 0, 'revision', '', 0),
(79, 1, '2026-02-14 13:41:53', '2026-02-14 09:41:53', 'Chronevo is built on restraint, intention, and time. We believe true influence is never forced, it is composed. We work quietly, shaping culture with precision and care. Every decision is measured. Every detail has a purpose. We do not follow trends. We create work that endures.\r\n\r\nChronevo exists for brands that value permanence over excess, clarity over noise, and presence over performance. It\'s not what is seen first, it is what remains.', 'About Us', '', 'inherit', 'closed', 'closed', '', '8-revision-v1', '', '', '2026-02-14 13:41:53', '2026-02-14 09:41:53', '', 8, 'http://localhost/chronevo/?p=79', 0, 'revision', '', 0),
(80, 1, '2026-02-14 13:51:15', '2026-02-14 09:51:15', 'Chronevo is built on restraint, intention, and time. We believe true influence is never forced, it is composed. We work quietly, shaping culture with precision and care. Every decision is measured. Every detail has a purpose. We do not follow trends. We create work that endures. 2\r\n\r\nChronevo exists for brands that value permanence over excess, clarity over noise, and presence over performance. It\'s not what is seen first, it is what remains.', 'About Us', '', 'inherit', 'closed', 'closed', '', '8-revision-v1', '', '', '2026-02-14 13:51:15', '2026-02-14 09:51:15', '', 8, 'http://localhost/chronevo/?p=80', 0, 'revision', '', 0),
(81, 1, '2026-02-14 13:51:26', '2026-02-14 09:51:26', 'Chronevo is built on restraint, intention, and time. We believe true influence is never forced, it is composed. We work quietly, shaping culture with precision and care. Every decision is measured. Every detail has a purpose. We do not follow trends. We create work that endures.\r\n\r\nChronevo exists for brands that value permanence over excess, clarity over noise, and presence over performance. It\'s not what is seen first, it is what remains.', 'About Us', '', 'inherit', 'closed', 'closed', '', '8-revision-v1', '', '', '2026-02-14 13:51:26', '2026-02-14 09:51:26', '', 8, 'http://localhost/chronevo/?p=81', 0, 'revision', '', 0),
(82, 1, '2026-02-14 13:53:40', '2026-02-14 09:53:40', 'a:12:{s:10:\"aria-label\";s:0:\"\";s:4:\"type\";s:4:\"text\";s:12:\"instructions\";s:0:\"\";s:8:\"required\";i:0;s:17:\"conditional_logic\";i:0;s:7:\"wrapper\";a:3:{s:5:\"width\";s:0:\"\";s:5:\"class\";s:0:\"\";s:2:\"id\";s:0:\"\";}s:13:\"default_value\";s:0:\"\";s:9:\"maxlength\";s:0:\"\";s:17:\"allow_in_bindings\";i:0;s:11:\"placeholder\";s:0:\"\";s:7:\"prepend\";s:0:\"\";s:6:\"append\";s:0:\"\";}', 'Tagline', 'tagline', 'publish', 'closed', 'closed', '', 'field_6990461030391', '', '', '2026-02-14 13:53:40', '2026-02-14 09:53:40', '', 67, 'http://localhost/chronevo/?post_type=acf-field&p=82', 0, 'acf-field', '', 0),
(83, 1, '2026-02-14 13:53:49', '2026-02-14 09:53:49', 'Chronevo is built on restraint, intention, and time. We believe true influence is never forced, it is composed. We work quietly, shaping culture with precision and care. Every decision is measured. Every detail has a purpose. We do not follow trends. We create work that endures.\r\n\r\nChronevo exists for brands that value permanence over excess, clarity over noise, and presence over performance. It\'s not what is seen first, it is what remains.', 'About Us', '', 'inherit', 'closed', 'closed', '', '8-revision-v1', '', '', '2026-02-14 13:53:49', '2026-02-14 09:53:49', '', 8, 'http://localhost/chronevo/?p=83', 0, 'revision', '', 0),
(84, 1, '2026-02-14 14:20:21', '2026-02-14 10:20:21', 'a:9:{s:8:\"location\";a:1:{i:0;a:1:{i:0;a:3:{s:5:\"param\";s:4:\"page\";s:8:\"operator\";s:2:\"==\";s:5:\"value\";s:1:\"8\";}}}s:8:\"position\";s:6:\"normal\";s:5:\"style\";s:7:\"default\";s:15:\"label_placement\";s:3:\"top\";s:21:\"instruction_placement\";s:5:\"label\";s:14:\"hide_on_screen\";s:0:\"\";s:11:\"description\";s:0:\"\";s:12:\"show_in_rest\";i:0;s:13:\"display_title\";s:0:\"\";}', 'Award Fields', 'award-fields', 'publish', 'closed', 'closed', '', 'group_69904c05c1ea2', '', '', '2026-02-14 14:33:41', '2026-02-14 10:33:41', '', 0, 'http://localhost/chronevo/?post_type=acf-field-group&#038;p=84', 0, 'acf-field-group', '', 0),
(85, 1, '2026-02-14 14:20:21', '2026-02-14 10:20:21', 'a:12:{s:10:\"aria-label\";s:0:\"\";s:4:\"type\";s:4:\"text\";s:12:\"instructions\";s:0:\"\";s:8:\"required\";i:0;s:17:\"conditional_logic\";i:0;s:7:\"wrapper\";a:3:{s:5:\"width\";s:0:\"\";s:5:\"class\";s:0:\"\";s:2:\"id\";s:0:\"\";}s:13:\"default_value\";s:0:\"\";s:9:\"maxlength\";s:0:\"\";s:17:\"allow_in_bindings\";i:0;s:11:\"placeholder\";s:0:\"\";s:7:\"prepend\";s:0:\"\";s:6:\"append\";s:0:\"\";}', 'Tagline', 'award_tagline', 'publish', 'closed', 'closed', '', 'field_69904c4d99798', '', '', '2026-02-14 14:31:07', '2026-02-14 10:31:07', '', 84, 'http://localhost/chronevo/?post_type=acf-field&#038;p=85', 1, 'acf-field', '', 0),
(86, 1, '2026-02-14 14:20:21', '2026-02-14 10:20:21', 'a:12:{s:10:\"aria-label\";s:0:\"\";s:4:\"type\";s:4:\"text\";s:12:\"instructions\";s:0:\"\";s:8:\"required\";i:0;s:17:\"conditional_logic\";i:0;s:7:\"wrapper\";a:3:{s:5:\"width\";s:0:\"\";s:5:\"class\";s:0:\"\";s:2:\"id\";s:0:\"\";}s:13:\"default_value\";s:0:\"\";s:9:\"maxlength\";s:0:\"\";s:17:\"allow_in_bindings\";i:0;s:11:\"placeholder\";s:0:\"\";s:7:\"prepend\";s:0:\"\";s:6:\"append\";s:0:\"\";}', 'Title', 'title', 'publish', 'closed', 'closed', '', 'field_69904c0599795', '', '', '2026-02-14 14:31:07', '2026-02-14 10:31:07', '', 84, 'http://localhost/chronevo/?post_type=acf-field&#038;p=86', 2, 'acf-field', '', 0),
(87, 1, '2026-02-14 14:20:21', '2026-02-14 10:20:21', 'a:12:{s:10:\"aria-label\";s:0:\"\";s:4:\"type\";s:8:\"textarea\";s:12:\"instructions\";s:0:\"\";s:8:\"required\";i:0;s:17:\"conditional_logic\";i:0;s:7:\"wrapper\";a:3:{s:5:\"width\";s:0:\"\";s:5:\"class\";s:0:\"\";s:2:\"id\";s:0:\"\";}s:13:\"default_value\";s:0:\"\";s:9:\"maxlength\";s:0:\"\";s:17:\"allow_in_bindings\";i:0;s:4:\"rows\";s:0:\"\";s:11:\"placeholder\";s:0:\"\";s:9:\"new_lines\";s:0:\"\";}', 'Description', 'description', 'publish', 'closed', 'closed', '', 'field_69904c2899796', '', '', '2026-02-14 14:31:07', '2026-02-14 10:31:07', '', 84, 'http://localhost/chronevo/?post_type=acf-field&#038;p=87', 3, 'acf-field', '', 0),
(88, 1, '2026-02-14 14:20:21', '2026-02-14 10:20:21', 'a:17:{s:10:\"aria-label\";s:0:\"\";s:4:\"type\";s:5:\"image\";s:12:\"instructions\";s:0:\"\";s:8:\"required\";i:0;s:17:\"conditional_logic\";i:0;s:7:\"wrapper\";a:3:{s:5:\"width\";s:0:\"\";s:5:\"class\";s:0:\"\";s:2:\"id\";s:0:\"\";}s:13:\"return_format\";s:3:\"url\";s:7:\"library\";s:3:\"all\";s:9:\"min_width\";s:0:\"\";s:10:\"min_height\";s:0:\"\";s:8:\"min_size\";s:0:\"\";s:9:\"max_width\";s:0:\"\";s:10:\"max_height\";s:0:\"\";s:8:\"max_size\";s:0:\"\";s:10:\"mime_types\";s:0:\"\";s:17:\"allow_in_bindings\";i:0;s:12:\"preview_size\";s:6:\"medium\";}', 'Image', 'image', 'publish', 'closed', 'closed', '', 'field_69904c4099797', '', '', '2026-02-14 14:31:07', '2026-02-14 10:31:07', '', 84, 'http://localhost/chronevo/?post_type=acf-field&#038;p=88', 4, 'acf-field', '', 0),
(89, 1, '2026-02-14 14:21:28', '2026-02-14 10:21:28', 'Chronevo is built on restraint, intention, and time. We believe true influence is never forced, it is composed. We work quietly, shaping culture with precision and care. Every decision is measured. Every detail has a purpose. We do not follow trends. We create work that endures.\r\n\r\nChronevo exists for brands that value permanence over excess, clarity over noise, and presence over performance. It\'s not what is seen first, it is what remains.', 'About Us', '', 'inherit', 'closed', 'closed', '', '8-revision-v1', '', '', '2026-02-14 14:21:28', '2026-02-14 10:21:28', '', 8, 'http://localhost/chronevo/?p=89', 0, 'revision', '', 0),
(90, 1, '2026-02-14 14:22:37', '2026-02-14 10:22:37', 'Chronevo is built on restraint, intention, and time. We believe true influence is never forced, it is composed. We work quietly, shaping culture with precision and care. Every decision is measured. Every detail has a purpose. We do not follow trends. We create work that endures.\r\n\r\nChronevo exists for brands that value permanence over excess, clarity over noise, and presence over performance. It\'s not what is seen first, it is what remains.', 'About Us', '', 'inherit', 'closed', 'closed', '', '8-revision-v1', '', '', '2026-02-14 14:22:37', '2026-02-14 10:22:37', '', 8, 'http://localhost/chronevo/?p=90', 0, 'revision', '', 0),
(91, 1, '2026-02-14 14:29:33', '2026-02-14 10:29:33', 'Chronevo is built on restraint, intention, and time. We believe true influence is never forced, it is composed. We work quietly, shaping culture with precision and care. Every decision is measured. Every detail has a purpose. We do not follow trends. We create work that endures.\r\n\r\nChronevo exists for brands that value permanence over excess, clarity over noise, and presence over performance. It\'s not what is seen first, it is what remains.', 'About Us', '', 'inherit', 'closed', 'closed', '', '8-revision-v1', '', '', '2026-02-14 14:29:33', '2026-02-14 10:29:33', '', 8, 'http://localhost/chronevo/?p=91', 0, 'revision', '', 0),
(92, 1, '2026-02-14 14:30:17', '2026-02-14 10:30:17', 'Chronevo is built on restraint, intention, and time. We believe true influence is never forced, it is composed. We work quietly, shaping culture with precision and care. Every decision is measured. Every detail has a purpose. We do not follow trends. We create work that endures.\r\n\r\nChronevo exists for brands that value permanence over excess, clarity over noise, and presence over performance. It\'s not what is seen first, it is what remains.', 'About Us', '', 'inherit', 'closed', 'closed', '', '8-revision-v1', '', '', '2026-02-14 14:30:17', '2026-02-14 10:30:17', '', 8, 'http://localhost/chronevo/?p=92', 0, 'revision', '', 0),
(93, 1, '2026-02-14 14:30:59', '2026-02-14 10:30:59', 'a:12:{s:10:\"aria-label\";s:0:\"\";s:4:\"type\";s:10:\"true_false\";s:12:\"instructions\";s:0:\"\";s:8:\"required\";i:0;s:17:\"conditional_logic\";i:0;s:7:\"wrapper\";a:3:{s:5:\"width\";s:0:\"\";s:5:\"class\";s:0:\"\";s:2:\"id\";s:0:\"\";}s:7:\"message\";s:0:\"\";s:13:\"default_value\";i:1;s:17:\"allow_in_bindings\";i:0;s:2:\"ui\";i:0;s:10:\"ui_on_text\";s:0:\"\";s:11:\"ui_off_text\";s:0:\"\";}', 'Show Block', 'show', 'publish', 'closed', 'closed', '', 'field_69904ebff0306', '', '', '2026-02-14 14:33:41', '2026-02-14 10:33:41', '', 84, 'http://localhost/chronevo/?post_type=acf-field&#038;p=93', 0, 'acf-field', '', 0),
(94, 1, '2026-02-14 14:36:12', '2026-02-14 10:36:12', 'Chronevo is built on restraint, intention, and time. We believe true influence is never forced, it is composed. We work quietly, shaping culture with precision and care. Every decision is measured. Every detail has a purpose. We do not follow trends. We create work that endures.\r\n\r\nChronevo exists for brands that value permanence over excess, clarity over noise, and presence over performance. It\'s not what is seen first, it is what remains.', 'About Us', '', 'inherit', 'closed', 'closed', '', '8-revision-v1', '', '', '2026-02-14 14:36:12', '2026-02-14 10:36:12', '', 8, 'http://localhost/chronevo/?p=94', 0, 'revision', '', 0),
(95, 1, '2026-02-14 14:36:27', '2026-02-14 10:36:27', 'Chronevo is built on restraint, intention, and time. We believe true influence is never forced, it is composed. We work quietly, shaping culture with precision and care. Every decision is measured. Every detail has a purpose. We do not follow trends. We create work that endures.\r\n\r\nChronevo exists for brands that value permanence over excess, clarity over noise, and presence over performance. It\'s not what is seen first, it is what remains.', 'About Us', '', 'inherit', 'closed', 'closed', '', '8-revision-v1', '', '', '2026-02-14 14:36:27', '2026-02-14 10:36:27', '', 8, 'http://localhost/chronevo/?p=95', 0, 'revision', '', 0),
(96, 1, '2026-02-14 14:36:37', '2026-02-14 10:36:37', 'Chronevo is built on restraint, intention, and time. We believe true influence is never forced, it is composed. We work quietly, shaping culture with precision and care. Every decision is measured. Every detail has a purpose. We do not follow trends. We create work that endures.\r\n\r\nChronevo exists for brands that value permanence over excess, clarity over noise, and presence over performance. It\'s not what is seen first, it is what remains.', 'About Us', '', 'inherit', 'closed', 'closed', '', '8-revision-v1', '', '', '2026-02-14 14:36:37', '2026-02-14 10:36:37', '', 8, 'http://localhost/chronevo/?p=96', 0, 'revision', '', 0),
(97, 1, '2026-02-14 14:41:06', '2026-02-14 10:41:06', 'a:9:{s:8:\"location\";a:1:{i:0;a:1:{i:0;a:3:{s:5:\"param\";s:13:\"post_category\";s:8:\"operator\";s:2:\"==\";s:5:\"value\";s:18:\"category:portfolio\";}}}s:8:\"position\";s:6:\"normal\";s:5:\"style\";s:7:\"default\";s:15:\"label_placement\";s:3:\"top\";s:21:\"instruction_placement\";s:5:\"label\";s:14:\"hide_on_screen\";s:0:\"\";s:11:\"description\";s:0:\"\";s:12:\"show_in_rest\";i:0;s:13:\"display_title\";s:0:\"\";}', 'Portfolio Fields', 'portfolio-fields', 'publish', 'closed', 'closed', '', 'group_69905129410ab', '', '', '2026-02-14 14:41:14', '2026-02-14 10:41:14', '', 0, 'http://localhost/chronevo/?post_type=acf-field-group&#038;p=97', 0, 'acf-field-group', '', 0),
(98, 1, '2026-02-14 14:41:06', '2026-02-14 10:41:06', 'a:12:{s:10:\"aria-label\";s:0:\"\";s:4:\"type\";s:4:\"text\";s:12:\"instructions\";s:0:\"\";s:8:\"required\";i:0;s:17:\"conditional_logic\";i:0;s:7:\"wrapper\";a:3:{s:5:\"width\";s:0:\"\";s:5:\"class\";s:0:\"\";s:2:\"id\";s:0:\"\";}s:13:\"default_value\";s:0:\"\";s:9:\"maxlength\";s:0:\"\";s:17:\"allow_in_bindings\";i:0;s:11:\"placeholder\";s:0:\"\";s:7:\"prepend\";s:0:\"\";s:6:\"append\";s:0:\"\";}', 'Portfolio Tagline', 'portfolio_tagline', 'publish', 'closed', 'closed', '', 'field_69905129bd3f8', '', '', '2026-02-14 14:41:06', '2026-02-14 10:41:06', '', 97, 'http://localhost/chronevo/?post_type=acf-field&p=98', 0, 'acf-field', '', 0),
(99, 1, '2026-02-14 14:47:58', '2026-02-14 10:47:58', '', 'Editorial', '', 'publish', 'closed', 'closed', '', 'editorial', '', '', '2026-02-14 14:48:25', '2026-02-14 10:48:25', '', 0, 'http://localhost/chronevo/?p=99', 0, 'post', '', 0),
(100, 1, '2026-02-14 14:49:24', '2026-02-14 10:49:24', '', 'Digital Design', '', 'publish', 'closed', 'closed', '', 'digital-design', '', '', '2026-02-14 14:49:24', '2026-02-14 10:49:24', '', 0, 'http://localhost/chronevo/?p=100', 0, 'post', '', 0),
(101, 1, '2026-02-14 14:49:48', '0000-00-00 00:00:00', '', 'Auto Draft', '', 'auto-draft', 'closed', 'closed', '', '', '', '', '2026-02-14 14:49:48', '0000-00-00 00:00:00', '', 0, 'http://localhost/chronevo/?p=101', 0, 'post', '', 0);
INSERT INTO `wp_posts` (`ID`, `post_author`, `post_date`, `post_date_gmt`, `post_content`, `post_title`, `post_excerpt`, `post_status`, `comment_status`, `ping_status`, `post_password`, `post_name`, `to_ping`, `pinged`, `post_modified`, `post_modified_gmt`, `post_content_filtered`, `post_parent`, `guid`, `menu_order`, `post_type`, `post_mime_type`, `comment_count`) VALUES
(102, 1, '2026-02-14 14:50:13', '2026-02-14 10:50:13', '', 'Advertising', '', 'publish', 'closed', 'closed', '', 'advertising', '', '', '2026-02-14 14:50:13', '2026-02-14 10:50:13', '', 0, 'http://localhost/chronevo/?p=102', 0, 'post', '', 0),
(103, 1, '2026-02-14 14:50:45', '2026-02-14 10:50:45', '', 'Photography', '', 'publish', 'closed', 'closed', '', 'photography', '', '', '2026-02-14 14:50:45', '2026-02-14 10:50:45', '', 0, 'http://localhost/chronevo/?p=103', 0, 'post', '', 0),
(104, 1, '2026-02-14 14:51:16', '2026-02-14 10:51:16', '', 'Consulting', '', 'publish', 'closed', 'closed', '', 'consulting', '', '', '2026-02-14 14:51:16', '2026-02-14 10:51:16', '', 0, 'http://localhost/chronevo/?p=104', 0, 'post', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `wp_termmeta`
--

CREATE TABLE `wp_termmeta` (
  `meta_id` bigint(20) UNSIGNED NOT NULL,
  `term_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_value` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wp_terms`
--

CREATE TABLE `wp_terms` (
  `term_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(200) NOT NULL DEFAULT '',
  `slug` varchar(200) NOT NULL DEFAULT '',
  `term_group` bigint(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `wp_terms`
--

INSERT INTO `wp_terms` (`term_id`, `name`, `slug`, `term_group`) VALUES
(1, 'Blog', 'blog', 0),
(2, 'twentytwentyfive', 'twentytwentyfive', 0),
(3, 'Primary', 'primary', 0),
(4, 'Footer', 'footer', 0),
(5, 'Social', 'social', 0),
(6, 'Portfolio', 'portfolio', 0),
(7, 'Taglines', 'taglines', 0);

-- --------------------------------------------------------

--
-- Table structure for table `wp_term_relationships`
--

CREATE TABLE `wp_term_relationships` (
  `object_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `term_taxonomy_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `term_order` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `wp_term_relationships`
--

INSERT INTO `wp_term_relationships` (`object_id`, `term_taxonomy_id`, `term_order`) VALUES
(1, 6, 0),
(7, 2, 0),
(15, 3, 0),
(16, 3, 0),
(17, 3, 0),
(19, 3, 0),
(20, 4, 0),
(21, 4, 0),
(23, 4, 0),
(24, 4, 0),
(25, 5, 0),
(26, 5, 0),
(27, 5, 0),
(28, 5, 0),
(29, 5, 0),
(30, 5, 0),
(31, 3, 0),
(32, 4, 0),
(36, 1, 0),
(55, 7, 0),
(57, 7, 0),
(59, 7, 0),
(61, 7, 0),
(63, 7, 0),
(99, 6, 0),
(100, 6, 0),
(102, 6, 0),
(103, 6, 0),
(104, 6, 0);

-- --------------------------------------------------------

--
-- Table structure for table `wp_term_taxonomy`
--

CREATE TABLE `wp_term_taxonomy` (
  `term_taxonomy_id` bigint(20) UNSIGNED NOT NULL,
  `term_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `taxonomy` varchar(32) NOT NULL DEFAULT '',
  `description` longtext NOT NULL,
  `parent` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `count` bigint(20) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `wp_term_taxonomy`
--

INSERT INTO `wp_term_taxonomy` (`term_taxonomy_id`, `term_id`, `taxonomy`, `description`, `parent`, `count`) VALUES
(1, 1, 'category', '', 0, 1),
(2, 2, 'wp_theme', '', 0, 1),
(3, 3, 'nav_menu', '', 0, 5),
(4, 4, 'nav_menu', '', 0, 5),
(5, 5, 'nav_menu', '', 0, 6),
(6, 6, 'category', '', 0, 6),
(7, 7, 'category', '', 0, 5);

-- --------------------------------------------------------

--
-- Table structure for table `wp_usermeta`
--

CREATE TABLE `wp_usermeta` (
  `umeta_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_value` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `wp_usermeta`
--

INSERT INTO `wp_usermeta` (`umeta_id`, `user_id`, `meta_key`, `meta_value`) VALUES
(1, 1, 'nickname', 'AK'),
(2, 1, 'first_name', 'Arif'),
(3, 1, 'last_name', 'Muhammad'),
(4, 1, 'description', ''),
(5, 1, 'rich_editing', 'true'),
(6, 1, 'syntax_highlighting', 'true'),
(7, 1, 'comment_shortcuts', 'false'),
(8, 1, 'admin_color', 'fresh'),
(9, 1, 'use_ssl', '0'),
(10, 1, 'show_admin_bar_front', 'true'),
(11, 1, 'locale', ''),
(12, 1, 'wp_capabilities', 'a:1:{s:13:\"administrator\";b:1;}'),
(13, 1, 'wp_user_level', '10'),
(14, 1, 'dismissed_wp_pointers', ''),
(15, 1, 'show_welcome_panel', '0'),
(16, 1, 'session_tokens', 'a:1:{s:64:\"61b98bc9ad2911b0a7a6caf27609acd93fd4b56d7c0fa634d50c5faffb8916ed\";a:4:{s:10:\"expiration\";i:1771230085;s:2:\"ip\";s:3:\"::1\";s:2:\"ua\";s:111:\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36\";s:5:\"login\";i:1771057285;}}'),
(17, 1, 'wp_dashboard_quick_press_last_post_id', '38'),
(18, 1, 'closedpostboxes_dashboard', 'a:0:{}'),
(19, 1, 'metaboxhidden_dashboard', 'a:3:{i:0;s:18:\"dashboard_activity\";i:1;s:21:\"dashboard_quick_press\";i:2;s:17:\"dashboard_primary\";}'),
(20, 1, 'meta-box-order_dashboard', 'a:4:{s:6:\"normal\";s:40:\"dashboard_site_health,dashboard_activity\";s:4:\"side\";s:59:\"dashboard_quick_press,dashboard_primary,dashboard_right_now\";s:7:\"column3\";s:0:\"\";s:7:\"column4\";s:0:\"\";}'),
(21, 1, 'managenav-menuscolumnshidden', 'a:5:{i:0;s:11:\"link-target\";i:1;s:11:\"css-classes\";i:2;s:3:\"xfn\";i:3;s:11:\"description\";i:4;s:15:\"title-attribute\";}'),
(22, 1, 'metaboxhidden_nav-menus', 'a:1:{i:0;s:12:\"add-post_tag\";}'),
(23, 1, 'nav_menu_recently_edited', '5'),
(24, 1, 'wp_user-settings', 'libraryContent=browse&posts_list_mode=list'),
(25, 1, 'wp_user-settings-time', '1771065565'),
(26, 1, 'closedpostboxes_page', 'a:0:{}'),
(27, 1, 'metaboxhidden_page', 'a:6:{i:0;s:13:\"pageparentdiv\";i:1;s:12:\"revisionsdiv\";i:2;s:16:\"commentstatusdiv\";i:3;s:11:\"commentsdiv\";i:4;s:7:\"slugdiv\";i:5;s:9:\"authordiv\";}'),
(28, 1, 'closedpostboxes_post', 'a:0:{}'),
(29, 1, 'metaboxhidden_post', 'a:5:{i:0;s:16:\"tagsdiv-post_tag\";i:1;s:11:\"postexcerpt\";i:2;s:11:\"commentsdiv\";i:3;s:7:\"slugdiv\";i:4;s:9:\"authordiv\";}');

-- --------------------------------------------------------

--
-- Table structure for table `wp_users`
--

CREATE TABLE `wp_users` (
  `ID` bigint(20) UNSIGNED NOT NULL,
  `user_login` varchar(60) NOT NULL DEFAULT '',
  `user_pass` varchar(255) NOT NULL DEFAULT '',
  `user_nicename` varchar(50) NOT NULL DEFAULT '',
  `user_email` varchar(100) NOT NULL DEFAULT '',
  `user_url` varchar(100) NOT NULL DEFAULT '',
  `user_registered` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_activation_key` varchar(255) NOT NULL DEFAULT '',
  `user_status` int(11) NOT NULL DEFAULT 0,
  `display_name` varchar(250) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `wp_users`
--

INSERT INTO `wp_users` (`ID`, `user_login`, `user_pass`, `user_nicename`, `user_email`, `user_url`, `user_registered`, `user_activation_key`, `user_status`, `display_name`) VALUES
(1, 'ariflive', '$wp$2y$10$y6ddZ.scDBHCh/UKVRkG/uwStr2dz7y9YyfQ98eJ0VejhPAgC6ocy', 'ariflive', 'ariflive.com@gmail.com', 'http://localhost/chronevo', '2026-01-17 05:12:57', '', 0, 'AK');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `wp_commentmeta`
--
ALTER TABLE `wp_commentmeta`
  ADD PRIMARY KEY (`meta_id`),
  ADD KEY `comment_id` (`comment_id`),
  ADD KEY `meta_key` (`meta_key`(191));

--
-- Indexes for table `wp_comments`
--
ALTER TABLE `wp_comments`
  ADD PRIMARY KEY (`comment_ID`),
  ADD KEY `comment_post_ID` (`comment_post_ID`),
  ADD KEY `comment_approved_date_gmt` (`comment_approved`,`comment_date_gmt`),
  ADD KEY `comment_date_gmt` (`comment_date_gmt`),
  ADD KEY `comment_parent` (`comment_parent`),
  ADD KEY `comment_author_email` (`comment_author_email`(10));

--
-- Indexes for table `wp_links`
--
ALTER TABLE `wp_links`
  ADD PRIMARY KEY (`link_id`),
  ADD KEY `link_visible` (`link_visible`);

--
-- Indexes for table `wp_options`
--
ALTER TABLE `wp_options`
  ADD PRIMARY KEY (`option_id`),
  ADD UNIQUE KEY `option_name` (`option_name`),
  ADD KEY `autoload` (`autoload`);

--
-- Indexes for table `wp_postmeta`
--
ALTER TABLE `wp_postmeta`
  ADD PRIMARY KEY (`meta_id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `meta_key` (`meta_key`(191));

--
-- Indexes for table `wp_posts`
--
ALTER TABLE `wp_posts`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `post_name` (`post_name`(191)),
  ADD KEY `type_status_date` (`post_type`,`post_status`,`post_date`,`ID`),
  ADD KEY `post_parent` (`post_parent`),
  ADD KEY `post_author` (`post_author`),
  ADD KEY `type_status_author` (`post_type`,`post_status`,`post_author`);

--
-- Indexes for table `wp_termmeta`
--
ALTER TABLE `wp_termmeta`
  ADD PRIMARY KEY (`meta_id`),
  ADD KEY `term_id` (`term_id`),
  ADD KEY `meta_key` (`meta_key`(191));

--
-- Indexes for table `wp_terms`
--
ALTER TABLE `wp_terms`
  ADD PRIMARY KEY (`term_id`),
  ADD KEY `slug` (`slug`(191)),
  ADD KEY `name` (`name`(191));

--
-- Indexes for table `wp_term_relationships`
--
ALTER TABLE `wp_term_relationships`
  ADD PRIMARY KEY (`object_id`,`term_taxonomy_id`),
  ADD KEY `term_taxonomy_id` (`term_taxonomy_id`);

--
-- Indexes for table `wp_term_taxonomy`
--
ALTER TABLE `wp_term_taxonomy`
  ADD PRIMARY KEY (`term_taxonomy_id`),
  ADD UNIQUE KEY `term_id_taxonomy` (`term_id`,`taxonomy`),
  ADD KEY `taxonomy` (`taxonomy`);

--
-- Indexes for table `wp_usermeta`
--
ALTER TABLE `wp_usermeta`
  ADD PRIMARY KEY (`umeta_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `meta_key` (`meta_key`(191));

--
-- Indexes for table `wp_users`
--
ALTER TABLE `wp_users`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `user_login_key` (`user_login`),
  ADD KEY `user_nicename` (`user_nicename`),
  ADD KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `wp_commentmeta`
--
ALTER TABLE `wp_commentmeta`
  MODIFY `meta_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wp_comments`
--
ALTER TABLE `wp_comments`
  MODIFY `comment_ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `wp_links`
--
ALTER TABLE `wp_links`
  MODIFY `link_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wp_options`
--
ALTER TABLE `wp_options`
  MODIFY `option_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=394;

--
-- AUTO_INCREMENT for table `wp_postmeta`
--
ALTER TABLE `wp_postmeta`
  MODIFY `meta_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=602;

--
-- AUTO_INCREMENT for table `wp_posts`
--
ALTER TABLE `wp_posts`
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `wp_termmeta`
--
ALTER TABLE `wp_termmeta`
  MODIFY `meta_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wp_terms`
--
ALTER TABLE `wp_terms`
  MODIFY `term_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `wp_term_taxonomy`
--
ALTER TABLE `wp_term_taxonomy`
  MODIFY `term_taxonomy_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `wp_usermeta`
--
ALTER TABLE `wp_usermeta`
  MODIFY `umeta_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `wp_users`
--
ALTER TABLE `wp_users`
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
