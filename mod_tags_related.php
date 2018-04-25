<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_tags_related
 *
 * @copyright   Copyright (C) 2005 - 2018 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

// Include the tags_similar functions only once
JLoader::register('ModTagsrelatedHelper', __DIR__ . '/helper.php');

$cacheparams = new stdClass;
$cacheparams->cachemode = 'safeuri';
$cacheparams->class = 'ModTagsrelatedHelper';
$cacheparams->method = 'getList';
$cacheparams->methodparams = $params;
$cacheparams->modeparams = array('id' => 'array', 'Itemid' => 'int');

$image_intro		= $params->get('image_intro', 0);
$image_full			= $params->get('image_full', 0);
$created_date		= $params->get('created_date', 0);
$published_date		= $params->get('published_date', 0);

$list = JModuleHelper::moduleCache($module, $params, $cacheparams);

if (!count($list))
{
	return;
}

$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'), ENT_COMPAT, 'UTF-8');

require JModuleHelper::getLayoutPath('mod_tags_related', $params->get('layout', 'default'));
