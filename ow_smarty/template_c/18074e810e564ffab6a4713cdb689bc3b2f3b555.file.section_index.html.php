<?php /* Smarty version Smarty-3.1.12, created on 2014-12-14 23:04:54
         compiled from "C:\xampp\htdocs\havanabook\ow_plugins\forum\views\controllers\section_index.html" */ ?>
<?php /*%%SmartyHeaderCode:32734548e88168b8755-84229540%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '18074e810e564ffab6a4713cdb689bc3b2f3b555' => 
    array (
      0 => 'C:\\xampp\\htdocs\\havanabook\\ow_plugins\\forum\\views\\controllers\\section_index.html',
      1 => 1416959676,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '32734548e88168b8755-84229540',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'breadcrumb' => 0,
    'search' => 0,
    'sectionGroupList' => 0,
    'section' => 0,
    'group' => 0,
    'r' => 0,
    'userNames' => 0,
    'displayNames' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_548e88169947f4_45065181',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_548e88169947f4_45065181')) {function content_548e88169947f4_45065181($_smarty_tpl) {?><?php if (!is_callable('smarty_function_add_content')) include 'C:\\xampp\\htdocs\\havanabook\\ow_smarty\\plugin\\function.add_content.php';
if (!is_callable('smarty_block_style')) include 'C:\\xampp\\htdocs\\havanabook\\ow_smarty\\plugin\\block.style.php';
if (!is_callable('smarty_function_text')) include 'C:\\xampp\\htdocs\\havanabook\\ow_smarty\\plugin\\function.text.php';
if (!is_callable('smarty_function_cycle')) include 'C:\\xampp\\htdocs\\havanabook\\ow_libraries\\smarty3\\plugins\\function.cycle.php';
if (!is_callable('smarty_function_user_link')) include 'C:\\xampp\\htdocs\\havanabook\\ow_smarty\\plugin\\function.user_link.php';
if (!is_callable('smarty_function_format_date')) include 'C:\\xampp\\htdocs\\havanabook\\ow_smarty\\plugin\\function.format_date.php';
?><div class="clearfix"><?php echo smarty_function_add_content(array('key'=>'forum.add_content.list.top','listType'=>'section'),$_smarty_tpl);?>
</div>

<?php $_smarty_tpl->smarty->_tag_stack[] = array('style', array()); $_block_repeat=true; echo smarty_block_style(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

 .ow_author { width: 25%; } 
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_style(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>


<?php echo $_smarty_tpl->tpl_vars['breadcrumb']->value;?>

<div class="clearfix">
    <div class="ow_right ow_smallmargin">
        <?php echo $_smarty_tpl->tpl_vars['search']->value;?>

    </div>
</div>

<table class="ow_table_1 ow_stdmargin ow_forum">
    <?php  $_smarty_tpl->tpl_vars['section'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['section']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['sectionGroupList']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['section']->key => $_smarty_tpl->tpl_vars['section']->value){
$_smarty_tpl->tpl_vars['section']->_loop = true;
?>
    <tr class="ow_tr_first">
        <th class="ow_name"><span id="section-<?php echo $_smarty_tpl->tpl_vars['section']->value['sectionId'];?>
"><?php echo $_smarty_tpl->tpl_vars['section']->value['sectionName'];?>
</span></th>
        <th class="ow_topics"><?php echo smarty_function_text(array('key'=>'forum+topics'),$_smarty_tpl);?>
</th>
        <th class="ow_replies"><?php echo smarty_function_text(array('key'=>'forum+replies'),$_smarty_tpl);?>
</th>
        <th class="ow_author"><?php echo smarty_function_text(array('key'=>'forum+last_reply'),$_smarty_tpl);?>
</th>
    </tr>

    <?php  $_smarty_tpl->tpl_vars['group'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['group']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['section']->value['groups']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['group']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['group']->iteration=0;
 $_smarty_tpl->tpl_vars['group']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['group']->key => $_smarty_tpl->tpl_vars['group']->value){
$_smarty_tpl->tpl_vars['group']->_loop = true;
 $_smarty_tpl->tpl_vars['group']->iteration++;
 $_smarty_tpl->tpl_vars['group']->index++;
 $_smarty_tpl->tpl_vars['group']->first = $_smarty_tpl->tpl_vars['group']->index === 0;
 $_smarty_tpl->tpl_vars['group']->last = $_smarty_tpl->tpl_vars['group']->iteration === $_smarty_tpl->tpl_vars['group']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['g']['first'] = $_smarty_tpl->tpl_vars['group']->first;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['g']['last'] = $_smarty_tpl->tpl_vars['group']->last;
?>
    <tr class="<?php echo smarty_function_cycle(array('values'=>'ow_alt1,ow_alt2','reset'=>$_smarty_tpl->getVariable('smarty')->value['foreach']['g']['first']),$_smarty_tpl);?>
 <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['g']['last']){?>ow_tr_last<?php }?>">
        <td class="ow_name">
            <a href="<?php echo $_smarty_tpl->tpl_vars['group']->value['groupUrl'];?>
"><b><?php echo $_smarty_tpl->tpl_vars['group']->value['name'];?>
</b></a>
            <div class="ow_small"><?php echo $_smarty_tpl->tpl_vars['group']->value['description'];?>
</div>
            <?php if ($_smarty_tpl->tpl_vars['group']->value['isPrivate']){?>
            <span class="ow_lbutton ow_green"><?php echo smarty_function_text(array('key'=>'forum+is_private'),$_smarty_tpl);?>
</span>
            <span class="ow_small ow_remark"><?php echo smarty_function_text(array('key'=>'forum+visible_to'),$_smarty_tpl);?>
: <?php  $_smarty_tpl->tpl_vars['r'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['r']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['group']->value['roles']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['r']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['r']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['r']->key => $_smarty_tpl->tpl_vars['r']->value){
$_smarty_tpl->tpl_vars['r']->_loop = true;
 $_smarty_tpl->tpl_vars['r']->iteration++;
 $_smarty_tpl->tpl_vars['r']->last = $_smarty_tpl->tpl_vars['r']->iteration === $_smarty_tpl->tpl_vars['r']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['r']['last'] = $_smarty_tpl->tpl_vars['r']->last;
?><?php echo $_smarty_tpl->tpl_vars['r']->value;?>
<?php if (!$_smarty_tpl->getVariable('smarty')->value['foreach']['r']['last']){?>, <?php }?><?php } ?></span>
            <?php }?>
        </td>
        <td class="ow_topics"><?php echo $_smarty_tpl->tpl_vars['group']->value['topicCount'];?>
</td>
        <td class="ow_replies"><?php echo $_smarty_tpl->tpl_vars['group']->value['replyCount'];?>
</td>
        <td class="ow_txtleft ow_small">
            <?php if (!empty($_smarty_tpl->tpl_vars['group']->value['lastReply'])){?>
            <div class="ow_reply_info">
	            <span class="ow_nowrap ow_icon_control ow_ic_user">
	                <?php echo smarty_function_user_link(array('username'=>$_smarty_tpl->tpl_vars['userNames']->value[$_smarty_tpl->tpl_vars['group']->value['lastReply']['userId']],'name'=>$_smarty_tpl->tpl_vars['displayNames']->value[$_smarty_tpl->tpl_vars['group']->value['lastReply']['userId']]),$_smarty_tpl);?>

	            </span> &middot;
                <span class="ow_nowrap ow_remark"><?php echo smarty_function_format_date(array('timestamp'=>$_smarty_tpl->tpl_vars['group']->value['lastReply']['createStamp']),$_smarty_tpl);?>
</span>
            </div>
            <?php echo smarty_function_text(array('key'=>'forum+in'),$_smarty_tpl);?>
 <a href="<?php echo $_smarty_tpl->tpl_vars['group']->value['lastReply']['postUrl'];?>
"><?php echo $_smarty_tpl->tpl_vars['group']->value['lastReply']['title'];?>
</a>
            <?php }?>
        </td>
    </tr>
    <?php } ?>

    <?php } ?>
</table><?php }} ?>