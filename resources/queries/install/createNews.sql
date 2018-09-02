CREATE TABLE `{{{table}}}` (
    `id` mediumint(8) unsigned NOT NULL auto_increment,
    `title` varchar(120) NOT NULL default 'Title',
    `content` text NOT NULL,
    `created_at` datetime NOT NULL default '0000-00-00 00:00:00',
    PRIMARY KEY  (`id`)
)