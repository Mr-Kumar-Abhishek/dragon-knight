CREATE TABLE `{{{table}}}` (
    `id` smallint(5) unsigned NOT NULL auto_increment,
    `username` varchar(30) NOT NULL default '',
    `password` varchar(255) NOT NULL default '',
    `email` varchar(100) NOT NULL default '',
    `verify` varchar(8) NOT NULL default '0',
    `regdate` datetime NOT NULL default '0000-00-00 00:00:00',
    `onlinetime` datetime NOT NULL default '0000-00-00 00:00:00',
    `authlevel` tinyint(3) unsigned NOT NULL default '0',
    `latitude` smallint(6) NOT NULL default '0',
    `longitude` smallint(6) NOT NULL default '0',
    `difficulty` tinyint(3) unsigned NOT NULL default '0',
    `charclass` tinyint(4) unsigned NOT NULL default '0',
    `currentaction` varchar(30) NOT NULL default 'In Town',
    `currentfight` tinyint(4) unsigned NOT NULL default '0',
    `currentmonster` smallint(6) unsigned NOT NULL default '0',
    `currentmonsterhp` smallint(6) unsigned NOT NULL default '0',
    `currentmonstersleep` tinyint(3) unsigned NOT NULL default '0',
    `currentmonsterimmune` tinyint(4) NOT NULL default '0',
    `currentuberdamage` tinyint(3) unsigned NOT NULL default '0',
    `currentuberdefense` tinyint(3) unsigned NOT NULL default '0',
    `currenthp` smallint(6) unsigned NOT NULL default '15',
    `currentmp` smallint(6) unsigned NOT NULL default '0',
    `currenttp` smallint(6) unsigned NOT NULL default '10',
    `maxhp` smallint(6) unsigned NOT NULL default '15',
    `maxmp` smallint(6) unsigned NOT NULL default '0',
    `maxtp` smallint(6) unsigned NOT NULL default '10',
    `level` smallint(5) unsigned NOT NULL default '1',
    `gold` mediumint(8) unsigned NOT NULL default '100',
    `experience` mediumint(8) unsigned NOT NULL default '0',
    `goldbonus` smallint(5) NOT NULL default '0',
    `expbonus` smallint(5) NOT NULL default '0',
    `strength` smallint(5) unsigned NOT NULL default '5',
    `dexterity` smallint(5) unsigned NOT NULL default '5',
    `attackpower` smallint(5) unsigned NOT NULL default '5',
    `defensepower` smallint(5) unsigned NOT NULL default '5',
    `weaponid` smallint(5) unsigned NOT NULL default '0',
    `armorid` smallint(5) unsigned NOT NULL default '0',
    `shieldid` smallint(5) unsigned NOT NULL default '0',
    `slot1id` smallint(5) unsigned NOT NULL default '0',
    `slot2id` smallint(5) unsigned NOT NULL default '0',
    `slot3id` smallint(5) unsigned NOT NULL default '0',
    `weaponname` varchar(30) NOT NULL default 'None',
    `armorname` varchar(30) NOT NULL default 'None',
    `shieldname` varchar(30) NOT NULL default 'None',
    `slot1name` varchar(30) NOT NULL default 'None',
    `slot2name` varchar(30) NOT NULL default 'None',
    `slot3name` varchar(30) NOT NULL default 'None',
    `dropcode` mediumint(8) unsigned NOT NULL default '0',
    `spells` varchar(50) NOT NULL default '0',
    `towns` varchar(50) NOT NULL default '0',
    PRIMARY KEY  (`id`)
)