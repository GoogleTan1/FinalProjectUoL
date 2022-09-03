/*
MySQL Backup
Source Server Version: 5.7.36
Source Database: finalprojectdb
Date: 3/9/2022 16:59:25
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
--  Table structure for `accounts`
-- ----------------------------
DROP TABLE IF EXISTS `accounts`;
CREATE TABLE `accounts` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `account_type` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Table structure for `accounts_type`
-- ----------------------------
DROP TABLE IF EXISTS `accounts_type`;
CREATE TABLE `accounts_type` (
  `id` int(255) NOT NULL,
  `account_type` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
--  Table structure for `campaigns`
-- ----------------------------
DROP TABLE IF EXISTS `campaigns`;
CREATE TABLE `campaigns` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `campaignName` varchar(255) NOT NULL,
  `campaignDetails` longtext NOT NULL,
  `finalAmount` decimal(65,2) NOT NULL,
  `amountCollected` decimal(65,2) NOT NULL DEFAULT '0.00',
  `bankAccountNo` varchar(255) NOT NULL,
  `bankType` varchar(255) NOT NULL,
  `stillRunning` int(1) NOT NULL DEFAULT '1',
  `campaignOrganisation` int(255) NOT NULL,
  `campaignImage` varchar(255) NOT NULL DEFAULT 'default.png',
  `campaignDay` int(2) NOT NULL,
  `campaignMonth` varchar(255) NOT NULL,
  `campaignYear` varchar(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Table structure for `donations`
-- ----------------------------
DROP TABLE IF EXISTS `donations`;
CREATE TABLE `donations` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `accountId` int(255) NOT NULL DEFAULT '-1',
  `campaignId` int(255) NOT NULL,
  `orgId` int(255) NOT NULL,
  `amountDonated` decimal(65,0) NOT NULL,
  `approvedByOrg` int(1) NOT NULL DEFAULT '0',
  `passwordKey` varchar(255) NOT NULL,
  `transactionScreenshot` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=57 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Table structure for `organisations`
-- ----------------------------
DROP TABLE IF EXISTS `organisations`;
CREATE TABLE `organisations` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `organisationName` varchar(255) NOT NULL,
  `organisationOwner` int(255) NOT NULL,
  `organisationApproved` int(1) NOT NULL DEFAULT '0',
  `organisationProofOfAuth` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records 
-- ----------------------------
INSERT INTO `accounts` VALUES ('1','admin','admin@admin.com','admin','2');
INSERT INTO `accounts_type` VALUES ('0','Members of Public'), ('1','Organisation'), ('2','Admin');
