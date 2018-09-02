CREATE TABLE `{{{table}}}` (
    `id` int(10) unsigned NOT NULL auto_increment,
    `author_id` varchar(30) NOT NULL default '',
    `babble` varchar(120) NOT NULL default '',
    `created_at` time NOT NULL default '00:00:00',
    PRIMARY KEY  (`id`)
)