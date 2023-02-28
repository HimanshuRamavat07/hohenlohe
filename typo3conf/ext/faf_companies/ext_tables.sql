#
# Table structure for table 'tx_fafcompanies_domain_model_company'
#
CREATE TABLE tx_fafcompanies_domain_model_company (

	companylogo int(11) unsigned NOT NULL default '0',
	hoverlogo int(11) unsigned NOT NULL default '0',
	name varchar(255) DEFAULT '' NOT NULL,
	slug varchar(2048),
	subline varchar(255) DEFAULT '' NOT NULL,
	linktext varchar(255) DEFAULT '' NOT NULL,
	modelbannerimages int(11) unsigned NOT NULL default '0',
	modelbannertitle varchar(255) DEFAULT '' NOT NULL,
	modelcontent text,
	industry text,
	year text,
	address text,
	cooperating varchar(255) DEFAULT '' NOT NULL,
	facebook varchar(255) DEFAULT '' NOT NULL,
	youtube varchar(255) DEFAULT '' NOT NULL,
	instagram varchar(255) DEFAULT '' NOT NULL,
	linkedin varchar(255) DEFAULT '' NOT NULL,
	xing varchar(255) DEFAULT '' NOT NULL,
	rating int unsigned NOT NULL default '0',
	images varchar(255) DEFAULT '' NOT NULL,
	textcontent text,
	media varchar(255) DEFAULT '' NOT NULL,
	bottomcontent text,
);




#
# Table structure for table 'tx_fafcompanies_domain_model_image'
#
CREATE TABLE tx_fafcompanies_domain_model_image (
	image varchar(255) DEFAULT '' NOT NULL,
	rte text,
);