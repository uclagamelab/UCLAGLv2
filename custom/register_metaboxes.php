<?php

$game_credits = new WPAlchemy_MetaBox(array
(
	'id' => '_game_credits', // underscore prefix hides fields from the custom fields area
	'title' => 'Credits',
	'template' => TEMPLATEPATH . '/custom/credits_meta.php',
	'types' => array('game'), // added only for custom post type "game"
	'priority' => 'low',
));

$person_title = new WPAlchemy_MetaBox(array
(
	'id' => '_person_title',
	'title' => 'Title',
	'template' => TEMPLATEPATH . '/custom/person_title_meta.php',
	'types' => array('person'),
	'priority' => 'low',
	'context' => 'side',
));

$person_department = new WPAlchemy_MetaBox(array
(
	'id' => '_person_department',
	'title' => 'Department',
	'template' => TEMPLATEPATH . '/custom/person_department_meta.php',
	'types' => array('person'),
	'priority' => 'low',
	'context' => 'side',
));

$lab_employee = new WPAlchemy_MetaBox(array
(
	'id' => '_lab_employee',
	'title' => 'Job Title',
	'template' => TEMPLATEPATH . '/custom/job_title_meta.php',
	'types' => array('person'),
	'priority' => 'low',
	'context' => 'side',
));



$short_description = new WPAlchemy_MetaBox(array
(
	'id' => '_short_description',
	'title' => 'Short Description',	
	'template' => TEMPLATEPATH . '/custom/short_description_meta.php',
	'types' => array('game', 'resource', 'person', 'page'),
	'priority' => 'high',
));

$author_bio = new WPAlchemy_MetaBox(array
(
	'id' => '_author_bio',
	'title' => 'About the author',	
	'template' => TEMPLATEPATH . '/custom/author_bio_meta.php',
	'types' => array('resource'),
	'priority' => 'high',
));

$link_out = new WPAlchemy_MetaBox(array
(
	'id' => '_link_out',
	'title' => 'Link Out',	
	'template' => TEMPLATEPATH . '/custom/link_out_meta.php',
	'types' => array('game', 'resource', 'person'),
	'priority' => 'low',
));

$context = new WPAlchemy_MetaBox(array
(
	'id' => '_context',
	'title' => 'Context',	
	'template' => TEMPLATEPATH . '/custom/context_meta.php',
	'types' => array('game'),
	'priority' => 'high',
));

$medium = new WPAlchemy_MetaBox(array
(
	'id' => '_medium',
	'title' => 'Medium',	
	'template' => TEMPLATEPATH . '/custom/medium_meta.php',
	'types' => array('game'),
	'priority' => 'high',
));



$attachments = new WPAlchemy_MetaBox(array
(
	'id' => '_attachments',
	'title' => 'Attachments',	
	'template' => TEMPLATEPATH . '/custom/attachments_meta.php',
	'types' => array('game', 'resource'),
	'priority' => 'low',
));

$eventdate = new WPAlchemy_MetaBox(array
(
	'id' => '_eventdate',
	'title' => 'Event Date',
	'template' => TEMPLATEPATH . '/custom/eventdate_meta.php',
	'types' => array('resource'),
	'include_category' => array('Events','Lecture', 'Show', 'Workshop'),
	'context' => 'side',
));

$requirements = new WPAlchemy_MetaBox(array
(
	'id' => '_requirements',
	'title' => 'Requirements',
	'template' => TEMPLATEPATH . '/custom/requirements_meta.php',
	'types' => array('resource'),
	'include_category' => array('Events','Lecture', 'Show', 'Workshop'),
));
