Database table users have a bit change:

The columns that are add in users table are:

VVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVV

  `verify` int(11) DEFAULT NULL,
  `sendEmail` int(11) NOT NULL,
  `LName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Position` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Department` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Tel` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL