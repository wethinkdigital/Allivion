<?php

///////////////////////////////////////////
//
// Define item type
// no spaces - letters, hyphen or underscore only
//
///////////////////////////////////////////
	
$type = 'application'; 


///////////////////////////////////////////
//
// Define item labelling (WordPress admin)
//
///////////////////////////////////////////

$label = 'applications';
$single_label ='application';


///////////////////////////////////////////
//
// Define questions / values for item type
// To add a question, add a new array to the end of $vars
//
// 	array(
//		'name' => 'question_2',
//		'label' => 'How question 2 is labelled?',
//		'instructions' => 'Further instructions on how to complete this question'
//		'placeholder' => 'field suggestion for question 2',
//		'fieldtype' => 'check', (can be 'text', 'textarea', 'richtext', 'dropdown', 'check', 'radio', 'password', 'email', 'file')
//		'value' => array(
//			'Option 1' 		=> '1',	
//			'Option 2' 		=> '2',	
//			'Option 3' 		=> '3'	
//		),
//		'group' => 'package',
//		'required' => 'publish', (can be 'save', 'publish'. Fields set to publish will also be required for save)
//		'extra_class' => 'myclass'
//	),
//
///////////////////////////////////////////



$vars = array(
	
	array(
		'name' => 'first_name',
		'label' => 'Fist name',
		'placeholder' => '',
		'fieldtype' => 'text',
		'group' => 'headline',
		'required' => 'save',
		'keyword' => 'true'
	),

	array(
		'name' => 'last_name',
		'label' => 'Last name',
		'placeholder' => '',
		'fieldtype' => 'text',
		'group' => 'headline'
	),
	
	

);